let selectCategoria = document.getElementById("boselectx-avaliacao");

function redirectCategoria() {

    var opcaoTexto =
      selectCategoria.options[selectCategoria.selectedIndex].value;

    if (opcaoTexto !== 'Todos') {
        
        window.location.href = '../controller/ControllerComentarios.php?selectAvaliacao=' + opcaoTexto;

    } if(opcaoTexto === 'Todos') {
        window.location.href =
          "../controller/ControllerComentarios.php?selectAvaliacao=";
    }
}
