<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once __DIR__ . "/../config/stylesConfig.php"  ?>
    <link rel="stylesheet" href="../../node_modules/./@glidejs/./glide/./dist/./css/./glide.core.min.css">
    <link rel="stylesheet" href="../../node_modules/@glidejs/glide/dist/css/glide.theme.min.css">
    <link rel="stylesheet" href="../assets/styles/produto.css">


</head>
<!-- Barra de Navegação -->
<?php require_once './navbar.php'; ?>

<body id="body-margin">
    <main class="produto-page">
        <!-- Container Produto e valor -->
        <article class="container-produto">
            <section class="container-img-produto">
                    <!--       Imagem do Produto         -->
                <img id="image-principal" src="../assets/img/Time.png" alt="Capinha flamengo">
                <!-- Carrossel -->
                <div class="glide carousel-imgprod">

                    <div class="glide__arrows left" data-glide-el="controls">
                        <button class="glide__arrow glide__arrow--left" data-glide-dir="<">
                            <i class="fa-solid fa-angle-left"></i>
                        </button>
                    </div>

                    <div class="glide__track" data-glide-el="track">
                        <ul class="glide__slides img-carousel-btn">

                            <!--Inicio For-->
                            <button id="btn-new-image">
                                <img src="../assets/img/Banner1.png" onclick="imgChange(this)" alt="Capinha flamengo">
                            </button>

                            <button id="btn-new-image">
                                <img src="../assets/img/Banner2.png" onclick="imgChange(this)" alt="Capinha flamengo">
                            </button>

                            <button id="btn-new-image">
                                <img src="../assets/img/Banner3.png" onclick="imgChange(this)" alt="Capinha flamengo">
                            </button>
                            <!--Fim For-->
                            <button id="btn-new-image">
                                <img src="../assets/img/Time.png" onclick="imgChange(this)" alt="Capinha flamengo">
                            </button>

                        </ul>
                    </div>

                    <div class="glide__arrows right" data-glide-el="controls">
                        <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
                            <i class="fa-solid fa-angle-right"></i>
                        </button>
                    </div>

                </div>
            </section>

            <form method="POST" action="#" class="box-produto-info">
                <!-- Oferta Especial -->
                <span id="special-condition">
                    <i class="fa-solid fa-fire-flame-curved"></i>
                    <p>Oferta Especial</p>
                </span>

                <!-- Nome do Produto -->
                <h2>Capinha Flamengo - 2022 Oficial Seleção</h2>

                <!-- Valor e Avaliação -->
                <div class="box-value-stars">
                    <div class="box-value">
                        <p id="last-price">R$ 20,00</p>
                        <h3>R$ 25,00</h3>
                    </div>

                    <div class="box-stars">
                        <div class="container-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>

                        <p>200 Avaliações</p>
                    </div>
                </div>

                <!-- Seleção do Modelo -->
                <div class="select-option-prod">
                    <label for="marcaProduto">Selecione a Marca
                        <select name="marcaProduto" oninput="selectCelularCheck()" id="select-marca">
                            <option>Apple</option>
                            <option>Samsung</option>
                        </select>
                    </label>
                        <!--Modelo Iphone-->
                    <label id="select-modelo-iphone-label" for="modeloProduto">Selecione o Modelo
                        <select name="modeloProduto" id="select-modelo-iphone">
                            <option>Iphone 13</option>
                        </select>
                    </label>

                        <!--Modelo samsung-->
                    <label style="display: none" id="select-modelo-samsung-label" for="modeloProduto">Selecione o Modelo
                        <select name="modeloProduto" id="select-modelo-samsung">
                            <option>Galaxy S20</option>
                        </select>
                    </label>
                </div>

                <!-- Adicionar ao Carrinho -->
                <button type="submit" id="btn-carrinho">
                    <i class="fa-solid fa-bag-shopping fa-2x"></i>
                    Adicionar ao Carrinho
                </button>

                <!-- Calcular o Frete -->
                <div class="cep-calc">
                    <P>Calcule o Frete</P>
                    <div class="cep-container">
                        <label for="cep">
                            <input data-js="cep" type="text" name="cep" placeholder="CEP" id="input-calcula-cep">
                        </label>
                        <button type="button" id="principal-button">Calcular</button>
                    </div>
                    <a target="_blank" href="https://www2.correios.com.br/sistemas/buscacep/buscaCep.cfm">Não sei meu CEP</a>
                </div>

            </form>
        </article>

        <article class="homepage-prod-carrossel">
            <h1>Veja Similares</h1>
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

        <article class="container-about-prod">
            <h1>Informações sobre o Produto</h1>
            <section class="box-about">
                <div class="text-about">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio minus excepturi quasi blanditiis aperiam non harum animi sit nulla, ex quo ab, voluptas inventore reprehenderit iure illo sapiente fugit! Repudiandae accusamus recusandae sunt asperiores molestias, dolore impedit, ea harum numquam saepe nihil explicabo itaque rem quia vero magni?<br><br> Voluptatem rerum molestiae repudiandae perferendis tempora praesentium possimus officiis corrupti. Nemo reprehenderit voluptatum quo fuga dolore omnis odit officiis nulla, veritatis repellat, adipisci doloremque, dolores eius ipsa perferendis cupiditate at veniam. Pariatur dolor illo ullam quidem beatae similique commodi laudantium. Alias, mollitia dolor molestias placeat libero harum hic assumenda consequuntur maiores eius quod aperiam dignissimos magnam soluta facere laudantium explicabo, provident autem ratione voluptatibus veritatis illum, voluptate id. Saepe neque nobis facilis!</p>
                </div>

                <div class="container-image-about">
                    <img id="image-principal" src="../assets/img/Time.png" alt="Capinha flamengo">
                </div>
            </section>
        </article>

        <article class="homepage-beneficios">
            <section class="container-beneficio" id="beneficio1">
                <img src="../assets/img/fast-time-icon.png" alt="Entregas rápidas para todo o Brasil">
                <h3>Jajá na sua casa</h3>
                <p>Tempo de Entrega máximo</p>
            </section>

            <section class="container-beneficio" id="beneficio2">
                <img src="../assets/img/like-icon.png" alt="Entregas rápidas para todo o Brasil">
                <h3>Dificil de escolher</h3>
                <p>Capinhas para todos os celulares e gostos.</p>
            </section>

            <section class="container-beneficio" id="beneficio3">
                <img src="../assets/img/premium-icon.png" alt="Entregas rápidas para todo o Brasil">
                <h3>Qualidade garantida</h3>
                <p>Garantia do Produto</p>
            </section>
        </article>

        <article class="container-avaliacao">
            <h1>Avaliações de quem comprou</h1>
            <section class="container-dados-rating">
                <div class="box-total-rating">
                    <h2>5,0</h2>
                    <div class="container-stars">
                        <i class="fa-solid fa-star fa-2x"></i>
                        <i class="fa-solid fa-star fa-2x"></i>
                        <i class="fa-solid fa-star fa-2x"></i>
                        <i class="fa-solid fa-star fa-2x"></i>
                        <i class="fa-solid fa-star fa-2x"></i>
                    </div>
                    <p>200 avaliações</p>
                </div>
            </section>

            <section class="container-users-rating">
                <section class="user-rating usr1">
                    <div class="user-total-rating">
                        <h3>5,0</h3>
                        <div class="container-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>

                    <div class="user-rat-info">
                        <h3>Camargo Davi</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore aliquid officiis accusantium dolorem voluptas pariatur, dicta maiores consectetur iste ipsum consequatur voluptates sint magnam possimus numquam ducimus fugit earum officia laboriosam totam natus! Repellendus ullam rerum nobis ex fugiat illo mollitia. Commodi possimus dolorem reiciendis obcaecati numquam temporibus ea repellat.</p>
                        <div class="container-comment">
                            <p id="quest-comment">Esse comentário foi útil?</p>
                            <button id="like-comment">
                                <i class="fa-solid fa-thumbs-up"></i>
                            </button>

                            <button id="dislike-comment">
                                <i class="fa-solid fa-thumbs-down"></i>
                            </button>
                        </div>
                    </div>

                    <div class="data-comment">
                        <p>21/01/2006</p>
                    </div>
                </section   >
            </section>
        </article>
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
<script defer src="../assets/js/produto.js"></script>


<script>
    new Glide('.carousel-imgprod', {
        type: 'carousel',
        startAt: 0,
        perView: 4

    }).mount();

    new Glide('.prod-container-box', {
        type: 'carousel',
        startAt: 0,
        perView: 4,
        autoplay: 2000,
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
<?php require_once './footer.php'; ?>

</html>