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
                    <h3>36</h3>
                </div>
            </div>

            <div class="metrica-box metrica2">
                <h4>Usuários nas últimas 24 horas</h4>
                <div class="container-number">
                    <h3>36</h3>
                </div>
            </div>

            <div class="metrica-box metrica3">
                <h4>Usuários nas últimas 24 horas</h4>
                <div class="container-number">
                    <h3>36</h3>
                </div>
            </div>
        </section>

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

            <!-- TABELAS -->
            <section class="container-tabela">
                <table class="table-clientes">
                    <tr>
                        <th>#</th>
                        <th>Email</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>DataNasc</th>
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