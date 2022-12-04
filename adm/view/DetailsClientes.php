<?php
session_start();
require_once "../model/Manager.class.php";
$manager = new Manager();
$idCliente = $_REQUEST['id'];

$exibClienteDetails = $manager->getInfo('user_cliente', 'id_cliente', $idCliente);

$exibClienteEndereco = $manager->getInfo('user_endereco_cliente', 'id_cliente', $exibClienteDetails[0]['id_cliente']);


if ($exibClienteDetails[0]['genero_cliente'] === 0) {
    $exibClienteDetails[0]['genero_cliente'] = 'Masculino';
} else if ($exibClienteDetails[0]['genero_cliente'] === 1) {
    $exibClienteDetails[0]['genero_cliente'] = 'Feminino';
} else {
    $exibClienteDetails[0]['genero_cliente'] = 'Não Informado';
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once "../config/config.php"; ?>
    <link rel="stylesheet" href="../assets/css/detailsComentarios.css">
</head>

<?php require_once "./navbar.php"; ?>

<body id="body-margin">
    <main class="container-produto">
        <h1>Cliente N° <?= $exibClienteDetails[0]['id_cliente'] ?></h1>

        <!-- Exibir informações do cliente -->

        <article class="info-cliente container-comment">
            <h2>Cliente</h2>

            <div class="row-nome-email rows-comentarios">
                <label class="full-width">Nome do cliente
                    <h3><?= $exibClienteDetails[0]['nome_cliente'] ?></h3>
                </label>
            </div>

            <div class="row-nome-email rows-comentarios">
                <label class="full-width">Email cliente
                    <h3><?= $exibClienteDetails[0]['email_cliente'] ?></h3>
                </label>
            </div>

            <div class="row-phone-birth rows-comentarios">
                <label>Telefone Celular
                    <h3><?= $exibClienteDetails[0]['telefone_cliente'] ?></h3>
                </label>

                <label>Telefone Fixo
                    <h3><?= $exibClienteDetails[0]['telefoneFixo_cliente'] ?></h3>
                </label>

                <label>Data de Nascimento
                    <h3><?= $exibClienteDetails[0]['data_nasc_cliente'] ?></h3>
                </label>
            </div>

            <?php
            $timestamp = strtotime($exibClienteDetails[0]['data_reg_cliente']);
            $newDate = date("d-m-Y H:i:s", $timestamp);
            $dateExib = str_replace('-', '/', $newDate);
            ?>

            <div class="row-phone-birth rows-comentarios">
                <label>Gênero
                    <h3><?= $exibClienteDetails[0]['genero_cliente'] ?></h3>
                </label>

                <label>Data de Registro
                    <h3><?= $dateExib ?></h3>
                </label>
            </div>
        </article>


        <!-- Exibir Endereço -->
        <?php
        if (count($exibClienteEndereco) > 0) :
            for ($i = 0; $i < count($exibClienteEndereco); $i++) :
        ?>
                <article class="info-comentario container-comment">
                    <h2>Endereço N° <?=($i + 1)?></h2>

                    <div class="row-nome-email rows-comentarios">
                        <label class="full-width">Logradouro
                            <h3><?= $exibClienteEndereco[$i]['logradouro_cliente'] ?></h3>
                        </label>
                    </div>

                    <div class="row-nome-email rows-comentarios">
                        <label class="full-width">Bairro
                            <h3><?= $exibClienteEndereco[$i]['bairro_cliente'] ?></h3>
                        </label>
                    </div>

                    <div class="row-phone-birth rows-comentarios">
                        <label>CEP
                            <h3><?= $exibClienteEndereco[$i]['cep_cliente'] ?></h3>
                        </label>

                        <label>Estado
                            <h3><?= $exibClienteEndereco[$i]['uf_cliente'] ?></h3>
                        </label>
                    </div>

                    <div class="row-phone-birth rows-comentarios">
                        <label>Número
                            <h3><?= $exibClienteEndereco[$i]['numero_cliente'] ?></h3>
                        </label>

                        <?php
                        if ($exibClienteEndereco[$i]['complemento_cliente'] !== null) :
                            ?>
                            <label>Complemento
                                <h3><?= $exibClienteEndereco[$i]['complemento_cliente'] ?></h3>
                            </label>
                        <?php endif; ?>
                    </div>

                    <div class="row-phone-birth rows-comentarios">
                        <?php
                        if ($exibClienteEndereco[$i]['ponto_ref_cliente'] !== null) :
                        ?>
                            <label class="full-width">Ponto de Referência
                                <h3><?= $exibClienteEndereco[$i]['ponto_ref_cliente'] ?></h3>
                            </label>
                        <?php endif; ?>
                    </div>
                </article>
        <?php
            endfor;
        endif;
        ?>

        <button id="btn-exit" onclick="window.location.href='./listClientes.php'">Voltar</button>

    </main>
</body>
<script src="../assets/js/navbarFix.js"></script>

<?php
if (isset($_POST['msg'])) {
    require_once './msg.php';
    $msg = $_POST["msg"];
    $msgExibir = $MSG[$msg];
    echo "<script>alert('" . $msgExibir . "');</script>";
}


?>

</html>