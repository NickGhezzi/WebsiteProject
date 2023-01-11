let emailInput = document.querySelector("#user-email");
let loginInput = document.querySelector("#user-name");
let passInput = document.querySelector("#user-password");
let pass2Input = document.querySelector("#pass2");

let emailError = document.createElement('div');
emailError.setAttribute("class", "warning");
document.querySelectorAll(".textfield")[0].append(emailError);

let loginError = document.createElement('div');
loginError.setAttribute("class", "warning");
document.querySelectorAll(".textfield")[1].append(loginError);

let passError = document.createElement('div');
passError.setAttribute("class", "warning");
document.querySelectorAll(".textfield")[2].append(passError);

let pass2Error = document.createElement('div');
pass2Error.setAttribute("class", "warning");
document.querySelectorAll(".textfield")[3].append(pass2Error);


let defaultMSg = "";
let emailErrorMsg = "X Email address should be non-empty with the format xyz@xyz.xyz."
let loginErrorMsg = "X User name should be non-empty, and within 20 character long."
let passErrorMsg = "X Password should be at least 6 characters: 1 uppercase, 1 lowercase."
let pass2ErrorMsg = "X Please retype password."

function validateEmail() {
    let email = emailInput.value;
    let regexp = /\S+@\S+\.\S+/;

    if (email.length == 0) {
        error = emailErrorMsg;
    }
    else if (regexp.test(email)) {
        error = defaultMSg;
    }
    else {
        error = emailErrorMsg;
    }
    return error;
}

function validateUsername() {
    let userName = loginInput.value;

    if (userName.length === 0 || userName.length > 20) {
        error = loginErrorMsg;
    }
    else {
        error = defaultMSg;
    }
    return error;
}

function validatePassword() {
    let password = passInput.value;
    let regexp = /(?=.*[a-z])(?=.*[A-Z]).{6,}/;

    if (regexp.test(password)) {
        error = defaultMSg;
    }
    else {
        error = passErrorMsg;
    }
    return error;
}

function validatePasswordRetype() {
    let password = passInput.value;
    let password2 = pass2Input.value;

    if (password !== password2 || password2.length === 0) {
        error = pass2ErrorMsg;
    }
    else {
        error = defaultMSg;
    }
    return error;
}

function validate() {
    let valid = true;//global validation 
    let emailValidation = validateEmail();
    let userNameValidation = validateUsername();
    let passwordValidation = validatePassword();
    let password2Validation = validatePasswordRetype();

    if (emailValidation !== defaultMSg) {
        emailError.textContent = emailValidation;
        document.getElementById("user-email").style = "border-color: red;";
        valid = false;
    }
    if (userNameValidation !== defaultMSg) {
        loginError.textContent = userNameValidation;
        document.getElementById("user-name").style = "border-color: red;";
        valid = false;
    }
    if (passwordValidation !== defaultMSg) {
        passError.textContent = passwordValidation;
        document.getElementById("user-password").style = "border-color: red;";
        valid = false;
    }
    if (password2Validation !== defaultMSg) {
        pass2Error.textContent = password2Validation;
        document.getElementById("pass2").style = "border-color: red;";
        valid = false;
    }
    console.log(valid);
    return valid;
};

emailInput.addEventListener("blur", () => {
    let x = validateEmail();
    if (x == defaultMSg) {
        emailError.textContent = defaultMSg;
        document.getElementById("user-email").style = "border-color: black;";
    }
});

loginInput.addEventListener("blur", () => {
    let x = validateUsername();
    if (x == defaultMSg) {
        loginError.textContent = defaultMSg;
        document.getElementById("user-name").style = "border-color: black;";
    }
});

passInput.addEventListener("blur", () => {
    let x = validatePassword();
    if (x == defaultMSg) {
        passError.textContent = defaultMSg;
        document.getElementById("user-password").style = "border-color: black;";
    }
});

pass2Input.addEventListener("blur", () => {
    let x = validatePasswordRetype();
    if (x == defaultMSg) {
        pass2Error.textContent = defaultMSg;
        document.getElementById("pass2").style = "border-color: black;";
    }
});



