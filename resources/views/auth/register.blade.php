@extends('layouts.app')

@section('content')
<div class="login_page">
    <div class="register_block">
        <h2>Создайте аккаунт</h2>
        <form action="{{ url('register') }}" method="POST">
            @csrf
            <div class="auth_item">
                <input type="text" id="name" class="@error('name') error
                @enderror" placeholder="Ваше имя">
            @error('name')
                <div class="error_text">
                    <h4>Введите корректные данные!</h4>
                </div>
            @enderror
            </div>
            <div class="auth_item">
                <input type="text" class="@error('username') error
                @enderror" id="username" placeholder="Логин">
                @error('username')
                <div class="error_text">
                    <h4>Введите корректные данные!</h4>
                </div>
            @enderror
            </div>

            <div class="auth_item">
                <input type="email" class="@error('email') error
                @enderror" id="email" placeholder="Email">
                @error('email')
                <div class="error_text">
                    <h4>Введите корректные данные!</h4>
                </div>
            @enderror
            </div>
            <div class="auth_item">
                <input type="password" class="@error('password') error
                @enderror" id="password" placeholder="Введите пароль">
                @error('password')
                <div class="error_text">
                    <h4>Введите корректные данные!</h4>
                </div>
                @enderror
            </div>
            <div class="auth_item">
                <input type="password" id="password_confirmation" placeholder="Подтвердите пароль">
            </div>
            <div class="reg_item_button">
                <button type="submit">Зарегистрироваться</button>
            </div>
        </form>
    </div>
    
</div>
@endsection
