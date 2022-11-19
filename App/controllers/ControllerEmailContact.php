<?php

require_once __DIR__ . '/../../vendor/autoload.php';
use app\model\Ferramentas;
use app\model\Email;



$ferramentas = new Ferramentas();
$email = new Email();


$contactTelefone = filter_input(INPUT_POST, 'telefone');
$contactNome = filter_input(INPUT_POST, 'nome');
$contactEmail = filter_input(INPUT_POST, 'email');
$contactPedido = filter_input(INPUT_POST, 'nPedido');
$contactAssunto = filter_input(INPUT_POST, 'assunto');
$contactMsg = filter_input(INPUT_POST, 'mensagem');
$arquivo = $_FILES['name'];

try {
    $emailSend = $email->contactEmail($contactEmail, $contactNome, $contactAssunto, $contactTelefone, $contactMsg, $contactPedido, $arquivo);
    if ($emailSend){
        header("Location: ../view/contact.php?error-code=FR53");
        exit();
    }

}catch (Exception $exception){
    header("Location: ../view/contact.php?error-code=FR38");
    exit();
}