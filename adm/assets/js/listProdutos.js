let selectStatus = document.getElementById("select-status");
let selectCategoria = document.getElementById("boselectx-categoria");
let selectOrdem = document.getElementById("select-ordem");

//* Select por status


function redirectStatus() {
  var opcaoTexto = selectStatus.options[selectStatus.selectedIndex].value;

  if (opcaoTexto !== "Todos") {
    if (opcaoTexto === "1") {
      window.location.href =
        "../controller/ControllerProdutoADM.php?selectStatus=" + opcaoTexto;
    }

    if (opcaoTexto === "0") {
      window.location.href =
        "../controller/ControllerProdutoADM.php?selectStatus=0" +
        opcaoTexto;
    }
  }

  if (opcaoTexto === "Todos") {
    window.location.href =
      "../controller/ControllerProdutoADM.php?selectStatus=";
  }
}

//* Select por categoria


function redirectCategoria() {
  var opcaoTexto = selectCategoria.options[selectCategoria.selectedIndex].value;

  if (opcaoTexto !== "Todos") {
    if (opcaoTexto === '0') {
    window.location.href =
      "../controller/ControllerProdutoADM.php?selectCategoria=0" + opcaoTexto;
      
    } else {

      window.location.href = "../controller/ControllerProdutoADM.php?selectCategoria=" + opcaoTexto;
    }
  }

  if (opcaoTexto === "Todos") {
    window.location.href =
      "../controller/ControllerProdutoADM.php?selectCategoria=" + opcaoTexto;
  }
}

//* Select por ordem de relevancia

function redirectOrdem() {
  var opcaoTexto = selectOrdem.options[selectOrdem.selectedIndex].value;

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



function cleanFilters() {
  window.location.href = "./listProdutos.php";
}
