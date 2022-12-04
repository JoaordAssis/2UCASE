<?php
session_start();
require_once "../model/Manager.class.php";
$manager = new Manager();

$resultListCupons = $manager->listClient('user_cupom', 'id_cupom');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once "../config/config.php"; ?>
    <link rel="stylesheet" href="../assets/css/cupons.css">
</head>

<?php require_once "./navbar.php"; ?>

<body id="body-margin">
    <main class="container-produto">
        <h1>Cupons de Desconto</h1>

        <section class="container-tabela-filter">

            <!-- FILTROS -->
            <section class="container-filters">
                <button id="btn-new-produto" onclick="window.location.href='./CRUDAddCupom.php'">
                    <div class="icon-container">
                        <i class="fa-regular fa-plus"></i>
                    </div>
                    Novo Cupom
                </button>
            </section>


            <!-- TABELAS -->
            <section class="container-tabela">
                <table class="table-clientes">
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Cupom</th>
                        <th>Categoria</th>
                        <th>Data de Expiração</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                    <?php
                    if (count($resultListCupons) > 0) :
                        for ($i = 0; $i < count($resultListCupons); $i++) :
                            $exibCategoria = $manager->getInfo('user_categoria', 'id_categoria', $resultListCupons[$i]['id_categoria']);
                            for ($jk = 0; $jk < count($exibCategoria); $jk++) :

                                $timestampCupom = strtotime($resultListCupons[$i]['data_expira_cupom']);
                                $newDateCupom = date("d/m/Y H:i:s", $timestampCupom);
                    ?>
                                <tr>
                                    <!-- DADOS PARA MODIFICAR -->
                                    <td><?= $resultListCupons[$i]['id_cupom'] ?></td>
                                    <td><?= $resultListCupons[$i]['nome_cupom'] ?></td>
                                    <td><?= $resultListCupons[$i]['codigo_cupom'] ?></td>
                                    <td><?= $exibCategoria[$jk]['nome_categoria'] ?></td>
                                    <td><?= $newDateCupom ?></td>
                                    <td><?= $resultListCupons[$i]['status'] == 1 ? "Ativo" : "Inativo" ?></td>
                                    <td id="btn-actions">
                                        <button id="delete-prod" onclick="window.location.href='../controller/ControllerCupomADM.php?id=<?= $resultListCupons[$i]['id_cupom'] ?>&action=deleteCupomADM'">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                        <button id="edit-prod" onclick="window.location.href='./CRUDEditCupom.php?id=<?= $resultListCupons[$i]['id_cupom'] ?>&action=editCupomADM'">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </button>
                                    </td>
                                </tr>
                    <?php
                            endfor;
                        endfor;
                    endif;
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