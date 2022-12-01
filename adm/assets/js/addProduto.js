const masks = {
  cpf(value) {
    return value
      .replace(/\D/g, "")
      .replace(/(\d{2})(\d)/, "$1.$2")
      .replace(/(\d{3})(\d)/, "$1.$2")
      .replace(/(\d{3})(\d{1})/, "$1-$2")
      .replace(
        /(\d{2}).(\d)(\d{2}).(\d)(\d{2})-(\d)(\d{1})/,
        "$1$2.$3$4.$5$6-$7"
      )
      .replace(/(-\d{2})\d+?$/, "$1");
    },
    
    money(value) {
        return value
            .replace(/\D/g, "")
            .replace(/([0-9]{2})$/g, ",$1")
    },

};

document.querySelectorAll("input").forEach(($input) => {
  const field = $input.dataset.js;
  $input.addEventListener(
    "input",
    (e) => {
      e.target.value = masks[field](e.target.value);
    },
    false
  );
});


let inputFiles = [];

function newInput(input) {
  var filesStr = "";

  for (let i = 0; i < input.files.length; i++) {
    inputFiles.push(input.files[i]);
    filesStr +=
      "<li>" +
      input.files[i].name +
      "<button id='btn-remove-file' style='margin-left: 10px;' onclick='removeLi(this)'>Remover</button>" +
      "</li>";
  }


  document.getElementById("dp-files").innerHTML += filesStr;
}


function removeLi(e) {
  inputFiles = inputFiles.filter(function (file) {
    return file.name !== e.parentNode.innerHTML.split("<button")[0];
  });
    e.parentNode.parentNode.removeChild(e.parentNode);

}

function removeAllImages() {
  document.getElementById("input-img-multiple").value = "";
}

// function removerImagem(input) {
//   console.log(Node.appendChild(input));
// }




//CATEGORIA DO PRODUTO

let selectCategoria = document.getElementById("select-categoria-tipo");
let selectMarcaCelular = document.getElementById("select-categoria-marca");

selectCategoria.addEventListener("change", () => {
  let opcaoTexto = selectCategoria.options[selectCategoria.selectedIndex].value;
  console.log(opcaoTexto);

  if (opcaoTexto === '19' || opcaoTexto === '18' || opcaoTexto === '17'){
    selectMarcaCelular.style.display = 'none';
  }else{
    selectMarcaCelular.style.display = 'block';

  }

});



