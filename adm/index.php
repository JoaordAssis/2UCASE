<!DOCTYPE html>
<html lang="en">
<?php
require_once "./model/Manager.class.php";
?>
<head>
    <link rel="stylesheet" href="assets/css/index.css">
    <title>Login Administrativo</title>
</head>

<body>
    <main class="container-login">
        <h1>Login Administrativo</h1>
        <form action="controller/validaLogin.php" method="post">
            <label for="email-login">Email
                <input type="text" required name="email-login" id="input-email">
            </label>

            <label for="senha-login">Senha
                <input type="password" required name="senha-login" id="input-senha">
            </label>

            <input type="submit" value="Logar">
        </form>
    </main>
</body>
<?php

    if (isset($_POST['msg'])) {
        require_once 'view/msg.php';
        $msg = $_POST["msg"];
        $msgExibir = $MSG[$msg];
        echo "<script>alert('" . $msgExibir . "');</script>";
    }


    ?>
</html>