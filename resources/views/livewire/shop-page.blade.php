<div class="container mx-auto">
    <!-- Filtros -->
    <div class="p-4 mb-6" style="background-color: #E7E8E8;">
        <!-- Botón para mostrar/ocultar filtros -->
        <div class="mb-4 flex justify-end">
            <button wire:click="toggleFilters"
                class="px-4 py-2 bg-white rounded-md hover:bg-gray-300 text-sm">
                {{ $showFilters ? 'Ocultar Filtros' : 'Mostrar Filtros' }}
            </button>
        </div>
        <div class="grid grid-cols-1 gap-4 cont-sp-filtros">

            @if ($showFilters)
                <!-- Buscador -->
                <div class="bg-white p-4 rounded-lg shadow">
                    <label class="block text-sm font-medium text-gray-700">Buscar</label>
                    <input type="text" wire:model.live.debounce.500ms="search" placeholder="Nombre o descripción..."
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>

                <!-- Rango de precios -->
                <div class="bg-white p-4 rounded-lg shadow">
                    <label class="block text-sm font-medium text-gray-700">
                        Precio: ${{ number_format($this->minPrice, 2) }} - ${{ number_format($this->maxPrice, 2) }}
                    </label>
                    <div class="flex space-x-4 mt-4">
                        <input type="range" wire:model.live="minPrice" min="{{ $this->priceRange['min'] }}"
                            max="{{ $this->priceRange['max'] / 2 }}" class="w-full">
                        <input type="range" wire:model.live="maxPrice" min="{{ $this->priceRange['max'] / 2 }}"
                            max="{{ $this->priceRange['max'] }}" class="w-full">
                    </div>
                </div>

                <!-- Colecciones -->
                <div class="bg-white p-4 rounded-lg shadow">
                    <label class="block text-sm font-medium text-gray-700">Colecciones</label>
                    <select wire:model.live="selectedCollections" multiple size="2"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        @if ($this->availableCollections)
                            @foreach ($this->availableCollections as $collection)
                                <option value="{{ $collection->id }}">
                                    {{ $collection->translateAttribute('name') }}
                                </option>
                            @endforeach
                        @endif

                    </select>
                </div>

                <!-- Ordenar por -->
                <div class="bg-white p-4 rounded-lg shadow">
                    <label class="block text-sm font-medium text-gray-700">Ordenar por</label>
                    <select wire:model.live="sortBy"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="latest">Más recientes</option>
                        <option value="price-low">Precio: menor a mayor</option>
                        <option value="price-high">Precio: mayor a menor</option>
                        <option value="name">Nombre</option>
                    </select>
                </div>
            @endif

        </div>

        <div class="mt-4 flex justify-end">
            <button wire:click="resetFilters" class="px-4 py-2 bg-white rounded-md hover:bg-gray-300 text-sm">
                Resetear filtros
            </button>
        </div>
    </div>

    <!-- Productos -->
    <div class="grid mt-8 gap-8 cont-sp">
        @foreach ($this->filteredProducts as $product)
            <x-product-card :product="$product" />
        @endforeach
    </div>


    <!-- Paginación -->
    <div class="mt-8">
        @if ($this->filteredProducts->hasPages())
            @include('livewire.custom-pagination', ['paginator' => $this->filteredProducts])
        @endif
    </div>
</div>
