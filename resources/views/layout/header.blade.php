
<header class="header">
    <div class="header__left">
        <a href="/main" class="header__elem"><img src="/img/logo/logo_ok.png" alt="Мастер.ОК" class="logo"></a>
    </div>
    <div class="header__right">
        <a href="/main" class="header__elem font-reg">Главная</a>
        <a href="/registration" class="header__elem font-reg">Зарегестрироваться</a>
        @guest
            <a href="/authorisation" class="header__elem font-reg">Войти</a>
        @endguest
        @auth
            <button class="header__elem font-reg" id="menu_button"><?= Auth::User()->getFio()?></button>
            <ul class="header__account-menu-close" id="menu_list">
                <li><a href="/cabinet" class="header__elem font-reg">Личный кабинет</a></li>
                <li><a href="#" class="header__elem font-reg">Мои заявки</a></li>
                <li><a href="#" class="header__elem font-reg">Новая заявка</a></li>
                <li><a href="/DeAuthorisate" class="header__elem font-reg">Выход</a></li>
            </ul>
        @endauth
        
    </div>
</header>