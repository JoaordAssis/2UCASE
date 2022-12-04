let cepInput = document.getElementById("input-calcula-cep");
let buttonCep = document.querySelector(".button-cep-calc");
let freteText = document.getElementById("frete-value");
let totalText = document.getElementById("total-value");
let textReplace = totalText.innerText;
let replacedVariable = +textReplace.replace("R$", "");
let formSelectQuant = document.getElementById("form-change-quant");
let quantSelect = document.getElementById("quant-select");
let valueProduto = document.getElementById("value-frete-input");


function submitForm(event){
    event.submit();
}


//Calcular CEP
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
            let url  = '../../app/model/CEP.php?cep=' + cepInput.value + '&value=' + valueProduto.value;
            let dataResponse = [];

            fetch(url, {
                method: 'POST',
                body: data
            }).then(response =>  response.json())
                .then(response => {
                    dataResponse = response;
                    freteText.innerText = "R$ " + dataResponse[1]['Valor'];
                    let freteReplace = freteText.innerText;
                    let replacedFrete = +freteReplace.replace("R$", "").replace(",", ".");
                    let valorExibTotal = (replacedVariable + replacedFrete).toFixed(2);
                    totalText.innerHTML = valorExibTotal.toString().replace(".", ',');
                }).catch(error => console.log(error));
        });
    }
});
