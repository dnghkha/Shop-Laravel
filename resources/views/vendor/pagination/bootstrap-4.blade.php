@if ($paginator->hasPages())
<nav>
    <div class="product__pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <a class="bg-light disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <span class="" aria-hidden="true">&lsaquo;</span>
        </a>
        @else
        <a class="bg-light " href="{{ $paginator->previousPageUrl() }}" rel="prev"
            aria-label="@lang('pagination.previous')">&lsaquo;</a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        {{-- @if (is_string($element))
        <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
        @endif --}}

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <a class=" active" aria-current="">{{ $page }}</a>
        @else
        <a class="" href="{{ $url }}">{{ $page }}</a>
        @endif
        @endforeach
        @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <a class="bg-light" href="{{ $paginator->nextPageUrl() }}" rel="next"
            aria-label="@lang('pagination.next')">&rsaquo;</a>
        @else
        <a class="bg-light disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
            <span class="" aria-hidden="true">&rsaquo;</span>
        </a>
        @endif
    </div>
</nav>
@endif
