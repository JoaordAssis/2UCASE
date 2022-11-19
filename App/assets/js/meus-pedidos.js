class contactAnimation {
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


let btnMaior = document.getElementById('btn-maior');
let btnMenor = document.getElementById('btn-menor');
let btnAntigo = document.getElementById('btn-antigo');
let allButtons = document.querySelectorAll(".btn-pedidos");

let urlObjectPedidos = new URL(window.location.href);
let dataOrder = urlObjectPedidos.searchParams.has('order');

if (dataOrder === true){
  let errorGet = urlObjectPedidos.searchParams.get('order');

  if (errorGet === 'maior'){
    btnMaior.classList.add('active');
  }

  if (errorGet === 'menor'){
    btnMenor.classList.add('active');
  }

  if (errorGet === 'antigo'){
    btnAntigo.classList.add('active');
  }
}



function cleanPerguntas(){
  allButtons.forEach((el) => {
    el.classList.remove('active');
  });
}

function btnMaiorOrder(id){
  cleanPerguntas();
  btnMaior.classList.add('active');
  window.location.href="../controllers/ControllerOrderMeusPedidos.php?order=maior&idCliente=" + id;
}

function btnMenorOrder(id){
  cleanPerguntas();
  btnMenor.classList.add('active');
  window.location.href="../controllers/ControllerOrderMeusPedidos.php?order=menor&idCliente=" + id;
}


//MAIS RECENTE
function btnAntigoOrder(id){
  cleanPerguntas();
  btnAntigo.classList.add('active');
  window.location.href="../controllers/ControllerOrderMeusPedidos.php?order=antigo&idCliente=" + id;
}