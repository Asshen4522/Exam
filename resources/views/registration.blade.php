@extends('layout.app')
@section('body')
<div class="user-pages">
    <h1 class="head font-bold">
        Форма регистрации
    </h1>

    <form action="/Registrate" method="POST" name="register" class="form__box" novalidate>
        @csrf
        @method('post')
        <input type="text"name="FIO" class="form__input" placeholder="ФИО" required>
        <span class="form__error" data-error-name="FIO"></span>
        <input type="text" name="login" class="form__input" placeholder="Логин" required>
        <span class="form__error" data-error-name="login"></span>
        <input type="email" name="email" class="form__input" placeholder="Почта" required>
        <span class="form__error" data-error-name="email"></span>
        <input type="password" name="password" class="form__input" placeholder="Пароль" required>
        <span class="form__error" data-error-name="password"></span>
        <input type="password" name="password_confirmed" class="form__input" placeholder="Подтверждение пароля" required>
        <span class="form__error" data-error-name="password_confirmed"></span>
        <label>
            <input type="checkbox" name="sogl" class="form__input" required>
            Обработка пользовательских данных?
        </label>
        <span class="form__error" data-error-name="sogl"></span>
        <button type="button" class="form__submit">Отправить</button>
        <button type="submit" class="regSubmit"></button>
    </form>
</div>
@endsection