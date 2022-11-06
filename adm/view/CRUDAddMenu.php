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
        <h1>Adicionar Menu</h1>
        <form action="../controller/ControllerAddMenuADM.php" method="POST" class="form-add-menu" enctype="multipart/form-data">


            <!-- <div class="row-nome-link"> -->

            <input type="text" name="nome_menu" id="input_nome_menu" placeholder="Nome do menu">
            
            <input type="text" name="link_menu" id="input_link_menu" placeholder="Link do menu">

        
            <!-- </div> -->

            <div class="row-ativo-submit">
            <select name="status">
                <option value="1">Ativo</option>
                <option value="0">Inativo</option>
            </select>

            <input type="submit" value="Adicionar" id="adcionar_menu">
            </div>
        

        </form> 

        <button id="btn-exit" onclick="window.location.href='./listMenus.php'">Voltar</button>
        

</main>
</body>

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