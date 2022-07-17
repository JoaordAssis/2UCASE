<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once __DIR__ . "/../config/stylesConfig.php"  ?>
    <link rel="stylesheet" href="../assets/styles/entrega.css">
</head>

<!-- Barra de Navegação -->
<?php require_once "./navbar-simple.php" ?>

<body id="body-margin">
    <form action="#" method="POST" class="entrega-container">
        <div class="process">
            <!-- Icones da etapa do processo -->
            <img src="../assets/./img/Etapas.png" alt="etapa entrega" width="210" height="80">
        </div>


        <article class="entrega">

            <h1>Entrega</h1>
            <!-- Flex direction Column -->

            <div class="cep-calc">
                <label for="cep">
                    <input type="text" name="cep" placeholder="CEP" id="input-entrega">
                </label>
                <button id="principal-button">Calcular</button>
                <a href="#">Não sei meu CEP</a>
            </div>

            <section class="columns-container">
                <section class="address-column1 address">
                    <label for="logradouro">
                        <input type="text" name="logradouro" id="input-entrega" placeholder="Logradouro">
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
                            <input type="text" name="cidade" id="input-entrega" placeholder="Cidade">
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
                        <input type="text" name="bairro" id="input-entrega" placeholder="Bairro">
                    </label>

                    <label for="nomeR">
                        <input type="text" name="nomeR" id="input-entrega" placeholder="Nome do Recebedor">
                    </label>

                </section>
            </section>


            <div class="checkbox principal-address">
                <label for="time">
                    <input type="checkbox" name="time" id="input-checkbox">
                    Tornar esse endereço o principal?
                </label>
            </div>
        </article>

        <article class="frete-container">
            <h1>Frete</h1>

            <div class="frete-option" id="sedex">
                <label for="frete">
                    <input type="radio" name="frete" id="radio-input">
                    Sedex - <span id="time-entrega">7 Dias úteis</span>
                </label>

                <p>R$ 21,54</p>
            </div>

            <div class="frete-option" id="sedex">
                <label for="frete">
                    <input type="radio" name="frete" id="radio-input">
                    Loggi - <span id="time-entrega">7 Dias úteis</span>
                </label>

                <p>R$ 21,54</p>
            </div>
        </article>
        <button id="principal-button" class="form-submit" type="submit">Ir para o pagamento</button>
    </form>
</body>
<!-- Footer -->
<?php require_once './footer.php'; ?>

</html>