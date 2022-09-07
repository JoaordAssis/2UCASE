<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once __DIR__ . "/../config/stylesConfig.php"  ?>
    <link rel="stylesheet" href="../assets/styles/register.css">
</head>

<!-- Barra de Navegação -->
<?php require_once "./navbar-simple.php" ?>

<body id="body-margin">
    <form action="#" method="POST" class="entrega-container">

        <article class="entrega">

            <h1>Entrega</h1>
            <!-- Flex direction Column -->

            <div class="cep-calc">
                <label for="cep">
                    <input type="text" name="cep" min="0" maxlength="90" placeholder="CEP" id="cep">
                </label>
                <button id="principal-button">Calcular</button>
                <a href="#">Não sei meu CEP</a>
            </div>

            <section class="columns-container">
                <section class="address-column1 address">
                    <label for="logradouro">
                        <input type="text" name="logradouro" id="logradouro" placeholder="Logradouro">
                    </label>

                    <label for="referencia">
                        <input type="text" name="referencia" id="input-entrega" placeholder="Ponto de Referência">
                    </label>

                    <div class="state-container">
                        <!-- Input estado e cidade row -->

                        <select name="state" id="state-input">
                            <option value="0">Estado</option>
                        </select>

                        <label for="cidade">
                            <input type="text" name="cidade" id="localidade" placeholder="Cidade">
                        </label>
                    </div>
                </section>

                <section class="address-column2 address">
                    <div class="number-container">

                        <label for="numero">
                            <input type="text" name="numero" id="input-entrega" placeholder="Número">
                        </label>

                        <label for="complemento">
                            <input type="text" name="complemento" id="input-entrega" placeholder="Complemento">
                        </label>
                    </div>

                    <label for="bairro">
                        <input type="text" name="bairro" id="bairro" placeholder="Bairro">
                    </label>

                    <label for="nomeR">
                        <input type="text" name="nomeR" id="input-entrega" placeholder="Nome do Recebedor">
                    </label>
                </section>
            </section>
        </article>

        <button id="principal-button" class="form-submit" type="submit">
            Cadastrar
        </button>
    </form>
</body>
<script src="../assets/js/entrega.js"></script>
<!-- Footer -->
<?php require_once './footer.php'; ?>

</html>