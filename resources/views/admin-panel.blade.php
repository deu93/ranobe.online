@extends('layouts.app')
@section('content')
<div class="add_book_page">
    <div class="add_book_block">
        <h2>Панель администратора</h2>
        <form action="{{ url('/add-genre') }}" method="POST">
            @csrf
            <div class="add_book_item">
                <input type="text" name="genres_name" id="title" placeholder="Название жанра" value="{{ old('title') }}">
            </div>
            <div class="add_book_item_button">
                <button type="submit">Добавить</button>
            </div>
        </form>
    </div>
    
</div>
@endsection