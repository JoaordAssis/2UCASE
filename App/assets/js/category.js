class categoryAnimation {
  accordionFunction() {
    let acc = document.getElementsByClassName("accordion");
    let i;

    for (i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function () {
        /* Toggle between adding and removing the "active" class,
    to highlight the button that controls the panel */
        this.classList.toggle("active");

        /* Toggle between hiding and showing the active panel */
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

let accordion = new categoryAnimation();

accordion.accordionFunction();
accordion.accordionAnimation();


//Redirect por ordem
let selectOrdem = document.getElementById("order-select");

function redirectOrdem(categoria) {
  let opcaoTexto = selectOrdem.options[selectOrdem.selectedIndex].value;

  if (opcaoTexto !== "Todos") {
    if (opcaoTexto === "0") {
      window.location.href =
          "../controllers/ControllerCategoria.php?category=" + categoria + "&selectOrdem=0" + opcaoTexto;
    } else {
      window.location.href =
          "../controllers/ControllerCategoria.php?category=" + categoria + "&selectOrdem=" + opcaoTexto;
    }
  }

  if (opcaoTexto === "Todos") {
    window.location.href =
        "../controllers/ControllerCategoria.php?category=" + categoria + "&selectOrdem=" + opcaoTexto;
  }
}

// Bloquear select PRODUTO

let selectModelo = document.getElementById("select-modelo-samsung-label");
let formProduto = document.getElementById("form-prod-carrinho");

//MUDAR CATEGORIA

let formChange = document.getElementById("form-change-category");

formChange.addEventListener('change', () => {
  formChange.submit();
});