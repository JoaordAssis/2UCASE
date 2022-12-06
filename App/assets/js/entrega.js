const cepInput = document.getElementById('input-calcula-cep');
let buttonCep = document.querySelector(".button-cep-calc");
let tempoSedex = document.getElementById("tempo-entrega-sedex");
let tempoPac = document.getElementById("tempo-entrega-pac");
let freteSedex = document.getElementById("valor-sedex");
let fretePAC = document.getElementById("valor-pac");
let radioSedex = document.getElementById("radio-input-sedex");
let radioPac = document.getElementById("radio-input-pac");
let formDisable = document.querySelector(".btn-form-entrega");
let formEventListener = document.getElementById("form-entrega-frete");



const showData = (result) => {
    for (const campo in result) {
        if (document.querySelector('#' + campo)) {
            document.querySelector("#" + campo).value = result[campo];
        }
    }

};

cepInput.addEventListener('blur', (e) => {
    let search = cepInput.value;
    const url = `https://viacep.com.br/ws/${search}/json`;
    const options = {
        method: 'GET',
        mode: 'cors',
        cache: 'default'
    };

    fetch(url, options)
        .then(response => {
            response.json()
                .then(data => showData(data));
        })
        .catch(e => console.log('Deu Erro: ' + e.message));

});


//Máscaras de input

const masks = {
    cpf(value) {
        return value
            .replace(/\D/g, "")
            .replace(/(\d{2})(\d)/, "$1.$2")
            .replace(/(\d{3})(\d)/, "$1.$2")
            .replace(/(\d{3})(\d)/, "$1-$2")
            .replace(
                /(\d{2}).(\d)(\d{2}).(\d)(\d{2})-(\d)(\d)/,
                "$1$2.$3$4.$5$6-$7"
            )
            .replace(/(-\d{2})\d+?$/, "$1");
    },
    month(value){
        return value
            .replace(/\D/g, "")
            .replace(/(\d{2})(\d{4})/, "$1/$2")
    },

    number(value){
        return value
            .replace(/\D/g, "");
    },

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




//DESABILITAR FORMULARIO
formDisable.disabled = true;


let valueProduto = document.getElementById("value-frete-input");

//Calcular CEP
cepInput.addEventListener("blur", () => {
    if (cepInput.value.length === 0){
        buttonCep.disabled;
        console.log(cepInput.value.length);

    }else{
        buttonCep.addEventListener('blur', () => {
            let cepValue = {
                cep: cepInput.value,
                value: valueProduto.value
            }

            let data = JSON.stringify(cepValue);
            let url  = '../../app/model/CEP.php?cep=' + cepInput.value + '&value=' + valueProduto.value;
            let dataResponse = [];

            fetch(url, {
                method: 'POST',
                body: data
            }).then(response =>  response.json())
                .then(response => {
                    dataResponse = response;
                    freteSedex.innerText = "R$ " + dataResponse[1]['Valor'];
                    fretePAC.innerText = "R$ " + dataResponse[0]['Valor'];

                    formEventListener.addEventListener("change", () => {
                        if (radioPac.checked || radioSedex.checked){
                            formDisable.disabled = false;
                        }
                    });

                    radioSedex.value = dataResponse[1]['Valor'] + " " + dataResponse[1]['Codigo'];
                    radioPac.value = dataResponse[0]['Valor'] + " " + dataResponse[0]['Codigo'];

                    tempoSedex.innerText = "Sedex: " + dataResponse[1]['PrazoEntrega']
                        + " Dias úteis";
                    tempoPac.innerText = "PAC: " + dataResponse[0]['PrazoEntrega']
                        + " Dias úteis";



                }).catch(error => console.log(error));
        });
    }
});
