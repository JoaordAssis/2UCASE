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

            <form action="#" method="post" id="form-login">
                <label for="email-cpf">
                    <input type="text" name="email-cpf" id="input-login" placeholder="Email ou CPF">
                </label>
                <label for="senha">
                    <input type="text" name="senha" id="input-login" placeholder="Senha">
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

            <form action="#" method="post" id="form-login">

                <label for="nome">
                    <input type="text" name="nome" id="input-login" placeholder="Nome">
                </label>
                <label for="email">
                    <input type="email" name="email" id="input-login" placeholder="Email">
                </label>

                <label for="confirmEmail">
                    <input type="email" name="confirmEmail" id="input-login" placeholder="Confirme o Email">
                </label>

                <div class="row-sign">
                    <label for="senha">
                        <input type="text" name="senha" id="input-login" placeholder="Senha">
                    </label>

                    <label for="senhaC">
                        <input type="text" name="senhaC" id="input-login" placeholder="Confirme sua Senha">
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
<!-- Footer -->
<?php require_once './footer.php';
?>

</html>