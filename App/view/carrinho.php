<?php
session_start();
require_once __DIR__ . "/../../vendor/autoload.php";

use app\model\Manager;

$manager = new Manager();

if (empty($_SESSION['USER-ID'])) {
    //TODO: Tratar erro
    header("Location: ./homepage.php?nao-logado");
    exit();
}

//Querys
$paramsSelectCarrinho = ['id_cliente', 'id_status'];
$paramsPostSelect = [$_SESSION['USER-ID'], 1];
$selectCarrinhoVerify = $manager->selectWhere($paramsSelectCarrinho, $paramsPostSelect, 'user_carrinho');

$checkProdCarrinho = $manager->getInfo('produto_carrinho', 'id_carrinho', $selectCarrinhoVerify[0]['id_carrinho']);


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
            <p>Não está pronto para finalizar a sua compra?<a href="./category.php"> Continuar Comprando.</a></p>

            <section class="body-parts">

                <article class="produto-for-wrapper">
                    <?php
                    //INICIO FOR
                    if (count($checkProdCarrinho) > 0) :
                        for ($i = 0, $iMax = count($checkProdCarrinho); $i < $iMax; $i++) :
                            $getInfoProduto = $manager->getInfo('user_produto', 'id_produto', $checkProdCarrinho[$i]['id_produto']);
                            $returnModelProduto = $manager->getInfo('user_mod_celular', 'id_modelo_celular', $getInfoProduto[0]['id_modelo_celular']);
                            //TODO: Formatar números
                            for ($j = 0, $jMax = count($getInfoProduto); $j < $jMax; $j++) :
                            ?>
                            <section class="prod-carrinho">
                                <form method="POST" action="../controllers/ControllerDeleteCarrinho.php?action=excluir" class="fechar">
                                    <input type="hidden" name="pd" value="<?=$getInfoProduto[$j]['id_produto']?>">
                                    <button type="submit" id="fechar-btn"><i class="fa-regular fa-xmark fa-1x"></i></button>
                                </form>
                                <div class="produto-info">
                                    <img src="../assets/./img/./Time.png" alt="Alt dinâmico">
                                    <div class="titles-column">
                                        <h4><?=$getInfoProduto[$j]['nome_produto']?></h4>
                                        <p id="p-opaco"><?=$returnModelProduto[$j]['modelo_celular']?></p>
                                    </div>

                                    <form class="quantidade" id="form-change-quant" method="post" action="../controllers/ControllerUpdateCarrinho.php">
                                        <p id="p-opaco">QUANT</p>
                                        <input type="hidden" name="pd" value="<?=$getInfoProduto[$j]['id_produto']?>">
                                        <input type="hidden" name="changeQuant" value="change">
                                        <select name="quantProd" id="quant-select">
                                            <?php
                                            for ($t = 0; $t <= $getInfoProduto[$j]['quantidade_produto']; $t++):
                                                echo "<option>$t</option>";

                                                if ($t === $checkProdCarrinho[$i]['quant_carrinho']){
                                                    echo "<option selected>$t</option>";
                                                }
                                            endfor;
                                            ?>
                                        </select>
                                    </form>

                                    <div class="valor">
                                        <p id="p-opaco">VALOR</p>
                                        <P><?=$getInfoProduto[$j]['preco_produto']?></P>
                                    </div>
                                </div>

                                <div class="cupom-container">
                                    <input type="text" name="cupom" id="input-cupom" placeholder="Cupom de Desconto">
                                    <button id="principal-button" class="cupom-btn">Aplicar Cupom</button>
                                </div>
                            </section>

                    <?php
                        //ENDFOR
                            endfor;
                        endfor;
                    endif;
                    ?>
                    <h1>Nenhum produto foi adicionado ainda!</h1>
                </article>



                <section class="detail-order">

                    <?php
                    if (count($selectCarrinhoVerify) > 0):
                    ?>
                    <div class="subtotal">
                        <p>SUBTOTAL:</p>
                        <span id="color-payment">
                            <p>R$ <?=$selectCarrinhoVerify[0]['total_carrinho']?></p>
                        </span>
                    </div>

                    <div class="frete-payment">
                        <p>FRETE:</p>
                        <span id="color-payment">
                            <p id="frete-value">R$ 0,00</p>
                        </span>
                    </div>

                    <div class="desconto">
                        <p>DESCONTO:</p>
                        <span id="color-payment">
                            <p>R$ <?=$selectCarrinhoVerify[0]['desconto_carrinho']?></p>
                        </span>
                    </div>

                    <div class="total">
                        <p>TOTAL:</p>
                        <span id="color-payment">
                            <p id="total-value">R$ <?=$selectCarrinhoVerify[0]['total_carrinho']?></p>
                        </span>
                    </div>
                    <?php
                    endif;
                    ?>

                    <button id="principal-button" onclick="window.location.href='show-enderecos.php?carrinho=<?=$selectCarrinhoVerify[0]['id_carrinho']?>'">
                        Finalizar Compra
                    </button>

                    <div class="cep-calc">
                        <div class="cep-container">
                            <label for="cep">
                                <input data-js="cep" type="text" name="cep" placeholder="CEP"
                                       id="input-calcula-cep">
                            </label>
                            <button type="button" class="button-cep-calc" id="principal-button">Calcular</button>
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
<script defer src="../assets/js/carrinho.js"></script>
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