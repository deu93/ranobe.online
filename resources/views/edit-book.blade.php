@extends('layouts.app')
@section('content')
<div class="add_book_page">
    <div class="add_book_block">
        <h2>Редактировать книгу</h2>
        <form action="{{ url('/edit-book'. $book->slug) }}" method="PUT" enctype="multipart/form-data">
            @csrf
            <div class="add_book_item">
                <input type="text" name="title" id="title" placeholder="Название книги" value="{{ $book->title }}">
            </div>
            <div class="add_book_item">
                <textarea name="description" id="description"  placeholder="Описание">{{ $book->description }}</textarea>
            </div>
            <div class="add_book_item">
                <textarea name="about" id="about"  placeholder="Информация по книге">{{ $book->about }}</textarea>
            </div>
            <div class="add_book_item">
                <input type="text" name="author" id="author" placeholder="Автор" value="{{ $book->author }}">
            </div>
            <div class="add_book_item">
                <input type="text" name="country" id="country" placeholder="Страна" value="{{ $book->country }}">
            </div>
            <div class="book_genres_block">
                @foreach ($genres as $genre)
                <div class="add_book_genres">
                    <input type="checkbox" class="custom-checkbox" id="happy" name="{{ $genre->genres_name }}" value="{{ $genre->id }}">
                    <label for="happy">{{ $genre->genres_name }}</label>
                </div>
                @endforeach
            </div>

            <div class="add_book_item">
                <div class="input__wrapper">
                    <input type="file" name="image" id="input__file" class="input input__file" multiple>
                    <label for="input__file" class="input__file-button">
                       <span class="input__file-icon-wrapper"><img class="input__file-icon" src="{{ asset('img/download-arrow.png') }}" alt="Выбрать файл" width="25"></span>
                       <span class="input__file-button-text">Выберите файл</span>
                    </label>
                 </div>
            </div>

            <div class="add_book_item_button">
                <button type="submit">Добавить</button>
            </div>
        </form>
    </div>
    
</div>
@endsection