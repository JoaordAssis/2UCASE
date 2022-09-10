function menuDelete(id) {
    let promptResult = prompt('Atenção, a exclusão desse item pode causar a exclusão de diversos outros itens, se deseja continuar, digite CONFIRMAR');

    if (promptResult === 'CONFIRMAR') {
        window.location.href =
          "../controller/ControllerMenuADM.php?id=" + id + "&action=deleteMenuADM";
    }
}

function subMenuDelete(id) {
  let promptResult = prompt(
    "Atenção, se deseja continuar com a exclusão desse item digite CONFIRMAR"
  );

  if (promptResult === "CONFIRMAR") {
    window.location.href =
      "../controller/ControllerSubMenuADM.php?id=" + id + "&action=deleteSubMenuADM";
  }
}