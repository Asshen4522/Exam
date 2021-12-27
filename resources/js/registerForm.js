
// Берем форму регистрации
const registerForm = document.forms['register']




// она не на всех страницах, так что проверка
if (registerForm) {
    const submitButton = registerForm.querySelector('.form__submit')

    submitButton.addEventListener('click', function (evt) {
        validate(registerForm);

        const inputs = Array.from(registerForm.querySelectorAll('.form__input'));
        if (inputs.every(input => input.validity.valid)) {
            const formTrigger = registerForm.querySelector("button.Submit");
            const event = new MouseEvent('click')

            formTrigger.dispatchEvent(event)
        }
    })
}


// проверка уникальности логина
/**
 * @param {HTMLInputElement} input 
 */
function validateRemote(input) {
    const ENDPOINT = '/Validate'
    const token = registerForm.querySelector('[name="_token"]').value

    fetch(ENDPOINT, {
        method: "POST",
        body: JSON.stringify({
            login: input.value
        }),
        headers: {
            'X-CSRF-TOKEN': token,
            'Content-Type': 'application/json'
        }
    }).then((response) => {
        return response.json()
    }).then(body => {
        if (body.success) {
            hideError(input)
        } else {
            renderError(input, 'Пользователь с таким логином уже есть')
        }
    })

}

//Начало валидации, прохордящей по списку 
/**
 * @param {HTMLFormElement} form 
 */
function validate(form) {
    const inputs = Array.from(form.querySelectorAll('.form__input'));

    inputs.forEach(function (input) {
        if (input.name === 'FIO') {
            validateFio(input);
        } else if (input.name === 'password' || input.name === 'password_confirmed') {
            validatePasswords(form['password'], form['password_confirmed'])
        } else if (input.name === 'login') {
            valiadateLogin(input)
        } else {
            validateInput(input);
        }
    })
}


//проверка валидности, проверяемой браузером (required в верстке)
/**
 * @param {HTMLInputElement} input 
 */
function validateInput(input) {
    if (!input.validity.valid) {
        renderError(input, input.validationMessage);
    } else {
        hideError(input)
    }
}


//вывод ошибки
/**
 * 
 * @param {HTMLInputElement} element 
 * @param {String} message 
 */
function renderError(element, message) {
    const elementName = element.name
    // console.log('render', elementName);
    const errorContainer = registerForm.querySelector(`[data-error-name="${elementName}"]`)
    errorContainer.textContent = message
    errorContainer.style.height = errorContainer.scrollHeight +'px'
}


// скрытие ошибки
/**
 * 
 * @param {HTMLElement} element 
 */
function hideError(element) {
    const elementName = element.name
    // console.log('hide', elementName);
    const errorContainer = registerForm.querySelector('[data-error-name="' + elementName + '"]')
    errorContainer.textContent = "";
    errorContainer.style.height = '0'
}

//Валидация ФИО
/**
 * @param {HTMLInputElement} input 
 * @returns {Boolean}
 */
function validateFio(input) {
    const reg = /[а-яА-Я \-]/g
    const matches = input.value.match(reg)
    // если два пробела, то валидно
    if (input.value.split(' ').length === 3 && matches && (matches.length+2) == input.value.length) {
        hideError(input)
    } else {
        renderError(input, 'ФИО введен не верно: разрешены русские символы, два пробела и дефис');
    }
}

//Валидация пароля
/** 
 * @param {HTMLInputElement} password 
 * @param {HTMLInputElement} confirmPassword 
 * @returns 
 */
function validatePasswords(password, confirmPassword) {
    if (password.validity.valid && confirmPassword.validity.valid && password.value === confirmPassword.value) {
        hideError(password);
        hideError(confirmPassword)
    } else {
        const message = 'Пароли должны совпадать'
        renderError(password, message)
        renderError(confirmPassword, message)
    }
}

//валидация логина
/**
 * @param {HTMLInputElement} input 
 */
function valiadateLogin(input) {

    const reg = /[a-zA-Z \.]/g
    const matches = input.value.match(reg)

    if (matches && matches.length == input.value.length) {
        hideError(input)
        validateRemote(input)

    } else {
        renderError(input, 'В логине разрешены только английские буквы и точки')
    }
}