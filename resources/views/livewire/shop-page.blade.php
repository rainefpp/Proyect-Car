<div>
    @if ($this->ProductCollection)
        <section>
            <div class="grid mt-8 md:grid-cols-2 cont-sp gap-4">
                @foreach ($this->ProductCollection->products as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>
        </section>
    @endif
</div>
