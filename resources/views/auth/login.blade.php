@extends('layouts.app')

@section('content')
<div class="login_page">
    <div class="login_block">
        <h2>Войти в аккаунт</h2>
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
