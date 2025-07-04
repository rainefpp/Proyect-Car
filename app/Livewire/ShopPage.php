<?php

namespace App\Livewire;

use Livewire\Component;
use Lunar\Models\Collection;
use Lunar\Models\Url;
use Livewire\WithPagination;
use Lunar\Models\Product;
use Lunar\Models\ProductVariant;
use Lunar\Models\Price;

class ShopPage extends Component
{
    use WithPagination;

    // Filtros
    public $search = '';
    public $minPrice = 0;
    public $maxPrice = 100000;
    public $selectedCollections = [];
    public $sortBy = 'latest';

    /**
     * Return the products collection.
     */
    public function getProductCollectionProperty(): Collection|null
    {
        return Url::whereElementType((new Collection)->getMorphClass())->whereSlug('shop')->first()?->element ?? null;
    }

    /**
     * Obtiene los productos filtrados y ordenados
     */
    public function getFilteredProductsProperty()
    {
        if (!$this->productCollection) {
            return collect();
        }

        // Obtenemos los productos de la colección
        $products = $this->productCollection->products()
            ->with([
                'variants.prices.currency',
                'variants.values.option',
                'thumbnail',
                'collections'
            ]);

        // Aplicamos filtros
        $this->applyFilters($products);

        // Aplicamos ordenación
        $this->applySorting($products);

        return $products->paginate(12);
    }

    /**
     * Aplica los filtros a la consulta
     */
    protected function applyFilters(&$query)
    {
        // Filtro de búsqueda

        if ($this->search) {
            $query->where(function ($q) {
                $searchTerm = strtolower($this->search);
                // Búsqueda en name.value.en
                $q->whereRaw('LOWER(JSON_UNQUOTE(JSON_EXTRACT(attribute_data, "$.name.value.en"))) LIKE ?', ['%' . $searchTerm . '%'])
                    // Búsqueda en description.value.en
                    ->orWhereRaw('LOWER(JSON_UNQUOTE(JSON_EXTRACT(attribute_data, "$.description.value.en"))) LIKE ?', ['%' . $searchTerm . '%']);
            });
        }

        // Filtro por colecciones
        if ($this->selectedCollections) {
            $query->whereHas('collections', function ($q) {
                $q->whereIn('lunar_collections.id', $this->selectedCollections);
            });
        }

        // Filtro por precio
        $query->whereHas('variants.prices', function ($q) {
            $q->whereBetween('price', [
                $this->minPrice * 100,
                $this->maxPrice * 100
            ]);
        });
    }
    /**
     * Aplica la ordenación a la consulta
     */
    protected function applySorting(&$query)
    {
        switch ($this->sortBy) {
            case 'price-low':
                $query->select('lunar_products.*')
                    ->addSelect([
                        'min_price' => Price::selectRaw('MIN(price)')
                            ->whereColumn('priceable_id', 'lunar_product_variants.id')
                            ->where('priceable_type', 'product_variant')
                            ->join('lunar_product_variants', 'lunar_product_variants.id', '=', 'lunar_prices.priceable_id')
                            ->whereColumn('lunar_product_variants.product_id', 'lunar_products.id')
                    ])->orderBy('min_price', 'asc');
                break;

            case 'price-high':
                $query->addSelect([
                    'max_price' => Price::selectRaw('MAX(price)')
                            ->whereColumn('priceable_id', 'lunar_product_variants.id')
                            ->where('priceable_type', 'product_variant')
                            ->join('lunar_product_variants', 'lunar_product_variants.id', '=', 'lunar_prices.priceable_id')
                            ->whereColumn('lunar_product_variants.product_id', 'lunar_products.id')
                ])->orderBy('max_price', 'desc');
                break;

            case 'name':
                // Ordenamiento por nombre en inglés
                $query->orderByRaw('JSON_UNQUOTE(JSON_EXTRACT(attribute_data, \'$.name.value.en\')) asc');
                break;

            default: // 'latest'
                $query->orderBy('lunar_products.created_at', 'desc');
        }
    }

    /**
     * Obtiene el rango de precios disponible
     */
    public function getPriceRangeProperty()
    {
        if (!$this->productCollection) {
            return ['min' => 0, 'max' => 100000];
        }

        $minPrice = Product::query()
            ->join('lunar_product_variants', 'lunar_products.id', '=', 'lunar_product_variants.product_id')
            ->join('lunar_prices', 'lunar_product_variants.id', '=', 'lunar_prices.priceable_id')
            ->where('lunar_prices.priceable_type', ProductVariant::class)
            ->whereIn('lunar_products.id', $this->productCollection->products()->pluck('lunar_products.id'))
            ->min('lunar_prices.price');

        $maxPrice = Product::query()
            ->join('lunar_product_variants', 'lunar_products.id', '=', 'lunar_product_variants.product_id')
            ->join('lunar_prices', 'lunar_product_variants.id', '=', 'lunar_prices.priceable_id')
            ->where('lunar_prices.priceable_type', ProductVariant::class)
            ->whereIn('lunar_products.id', $this->productCollection->products()->pluck('lunar_products.id'))
            ->max('lunar_prices.price');

        return [
            'min' => $minPrice ? $minPrice / 100 : 0,
            'max' => $maxPrice ? $maxPrice / 100 : 100000
        ];
    }

    /**
     * Obtiene las colecciones disponibles para filtrar
     */
    public function getAvailableCollectionsProperty()
    {
        if (!$this->productCollection) {
            return collect();
        }

        return $this->productCollection->products()
            ->with('collections')
            ->get()
            ->flatMap(function ($product) {
                return $product->collections;
            })
            ->unique('id')
            ->sortBy('name');
    }

    /**
     * Resetea todos los filtros
     */
    public function resetFilters()
    {
        $this->reset(['search', 'minPrice', 'maxPrice', 'selectedCollections', 'sortBy']);
        $this->maxPrice = $this->priceRange['max'];
    }

    /**
     * Se ejecuta cuando cambia algún filtro
     */
    public function updated()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.shop-page');
    }
}
