<?php
session_start();

if(empty($_SESSION['USER-ID'])){
    header("Location: ./login.php?error-code=OA00");
    exit();
}

if(empty($_REQUEST['pd'])){
    header("Location: ./meus-pedidos.php?error-code=FR34");
    exit();
}

if(empty($_REQUEST['cart'])){
    header("Location: ./meus-pedidos.php?error-code=FR34");
    exit();
}

require_once __DIR__ . '/../../vendor/autoload.php';
use app\model\Manager;
$manager = new Manager();
$idProduto = $_REQUEST['pd'];
$idCarrinho = $_REQUEST['cart'];


$getProduto = $manager->getInfo('user_produto', 'id_produto', $idProduto);
$params = ['id_produto', 'id_carrinho'];
$paramsPost = [$idProduto, $idCarrinho];
$getCarrinho = $manager->selectWhere($params, $paramsPost, 'produto_carrinho');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once '../config/StylesConfig.php'; ?>
    <link rel="stylesheet" href="../assets/styles/avaliacao.css">
</head>

<?php require_once "./navbar.php"; ?>

<body id="body-margin">
    <main class="container-new-produto">
        <h1>Avaliar Produto</h1>

        <section class="prod-carrinho">
            <div class="produto-info">
                <img src="<?=$getProduto[0]['imagem_principal_produto']?>" alt="<?=$getProduto[0]['nome_produto']?>">
                <div class="titles-column">
                    <h4><?=$getProduto[0]['nome_produto']?></h4>
                    <p id="p-opaco"><?=$getCarrinho[0]['marca_celular']?></p>
                </div>

                <div class="quantidade">
                    <p id="p-opaco">QUANTIDADE</p>
                    <p><?=$getCarrinho[0]['quant_carrinho']?></p>
                </div>

                <div class="valor">
                    <p id="p-opaco">VALOR</p>
                    <P>R$ <?=$getProduto[0]['preco_produto']?></P>
                </div>
            </div>
        </section>
        <form action="../controllers/ControllerAddAvaliacao.php" method="POST" class="form-add-menu">

        <section class="avaliar-container">
            <p>Clique para dar sua nota</p>

            <div class="estrelas">
                <input type="radio" id="vazio" name="estrela" value="" checked>

                <label for="estrela_um"><i class="fa"></i></label>
                <input type="radio" id="estrela_um" name="estrela" value="1">

                <label for="estrela_dois"><i class="fa"></i></label>
                <input type="radio" id="estrela_dois" name="estrela" value="2">

                <label for="estrela_tres"><i class="fa"></i></label>
                <input type="radio" id="estrela_tres" name="estrela" value="3">

                <label for="estrela_quatro"><i class="fa"></i></label>
                <input type="radio" id="estrela_quatro" name="estrela" value="4">

                <label for="estrela_cinco"><i class="fa"></i></label>
                <input type="radio" id="estrela_cinco" name="estrela" value="5">

            </div>
        </section>


            <input type="text" required name="titulo_avaliacao" id="input_nome_menu" placeholder="Titulo">
            <input type="hidden" name="pd" value="<?=$getProduto[0]['id_produto']?>">


            <textarea required placeholder="Mensagem" name="avaliacao-txt"></textarea>

            <input type="submit" value="Adicionar" id="adcionar_menu">

        </form>

        <button id="btn-exit" onclick="window.location.href='./meus-pedidos.php'">Voltar</button>

</main>
</body>

</html>

