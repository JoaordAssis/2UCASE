let newSenha = document.getElementById("input_senha_new");
let confirmSenha = document.getElementById("input_confirm_senha");
let formUpdate = document.querySelector(".form-add-usuario");

if (newSenha.value !== confirmSenha.value) {
    formUpdate.addEventListener('submit', (event) => {
        event.preventDefault();
        alert('As senhas não conferem!')
    });
    
} 