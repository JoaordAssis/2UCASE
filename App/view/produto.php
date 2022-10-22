<?php
session_start();
require_once __DIR__ ."/../../vendor/autoload.php";
use app\model\Manager;

$manager = new Manager();

if (empty($_GET['pd'])){
    //TODO: Tratar erro
    header("Location: ./homepage.php?Nao-tem-id");
    exit();
}

$idProduto = $_GET['pd'];
$returnProduto = $manager->getInfo('user_produto', 'id_produto', $idProduto);

$returnImagemProduto = $manager->getInfo('user_produtos_img', 'id_produto', $idProduto);

//Produtos Similares
$returnSimilares = $manager->exibProducts('id_categoria', $returnProduto[0]['id_categoria'], 'preco_produto',6);

//Comentarios
$paramComentario = ['id_produto'];
$paramPostComentario = [$idProduto];
$returnComentarios = $manager->selectWhere($paramComentario, $paramPostComentario, 'user_avaliacao',);

?>
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
                <img id="image-principal" src="<?=$returnProduto[0]['imagem_principal_produto']?>" alt="Capinha
                flamengo">
                <!-- Carrossel -->
                <div class="glide carousel-imgprod">

                    <div class="glide__arrows left" data-glide-el="controls">
                        <button class="glide__arrow glide__arrow--left" data-glide-dir="<">
                            <i class="fa-solid fa-angle-left"></i>
                        </button>
                    </div>

                    <div class="glide__track" data-glide-el="track">
                        <ul class="glide__slides img-carousel-btn">

                            <!--Imagem Principal-->
                            <button id="btn-new-image">
                                <img src="../assets/img/Time.png" onclick="imgChange(this)" alt="Capinha flamengo">
                            </button>

                            <!--Inicio For-->
                            <?php
                            if (count($returnImagemProduto) > 0):
                                for ($i = 0, $iMax = count($returnImagemProduto); $i < $iMax; $i++):
                            ?>
                            <button id="btn-new-image">
                                <img src="<?=$returnImagemProduto[0]['link_img']?>" onclick="imgChange(this)"
                                     alt="<?=$returnImagemProduto[0]['nome_img']?>" >
                            </button>

                            <?php
                                endfor;
                            endif;
                            ?>
                            <!--Fim For-->


                        </ul>
                    </div>

                    <div class="glide__arrows right" data-glide-el="controls">
                        <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
                            <i class="fa-solid fa-angle-right"></i>
                        </button>
                    </div>

                </div>
            </section>

            <form method="POST" action="../controllers/ControllerAddprodutoCarrinho.php" class="box-produto-info" id="form-prod-carrinho">

                <input type="hidden" name="idProduto" value="<?=$idProduto?>">

                <!-- Oferta Especial -->
                <?php
                if ($returnProduto[0]['categoria_special_produto'] === 'Promoções'):
                ?>
                <span id="special-condition">
                    <i class="fa-solid fa-fire-flame-curved"></i>
                    <p>Oferta Especial</p>
                </span>
                <?php
                endif;
                ?>

                <!-- Nome do Produto -->
                <h2><?=$returnProduto[0]['nome_produto']?></h2>

                <!-- Valor e Avaliação -->
                <div class="box-value-stars">
                    <div class="box-value">
                        <?php
                        if ($returnProduto[0]['categoria_special_produto'] === 'Promoções'):
                            //Exibir o preço antigo
                            //TODO: Criar uma nova coluna para isso
                        ?>
                        <p id="last-price">R$ 20,00</p>
                        <?php
                        endif;
                        ?>
                        <h3>R$ <?=$returnProduto[0]['preco_produto']?></h3>
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

                <div class="select-quant-prod">
                    <label for="marcaProduto">Selecione a Quantidade
                        <select name="quantProduto" id="select-quant">
                            <?php
                            for ($i = 0; $i < $returnProduto[0]['quantidade_produto']; $i++):
                            ?>

                            <option><?=($i + 1)?></option>

                            <?php
                            endfor;
                            ?>
                        </select>
                    </label>
                </div>


                <!-- Seleção do Modelo -->
                <div class="select-option-prod">
                    <label for="marcaProduto">Selecione a Marca
                        <select name="marcaProduto" oninput="selectCelularCheck()" id="select-marca">
                            <option>Apple</option>
