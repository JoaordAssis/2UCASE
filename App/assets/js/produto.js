
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


//Calculo de CEP e Prazo

let cepInput = document.getElementById("input-calcula-cep");
let buttonCep = document.querySelector(".button-cep-calc");
let valueProduto = document.getElementById("value-frete-input");

//Elementos para exibição
let valueSedex = document.getElementById("value-sedex");
let prazoSedex = document.getElementById("prazo-sedex");
let valuePAC = document.getElementById("value-pac");
let prazoPAC = document.getElementById("prazo-pac");
let txtObs = document.getElementById("text-obs");



cepInput.addEventListener("blur", () => {
    if (cepInput.value.length === 0){
        buttonCep.disabled;
        console.log(cepInput.value.length);

    }else{
        buttonCep.addEventListener('click', () => {
            let cepValue = {
                cep: cepInput.value,
                value: valueProduto.value
            }

            let data = JSON.stringify(cepValue);
            //LINK DO MODEL TIRADO DA HOSPEDAGEM, PODE DAR ERRO AO TESTAR
            let url  = '../../app/model/CEP.php?cep=' + cepInput.value + '&value=' + valueProduto.value;
            let dataResponse = [];

            fetch(url, {
                method: 'POST',
                body: data
            }).then(response =>  response.json())
                .then(response => {
                    dataResponse = response;
                    valueSedex.innerText = "Sedex - Valor: R$" + dataResponse[1]['Valor'];
                    valuePAC.innerText = "PAC - Valor: R$" + dataResponse[0]['Valor'];

                    prazoSedex.innerText = "Prazo de Entrega: " + dataResponse[1]['PrazoEntrega']
                        + " Dias úteis";
                    prazoPAC.innerText = "Prazo de Entrega: " + dataResponse[0]['PrazoEntrega']
                        + " Dias úteis";

                    if (Object.entries(dataResponse[0]['obsFim']).length !== 0 && dataResponse[0]['obsFim'].constructor !== Object){
                        txtObs.innerText = dataResponse[0]['obsFim'];
                    }


                }).catch(error => console.log(error));
        });
    }
});


//Redirect por ordem

function redirectOrdem() {
    let opcaoTexto = selectOrdem.options[selectOrdem.selectedIndex].value;

    if (opcaoTexto !== "Todos") {
        if (opcaoTexto === "0") {
            window.location.href =
                "../controller/ControllerProdutoADM.php?selectOrdem=0" + opcaoTexto;
        } else {
            window.location.href =
                "../controller/ControllerProdutoADM.php?selectOrdem=" + opcaoTexto;
        }
    }

    if (opcaoTexto === "Todos") {
        window.location.href =
            "../controller/ControllerProdutoADM.php?selectOrdem=" + opcaoTexto;
    }
}



