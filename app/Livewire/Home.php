<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;
use Lunar\Models\Collection;
use Lunar\Models\Url;

class Home extends Component
{
    /**
     * Return the sale collection.
     */
    public function getCarCollectionProperty(): Collection | null
    {
        return Url::whereElementType((new Collection)->getMorphClass())->whereSlug('los-mejores-autos-disponibles')->first()?->element ?? null;
    }

    /**
     * Return all images in sale collection.
     */
    public function getCarCollectionImagesProperty()
    {
        if (! $this->getCarCollectionImagesProperty()) {
            return null;
        }

        $collectionProducts = $this->getCarCollectionImagesProperty()
            ->products()->inRandomOrder()->limit(6)->get();

        $saleImages = $collectionProducts->map(function ($product) {
            return $product->thumbnail;
        });

        return $saleImages->chunk(2);
    }

    /**
     * Return a random collection.
     */
    public function getRandomCollectionProperty(): ?Collection
    {
        $collections = Url::whereElementType((new Collection)->getMorphClass());

        if ($this->getSaleCollectionProperty()) {
            $collections = $collections->where('element_id', '!=', $this->getSaleCollectionProperty()?->id);
        }

        return $collections->inRandomOrder()->first()?->element;
    }

    public function render(): View
    {
        return view('livewire.home');
    }
}
