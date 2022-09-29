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


// $(document).ready(function () {
//     /// Quando usuário clicar em salvar será feito todos os passo abaixo
//     $('#selectCategoria').change(function () {

//         var dados = $('#selectCategoria').serialize();

//         $.ajax({
//             type: 'POST',
//             dataType: 'json',
//             url: '../controller/ControllerComentarios.php?selectAvaliacao=' + opcaoTexto,
//             async: true,
//             data: dados,
//             success: function (response) {
//                 location.reload();
//             }
//         });

//         return false;
//     });
// });