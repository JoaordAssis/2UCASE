<?php
session_start();
if (!isset($_SESSION["ADM-ID"]) || empty($_SESSION["ADM-ID"])) {
    session_destroy();
?>
    <form action="../index.php" name="myForm" id="myForm" method="post">
        <input type="hidden" name="msg" value="OA00">
    </form>
    <script>
        document.getElementById('myForm').submit();
    </script>
    <?php
    exit();
}

if (isset($_REQUEST['action']) && $_REQUEST['action'] != '' && isset($_REQUEST['id']) && $_REQUEST['id'] != '') {

    // DELETAR USUÁRIO ADMINISTRATIVO
    if ($_REQUEST['action'] === 'deleteSubMenuADM') {
        $idSubMenuADM = $_REQUEST['id'];
        require_once "../model/Manager.class.php";

        $manager = new Manager();

        $deleteUserADM = $manager->deleteClient('adm_submenu', 'id_submenu', $idSubMenuADM);

        // Sucesso
    ?>
        <form action="../view/listMenus.php" name="myForm" id="myForm" method="post">
            <input type="hidden" name="msg" value="BD54">
        </form>
        <script>
            document.getElementById('myForm').submit();
        </script>
    <?php
    }

    // EDITAR USUÁRIO ADMINISTRATIVO

} else {
    // Não existe requisição
    ?>
    <form action="../view/listMenus.php" name="myForm" id="myForm" method="post">
        <input type="hidden" name="msg" value="BD00">
    </form>
    <script>
        document.getElementById('myForm').submit();
    </script>
<?php
}
