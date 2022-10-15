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

if (isset($_REQUEST['nome_carrossel']) && $_REQUEST['nome_carrossel'] != '') :

    require_once '../model/Manager.class.php';
    require_once '../model/Ferramentas.class.php';

    $manager = new Manager();
    $ferr = new Ferramentas();

    // Organizando os dados
    $imgRetrieveData = $manager->imgUpload('imagem_carrossel', $_REQUEST["nome_carrossel"]);

    $dadosCarrossel["nome_carrossel"] = $_REQUEST["nome_carrossel"];
    $dadosBannerADM['link_promo_carrossel'] = $_REQUEST['link_promo_carrossel'];
    $dadosCarrossel["link_carrossel"] = $imgRetrieveData[0];
    $dadosCarrossel["status"] = $_REQUEST["status"];

    $manager->insertClient("adm_carrossel", $dadosCarrossel);


?>
    <form action="../view/carrossel.php" name="myForm" id="myForm" method="post">
        <input type="hidden" name="msg" value="BD52">
    </form>
    <script>
        document.getElementById('myForm').submit();
    </script>

<?php

else :

?>
    <form action="../view/CRUDAddCarrossel.php" name="myForm" id="myForm" method="post">
        <input type="hidden" name="msg" value="BD02">
    </form>
    <script>
        document.getElementById('myForm').submit();
    </script>

<?php

endif;
