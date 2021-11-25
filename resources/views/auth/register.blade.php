@extends('layouts.app')

@section('content')
<div class="login_page">
    <div class="register_block">
        <h2>Создайте аккаунт</h2>
        
        <form action="{{ url('register') }}" method="POST">
            @csrf
            <div class="auth_item">
                <input type="text" name="name" id="name" class="@error('name') error
                @enderror" placeholder="Ваше имя" value="{{ old('name') }}">
            @error('name')
                <div class="error_text">
                    <h4>Введите корректные данные!</h4>
                </div>
            @enderror
            </div>
            <div class="auth_item">
                <input type="text" name="username" class="@error('username') error
                @enderror" id="username" placeholder="Логин" value="{{ old('username') }}">
                @error('username')
                <div class="error_text">
                    <h4>Введите корректные данные!</h4>
                </div>
            @enderror
            </div>

            <div class="auth_item">
                <input type="email" name="email" class="@error('email') error
                @enderror" id="email" placeholder="Email" value="{{ old('email') }}">
                @error('email')
                <div class="error_text">
                    <h4>Введите корректные данные!</h4>
                </div>
            @enderror
            </div>
            <div class="auth_item">
                <input type="password" name="password" class="@error('password') error
                @enderror" id="password" placeholder="Введите пароль">
                @error('password')
                <div class="error_text">
                    <h4>Введите корректные данные!</h4>
                </div>
                @enderror
            </div>
            <div class="auth_item">
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Подтвердите пароль">
            </div>
            <div class="reg_item_button">
                <button type="submit">Зарегистрироваться</button>
            </div>
        </form>
    </div>
    
</div>
@endsection
