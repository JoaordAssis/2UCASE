<?php
session_start();

if (!isset($_SESSION["ADM-ID"]) || empty($_SESSION["ADM-ID"])) {
    session_destroy();

?>
    <form action="../index.php" name="myForm" id="myForm" method="post">
        <input type="hidden" name="msg" value="OA01">
    </form>
    <script>
        document.getElementById('myForm').submit();
    </script>

<?php

}

if (isset($_REQUEST['nome_submenu']) && $_REQUEST['nome_submenu'] != '') :

    require_once '../model/Manager.class.php';
    require_once '../model/Ferramentas.class.php';

    $manager = new Manager();
    $ferr = new Ferramentas();

    // Organizando os dados

    $dadosSubMenu["id_menu"] = $_REQUEST["id_menu"];
    $dadosSubMenu["nome_submenu"] = $_REQUEST["nome_submenu"];
    $dadosSubMenu["link_submenu"] = $_REQUEST["link_submenu"];
    $dadosSubMenu["status"] = $_REQUEST["status"];

    $manager->insertClient("adm_submenu", $dadosSubMenu);


?>
    <form action="../view/listMenus.php" name="myForm" id="myForm" method="post">
        <input type="hidden" name="msg" value="BD52">
    </form>
    <script>
        document.getElementById('myForm').submit();
    </script>

<?php

else :

?>
    <form action="../view/CRUDAddSubMenu.php" name="myForm" id="myForm" method="post">
        <input type="hidden" name="msg" value="BD02">
    </form>
    <script>
        document.getElementById('myForm').submit();
    </script>

<?php

endif;
