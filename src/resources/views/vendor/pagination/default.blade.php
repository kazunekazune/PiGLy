@if ($paginator->hasPages())
<nav class="custom-pagination-wrapper">
    <ul class="custom-pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <li class="custom-page disabled"><span>&lt;</span></li>
        @else
        <li class="custom-page"><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&lt;</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <li class="custom-page disabled"><span>{{ $element }}</span></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="custom-page active"><span>{{ $page }}</span></li>
        @else
        <li class="custom-page"><a href="{{ $url }}">{{ $page }}</a></li>
        @endif
        @endforeach
        @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li class="custom-page"><a href="{{ $paginator->nextPageUrl() }}" rel="next">&gt;</a></li>
        @else
        <li class="custom-page disabled"><span>&gt;</span></li>
        @endif
    </ul>
</nav>
@endif

<style>
    .custom-pagination-wrapper {
        display: flex;
        justify-content: center;
        margin: 24px 0 0 0;
    }

    .custom-pagination {
        display: flex;
        gap: 4px;
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .custom-page {
        min-width: 28px;
        height: 28px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        font-size: 1rem;
        font-weight: bold;
        background: #f5f5f7;
        color: #888;
        border: none;
        transition: background 0.2s, color 0.2s;
        padding: 0;
    }

    .custom-page a,
    .custom-page span {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
        color: inherit;
        text-decoration: none;
        font-size: 1rem;
    }

    .custom-page.active {
        background: linear-gradient(90deg, #f8cdda 0%, #f88fa7 100%);
        color: #fff;
        box-shadow: 0 2px 8px rgba(248, 141, 167, 0.08);
    }

    .custom-page.disabled {
        color: #ccc;
        background: #f5f5f7;
        cursor: not-allowed;
    }

    .custom-page:not(.active):not(.disabled):hover {
        background: #f8cdda;
        color: #fff;
    }
</style>