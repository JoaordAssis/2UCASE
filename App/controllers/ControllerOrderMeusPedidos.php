<?php
session_start();

$idCliente = filter_input(INPUT_GET, 'idCliente');
$order = filter_input(INPUT_GET, 'order');

if (empty($idCliente) || empty($order)){
    $header = "Location: ../view/meus-pedidos.php?error-code=FR30";
    header($header);
    exit();
}

$header = "Location: ../view/meus-pedidos.php?order=$order";
header($header);
exit();
