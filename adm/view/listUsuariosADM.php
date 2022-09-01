<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once "../config/config.php"; ?>
    <link rel="stylesheet" href="../assets/css/usuarios.css">
</head>

<?php require_once "./navbar.php"; ?>

<body id="body-margin">
    <main class="container-produto">
        <h1>Usuários Administrativos</h1>
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
                    Novo Usuário
                </button>
            </section>


            <!-- TABELAS -->
            <section class="container-tabela">
                <table class="table-clientes">
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Poder</th>
                        <th>Data de Criação</th>
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