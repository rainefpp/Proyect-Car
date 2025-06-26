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
    public function getProductCollectionProperty(): Collection | null
    {
        return Url::whereElementType((new Collection)->getMorphClass())->whereSlug('shop')->first()?->element ?? null;
    }
    /**
     * Return all images in products collection.
     */
    public function getProductCollectionImagesProperty()
    {
        if (! $this->getProductCollectionImagesProperty()) {
            return null;
        }

        $collectionProducts = $this->getProductCollectionImagesProperty()
            ->products()->inRandomOrder()->limit(6)->get();

        $ProductImages = $collectionProducts->map(function ($product) {
            return $product->thumbnail;
        });

        return $ProductImages->chunk(2);
    }
    public function render()
    {
        return view('livewire.shop-page');
    }
}
