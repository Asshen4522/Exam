@extends('layout.app')
@section('body')
<div>
    <div class="font-bold form__caption">Добавление категории</div>
    <form action="/addCategory" method="POST">
        @csrf
        @method('post')
        <input type="text" name="categoryName" class="form__input" placeholder="Название" required>
        <input type="text" name="categoryDesc" class="form__input" placeholder="Описание" >
        <button type="submit" class="form__submit font-bold">Войти</button>

    </form>
</div>

@endsection