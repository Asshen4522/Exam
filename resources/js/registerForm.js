
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
        if (input.name === 'name') {
            validateName(input);
        } else if (input.name === 'surname') {
            validateSurname(input);
        }  else if (input.name === 'patronymic') {
            validatePatronymic(input);
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

//Валидация имени
/**
 * @param {HTMLInputElement} input
 * @returns {Boolean}
 */
function validateName(input) {
    const reg = /[а-яА-Я \-]/g
    const matches = input.value.match(reg)
    if (matches) {
        hideError(input)
    } else {
        renderError(input, 'Name введено не верно: разрешены русские символы, пробелы и тире');
    }
}

//Валидация фамилии
/**
 * @param {HTMLInputElement} input
 * @returns {Boolean}
 */
 function validateSurname(input) {
    const reg = /[а-яА-Я \-]/g
    const matches = input.value.match(reg)
    if (matches) {
        hideError(input)
    } else {
        renderError(input, 'Surname введено не верно: разрешены русские символы, пробелы и тире');
    }
 }

//Валидация отчества
/**
 * @param {HTMLInputElement} input
 * @returns {Boolean}
 */
 function validatePatronymic(input) {
    const reg = /[а-яА-Я \-]/g
    const matches = input.value.match(reg)
    if (matches) {
        hideError(input)
    } else {
        renderError(input, 'patronymic введено не верно: разрешены русские символы, пробелы и тире');
    }
}


//Валидация пароля
/**
 * @param {HTMLInputElement} password
 * @param {HTMLInputElement} confirmPassword
 * @returns
 */
function validatePasswords(password, confirmPassword) {
    if ((password.value.length > 5)   && password.validity.valid && confirmPassword.validity.valid && password.value === confirmPassword.value) {
        hideError(password);
        hideError(confirmPassword)
    } else {
        const message = 'Пароль должен иметь минимум 6 символов и совпадать'
        renderError(password, message)
        renderError(confirmPassword, message)
    }
}

//валидация логина
/**
 * @param {HTMLInputElement} input
 */
function valiadateLogin(input) {

    const reg = /[a-zA-Z\d\-]/g
    const matches = input.value.match(reg)

    if (matches && matches.length == input.value.length) {
        hideError(input)
        validateRemote(input)

    } else {
        renderError(input, 'В логине разрешены только английские буквы, цифры и тире')
    }
}