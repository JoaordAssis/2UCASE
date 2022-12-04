<?php
session_start();
require_once "../model/Manager.class.php";
$manager = new Manager();

$resultClienteList = $manager->listClient('user_cliente', 'id_cliente');

if (isset($_GET['searchBarClientes']) && $_GET['searchBarClientes'] != '') {
    $columns = ['nome_cliente ', 'email_cliente ', 'cpf_cliente ', 'telefone_cliente ', 'genero_cliente ', 'status '];
    $resultSearchClient = $manager->selectLike('user_cliente', $columns, $_GET['searchBarClientes']);
    $resultClienteList = $resultSearchClient;
}



$dataAtual = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));
$dataAtualN = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));

//* 24 HORAS
$dataMinus = $dataAtual->modify('-1 day');
$formatDataMinus = $dataMinus->format('Y-m-d H:i:s');
$formatDataAtual = $dataAtualN->format('Y-m-d H:i:s');
$returnData24 = $manager->dateCountClientes('user_cliente', 'data_reg_cliente', $formatDataAtual, $formatDataMinus);

//* Ultima semana
$dataMinusWeek = $dataAtual->modify('-1 week');
$formatDataWeekMinus = $dataMinusWeek->format('Y-m-d H:i:s');

$returnDataWeek = $manager->dateCountClientes('user_cliente', 'data_reg_cliente', $formatDataAtual, $formatDataWeekMinus);

//* Ultimo mês
$dataMinusWeek = $dataAtual->modify('-1 month');
$formatDataMonthMinus = $dataMinusWeek->format('Y-m-d H:i:s');

$returnDataMonth = $manager->dateCountClientes('user_cliente', 'data_reg_cliente', $formatDataAtual, $formatDataMonthMinus);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once "../config/config.php"; ?>
    <link rel="stylesheet" href="../assets/css/clientes.css">
</head>

<?php require_once "./navbar.php"; ?>

<body id="body-margin">
    <main class="container-produto">
        <h1>Clientes</h1>
        <!-- Métricas -->

        <section class="container-metricas">
            <div class="metrica-box metrica1">
                <h4>Usuários nas últimas 24 horas</h4>
                <div class="container-number">
                    <h3><?= $returnData24['COUNT(*)'] ?></h3>
                </div>
            </div>

            <div class="metrica-box metrica2">
                <h4>Usuários na última semana</h4>
                <div class="container-number">
                    <h3><?= $returnDataWeek['COUNT(*)'] ?></h3>
                </div>
            </div>

            <div class="metrica-box metrica3">
                <h4>Usuários no último mês</h4>
                <div class="container-number">
                    <h3><?= $returnDataMonth['COUNT(*)'] ?></h3>
                </div>
            </div>
        </section>

        <!-- BARRA DE PESQUISA -->
        <article class="container-pesquisa">
            <form action="#" method="GET">
                <div class="input-pesquisa">
                    <input type="text" name="searchBarClientes" placeholder="Pesquisar" id="pesquisar-input">
                    <input type="submit" value="">
                </div>
            </form>
        </article>

        <section class="container-tabela-filter">

            <!-- TABELAS -->
            <section class="container-tabela">
                <table class="table-clientes">
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>CPF</th>
                        <th>DataNasc</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                    <?php

                    if (count($resultClienteList) > 0) :
                        for ($i = 0; $i < count($resultClienteList); $i++) :
                            $timestamp = strtotime($resultClienteList[$i]["data_nasc_cliente"]);
                            $newDate = date("d-m-Y", $timestamp);
                            $dateExib = str_replace('-', '/', $newDate)
                    ?>
                            <tr>
                                <!-- DADOS PARA MODIFICAR -->
                                <td><?= $resultClienteList[$i]['id_cliente'] ?></td>
                                <td><?= $resultClienteList[$i]['nome_cliente'] ?></td>
                                <td><?= $resultClienteList[$i]['email_cliente'] ?></td>
                                <td><?= $resultClienteList[$i]['cpf_cliente'] ?></td>
                                <td><?= $dateExib ?></td>
                                <td><?= $resultClienteList[$i]['status'] == 1 ? "Ativo" : "Inativo" ?></td>
                                <td id="btn-actions">
                                    <button id="search-client" onclick="window.location.href='./DetailsClientes.php?id=<?= $resultClienteList[$i]['id_cliente'] ?>'">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </td>
                            </tr>

                    <?php
                        endfor;
                    else :
                        echo "<td colspan=7>Dados não encontrados!</td>";
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