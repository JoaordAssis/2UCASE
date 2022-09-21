<?php
require_once "../model/Manager.class.php";

$manager = new Manager();

$resultAvaliacao = $manager->listClient('user_avaliacao', 'id_avaliacao');

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once "../config/config.php"; ?>
    <link rel="stylesheet" href="../assets/css/comentarios.css">
</head>

<?php require_once "./navbar.php"; ?>

<body id="body-margin">
    <main class="container-produto">
        <h1>Feedback</h1>
        <!-- BARRA DE PESQUISA -->

        <section class="container-tabela-filter">

            <!-- FILTROS -->
            <section class="container-filters">
                <div class="box-data box-filter">
                    <label for="input-data">Desde:</label>
                    <input type="month" name="input-data" id="input-data">
                </div>

                <div class="box-status box-filter">
                    <label for="select-status">Status</label>
                    <select id="select-ordem" name="select-ordem">
                        <option value="1">Disponivel</option>
                        <option value="0">Indisponivel</option>
                    </select>
                </div>

                <div class="box-faixa-preco box-filter">
                    <label for="select-faixa-preco">Categorias</label>
                    <select id="boselectx-faixa-preco" name="select-faixa-preco">
                        <option value="1">Categoria</option>
                        <option value="2">Categ2</option>
                        <option value="3">Categ3</option>
                    </select>
                </div>

                <div class="box-ordem box-filter">
                    <label for="select-ordem">Ordenar Por</label>
                    <select id="select-ordem" name="select-ordem">
                        <option value="1">Maior Preço</option>
                        <option value="2">Menor Preço</option>
                        <option value="3">Mais Relevante</option>
                    </select>
                </div>
            </section>


            <!-- TABELAS -->
            <section class="container-tabela">
                <table class="table-clientes">
                    <tr>
                        <th>#</th>
                        <th>Avaliação</th>
                        <th>Nome</th>
                        <th>Produto</th>
                        <th>Data</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                    <?php
                    if (count($resultAvaliacao) > 0) :
                        for ($i = 0; $i < count($resultAvaliacao); $i++) :

                            $timestamp = strtotime($resultAvaliacao[$i]["data_avaliacao"]);
                            $newDate = date("d-m-Y H:i:s", $timestamp);
                            $dateExib = str_replace('-', '/', $newDate);

                            $exibCliente = $manager->getInfo('user_cliente', 'id_cliente', $resultAvaliacao[$i]['id_cliente']);
                            $exibProduto = $manager->getInfo('user_produto', 'id_produto', $resultAvaliacao[$i]['id_produto']);
                            for ($j = 0; $j < count($exibCliente); $j++) :
                                for ($k = 0; $k < count($exibProduto); $k++) :


                    ?>
                                    <tr>
                                        <!-- DADOS PARA MODIFICAR -->
                                        <td><?= $resultAvaliacao[$i]['id_avaliacao'] ?></td>
                                        <td><?= $resultAvaliacao[$i]['nota_avaliacao'] ?> Estrelas</td>
                                        <td><?= $exibCliente[$j]['nome_cliente'] ?></td>
                                        <td><?= $exibProduto[$k]['nome_produto'] ?></td>
                                        <td><?= $dateExib ?></td>
                                        <td><?= $resultAvaliacao[$i]['status'] ?></td>
                                        <td id="btn-actions" onclick="window.location.href='./DetailsComentarios.php?id=<?= $resultAvaliacao[$i]['id_avaliacao'] ?>'">
                                            <button id="search-client">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </button>
                                        </td>
                                    </tr>

                    <?php
                                endfor;
                            endfor;
                        endfor;
                    else:
                        echo "<td colspan=7>Nenhum comentário encontrado!</td>";
                    endif;
                    ?>
                </table>
            </section>
        </section>
    </main>
</body>
<?php
if (isset($_POST['msg'])) {
    require_once './msg.php';
    $msg = $_POST["msg"];
    $msgExibir = $MSG[$msg];
    echo "<script>alert('" . $msgExibir . "');</script>";
}


?>

</html>