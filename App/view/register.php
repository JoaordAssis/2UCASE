<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once __DIR__ . "/../config/stylesConfig.php"  ?>
    <link rel="stylesheet" href="../assets/styles/register.css">
    <script src="../assets/js/register.js" defer></script>
</head>

<!-- Barra de Navegação -->
<?php require_once "./navbar.php" ?>

<body id="body-margin">
    <form action="#" method="POST" class="entrega-container">

        <article class="entrega">
            <!-- INformações do Cliente e contato -->

            <h1>Informações</h1>
            <!-- Flex direction Column -->

            <section class="columns-container">
                <section class="address-column1 address">
                    <label for="nomeCompleto">
                        <input type="text" name="nomeCompleto" id="nome-completo" placeholder="Nome Completo">
                    </label>

                    <label for="cpf">
                        <input type="text" name="cpf" data-js="cpf" id="input-entrega" placeholder="CPF">
                    </label>

                    <div class="state-container">
                        <!-- Input Data de Nascimento -->

                        <label for="dataNasc" class="input-dataNasc">
                            <input type="date" name="dataNasc" id="input-entrega" placeholder="Data de Nascimento">
                        </label>

                    </div>
                </section>

                <section class="address-column2 address">
                    <div class="number-container">

                        <label for="numeroCelular">
                            <input type="text" name="numeroCelular" required id="input-entrega" data-js="phone" maxlength="15" placeholder="Telefone Celular">
                        </label>

                        <label for="numeroFixo">
                            <input type="text" data-js="phone" maxlength="14" name="numeroFixo" id="input-entrega" placeholder="Telefone Fixo">
                        </label>
                    </div>

                    <div class="gender-container">
                        <select name="gender" id="gender-input">
                            <option>Gênero</option>
                            <option value="0">Masculino</option>
                            <option value="1">Feminino</option>
                            <option value="2">Prefiro não informar</option>
                        </select>
                    </div>
                </section>
            </section>
        </article>

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