<?php
session_start();

if(empty($_SESSION['USER-ID'])){
    header("Location: ./login.php?error-code=OA00");
    exit();
}

require_once __DIR__ . '/../../vendor/autoload.php';
use app\model\Manager;
$manager = new Manager();

$returnVenda = $manager->getInfo('adm_venda', 'id_cliente', $_SESSION['USER-ID']);

if (!empty($_REQUEST['order'])){
    $order = filter_input(INPUT_GET, 'order');

    if ($order === 'maior'){
        $orderVenda = $manager->selectOrderMeusPedidos('adm_venda', 'valor_venda_total', 'DESC', 'id_cliente', $_SESSION['USER-ID']);
        $returnVenda = $orderVenda;
    }

    if ($order === 'menor'){
        $orderVenda = $manager->selectOrderMeusPedidos('adm_venda', 'valor_venda_total', 'ASC', 'id_cliente', $_SESSION['USER-ID']);
        $returnVenda = $orderVenda;
    }

    if ($order === 'antigo'){
        $orderVenda = $manager->selectOrderMeusPedidos('adm_venda', 'data_venda', 'DESC', 'id_cliente', $_SESSION['USER-ID']);
        $returnVenda = $orderVenda;
    }
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
            <div class="container-filters-select">
                <button class="btn-pedidos" id="btn-maior" onclick="btnMaiorOrder(<?=$_SESSION['USER-ID']?>)">Maior Valor</button>
                <button class="btn-pedidos" id="btn-menor" onclick="btnMenorOrder(<?=$_SESSION['USER-ID']?>)">Menor Valor</button>
                <button class="btn-pedidos" id="btn-antigo" onclick="btnAntigoOrder(<?=$_SESSION['USER-ID']?>)">Mais Recentes</button>
            </div>

            <div id="container-error">
                <p id="error-exib"></p>
            </div>
        </section>


        <!-- Meus Pedidos -->

        <section class="container-pedidos">

            <?php
            //FOR ADM_VENDAS
            if (count($returnVenda) > 0):
                for ($i = 0, $iMax = count($returnVenda); $i < $iMax; $i++):
                    $getCarrinho = $manager->getInfo('user_carrinho', 'id_carrinho', $returnVenda[$i]['id_carrinho']);
                    $getStatusVenda = $manager->getInfo('venda_status', 'id_status', $returnVenda[$i]['id_status']);
                    $getCarrinhoProduto = $manager->getInfo('produto_carrinho', 'id_carrinho', $returnVenda[$i]['id_carrinho']);

                    if (isset($getCarrinhoProduto[0])):
                        $timestamp = strtotime($returnVenda[$i]['data_venda']);
                        $newDate = date("d-m-Y H:i:s", $timestamp);
                        $dateExib = str_replace('-', '/', $newDate)
            ?>
            <div class="box-pedido">
                <button class="accordion">
                    Pedido N° <?=$returnVenda[$i]['numero_venda']?>
                    <div class="right-info">
                        <p><?=$dateExib?></p>
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
                                        <p>R$ <?=$getCarrinhoProduto[0]['preco_quant_prod']?></p>
                                    </div>
                                </div>

                                <div class="box-armazena-valor">
                                    <div class="anti-after-container">
                                        <p>Desconto:</p>
                                        <p>R$ <?=$getCarrinho[0]['desconto_carrinho']?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="box-frete-total box-values">
                                <div class="box-armazena-valor">
                                    <div class="anti-after-container">
                                        <p>Frete:</p>
                                        <p>R$ <?=$returnVenda[$i]['frete_carrinho']?></p>
                                    </div>
                                </div>

                                <div class="box-armazena-valor">
                                    <div class="anti-after-container">
                                        <p>Total:</p>
                                        <p>R$ <?=$returnVenda[$i]['valor_venda_total']?></p>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="container-rastreio">

                            <div class="box-status-pedido">
                                <h3>Status:</h3>
                                <span id="span-status">
                                    <h4><?=$getStatusVenda[0]['status_venda']?></h4>
                                </span>
                            </div>

                            <p>Digite o codigo de rastreio enviado ao seu email:</p>

                            <form method="post" action="meus-pedidos.php?error-code=CP05" class="container-cod-rastreio">

                                <input type="text" name="codigo-rastreio" id="input-rastreio" placeholder="Codigo de Rastreio">

                                <button id="btn-rastreio">
                                    Rastrear
                                </button>
                            </form>
                        </section>

                        <article class="container-produtos">
                            <p id="title-container-produtos">Produtos Comprados
                                <img width="40" height="40" src="../assets/./svg/./arrow.svg" alt="icone de dropdown">
                            </p>

                            <?php
                            //FOR USER_PRODUTO
                            if(count($getCarrinhoProduto) > 0):
                                for ($j = 0, $jMax = count($getCarrinhoProduto); $j < $jMax; $j++):
                                    $getProduto = $manager->getInfo('user_produto', 'id_produto', $getCarrinhoProduto[$j]['id_produto']);
                                    for ($p = 0, $pMax = count($getProduto); $p < $pMax; $p++):
                                    ?>
                            <section class="body-parts">
                                <section class="prod-carrinho">
                                    <div class="produto-info">
                                        <img src="<?=$getProduto[$p]['imagem_principal_produto']?>" alt="<?=$getProduto[$p]['nome_produto']?>">
                                        <div class="titles-column">
                                            <h4><?=$getProduto[$p]['nome_produto']?></h4>
                                            <p id="p-opaco"><?=$getCarrinhoProduto[$j]['marca_celular']?></p>
                                        </div>

                                        <div class="flex-mobile-container">
                                            <div class="quantidade">
                                                <p id="p-opaco">QUANT</p>
                                                <p><?=$getCarrinhoProduto[$j]['quant_carrinho']?></p>
                                            </div>

                                            <div class="valor">
                                                <p id="p-opaco">VALOR</p>
                                                <P>R$ <?=$getProduto[$p]['preco_produto']?></P>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <button id="btn-avaliar"
                                        onclick="window.location.href='./avaliacao.php?pd=<?=$getProduto[$p]['id_produto']?>&cart=<?=$returnVenda[$i]['id_carrinho']?>'">
                                    Avaliar Produto
                                </button>
                            </section>
                            <?php
                            //ENDFOR USER_PRODUTO
                                    endfor;
                                endfor;
                            endif;
                            ?>
                        </article>
                    </section>
                </div>
            </div>
            <?php
            //END FOR ADM_VENDAS
                    endif;
                endfor;
            else:
                ?>
            <h1>Você não comprou nada ainda!</h1>
                <?php
                endif;
                ?>
        </section>
    </main>
</body>
<script src="../assets/js/meus-pedidos.js"></script>
<script src="../assets/js/error-handling.js"></script>

</html>