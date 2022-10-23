<?php
require_once __DIR__ . "/../../vendor/autoload.php";

use app\model\Ferramentas;
use app\model\Clientes;
use app\model\Manager;

session_start();

if (!empty($_REQUEST['email-cpf']) && !empty($_REQUEST['senha-login'])) {
    $user = new Clientes();
    $ferramentas = new Ferramentas();
    $manager = new Manager();

    //Identificar se foi enviado um email ou CPF
    $checkInput = $user->checkEmailOrCPF($_REQUEST['email-cpf']);
    $antiSql = $ferramentas->antiInjection($_REQUEST['email-cpf']);

    //Criptografar Senha
    $senhaHash = $ferramentas->hash256($_REQUEST['senha-login']);

    if ($antiSql === "0"){
        //Tentativa de SQL Injection
        session_destroy();
        header("Location: ../view/login.php?error-code=FR24");
        exit();
    }


    //O campo é um Email
    if ($checkInput === 0){

        $validaEmail = $user->validaEmail($_REQUEST['email-cpf']);

        if ($validaEmail === false){
            //EMAIL invalido

            session_destroy();
            header("Location: ../view/login.php?error-code=FR09");
            exit();
        }

        //Checar se Email existe no (BD)
        $checkEmailExist = $manager->loginCliente($senhaHash, $validaEmail);


        if (count($checkEmailExist) > 0){
            $_SESSION['USER-ID'] = $checkEmailExist[0]['id_cliente'];
            $_SESSION['USER-NAME'] = $checkEmailExist[0]['nome_cliente'];
            $_SESSION['USER-EMAIL'] = $checkEmailExist[0]['email_cliente'];
            $_SESSION['USER-CPF'] = $checkEmailExist[0]['cpf_cliente'];


            //SUCESSO
            header("Location: ../view/homepage.php?sucess-code=OA50");
            exit();
        }

        //Não existe no BD
        session_destroy();
        header("Location: ../view/login.php?error-code=FR25");
        exit();


    }

    //O campo é um CPF
    if ($checkInput){
        $validaCPF = $user->CPFVerify($_REQUEST['email-cpf']);

        if ($validaCPF !== true){
            //CPF invalido
            session_destroy();
            header("Location: ../view/login.php?error-code=FR07");
            exit();
        }

        $formatCpf = $user->sanitizeField($_REQUEST['email-cpf']);
        //Checar se o CPF existe no BD
        $paramsPostCheckCPFExist = [$formatCpf, $senhaHash];
        $paramsCheckCPFExist = ['cpf_cliente', 'senha_cliente'];

        $checkCPFExist = $manager->selectWhere($paramsCheckCPFExist, $paramsPostCheckCPFExist, 'user_cliente');

        if (count($checkCPFExist) > 0){
            $_SESSION['USER-ID'] = $checkCPFExist[0]['id_cliente'];
            $_SESSION['USER-NAME'] = $checkCPFExist[0]['nome_cliente'];
            $_SESSION['USER-EMAIL'] = $checkCPFExist[0]['email_cliente'];
            $_SESSION['USER-CPF'] = $checkCPFExist[0]['cpf_cliente'];


            //SUCESSO
            header("Location: ../view/homepage.php?sucess-code=OA50");
            exit();
        }

        //Não existe no BD
        session_destroy();
        header("Location: ../view/login.php?error-code=FR25");
        exit();

    }
}else{
    //Inputs não recebidos corretamente
    session_destroy();
    header("Location: ../view/login.php?error-code=FR00");
    exit();
}



//LOGOUT

if (!empty($_REQUEST['exit'])){
    session_destroy();
    //Exibir mensagem
    header("Location: ../view/homepage.php?sucess-code=OA51");
    exit();
}
