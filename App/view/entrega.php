<?php
session_start();

if (empty($_SESSION['USER-ID'])){
    //Não está logado
    header("Location: ./carrinho.php?error-code=OA00");
    exit();
}

if (empty($_REQUEST['carrinho'])){
    //Não enviou o ID do carrinho
    header("Location: ./carrinho.php?error-code=CP01");
    exit();
}

$idCarrinho = $_REQUEST['carrinho'];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once __DIR__ . "/../config/stylesConfig.php"  ?>
    <link rel="stylesheet" href="../assets/styles/entrega.css">
    <title>Entrega - 2UCASE</title>
</head>

<!-- Barra de Navegação -->
<?php require_once "./navbar.php" ?>

<body id="body-margin">
<form action="../controllers/ControllerAddEndereco.php" method="POST" id="form-entrega-frete" class="entrega-container">

    <input type="hidden" name="id_carrinho" value="<?=$idCarrinho?>">
    <input type="hidden" name="value-carrinho" value="<?=$_GET['value']?>" id="value-frete-input">

    <div class="process">
        <!-- Icones da etapa do processo -->
        <!--            <img src="../assets/./img/Etapas.png" alt="etapa entrega" width="210" height="80">-->
    </div>


    <article class="entrega">

        <h1>Entrega</h1>
        <!-- Flex direction Column -->

        <div class="cep-calc">
            <label for="cep">
                <input data-js="cep" type="text" name="cep" placeholder="CEP"
                       id="input-calcula-cep">
            </label>
            <button type="button" class="button-cep-calc" id="principal-button">Calcular</button>
            <a target="_blank" href="https://www2.correios.com.br/sistemas/buscacep/buscaCep.cfm">Não sei meu CEP</a>
        </div>

        <div id="container-error">
            <p id="error-exib"></p>
        </div>

        <section class="columns-container">
            <section class="address-column1 address">
                <label for="logradouro">
                    <input type="text" required name="logradouro" id="logradouro" placeholder="Logradouro">
                </label>

                <label for="referencia">
                    <input type="text" name="referencia" id="input-entrega" placeholder="Ponto de Referência">
                </label>

                <div class="state-container">
                    <!-- Input estado e cidade row -->

                    <select name="state" required id="state-input">
                        <option>AC</option>
                        <option>AL</option>
                        <option>AM</option>
                        <option>AP</option>
                        <option>BA</option>
                        <option>CE</option>
                        <option>DF</option>
                        <option>ES</option>
                        <option>GO</option>
                        <option>MA</option>
                        <option>MG</option>
                        <option>MS</option>
                        <option>MT</option>
                        <option>PA</option>
                        <option>PB</option>
                        <option>PE</option>
                        <option>PI</option>
                        <option>PR</option>
                        <option>RJ</option>
                        <option>RN</option>
                        <option>RO</option>
                        <option>RR</option>
                        <option>RS</option>
                        <option>SC</option>
                        <option>SE</option>
                        <option>SP</option>
                        <option>TO</option>
                    </select>

                    <label for="cidade">
                        <input type="text" required name="cidade" id="localidade" placeholder="Cidade">
                    </label>
                </div>
            </section>

            <section class="address-column2 address">
                <div class="number-container">

                    <label for="numero">
                        <input type="text" required name="numero" id="input-entrega" placeholder="Número">
                    </label>

                    <label for="complemento">
                        <input type="text" name="complemento" id="input-entrega" placeholder="Complemento">
                    </label>
                </div>

                <label for="bairro">
                    <input type="text" required name="bairro" id="bairro" placeholder="Bairro">
                </label>

                <label for="nomeR">
                    <input type="text" required name="nomeR" id="input-entrega" placeholder="Nome do Recebedor">
                </label>

            </section>
        </section>
    </article>

    <article class="frete-container">
        <h1>Frete</h1>

        <div class="frete-option" id="sedex">
            <label class="label-values-entrega" for="frete">
                <input type="radio" name="frete" value="" id="radio-input-sedex">
                <p id="tempo-entrega-sedex"></p>
                <p id="valor-sedex"></p>
            </label>
        </div>

        <div class="frete-option" id="sedex">
            <label class="label-values-entrega" for="frete">
                <input type="radio" name="frete" value="" id="radio-input-pac">
                <p id="tempo-entrega-pac"></p>
                <p id="valor-pac"></p>
            </label>
        </div>
    </article>
    <button id="principal-button" class="form-submit btn-form-entrega" type="submit">
        Ir para o pagamento
    </button>
</form>
</body>
<script src="../assets/js/entrega.js"></script>
<script src="../assets/js/error-handling.js"></script>

<!-- Footer -->
<?php require_once './footer.php'; ?>

</html>