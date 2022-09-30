let selectStatus = document.getElementById("select-status");
let selectCategoria = document.getElementById("boselectx-categoria");

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

function redirectCategoria() {
  var opcaoTexto = selectCategoria.options[selectCategoria.selectedIndex].value;

  if (opcaoTexto !== "Todos") {
    window.location.href = "../controller/ControllerProdutoADM.php?selectCategoria=" + opcaoTexto;
  }

  if (opcaoTexto === "Todos") {
    window.location.href =
      "../controller/ControllerProdutoADM.php?selectCategoria=" + opcaoTexto;
  }
}

function cleanFilters() {
  window.location.href = "./listProdutos.php";
}
