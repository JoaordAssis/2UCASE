<?php
session_start();
?>
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
    <form action="../controllers/ControllerAddUsuarioUser.php" method="POST" class="entrega-container">
        <!--Requests sem corpo-->
        <input type="hidden" name="cadastroCompletoForm">

        <input type="hidden" name="emailUserVerify" value="<?=$_REQUEST['email']?>">
        <input type="hidden" name="senhaUserVerify" value="<?=$_REQUEST['senhaCripto']?>">



        <article class="entrega">
            <!-- INformações do Cliente e contato -->

            <h1>Informações</h1>
            <!-- Flex direction Column -->

            <section class="columns-container">
                <section class="address-column1 address">
                    <label for="nomeCompleto">Nome Completo
                        <input type="text" required name="nomeCompleto" id="nome-completo" value="<?=$_REQUEST['nome']?>"
                               placeholder="Nome Completo">
                    </label>

                    <label for="cpf">CPF
                        <input required type="text" name="cpf" data-js="cpf" id="input-entrega" placeholder="CPF">
                    </label>

                    <div class="state-container">
                        <!-- Input Data de Nascimento -->

                        <label for="dataNasc" class="input-dataNasc">Data de Nascimento
                            <input required type="date" name="dataNasc" id="input-entrega" placeholder="Data de Nascimento">
                        </label>

                    </div>
                </section>

                <section class="address-column2 address">
                    <div class="number-container">

                        <label for="numeroCelular">Telefone Celular
                            <input required type="text" name="numeroCelular" required id="input-entrega"
                                   data-js="phone" maxlength="15" placeholder="Telefone Celular">
                        </label>

                        <label for="numeroFixo">Telefone Fixo
                            <input type="text" data-js="phone" maxlength="14" name="numeroFixo" id="input-entrega" placeholder="Telefone Fixo">
                        </label>
                    </div>

                    <div class="gender-container">
                        <label for="gender-input">Genêro
                            <select required name="gender" id="gender-input">
                                <option>Gênero</option>
                                <option value="0">Masculino</option>
                                <option value="1">Feminino</option>
                                <option value="2">Prefiro não informar</option>
                            </select>
                        </label>

                    </div>
                </section>
            </section>
        </article>

        <article class="entrega">
            <div id="container-error">
                <p id="error-exib"></p>
            </div>

            <h1>Entrega</h1>
            <!-- Flex direction Column -->

            <div class="cep-calc">
                <label for="cep">
                    <input required type="text" data-js="cep" name="cep" min="0" maxlength="90" placeholder="CEP" id="cep">
                </label>
                <button type="button" id="principal-button">Calcular</button>
                <a href="#">Não sei meu CEP</a>
            </div>

            <section class="columns-container">
                <section class="address-column1 address">
                    <label for="logradouro">Logradouro
                        <input required type="text" name="logradouro" id="logradouro" placeholder="Logradouro">
                    </label>

                    <label for="referencia">Ponto de Referência
                        <input type="text" name="referencia" id="input-entrega" placeholder="Ponto de Referência">
                    </label>

                    <div class="state-container">
                        <!-- Input estado e cidade row -->

                        <label for="state-input">Estado
                            <select required name="state" id="state-input">
                                <option value="0">Estado</option>
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
                        </label>


                        <label for="cidade">Cidade
                            <input required type="text" name="cidade" id="localidade" placeholder="Cidade">
                        </label>
                    </div>
                </section>

                <section class="address-column2 address">
                    <div class="number-container">

                        <label for="numero">Nùmero
                            <input required type="text" name="numero" id="input-entrega" placeholder="Número">
                        </label>

                        <label for="complemento">Complemento
                            <input type="text" name="complemento" id="input-entrega" placeholder="Complemento">
                        </label>
                    </div>

                    <label for="bairro">Bairro
                        <input required type="text" name="bairro" id="bairro" placeholder="Bairro">
                    </label>

                    <label for="nomeR">Nome do Recebedor
                        <input required type="text" name="nomeR" id="input-entrega" placeholder="Nome do Recebedor">
                    </label>
                </section>
            </section>
        </article>

        <button id="principal-button" class="form-submit" type="submit">
            Cadastrar
        </button>
    </form>
</body>
<script src="../assets/js/register.js"></script>
<script src="../assets/js/error-handling.js"></script>
<!-- Footer -->
<?php require_once './footer.php'; ?>

</html>