<?php
session_start();
require_once __DIR__ . "/../../vendor/autoload.php";

use app\model\Manager;

$manager = new Manager();

if (empty($_SESSION['USER-ID'])) {
    header("Location: ./homepage.php?error-code=OA00");
}


//Return favoritos
$paramFavorito = ['id_cliente'];
$paramPostFavorito = [$_SESSION['USER-ID']];
$returnFavoritos = $manager->selectWhere($paramFavorito, $paramPostFavorito, 'user_favoritos',);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once __DIR__ . "/../config/stylesConfig.php"  ?>
    <link rel="stylesheet" href="../assets/styles/favoritos.css">
</head>

<!-- Barra de Navegação -->
<?php require_once './navbar.php'; ?>

<body id="body-margin">
    <main class="container-favoritos">
        <h1 id="title-orange">Seus Favoritos</h1>

        <section class="container-produtos">
            <?php
            if (count($returnFavoritos) > 0) :
                for ($i = 0, $iMax = count($returnFavoritos); $i < $iMax; $i++) :
                    $returnProduto = $manager->getInfo('user_produto', 'id_produto', $returnFavoritos[$i]['id_produto']);
            ?>

                    <div class="container-produto">
                        <a class="produto-box glide__slide" href="./produto.php?pd=<?= $returnProduto[$i]['id_produto'] ?>">
                            <img src="<?= $returnProduto[$i]['imagem_principal_produto'] ?>" alt="<?= $returnProduto[$i]['nome_produto'] ?>">
                            <h4><?= $returnProduto[$i]['nome_produto'] ?></h4>
                            <p><?= $returnProduto[$i]['preco_produto'] ?></p>
                        </a>
                        <button id="favorite-button" onclick="window.location.href='../controllers/ControllerCRUDFavorito.php?action=delete&idProduto=<?= $returnProduto[$i]['id_produto'] ?>'">
                            <img width="40" height="40" src="../assets/svg/coracao-icone.svg" alt="Favoritado">
                        </button>
                    </div>

                <?php
                endfor;
            else :
                ?>
                <h1>Você não adicionou produtos a sua lista de favoritos ainda!</h1>

            <?php
            endif;
            ?>
        </section>
    </main>
</body>
<!-- Footer -->
<?php require_once "./footer.php"; ?>

</html>