<?php
session_start();

if(empty($_SESSION['USER-ID'])){
    header("Location: ./homepage.php?error-code=OA00");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once '../config/StylesConfig.php'; ?>
    <link rel="stylesheet" href="../assets/styles/meus-pedidos.css">
</head>

<?php require_once "./navbar.php"; ?>

<body id="body-margin">
    <main class="main-pedidos">
        <h1>Meus Pedidos</h1>

        <section class="container-filters">
            <div class="container-search-bar">
                <input type="search" name="searchBarProdutos" placeholder="Pesquisar" id="pesquisar-input">
                <input type="submit" value="">
            </div>

            <div class="container-filters-select">
                <select name="status-pedidos" id="select-status">
                    <option>Todos</option>
                </select>

                <select name="select-categoria" id="select-categoria">
                    <option>Todos</option>
                </select>

                <select name="faixa-preco" id="select-preco">
                    <option>Todos</option>
                </select>
            </div>
        </section>

        <!-- Meus Pedidos -->

        <section class="container-pedidos">

            <div class="box-pedido">
                <button class="accordion">
                    Pedido N° 2545
                    <div class="right-info">
                        <p>21/01/2006 12:31:51</p>
                        <img width="40" height="40" src="../assets/./svg/./arrow.svg" alt="icone de dropdown">
                    </div>
                </button>
                <div class="info-pedido">

                    <section class="container-info-pedido">
                        <section class="box-value-info">
                            <div class="box-subtotal-desconto box-values">
                                <div class="box-armazena-valor">
                                    <div class="anti-after-container">
                                        <p>Subtotal:</p>
                                        <p>R$ 241,65</p>
                                    </div>
                                </div>

                                <div class="box-armazena-valor">
                                    <div class="anti-after-container">
                                        <p>Desconto:</p>
                                        <p>R$ 241,65</p>
                                    </div>
                                </div>
                            </div>
                            <div class="box-frete-total box-values">
                                <div class="box-armazena-valor">
                                    <div class="anti-after-container">
                                        <p>Frete:</p>
                                        <p>R$ 241,65</p>
                                    </div>
                                </div>

                                <div class="box-armazena-valor">
                                    <div class="anti-after-container">
                                        <p>Total:</p>
                                        <p>R$ 241,65</p>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="container-rastreio">

                            <div class="box-status-pedido">
                                <h3>Status:</h3>
                                <span id="span-status">
                                    <h4>Enviado</h4>
                                </span>
                            </div>

                            <p>Digite o codigo de rastreio enviado ao seu email:</p>

                            <div class="container-cod-rastreio">

                                <input type="text" name="codigo-rastreio" id="input-rastreio" placeholder="Codigo de Rastreio">

                                <button id="btn-rastreio">
                                    Rastrear
                                </button>
                            </div>
                        </section>

                        <article class="container-produtos">
                            <p id="title-container-produtos">Produtos Comprados
                                <img width="40" height="40" src="../assets/./svg/./arrow.svg" alt="icone de dropdown">
                            </p>

                            <section class="body-parts">
                                <section class="prod-carrinho">
                                    <div class="produto-info">
                                        <img src="../assets/./img/./Time.png" alt="Alt dinâmico">
                                        <div class="titles-column">
                                            <h4>Flamengo - Uniforme 1 2022 Personalizado</h4>
                                            <p id="p-opaco">Iphone 13 Max</p>
                                        </div>

                                        <div class="flex-mobile-container">
                                            <div class="quantidade">
                                                <p id="p-opaco">QUANT</p>
                                                <p>3</p>
                                            </div>

                                            <div class="valor">
                                                <p id="p-opaco">VALOR</p>
                                                <P>R$ 36,65</P>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <button id="btn-avaliar">
                                    Avaliar Produto
                                </button>
                            </section>
                        </article>
                    </section>
                </div>
            </div>
        </section>
    </main>
</body>
<script src="../assets/js/meus-pedidos.js"></script>

</html>