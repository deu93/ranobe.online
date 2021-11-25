@extends('layouts.app')
@section('content')
<div class="add_book_page">
    <div class="add_book_block">
        <h2>Добавить книгу</h2>
        <form action="{{ url('/add-book') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="add_book_item">
                <input type="text" name="title" id="title" placeholder="Название книги" value="{{ old('title') }}">
            </div>
            <div class="add_book_item">
                <textarea name="description" id="description"  placeholder="Описание">{{ old('description') }}</textarea>
            </div>
            <div class="add_book_item">
                <textarea name="about" id="about"  placeholder="Информация по книге">{{ old('about') }}</textarea>
            </div>
            <div class="add_book_item">
                <input type="text" name="author" id="author" placeholder="Автор" value="{{ old('author') }}">
            </div>
            <div class="add_book_item">
                <input type="text" name="country" id="country" placeholder="Страна" value="{{ old('country') }}">
            </div>
            <div class="add_book_genres">
                <input type="checkbox" class="custom-checkbox" id="happy" name="happy" value="yes">
                <label for="happy">Жанр</label>
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