
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



