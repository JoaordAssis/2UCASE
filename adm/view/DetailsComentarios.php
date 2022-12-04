<?php
session_start();
require_once "../model/Manager.class.php";
$manager = new Manager();
$idComentario = $_REQUEST['id'];

$resultDetailComentario = $manager->getInfo('user_avaliacao', 'id_avaliacao', $idComentario);
$resultDetailCliente = $manager->getInfo('user_cliente', 'id_cliente', $resultDetailComentario[0]['id_cliente']);
$resultDetailProduto = $manager->getInfo('user_produto', 'id_produto', $resultDetailComentario[0]['id_produto']);


$resultDetailCategoria = $manager->getInfo('user_categoria', 'id_categoria', $resultDetailProduto[0]['id_categoria']);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once "../config/config.php"; ?>
    <link rel="stylesheet" href="../assets/css/detailsComentarios.css">
</head>

<?php require_once "./navbar.php"; ?>

<body id="body-margin">
    <main class="container-produto">
        <h1>Comentário</h1>

        <!-- Exibir informações do cliente -->

        <article class="info-cliente container-comment">
            <h2>Cliente</h2>

            <div class="row-nome-email rows-comentarios">
                <label class="full-width">Nome do cliente
                    <h3><?= $resultDetailCliente[0]['nome_cliente'] ?></h3>
                </label>
            </div>

            <div class="row-nome-email rows-comentarios">
                <label class="full-width">Email cliente
                    <h3><?= $resultDetailCliente[0]['email_cliente'] ?></h3>
                </label>
            </div>

            <div class="row-phone-birth rows-comentarios">
                <label>Telefone cliente
                    <h3><?= $resultDetailCliente[0]['telefone_cliente'] ?></h3>
                </label>

                <label>Data de Nascimento
                    <h3><?= $resultDetailCliente[0]['data_nasc_cliente'] ?></h3>
                </label>
            </div>


        </article>


        <!-- Exibir comentário -->
        <article class="info-comentario container-comment">
            <h2>Comentário</h2>

            <div class="row-titulo-stars rows-comentarios">
                <label class="full-width">Título
                    <h3><?= $resultDetailComentario[0]['titulo_avaliacao'] ?></h3>
                </label>
            </div>


            <div class="row-titulo-stars rows-comentarios">
                <label>Data do comentário
                    <h3><?= $resultDetailComentario[0]['data_avaliacao'] ?></h3>
                </label>

                <label>Avaliação
                    <h3><?= $resultDetailComentario[0]['nota_avaliacao'] ?>  Estrelas</h3>
                </label>
            </div>


            <label class="full-width">Comentário
                <h3><?= $resultDetailComentario[0]['descricao'] ?></h3>
            </label>


        </article>


        <!-- Exibir Produto -->
        <article class="info-comentario container-comment">
            <h2>Produto</h2>

            <div class="row-titulo-stars rows-comentarios">
                <label class="full-width">Nome do Produto
                    <h3><?= $resultDetailProduto[0]['nome_produto'] ?></h3>
                </label>
            </div>

            <div class="row-titulo-stars rows-comentarios">
                <label>Categoria
                    <h3><?= $resultDetailCategoria[0]['nome_categoria'] ?></h3>
                </label>

                <label>Preço do Produto
                    <h3>R$ <?= $resultDetailProduto[0]['preco_produto'] ?></h3>
                </label>
            </div>


            <label class="full-width">Descrição do Produto
                <h3><?= $resultDetailProduto[0]['descricao_produto'] ?></h3>
            </label>


        </article>

        <button id="btn-exit" onclick="window.location.href='./ListComentarios.php'">Voltar</button>

    </main>
</body>
<script src="../assets/js/navbarFix.js"></script>

<?php
if (isset($_POST['msg'])) {
    require_once './msg.php';
    $msg = $_POST["msg"];
    if (!empty($MSG)) {
        $msgExibir = $MSG[$msg];
    }
    echo "<script>alert('" . $msgExibir . "');</script>";
}


?>

</html>