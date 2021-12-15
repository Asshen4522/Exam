const menu_button = document.querySelector("#menu_button")
const menu_list = document.querySelector("#menu_list")

if (menu_button) {
    menu_button.addEventListener("click", menu_toggle);
}

function menu_toggle() {
    if (menu_list.classList.contains('header__account-menu-close')) {
        menu_list.classList.add('header__account-menu-open')
        menu_list.classList.remove('header__account-menu-close')
    } else {
        menu_list.classList.add('header__account-menu-close')
        menu_list.classList.remove('header__account-menu-open')
    }
    console.log("есть")
}