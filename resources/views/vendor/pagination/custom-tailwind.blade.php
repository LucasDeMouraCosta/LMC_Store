@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-center mt-4">
        <ul class="inline-flex space-x-1">
            {{-- Primeira Página --}}
            @if (!$paginator->onFirstPage())
                <li>
                    <button wire:click="gotoPage(1)" class="px-4 py-2 border border-gray-300 text-gray-700 bg-white hover:bg-gray-100 rounded-l-lg flex items-center justify-center">
                        « Primeira
                    </button>
                </li>
            @endif

            {{-- Anterior --}}
            @if ($paginator->onFirstPage())
                <li class="w-10 h-10 flex items-center justify-center border border-gray-300 text-gray-400 bg-gray-100 rounded-l-lg">‹</li>
            @else
                <li>
                    <button wire:click="previousPage" class="w-10 h-10 flex items-center justify-center border border-gray-300 text-gray-700 bg-white hover:bg-gray-100">
                        ‹
                    </button>
                </li>
            @endif

            {{-- Números --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="w-10 h-10 flex items-center justify-center border border-gray-300 text-gray-400 bg-gray-100">...</li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="w-10 h-10 flex items-center justify-center border border-blue-500 text-white bg-blue-500 rounded-md">
                                {{ $page }}
                            </li>
                        @else
                            <li>
                                <button wire:click="gotoPage({{ $page }})" class="w-10 h-10 flex items-center justify-center border border-gray-300 text-gray-700 bg-white hover:bg-gray-100 rounded-md">
                                    {{ $page }}
                                </button>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Próximo --}}
            @if ($paginator->hasMorePages())
                <li>
                    <button wire:click="nextPage" class="w-10 h-10 flex items-center justify-center border border-gray-300 text-gray-700 bg-white hover:bg-gray-100">
                        ›
                    </button>
                </li>
            @else
                <li class="w-10 h-10 flex items-center justify-center border border-gray-300 text-gray-400 bg-gray-100 rounded-r-lg">›</li>
            @endif

            {{-- Última Página --}}
            @if ($paginator->hasMorePages())
                <li>
                    <button wire:click="gotoPage({{ $paginator->lastPage() }})" class="px-4 py-2 border border-gray-300 text-gray-700 bg-white hover:bg-gray-100 rounded-r-lg flex items-center justify-center">
                        Última »
                    </button>
                </li>
            @endif
        </ul>
    </nav>
@endif