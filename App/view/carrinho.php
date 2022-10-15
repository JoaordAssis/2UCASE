<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once __DIR__ . "/../config/stylesConfig.php"; ?>
    <link rel="stylesheet" href="../../node_modules/./@glidejs/./glide/./dist/./css/./glide.core.min.css">
    <link rel="stylesheet" href="../../node_modules/@glidejs/glide/dist/css/glide.theme.min.css">
    <link rel="stylesheet" href="../assets/styles/carrinho.css">

</head>
<!-- Barra de Navegação -->
<?php require_once './navbar.php'; ?>

<body id="body-margin">

    <main class="carrinho-corpo">

        <article class="carrinho-container">
            <h1>Seu Carrinho</h1>
            <p>Não está pronto para finalizar sua compra?<a href="./category.php"> Continuar Comprando.</a></p>

            <section class="body-parts">
                <section class="prod-carrinho">
                    <div class="fechar">
                        <button id="fechar-btn"><i class="fa-regular fa-xmark fa-1x"></i></button>
                    </div>
                    <div class="produto-info">
                        <img src="../assets/./img/./Time.png" alt="Alt dinâmico">
                        <div class="titles-column">
                            <h4>Flamengo - Uniforme 1 2022 Personalizado</h4>
                            <p id="p-opaco">Iphone 13 Max</p>
                        </div>

                        <div class="quantidade">
                            <p id="p-opaco">QUANT</p>
                            <select name="quant" id="quant-select">
                                <option value="1">1</option>
                            </select>
                        </div>

                        <div class="valor">
                            <p id="p-opaco">VALOR</p>
                            <P>R$ 36,65</P>
                        </div>
                    </div>

                    <div class="cupom-container">
                        <input type="text" name="cupom" id="input-cupom" placeholder="Cupom de Desconto">
                        <button id="principal-button" class="cupom-btn">Aplicar Cupom</button>
                    </div>
                </section>

                <section class="detail-order">

                    <div class="subtotal">
                        <p>SUBTOTAL:</p>
                        <span id="color-payment">
                            <p>R$ 241,65</p>
                        </span>
                    </div>

                    <div class="frete-payment">
                        <p>FRETE:</p>
                        <span id="color-payment">
                            <p>R$ 41,75</p>
                        </span>
                    </div>

                    <div class="desconto">
                        <p>DESCONTO:</p>
                        <span id="color-payment">
                            <p>R$ 00,00</p>
                        </span>
                    </div>

                    <div class="total">
                        <p>TOTAL:</p>
                        <span id="color-payment">
                            <p>R$ 241,65</p>
                        </span>
                    </div>

                    <button id="principal-button">Finalizar Compra</button>

                    <div class="cep-calc">
                        <div class="cep-container">
                            <label for="cep">
                                <input type="text" name="cep" placeholder="CEP" id="input-entrega">
                            </label>
                            <button id="principal-button">Calcular</button>
                        </div>

                        <a target="_blank" href="https://www2.correios.com.br/sistemas/buscacep/buscaCep.cfm">Não sei meu CEP</a>
                    </div>
                </section>
            </section>

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
    </main>

</body>
<!-- Footer -->
<?php require_once './footer.php';
?>

<script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
<script>
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

</html>