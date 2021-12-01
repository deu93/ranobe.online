@if ($paginator->hasPages())
    <ul class="pager">
       
        {{-- @if ($paginator->onFirstPage())
            <li class="disabled pagination"><span>← Предыдущая</span></li>
        @else
            <li class="pagination"><a  href="{{ $paginator->previousPageUrl() }}" rel="prev">← Предыдущая</a></li>
        @endif --}}


      
        @foreach ($elements as $element)
           
            @if (is_string($element))
                <li class="disabled pagination"><span>{{ $element }}</span></li>
            @endif


           
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active my-active pagination"><span>{{ $page }}</span></li>
                    @else
                        <li class="pagination"><a  href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach


        
        {{-- @if ($paginator->hasMorePages())
            <li class="pagination"><a  href="{{ $paginator->nextPageUrl() }}" rel="next">Следующая →</a></li>
        @else
            <li class="disabled"><span>Следующая →</span></li>
        @endif --}}
    </ul>
@endif 