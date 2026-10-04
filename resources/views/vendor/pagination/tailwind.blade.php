@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-center my-4">
        <ul class="inline-flex items-center space-x-1.5 sm:space-x-2 p-1.5 rounded-2xl bg-white border border-zinc-200/80 shadow-xs">
            
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li>
                    <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}"
                        class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl flex items-center justify-center text-zinc-300 cursor-not-allowed bg-zinc-50 select-none">
                        <iconify-icon icon="lucide:chevron-left" class="text-lg"></iconify-icon>
                    </span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                        aria-label="{{ __('pagination.previous') }}"
                        class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl flex items-center justify-center text-zinc-600 hover:text-brand-600 hover:bg-brand-50/80 active:scale-95 transition-all">
                        <iconify-icon icon="lucide:chevron-left" class="text-lg"></iconify-icon>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li>
                        <span class="w-8 h-9 sm:w-9 sm:h-10 flex items-center justify-center text-xs text-zinc-400 font-bold select-none">
                            {{ $element }}
                        </span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li>
                                <span aria-current="page"
                                    class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl flex items-center justify-center text-xs sm:text-sm font-extrabold bg-brand-600 text-white shadow-md shadow-brand-600/30 select-none">
                                    {{ $page }}
                                </span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}"
                                    class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl flex items-center justify-center text-xs sm:text-sm font-semibold text-zinc-600 hover:text-brand-600 hover:bg-zinc-100 active:scale-95 transition-all"
                                    aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                        aria-label="{{ __('pagination.next') }}"
                        class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl flex items-center justify-center text-zinc-600 hover:text-brand-600 hover:bg-brand-50/80 active:scale-95 transition-all">
                        <iconify-icon icon="lucide:chevron-right" class="text-lg"></iconify-icon>
                    </a>
                </li>
            @else
                <li>
                    <span aria-disabled="true" aria-label="{{ __('pagination.next') }}"
                        class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl flex items-center justify-center text-zinc-300 cursor-not-allowed bg-zinc-50 select-none">
                        <iconify-icon icon="lucide:chevron-right" class="text-lg"></iconify-icon>
                    </span>
                </li>
            @endif

        </ul>
    </nav>
@endif
