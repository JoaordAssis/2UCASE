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
            <img src="../assets/img/Pic-Grupo.jpeg" alt="Imagem de referencia de produtos">
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
                    <img src="../assets/img/Pic-Joao.jpeg" alt="">
                    <div class="text-info">
                        <h3>João Carlos Rodrigues Assis</h3>
                        <p><strong>Gestor & Editor</strong></p>
                        <p>Como gerente, ele é quem acompanha o desenvolvimento de um projeto desde o seu início até o seu final, com a apresentação do resultado. Já como editor, cuida da criação de imagens para nosso site!</p>
                    </div>

                </div>
            </section>

            <section class="box-integrante row-reverse-integrante">
                <div class="box-info">
                    <img src="../assets/img/Pic-DaviC.jpeg" alt="">
                    <div class="text-info">
                        <h3>Davi Camargo Matias Freitas</h3>
                        <p><strong>DBA & Desenvolvedor Back-End</strong></p>
                        <p>Responsável pela criação, instalação, monitoramento, reparos e análise de estruturas de um banco de dados, além de contribuir com o planejamento, construção e implementação de uma aplicação ( nesse caso, a 2UCASE!)</p>
                    </div>
                </div>
            </section>

            <section class="box-integrante row-integrante">
                <div class="box-info">
                    <img src="../assets/img/Pic-Soph.jpeg" alt="">
                    <div class="text-info">
                        <h3>Sophia Vieira Santos</h3>
                        <p><strong>Desenvolvedora Front-End & Designer UI/UX</strong></p>
                        <p>Trabalha na otimização das funcionalidades da interface de diversas plataformas digitais, desde websites até aplicativos para dispositivos móveis e pensar na experiência que uma pessoa tem ao usar interfaces como aplicativos e sites, como ux.</p>
                    </div>

                </div>
            </section>

            <section class="box-integrante row-reverse-integrante">
                <div class="box-info">
                    <img src="../assets/img/Pic-Kath.jpeg" alt="">
                    <div class="text-info">
                        <h3>Kathleen Gomes de Oliveira</h3>
                        <p><strong>Documentadora</strong></p>
                        <p>O foco do documentador é produzir um conteúdo que se adapte ao público-alvo, seguindo as regras de negócio, legislação e outras premissas do desenvolvimento de software. Ao desenvolver estes materiais, o profissional de documentação pode propiciar outros ganhos para a empresa, como: Facilitar a comunicação.</p>
                    </div>
                </div>
            </section>

            <section class="box-integrante row-integrante">
                <div class="box-info">
                    <img src="../assets/img/Pic-Dressa.jpeg" alt="">
                    <div class="text-info">
                        <h3>Andressa Rafaela de Holanda Silva</h3>
                        <p><strong>Documentadora</strong></p>
                        <p>O foco do documentador é produzir um conteúdo que se adapte ao público-alvo, seguindo as regras de negócio, legislação e outras premissas do desenvolvimento de software. Ao desenvolver estes materiais, o profissional de documentação pode propiciar outros ganhos para a empresa, como: Facilitar a comunicação.</p>
                    </div>

                </div>
            </section>

            <section class="box-integrante row-reverse-integrante">
                <div class="box-info">
                    <img src="../assets/img/Pic-Samuel.jpeg" alt="">
                    <div class="text-info">
                        <h3>Samuel Machado da Silva</h3>
                        <p><strong>Editor & Documentador</strong></p>
                        <p>O editor tem como função, analisar o design do site e criar artes com base na personalidade do projeto, e ser responsável pela criação de imagens para nosso site!
                        O foco do documentador é produzir um conteúdo que se adapte ao público-alvo, seguindo as regras do negócio</p>
                    </div>
                </div>
            </section>

            <section class="box-integrante row-integrante">
                <div class="box-info">
                    <img src="../assets/img/Pic-Davi.jpg" alt="">
                    <div class="text-info">
                        <h3>Davi Moreira de Santana</h3>
                        <p><strong>Desenvolvedor Full-Stack & Designer UI/UX</strong></p>
                        <p>O programador full stack é um especialista que faz tanto o front quanto o back-end. otimiza também as funcionalidades da interface de diversas plataformas digitais, desde websites até aplicativos para dispositivos móveis.</p>
                    </div>

                </div>
            </section>
        </article>

    </main>
</body>
<!-- Footer -->
<?php require_once './footer.php'; ?>

</html>