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
    public $maxPrice = 1000000;
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
                $q->where('attribute_data->name->en', 'like', '%' . $this->search . '%')
                    ->orWhere('attribute_data->description->en', 'like', '%' . $this->search . '%');
            });
        }

        // Filtro por colecciones
        if ($this->selectedCollections) {
            $query->whereHas('collections', function ($q) {
                $q->whereIn('id', $this->selectedCollections);
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
                $query->orderBy(
                    Price::select('price')
                        ->whereColumn('priceable_id', 'lunar_product_variants.id')
                        ->where('priceable_type', ProductVariant::class)
                        ->orderBy('price', 'asc')
                        ->limit(1),
                    'asc'
                );
                break;

            case 'price-high':
                $query->orderBy(
                    Price::select('price')
                        ->whereColumn('priceable_id', 'lunar_product_variants.id')
                        ->where('priceable_type', ProductVariant::class)
                        ->orderBy('price', 'desc')
                        ->limit(1),
                    'desc'
                );
                break;

            case 'name':
                $query->orderBy('attribute_data->name->en', 'asc');
                break;

            default: // 'latest'
                $query->orderBy('created_at', 'desc');
        }
    }

    /**
     * Obtiene el rango de precios disponible
     */
    public function getPriceRangeProperty()
    {
        if (!$this->productCollection) {
            return ['min' => 0, 'max' => 1000];
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
            'max' => $maxPrice ? $maxPrice / 100 : 1000
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
