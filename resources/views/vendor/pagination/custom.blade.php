<nav class="pb-11 pb-lg-14 overflow-hidden">
    <ul class="pagination justify-content-center align-items-center mb-0">


        @if ($paginator->onFirstPage())
            <li class="page-item fs-12 d-none d-sm-block disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="page-link" tabindex="-1" aria-hidden="true"><i class="far fa-angle-double-left"></i></span>
            </li>
        @else
            <li class="page-item fs-12 d-none d-sm-block">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" tabindex="-1" rel="prev"
                    aria-label="@lang('pagination.previous')"><i class="far fa-angle-double-left"></i></a>
            </li>
        @endif

        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span>
                </li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active" aria-current="page"><span
                                class="page-link">{{ $page }}</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach


        @if ($paginator->hasMorePages())
            <li class="page-item fs-12 d-none d-sm-block">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="@lang('pagination.next')"><i
                        class="far fa-angle-double-right"></i></a>
            </li>
        @else
            <li class="page-item fs-12 d-none d-sm-block disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="page-link"><i class="far fa-angle-double-right"></i></span>
            </li>
        @endif
    </ul>
</nav>
