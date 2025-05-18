<div>
    <x-welcome-banner />

    <livewire:components.info-shop-home />

    <div class="text-center max-w-screen-xl px-4 py-12 mx-auto space-y-12 sm:px-6 lg:px-8">
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

                <div class="grid grid-cols-1 mt-8 lg:grid-cols-4 gap-x-4 gap-y-8">
                    @foreach ($this->carCollection->products as $product)
                        <x-product-card :product="$product" />
                    @endforeach
                </div>
            </section>
        @endif
    </div>

    <livewire:components.form-contact />
</div>
