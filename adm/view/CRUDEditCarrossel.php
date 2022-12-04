<?php
session_start();
$idCarrossel = $_REQUEST['id'];
require_once "../model/Manager.class.php";
$manager = new Manager();

$exibCarrossel = $manager->getInfo('adm_carrossel', 'id_carrossel', $idCarrossel);
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
        <h1>Editar Carrossel</h1>
        <form action="../controller/ControllerCarrosselADM.php" method="POST" class="form-add-menu" enctype="multipart/form-data">

            <input type="hidden" name="action" value="editCarrosselADM">
            <input type="hidden" name="id" value="<?= $idCarrossel ?>">


            <!-- <div class="row-nome-link"> -->

            <input type="text" name="nome_carrossel" value="<?= $exibCarrossel[0]['nome_carrossel'] ?>" id="input_nome_menu" placeholder="Nome da Imagem">

            <input type="text" name="link_promo_carrossel" value="<?= $exibCarrossel[0]['link_promo_carrossel'] ?>" id="input_link" placeholder="Link Promocional">
            <br>

            <h5>Por motivos de incompetência minha, peço encarecidamente que não seja realizado alterações nos nomes dos carrosseis já adicionados, Thanks!</h5>

            <p><?= $exibCarrossel[0]['link_carrossel'] ?></p>


            <label for="img_principal">Imagem Principal
                <input type="hidden" name="link_carrossel" value="<?= $exibCarrossel[0]['link_carrossel'] ?>" id="input-img">
                <input type="file" name="link_carrossel_new" id="input-img">
            </label>


            <!-- </div> -->

            <div class="row-ativo-submit">
                <select name="status">
                    <?php
                    if ($exibCarrossel[0]['status'] === 1) {
                    ?>
                        <option value="1" selected>Ativado - 1</option>
                        <option value="0">Desativado - 0</option>
                    <?php
                    }
                    ?>


                    <?php
                    if ($exibCarrossel[0]['status'] === 0) {
                    ?>
                        <option value="1">Ativado - 1</option>
                        <option value="0" selected>Desativado - 0</option>
                    <?php
                    }
                    ?>
                </select>

                <input type="submit" value="Editar" id="adcionar_menu">
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