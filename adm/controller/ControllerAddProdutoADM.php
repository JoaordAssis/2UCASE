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

if (isset($_REQUEST['nome_produto']) && $_REQUEST['nome_produto'] !== '') :

    require_once '../model/Manager.class.php';
    require_once '../model/Ferramentas.class.php';

    $manager = new Manager();
    $ferr = new Ferramentas();

    // Organizando os dados

    $precoProdutoReplace = str_replace(',', '.', $_REQUEST["preco_produto"]);
    // echo $precoProdutoReplace;

    $dados["id_modelo_celular"] = $_REQUEST["marca_celular"];
    $dados["id_categoria"] = $_REQUEST["categoria_produto"];
    $dados["nome_produto"] = $_REQUEST["nome_produto"];
    $dados["peso_produto"] = $_REQUEST["peso_produto"];
    $dados["cod_produto"] = $_REQUEST["cod_produto"];
    $dados["preco_produto"] = $precoProdutoReplace;
    $dados["descricao_produto"] = $_REQUEST["descricao_produto"];
    $imgRetrieveData = $manager->imgUpload('imagem_principal_produto', $_REQUEST["nome_produto"]);
    $dados["imagem_principal_produto"] = $imgRetrieveData[0];
    $dados["quantidade_produto"] = $_REQUEST["quantidade_produto"];
    $dados["garantias_produto"] = $_REQUEST["garantias_produto"];
    $dados["categoria_special_produto"] = $_REQUEST["categoria_special_produto"];
    $dados["status"] = $_REQUEST["status"];

    $manager->insertClient("user_produto", $dados);

    // var_dump($_FILES['link_img']);


    if (isset($_FILES['link_img']) && $_FILES['link_img']['name'][0] != '') {
        $uploadMultipleImageT = $manager->imgMultipleUpload('link_img', $_REQUEST["nome_produto"]);
        for ($i = 0; $i < count($uploadMultipleImageT); $i++) :
            $lastId = $manager->lastInsertId('user_produto', 'id_produto');
            $dadosImg['id_produto'] = $lastId[0];
            $dadosImg['nome_img'] = $_FILES['link_img']['name'][$i];
            $dadosImg['link_img'] = $uploadMultipleImageT[$i];
            $dadosImg['status'] = 1;

            $manager->insertClient("user_produtos_img", $dadosImg);
        endfor;
        // echo "<pre>";
        // print_r($uploadMultipleImageT);
        // echo "<pre>";

    }


?>
    <form action="../view/listProdutos.php" name="myForm" id="myForm" method="post">
        <input type="hidden" name="msg" value="BD52">
    </form>
    <script>
        document.getElementById('myForm').submit();
    </script>

<?php

else :

?>
    <form action="../view/CRUDAddProduto.php" name="myForm" id="myForm" method="post">
        <input type="hidden" name="msg" value="BD02">
    </form>
    <script>
        document.getElementById('myForm').submit();
    </script>

<?php

endif;
