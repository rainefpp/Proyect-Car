<div>
    @if ($this->carCollection)
            <section>
                <h2 class="text-3xl font-bold">
                    {{ $this->carCollection->translateAttribute('name') }}
                </h2>

                @if ($this->carCollection->translateAttribute('description'))
                    <p class="mt-8 text-lg font-medium">
                        {!! $this->carCollection->translateAttribute('description') !!}
                    </p>
                @endif

                <div class="grid grid-cols-1 mt-8 md:grid-cols-2 gap-y-8 hcont-orden">
                    @foreach ($this->carCollection->products as $product)
                        <x-product-card :product="$product" />
                    @endforeach
                </div>
            </section>
        @endif
</div>
