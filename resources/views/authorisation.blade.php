@extends('layout.app')
@section('body')
<div class="user-pages">
    <h1 class="head font-bold">
        Форма авторизации
    </h1>

    <form action="/Authorisate" method="POST" name="author" class="form__box">
        @csrf
        @method('post')
        <input type="text" name="login" class="form__input" placeholder="Login" required>
        <span class="form__error" data-error-name="login"></span>
        <input type="password" name="password" class="form__input" placeholder="Password" required>
        <span class="form__error" data-error-name="password"></span>
        <button type="button" class="form__submit font-bold">Войти</button>
        <button type="submit" class="Submit"></button>

    </form>
</div>
@endsection