<?php
session_start();
require_once "../model/Manager.class.php";
$manager = new Manager();
$idVenda = $_REQUEST['id'];

$exibPedidosDetails = $manager->innerJoinRunnerPedidos($idVenda);

$exibProdutoCarrinho = $manager->getInfo('produto_carrinho', 'id_carrinho', $exibPedidosDetails[0]['id_carrinho'])

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once "../config/config.php"; ?>
    <link rel="stylesheet" href="../assets/css/detailsComentarios.css">
</head>

<?php require_once "./navbar.php"; ?>

<body id="body-margin">
    <main class="container-produto">
        <h1>Pedido N° <?= $exibPedidosDetails[0]['id_venda'] ?></h1>

        <?php
        $timestampVenda = strtotime($exibPedidosDetails[0]['data_venda']);
        $newDateVenda = date("d/m/Y H:i:s", $timestampVenda);
        ?>

        <!-- Exibir Venda -->
        <article class="info-comentario container-comment">
            <h2>Venda</h2>

            <div class="row-titulo-stars rows-comentarios">
                <label>Data da venda
                    <h3><?= $newDateVenda ?></h3>
                </label>

                <label>Valor total da venda
                    <h3>R$ <?= $exibPedidosDetails[0]['valor_venda_total'] ?></h3>
                </label>
            </div>


            <div class="row-titulo-stars rows-comentarios">
                <label>Status da venda
                    <h3><?= $exibPedidosDetails[0]['status_venda'] ?></h3>
                </label>

                <label>Quantidade de Produtos
                    <h3><?= $exibPedidosDetails[0]['quant_produto_total'] ?></h3>
                </label>
            </div>

            <div class="row-titulo-stars rows-comentarios">
                <label>Número da venda
                    <h3><?= $exibPedidosDetails[0]['numero_venda'] ?></h3>
                </label>

                <label>Valor Frete
                    <h3>R$ <?= $exibPedidosDetails[0]['frete_carrinho'] ?></h3>
                </label>
            </div>
        </article>

        <!-- Exibir informações do cliente -->

        <?php
        $timestampCliente = strtotime($exibPedidosDetails[0]['data_venda']);
        $newDateCliente = date("d/m/Y", $timestampCliente);
        ?>

        <article class="info-cliente container-comment">
            <h2>Cliente</h2>

            <div class="row-nome-email rows-comentarios">
                <label class="full-width">Nome do cliente
                    <h3><?= $exibPedidosDetails[0]['nome_cliente'] ?></h3>
                </label>
            </div>

            <div class="row-nome-email rows-comentarios">
                <label class="full-width">Email cliente
                    <h3><?= $exibPedidosDetails[0]['email_cliente'] ?></h3>
                </label>
            </div>

            <div class="row-phone-birth rows-comentarios">
                <label>Telefone cliente
                    <h3><?= $exibPedidosDetails[0]['telefone_cliente'] ?></h3>
                </label>

                <label>Data de Nascimento
                    <h3><?= $newDateCliente ?></h3>
                </label>
            </div>


        </article>


        <!-- Exibir comentário -->
        <article class="info-comentario container-comment">
            <h2>Endereço</h2>

            <div class="row-nome-email rows-comentarios">
                <label class="full-width">Logradouro
                    <h3><?= $exibPedidosDetails[0]['logradouro_cliente'] ?></h3>
                </label>
            </div>

            <div class="row-nome-email rows-comentarios">
                <label class="full-width">Bairro
                    <h3><?= $exibPedidosDetails[0]['bairro_cliente'] ?></h3>
                </label>
            </div>

            <div class="row-phone-birth rows-comentarios">
                <label>CEP
                    <h3><?= $exibPedidosDetails[0]['cep_cliente'] ?></h3>
                </label>

                <label>Estado
                    <h3><?= $exibPedidosDetails[0]['uf_cliente'] ?></h3>
                </label>
            </div>

            <div class="row-phone-birth rows-comentarios">
                <label>Número
                    <h3><?= $exibPedidosDetails[0]['numero_cliente'] ?></h3>
                </label>

                <?php
                if ($exibPedidosDetails[0]['complemento_cliente'] !== null) :
                    ?>
                    <label>Complemento
                        <h3><?= $exibPedidosDetails[0]['complemento_cliente'] ?></h3>
                    </label>
                <?php endif; ?>
            </div>

            <div class="row-phone-birth rows-comentarios">
                <?php
                if ($exibPedidosDetails[0]['ponto_ref_cliente'] !== null) :
                ?>
                    <label class="full-width">Ponto de Referência
                        <h3><?= $exibPedidosDetails[0]['ponto_ref_cliente'] ?></h3>
                    </label>
                <?php endif; ?>
            </div>

        </article>

        <?php
        $timestampCarrinho = strtotime($exibPedidosDetails[0]['data_venda']);
        $newDateCarrinho = date("d/m/Y H:i:s", $timestampCarrinho);
        ?>


        <!-- Exibir Carrinho -->
        <article class="info-comentario container-comment">
            <h2>Carrinho</h2>

            <div class="row-titulo-stars rows-comentarios">
                <label>Data do carrinho
                    <h3><?= $newDateCarrinho ?></h3>
                </label>

                <label>Preço total do carrinho
                    <h3>R$ <?= $exibPedidosDetails[0]['total_carrinho'] ?></h3>
                </label>
            </div>

            <div class="row-titulo-stars rows-comentarios">
                <label>Desconto total do carrinho
                    <h3>R$ <?= $exibPedidosDetails[0]['desconto_carrinho'] ?></h3>
                </label>

                <label>Quantidade de Produtos
                    <h3><?= $exibPedidosDetails[0]['quant_carrinho'] ?></h3>
                </label>
            </div>

        </article>


        <?php
        if (count($exibProdutoCarrinho) > 0) :
            for ($i = 0; $i < count($exibProdutoCarrinho); $i++) :

                $exibProdutos = $manager->getInfo('user_produto', 'id_produto', $exibProdutoCarrinho[$i]['id_produto']);

                $exibProdutoCategoria = $manager->getInfo('user_categoria', 'id_categoria', $exibProdutos[$i]['id_categoria']);

        ?>
                <!-- Exibir Produtos -->
                <article class="info-comentario container-comment">
                    <h2>Produto Comprado</h2>

                    <div class="row-titulo-stars rows-comentarios">
                        <label class="full-width">Nome Produto
                            <h3><?= $exibProdutos[0]['nome_produto'] ?></h3>
                        </label>
                    </div>

                    <div class="row-titulo-stars rows-comentarios">
                        <label>Codigo Produto
                            <h3><?= $exibProdutos[0]['cod_produto'] ?></h3>
                        </label>

                        <label>Quantidade produto
                            <h3><?= $exibProdutoCarrinho[0]['quant_carrinho'] ?></h3>
                        </label>
                    </div>

                    <div class="row-titulo-stars rows-comentarios">
                        <label>Preço unitário do produto
                            <h3>R$ <?= $exibProdutos[0]['preco_produto'] ?></h3>
                        </label>

                        <label>Preço total do produto
                            <h3>R$ <?= $exibProdutoCarrinho[0]['preco_quant_prod'] ?></h3>
                        </label>
                    </div>

                    <div class="row-titulo-stars rows-comentarios">

                        <label>Desconto total do produto
                            <h3>R$ <?= $exibProdutoCarrinho[0]['preco_desconto_prod'] ?></h3>
                        </label>

                        <label>Categoria do produto
                            <h3><?= $exibProdutoCategoria[0]['nome_categoria'] ?></h3>
                        </label>
                    </div>
                </article>
        <?php
            endfor;
        endif;
        ?>

        <button id="btn-exit" onclick="window.location.href='./listPedidos.php'">Voltar</button>

    </main>
</body>
<script src="../assets/js/navbarFix.js"></script>

<script src="../assets/js/navbarFix.js"></script>
<?php
if (isset($_POST['msg'])) {
    require_once './msg.php';
    $msg = $_POST["msg"];
    $msgExibir = $MSG[$msg];
    echo "<script>alert('" . $msgExibir . "');</script>";
}


?>

</html>