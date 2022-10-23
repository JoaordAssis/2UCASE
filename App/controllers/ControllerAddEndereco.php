<?php
session_start();

if (empty($_SESSION['USER-ID'])){
    //Usuário não logado
    //TODO: Tratar erro
    header("Location: ../view/login.php?logue-logue-imediatamente");
    exit();
}

require_once __DIR__ . "/../../vendor/autoload.php";

use app\model\Manager;
use app\model\Ferramentas;

$manager = new Manager();
$ferramentas = new Ferramentas();
$valorFrete = $_REQUEST['frete'];

if (empty($valorFrete)) {
    //Não recebido o valor frete
    //TODO: Tratar erro
    header("Location: ../view/entrega.php?frete-faltou");
    exit();
}

$inputEntrega['id_cliente'] = $_SESSION['USER-ID'];
$inputEntrega['logradouro_cliente'] = $_REQUEST['logradouro'];
$inputEntrega['cep_cliente'] = $_REQUEST['cep'];
$inputEntrega['ponto_ref_cliente'] = $_REQUEST['referencia'];
$inputEntrega['uf_cliente'] = $_REQUEST['state'];
$inputEntrega['cidade_cliente'] = $_REQUEST['cidade'];
$inputEntrega['numero_cliente'] = $_REQUEST['numero'];
$inputEntrega['complemento_cliente'] = $_REQUEST['complemento'];
$inputEntrega['bairro_cliente'] = $_REQUEST['bairro'];
$inputEntrega['nomeR_cliente'] = $_REQUEST['nomeR'];

$injectionCheckLog = $ferramentas->antiInjection($inputEntrega['logradouro_cliente']);
$injectionCheckBairro = $ferramentas->antiInjection($inputEntrega['bairro_cliente'] );
$injectionCheckRef = $ferramentas->antiInjection($inputEntrega['ponto_ref_cliente']);
$injectionCheckCidade = $ferramentas->antiInjection($inputEntrega['cidade_cliente']);
$injectionCheckNomeR = $ferramentas->antiInjection($inputEntrega['nomeR_cliente']);
$injectionCheckComp = $ferramentas->antiInjection($inputEntrega['complemento_cliente']);


if ($injectionCheckBairro === 0 || $injectionCheckCidade === 0 || $injectionCheckLog === 0
    || $injectionCheckNomeR === 0 || $injectionCheckRef === 0 || $injectionCheckComp === 0) {
    //Tentativa de Injection
    //TODO: Tratar erro
    header("Location: ../view/entrega.php?logue-logue-imediatamente");
    exit();
}

try {
    $insertEndereco = $manager->insertClient('user_endereco_cliente', $inputEntrega);
    $returnEndereco = $manager->lastInsertId('user_endereco_cliente', 'id_endereco');
    $idEntrega = $returnEndereco['id_endereco'];
    header("Location: ../view/pagamento.php?valorFrete=$valorFrete&id_endereco=$idEntrega");
    exit();
}catch (PDOException $e){
    echo $e->getMessage();
    exit();
}