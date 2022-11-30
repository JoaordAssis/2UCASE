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

    if ($_REQUEST['action'] === 'editSubMenuADM') {
        require_once "../model/Manager.class.php";
        require_once "../model/Ferramentas.class.php";

        $manager = new Manager();
        $ferr = new Ferramentas();

        $verificaNomeSubMenu = $ferr->antiInjection($_REQUEST['nome_submenu']);
        $verificaLinkSubMenu = $ferr->antiInjection($_REQUEST['link_submenu']);


        if ($verificaNomeSubMenu && $verificaLinkSubMenu === 1) {

            $idSubMenu = $_REQUEST['id'];

            $dadosSubMenuADM['id_menu'] = $_REQUEST['id_menu'];
            $dadosSubMenuADM['nome_submenu'] = $_REQUEST['nome_submenu'];
            $dadosSubMenuADM['link_submenu'] = $_REQUEST['link_submenu'];
            $dadosSubMenuADM['status'] = $_REQUEST['status'];


            $manager->updateClient("adm_submenu", $dadosSubMenuADM, $idSubMenu, 'id_submenu');

        ?>
            <form action="../view/listMenus.php" name="myForm" id="myForm" method="post">
                <input type="hidden" name="msg" value="BD53">
            </form>
            <script>
                document.getElementById('myForm').submit();
            </script>
        <?php
        }

        ?>
        <form action="../view/CRUDEditSubMenu.php" name="myForm" id="myForm" method="post">
            <input type="hidden" name="msg" value="BD03">
        </form>
        <script>
            document.getElementById('myForm').submit();
        </script>
    <?php
    }
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
