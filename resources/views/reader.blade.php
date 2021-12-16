@extends('layouts.app')
@section('title')
{{ $book->title }}
@endsection
@section('titles')
<h2 class="description_title">{{ $book->title }}</h2>
@endsection
@section('content')
@php
    $admin_block = 'reader_block';
    $admin_page  = 'reader_page';
@endphp            
            
            
@auth
@php
if(auth()) {
    if(auth()->user()->role == 5) {
        $admin_block = 'reader_admin_block';
        $admin_page = 'reader_admin_page';
        $admin = 1;
    }
}else{
    
}

@endphp
@endauth
            
<div class=" {{ $admin_page }}">
            
    <div class="{{ $admin_block }}  ">
        <div  class="reader_container">
            <h2>{{ $chapter->chapter_name }}</h2>
            
            <div id="reader_container" class="reader_container_text ">
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
</div>

@endsection
