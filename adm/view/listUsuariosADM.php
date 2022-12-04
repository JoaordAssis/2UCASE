<?php
session_start();
require_once "../model/Manager.class.php";
$manager = new Manager();

$resultListUsuarios = $manager->listClient('adm_administrador', 'id_adm');

if (isset($_GET['searchBarUsuarios']) && $_GET['searchBarUsuarios'] != '') {
    $columns = ['nome_adm ', 'email_adm ', 'poder_adm ', 'status '];
    $resultSearchUsuario = $manager->selectLike('adm_administrador', $columns, $_GET['searchBarUsuarios']);
    $resultListUsuarios = $resultSearchUsuario;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once "../config/config.php"; ?>
    <link rel="stylesheet" href="../assets/css/usuariosADM.css">
</head>

<?php require_once "./navbar.php"; ?>

<body id="body-margin">
    <main class="container-produto">
        <h1>Usuários Administrativos</h1>
        <!-- BARRA DE PESQUISA -->
        <article class="container-pesquisa">
            <form action="../controller/ControllerUsuariosADM.php" method="POST">
                <div class="input-pesquisa">
                    <input type="text" name="searchBarUsuarios" placeholder="Pesquisar" id="pesquisar-input">
                    <input type="submit" value="">
                </div>
            </form>
        </article>

        <section class="container-tabela-filter">

            <!-- FILTROS -->
            <section class="container-filters">
                <button id="btn-new-produto" onclick="window.location.href='./CRUDAddUsuario.php'">
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
                    <?php
                    if (count($resultListUsuarios) > 0) :
                        for ($i = 0; $i < count($resultListUsuarios); $i++) :

                            $timestamp = strtotime($resultListUsuarios[$i]["data_reg_adm"]);
                            $newDate = date("d-m-Y H:i:s", $timestamp);
                            $dateExib = str_replace('-', '/', $newDate)
                    ?>

                            <tr>
                                <!-- DADOS PARA MODIFICAR -->
                                <td><?= $resultListUsuarios[$i]['id_adm'] ?></td>
                                <td><?= $resultListUsuarios[$i]['nome_adm'] ?></td>
                                <td><?= $resultListUsuarios[$i]['email_adm'] ?></td>
                                <td><?= $resultListUsuarios[$i]['poder_adm'] ?></td>
                                <td><?= $dateExib ?></td>
                                <td><?= $resultListUsuarios[$i]['status'] == 1 ? "Ativo" : "Inativo" ?></td>
                                <td id="btn-actions">
                                    <button id="delete-prod" onclick="window.location.href='../controller/ControllerUsuariosADM.php?id=<?= $resultListUsuarios[$i]['id_adm'] ?>&action=deleteUserADM'">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                    <button id="edit-prod" onclick="window.location.href='./CRUDEditUsuarioADM.php?id=<?= $resultListUsuarios[$i]['id_adm'] ?>'">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </button>
                                </td>
                            </tr>
                    <?php
                        endfor;
                    else :
                        echo "<td style='margin-top: 20px;' colspan=7>Dados não encontrados!</td>";
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