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
                    <a href="#"><i class="fa-brands fa-instagram fa-2x"></i></a>
                </div>
                <div class="facebook media">
                    <a href="#"><i class="fa-brands fa-facebook-f fa-2x"></i></a>
                </div>
            </div>
        </section>
        <section class="about">
            <h5>Sobre o Vilicapas</h5>
            <a href="#">Quem Somos</a>
        </section>
        <section class="help">
            <h5>Precisa de Ajuda</h5>
            <ul class="footer-links">
                <a href="#">
                    <li>Fale Conosco</li>
                </a>
                <a href="#">
                    <li>Central de Ajuda</li>
                </a>
                <a href="#">
                    <li>Políticas de Privacidade</li>
                </a>
            </ul>
        </section>
        <section class="payment">
            <h5>Metódos de Pagamento</h5>
        </section>
    </footer>
</body>

</html>