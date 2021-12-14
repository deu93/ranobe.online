@extends('layouts.app')
@section('title')
{{ $book->title }}
@endsection
@section('titles')
<h2 class="description_title"><a href="{{ url('/book/' . $book->slug) }}">{{ $book->title }}</a></h2>
@endsection
@section('content')
<div class="add_book_page">
    <div class="add_chapter_block1">
        
            <h2 >Добавить главы</h2>
        @if (auth()->user()->role == 5)
            <form action="{{ url('/add-chapters/'  . $book->slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="add_book_item">
                    <div class="input__wrapper">
                        <input type="file" name="file" id="input__file" class="input input__file" >
                        <label for="input__file" class="input__file-button">
                           <span class="input__file-icon-wrapper"><img class="input__file-icon" src="{{ asset('img/download-arrow.png') }}" alt="Выбрать файл" width="25"></span>
                           <span class="input__file-button-text">Выберите файл</span>
                        </label>
                     </div>
                </div>
                <div class="add_book_item_button1">
                    <button type="submit">Добавить</button>
                </div>
            </form>
            @endif
    </div>
    
</div>
@endsection
