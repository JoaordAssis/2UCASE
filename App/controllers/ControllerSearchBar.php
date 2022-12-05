<?php

session_start();

if (empty($_REQUEST['search'])){
    header("Location: ../view/homepage.php?error-code=PG02");
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
    header("Location: ../view/homepage.php?error-code=FR24");
    exit();
}


if (!empty($_REQUEST['selectOrdem'])){
    $exibSearch = filter_input(INPUT_GET, 'selectOrdem');
    $header = "Location: ../view/search.php?search=$searchQuery&selectOrdem=$exibSearch&category=todos";
    header($header);
    exit();
}



$columnSearch = ['nome_produto ', 'categoria_special_produto '];
$searchLike = $manager->selectLike('user_produto', $columnSearch, $filterSearch);

if (count($searchLike) > 0){
    header("Location: ../view/search.php?search=$filterSearch&category=todos");
    exit();

}

header("Location: ../view/search.php?search=$searchQuery&category=Nenhum");
exit();