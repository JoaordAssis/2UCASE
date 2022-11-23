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


$google = new Google(GOOGLE_CADASTRO);
$manager = new Manager();

$code = filter_input(INPUT_GET, "code", FILTER_SANITIZE_STRING);
$error = filter_input(INPUT_GET, "error", FILTER_SANITIZE_STRING);


if($error){
    //Ocorreu algum erro
    header("Location: ../view/login.php?error-code=FR39");
    exit();
}

if($code){
    $token = $google->getAccessToken("authorization_code", [
        "code" => $code
    ]);

    $user = serialize($google->getResourceOwner($token));
    $userUnserialize = unserialize($user, [true]);
    $userObj = $userUnserialize->toArray();

    $params = ['email_cliente', 'token_email'];
    $checkuser[0] = $userObj['email'];
    $checkuser[1] = $userObj['sub'];
    $issetConta = $manager->selectWhere($params, $checkuser, 'user_cliente');

    if (count($issetConta) > 0){
        //Já existe uma conta com esse email
        header("Location: ../view/login.php?error-code=FR40");
        exit();

    }

    //HASH NO TOKEN DO EMAIL
    $TokenHash = password_hash($userObj['sub'], PASSWORD_ARGON2ID);

    //Assinalando os dados
    $dadosUsuario['nome_cliente'] = $userObj['name'];
    $dadosUsuario['email_cliente'] = $userObj['email'];
    $dadosUsuario['senha_cliente'] = $TokenHash;
    $dadosUsuario['cpf_cliente'] = 0;
    $dadosUsuario['data_nasc_cliente'] = 0;
    $dadosUsuario['telefone_cliente'] = 0;
    $dadosUsuario['telefoneFixo_cliente'] = 0;
    $dadosUsuario['genero_cliente'] = 2;
    $dadosUsuario['status'] = 1;
    $dadosUsuario['token_email'] = $userObj['sub'];


    //INSERT USUARIO
    try {
        $manager->insertClient("user_cliente", $dadosUsuario);
    }catch (PDOException $exception){
        echo $exception->getCode();
        //ERRO AO INSERIR USUARIO
        header("Location: ../view/login.php?error-code=FR31");
        exit();
    }

    //PEGAR O ID DO ULTIMO USUARIO INSERIDO
    $lastInsert = $manager->lastInsertId('user_cliente', 'id_cliente');

    //INICIANDO A SESSÃO
    $_SESSION['USER-ID'] = $lastInsert[0];
    $_SESSION['USER-NAME'] = $userObj['name'];
    $_SESSION['USER-EMAIL'] = $userObj['email'];

    header("Location: ../view/my-info.php?sign-google");
    exit();

}