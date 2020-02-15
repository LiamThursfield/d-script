@if ($paginator->hasPages())
    <nav class="inline-block">
        <ul class="flex flex-row">
            {{-- Previous Page Link --}}
            <div class="bg-white mr-2 overflow-hidden rounded-full">
                @if ($paginator->onFirstPage())
                    <li
                        class="cursor-not-allowed opacity-50 px-4 py-1"
                        aria-disabled="true"
                    >
                        <span>@lang('pagination.previous')</span>
                    </li>
                @else
                    <li>
                        <a
                            class="block text-gray-700 px-4 py-1 hover:text-gray-900"
                            href="{{ $paginator->previousPageUrl() }}"
                            rel="prev"
                        >
                            @lang('pagination.previous')
                        </a>
                    </li>
                @endif
            </div>

            {{-- Next Page Link --}}
            <div class="bg-white ml-2 overflow-hidden rounded-full">
                @if ($paginator->hasMorePages())
                    <li>
                        <a
                            class="block text-gray-700 px-4 py-1 hover:text-gray-900"
                            href="{{ $paginator->nextPageUrl() }}"
                            rel="next"
                        >
                            @lang('pagination.next')
                        </a>
                    </li>
                @else
                    <li
                        class="cursor-not-allowed opacity-50 px-4 py-1"
                        aria-disabled="true"
                    >
                        <span>@lang('pagination.next')</span>
                    </li>
                @endif
            </div>
        </ul>
    </nav>
@endif
