<?php
session_start();
$idMenuADM = $_REQUEST['id'];
require_once "../model/Manager.class.php";
$manager = new Manager();

$resultListMenu = $manager->getInfo('adm_menu', 'id_menu', $idMenuADM);

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
        <h1>Adicionar Menu</h1>
        <form action="../controller/ControllerMenuADM.php" method="POST" class="form-add-menu" enctype="multipart/form-data">

            <input type="hidden" name="action" value="editMenuADM">
            <input type="hidden" name="id" value="<?= $idMenuADM ?>">


            <!-- <div class="row-nome-link"> -->

            <input type="text" name="nome_menu" id="input_nome_menu" value="<?= $resultListMenu[0]['nome_menu'] ?>" placeholder="Nome do menu">

            <input type="text" name="link_menu" id="input_link_menu" value="<?= $resultListMenu[0]['link_menu'] ?>" placeholder="Link do menu">


            <!-- </div> -->

            <div class="row-ativo-submit">
                <select name="status">
                    <?php
                    if ($resultListMenu[0]['status'] === 1) {
                    ?>
                        <option value="1" selected>Ativado - 1</option>
                        <option value="0">Desativado - 0</option>
                    <?php
                    }
                    ?>


                    <?php
                    if ($resultListMenu[0]['status'] === 0) {
                    ?>
                        <option value="1">Ativado - 1</option>
                        <option value="0" selected>Desativado - 0</option>
                    <?php
                    }
                    ?>
                </select>

                <input type="submit" value="Adicionar" id="adcionar_menu">
            </div>


        </form>

        <button id="btn-exit" onclick="window.location.href='./listMenus.php'">Voltar</button>


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