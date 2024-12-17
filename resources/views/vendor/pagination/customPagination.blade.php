@if ($paginator->hasPages())
    <nav class="tw-flex tw-justify-between tw-items-center" aria-label="Pagination">
        <div class="tw-flex tw-justify-between tw-w-full tw-flex-1 md:tw-hidden">
            {{-- Previous Page Link (Mobile) --}}
            @if ($paginator->onFirstPage())
                <span class="tw-relative tw-inline-flex tw-items-center tw-px-4 tw-py-2 tw-text-sm tw-font-medium tw-text-purple-500/50 tw-border tw-border-purple-600 tw-cursor-default tw-rounded-md">
                    @lang('pagination.previous')
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="tw-relative tw-inline-flex tw-items-center tw-px-4 tw-py-2 tw-text-sm tw-font-medium tw-text-purple-200 tw-border tw-border-purple-600 tw-rounded-md hover:tw-bg-purple-800/60">
                    @lang('pagination.previous')
                </a>
            @endif

            <div class="tw-flex tw-gap-5">
                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <span class="tw-relative tw-inline-flex tw-items-center tw-px-4 tw-py-2 tw-text-sm tw-font-medium tw-text-gray-400">
                            ...
                        </span>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span class="tw-relative tw-z-10 tw-inline-flex tw-items-center tw-px-4 tw-py-2 tw-text-sm tw-font-medium tw-bg-purple-600 tw-text-white tw-rounded-md">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $url }}" class="tw-relative tw-inline-flex tw-items-center tw-px-4 tw-py-2 tw-text-sm tw-font-medium tw-text-gray-400 hover:tw-text-white focus:tw-z-20">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div>

            {{-- Next Page Link (Mobile) --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="tw-relative tw-inline-flex tw-items-center tw-px-4 tw-py-2 tw-text-sm tw-font-medium tw-text-purple-200 tw-border tw-border-purple-600 tw-rounded-md hover:tw-bg-purple-800/60">
                    @lang('pagination.next')
                </a>
            @else
                <span class="tw-relative tw-inline-flex tw-items-center tw-px-4 tw-py-2 tw-text-sm tw-font-medium tw-text-purple-500/50 tw-border tw-border-purple-600 tw-cursor-default tw-rounded-md">
                    @lang('pagination.next')
                </span>
            @endif
        </div>

        <div class="tw-hidden md:tw-flex-1 md:tw-flex md:tw-items-center md:tw-justify-between">
            <nav class="tw-flex-grow tw-isolate tw-inline-flex tw-space-x-1 tw-justify-between tw-pb-5" aria-label="Pagination">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <span class="tw-relative tw-inline-flex tw-items-center tw-px-2 tw-py-2 tw-text-gray-400 tw-cursor-default">
                        <span class="tw-sr-only">Previous</span>
                        <svg class="tw-w-5 tw-h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" class="tw-relative tw-inline-flex tw-items-center tw-px-2 tw-py-2 tw-text-gray-400 hover:tw-text-white focus:tw-z-20">
                        <span class="tw-sr-only">Previous</span>
                        <svg class="tw-w-5 tw-h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </a>
                @endif
                
                <div class="tw-flex tw-gap-5">
                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span class="tw-relative tw-inline-flex tw-items-center tw-px-4 tw-py-2 tw-text-sm tw-font-medium tw-text-gray-400">
                                ...
                            </span>
                        @endif
    
                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span class="tw-relative tw-z-10 tw-inline-flex tw-items-center tw-px-4 tw-py-2 tw-text-sm tw-font-medium tw-bg-purple-600 tw-text-white tw-rounded-md">
                                        {{ $page }}
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="tw-relative tw-inline-flex tw-items-center tw-px-4 tw-py-2 tw-text-sm tw-font-medium tw-text-gray-400 hover:tw-text-white focus:tw-z-20">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </div>

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" class="tw-relative tw-inline-flex tw-items-center tw-px-2 tw-py-2 tw-text-gray-400 hover:tw-text-white focus:tw-z-20">
                        <span class="tw-sr-only">Next</span>
                        <svg class="tw-w-5 tw-h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </a>
                @else
                    <span class="tw-relative tw-inline-flex tw-items-center tw-px-2 tw-py-2 tw-text-gray-400 tw-cursor-default">
                        <span class="tw-sr-only">Next</span>
                        <svg class="tw-w-5 tw-h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </span>
                @endif
            </nav>
        </div>
    </nav>
@endif