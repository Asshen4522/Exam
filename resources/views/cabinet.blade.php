@extends('layout.app')
@section('body')
<div class="user-pages">
    <div class="cabinet">
        <div class="cabinet__blocks cabinet__blocks-left ">
            <h1 class="head font-bold">
                Личный кабинет
            </h1>
            <div class='font-reg'>
            <?= Auth::User()->cabinet()?>
            </div>
        </div>
        <div class="cabinet__blocks">
            <form action="/DeAuthorisate" method="POST" class="form__box cabinet__button cabinet__forms">
                @csrf
                @method('get')
                <input type="submit" class="form__input cabinet__button" value="Выйти из аккаунта">
            </form>
        </div>
    </div>
    <div>
        <h1 class="head font-bold">
            Создать заявку
        </h1>
    
        <form action="/OrderCreate" method="POST" name="orderCreate" class="form__box" novalidate>
            @csrf
            @method('post')
            <input type="text"name="adress" class="form__input" placeholder="Адрес помещения" required>
            <span class="form__error" data-error-name="adress"></span>
            
            <input type="text" name="description" class="form__input" placeholder="Описание" required>
            <span class="form__error" data-error-name="description"></span>

            <select name="category" class="form__input">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            <input type="text" name="maxCost" class="form__input" placeholder="Максимальная цена" required>
            <span class="form__error" data-error-name="maxCost"></span>
            <label class="form__input">
                <input type="file" name="photo" style="display: none" required>
                Выбрать файл
            </label>
            <span class="form__error" data-error-name="file"></span>

            <button type="button" class="form__submit font-bold">Отправить</button>
            <button type="submit" class="Submit"></button>
        </form>
    </div>
</div>
@endsection