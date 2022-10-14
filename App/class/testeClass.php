<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use app\model\Clientes;

$user = new Clientes();

$cpf = '494.714.888-85';
$checkCpf = $user->CPFVerify($cpf);

//var_dump($checkCpf);
?>

