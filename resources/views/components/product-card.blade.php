@props(['product'])

<div class="contenedor-producto">
    <div class="contenedor-product-img">
        @if ($product->thumbnail)
            <img class="product-img"
                src="{{ $product->thumbnail->getUrl('') }}" alt="{{ $product->translateAttribute('name') }}" />
        @endif
    </div>

    <strong class="mt-2 text-2xl font-bold">
        {{ $product->translateAttribute('name') }}
    </strong>

    <a class="pc-btn-compra" href="{{ route('product.view', $product->defaultUrl->slug) }}" wire:navigate>
        Comprar
    </a>

    <p class="mt-1 text-sm text-gray-600">
        <span class="sr-only">
            Price
        </span>

        <x-product-price :product="$product" />
    </p>
</div>
