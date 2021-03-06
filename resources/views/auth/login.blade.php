@extends('layouts.app')

@section('content')
<div class="login_page">
    <div class="login_block">
        <h2>Войдите в свой аккаунт</h2>
        <form action="{{ url('/login') }}" method="POST">
            @csrf
            <div class="auth_item">
                <input type="email" id="email" name="email" placeholder="Введите email">
                @error('email')
                <h4>Введите корректные данные!</h4>
                @enderror
            </div>
            <div class="auth_item">
                <input type="password" name="password" id="password" placeholder="Введите пароль">
                @error('password')
                <h4>Введите корректные данные!</h4>
                @enderror
            </div>
            <div class="auth_item">
                <div class="remember_me">
                    <label for="remember">Запомнить меня</label>
                <input type="checkbox" name="remember">
                </div>
            </div>
            <div class="auth_item_button">
                <button type="submit">Войти</button>
            </div>
        </form>
    </div>
    
</div>
@endsection
