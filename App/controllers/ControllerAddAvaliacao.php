<?php

session_start();

if(empty($_SESSION['USER-ID'])){
    header("Location: ../view/login.php?error-code=OA00");
    exit();
}

if(empty($_REQUEST['pd'])){
    header("Location: ../view/meus-pedidos.php?error-code=FR34");
    exit();
}

require_once __DIR__ . '/../../vendor/autoload.php';
use app\model\Manager;
use app\model\Ferramentas;
$manager = new Manager();
$ferramentas = new Ferramentas;
$idProduto = $_REQUEST['pd'];

//Inputs
$inputTitulo = $_REQUEST['titulo_avaliacao'];
$descAvaliacao = $_REQUEST['avaliacao-txt'];
$notaAvaliacao = $_REQUEST['estrela'];

if (empty($inputTitulo) || empty($descAvaliacao) || empty($notaAvaliacao)){

    header("Location: ../view/meus-pedidos.php?error-code=FR34a");
    exit();
}

$cleanTitulo = $ferramentas->antiInjection($inputTitulo);
$cleanDesc = $ferramentas->antiInjection($descAvaliacao);

if ($cleanTitulo === 0 || $cleanDesc === 0){
    //TODO: Tentativa de Injection
    header("Location: ../view/meus-pedidos.php?error-code=FR34");
    exit();
}

$dadosAvaliacao['id_produto'] = $idProduto;
$dadosAvaliacao['id_cliente'] = $_SESSION['USER-ID'];
$dadosAvaliacao['nota_avaliacao'] = $notaAvaliacao;
$dadosAvaliacao['titulo_avaliacao'] = $cleanTitulo;
$dadosAvaliacao['descricao'] = $cleanDesc;
$dadosAvaliacao['status'] = 1;

try {
    $insertAvaliacao = $manager->insertClient('user_avaliacao', $dadosAvaliacao);
    //TODO: Sucess Code
    header("Location: ../view/meus-pedidos.php?sucess-code=FR34");
    exit();

}catch (PDOException $e){
    echo $e->getCode();
    header("Location: ../view/meus-pedidos.php?error-code=FR34");
    exit();
}
