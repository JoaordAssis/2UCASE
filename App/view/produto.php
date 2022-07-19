<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once __DIR__ . "/../config/stylesConfig.php"  ?>
    <link rel="stylesheet" href="../../node_modules/./@glidejs/./glide/./dist/./css/./glide.core.min.css">
    <link rel="stylesheet" href="../assets/styles/produto.css">

</head>
<!-- Barra de Navegação -->
<?php require_once './navbar.php'; ?>

<body id="body-margin">
    <main class="produto-page">

        <!-- Container do produto -->

        <section class="produto-container">
            <article class="imagens-produto">
                <div class="sub-imagens">
                    <img src="../assets/./img/./Time.png" alt="Alt dinamico">
                    <img src="../assets/./img/./Time.png" alt="Alt dinamico">
                    <img src="../assets/./img/./Time.png" alt="Alt dinamico">
                </div>
                <img id="img-principal" src="../assets/./img/./Time.png" alt="Alt dinamico">
            </article>

            <article class="produto-info">
                <div class="title-row">
                    <h3>Flamengo - Uniforme 1 2022 Personalizado</h3>
                    <img src="../assets/./svg/./coracaoProduto.svg" alt="Favoritar Produto">
                </div>

                <div class="category-row">
                    <p>TIME</p>

                    <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                </div>

                <div class="preco-row">
                    <div class="preco">
                        <h5>R$ 64,25</h5>
                        <h4>R$ 34,25</h4>
                    </div>
                    <select name="quantidade" id="quant-input">
                        <option value="1">1</option>
                    </select>
                </div>

                <div class="input-row">
                    <select name="marca" id="select-input">
                        <option value="marca">Marca</option>
                    </select>

                    <select name="modelo" id="select-input">
                        <option value="modelo">Modelo</option>
                    </select>
                </div>

                <input type="text" name="texto" id="input-text" placeholder="Seu texto">

                <button class="btn-comprar" id="principal-button">Comprar</button>

                <div class="cep-calc">
                    <label for="cep">
                        <input type="text" name="cep" placeholder="CEP" id="input-entrega">
                    </label>
                    <button id="principal-button">Calcular</button>
                    <a href="#">Não sei meu CEP</a>
                </div>
            </article>
        </section>

        <!-- Descrição do Produto -->

        <article class="descricao">
            <div class="desc-container">
                <h1>Descrição</h1>

                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Adipisci accusamus officia possimus fuga omnis quidem veritatis eum impedit est molestias aspernatur, nostrum, dolore vel, ipsa deserunt molestiae architecto maxime! Blanditiis, voluptates eveniet! Repellendus, inventore nam odit aliquam ab necessitatibus, ipsam quisquam tempora ducimus impedit similique perferendis tempore, ad reiciendis eveniet.</p>

                <button id="ler-mais">
                    Mostrar Mais
                </button>
            </div>

        </article>

        <!-- Carrosel de produtos 1 - Gostos -->

        <article class="produto-carS produtos-gostei">
            <h1>Quem viu também gostou</h1>
            <section class="glide product-cont prod-gosto">
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

        <!-- Mais imagens do produto -->

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

        <!-- Carrosel de produtos 2 - Vistos -->

        <article class="produto-carS produtos-visto">
            <h1>As capinhas mais vistas</h1>

            <section class="glide product-cont prod-visto">
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

        <!-- Motivos para amar o site -->

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

        <!-- Container de avaliações -->

        <article class="avaliacao-container">
            <secion class="avalicao-titulo">
                <h1>5 Avaliações</h1>
                <div class="stars">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
            </secion>

            <?php for ($i = 0; $i < 6; $i++) : ?>
                <section class="avaliacao">
                    <div class="avaliador-title">
                        <h4>Phelipe Lopes Flores</h4>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>

                    <div class="text-data">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maiores qui ipsum distinctio repellat odit velit possimus magni at? Vitae saepe quisquam doloremque pariatur voluptatem velit?</p>

                        <p id="data">24/03/2028</p>
                    </div>

                    <div class="like-dislike">
                        <div class="like">
                            <img src="../assets/./svg/./approve.svg" width="25" height="25" alt="Gostei">
                            <p>5</p>
                        </div>

                        <div class="dislike">
                            <img src="../assets/./svg/./approve.svg" width="25" height="25" alt="Gostei">
                            <p>5</p>
                        </div>
                    </div>

                </section>
            <?php endfor; ?>
        </article>

        <!-- Carrosel de produtos 3 - Semelhantes -->

        <article class="produto-carS produtos-same">
            <h1>Mais produtos Semelhantes</h1>

            <section class="glide product-cont prod-same">
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
<script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
<script>
    new Glide('.prod-gosto', {
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

    new Glide('.prod-visto', {
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

    new Glide('.prod-same', {
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

<!-- Footer -->
<?php require_once './footer.php';
?>

</html>