<!--                            <option>Samsung</option>-->
                        </select>
                    </label>
                        <!--Modelo Iphone-->
                    <label id="select-modelo-iphone-label" for="modeloProduto">Selecione o Modelo
                        <select name="modeloProduto" id="select-modelo-iphone">
                            <?php
                            //Exibir os valores conforme contido no BD
                            $returnModelProduto = $manager->getInfo('user_mod_celular',
                                'id_modelo_celular', $returnProduto[0]['id_modelo_celular']);
                            ?>
                            <option><?=$returnModelProduto[0]['modelo_celular']?></option>
                        </select>
                    </label>

                        <!--Modelo samsung-->
                    <label style="display: none" id="select-modelo-samsung-label" for="modeloProduto">Selecione o Modelo
                        <select name="modeloProduto" id="select-modelo-samsung">
                            <option value="0" selected>Indisponível</option>
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
                            <input data-js="cep" type="text" name="cep" placeholder="CEP"
                                   id="input-calcula-cep">
                        </label>
                        <button type="button" class="button-cep-calc" id="principal-button">Calcular</button>
                    </div>
                    <a target="_blank" href="https://www2.correios.com.br/sistemas/buscacep/buscaCep.cfm">Não sei meu CEP</a>

                    <!--Exibir informações de prazo e valor-->
                    <div id="cep-info-sedex">
                        <p id="value-sedex"></p>
                        <p id="prazo-sedex"></p>
                    </div>

                    <div id="cep-info-pac">
                        <p id="value-pac"></p>
                        <p id="prazo-pac"></p>
                        <br>
                        <p id="text-obs"></p>
                    </div>

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
                        <?php
                        if (count($returnSimilares) > 0):
                            for ($i = 0, $iMax = count($returnSimilares); $i < $iMax; $i++) :
                        ?>

                            <a class="produto-box glide__slide" href="./produto.php?idProduto=<?=$returnSimilares[0]['id_produto']?>">
                                <img src="<?=$returnSimilares[0]['imagem_principal_produto']?>" alt="<?=$returnSimilares[0]['nome_produto']?>">
                                <h4><?=$returnSimilares[0]['nome_produto']?></h4>
                                <p>R$ <?=$returnSimilares[0]['preco_produto']?></p>
                            </a>

                        <?php
                            endfor;
                        endif;
                        ?>
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
                    <p><?=$returnProduto[0]['descricao_produto']?></p>
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
                    <!--Tirar a média de todas as notas e exibir aqui-->
                    <?php
                    if (count($returnComentarios) > 0){
                    ?>
                    <h2>5,0</h2>
                    <div class="container-stars">
                        <i class="fa-solid fa-star fa-2x"></i>
                        <i class="fa-solid fa-star fa-2x"></i>
                        <i class="fa-solid fa-star fa-2x"></i>
                        <i class="fa-solid fa-star fa-2x"></i>
                        <i class="fa-solid fa-star fa-2x"></i>
                    </div>
                    <p>200 avaliações</p>
                    <?php
                    }else{
                    ?>
                    <h2>Seja o primeiro a avaliar esse produto!</h2>
                    <?php
                    }
                    ?>
                </div>
            </section>

            <section class="container-users-rating">
                <?php
                if (count($returnComentarios) > 0):
                    for ($i = 0, $iMax = count($returnComentarios); $i < $iMax; $i++):
                        //Exibir Cliente
                        $returnCliente = $manager->getInfo('user_cliente', 'id_cliente', $returnComentarios[$i]['id_cliente']);
                ?>

                <section class="user-rating usr1">
                    <div class="user-total-rating">
                        <h3><?=$returnComentarios[$i]['nota_avaliacao']?>,0</h3>
                        <div class="container-stars">
                            <?php
                            for ($j = 0; $j < $returnComentarios[$i]['nota_avaliacao']; $j++):
                            ?>
                            <i class="fa-solid fa-star"></i>
                            <?php
                            endfor;
                            ?>
                        </div>
                    </div>

                    <div class="user-rat-info">
                        <h3><?=$returnCliente[0]['nome_cliente']?></h3>
                        <h4><strong><?=$returnComentarios[$i]['titulo_avaliacao']?></strong></h4>
                        <p><?=$returnComentarios[$i]['descricao']?></p>
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

                    <?php
                    //Nova Data e Hora
                    $timestamp = strtotime($returnComentarios[$i]["data_avaliacao"]);
                    $newDate = date("d-m-Y H:i:s", $timestamp);
                    $dateExib = str_replace('-', '/', $newDate);
                    ?>

                    <div class="data-comment">
                        <p><?=$dateExib?></p>
                    </div>
                </section>

                <?php
                    endfor;
                endif;
                ?>
            </section>
        </article>
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
<script src="../assets/js/category.js"></script>
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