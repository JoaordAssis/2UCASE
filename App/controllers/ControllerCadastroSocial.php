<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . "/../config/stylesConfig.php";



use app\model\Clientes;
use app\model\Ferramentas;
use app\model\Manager;
use League\OAuth2\Client\Provider\Google;

session_start();

if (!empty($_SESSION['USER-ID'])){
    //Usuário já esta logado
    header("Location: ../view/login.php?error-code=FR37");
    exit();
}


$google = new Google(GOOGLE);
$manager = new Manager();

$code = filter_input(INPUT_GET, "code", FILTER_SANITIZE_STRING);
$error = filter_input(INPUT_GET, "error", FILTER_SANITIZE_STRING);


echo "asdasd";