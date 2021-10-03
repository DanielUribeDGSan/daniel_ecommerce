// const sign_in_btn = document.querySelector("#sign-in-btn");
// const sign_up_btn = document.querySelector("#sign-up-btn");
// const container = document.querySelector(".container-login");

// sign_up_btn.addEventListener("click", () => {
//     container.classList.add("sign-up-mode");
// });

// sign_in_btn.addEventListener("click", () => {
//     container.classList.remove("sign-up-mode");
// });

const mostrarPass = () => {
    const password = document.querySelector("#password");
    password.type = "text";

    document.querySelector('.mostrarPass').classList.remove('mostrar');
    document.querySelector('.mostrarPass').classList.add('ocultar');

    document.querySelector('.ocultarPass').classList.remove('ocultar');
    document.querySelector('.ocultarPass').classList.add('mostrar');
}

const ocultarPass = () => {
    const password = document.querySelector("#password");
    password.type = "password";

    document.querySelector('.mostrarPass').classList.remove('ocultar');
    document.querySelector('.mostrarPass').classList.add('mostrar');

    document.querySelector('.ocultarPass').classList.remove('mostrar');
    document.querySelector('.ocultarPass').classList.add('ocultar');
}


const mostrarPass2 = () => {
    const password = document.querySelector("#password_confirmation");
    password.type = "text";

    document.querySelector('.mostrarPass2').classList.remove('mostrar');
    document.querySelector('.mostrarPass2').classList.add('ocultar');

    document.querySelector('.ocultarPass2').classList.remove('ocultar');
    document.querySelector('.ocultarPass2').classList.add('mostrar');
}

const ocultarPass2 = () => {
    const password = document.querySelector("#password_confirmation");
    password.type = "password";

    document.querySelector('.mostrarPass2').classList.remove('ocultar');
    document.querySelector('.mostrarPass2').classList.add('mostrar');

    document.querySelector('.ocultarPass2').classList.remove('mostrar');
    document.querySelector('.ocultarPass2').classList.add('ocultar');
}
