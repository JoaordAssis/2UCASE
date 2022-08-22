<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once __DIR__ . "/../config/stylesConfig.php"  ?>
    <link rel="stylesheet" href="../../node_modules/@glidejs/glide/dist/css/glide.core.min.css">
    <link rel="stylesheet" href="../assets/styles/homepage.css">
</head>
<!-- Barra de Navegação -->
<?php require_once './navbar.php'; ?>

<body id="body-margin">
    <main class="homepage-content">
        <article class="homepage-center">

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
<!-- Footer -->
<?php //require_once "./footer.php"; 
?>

</html>