let selectAvaliacao = document.getElementById("boselectx-avaliacao");
let selectStatus = document.getElementById("select-status");

function redirectAvaliacao() {

    var opcaoTexto =
      selectAvaliacao.options[selectAvaliacao.selectedIndex].value;

    if (opcaoTexto !== 'Todos') {
        
        window.location.href = '../controller/ControllerComentarios.php?selectAvaliacao=' + opcaoTexto;

    } if(opcaoTexto === 'Todos') {
        window.location.href =
          "../controller/ControllerComentarios.php?selectAvaliacao=";
    }
}

function redirectStatus() {
  var opcaoTexto = selectStatus.options[selectStatus.selectedIndex].value;

  if (opcaoTexto !== "Todos") {
    if (opcaoTexto === "1") {
      window.location.href =
        "../controller/ControllerComentarios.php?selectStatus=" + opcaoTexto;
    }

    if (opcaoTexto === "0") {
      window.location.href =
        "../controller/ControllerComentarios.php?selectStatus=0" + opcaoTexto;
    }

  }

  if (opcaoTexto === "Todos") {
    window.location.href =
      "../controller/ControllerComentarios.php?selectStatus=";
  }
}

function cleanFilters() {
  window.location.href ="./ListComentarios.php";
}