let selectOrdem = document.getElementById("select-ordem");
let selectStatus = document.getElementById("select-status");
let selectData = document.querySelectorAll("input[type=date]");

function redirectOrdem() {
  var opcaoTexto = selectOrdem.options[selectOrdem.selectedIndex].value;

  if (opcaoTexto !== "Todos") {
    if (opcaoTexto === "0") {
      window.location.href =
        "../controller/ControllerPedidosADM.php?selectOrdem=0" + opcaoTexto;
    } else {
      window.location.href =
        "../controller/ControllerPedidosADM.php?selectOrdem=" + opcaoTexto;
    }
  }

  if (opcaoTexto === "Todos") {
    window.location.href =
      "../controller/ControllerPedidosADM.php?selectOrdem=" + opcaoTexto;
  }
}

function redirectStatus() {
  var opcaoTexto = selectStatus.options[selectStatus.selectedIndex].value;

  if (opcaoTexto !== "Todos") {
      window.location.href =
        "../controller/ControllerPedidosADM.php?selectStatus=" + opcaoTexto;
  }

  if (opcaoTexto === "Todos") {
    window.location.href =
      "../controller/ControllerPedidosADM.php?selectStatus=";
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
      window.location.href =
        "../controller/ControllerPedidosADM.php?dataStart=" +
        selectData[0].value +
        "&dataEnd=" +
        selectData[1].value;
    }
  });
});

function cleanFilters() {
  window.location.href = "./listPedidos.php";
}
