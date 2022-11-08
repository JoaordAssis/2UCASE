class contactAnimation{
    accordionFunction() {
        let acc = document.getElementsByClassName("accordion");
        let i;

        for (i = 0; i < acc.length; i++) {
          acc[i].addEventListener("click", function () {
            this.classList.toggle("active");

            let panel = this.nextElementSibling;
            if (panel.style.display === "block") {
              panel.style.display = "none";
            } else {
              panel.style.display = "block";
            }
          });
        }
    }

    accordionAnimation() {
        let acc = document.getElementsByClassName("accordion");
        let i;

        for (i = 0; i < acc.length; i++) {
          acc[i].addEventListener("click", function () {
            this.classList.toggle("active");
            let panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
              panel.style.maxHeight = null;
            } else {
              panel.style.maxHeight = panel.scrollHeight + "px";
            }
          });
        }
    }
}

let accordion = new contactAnimation();

accordion.accordionFunction();
accordion.accordionAnimation();


//Máscaras de input

const masks = {
    phone(value) {
        return value
            .replace(/\D/g, "")
            .replace(/^(\d{2})(\d)/g, "($1) $2")
            .replace(/(\d)(\d{4})$/,"$1-$2");
    }
};

document.querySelectorAll("input").forEach(($input) => {
    const field = $input.dataset.js;
    $input.addEventListener(
        "input",
        (e) => {
            e.target.value = masks[field](e.target.value);
        },
        false
    );
});



//Troca de perguntas

let allButtons = document.querySelectorAll(".question-buttons button");
let selectMobilePergunta = document.getElementById("select-questions-group");



let btnPagamento = document.getElementById('btn-pagamento');
let btnEntrega = document.getElementById('btn-entrega');
let btnProdGarantia = document.getElementById('btn-prod-garantia');
let btnTdr = document.getElementById('btn-tdr');
let btnPromo = document.getElementById('btn-promo-cupom');

//DIVs de pergunta
let allPerguntas = document.querySelectorAll('.pergunta');
let perguntaPagamento = document.querySelectorAll('.pagamento-pergunta');
let perguntaEntrega = document.querySelectorAll('.entrega-pergunta');
let perguntaProdGarantia = document.querySelectorAll('.prod-garantia-pergunta');
let perguntaTDR = document.querySelectorAll('.tdr-pergunta');
let perguntaPromo = document.querySelectorAll('.promo-pergunta');


function cleanPerguntas(){
    allPerguntas.forEach((el) => {
        el.classList.remove('active');
    });
}

allButtons.forEach((element) => {
    element.addEventListener('click', () => {
        for (let i = 0; i < allButtons.length; i++){
            if (allButtons[i].classList.contains('active')){
                allButtons[i].classList.remove('active');
            }
        }
        element.classList.add('active');

        if (btnPagamento.classList.contains('active')){
            cleanPerguntas();
            for (let a = 0; a < perguntaPagamento.length; a++){
                perguntaPagamento[a].classList.add('active');
            }

        }else if(btnEntrega.classList.contains('active')){
            cleanPerguntas();
            for (let a = 0; a < perguntaEntrega.length; a++){
                perguntaEntrega[a].classList.add('active');
            }

        }else if(btnProdGarantia.classList.contains('active')){
            cleanPerguntas();
            for (let a = 0; a < perguntaProdGarantia.length; a++){
                perguntaProdGarantia[a].classList.add('active');
            }

        }else if(btnTdr.classList.contains('active')){
            cleanPerguntas();
            for (let a = 0; a < perguntaTDR.length; a++){
                perguntaTDR[a].classList.add('active');
            }

        }else if(btnPromo.classList.contains('active')){
            cleanPerguntas();
            for (let a = 0; a < perguntaPromo.length; a++){
                perguntaPromo[a].classList.add('active');
            }

        }

    });
});


//MOBILE

function mobileContactPerguntas(){
    let opcaoTexto = selectMobilePergunta.options[selectMobilePergunta.selectedIndex].value;

    if (opcaoTexto === 'pagamento'){
        cleanPerguntas();
        for (let a = 0; a < perguntaPagamento.length; a++){
            perguntaPagamento[a].classList.add('active');
        }

    }else if(opcaoTexto === 'entrega'){
        cleanPerguntas();
        for (let a = 0; a < perguntaEntrega.length; a++){
            perguntaEntrega[a].classList.add('active');
        }

    }else if(opcaoTexto === 'produto-garantia'){
        cleanPerguntas();
        for (let a = 0; a < perguntaProdGarantia.length; a++){
            perguntaProdGarantia[a].classList.add('active');
        }

    }else if(opcaoTexto === 'TDR'){
        cleanPerguntas();
        for (let a = 0; a < perguntaTDR.length; a++){
            perguntaTDR[a].classList.add('active');
        }

    }else if(opcaoTexto === 'promo'){
        cleanPerguntas();
        for (let a = 0; a < perguntaPromo.length; a++){
            perguntaPromo[a].classList.add('active');
        }
    }
}

