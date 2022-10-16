<?php

$categorySearch = $_REQUEST['category'];


// FILTROS DE CATEGORIA

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

//TODO: Tratar o erro
header("Location: ../view/category.php?category=$categorySearch&error-code=nao-sei");
exit();