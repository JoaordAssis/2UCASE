<?php
session_start();
$idUserADM = $_REQUEST['id'];
require_once "../model/Manager.class.php";
$manager = new Manager();

$resultListUsuario = $manager->getInfo('adm_administrador', 'id_adm', $idUserADM);

// echo "<pre>";
// print_r($resultListUsuario);
// echo "<pre>";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once '../config/config.php'; ?>
    <link rel="stylesheet" href="../assets/css/AddUsuario.css">
</head>

<?php require_once "./navbar.php"; ?>

<body id="body-margin">
    <main class="container-new-produto">
        <h1>Adicionar Usuário</h1>

        <form action="../controller/ControllerUsuariosADM.php" method="POST" class="form-add-usuario" enctype="multipart/form-data">

            <input type="hidden" value="editUsuario" name="editUsuario">
            <input type="hidden" value="<?= $idUserADM ?>" name="idUser">

            <div class="row-nome-poder">
                <!-- <label for="nome_usuario">Nome -->
                <input type="text" required name="nome_adm" value="<?= $resultListUsuario[0]['nome_adm'] ?>" id="input_nome_usuario" placeholder="Nome">
                <!-- </label> -->

                <!-- <label for="poder">Poder -->
                <select name="poder_adm" id="poder">
                    <?php
                    if ($resultListUsuario[0]['poder_adm'] === 9) {
                    ?>
                        <option value="9" selected>Poder Máximo - Acesso a todo o sistema</option>
                        <option value="8">Poder Médio - Acesso aos produtos</option>
                        <option value="0">Poder Mínimo - Apenas visualização</option>
                    <?php
                    }
                    ?>

                    <?php
                    if ($resultListUsuario[0]['poder_adm'] === 8) {
                    ?>
                        <option value="9">Poder Máximo - Acesso a todo o sistema</option>
                        <option value="8" selected>Poder Médio - Acesso aos produtos</option>
                        <option value="0">Poder Mínimo - Apenas visualização</option>
                    <?php
                    }
                    ?>

                    <?php
                    if ($resultListUsuario[0]['poder_adm'] === 0) {
                    ?>
                        <option value="9">Poder Máximo - Acesso a todo o sistema</option>
                        <option value="8">Poder Médio - Acesso aos produtos</option>
                        <option value="0" selected>Poder Mínimo - Apenas visualização</option>
                    <?php
                    }
                    ?>

                </select>
                <!-- </label> -->
            </div>

            <!-- <label for="email">E-mail -->
            <input type="email" required name="email_adm" value="<?= $resultListUsuario[0]['email_adm'] ?>" id="input_email_usuario" placeholder="E-mail">
            <input type="text" required name="senha_adm" id="input_senha_new" placeholder="Nova senha">
            <!-- <input type="text" name="senha_adm" id="input_confirm_senha" placeholder="Confirme a senha"> -->

            <!-- </label> -->

            <!-- <label for="senha">Senha -->
            <!-- <input type="password" name="senha_adm" id="input_senha_usuario" placeholder="Senha"> -->
            <!-- </label> -->

            <!-- <label for="status">Status</label> -->



            <div class="row-status-submit">
                <select name="status" id="status">

                    <?php
                    if ($resultListUsuario[0]['status'] === 1) {
                    ?>
                        <option value="1" selected>Ativado - 1</option>
                        <option value="0">Desativado - 0</option>
                    <?php
                    }
                    ?>


                    <?php
                    if ($resultListUsuario[0]['status'] === 0) {
                    ?>
                        <option value="1">Ativado - 1</option>
                        <option value="0" selected>Desativado - 0</option>
                    <?php
                    }
                    ?>
                </select>


                <input id="adcionar" type="submit" value="Editar">
            </div>

        </form>


        <button id="btn-exit" onclick="window.location.href='./listUsuariosADM.php'">Voltar</button>

    </main>
</body>
<!-- <script src="../assets/js/CRUDEditUsuarioADM.js"></script> -->
<script src="../assets/js/navbarFix.js"></script>

</html>