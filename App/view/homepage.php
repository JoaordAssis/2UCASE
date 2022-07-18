<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once __DIR__ . "/../config/stylesConfig.php"  ?>
    <link rel="stylesheet" href="../../node_modules/./@glidejs/./glide/./dist/./css/./glide.core.min.css">
    <link rel="stylesheet" href="../assets/styles/homepage.css">
</head>
<!-- Barra de Navegação -->
<?php require_once './navbar.php'; ?>

<body id="body-margin">

    <main class="homepage-container">

        <section class="glide image-box">
            <div class="glide__arrows left" data-glide-el="controls">
                <button class="glide__arrow glide__arrow--left" data-glide-dir="<">prev</button>
            </div>
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    <img src="../assets/./img/./SailorMoon.png" alt="Promoção Sailor Moon">
                    <img src="../assets/./img/./bannerAbout.png" alt="Texto Qualquer">
                </ul>
            </div>
            <div class="glide__arrows right" data-glide-el="controls">
                <button class="glide__arrow glide__arrow--right" data-glide-dir=">">next</button>
            </div>
        </section>

        <section class="category-box">
            <div class="category-dinamica">
                <img id="image-resize" src="../assets/./img/./Banner1.png" alt="Categoria 1">
            </div>

            <section class="column-category">
                <div class="category-dinamica">
                    <img src="../assets/./img/./Banner2.png" alt="Categoria 2">
                </div>

                <div class="category-dinamica">
                    <img src="../assets/./img/./Banner3.png" alt="Categoria 3">
                </div>
            </section>
        </section>


        <article class="motivos-amar">
            <h1>Motivos Para Amar</h1>

            <section class="amar">
                <div class="entrega-point point">
                    <img src="../assets/./svg/./fast-time.svg" width="60" height="60" alt="Entrega rapida">
                    <p>Entrega rápida em todo Brasil</p>
                </div>

                <div class="quality-point point">
                    <img src="../assets/./svg/./premium-product.svg" width="60" height="60" alt="Produto de Qualidade">
                    <p>Produto de alta qualidade</p>
                </div>

                <div class="like-point point">
                    <img src="../assets/./svg/./love.svg" width="60" height="60" alt="Ame os produtos">
                    <p>Capinhas para todos os celulares e gostos</p>
                </div>
            </section>

        </article>


        <article class="product-container ofertas">
            <h1>Ofertas do Dia</h1>

            <section class="glide product-cont">
                <div class="glide__arrows left" data-glide-el="controls">
                    <button class="glide__arrow glide__arrow--left" data-glide-dir="<">prev</button>
                </div>
                <div class="glide__track" data-glide-el="track">
                    <ul class="glide__slides">
                        <?php for ($i = 0; $i < 10; $i++) : ?>

                            <div class="product-box glide__slide">
                                <a href="#">
                                    <img src="../assets/./img/./Time.png" alt="imagem time do flamengas">
                                    <h4>Flamengo - Uniforme 1 2022 Personalizada</h4>
                                    <div class="stars">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                    <p>R$ 36,65</p>
                                    <button id="principal-button">Comprar</button>
                                </a>
                            </div>

                        <?php endfor; ?>
                    </ul>
                </div>
                <div class="glide__arrows right" data-glide-el="controls">
                    <button class="glide__arrow glide__arrow--right" data-glide-dir=">">next</button>
                </div>
            </section>
        </article>


        <article class="product-container lancamento">
            <h1>Lançamentos</h1>

            <section class="glide product-cont prod-lanc">
                <div class="glide__arrows left" data-glide-el="controls">
                    <button class="glide__arrow glide__arrow--left" data-glide-dir="<">prev</button>
                </div>
                <div class="glide__track" data-glide-el="track">
                    <ul class="glide__slides">
                        <?php for ($i = 0; $i < 10; $i++) : ?>

                            <div class="product-box glide__slide">
                                <a href="#">
                                    <img src="../assets/./img/./Time.png" alt="imagem time do flamengas">
                                    <h4>Flamengo - Uniforme 1 2022 Personalizada</h4>
                                    <div class="stars">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                    <p>R$ 36,65</p>
                                    <button id="principal-button">Comprar</button>
                                </a>
                            </div>

                        <?php endfor; ?>
                    </ul>
                </div>
                <div class="glide__arrows right" data-glide-el="controls">
                    <button class="glide__arrow glide__arrow--right" data-glide-dir=">">next</button>
                </div>
            </section>
        </article>


    </main>

</body>
<!-- Footer -->
<?php require_once "./footer.php"; ?>


<script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
<script>
    new Glide('.glide', {
        type: 'carousel',
        startAt: 0,
        perView: 1
    }).mount();


    new Glide('.product-cont', {
        type: 'carousel',
        startAt: 0,
        perView: 4,
        breakpoints: {
            1300: {
                perView: 3
            },
            1100: {
                perView: 2
            },

            550: {
                perView: 1
            },

            350: {
                perView: 1
            }
        }
    }).mount();

    new Glide('.prod-lanc', {
        type: 'carousel',
        startAt: 0,
        perView: 4,
        breakpoints: {
            1300: {
                perView: 3
            },
            1100: {
                perView: 2
            },

            550: {
                perView: 1
            },

            350: {
                perView: 1
            }
        }
    }).mount();
</script>

</html>