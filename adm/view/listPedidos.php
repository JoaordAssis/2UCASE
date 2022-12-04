<?php
session_start();
require_once "../model/Manager.class.php";

$manager = new Manager();

$resultPedidos = $manager->listClient('adm_venda', 'id_venda');

// Status

if (isset($_GET['selectStatus']) && $_GET['selectStatus'] != '') {
    $params = ['id_status'];
    $resultSearchStatus = $manager->selectWhere($params, $_GET['selectStatus'], 'adm_venda');
    $resultPedidos = $resultSearchStatus;
}

// Data

if (isset($_REQUEST['dataStart']) && !empty($_REQUEST['dataStart']) && isset($_REQUEST['dataEnd']) && !empty($_REQUEST['dataEnd'])) {

    $returnData = $manager->selectPerDate('adm_venda', 'data_venda', $_REQUEST['dataStart'], $_REQUEST['dataEnd']);
    $resultPedidos = $returnData;
}

// Ordem de relevancia

if (isset($_GET['selectOrdem']) && $_GET['selectOrdem'] != '') {

    if ($_GET['selectOrdem'] === '1') {
        // Maior preço
        $resultSearchOrdem = $manager->selectOrderBy('adm_venda', 'valor_venda_total', 'DESC');
        $resultPedidos = $resultSearchOrdem;
    }

    if ($_GET['selectOrdem'] === '2') {
        // Maior preço
        $resultSearchOrdem = $manager->selectOrderBy('adm_venda', 'valor_venda_total', 'ASC');
        $resultPedidos = $resultSearchOrdem;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once "../config/config.php"; ?>
    <link rel="stylesheet" href="../assets/css/pedidos.css">
</head>

<?php require_once "./navbar.php"; ?>

<body id="body-margin">
    <main class="container-produto">
        <h1>Histórico de Pedidos</h1>
        <!-- BARRA DE PESQUISA -->

        <section class="container-tabela-filter">

            <!-- FILTROS -->
            <section class="container-filters">

                <div class="box-data box-filter">
                    <label for="input-data">Desde:</label>
                    <input type="date" name="input-data" id="input-data-start">

                    <label for="input-data">Até:</label>
                    <input type="date" name="input-data" id="input-data-end">
                </div>

                <?php   //* EXIBIR STATUS DO PEDIDO
                $resultPedidoStatusCategoria = $manager->listClient('venda_status', 'id_status');
                ?>

                <div class="box-status box-filter">
                    <label for="select-status">Status</label>
                    <select id="select-status" oninput="redirectStatus()" name="select-status">
                        <option>Todos</option>
                        <?php
                        if (count($resultPedidoStatusCategoria) > 0) :
                            for ($t = 0; $t < count($resultPedidoStatusCategoria); $t++) :
                        ?>
                                <option value="<?= $resultPedidoStatusCategoria[$t]['id_status'] ?>">
                                    <?= $resultPedidoStatusCategoria[$t]['status_venda'] ?>
                                </option>
                        <?php
                            endfor;
                        endif;
                        ?>
                    </select>
                </div>


                <div class="box-ordem box-filter">
                    <label for="select-ordem">Ordenar Por</label>
                    <select id="select-ordem" oninput="redirectOrdem()" name="select-ordem">
                        <option>Todos</option>
                        <option value="1">Maior Preço</option>
                        <option value="2">Menor Preço</option>
                    </select>
                </div>

                <div class="container-clean-filters box-filter">
                    <button id="btn-clean-filters" onclick="cleanFilters()">
                        Limpar Filtros
                    </button>
                </div>
            </section>


            <!-- TABELAS -->
            <section class="container-tabela">
                <table class="table-clientes">
                    <tr>
                        <th>#</th>
                        <th>CPF Cliente</th>
                        <th>Quantidade de Produtos</th>
                        <th>Valor Total</th>
                        <th>Data</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>

                    <?php
                    if (count($resultPedidos) > 0) :
                        for ($i = 0; $i < count($resultPedidos); $i++) :
                            //* EXIBIR CLIENTE
                            $resultCliente = $manager->getInfo('user_cliente', 'id_cliente', $resultPedidos[$i]['id_cliente']);

                            //* EXIBIR STATUS DO PEDIDO
                            $resultPedidoStatus = $manager->getInfo('venda_status', 'id_status', $resultPedidos[$i]['id_status']);

                            if (count($resultCliente) > 0) :
                                for ($j = 0; $j < count($resultCliente); $j++) :
                                    if (count($resultPedidoStatus) > 0) :
                                        for ($k = 0; $k < count($resultPedidoStatus); $k++) :
                                            $timestampVenda = strtotime($resultPedidos[$i]['data_venda']);
                                            $newDateVenda = date("d/m/Y H:i:s", $timestampVenda);
                    ?>
                                            <tr>
                                                <!-- DADOS PARA MODIFICAR -->
                                                <td><?= $resultPedidos[$i]['id_venda'] ?></td>
                                                <td><?= $resultCliente[$j]['cpf_cliente'] ?></td>
                                                <td><?= $resultPedidos[$i]['quant_produto_total'] ?></td>
                                                <td><?= $resultPedidos[$i]['valor_venda_total'] ?></td>
                                                <td><?= $newDateVenda ?></td>
                                                <td><?= $resultPedidoStatus[$k]['status_venda'] ?></td>
                                                <td id="btn-actions">
                                                    <button id="search-client" onclick="window.location.href='./DetailsPedidos.php?id=<?= $resultPedidos[$i]['id_venda'] ?>'">
                                                        <i class="fa-solid fa-magnifying-glass"></i>
                                                    </button>
                                                </td>
                                            </tr>
                    <?php
                                        endfor;
                                    endif;
                                endfor;
                            endif;
                        endfor;
                    endif;
                    ?>
                </table>
            </section>
        </section>
    </main>
</body>
<script src="../assets/js/navbarFix.js"></script>
<script src="../assets/js/listPedidos.js"></script>
<?php
if (isset($_POST['msg'])) {
    require_once './msg.php';
    $msg = $_POST["msg"];
    $msgExibir = $MSG[$msg];
    echo "<script>alert('" . $msgExibir . "');</script>";
}


?>

</html>