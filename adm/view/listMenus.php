<?php
session_start();
require_once "../model/Manager.class.php";

$manager = new Manager();

$resultMenu = $manager->listClient('adm_menu', 'id_menu');
$resultSubMenu = $manager->listClient('adm_submenu', 'id_submenu');

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once "../config/config.php"; ?>
    <link rel="stylesheet" href="../assets/css/menus.css">
    <script defer src="../assets/js/menu.js"></script>
</head>

<?php require_once "./navbar.php"; ?>

<body id="body-margin">
    <main class="container-produto">
        <h1>Menus</h1>
        <!-- BARRA DE PESQUISA -->

        <section class="container-tabela-filter">

            <!-- FILTROS -->
            <section class="container-filters">
                <button id="btn-new-produto" onclick="window.location.href='./CRUDAddMenu.php'">
                    <div class="icon-container">
                        <i class="fa-regular fa-plus"></i>
                    </div>
                    Novo Menu
                </button>
            </section>


            <!-- TABELAS -->
            <section class="container-tabela">
                <table class="table-clientes">
                    <tr>
                        <th>#</th>
                        <th>Nome do Menu</th>
                        <th>Link</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                    <?php for ($i = 0; $i < count($resultMenu); $i++) : ?>
                        <tr>
                            <!-- DADOS PARA MODIFICAR -->
                            <td><?= $resultMenu[$i]['id_menu'] ?></td>
                            <td><?= $resultMenu[$i]['nome_menu'] ?></td>
                            <td><?= $resultMenu[$i]['link_menu'] ?></td>
                            <td><?= $resultMenu[$i]['status'] == 1 ? "Ativo" : "Inativo" ?></td>
                            <td id="btn-actions">
                                <button id="delete-prod" onclick="menuDelete(<?= $resultMenu[$i]['id_menu'] ?>)">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                                <button id="edit-prod" onclick="window.location.href='./CRUDEditMenu.php?id=<?= $resultMenu[$i]['id_menu'] ?>&action=editMenuADM'">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endfor; ?>
                </table>
            </section>
        </section>

        <!-- SUBMENU -->

        <h1>Submenus</h1>

        <section class="container-tabela-filter">

            <!-- FILTROS -->
            <section class="container-filters">
                <button id="btn-new-produto" onclick="window.location.href='./CRUDAddSubMenu.php'">
                    <div class="icon-container">
                        <i class="fa-regular fa-plus"></i>
                    </div>
                    Novo Submenu
                </button>
            </section>


            <!-- TABELAS -->
            <section class="container-tabela">
                <table class="table-clientes">
                    <tr>
                        <th>#</th>
                        <th>Nome do Submenu</th>
                        <th>Menu</th>
                        <th>Link do Submenu</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                    <?php

                    for ($j = 0; $j < count($resultSubMenu); $j++) :
                        $exibMenuSub = $manager->getInfoSub('adm_menu', $resultSubMenu[$j]['id_menu']);
                        for ($jk = 0; $jk < count($exibMenuSub); $jk++) :
                    ?>
                            <tr>
                                <!-- DADOS PARA MODIFICAR -->
                                <td><?= $resultSubMenu[$j]['id_submenu'] ?></td>
                                <td><?= $resultSubMenu[$j]['nome_submenu'] ?></td>
                                <td><?= $exibMenuSub[$jk]['nome_menu'] ?></td>
                                <td><?= $resultSubMenu[$j]['link_submenu'] ?></td>
                                <td><?= $resultSubMenu[$j]['status'] == 1 ? "Ativo" : "Inativo" ?></td>
                                <td id="btn-actions">
                                    <button id="delete-prod" onclick="subMenuDelete(<?= $resultSubMenu[$j]['id_submenu'] ?>)">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                    <button id="edit-prod" onclick="window.location.href='./CRUDEditSubMenu.php?id=<?= $resultSubMenu[$j]['id_submenu']?>'">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </button>
                                </td>
                            </tr>
                    <?php
                        endfor;
                    endfor;
                    ?>
                </table>
            </section>
        </section>
    </main>
</body>
<script src="../assets/js/navbarFix.js"></script>

<?php
if (isset($_POST['msg'])) {
    require_once './msg.php';
    $msg = $_POST["msg"];
    $msgExibir = $MSG[$msg];
    echo "<script>alert('" . $msgExibir . "');</script>";
}


?>

</html>