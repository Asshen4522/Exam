
<header class="header">
    <div class="header__left">
        <a href="/main" class="header__elem"><img src="/img/logo/logo_ok.png" alt="Мастер.ОК" class="logo"></a>
    </div>
    <div class="header__right">
        <a href="/main" class="header__elem font-reg">О нас</a>
        <a href="/main" class="header__elem font-reg">Каталог</a>
        <a href="/main" class="header__elem font-reg">Где нас найти?</a>
        <a href="/registration" class="header__elem font-reg">Зарегестрироваться</a>
        @guest
            <a href="/authorisation" class="header__elem font-reg">Войти</a>
        @endguest
        @auth
            <a href="/cabinet" class="header__elem font-reg">Личный кабинет</a>
            <a href="/DeAuthorisate" class="header__elem font-reg">Выйти</a>

        @endauth

    </div>
</header>