<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once __DIR__ . "/../config/stylesConfig.php"  ?>
    <link rel="stylesheet" href="../assets/styles/login.css">

</head>
<!-- Barra de Navegação -->
<?php require_once './navbar.php'; ?>

<body id="body-margin">
    <main class="sign-login-container">
        <article class="login-container">
            <h1>Já tenho cadastro</h1>

            <form action="./carrinho.php" method="post" id="form-login">
                <label for="email-cpf">
                    <input type="text" required name="email-cpf" id="input-login-emailcpf" placeholder="Email ou CPF">
                </label>
                <label for="senha">
                    <input type="password" required name="senha" id="input-login-senha" placeholder="Senha">
                </label>
                <a href="./esqueceu-senha.php">Esqueceu sua senha?</a>

                <button type="submit" id="principal-button">Entrar</button>
                <p>Ou entre com suas redes sociais</p>
                <section class="social-media">

                    <button id="social" class="facebook">
                        <i class="fa-brands fa-facebook-f"></i>Facebook
                    </button>

                    <button id="social" class="google">
                        <img src="../assets/./svg/google.svg" alt="Logo do google" width="20" height="20">Google
                    </button>
                </section>
            </form>
        </article>
        <span class="line"></span>

        <article class="sign-container">
            <h1>Quero me cadastrar</h1>

            <form action="./carrinho.php" method="post" id="form-sign">

                <label for="nome">
                    <input type="text" required name="nome" id="input-sign-nome" placeholder="Nome">
                </label>
                <label for="email">
                    <input type="email" required name="email" id="input-sign-email" placeholder="Email">
                </label>

                <label for="confirmEmail">
                    <input type="email" required name="confirmEmail" id="input-sign-email-confirma"
                           placeholder="Confirme o Email">
                </label>

                <div class="row-sign">
                    <label for="senha">
                        <input type="password" required  name="senha" id="input-sign-senha" placeholder="Senha">
                    </label>

                    <label for="senhaC">
                        <input type="password" required  name="senhaC" id="input-sign-senha-confirma"
                               placeholder="Confirme sua Senha">
                    </label>
                </div>


                <button type="submit" id="principal-button">Continuar</button>

                <p>Ou registre-se com suas redes sociais</p>
                <section class="social-media">
                    <button id="social" class="facebook">
                        <i class="fa-brands fa-facebook-f"></i>Facebook
                    </button>

                    <button id="social" class="google">
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