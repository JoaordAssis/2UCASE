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
    <link rel="stylesheet" href="../assets/css/cupons.css">
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

            <label>Status da venda
                <h3><?= $exibPedidosDetails[0]['status_venda'] ?></h3>
            </label>
        </article>

        <!-- Exibir informações do cliente -->

        <?php
        $timestampCliente = strtotime($exibPedidosDetails[0]['data_venda']);
        $newDateCliente = date("d/m/Y", $timestampCliente);
        ?>

        <article class="info-cliente container-comment">
            <h2>Cliente</h2>

            <div class="row-nome-email rows-comentarios">
                <label>Nome do cliente
                    <h3><?= $exibPedidosDetails[0]['nome_cliente'] ?></h3>
                </label>

                <label>Email cliente
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
                <label>Logradouro
                    <h3><?= $exibPedidosDetails[0]['logradouro_cliente'] ?></h3>
                </label>

                <label>Bairro
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
            </div>

            <div class="row-phone-birth rows-comentarios">
                <?php
                if ($exibPedidosDetails[0]['complemento_cliente'] !== null) :
                ?>
                    <label>Complemento
                        <h3><?= $exibPedidosDetails[0]['complemento_cliente'] ?></h3>
                    </label>
                <?php endif; ?>

                <?php
                if ($exibPedidosDetails[0]['ponto_ref_cliente'] !== null) :
                ?>
                    <label>Ponto de Referência
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
                    <h3><?= $exibPedidosDetails[0]['desconto_carrinho'] ?></h3>
                </label>

                <label>Quantidade de Produtos
                    <h3><?= $exibPedidosDetails[0]['quant_carrinho'] ?></h3>
                </label>
            </div>


            <label>Frete carrinho
                <h3>R$ <?= $exibPedidosDetails[0]['frete_carrinho'] ?></h3>
            </label>
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
                        <label>Nome Produto
                            <h3><?= $exibProdutos[0]['nome_produto'] ?></h3>
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
<?php
if (isset($_POST['msg'])) {
    require_once './msg.php';
    $msg = $_POST["msg"];
    $msgExibir = $MSG[$msg];
    echo "<script>alert('" . $msgExibir . "');</script>";
}


?>

</html>