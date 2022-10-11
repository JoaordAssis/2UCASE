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
                            <form action="#" method="POST" id="formulario-pagamento">
                                <label for="card-number">
                                    <input type="text" name="card-number" maxlength="16" data-js="number"
                                           id="input-card"
                                           placeholder="Número do Cartão" class="input-payment">
                                </label>

                                <label for="titular">
                                    <input type="text" name="titular" id="input-card" placeholder="Nome do Titular" class="input-payment">
                                </label>

                                <div class="row-payment">

                                    <label for="venc">
                                        <input type="text" data-js="month" maxlength="7" name="venc" id="input-card"
                                               placeholder="Vencimento"
                                               class="input-payment">
                                    </label>
                                    <label for="codS">
                                        <input type="text" data-js="number" name="codS" maxlength="10" id="input-card"
                                               placeholder="Código de Segurança" class="input-payment">
                                    </label>

                                </div>

                                <label for="cpf">
                                    <input type="text" name="cpf" id="input-card" placeholder="CPF" data-js="cpf" class="input-payment">
                                </label>

                                <label for="logPayment">
                                    <input type="text" name="logPayment" id="input-card" placeholder="Endereço de Cobrança" class="input-payment">
                                </label>

                                <div class="row-payment address-payment">

                                    <label for="numberPayment">
                                        <input type="text" name="numberPayment" id="input-numberh"
                                               placeholder="Número" class="input-payment">
                                    </label>

                                    <label for="compPayment">
                                        <input type="text" name="compPayment" id="input-card" placeholder="Complemento" class="input-payment">
                                    </label>
                                </div>

                                <select name="parcelas" id="select-parcelas">
                                    <option value="0">Número de Parcelas</option>
                                </select>

                                <label for="checkCard" id="label-check">
                                    <input type="checkbox" name="checkCard" id="radio-card">
                                    Deseja Salvar esse cartão para agilizar resgates futuros, sem precisar preencher novamente as informações?
                                </label>
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
                        <p>2 Items</p>
                        <span id="color-payment">
                            <button id="link-detail">Ver detalhes</button>
                        </span>
                    </div>

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
                </section>
            </section>

        </article>
    </main>
</body>

<script src="../assets/./js/Payment.js"></script>

<!-- Footer -->
<?php //require_once './footer.php'; 
?>

</html>