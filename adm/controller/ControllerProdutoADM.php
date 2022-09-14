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

    // DELETAR MENU ADMINISTRATIVO
    if ($_REQUEST['action'] === 'deleteProdutoADM') {
        $idProdutoADM = $_REQUEST['id'];
        require_once "../model/Manager.class.php";

        $manager = new Manager();

        $searchSubMenus = $manager->getInfo('user_produtos_img', 'id_produto', $idProdutoADM);

        if (count($searchSubMenus) > 0) {
            for ($ssm = 0; $ssm < count($searchSubMenus); $ssm++) {
                $deleteSubImgADM = $manager->deleteClient('user_produtos_img', 'id_produto', $searchSubMenus[$ssm]['id_produto']);
            }
        }

        $deleteProdutoADM = $manager->deleteClient('user_produto', 'id_produto', $idProdutoADM);

        // Sucesso
    ?>
        <form action="../view/listProdutos.php" name="myForm" id="myForm" method="post">
            <input type="hidden" name="msg" value="BD54">
        </form>
        <script>
            document.getElementById('myForm').submit();
        </script>
    <?php
    }

    // EDITAR MENU ADMINISTRATIVO

} else {
    // Não existe requisição
    ?>
    <form action="../view/listProdutos.php" name="myForm" id="myForm" method="post">
        <input type="hidden" name="msg" value="BD00">
    </form>
    <script>
        document.getElementById('myForm').submit();
    </script>
<?php
}
