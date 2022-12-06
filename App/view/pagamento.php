<?php
session_start();

if (empty($_SESSION['USER-ID'])){
    //Não está logado
    header("Location: ./carrinho.php?error-code=OA00");
    exit();
}

if (empty($_REQUEST['id_endereco']) || empty($_REQUEST['id_carrinho'])){
    //Não Recebeu o ID Endereço
    header("Location: ./carrinho.php?error-code=FR30");
    exit();
}
require_once __DIR__ . "/../../vendor/autoload.php";
use app\model\Manager;

$manager = new Manager();

$idEndereco = $_REQUEST['id_endereco'];
$idCarrinho = $_REQUEST['id_carrinho'];

$returnProdutoCarrinho = $manager->countProdutoCarrinho("produto_carrinho", 'id_produto', 'id_carrinho', $idCarrinho);
$returnCarrinho = $manager->getInfo('user_carrinho', 'id_carrinho', $idCarrinho);

$checkProdCarrinho = $manager->getInfo('produto_carrinho', 'id_carrinho', $idCarrinho);


if (isset($_REQUEST['action'])) {

    if (empty($_REQUEST['frete'])){
        //Não recebeu o frete
        header("Location: ./show-enderecos.php?error-code=FR41");
        exit();
    }

    //Chave 0 é o codigo de entrega
    //Chave 1 é o valor do frete
    $frete = $_REQUEST['frete'];
    $explodeCep = explode(" ", $frete);

    $intValue = (int)$explodeCep[1];
    $totalCarrinho = $intValue + $returnCarrinho[0]['total_carrinho'];
    $valorFrete = $explodeCep[1];
    $codFrete = $explodeCep[0];

}else{
    $codFrete = $_REQUEST['codFrete'];
    $valorFrete = $_REQUEST['frete'];
    $replaceValueFrete = str_replace(",", ".", $valorFrete);
    $totalCarrinho = $replaceValueFrete + $returnCarrinho[0]['total_carrinho'];
}


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once __DIR__ . "/../config/stylesConfig.php"  ?>
    <link rel="stylesheet" href="../assets/styles/pagamento.css">
</head>

<!-- Barra de Navegação -->
<?php require_once "./navbar-simple.php" ?>

<body id="body-margin">
    <main class="payment-all">

        <div class="process">
