let inputEmail = document.getElementById("input-sign-email");
let inputEmailConfirm = document.getElementById("input-sign-email-confirma");
let inputSenha = document.getElementById("input-sign-senha");
let inputSenhaConfirm = document.getElementById("input-sign-senha-confirma");
let formCadastro = document.getElementById("form-sign");

formCadastro.addEventListener('submit', (e) => {
    if (inputEmail.value !== inputEmailConfirm.value){
        e.preventDefault();
        alert("batata");
    }

    if (inputSenha.value !== inputSenhaConfirm.value){
        e.preventDefault();
        alert("adasd");
    }
})