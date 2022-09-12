<?php
session_start();

if (!isset($_SESSION["ADM-ID"]) || empty($_SESSION["ADM-ID"])) {
    session_destroy();

    ?>
<form action="../index.php" name="myForm" id="myForm" method="post">
    <input type="hidden" name="msg" value="BD52">
</form>
<script>
    document.getElementById('myForm').submit();
</script>

<?php

}

if(isset($_REQUEST['nome_produto']) && $_REQUEST['nome_produto'] != ''):

require_once '../model/Manager.class.php';
require_once '../model/Ferramentas.class.php';

$manager = new Manager();
$ferr = new Ferramentas();

// Organizando os dados

// $dados["id_modelo_celular"] = $_REQUEST["marca_celular"];
// $dados["id_categoria"] = $_REQUEST["categoria_produto"];
// $dados["nome_produto"] = $_REQUEST["nome_produto"];
// $dados["preco_produto"] = $_REQUEST["preco_produto"];
// $dados["descricao_produto"] = $_REQUEST["descricao_produto"];
// $dados["imagem_principal_produto"] = $_REQUEST["imagem_principal_produto"];
// $dados["quantidade_produto"] = $_REQUEST["quantidade_produto"];
// $dados["garantias_produto"] = $_REQUEST["garantias_produto"];
// $dados["status"] = $_REQUEST["status"];

echo "<pre>";
print_r($_FILES['imagem_principal_produto']);
echo "<pre>";

echo "<br><br><br><br>";

echo "<pre>";
print_r($_FILES['link_img']);
echo "<pre>";

echo count($_FILES['link_img']['name']);

echo "<br><br><br><br>";

$uploadImage = $manager->imgUpload('link_img', $_REQUEST["nome_produto"], $_REQUEST['preco_produto']);

var_dump($uploadImage);

// $manager->insertClient("administrador", $dados);
?>
<!-- <form action="../view/adm_usuarios_list.php" name="myForm" id="myForm" method="post">
    <input type="hidden" name="msg" value="BD52">
</form>
<script>
    document.getElementById('myForm').submit();
</script> -->

<?php

else:

?>
<!-- <form action="../view/CRUDAddProduto.php" name="myForm" id="myForm" method="post">
    <input type="hidden" name="msg" value="BD52">
</form>
<script>
    document.getElementById('myForm').submit();
</script> -->

<?php

endif;