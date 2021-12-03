@extends('layouts.app')

@section('content')
<div class="reader_page">
    <div class="reader_block">
        <div class="reader_container">
            <h2>{{ $chapter->chapter_name }}</h2>
            @php
                echo $chapter->chapter_text;
            @endphp
        </div>
        <div class="reader_links">
            @if ($prev)
                <a href="{{ url('/'. $book->slug. '/'. $prev->slug ) }}">Предыдущая</a>
            @else
            <div class="block_displ">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </div>
            @endif
            <a href="{{ url('/book/'. $book->slug) }}">Оглавление</a>
            @if ($next)
            <a href="{{ url('/'. $book->slug. '/'. $next->slug ) }}">Следующая</a>
            @else
            <div class="block_displ">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </div>
            @endif
            
        </div>
    </div>
    
</div>
@endsection
