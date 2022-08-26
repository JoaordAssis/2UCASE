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

                <section class="glide carrossel-container-box">
                    <div class="glide__arrows left" data-glide-el="controls">
                        <button class="glide__arrow glide__arrow--left" data-glide-dir="<">prev</button>
                    </div>
                    <div class="glide__track" data-glide-el="track">

                        <ul class="glide__slides">

                            <div class="carrossel-box glide__slide">
                                <img src="../assets/img/Banner1.png" alt="Banner1">
                            </div>

                            <div class="carrossel-box glide__slide">
                                <img src="../assets/img/Banner2.png" alt="Banner1">
                            </div>

                            <div class="carrossel-box glide__slide">
                                <img src="../assets/img/Banner3.png" alt="Banner1">
                            </div>

                        </ul>
                        <div class="glide__bullets" data-glide-el="controls[nav]">
                            <button class="glide__bullet" data-glide-dir="=0"></button>
                            <button class="glide__bullet" data-glide-dir="=1"></button>
                            <button class="glide__bullet" data-glide-dir="=2"></button>
                        </div>
                    </div>

                    <div class="glide__arrows right" data-glide-el="controls">
                        <button class="glide__arrow glide__arrow--right" data-glide-dir=">">next</button>
                    </div>
                </section>

            </section>

        </article>

        <article class="homepage-beneficios">
            <section class="container-beneficio" id="beneficio1">
                <img src="../assets/img/fast-time-icon.png" alt="Entregas rápidas para todo o Brasil">
                <h3>Jajá na sua casa</h3>
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
                <h1>Catch Phrase</h1>
                <p>Simple example text, to gain the attention of the client.</p>
                <button id="btn-about-more">Learn More</button>
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
                        <a class="produto-box glide__slide" href="#">
                            <img src="../assets/img/Time.png" alt="Capinha Flamengo">
                            <h4>Capinha 2022 - Flamengo</h4>
                            <p>R$ 23,59</p>
                        </a>

                        <a class="produto-box glide__slide" href="#">
                            <img src="../assets/img/Time.png" alt="Capinha Flamengo">
                            <h4>Capinha 2022 - Flamengo</h4>
                            <p>R$ 23,59</p>
                        </a>

                        <a class="produto-box glide__slide" href="#">
                            <img src="../assets/img/Time.png" alt="Capinha Flamengo">
                            <h4>Capinha 2022 - Flamengo</h4>
                            <p>R$ 23,59</p>
                        </a>

                        <a class="produto-box glide__slide" href="#">
                            <img src="../assets/img/Time.png" alt="Capinha Flamengo">
                            <h4>Capinha 2022 - Flamengo</h4>
                            <p>R$ 23,59</p>
                        </a>

                        <a class="produto-box glide__slide" href="#">
                            <img src="../assets/img/Time.png" alt="Capinha Flamengo">
                            <h4>Capinha 2022 - Flamengo</h4>
                            <p>R$ 23,59</p>
                        </a>

                        <a class="produto-box glide__slide" href="#">
                            <img src="../assets/img/Time.png" alt="Capinha Flamengo">
                            <h4>Capinha 2022 - Flamengo</h4>
                            <p>R$ 23,59</p>
                        </a>

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
                <div class="card-category" id="card1">
                    <img src="../assets/img/Banner1.png" alt="Banner 1">
                </div>

                <div class="card-category" id="card2">
                    <img src="../assets/img/Banner2.png" alt="Banner 1">
                </div>

                <div class="card-category" id="card3">
                    <img src="../assets/img/Banner3.png" alt="Banner 1">
                </div>

                <div class="card-category" id="card4">
                    <img src="../assets/img/Banner1.png" alt="Banner 1">
                </div>

                <div class="card-category" id="card5">
                    <img src="../assets/img/Banner2.png" alt="Banner 1">
                </div>

                <div class="card-category" id="card6">
                    <img src="../assets/img/Banner3.png" alt="Banner 1">
                </div>
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
                        <a class="produto-box glide__slide" href="#">
                            <img src="../assets/img/Time.png" alt="Capinha Flamengo">
                            <h4>Capinha 2022 - Flamengo</h4>
                            <p>R$ 23,59</p>
                        </a>

                        <a class="produto-box glide__slide" href="#">
                            <img src="../assets/img/Time.png" alt="Capinha Flamengo">
                            <h4>Capinha 2022 - Flamengo</h4>
                            <p>R$ 23,59</p>
                        </a>

                        <a class="produto-box glide__slide" href="#">
                            <img src="../assets/img/Time.png" alt="Capinha Flamengo">
                            <h4>Capinha 2022 - Flamengo</h4>
                            <p>R$ 23,59</p>
                        </a>

                        <a class="produto-box glide__slide" href="#">
                            <img src="../assets/img/Time.png" alt="Capinha Flamengo">
                            <h4>Capinha 2022 - Flamengo</h4>
                            <p>R$ 23,59</p>
                        </a>

                        <a class="produto-box glide__slide" href="#">
                            <img src="../assets/img/Time.png" alt="Capinha Flamengo">
                            <h4>Capinha 2022 - Flamengo</h4>
                            <p>R$ 23,59</p>
                        </a>

                        <a class="produto-box glide__slide" href="#">
                            <img src="../assets/img/Time.png" alt="Capinha Flamengo">
                            <h4>Capinha 2022 - Flamengo</h4>
                            <p>R$ 23,59</p>
                        </a>

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
                        <a class="produto-box glide__slide" href="#">
                            <img src="../assets/img/Time.png" alt="Capinha Flamengo">
                            <h4>Capinha 2022 - Flamengo</h4>
                            <p>R$ 23,59</p>
                        </a>

                        <a class="produto-box glide__slide" href="#">
                            <img src="../assets/img/Time.png" alt="Capinha Flamengo">
                            <h4>Capinha 2022 - Flamengo</h4>
                            <p>R$ 23,59</p>
                        </a>

                        <a class="produto-box glide__slide" href="#">
                            <img src="../assets/img/Time.png" alt="Capinha Flamengo">
                            <h4>Capinha 2022 - Flamengo</h4>
                            <p>R$ 23,59</p>
                        </a>

                        <a class="produto-box glide__slide" href="#">
                            <img src="../assets/img/Time.png" alt="Capinha Flamengo">
                            <h4>Capinha 2022 - Flamengo</h4>
                            <p>R$ 23,59</p>
                        </a>

                        <a class="produto-box glide__slide" href="#">
                            <img src="../assets/img/Time.png" alt="Capinha Flamengo">
                            <h4>Capinha 2022 - Flamengo</h4>
                            <p>R$ 23,59</p>
                        </a>

                        <a class="produto-box glide__slide" href="#">
                            <img src="../assets/img/Time.png" alt="Capinha Flamengo">
                            <h4>Capinha 2022 - Flamengo</h4>
                            <p>R$ 23,59</p>
                        </a>

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

<script>
    new Glide('.carrossel-container-box', {
        type: 'carousel',
        startAt: 0,
        perView: 1
    }).mount();

    new Glide('.prod-container-box', {
        type: 'carousel',
        startAt: 0,
        perView: 4,
        gap: 2,
        breakpoints: {
            800: {
                perView: 3
            },
            600: {
                perView: 2
            },
            500: {
                perView: 1
            }
        }


    }).mount();

    new Glide('.prod-container-box-like', {
        type: 'carousel',
        startAt: 0,
        perView: 4,
        gap: 2,
        breakpoints: {
            800: {
                perView: 3
            },
            600: {
                perView: 2
            },
            500: {
                perView: 1
            }
        }
    }).mount();

    new Glide('.prod-container-box-sell', {
        type: 'carousel',
        startAt: 0,
        perView: 4,
        gap: 2,
        breakpoints: {
            800: {
                perView: 3
            },
            600: {
                perView: 2
            },
            500: {
                perView: 1
            }
        }
    }).mount();
</script>
<!-- Footer -->
<?php
require_once "./footer.php";
?>

</html>