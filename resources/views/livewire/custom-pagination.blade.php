@if ($paginator->hasPages())
    <div class="pagination-wrapper">
        <nav aria-label="Courses pagination">
            <ul class="pagination justify-content-center">
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                            <i class="bi bi-chevron-left"></i>
                        </a>
                    </li>
                @else
                    <li class="page-item">
                        <button type="button" class="page-link" wire:click="previousPage" rel="prev" aria-label="@lang('pagination.previous')">
                            <i class="bi bi-chevron-left"></i>
                        </button>
                    </li>
                @endif

                @foreach ($elements as $element)
                    @if (is_string($element))
                        <li class="page-item disabled"><a class="page-link" href="#">{{ $element }}</a></li>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active" aria-current="page">
                                    <a class="page-link" href="#">{{ $page }}</a>
                                </li>
                            @else
                                <li class="page-item">
                                    <button type="button" class="page-link" wire:click="gotoPage({{ $page }})">{{ $page }}</button>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <button type="button" class="page-link" wire:click="nextPage" rel="next" aria-label="@lang('pagination.next')">
                            <i class="bi bi-chevron-right"></i>
                        </button>
                    </li>
                @else
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                            <i class="bi bi-chevron-right"></i>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
@endif
