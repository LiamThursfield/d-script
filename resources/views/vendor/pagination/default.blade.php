@if ($paginator->hasPages())
    <nav class="inline-block">
        <ul class="flex flex-row items-center">
            {{-- Previous Page Link --}}
            <div class="mr-4 rounded-full overflow-hidden shadow-md">
                @if ($paginator->onFirstPage())
                    <li
                        class="bg-white cursor-not-allowed opacity-50 px-4 py-1"
                        aria-disabled="true"
                        aria-label="@lang('pagination.previous')"
                    >
                        <span aria-hidden="true">&lsaquo;</span>
                    </li>
                @else
                    <li>
                        <a
                            class="bg-white block px-4 py-1 text-gray-500 hover:text-gray-700"
                            href="{{ $paginator->previousPageUrl() }}"
                            rel="prev"
                            aria-label="@lang('pagination.previous')"
                        >
                            &lsaquo;
                        </a>
                    </li>
                @endif
            </div>

            {{-- Pagination Elements --}}
            <div class="bg-white flex flex-row items-center px-4 rounded-full shadow-md">
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li
                            class="px-2 py-1"
                            aria-disabled="true"
                        >
                            <span>{{ $element }}</span>
                        </li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="font-bold px-2 py-1 text-gray-900" aria-current="page"><span>{{ $page }}</span></li>
                            @else
                                <li><a href="{{ $url }}" class="px-2 py-1 text-gray-500 hover:text-gray-700">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div>

            {{-- Next Page Link --}}
            <div class="ml-4 rounded-full overflow-hidden shadow-md">
                @if ($paginator->hasMorePages())
                    <li>
                        <a
                            class="bg-white block px-4 py-1 text-gray-500 hover:text-gray-700"
                            href="{{ $paginator->nextPageUrl() }}"
                            rel="next"
                            aria-label="@lang('pagination.next')"
                        >
                            &rsaquo;
                        </a>
                    </li>
                @else
                    <li
                        class="bg-white cursor-not-allowed opacity-50 px-4 py-1"
                        aria-disabled="true"
                        aria-label="@lang('pagination.next')"
                    >
                        <span aria-hidden="true">&rsaquo;</span>
                    </li>
                @endif
            </div>
        </ul>
    </nav>
@endif
