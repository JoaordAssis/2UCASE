<?php
session_start();
require_once "../model/Manager.class.php";
$manager = new Manager();

$resultProdutos = $manager->listClient('user_produto', 'id_produto');
$exibCategoriaFilters = $manager->listClient('user_categoria', 'id_categoria');

if (isset($_GET['searchBarProdutos']) && $_GET['searchBarProdutos'] != '') {

    $columns = ['nome_produto ', 'preco_produto ', 'status ', 'categoria_special_produto '];
    $resultSearchProdutos = $manager->selectLike('user_produto', $columns, $_GET['searchBarProdutos']);
    $resultProdutos = $resultSearchProdutos;
}

if (isset($_GET['selectCategoria']) && $_GET['selectCategoria'] != '') {
    $params = ['id_categoria'];
    $resultSearchAvalicao = $manager->selectWhere($params, $_GET['selectCategoria'], 'user_produto');
    $resultProdutos = $resultSearchAvalicao;
}

if (isset($_GET['selectStatus']) && $_GET['selectStatus'] != '') {
    $params = ['status'];
    $resultSearchAvalicao = $manager->selectWhere($params, $_GET['selectStatus'], 'user_produto');
    $resultProdutos = $resultSearchAvalicao;
}

if (isset($_GET['selectOrdem']) && $_GET['selectOrdem'] != '') {

    if ($_GET['selectOrdem'] === '1') {
        // Maior preço
        $resultSearchOrdem = $manager->selectOrderBy('user_produto', 'preco_produto', 'DESC');
        $resultProdutos = $resultSearchOrdem;
    }

    if ($_GET['selectOrdem'] === '2') {
        // Maior preço
        $resultSearchOrdem = $manager->selectOrderBy('user_produto', 'preco_produto', 'ASC');
        $resultProdutos = $resultSearchOrdem;
    }

    if ($_GET['selectOrdem'] === '3') {
        // Maior preço
        $resultSearchOrdem = $manager->selectOrderBy('user_produto', 'quantidade_produto', 'ASC');
        $resultProdutos = $resultSearchOrdem;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once "../config/config.php"; ?>
    <link rel="stylesheet" href="../assets/css/produtos.css">
</head>

<?php require_once "./navbar.php"; ?>

<body id="body-margin">
    <main class="container-produto">
        <h1>Produtos</h1>
        <!-- BARRA DE PESQUISA -->
        <article class="container-pesquisa">
            <form action="../controller/ControllerProdutoADM.php" method="POST">
                <div class="input-pesquisa">
                    <input type="text" name="searchBarProdutos" placeholder="Pesquisar" id="pesquisar-input">
                    <input type="submit" value="">
                </div>
            </form>
        </article>

        <section class="container-tabela-filter">

            <!-- FILTROS -->
            <section class="container-filters">
                <button id="btn-new-produto" onclick="window.location.href='./CRUDAddProduto.php'">
                    <div class="icon-container">
                        <i class="fa-regular fa-plus"></i>
                    </div>
                    Novo Produto
                </button>

                <!-- <div class="box-data box-filter">
                    <label for="input-data">Desde:</label>
                    <input type="month" name="input-data" id="input-data">
                </div> -->

                <div class="box-status box-filter">
                    <label for="select-status">Status</label>
                    <select id="select-status" oninput="redirectStatus()" name="select-status">
                        <option>Todos</option>
                        <option value="1">Disponivel</option>
                        <option value="0">Indisponivel</option>
                    </select>
                </div>

                <div class="box-faixa-preco box-filter">
                    <label for="select-faixa-preco">Categorias</label>
                    <select id="boselectx-categoria" oninput="redirectCategoria()" name="select-faixa-preco">
                        <option>Todos</option>
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
                </div>

                <div class="box-ordem box-filter">
                    <label for="select-ordem">Ordenar Por</label>
                    <select id="select-ordem" oninput="redirectOrdem()" name="select-ordem">
                        <option>Todos</option>
                        <option value="1">Maior Preço</option>
                        <option value="2">Menor Preço</option>
                        <option value="3">Mais Relevante</option>
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
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th>Quantidade</th>
                        <th>Valor</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                    <?php
                    if (count($resultProdutos) > 0) :
                        for ($i = 0; $i < count($resultProdutos); $i++) :
                            $exibCategoria = $manager->getInfo('user_categoria', 'id_categoria', $resultProdutos[$i]['id_categoria']);
                            for ($jk = 0; $jk < count($exibCategoria); $jk++) :
                    ?>
                                <tr>
                                    <!-- DADOS PARA MODIFICAR -->
                                    <td><?= $resultProdutos[$i]['id_produto'] ?></td>
                                    <td id="table-name"><?= $resultProdutos[$i]['nome_produto'] ?></td>
                                    <td><?= $exibCategoria[$jk]['nome_categoria'] ?></td>
                                    <td><?= $resultProdutos[$i]['quantidade_produto'] ?></td>
                                    <td>R$<?= $resultProdutos[$i]['preco_produto'] ?></td>
                                    <td><?= $resultProdutos[$i]['status'] === 1 ? 'Disponível' : 'Indisponível' ?></td>
                                    <td id="btn-actions">
                                        <button id="delete-prod" onclick="window.location.href='../controller/ControllerProdutoADM.php?id=<?= $resultProdutos[$i]['id_produto'] ?>&action=deleteProdutoADM'">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                        <button id="edit-prod" onclick="window.location.href='./CRUDEditProduto.php?id=<?= $resultProdutos[$i]['id_produto'] ?>&action=editProdutoADM'">
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
<script src="../assets/js/listProdutos.js"></script>
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