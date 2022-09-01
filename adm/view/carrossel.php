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
                        <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><i class="fa-solid fa-arrow-right"></i></button>
                    </div>
                </section>

            </section>

            <!-- GERENCIADOR DO CARROSSEL -->
            <section class="edit-carrossel">
                <div class="banner-box">
                    <img src="../assets/img/Banner1.png" alt="Banner1">
                    <div class="box-info">
                        <h2>Titulo Imagem</h2>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ut, minus.</p>
                        <p>246KBs</p>
                    </div>
                    <button id="delete-prod"><i class="fa-solid fa-trash-can"></i></button>
                    <button id="edit-prod"><i class="fa-regular fa-pen-to-square"></i></i></button>
                </div>

                <button id="btn-new-produto">
                    <div class="icon-container">
                        <i class="fa-regular fa-plus"></i>
                    </div>
                    Novo Produto
                </button>
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
</script>

</html>