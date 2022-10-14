<?php
require_once __DIR__ . "/../../vendor/autoload.php";
use app\model\Manager;

$manager  = new Manager();
$returnBanners = $manager->listClient("adm_carrossel", 'id_carrossel');
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php require_once __DIR__ . "/../config/stylesConfig.php"  ?>
    <link rel="stylesheet" href="../../node_modules/@glidejs/glide/dist/css/glide.core.min.css">
    <link rel="stylesheet" href="../../node_modules/@glidejs/glide/dist/css/glide.theme.min.css">
    <link rel="stylesheet" href="../assets/styles/homepage.css">
</head>
<!-- Barra de Navegação -->
<?php require_once './navbar.php'; ?>

<body id="body-margin">
    <main class="homepage-content">
        <article class="homepage-carrossel">

            <section class="carrossel-container">

                <?php
                if(count($returnBanners) > 0):
                ?>
                <section class="glide carrossel-container-box">
                    <div class="glide__arrows left" data-glide-el="controls">
                        <button class="glide__arrow glide__arrow--left" data-glide-dir="<">prev</button>
                    </div>
                    <div class="glide__track" data-glide-el="track">

                        <ul class="glide__slides">

                            <?php
                            for ($i = 0, $iMax = count($returnBanners); $i < $iMax; $i++):
                            ?>

                            <div class="carrossel-box glide__slide">
                                <img src="../../adm/databases/<?=$returnBanners[$i]['link_carrossel']?>"
                                     alt="<?=$returnBanners[$i]['nome_carrossel']?>">
                            </div>

                            <?php
                            endfor;
                            ?>

                        </ul>
                        <div class="glide__bullets" data-glide-el="controls[nav]">
                            <?php
                            for ($j = 0, $jMax = count($returnBanners); $j < $jMax; $j++):
                            ?>
                            <button class="glide__bullet" data-glide-dir="=<?=$j?>"></button>
                            <?php
                            endfor;
                            ?>
                        </div>
                    </div>

                    <div class="glide__arrows right" data-glide-el="controls">
                        <button class="glide__arrow glide__arrow--right" data-glide-dir=">">next</button>
                    </div>
                </section>

            </section>
                <?php
                endif;
                ?>

        </article>

        <article class="homepage-beneficios">
            <section class="container-beneficio" id="beneficio1">
                <img src="../assets/img/fast-time-icon.png" alt="Entregas rápidas para todo o Brasil">
                <h3>Jajá na sua casas</h3>
                <p>Entrega rápida para todo o Brasil.</p>
            </section>

            <section class="container-beneficio" id="beneficio2">
                <img src="../assets/img/like-icon.png" alt="Entregas rápidas para todo o Brasil">
                <h3>Dificil de escolher</h3>
                <p>Capinhas para todos os celulares e gostos.</p>
            </section>

            <section class="container-beneficio" id="beneficio3">
                <img src="../assets/img/premium-icon.png" alt="Entregas rápidas para todo o Brasil">
                <h3>Qualidade garantida</h3>
                <p>Produtos da mais alta qualidade para você.</p>
            </section>
        </article>

        <article class="homepage-about-section">
            <section class="texts-about">
                <h1>Saiba mais sobre nós</h1>
                <p>Empresa N° 1 No ramo de capinhas personalizadas.</p>
                <button onclick="window.location.href='./about.php'" id="btn-about-more">Saiba Mais</button>
            </section>

            <img src="../assets/img/bannerAboutPage.jpg" alt="Mais sobre a loja.">
        </article>

        <article class="homepage-prod-carrossel">
            <h1>Mais vendidos</h1>
            <section class="glide prod-container-box">
                <div class="glide__arrows left" data-glide-el="controls">
                    <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><i class="fa-solid fa-angle-left fa-2x"></i></button>
                </div>
                <div class="glide__track" data-glide-el="track">

                    <ul class="glide__slides">
                        <?php for ($i = 0; $i < 6; $i++) : ?>

                            <a class="produto-box glide__slide" href="./produto.php">
                                <img src="../assets/img/Time.png" alt="Capinha Flamengo">
                                <h4>Capinha 2022 - Flamengo</h4>
                                <p>R$ 23,59</p>
                            </a>

                        <?php endfor; ?>
                    </ul>
                </div>

                <div class="glide__arrows right" data-glide-el="controls">
                    <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><i class="fa-solid fa-angle-right fa-2x"></i></button>
                </div>
            </section>
        </article>

        <article class="homepage-category">
            <h1>Categorias</h1>
            <section class="homepage-category-cards">
                <a href="#" class="card-category" id="card1">
                    <div class="shadow-hover">
                        <h2>Animações</h2>
                    </div>
                    <img src="../assets/img/Olafinho.png" alt="Banner 1">
                </a>

                <a href="#" class="card-category" id="card1">
                    <div class="shadow-hover">
                        <h2>Estampas</h2>
                    </div>
                    <img src="../assets/img/AmendoeiraVanGoghCase.png" alt="Banner 1">
                </a>

                <a href="#" class="card-category" id="card1">
                    <div class="shadow-hover">
                        <h2>Flork</h2>
                    </div>
                    <img src="../assets/img/Florkgirly.png" alt="Banner 1">
                </a>

                <a href="#" class="card-category" id="card1">
                    <div class="shadow-hover">
                        <h2>Heroís</h2>
                    </div>
                    <img src="../assets/img/BabyGrootParty.png" alt="Banner 1">
                </a>

                <a href="#" class="card-category" id="card1">
                    <div class="shadow-hover">
                        <h2>Times</h2>
                    </div>
                    <img src="../assets/img/GarotaCorinthiana.png" alt="Banner 1">
                </a>

                <a href="#" class="card-category" id="card1">
                    <div class="shadow-hover">
                        <h2>Pop Sockets</h2>
                    </div>
                    <img src="../assets/img/StitchAirpodscase.png" alt="Banner 1">
                </a>
            </section>
        </article>

        <article class="homepage-prod-carrossel">
            <h1>Mais vendidos</h1>
            <section class="glide prod-container-box-like">
                <div class="glide__arrows left" data-glide-el="controls">
                    <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><i class="fa-solid fa-angle-left fa-2x"></i></button>
                </div>
                <div class="glide__track" data-glide-el="track">

                    <ul class="glide__slides">
                        <?php for ($i = 0; $i < 6; $i++) : ?>

                            <a class="produto-box glide__slide" href="./produto.php">
                                <img src="../assets/img/Time.png" alt="Capinha Flamengo">
                                <h4>Capinha 2022 - Flamengo</h4>
                                <p>R$ 23,59</p>
                            </a>

                        <?php endfor; ?>

                    </ul>
                </div>

                <div class="glide__arrows right" data-glide-el="controls">
                    <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><i class="fa-solid fa-angle-right fa-2x"></i></button>
                </div>
            </section>
        </article>

        <article class="homepage-prod-carrossel">
            <h1>Mais vendidos</h1>
            <section class="glide prod-container-box-sell">
                <div class="glide__arrows left" data-glide-el="controls">
                    <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><i class="fa-solid fa-angle-left fa-2x"></i></button>
                </div>
                <div class="glide__track" data-glide-el="track">

                    <ul class="glide__slides">
                        <?php for ($i = 0; $i < 6; $i++) : ?>

                            <a class="produto-box glide__slide" href="./produto.php">
                                <img src="../assets/img/Time.png" alt="Capinha Flamengo">
                                <h4>Capinha 2022 - Flamengo</h4>
                                <p>R$ 23,59</p>
                            </a>

                        <?php endfor; ?>

                    </ul>
                </div>

                <div class="glide__arrows right" data-glide-el="controls">
                    <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><i class="fa-solid fa-angle-right fa-2x"></i></button>
                </div>
            </section>
        </article>
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
<script src="../assets/js/homepage.js"></script>
<!-- Footer -->
<?php require_once "./footer.php"; ?>

</html>