<?php

session_start();

if (empty($_REQUEST['search'])){
    //Todo: Tratamento de erro
    header("Location: ../view/homepage.php");
    exit();
}

require_once __DIR__ . '/../../vendor/autoload.php';
use app\model\Manager;
use app\model\Ferramentas;

$manager = new Manager();
$ferramentas = new Ferramentas();

$searchQuery = $_REQUEST['search'];
$filterSearch = $ferramentas->antiInjection($searchQuery);

if ($filterSearch === 0){
    //Todo: Tratamento de erro: Tentativa de injection
    header("Location: ../view/homepage.php");
    exit();
}

$columnSearch = ['nome_produto ', 'categoria_special_produto '];
$searchLike = $manager->selectLike('user_produto', $columnSearch, $filterSearch);

if (count($searchLike) > 0){
    header("Location: ../view/category.php?search=$filterSearch&category=todos");
    exit();

}

header("Location: ../view/category.php?search=invalid&category=any");
exit();