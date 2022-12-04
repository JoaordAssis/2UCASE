<?php
session_start();
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
        <form action="../controller/ControllerAddUsuarioADM.php" method="POST" class="form-add-usuario" enctype="multipart/form-data">

            <input type="hidden" value="newUsuario" name="newUsuario">

            <div class="row-nome-poder">
                <!-- <label for="nome_usuario">Nome -->
                <input type="text" name="nome_adm" id="input_nome_usuario" placeholder="Nome">
                <!-- </label> -->

                <!-- <label for="poder">Poder -->
                <select name="poder_adm" id="poder">
                    <option value="9">Poder Máximo - Acesso a todo o sistema</option>
                    <option value="8">Poder Médio - Acesso aos produtos</option>
                    <option value="0">Poder Mínimo - Apenas visualização</option>
                </select>
                <!-- </label> -->
            </div>

            <!-- <label for="email">E-mail -->
            <input type="email" name="email_adm" id="input_email_usuario" placeholder="E-mail">
            <!-- </label> -->

            <!-- <label for="senha">Senha -->
            <input type="password" name="senha_adm" id="input_senha_usuario" placeholder="Senha">
            <!-- </label> -->

            <!-- <label for="status">Status</label> -->



            <div class="row-status-submit">
                <select name="status" id="status">

                    <option value="1">Ativado - 1</option>
                    <option value="0">Desativado - 0</option>
                </select>


                <input id="adcionar" type="submit" value="Adicionar">
            </div>

        </form>


        <button id="btn-exit" onclick="window.location.href='./listUsuariosADM.php'">Voltar</button>

    </main>
</body>
<script src="../assets/js/navbarFix.js"></script>

</html>