<!--            <img src="../assets/./img/Etapas.png" alt="etapa entrega" width="260" height="80">-->
        </div>

        <article class="payment">

            <h1>Qual a forma de Pagamento?</h1>

            <section class="payment-container">

                <section class="payment-forms">

                    <div class="pergunta card-payment">
                        <button class="accordion">
                            <img src="../assets/svg/./card.svg" width="50" height="50" alt="Cartão de Crédito">
                            Cartão de Crédito
                        </button>
                        <div class="panel">
                            <form action="../controllers/ControllerPagamento.php" method="POST" id="formulario-pagamento">
                                <!--INPUTS HIDDEN-->
                                <input type="hidden" name="id_endereco" value="<?=$idEndereco?>">
                                <input type="hidden" name="id_carrinho" value="<?=$idCarrinho?>">
                                <input type="hidden" name="frete" value="<?=$valorFrete?>">
                                <input type="hidden" name="codFrete" value="<?=$codFrete?>">


                                <label for="card-number">
                                    <input type="text" name="card-number" required maxlength="16" data-js="number"
                                           id="input-card"
                                           placeholder="Número do Cartão" class="input-payment">
                                </label>

                                <label for="titular">
                                    <input type="text" name="titular" required id="input-card" placeholder="Nome do Titular" class="input-payment">
                                </label>

                                <div class="row-payment">

                                    <label for="venc">
                                        <input type="text" data-js="month" required maxlength="7" name="venc" id="input-card"
                                               placeholder="Vencimento"
                                               class="input-payment">
                                    </label>
                                    <label for="codS">
                                        <input type="text" data-js="number" required name="codS" maxlength="10" id="input-card"
                                               placeholder="Código de Segurança" class="input-payment">
                                    </label>

                                </div>

                                <label for="cpf">
                                    <input type="text" name="cpf" required id="input-card" placeholder="CPF" data-js="cpf" class="input-payment">
                                </label>

                                <label for="logPayment">
                                    <input type="text" name="logPayment" required id="input-card" placeholder="Endereço de Cobrança" class="input-payment">
                                </label>

                                <div class="row-payment address-payment">

                                    <label for="numberPayment">
                                        <input type="text" name="numberPayment" required id="input-numberh"
                                               placeholder="Número" class="input-payment">
                                    </label>

                                    <label for="compPayment">
                                        <input type="text" name="compPayment" id="input-card" placeholder="Complemento" class="input-payment">
                                    </label>
                                </div>

                                <select name="parcelas" id="select-parcelas">
                                    <option value="0">Número de Parcelas</option>
                                    <option value="1x">1x de <?=$totalCarrinho?></option>
                                    <option value="2x">2x de <?=number_format(($totalCarrinho / 2), 2)?></option>
                                    <option value="3x">3x de <?=number_format(($totalCarrinho / 3), 2)?></option>
                                    <option value="4x">4x de <?=number_format(($totalCarrinho / 4), 2)?></option>
                                </select>

                                <label for="checkCard" id="label-check">
                                    <input type="checkbox" name="checkCard" id="radio-card">
                                    Deseja Salvar esse cartão para agilizar resgates futuros, sem precisar preencher novamente as informações?
                                </label>
                                <div id="container-error">
                                    <p id="error-exib"></p>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="pergunta boleto-payment">
                        <button class="accordion">
                            <img src="../assets/svg/./invoice.svg" width="50" height="50" alt="Boleto">
                            Boleto
                        </button>
                        <div class="panel">

                        </div>
                    </div>

                    <div class="pergunta pix-payment">
                        <button class="accordion">
                            <img src="../assets/svg/./pix.svg" width="60" height="70" alt="PIX">
                            PIX
                        </button>
                        <div class="panel">

                        </div>
                    </div>
                </section>

                <section class="detail-order">

                    <div class="detalhe-produto">
                        <?php
                        if ($returnProdutoCarrinho[0]['COUNT(id_produto)'] > 1):
                        ?>
                        <p><?=$returnProdutoCarrinho[0]['COUNT(id_produto)']?> Items</p>
                        <?php
                        else:
                        ?>
                        <p><?=$returnProdutoCarrinho[0]['COUNT(id_produto)']?> Item</p>
                        <?php
                        endif;
                        ?>
                        <span id="color-payment">
                            <button id="link-detail" onclick="payment.modalVerMais()">
                                Ver detalhes
                            </button>
                        </span>
                    </div>

                    <div class="subtotal">
                        <p>SUBTOTAL:</p>
                        <span id="color-payment">
                            <p>R$ <?=$returnCarrinho[0]['total_carrinho']?></p>
                        </span>
                    </div>

                    <div class="frete-payment">
                        <p>FRETE:</p>
                        <span id="color-payment">
                            <p>R$ <?=$valorFrete?></p>
                        </span>
                    </div>

                    <div class="desconto">
                        <p>DESCONTO:</p>
                        <span id="color-payment">
                            <p>R$ <?=$returnCarrinho[0]['desconto_carrinho']?></p>
                        </span>
                    </div>

                    <div class="total">
                        <p>TOTAL:</p>
                        <span id="color-payment">
                            <p>R$ <?=$totalCarrinho?></p>
                        </span>
                    </div>

                    <button id="principal-button" type="submit" form="formulario-pagamento">Finalizar Compra</button>

                    <div class="modal-container" id="modal-container">

                        <button id="close-modal" onclick="payment.closeModal()">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                        <?php

                        if(count($checkProdCarrinho) > 0):
                            for ($i = 0; $i < count($checkProdCarrinho);$i++):
                                $getInfoProduto = $manager->getInfo('user_produto', 'id_produto', $checkProdCarrinho[$i]['id_produto']);

                                ?>
                                <div class="produto-info">
                                    <div class="row-mobile-img">
                                        <img src="<?=$getInfoProduto[0]['imagem_principal_produto']?>" alt="<?=$getInfoProduto[0]['nome_produto']?>">
                                        <div class="titles-column">
                                            <h3><?=$getInfoProduto[0]['nome_produto']?></h3>
                                        </div>
                                    </div>


                                    <div class="valor">
                                        <p id="p-opaco">QUANT</p>
                                        <p id="modal-quant"><?=$checkProdCarrinho[$i]['quant_carrinho']?></p>
                                    </div>

                                    <div class="valor">
                                        <p id="p-opaco">VALOR</p>
                                        <P id="modal-value">R$ <?=$getInfoProduto[0]['preco_produto']?></P>
                                    </div>
                                </div>
                            <?php
                            endfor;
                        endif;
                        ?>
                    </div>

                </section>
            </section>

            <div class="modal-container" id="modal-container-mobile">
                <button id="close-modal" onclick="payment.closeModal()">
                    <i class="fa-solid fa-xmark"></i>
                </button>
                <?php
                if(count($checkProdCarrinho) > 0):
                    for ($i = 0, $iMax = count($checkProdCarrinho); $i < $iMax; $i++):
                        $getInfoProduto = $manager->getInfo('user_produto', 'id_produto', $checkProdCarrinho[$i]['id_produto']);
                        ?>

                        <div class="produto-info">
                            <div class="row-mobile-img">
                                <img src="<?=$getInfoProduto[0]['imagem_principal_produto']?>" alt="<?=$getInfoProduto[0]['nome_produto']?>">
                                <div class="titles-column">
                                    <h3><?=$getInfoProduto[0]['nome_produto']?></h3>
                                </div>
                            </div>


                            <div class="valor">
                                <p id="p-opaco">QUANT</p>
                                <p id="modal-quant"><?=$checkProdCarrinho[$i]['quant_carrinho']?></p>
                            </div>

                            <div class="valor">
                                <p id="p-opaco">VALOR</p>
                                <P id="modal-value">R$ <?=$getInfoProduto[0]['preco_produto']?></P>
                            </div>
                        </div>
                    <?php
                    endfor;
                endif;
                ?>
            </div>

        </article>
    </main>
</body>

<script src="../assets/js/Payment.js"></script>
<script src="../assets/js/error-handling.js"></script>

<!-- Footer -->
<?php //require_once './footer.php';
?>

</html>