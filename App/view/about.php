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
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum velit reprehenderit doloribus unde voluptas consequuntur qui aut, autem perspiciatis fuga cumque aspernatur? Accusantium corrupti quo asperiores molestias ratione aperiam eos, veritatis necessitatibus porro! Aspernatur reiciendis minima et animi harum nemo atque officia, excepturi magnam. Nisi corporis est molestiae cumque laudantium?</p>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum velit reprehenderit doloribus unde voluptas consequuntur qui aut, autem perspiciatis fuga cumque aspernatur? Accusantium corrupti quo asperiores molestias ratione aperiam eos, veritatis necessitatibus porro! Aspernatur reiciendis minima et animi harum nemo atque officia, excepturi magnam. Nisi corporis est molestiae cumque laudantium?</p>
        </article>

        <section class="image-about">
            <img src="../assets/./img/./bannerAbout.png" alt="Imagem de referencia de produtos">
        </section>

        <article class="nossa-historia text-container">
            <h1>Nossa História</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum velit reprehenderit doloribus unde voluptas consequuntur qui aut, autem perspiciatis fuga cumque aspernatur? Accusantium corrupti quo asperiores molestias ratione aperiam eos, veritatis necessitatibus porro! Aspernatur reiciendis minima et animi harum nemo atque officia, excepturi magnam. Nisi corporis est molestiae cumque laudantium?</p>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum velit reprehenderit doloribus unde voluptas consequuntur qui aut, autem perspiciatis fuga cumque aspernatur? Accusantium corrupti quo asperiores molestias ratione aperiam eos, veritatis necessitatibus porro! Aspernatur reiciendis minima et animi harum nemo atque officia, excepturi magnam. Nisi corporis est molestiae cumque laudantium?</p>
        </article>

        <article class="container-integrantes">
            <h1>Integrantes</h1>

            <section class="box-integrante row-integrante">
                <div class="box-info">
                    <img src="../assets/img/no_picture.png" alt="">
                    <div class="text-info">
                        <h3>João Carlos Rodrigues Assis</h3>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Mollitia aperiam minima, blanditiis laborum quae voluptatum doloribus, cum atque repellendus officia fugit sint? Voluptatem a qui pariatur quos quod corporis maiores.</p>
                    </div>

                </div>
            </section>

            <section class="box-integrante row-reverse-integrante">
                <div class="box-info">
                    <img src="../assets/img/no_picture.png" alt="">
                    <div class="text-info">
                        <h3>Davi Camargo Matias Freitas</h3>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Mollitia aperiam minima, blanditiis laborum quae voluptatum doloribus, cum atque repellendus officia fugit sint? Voluptatem a qui pariatur quos quod corporis maiores.</p>
                    </div>
                </div>
            </section>

            <section class="box-integrante row-integrante">
                <div class="box-info">
                    <img src="../assets/img/no_picture.png" alt="">
                    <div class="text-info">
                        <h3>Sophia Vieira Santos</h3>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Mollitia aperiam minima, blanditiis laborum quae voluptatum doloribus, cum atque repellendus officia fugit sint? Voluptatem a qui pariatur quos quod corporis maiores.</p>
                    </div>

                </div>
            </section>

            <section class="box-integrante row-reverse-integrante">
                <div class="box-info">
                    <img src="../assets/img/no_picture.png" alt="">
                    <div class="text-info">
                        <h3>Kathleen Gomes de Oliveira</h3>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Mollitia aperiam minima, blanditiis laborum quae voluptatum doloribus, cum atque repellendus officia fugit sint? Voluptatem a qui pariatur quos quod corporis maiores.</p>
                    </div>
                </div>
            </section>

            <section class="box-integrante row-integrante">
                <div class="box-info">
                    <img src="../assets/img/no_picture.png" alt="">
                    <div class="text-info">
                        <h3>Andressa Rafaela de Holanda Silva</h3>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Mollitia aperiam minima, blanditiis laborum quae voluptatum doloribus, cum atque repellendus officia fugit sint? Voluptatem a qui pariatur quos quod corporis maiores.</p>
                    </div>

                </div>
            </section>

            <section class="box-integrante row-reverse-integrante">
                <div class="box-info">
                    <img src="../assets/img/no_picture.png" alt="">
                    <div class="text-info">
                        <h3>Samuel Machado da Silva</h3>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Mollitia aperiam minima, blanditiis laborum quae voluptatum doloribus, cum atque repellendus officia fugit sint? Voluptatem a qui pariatur quos quod corporis maiores.</p>
                    </div>
                </div>
            </section>

            <section class="box-integrante row-integrante">
                <div class="box-info">
                    <img src="../assets/img/no_picture.png" alt="">
                    <div class="text-info">
                        <h3>Davi Moreira de Santana</h3>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Mollitia aperiam minima, blanditiis laborum quae voluptatum doloribus, cum atque repellendus officia fugit sint? Voluptatem a qui pariatur quos quod corporis maiores.</p>
                    </div>

                </div>
            </section>
        </article>

    </main>
</body>
<!-- Footer -->
<?php require_once './footer.php'; ?>

</html>