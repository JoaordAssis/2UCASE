<?php
session_start();

if (empty($_SESSION['USER-ID'])){
    //Não está logado
    header("Location: ./carrinho.php?error-code=OA00");
    exit();
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once __DIR__ . "/../config/stylesConfig.php"  ?>
    <link rel="stylesheet" href="../assets/styles/entrega.css">
</head>

<!-- Barra de Navegação -->
<?php require_once "./navbar-simple.php" ?>

<body id="body-margin">
    <main class="container-new-produto">
        <form action="../controllers/ControllerInfoEndereco.php" method="POST" class="entrega-container">


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
                    <a target="_blank" href="https://www2.correios.com.br/sistemas/buscacep/buscaCep.cfm">Não sei o meu CEP</a>
                </div>

                <div id="container-error">
                    <p id="error-exib"></p>
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
                                <option>RO</option>
                                <option>AC</option>
                                <option>AM</option>
                                <option>RR</option>
                                <option>PA</option>
                                <option>AP</option>
                                <option>TO</option>
                                <option>MA</option>
                                <option>PI</option>
                                <option>CE</option>
                                <option>RN</option>
                                <option>PB</option>
                                <option>PE</option>
                                <option>AL</option>
                                <option>SE</option>
                                <option>BA</option>
                                <option>MG</option>
                                <option>ES</option>
                                <option>RJ</option>
                                <option>SP</option>
                                <option>PR</option>
                                <option>SC</option>
                                <option>RS</option>
                                <option>MS</option>
                                <option>MT</option>
                                <option>GO</option>
                                <option>DF</option>
                            </select>

                            <label for="cidade">
                                <input type="text" name="cidade" id="localidade" placeholder="Cidade">
                            </label>
                        </div>
                    </section>

                    <section class="address-column2 address">
                        <div class="number-container">

                            <label for="numero">
                                <input type="text" data-js="number" name="numero" id="input-entrega" placeholder="Número">
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
                Adicionar endereço
            </button>
        </form>

        <button id="btn-exit" onclick="window.location.href='./my-info.php'">Voltar</button>
    </main>
</body>
<script src="../assets/js/entrega.js"></script>
<script src="../assets/js/error-handling.js"></script>

<!-- Footer -->
<?php require_once './footer.php'; ?>

</html>