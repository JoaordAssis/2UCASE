<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once '../config/StylesConfig.php'; ?>
    <link rel="stylesheet" href="../assets/styles/avaliacao.css">
</head>

<?php require_once "./navbar.php"; ?>

<body id="body-margin">
    <main class="container-new-produto">
        <h1>Avaliar Produto</h1>

        <section class="prod-carrinho">
            <div class="produto-info">
                <img src="../assets/./img/./Time.png" alt="Alt dinâmico">
                <div class="titles-column">
                    <h4>Flamengo - Uniforme 1 2022 Personalizado</h4>
                    <p id="p-opaco">Iphone 13 Max</p>
                </div>

                <div class="quantidade">
                    <p id="p-opaco">QUANTIDADE</p>
                    <p>2</p>
                </div>

                <div class="valor">
                    <p id="p-opaco">VALOR</p>
                    <P>R$ 36,65</P>
                </div>
            </div>
        </section>

        <section class="avaliar-container">
            <p>Clique para dar sua nota</p>
            <div class="container-stars">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
            </div>
        </section>


        <form action="#" method="POST" class="form-add-menu" enctype="multipart/form-data">

            <input type="text" name="titulo_avaliacao" id="input_nome_menu" placeholder="Titulo">

            <input type="text" name="link_menu" id="input_link_menu" placeholder="Link do menu">

            <textarea placeholder="Mensagem" name="avaliacao-txt"></textarea>

            <input type="submit" value="Adicionar" id="adcionar_menu">
            </div>


        </form>

        <button id="btn-exit" onclick="window.location.href='./listMenus.php'">Voltar</button>


</main>
</body>

</html>

