@if ($paginator->hasPages())
    <ul>
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item disabled d-none d-md-block" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                    <a href="{{$url}}" class="is-active"><li></li></a>
                    @else
                    <a href="{{$url}}"><li></li></a>
                    @endif
                @endforeach
            @endif
        @endforeach
    </ul>
@endif
