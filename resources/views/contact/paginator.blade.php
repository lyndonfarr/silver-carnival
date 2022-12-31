<ul role="navigation" class="pagination mb-0">
    @if ($contacts->onFirstPage())
        <li aria-disabled="true" aria-label="« First Page" class="page-item disabled">
            <span aria-hidden="true" class="page-link  border-top-0 border-bottom-0">‹‹</span>
        </li>
        <li aria-disabled="true" aria-label="« Previous" class="page-item disabled">
            <span aria-hidden="true" class="page-link  border-top-0 border-bottom-0">‹</span>
        </li>
    @else
        <li aria-disabled="true" aria-label="« First Page" class="page-item">
            <a href="{{ $contacts->url(1) }}" rel="first" aria-label="« First Page" class="page-link  border-top-0 border-bottom-0 text-dark">‹‹</a>
        </li>
        <li class="page-item">
            <a href="{{ $contacts->previousPageUrl() }}" rel="prev" aria-label="« Previous" class="page-link  border-top-0 border-bottom-0 text-dark">‹</a>
        </li>
    @endif

    @php
        $numberOfPagesToShowEitherSideWhenEqual = 2;

        $startingPageNumber = $contacts->currentPage() - $numberOfPagesToShowEitherSideWhenEqual;
        if ($startingPageNumber < 1) {
            $startingPageNumber = 1;
        }

        $endingPageNumber = $startingPageNumber + ($numberOfPagesToShowEitherSideWhenEqual * 2);
        if ($endingPageNumber > $contacts->lastPage()) {
            $endingPageNumber = $contacts->lastPage();
            $startingPageNumber = $contacts->lastPage() - ($numberOfPagesToShowEitherSideWhenEqual * 2);
        }

        if ($startingPageNumber < 1) {
            $startingPageNumber = 1;
        }
    @endphp

    @for ($pageNumber = $startingPageNumber; $pageNumber <= $endingPageNumber; $pageNumber ++)
        <li aria-current="page" class="page-item {{ $contacts->currentPage() === $pageNumber ? 'active' : '' }}">
            @if ($contacts->currentPage() === $pageNumber)
                <span class="page-link  border-top-0 border-bottom-0 bg-dark text-white border-dark">{{ $pageNumber }}</span>
            @else
                <a href="{{ $contacts->url($pageNumber) }}" class="page-link  border-top-0 border-bottom-0 text-dark">{{ $pageNumber }}</a>
            @endif
        </li>
    @endfor

    @if ($contacts->lastPage() === $contacts->currentPage())
        <li aria-disabled="true" aria-label="Next »" class="page-item disabled">
            <span aria-hidden="true" class="page-link  border-top-0 border-bottom-0">›</span>
        </li>
        <li aria-disabled="true" aria-label="Last Page »" class="page-item disabled">
            <span aria-hidden="true" class="page-link  border-top-0 border-bottom-0">››</span>
        </li>
    @else
        <li class="page-item">
            <a href="{{ $contacts->nextPageUrl() }}" rel="next" aria-label="Next »" class="page-link  border-top-0 border-bottom-0 text-dark">›</a>
        </li>
        <li aria-disabled="true" aria-label="Last Page »" class="page-item">
            <a href="{{ $contacts->url($contacts->lastPage()) }}" rel="last" aria-label="Last Page »" class="page-link  border-top-0 border-bottom-0 text-dark">››</a>
        </li>
    @endif
</ul>