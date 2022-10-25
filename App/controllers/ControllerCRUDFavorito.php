<?php

session_start();
require_once __DIR__ . "/../../vendor/autoload.php";

use app\model\Manager;

$manager = new Manager();
$idProduto = $_REQUEST['idProduto'];

if (empty($_SESSION['USER-ID'])) {
    header("Location: ./homepage.php?error-code=OA00");
}

if($_REQUEST['action'] === 'add'){

    $favoritosInsert['id_produto'] = $idProduto;
    $favoritosInsert['id_cliente'] = $_SESSION['USER-ID'];

    try{
        $insertDados = $manager->insertClient('user_favoritos', $favoritosInsert);
        header("Location: ../view/favoritos.php?sucess-code=foi-possivel");
        exit();

    }catch(PDOException $e){
        echo $e->getCode();
        header("Location: ../view/homepage.php?error-code=nao-foi-possivel");
        exit();
    }
}


if ($_REQUEST['action'] === 'delete') {

    try {
        $insertDados = $manager->deleteClient('user_favoritos', 'id_produto', $idProduto);
        header("Location: ../view/favoritos.php?sucess-code=foi-possivel");
        exit();
    } catch (PDOException $e) {
        echo $e->getCode();
        header("Location: ../view/favoritos.php?error-code=nao-foi-possivel");
        exit();
    }
}