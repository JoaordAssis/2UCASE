<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once __DIR__ . "/../config/stylesConfig.php"  ?>
    <link rel="stylesheet" href="../assets/styles/about.css">

</head>
<!-- Barra de Navegação -->
<?php require_once './navbar.php'; ?>

<body id="body-margin">
    <main class="about-content">
        <section class="image-container">
            <img src="../assets/./img/./BannerAboutPage.jpg" alt="Banner de apresentação">
        </section>

        <article class="quem-somos text-container">
            <h1>Quem Somos</h1>
            <p>
                2UCASE (to you case), significa "capinhas para você", ambos foram destinados para refletir que a criatividade vem de coisas mais complexas como as mais simples: capinhas. Somos um site que desenvolve capinhas criativas. Nossa marca e nossos produtos são para todos aqueles que querem se expressar. A diversidade é um combustível para a criatividade e você é muito bem-vindo a escolher diversos modelos que se encaixam com você em nosso site.
            </p>


        </article>

        <section class="image-about">
            <img src="../assets/./img/./bannerAbout.png" alt="Imagem de referencia de produtos">
        </section>

        <article class="nossa-historia text-container">
            <h1>Nossa História</h1>
            <p>
                A 2UCASE tem como objetivo você. Trabalhamos com você para te projetar de um jeito diferente e criativo.
                Nossa empresa foi fundada em 15 de fevereiro de 2022 com a ideia de dar identidade e singularidade para algo meu, algo seu, algo nosso. De expressar ideias, gostos, sentimento e personalidade. Nossos produtos são detalhados porque nós somos cheios de detalhes, e é isso que nos torna nós. É isso que torna a 2UCASE o que é e, principalmente, é isso que te torna você.
            </p>
        </article>

        <article class="container-integrantes">
            <h1>Integrantes</h1>

            <section class="box-integrante row-integrante">
                <div class="box-info">
                    <img src="../assets/img/no_picture.png" alt="">
                    <div class="text-info">
                        <h3>João Carlos Rodrigues Assis</h3>
                        <p><strong>Gestor & Editor</strong></p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, doloribus!</p>
                    </div>

                </div>
            </section>

            <section class="box-integrante row-reverse-integrante">
                <div class="box-info">
                    <img src="../assets/img/Pic-DaviC.jpeg" alt="">
                    <div class="text-info">
                        <h3>Davi Camargo Matias Freitas</h3>
                        <p><strong>DBA & Desenvolvedor Back-End</strong></p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, doloribus!</p>
                    </div>
                </div>
            </section>

            <section class="box-integrante row-integrante">
                <div class="box-info">
                    <img src="../assets/img/Pic-Soph.jpeg" alt="">
                    <div class="text-info">
                        <h3>Sophia Vieira Santos</h3>
                        <p><strong>Desenvolvedora Front-End & Designer UI/UX</strong></p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, doloribus!</p>
                    </div>

                </div>
            </section>

            <section class="box-integrante row-reverse-integrante">
                <div class="box-info">
                    <img src="../assets/img/Pic-Kath.jpeg" alt="">
                    <div class="text-info">
                        <h3>Kathleen Gomes de Oliveira</h3>
                        <p><strong>Documentadora</strong></p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, doloribus!</p>
                    </div>
                </div>
            </section>

            <section class="box-integrante row-integrante">
                <div class="box-info">
                    <img src="../assets/img/Pic-Dressa.jpeg" alt="">
                    <div class="text-info">
                        <h3>Andressa Rafaela de Holanda Silva</h3>
                        <p><strong>Documentadora</strong></p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, doloribus!</p>
                    </div>

                </div>
            </section>

            <section class="box-integrante row-reverse-integrante">
                <div class="box-info">
                    <img src="../assets/img/no_picture.png" alt="">
                    <div class="text-info">
                        <h3>Samuel Machado da Silva</h3>
                        <p><strong>Documentador & Editor</strong></p>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Mollitia aperiam minima, blanditiis laborum quae voluptatum doloribus, cum atque repellendus officia fugit sint? Voluptatem a qui pariatur quos quod corporis maiores.</p>
                    </div>
                </div>
            </section>

            <section class="box-integrante row-integrante">
                <div class="box-info">
                    <img src="../assets/img/no_picture.png" alt="">
                    <div class="text-info">
                        <h3>Davi Moreira de Santana</h3>
                        <p><strong>Desenvolvedor Full-Stack & Designer UI/UX</strong></p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, doloribus!</p>
                    </div>

                </div>
            </section>
        </article>

    </main>
</body>
<!-- Footer -->
<?php require_once './footer.php'; ?>

</html>