@extends('layouts.app')
@section('titles')
<h2 class="description_title">{{ $book->title }}</h2>
@endsection
@section('content')
{{-- <div class="reader_page">
    <div class="reader_block">
        <div  class="reader_container">
            <h2>{{ $chapter->chapter_name }}</h2>
            <div id="reader_container" class="reader_container_text">
                @php
                $menu = 1;
                echo $chapter->chapter_text;
                @endphp
            </div>
        </div>

        <div class="reader_links">
            @if ($prev)
                <a href="{{ url('/reader/'. $book->slug. '/'. $prev->slug ) }}">Предыдущая</a>
            @else
            <div class="block_displ">
                
            </div>
            @endif
            <a href="{{ url('/book/'. $book->slug) }}">Оглавление</a>
            @if ($next)
            <a href="{{ url('/reader/'. $book->slug. '/'. $next->slug ) }}">Следующая</a>
            @else
            <div class="block_displ">
                &nbsp;
            </div>
            @endif
        </div>
    </div>

</div> --}}

@endsection
