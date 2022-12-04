<?php
session_start();
require_once "../model/Manager.class.php";
$manager = new Manager();

$exibCategoriaFilters = $manager->listClient('user_categoria', 'id_categoria');

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
        <h1>Adicionar Cupom</h1>
        <form action="../controller/ControllerAddCupom.php" method="POST" class="form-add-menu" enctype="multipart/form-data">


            <!-- <div class="row-nome-link"> -->

            <input type="text" required name="nome_cupom" id="input_nome_menu" placeholder="Nome do Cupom">

            <input type="text" required name="codigo_cupom" id="input_link_menu" placeholder="Codigo do Cupom">

            <input type="date" required name="data_expira_cupom" id="input_data_cupom">
            <input type="text" data-js="porcentagem" required name="desconto_cupom" placeholder="Desconto em porcentagem" id="input_desconto">


            <!-- </div> -->

            <div class="row-ativo-submit">
                <select name="status">
                    <option value="1">Ativo</option>
                    <option value="0">Inativo</option>
                </select>

                <select required name="id_categoria" id="select-categoria">
                    <?php
                    if (count($exibCategoriaFilters) > 0) :
                        for ($i = 0; $i < count($exibCategoriaFilters); $i++) :
                    ?>
                            <option value="<?= $exibCategoriaFilters[$i]['id_categoria'] ?>">
                                <?= $exibCategoriaFilters[$i]['nome_categoria'] ?>
                            </option>
                    <?php
                        endfor;
                    endif;
                    ?>
                </select>

                <input type="submit" value="Adicionar" id="adcionar_menu">
            </div>


        </form>

        <button id="btn-exit" onclick="window.location.href='./listCupons.php'">Voltar</button>


    </main>
</body>
<script src="../assets/js/listCupons.js"></script>
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