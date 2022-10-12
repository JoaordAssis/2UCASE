
//Checar os selects de marca e modelo

let selectMarcaCelular = document.getElementById("select-marca");
let selectModeloCelularIphone = document.getElementById("select-modelo-iphone-label");
let selectModeloCelularSamsung = document.getElementById("select-modelo-samsung-label");

function selectCelularCheck(){
    let opcaoTexto =
        selectMarcaCelular.options[selectMarcaCelular.selectedIndex].value;


    if (opcaoTexto === 'Apple'){
        selectModeloCelularIphone.style.display = 'flex';
        selectModeloCelularSamsung.style.display = 'none';

    }


    if (opcaoTexto === 'Samsung'){
        selectModeloCelularIphone.style.display = 'none';
        selectModeloCelularSamsung.style.display = 'flex';
    }
}

//Trocar imagens do produto

let mainImageChange = document.getElementById("image-principal");

function imgChange(current){
    let mainImageChange = document.getElementById("image-principal");

    mainImageChange.src= current.src;
}


//Máscaras de input

const masks = {
    cep(value){
        return value
            .replace(/\D/g, "")
            .replace(/(\d{5})(\d)/, "$1-$2")
            .replace(/(-\d{3})\d+?$/, "$1");
    }
};

document.querySelectorAll('input').forEach(($input) => {
    const field = $input.dataset.js;
    $input.addEventListener('input', (e) => {
        e.target.value = masks[field](e.target.value);
    }, false);
});


