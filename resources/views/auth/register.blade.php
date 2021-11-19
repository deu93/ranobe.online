@extends('layouts.app')

@section('content')
<div class="login_page">
    <div class="login_block">
        <h2>Создайте аккаунт</h2>
        <form action="{{ url('register') }}" method="POST">
            <div class="auth_item">
                <input type="text" id="name" placeholder="Ваше имя">
            </div>
            <div class="auth_item">
                <input type="text" id="username" placeholder="Логин">
            </div>

            <div class="auth_item">
                <input type="email" id="email" placeholder="Email">
            </div>
            <div class="auth_item">
                <input type="password" id="password" placeholder="Введите пароль">
            </div>
            <div class="auth_item">
                <input type="password" id="password_confirmation" placeholder="Подтвердите пароль">
            </div>
            <div class="auth_item_button">
                <button type="submit">Войти</button>
            </div>
        </form>
    </div>
    
</div>
@endsection
