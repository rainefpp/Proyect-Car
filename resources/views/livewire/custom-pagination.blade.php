@if ($paginator->hasPages())
    <div class="flex justify-between items-center">
        {{-- Botón Anterior --}}
        @if ($paginator->onFirstPage())
            <span class="px-4 py-2 bg-gray-200 rounded-md text-gray-400 cursor-not-allowed">
                &laquo; Anterior
            </span>
        @else
            <button wire:click="previousPage" class="px-4 py-2 bg-gray-200 rounded-md hover:bg-gray-300">
                &laquo; Anterior
            </button>
        @endif

        {{-- Página actual --}}
        <span class="px-4 py-2">
            Página {{ $paginator->currentPage() }} de {{ $paginator->lastPage() }}
        </span>

        {{-- Botón Siguiente --}}
        @if ($paginator->hasMorePages())
            <button wire:click="nextPage" class="px-4 py-2 bg-gray-200 rounded-md hover:bg-gray-300">
                Siguiente &raquo;
            </button>
        @else
            <span class="px-4 py-2 bg-gray-200 rounded-md text-gray-400 cursor-not-allowed">
                Siguiente &raquo;
            </span>
        @endif
    </div>
@endif
