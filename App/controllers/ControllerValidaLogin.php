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
        //TODO: Tratamento de Erro
        session_destroy();
        header("Location: ../view/login.php");
        exit();
    }


    //O campo é um Email
    if ($checkInput === 0){

        $validaEmail = $user->validaEmail($_REQUEST['email-cpf']);

        if ($validaEmail === false){
            //EMAIL invalido
            //TODO: Tratamento de Erro

            session_destroy();
            header("Location: ../view/login.php");
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
            header("Location: ../view/homepage.php");
            exit();
        }

        //Não existe no BD
        //TODO: Tratamento de Erro
        session_destroy();
        header("Location: ../view/login.php");
        exit();


    }

    //O campo é um CPF
    if ($checkInput){
        $validaCPF = $user->CPFVerify($_REQUEST['email-cpf']);

        if ($validaCPF !== true){
            //CPF invalido
            //TODO: Tratamento de Erro

            session_destroy();
            header("Location: ../view/login.php");
            exit();
        }

        //Checar se o CPF existe no BD
        $paramsPostCheckCPFExist = [$senhaHash, $_REQUEST['email-cpf']];
        //TODO: Formatar o campo de CPF para comparação
        $paramsCheckCPFExist = ['senha_cliente', 'cpf_cliente'];

        $checkCPFExist = $manager->selectWhere($paramsCheckCPFExist, $paramsPostCheckCPFExist, 'user_cliente');

        if (count($checkCPFExist) > 0){
            $_SESSION['USER-ID'] = $checkCPFExist['id_cliente'];
            $_SESSION['USER-NAME'] = $checkCPFExist['nome_cliente'];
            $_SESSION['USER-EMAIL'] = $checkCPFExist['email_cliente'];
            $_SESSION['USER-CPF'] = $checkCPFExist['cpf_cliente'];


            //SUCESSO
            header("Location: ../view/homepage.php");
            exit();
        }

        //Não existe no BD
        //TODO: Tratamento de Erro
        session_destroy();
        header("Location: ../view/login.php");
        exit();

    }
}else{
    //Inputs não recebidos corretamente
    //TODO: Tratamento de Erro
    session_destroy();
    header("Location: ../view/login.php");
    exit();
}

