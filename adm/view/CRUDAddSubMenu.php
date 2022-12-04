<?php
session_start();
require_once "../model/Manager.class.php";
$manager = new Manager();

$resultListMenu = $manager->listClient('adm_menu', 'id_menu');

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
        <h1>Adicionar Submenu</h1>
        <form action="../controller/ControllerAddSubMenuADM.php" method="POST" class="form-add-menu" enctype="multipart/form-data">


            <!-- <div class="row-nome-link"> -->

            <input type="text" name="nome_submenu" id="input_nome_menu" placeholder="Nome do menu">

            <input type="text" name="link_submenu" id="input_link_menu" placeholder="Link do menu">

            <label for="menu" id="submenu-label">Menu Correspondente</label>
            <select name="id_menu" id="submenu-select">
                <?php
                if (count($resultListMenu) > 0) {
                    for ($i = 0; $i < count($resultListMenu); $i++) {
                ?>
                        <option value="<?= $resultListMenu[$i]['id_menu'] ?>"><?= $resultListMenu[$i]['nome_menu'] ?></option>

                <?php
                    }
                }

                ?>
            </select>

            <!-- </div> -->

            <div class="row-ativo-submit">
                <select name="status">
                    <option value="1">Ativado - 1</option>
                    <option value="0">Desativado - 0</option>
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