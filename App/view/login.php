<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once '../config/StylesConfig.php'; ?>
    <link rel="stylesheet" href="../assets/styles/login.css">
</head>
<!-- Barra de Navegação -->
<?php require_once './navbar.php'; ?>

<body id="body-margin">
    <main class="sign-login-container">
        <article class="login-container">
            <h1>Já tenho cadastro</h1>

            <form action="../controllers/ControllerValidaLogin.php" method="POST" id="form-login">
                <label for="email-cpf">
                    <input type="text" required name="email-cpf" id="input-login-emailcpf" placeholder="Email ou CPF">
                </label>
                <label for="senha" class="row-senha-eye">
                    <input type="password" required name="senha-login" id="input-login-senha" placeholder="Senha">
                    <i id="eye-senha-hide" onclick="toggleSenhaLogin(this)" class="fa-regular fa-eye"></i>
                </label>
                <div id="container-error-login">
                    <p id="error-exib-login"></p>
                </div>

                <a href="./esqueceu-senha.php">Esqueceu sua senha?</a>

                <button type="submit" id="principal-button">Entrar</button>
                <p>Ou entre com as suas redes sociais</p>
                <section class="social-media">

                    <button type="button" id="social" onclick="window.location.href='../controllers/ControllerLoginSocial.php?login=true'" class="google">
                        <img src="../assets/./svg/google.svg" alt="Logo do google" width="20" height="20">Google
                    </button>
                </section>
            </form>
        </article>
        <span class="line"></span>

        <article class="sign-container">
            <h1>Quero me cadastrar</h1>

            <form action="../controllers/ControllerAddUsuarioUser.php" method="post" id="form-sign">
                <input type="hidden" name="cadastroFirstRequest">

                <label for="nome">
                    <input type="text" required name="nomeUser" id="input-sign-nome" placeholder="Nome">
                </label>
                <label for="email">
                    <input type="email" required name="emailUser" id="input-sign-email" placeholder="Email">
                </label>

                <label for="confirmEmail">
                    <input type="email" required name="confirmEmail" id="input-sign-email-confirma"
                           placeholder="Confirme o Email">
                </label>

                <div class="row-sign">
                    <label for="senha" class="row-senha-eye">
                        <input type="password" required name="senhaUser" id="input-sign-senha" placeholder="Senha">
                        <i id="eye-senha-hide" onclick="toggleSenhaCadastro(this)" class="fa-regular fa-eye"></i>
                    </label>

                    <label for="senhaC" class="row-senha-eye">
                        <input type="password" required name="senhaC" id="input-sign-senha-confirma"
                               placeholder="Confirme sua Senha">
                        <i id="eye-senha-hide" onclick="toggleSenhaCadastroConf(this)" class="fa-regular fa-eye"></i>
                    </label>
                </div>

                <div id="container-error">
                    <p id="error-exib"></p>
                </div>

                <button type="submit" id="principal-button">Continuar</button>

                <p>Ou registre-se com suas redes sociais</p>
                <section class="social-media">
                    <button id="social" class="google" onclick="window.location.href='../controllers/ControllerLoginSocial.php?cadastro=true'">
                        <img src="../assets/./svg/google.svg" alt="Logo do google" width="20" height="20">Google
                    </button>
                </section>
            </form>
        </article>
    </main>
</body>
<script src="../assets/js/login.js"></script>
<!-- Footer -->
<?php require_once './footer.php';
?>

</html>