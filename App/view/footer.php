<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once __DIR__ . "/../config/stylesConfig.php"  ?>
    <link rel="stylesheet" href="../assets/styles/footer.css">
</head>

<body>
    <footer>
        <section class="social-media">
            <h4>Receba nossas novidades</h4>
            <form action="#" id="form-marketing">
                <input type="email" name="email-marketing" id="email-marketing" placeholder="Digite seu Email">
                <button type="submit" id="submit-btn">OK</button>
            </form>

            <h4>Nós siga nas redes sociais</h4>
            <div class="icon-media">
                <div class="instagram media">
                    <a target="__blank" href="https://www.instagram.com/_2ucase/">
                        <i class="fa-brands fa-instagram fa-2x"></i>
                    </a>
                </div>
                <div class="facebook media">
                    <a target="__blank" href="https://www.facebook.com/profile.php?id=100087884648897">
                        <i class="fa-brands fa-facebook-f fa-2x"></i>
                    </a>
                </div>
            </div>
        </section>
        <main class="footer-wraper">
            <section class="about">
                <h4>Sobre o 2UCASE</h4>
                <a href="./about.php">Quem Somos</a>
            </section>
            <section class="help">
                <h4>Precisa de Ajuda</h4>
                <ul class="footer-links">
                    <a href="./contact.php">
                        <li>Fale Conosco</li>
                    </a>
                    <a href="./contact.php">
                        <li>Central de Ajuda</li>
                    </a>
                    <a href="./politica-privacidade.php">
                        <li>Políticas de Privacidade</li>
                    </a>
                </ul>
            </section>
            <section class="payment">
                <h4>Metódos de Pagamento</h4>
                <img src="../assets/img/Cartoes.png"
                     alt="Formas de Pagamento">
            </section>
        </main>
    </footer>
</body>

</html>