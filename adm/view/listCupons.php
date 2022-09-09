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
                <button id="btn-new-produto">
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
<?php
if (isset($_POST['msg'])) {
    require_once './msg.php';
    $msg = $_POST["msg"];
    $msgExibir = $MSG[$msg];
    echo "<script>alert('" . $msgExibir . "');</script>";
}


?>

</html>