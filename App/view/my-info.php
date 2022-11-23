<?php
session_start();

if(empty($_SESSION['USER-ID'])){
    header("Location: ./login.php?error-code=OA00");
    exit();
}
require_once __DIR__ . '/../../vendor/autoload.php';
use app\model\Manager;

$manager = new Manager();

$getCliente = $manager->getInfo('user_cliente', 'id_cliente', $_SESSION['USER-ID']);
$getEndereco = $manager->getInfo('user_endereco_cliente', 'id_cliente', $_SESSION['USER-ID']);


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once __DIR__ . "/../config/stylesConfig.php"  ?>
    <link rel="stylesheet" href="../assets/styles/my-info.css">
</head>
<!-- Barra de Navegação -->
<?php require_once './navbar.php'; ?>

<body id="body-margin">
    <main class="container-new-produto">
        <h1>Minhas Informações</h1>
        <section class="edit-info-user">
            <form action="../controllers/ControllerUpdateCliente.php" method="POST" class="form-add-produto" enctype="multipart/form-data">
                <?php
                if (isset($_REQUEST['sign-google'])){
                    ?>
                    <div id="container-error-google">
                        <p id="error-exib-google">Por favor, antes de prosseguir corrija as suas informações!</p>
                    </div>
                <?php
                }
                ?>

                <label for="nome_cliente">Nome Completo
                    <input type="text" required name="nome_cliente" value="<?=$getCliente[0]['nome_cliente']?>" id="input-nome" placeholder="Nome Completo">
                </label>

                <label for="email_cliente">Email
                    <input type="text" required name="email_cliente" value="<?=$getCliente[0]['email_cliente']?>" id="input-nome" placeholder="Email">
                </label>

                <!--Mudar a cor do campo CPF-->
                <label for="cpf_cliente">CPF
                    <input type="text" required data-js="cpf" name="cpf_cliente" value="<?=$getCliente[0]['cpf_cliente']?>" id="input-nome" placeholder="CPF">
                </label>


                <div class="row-preco-quant row-inputs">
                    <label for="telefone_cliente">Telefone Celular
                        <input type="text" required data-js="phone" maxlength="15" value="<?=$getCliente[0]['telefone_cliente']?>"
                               name="telefone_cliente" id="input-preco"
                               placeholder="Número do Celular">
                    </label>

                    <label for="telefoneFixo_cliente">Telefone Fixo
                        <input type="text" required data-js="phone" maxlength="14" name="telefoneFixo_cliente" value="<?=$getCliente[0]['telefoneFixo_cliente']?>"
                               id="input-quant"
                               placeholder="Telefone Fixo">
                    </label>
                </div>

                <div class="row-preco-quant row-inputs">
                    <label for="data_nasc_cliente">Data de Nascimento
                        <input type="date" required name="data_nasc_cliente" value="<?=$getCliente[0]['data_nasc_cliente']?>" id="input-peso" placeholder="Data de Nascimento">
                    </label>

                    <label for="genero_cliente">Genêro
                        <select required name="genero_cliente" id="select-garantia">
                            <?php

                            echo "<option>Genêro</option>";
                            if ($getCliente[0]['genero_cliente'] === 1){
                                echo "<option value='0'>Masculino</option>";
                                echo "<option value='1' selected>Feminino</option>";
                                echo "<option value='2'>Não Informar</option>";

                            } elseif($getCliente[0]['genero_cliente'] === 0) {
                                echo "<option value='0' selected>Masculino</option>";
                                echo "<option value='1'>Feminino</option>";
                                echo "<option value='2'>Não Informar</option>";
                            }else{
                                echo "<option value='0'>Masculino</option>";
                                echo "<option value='1'>Feminino</option>";
                                echo "<option value='2' selected>Não Informar</option>";
                            }

                            ?>
                        </select>
                    </label>
                </div>

                <input type="submit" value="Atualizar">
                <div id="container-error">
                    <p id="error-exib"></p>
                </div>
            </form>

        </section>

        <article class="container-enderecos">
            <h1>Meus Endereços</h1>

            <section class="flex-enderecos">
                <?php
                if (count($getEndereco) > 0):
                    for ($i = 0, $iMax = count($getEndereco); $i < $iMax; $i++):
                ?>
                <div class="box-endereco">
                    <p>Endereço <?=($i + 1)?></p>
                    <div class="row-log-numero row-endereco">
                        <p><?=$getEndereco[$i]['logradouro_cliente']?></p>
                        <p><?=$getEndereco[$i]['numero_cliente']?></p>
                    </div>

                    <div class="row-bairro-cep row-endereco">
                        <p><?=$getEndereco[$i]['bairro_cliente']?></p>
                        <p><?=$getEndereco[$i]['cep_cliente']?></p>
                    </div>

                    <div class="row-cidade-uf row-endereco">
                        <p><?=$getEndereco[$i]['cidade_cliente']?></p>
                        <p><?=$getEndereco[$i]['uf_cliente']?></p>
                    </div>
                </div>

                <?php
                    endfor;
                endif;
                ?>
            </section>

            <button id="btn-add-endereco" onclick="window.location.href='./add-endereco.php'">Adicionar outro Endereco</button>

            <button id="btn-exit" onclick="window.location.href='./homepage.php'">Voltar</button>
        </article>
    </main>
</body>
<script src="../assets/js/error-handling.js"></script>
<script src="../assets/js/my-info.js"></script>


</html>