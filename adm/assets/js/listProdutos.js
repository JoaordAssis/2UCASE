let selectStatus = document.getElementById("select-status");
let selectCategoria = document.getElementById("boselectx-categoria");
let selectOrdem = document.getElementById("select-ordem");

//* Select por status

function redirectStatus() {
  let opcaoTexto = selectStatus.options[selectStatus.selectedIndex].value;

  if (opcaoTexto !== "Todos") {
    if (opcaoTexto === "1") {
      window.location.href =
        "../controller/ControllerProdutoADM.php?filtro&selectStatus=" + opcaoTexto;
    }

    if (opcaoTexto === "0") {
      window.location.href =
        "../controller/ControllerProdutoADM.php?filtro&selectStatus=0" +
        opcaoTexto;
    }
  }

  if (opcaoTexto === "Todos") {
    window.location.href =
      "../controller/ControllerProdutoADM.php?filtro&selectStatus=";
  }
}

//* Select por categoria


function redirectCategoria() {
  let opcaoTexto = selectCategoria.options[selectCategoria.selectedIndex].value;

  if (opcaoTexto !== "Todos") {
    if (opcaoTexto === '0') {
    window.location.href =
      "../controller/ControllerProdutoADM.php?filtro&selectCategoria=0" + opcaoTexto;
      
    } else {

      window.location.href = "../controller/ControllerProdutoADM.php?filtro&selectCategoria=" + opcaoTexto;
    }
  }

  if (opcaoTexto === "Todos") {
    window.location.href =
      "../controller/ControllerProdutoADM.php?filtro&selectCategoria=" + opcaoTexto;
  }
}

//* Select por ordem de relevancia

function redirectOrdem() {
  var opcaoTexto = selectOrdem.options[selectOrdem.selectedIndex].value;

  if (opcaoTexto !== "Todos") {
    if (opcaoTexto === "0") {
      window.location.href =
        "../controller/ControllerProdutoADM.php?filtro&selectOrdem=0" + opcaoTexto;
    } else {
      window.location.href =
        "../controller/ControllerProdutoADM.php?filtro&selectOrdem=" + opcaoTexto;
    }
  }

  if (opcaoTexto === "Todos") {
    window.location.href =
      "../controller/ControllerProdutoADM.php?filtro&selectOrdem=" + opcaoTexto;
  }
}



function cleanFilters() {
  window.location.href = "./listProdutos.php";
}
