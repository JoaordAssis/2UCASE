<?php
session_start();

$categorySearch = $_REQUEST['category'];

if (isset($_REQUEST['change-category']) && $categorySearch === 'Acessorios'){
    $header = "Location: ../view/acessorios-page.php?category=Acessorios";
    header($header);
    exit();
}


if (isset($_REQUEST['change-category'])){
    $header = "Location: ../view/category.php?category=$categorySearch";
    header($header);
    exit();
}


// FILTROS DE CATEGORIA

if (!empty($_REQUEST['selectOrdem']) && !empty($_REQUEST['acessorios'])) {
    //ORDEM ACESSORIOS-PAGE
    $exibSearch = $_REQUEST['selectOrdem'];
    $header = "Location: ../view/acessorios-page.php?category=$categorySearch&selectOrdem=" . $exibSearch;

    header($header);
    exit();
}


if (!empty($_REQUEST['selectOrdem'])) {

    $exibSearch = $_REQUEST['selectOrdem'];
    $header = "Location: ../view/category.php?category=$categorySearch&selectOrdem=" . $exibSearch;

    header($header);
    exit();
}

if (!empty($_REQUEST['selectCategoria'])) {

    $exibSearch = $_REQUEST['selectCategoria'];
    $header = "Location: ../view/category.php?category=$categorySearch&selectCategoria=" . $exibSearch;

    header($header);
    exit();
}

if (!empty($_REQUEST['selectStatus'])) {

    $exibSearch = $_REQUEST['selectStatus'];
    $header = "Location: ../view/category.php?category=$categorySearch&selectStatus=" . $exibSearch;

    header($header);
    exit();
}

header("Location: ../view/category.php?category=$categorySearch&error-code=PG02");
exit();