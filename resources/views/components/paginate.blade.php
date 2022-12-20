@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled paginate_button page-item previous" aria-disabled="true" aria-label="@lang('pagination.previous')"
                    id="example1_previous">
                    <a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">&lsaquo;</a>
                </li>
            @else
                <li class="paginate_button page-item previous" aria-disabled="true" aria-label="@lang('pagination.previous')"
                    id="example1_previous">
                    <a href="{{ $paginator->previousPageUrl() }}" aria-controls="example1" data-dt-idx="0"
                        tabindex="0" class="page-link" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled paginate_button page-item" aria-disabled="true"><span aria-controls="example1"
                            data-dt-idx="1" tabindex="0" class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active paginate_button page-item" aria-current="page"><a href="#"
                                    aria-controls="example1" data-dt-idx="1" tabindex="0"
                                    class="page-link">{{ $page }}</a></li>
                        @else
                            <li><a href="{{ $url }}"aria-controls="example1" data-dt-idx="1" tabindex="0"
                                    class="page-link">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="paginate_button page-item next" id="example1_next">
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"
                        aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">&rsaquo;</a>
                </li>
            @else
                <li class="paginate_button page-item next disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <a href="#" rel="next" aria-hidden="true" class="page-link">&rsaquo;</a>
                    <span aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
