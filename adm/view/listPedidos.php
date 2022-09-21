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
                        <th>CPF Cliente</th>
                        <th>Quantidade de Produtos</th>
                        <th>Valor Total</th>
                        <th>Data</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                    <tr>
                        <!-- DADOS PARA MODIFICAR -->
                        <td>1</td>
                        <td>49471488885</td>
                        <td>1</td>
                        <td>R$ 25,69</td>
                        <td>24/08/1285</td>
                        <td>Aprovada</td>
                        <td id="btn-actions">
                            <button id="search-client"><i class="fa-solid fa-magnifying-glass"></i></i></i></button>
                        </td>
                    </tr>
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