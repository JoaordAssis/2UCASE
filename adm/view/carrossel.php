<?php
session_start();
require_once "../model/Manager.class.php";
$manager = new Manager();

$resultCarrosselList = $manager->listClient('adm_carrossel', 'id_carrossel');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once "../config/config.php"; ?>
    <!-- Glider JS -->
    <link rel="stylesheet" href="../../node_modules/@glidejs/glide/dist/css/glide.core.min.css">
    <link rel="stylesheet" href="../../node_modules/@glidejs/glide/dist/css/glide.theme.min.css">

    <link rel="stylesheet" href="../assets/css/carrossel.css">
</head>

<?php require_once "./navbar.php"; ?>

<body id="body-margin">
    <main class="container-produto">
        <h1>Carrossel</h1>

        <article class="carrossel-start">
            <!-- Carrossel -->
            <section class="carrossel-container">

                <section class="glide carrossel-container-box">
                    <div class="glide__arrows left" data-glide-el="controls">
                        <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><i class="fa-solid fa-arrow-left"></i></button>
                    </div>
                    <div class="glide__track" data-glide-el="track">

                        <ul class="glide__slides">

                            <?php
                            if (count($resultCarrosselList) > 0) :
                                for ($i = 0; $i < count($resultCarrosselList); $i++) :
                            ?>

                                    <div class="carrossel-box glide__slide">
                                        <img src="<?= $resultCarrosselList[$i]['link_carrossel'] ?>" alt="<?= $resultCarrosselList[$i]['nome_carrossel'] ?>">
                                    </div>

                            <?php
                                endfor;
                            endif;
                            ?>

                        </ul>
                        <div class="glide__bullets" data-glide-el="controls[nav]">
                            <?php for ($j = 0; $j < count($resultCarrosselList); $j++) : ?>
                                <button class="glide__bullet" data-glide-dir="=<?= $j ?>"></button>
                            <?php endfor; ?>
                        </div>
                    </div>

                    <div class="glide__arrows right" data-glide-el="controls">
                        <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><i class="fa-solid fa-arrow-right"></i></button>
                    </div>
                </section>

            </section>

            <!-- GERENCIADOR DO CARROSSEL -->
            <section class="edit-carrossel">
                <?php
                if (count($resultCarrosselList) > 0) :
                    for ($i = 0; $i < count($resultCarrosselList); $i++) :
                ?>

                        <div class="banner-box">
                            <img src="<?= $resultCarrosselList[$i]['link_carrossel'] ?>" alt="<?= $resultCarrosselList[$i]['nome_carrossel'] ?>">
                            <div class="box-info">
                                <h2><?= $resultCarrosselList[$i]['nome_carrossel'] ?></h2>
                                <p><?= $resultCarrosselList[$i]['link_carrossel'] ?></p>
                                <p>246KBs</p>
                            </div>
                            <button id="delete-prod" onclick="window.location.href='../controller/ControllerCarrosselADM.php?id=<?= $resultCarrosselList[$i]['id_carrossel'] ?>&action=deleteCarrosselADM'">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                            <button id="edit-prod" onclick="window.location.href='./CRUDEditCarrossel.php?id=<?= $resultCarrosselList[$i]['id_carrossel'] ?>&action=editCarrosselADM'">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </button>
                        </div>

                <?php
                    endfor;
                endif;
                ?>

                <button id="btn-new-produto" onclick="window.location.href='./CRUDAddCarrossel.php'">
                    <div class="icon-container">
                        <i class="fa-regular fa-plus"></i>
                    </div>
                    Novo Banner
                </button>
            </section>
        </article>

    </main>
</body>

<script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
<script src="../assets/js/carrossel.js"></script>
<script src="../assets/js/navbarFix.js"></script>

<?php
if (isset($_POST['msg'])) {
    require_once './msg.php';
    $msg = $_POST["msg"];
    $msgExibir = $MSG[$msg];
    echo "<script>alert('" . $msgExibir . "');</script>";
}


?>

</html>