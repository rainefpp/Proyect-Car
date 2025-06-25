<?php

namespace App\Livewire;

use Livewire\Component;
use Lunar\Models\Collection;
use Lunar\Models\Url;

class ShopPage extends Component
{
    /**
     * Return the products collection.
     */
    public function getCarCollectionProperty(): Collection | null
    {
        return Url::whereElementType((new Collection)->getMorphClass())->whereSlug('main')->first()?->element ?? null;
    }
    /**
     * Return all images in car collection.
     */
    public function getCarCollectionImagesProperty()
    {
        if (! $this->getCarCollectionImagesProperty()) {
            return null;
        }

        $collectionProducts = $this->getCarCollectionImagesProperty()
            ->products()->inRandomOrder()->limit(6)->get();

        $carImages = $collectionProducts->map(function ($product) {
            return $product->thumbnail;
        });

        return $carImages->chunk(2);
    }
    public function render()
    {
        return view('livewire.shop-page');
    }
}
