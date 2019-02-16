@if ($paginator->lastPage() > 1)
    <ul class="pagination">
        @if ($pagination['startPage'] > 1)
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->url($pagination['startPage'] - 1) }}">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
        @endif
        @for ($i = $pagination['startPage']; $i <= $pagination['endPage']; $i++)
            <li class="page-item {{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
            </li>
        @endfor
        @if ($pagination['afterEndPage'] > $pagination['endPage'])
            <li class="page-item {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
                <a class="page-link" href="{{ $paginator->url($pagination['afterEndPage']) }}" >
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        @endif
    </ul>
@endif
