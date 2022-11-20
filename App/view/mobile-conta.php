<?php
session_start();

if(empty($_SESSION['USER-ID'])){
    header("Location: ./login.php?error-code=OA00");
    exit();
}

require_once __DIR__ . '/../../vendor/autoload.php';
use app\model\Manager;

$manager = new Manager();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once __DIR__ . "/../config/stylesConfig.php"  ?>
    <link rel="stylesheet" href="../assets/styles/mobile-conta.css">
</head>
<!-- Barra de Navegação -->
<?php require_once './navbar.php'; ?>

<body id="body-margin">
    <main class="container-mobile">
        <h1>Minha Conta</h1>

        <article class="container-links">
<!--            Alterar Dados-->
            <a href="./my-info.php" class="link-box">
                <div class="box-item">
                    <i class="fa-solid fa-user-pen fa-3x"></i>
                </div>
                <p>Alterar Dados</p>
            </a>

<!--            Meus Pedidos-->
            <a href="./meus-pedidos.php" class="link-box">
                <div class="box-item">
                    <i class="fa-solid fa-cart-flatbed-suitcase fa-3x"></i>
                </div>
                <p>Meus Pedidos</p>
            </a>

<!--            Sair da Conta-->
            <a href="../controllers/ControllerValidaLogin.php?exit=true" class="link-box">
                <div class="box-item">
                    <i class="fa-solid fa-arrow-right-from-bracket fa-3x"></i>
                </div>
                <p>Sair da Conta</p>
            </a>

        </article>
    </main>
</body>
<!-- Footer -->
<?php require_once './footer.php' ?>

</html>