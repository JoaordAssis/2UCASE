<?php
session_start();

if (empty($_SESSION['USER-ID'])){
    //Não está logado
    header("Location: ./login.php?error-code=OA00");
    exit();
}

if (isset($_REQUEST['error-code']) && $_REQUEST['error-code']  === 'FR41'){
    header("Location: ./carrinho.php?error-code=FR41");
    exit();
}

if (empty($_REQUEST['id_endereco']) || empty($_REQUEST['id_carrinho'])){
    //Não recebeu o ID
    header("Location: ./show-enderecos.php?error-code=FR41");
    exit();
}


require_once __DIR__ . "/../../vendor/autoload.php";
use app\model\Manager;
$manager = new Manager();
$value = filter_input(INPUT_GET, 'value');

$returnEndereco = $manager->getInfo('user_endereco_cliente', 'id_endereco', $_REQUEST['id_endereco']);

$cepCliente = $returnEndereco[0]['cep_cliente'];
$searchFilter = [" ", "-"];
$filterCep = str_replace($searchFilter, "", $cepCliente);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once __DIR__ . "/../config/stylesConfig.php"  ?>
    <link rel="stylesheet" href="../assets/styles/frete-endereco.css">
    <title>Frete</title>
</head>
<!-- Barra de Navegação -->
<?php require_once './navbar.php'; ?>
<body id="body-margin" onload="freteCalc(<?=$filterCep?>)">
<main class="container-new-produto">
    <h1>Escolha o frete</h1>

    <form class="form-frete-select" method="POST" action="./pagamento.php?action=frete-endereco">
        <div class="column-frete">
            <h3>Sedex</h3>
            <label class="label-frete" for="frete">
                <input type="radio" name="frete" id="sedex-cod" value="">
                <p id="sedex-value"></p>
                <p id="sedex-prazo"></p>
            </label>
        </div>

        <input type="hidden" name="id_endereco" value="<?=$_REQUEST['id_endereco']?>">
        <input type="hidden" name="id_carrinho" value="<?=$_REQUEST['id_carrinho']?>">
        <input type="hidden" name="value-frete" value="<?=$value?>" id="value-frete-input">

        <div class="column-frete">
            <h3>PAC</h3>
            <label class="label-frete" for="frete">
                <input type="radio" name="frete" id="pac-cod" value="">
                <p id="pac-value"></p>
                <p id="pac-prazo"></p>
            </label>
        </div>

        <button type="submit" id="principal-button">
            Selecionar o frete
        </button>
    </form>
</main>
<script defer src="../assets/js/frete-endereco.js"></script>
</body>
</html>
