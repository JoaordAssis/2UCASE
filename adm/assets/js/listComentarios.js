let selectAvaliacao = document.getElementById("boselectx-avaliacao");
let selectStatus = document.getElementById("select-status");
let selectData = document.querySelectorAll("input[type=date]");

function redirectAvaliacao() {
  var opcaoTexto = selectAvaliacao.options[selectAvaliacao.selectedIndex].value;

  if (opcaoTexto !== "Todos") {
    window.location.href =
      "../controller/ControllerComentarios.php?selectAvaliacao=" + opcaoTexto;
  }
  if (opcaoTexto === "Todos") {
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

// * Ordenando por data

function checkInputs(inputs) {
  var filled = true;

  inputs.forEach(function (input) {
    if (input.value === "") {
      filled = false;
    }
  });

  return filled;
}

selectData.forEach(function (input) {
  input.addEventListener("change", function () {
    if (checkInputs(selectData)) {
        window.location.href = "../controller/ControllerComentarios.php?dataStart=" + selectData[0].value + "&dataEnd=" + selectData[1].value;
    }
  });
});


function cleanFilters() {
  window.location.href = "./ListComentarios.php";
}
