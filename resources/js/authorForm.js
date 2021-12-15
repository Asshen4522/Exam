
// Берем форму авторизации
const authorForm = document.forms['author']




// она не на всех страницах, так что проверка
if (authorForm) {
    const submitButton = authorForm.querySelector('.form__submit')

    submitButton.addEventListener('click', function (evt) {
        validate(authorForm);

        const inputs = Array.from(authorForm.querySelectorAll('.form__input'));
        if (inputs.every(input => input.validity.valid)) {
            const formTrigger = authorForm.querySelector("button.authSubmit");
            const event = new MouseEvent('click')

            formTrigger.dispatchEvent(event)
        }
    })
}

/**
 * @param {HTMLFormElement} form 
 */
function validate(form) {
    const inputs = Array.from(form.querySelectorAll('.form__input'));

    inputs.forEach(function (input) {
        if (input.name === 'password') {
            validatePassword(form['password'])
        } else if (input.name === 'login') {
            valiadateLogin(input)
        } else {
            validateInput(input);
        }
    })
}

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

/**
 * 
 * @param {HTMLInputElement} element 
 * @param {String} message 
 */
function renderError(element, message) {
    const elementName = element.name
    // console.log('render', elementName);
    const errorContainer = authorForm.querySelector(`[data-error-name="${elementName}"]`)
    errorContainer.textContent = message
}

/**
 * 
 * @param {HTMLElement} element 
 */
function hideError(element) {
    const elementName = element.name
    // console.log('hide', elementName);
    const errorContainer = authorForm.querySelector('[data-error-name="' + elementName + '"]')
    errorContainer.textContent = "";
}

/** 
 * @param {HTMLInputElement} password 
 * @returns 
 */
function validatePassword(password) {
    if ( password.validity.valid) {
        hideError(password)
    } else {
        const message = 'Введите пароль'
        renderError(password, message)
    }
}

/**
 * @param {HTMLInputElement} input 
 */
function valiadateLogin(input) {

    const reg = /[a-zA-Z]/g
    const matches = input.value.match(reg)

    if (input.validity.valid && matches && matches.length == input.value.length) {
        hideError(input)

    } else {
        renderError(input, 'Разрешены только латинские буквы')
    }
}