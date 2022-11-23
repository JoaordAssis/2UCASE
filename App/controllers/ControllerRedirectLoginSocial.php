<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . "/../config/stylesConfig.php";


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

//FAZER A VERIFICAÇÃO DE ERRO NO CONTROLLER

if($error){
    //Ocorreu algum erro inesperado
    header("Location: ../view/login.php?error-code=FR39");
    exit();
}

if($code){
    $token = $google->getAccessToken("authorization_code", [
        "code" => $code
    ]);

    $_SESSION['userLogin'] = serialize($google->getResourceOwner($token));
    $user = unserialize($_SESSION['userLogin'], [true]);
    $userObj = $user->toArray();

    $checkuser[0] = $userObj['email'];
    $checkuser[1] = $userObj['sub'];


    $params = ['email_cliente', 'token_email'];
    $issetConta = $manager->selectWhere($params, $checkuser, 'user_cliente');

    if (count($issetConta) > 0){
        $_SESSION['USER-ID'] = $issetConta[0]['id_cliente'];
        $_SESSION['USER-NAME'] = $issetConta[0]['nome_cliente'];
        $_SESSION['USER-EMAIL'] = $issetConta[0]['email_cliente'];


        //SUCESSO
        header("Location: ../view/homepage.php?sucess-code=OA50");
        exit();

    }

    //Falha: Conta não encontrada
    header("Location: ../view/login.php?error-code=FR25");
    exit();
}