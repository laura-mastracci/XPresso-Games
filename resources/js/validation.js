let errorName = document.getElementById("error-name");
let errorEmail = document.getElementById("error-email");
let errorPwd = document.getElementById("error-pwd");
let errorPwdConfirmation = document.getElementById("error-pwd-confirmation");

let name = document.getElementById("name");
let email = document.getElementById("email");
let pwd = document.getElementById("password");
let pwdConfirmation = document.getElementById("passwordConfirmation");

let values = [name, email, pwd, pwdConfirmation];
let errors = [errorName, errorEmail, errorPwd, errorPwdConfirmation];

let alreadyChecked = false;

document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("register");

    if(form){
        form.addEventListener("submit", function(){

        if (alreadyChecked){
            for (let i = 0; i < values.length; i++) {
                values[i].classList.remove("is-invalid");
                errors[i].classList.add("d-none");
                errors[i].innerHTML = "";
            }
        }
        validateForm(event);
    })
    }
    
});

function validateForm(e) {

    if (
        name.value.trim() == "" ||
        email.value.trim() == "" ||
        pwd.value.trim() == "" ||
        pwdConfirmation.value.trim() == ""
    ) {
        for (let i = 0; i < values.length; i++) {
            if (values[i].value.trim() == "") {
                values[i].classList.add("is-invalid");
                errors[i].classList.remove("d-none");
                errors[i].innerHTML = "Campo obbligatorio";
            }
            e.preventDefault();
        }
    }

    if(pwd.value.trim().length < 8){
        pwdValidation();
        e.preventDefault();
    }

    if (pwdConfirmation.value.trim() != pwd.value.trim()) {
        if (pwd.value.trim().length < 8) {
            pwdValidation();
            e.preventDefault();
            return;
        }
        errorPwdConfirmation.innerHTML = "La password non combacia";
        errorPwdConfirmation.classList.remove("d-none");
        pwdConfirmation.classList.add("is-invalid");
        e.preventDefault();
        
    }

    alreadyChecked = true;
}


function pwdValidation() {
    errorPwd.innerHTML = "La password deve essere lunga almeno 8 caratteri";
    errorPwd.classList.remove("d-none");
    pwd.classList.add("is-invalid");
}