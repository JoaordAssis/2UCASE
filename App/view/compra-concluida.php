<?php
session_start();

if (empty($_SESSION['USER-ID'])){
    header("Location: ./login.php?error-code=OA00");
    exit();
}

if(empty($_REQUEST['venda'])){
    header("Location: ./carrinho.php?error-code=FR34");
    exit();
}

require_once __DIR__ . '/../../vendor/autoload.php';
use app\model\Manager;
$manager = new Manager();
$idVenda = filter_input(INPUT_GET, 'venda');

$getVenda = $manager->getInfo('adm_venda', 'id_venda', $idVenda);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once __DIR__ . "/../config/stylesConfig.php"; ?>
    <link rel="stylesheet" href="../assets/styles/compra-sucedida.css">
    <title>Compra Concluída</title>
</head>
<!-- Barra de Navegação -->
<?php require_once './navbar.php'; ?>
<body id="body-margin">
    <main class="container-sucess">
        <div class="title-container">
            <h1>Obrigado pela sua compra!</h1>
            <img src="../assets/img/like-icon.png" alt="Coração">
        </div>
        <h3>Número do pedido: <span id="highlight-pedido"><?=$getVenda[0]['numero_venda']?></span></h3>

        <p>Seu pedido foi aceito e está sendo processado. Em instantes voçê irá receber uma notificação com os detalhes do pedido no seu e-mail</p>
        <a href="./homepage.php">Voltar a página inicial</a>
    </main>
</body>
<!-- Footer -->
<?php require_once './footer.php'; ?>
</html>