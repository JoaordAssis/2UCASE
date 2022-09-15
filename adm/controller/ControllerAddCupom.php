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

if (isset($_REQUEST['nome_cupom']) && $_REQUEST['nome_cupom'] != '') :

    require_once '../model/Manager.class.php';
    require_once '../model/Ferramentas.class.php';

    $manager = new Manager();
    $ferr = new Ferramentas();

    // Organizando os dados

    $dateTo = strtotime($_REQUEST['data_expira_cupom']);
    $newDate = date("Y-m-d", $dateTo);

    $dadosCupom["nome_cupom"] = $_REQUEST["nome_cupom"];
    $dadosCupom["id_categoria"] = $_REQUEST["id_categoria"];
    $dadosCupom["codigo_cupom"] = $_REQUEST["codigo_cupom"];
    $dadosCupom["data_expira_cupom"] = $newDate;
    $dadosCupom["desconto_cupom"] = $_REQUEST["desconto_cupom"];
    $dadosCupom["status"] = $_REQUEST["status"];


    $manager->insertClient("user_cupom", $dadosCupom);


?>
    <form action="../view/listCupons.php" name="myForm" id="myForm" method="post">
        <input type="hidden" name="msg" value="BD52">
    </form>
    <script>
        document.getElementById('myForm').submit();
    </script>

<?php

else :

?>
    <form action="../view/CRUDAddCupom.php" name="myForm" id="myForm" method="post">
        <input type="hidden" name="msg" value="BD02">
    </form>
    <script>
        document.getElementById('myForm').submit();
    </script>

<?php

endif;
