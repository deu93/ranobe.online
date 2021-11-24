@extends('layouts.app')

@section('content')
<div class="add_book_page">
    <div class="add_book_block">
        <h2>Добавить книгу</h2>
        <form action="#">
            <div class="auth_item">
                <input type="email" id="email" placeholder="Введите email">
            </div>
            <div class="auth_item">
                <input type="password" id="password" placeholder="Введите пароль">
            </div>
            <div class="auth_item_button">
                <button type="submit">Войти</button>
            </div>
        </form>
    </div>
    
</div>
@endsection
