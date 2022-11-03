<?php
session_start();
require_once __DIR__ . '/../../vendor/autoload.php';


if (empty($_SESSION['USER-ID'])){
    header("Location: ../view/login.php?error-code=OA00");
    exit();
}

use app\model\Manager;
use app\model\Ferramentas;
use app\model\Clientes;

$manager = new Manager();
$ferramentas = new Ferramentas();
$user = new Clientes();

$getCliente = $manager->getInfo('user_cliente', 'id_cliente', $_SESSION['USER-ID']);



$ferrEmail = $ferramentas->antiInjection($_REQUEST['email_cliente']);
$ferrNome = $ferramentas->antiInjection($_REQUEST['nome_cliente']);

if ($ferrEmail === 0 || $ferrNome === 0){
    //Tentativa de SQL Injection
    header("Location: ../view/my-info.php?error-code=FR24");
    exit();
}

$verifyEmail = $user->validaEmail($_REQUEST['email_cliente']);


//Checar se o email já existe no banco
if ($getCliente[0]['email_cliente'] !== $_REQUEST['email_cliente']) {

    $checkEmail = $user->checkEmailExist($verifyEmail);
    if ($checkEmail === 0) {
        header("Location: ../view/my-info.php?error-code=FR06");
        exit();
    }
}


if ($verifyEmail !== false){

    $sanitizeCPF = $user->sanitizeField($_REQUEST['cpf_cliente']);
    $sanitizeNumber = $user->sanitizeField($_REQUEST['telefone_cliente']);
    $sanitizeNumeroFixo = $user->sanitizeField($_REQUEST['telefoneFixo_cliente']);

    //Assinalando os dados
    $dadosUsuario['nome_cliente'] = $_REQUEST['nome_cliente'];
    $dadosUsuario['email_cliente'] = $_REQUEST['email_cliente'];
    $dadosUsuario['cpf_cliente'] = $sanitizeCPF;
    $dadosUsuario['data_nasc_cliente'] = $_REQUEST['data_nasc_cliente'];
    $dadosUsuario['telefone_cliente'] = $sanitizeNumber;
    $dadosUsuario['telefoneFixo_cliente'] =$sanitizeNumeroFixo !== '' ? $sanitizeNumeroFixo : 'NULL';
    $dadosUsuario['genero_cliente'] = $_REQUEST['genero_cliente'];

    try {
        $updateCliente = $manager->updateClient('user_cliente', $dadosUsuario, $_SESSION['USER-ID'], 'id_cliente');
        header("Location: ../view/my-info.php?sucess-code=FR52");
        exit();
    }catch (PDOException $e){
        echo $e->getCode();
        header("Location: ../view/my-info.php?error-code=FR34");
        exit();
    }

}