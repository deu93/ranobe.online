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
            <a href="">Предыдущая</a>
            <a href="{{ url('/book/'. $book->slug) }}">Оглавление</a>
            <a href="#">Следующая</a>
            
        </div>
    </div>
    
</div>
@endsection
