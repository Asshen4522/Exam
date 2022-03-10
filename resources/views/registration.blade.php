@extends('layout.app')
@section('body')
<div class="user-pages">
    <h1 class="head font-bold">
        Форма регистрации
    </h1>

    <form action="/Registrate" method="POST" name="register" class="form__box" novalidate>
        @csrf
        @method('post')

        <input type="text"name="name" class="form__input" placeholder="name" required>
        <span class="form__error" data-error-name="name"></span>
        <input type="text"name="surname" class="form__input" placeholder="surname" required>
        <span class="form__error" data-error-name="surname"></span>
        <input type="text"name="patronymic" class="form__input" placeholder="patronymic">
        <span class="form__error" data-error-name="patronymic"></span>

        <input type="text" name="login" class="form__input" placeholder="login" required>
        <span class="form__error" data-error-name="login"></span>
        <input type="email" name="email" class="form__input" placeholder="email" required>
        <span class="form__error" data-error-name="email"></span>
        <input type="password" name="password" class="form__input" placeholder="password" required>
        <span class="form__error" data-error-name="password"></span>
        <input type="password" name="password_confirmed" class="form__input" placeholder="password_repeat" required>
        <span class="form__error" data-error-name="password_confirmed"></span>
        <label class="font-bold">
            <input type="checkbox" name="sogl" class="form__input" required>
            rules
        </label>
        <span class="form__error" data-error-name="sogl"></span>
        <button type="button" class="form__submit font-bold">Отправить</button>
        <button type="submit" class="Submit"></button>
    </form>
</div>
@endsection