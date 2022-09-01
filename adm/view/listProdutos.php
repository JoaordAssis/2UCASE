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
            <form action="#" method="POST">
                <div class="input-pesquisa">
                    <input type="text" placeholder="Pesquisar" id="pesquisar-input">
                    <input type="submit" value="">
                </div>
            </form>
        </article>

        <section class="container-tabela-filter">

            <!-- FILTROS -->
            <section class="container-filters">
                <button id="btn-new-produto">
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
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th>Quantidade</th>
                        <th>Valor</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                    <tr>
                        <!-- DADOS PARA MODIFICAR -->
                        <td>1</td>
                        <td> Sophiazinha</td>
                        <td>sophia.perfeitaa@gmail.com</td>
                        <td> 111.222.333-4 </td>
                        <td>23/08/0001</td>
                        <td>SOLTEIRA</td>
                        <td id="btn-actions">
                            <button id="delete-prod"><i class="fa-solid fa-trash-can"></i></button>
                            <button id="edit-prod"><i class="fa-regular fa-pen-to-square"></i></i></button>
                        </td>
                    </tr>
                </table>
            </section>
        </section>
    </main>
</body>

</html>