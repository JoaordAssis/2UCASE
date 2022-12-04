<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once '../config/config.php'; ?>
    <link rel="stylesheet" href="../assets/css/AddMenu.css">
</head>

<?php require_once "./navbar.php"; ?>

<body id="body-margin">
    <main class="container-new-produto">
        <h1>Adicionar Carrossel</h1>
        <form action="../controller/ControllerAddCarrossel.php" method="POST" class="form-add-menu" enctype="multipart/form-data">


            <!-- <div class="row-nome-link"> -->

            <input type="text" name="nome_carrossel" id="input_nome_menu" placeholder="Nome da Imagem">

            <input type="text" name="link_promo_carrossel" id="input_link" placeholder="Link Promocional">


            <label for="img_principal">Imagem Principal
                <input type="file" name="imagem_carrossel" id="input-img">
            </label>

            <p>Imagens novas que forem adicionadas precisam da sua versão mobile enviada a mim, por motivos de preguicinha pra arrumar esse sistema😍</p>

            <!-- </div> -->

            <div class="row-ativo-submit">
                <select name="status">
                    <option value="1">Ativo</option>
                    <option value="0">Inativo</option>
                </select>

                <input type="submit" value="Adicionar" id="adcionar_menu">
            </div>


        </form>

        <button id="btn-exit" onclick="window.location.href='./carrossel.php'">Voltar</button>


    </main>
</body>
<script src="../assets/js/navbarFix.js"></script>

</html>


<?php
/*
CREATE TABLE adm_menu(
	id_menu INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	nome_menu VARCHAR(300) NOT NULL,
	link_menu varchar(300) not null,
	status INT(1) NOT NULL COMMENT '1 - ativo; 0 - inativo'
);*/
?>