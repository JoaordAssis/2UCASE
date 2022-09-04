<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once __DIR__ . "/../config/stylesConfig.php"  ?>
    <link rel="stylesheet" href="../assets/styles/category.css">
</head>
<!-- Barra de Navegação -->
<?php require_once './navbar.php'; ?>

<body id="body-margin">
    <main class="category-container">
        <div class="image-container">
            <img src="../assets/./img/./Esportes.png" alt="Imagem da categoria" id="image-category">
        </div>

        <article class="filters-category">
            <section class="filtros-path">
                <div class="title-filtros">
                    <h2>Time</h2>
                    <p>HOME / CAPINHAS /<span id="last-path">TIME</span></p>
                </div>

                <div class="filters-container row-product-container">

                    <div class="pergunta">
                        <button class="accordion">Pergunta muito requisitada<img width="40" height="40" src="../assets/./svg/./arrow.svg" alt="icone de dropdown"></button>
                        <div class="panel">
                            <div class="checkbox">
                                <label for="time">
                                    <input type="checkbox" name="time" id="input-checkbox">
                                    Times
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="pergunta">
                        <button class="accordion">Pergunta muito requisitada<img width="40" height="40" src="../assets/./svg/./arrow.svg" alt="icone de dropdown"></button>
                        <div class="panel">
                            <div class="checkbox">
                                <label for="time">
                                    <input type="checkbox" name="time" id="input-checkbox">
                                    Times
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="pergunta">
                        <button class="accordion">Pergunta muito requisitada<img width="40" height="40" src="../assets/./svg/./arrow.svg" alt="icone de dropdown"></button>
                        <div class="panel">
                            <div class="checkbox">
                                <label for="time">
                                    <input type="checkbox" name="time" id="input-checkbox">
                                    Times
                                </label>
                            </div>
                        </div>
                    </div>

            </section>


            <section class="row-product-container" id="resize-container">
                <div class="order-option">
                    <h4>Ordenar Por: </h4>
                    <select name="order" id="order-select">
                        <option value="vistos">Mais Vistos</option>
                    </select>
                </div>

                <div class="product-container">
                    <?php for ($i = 0; $i < 15; $i++) : ?>

                        <a class="produto-box glide__slide" href="./produto.php">
                            <img src="../assets/img/Time.png" alt="Capinha Flamengo">
                            <h4>Capinha 2022 - Flamengo</h4>
                            <p>R$ 23,59</p>
                        </a>

                    <?php endfor; ?>
                </div>
            </section>
        </article>
    </main>

    <script src="../assets/./js/category.js"></script>
</body>
<!-- Footer -->
<?php require_once './footer.php'; ?>

</html>