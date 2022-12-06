<?php
session_start();

if (empty($_SESSION['USER-ID'])){
    //Não está logado
    header("Location: ./carrinho.php?error-code=OA00");
    exit();
}

if (isset($_REQUEST['error-code']) && $_REQUEST['error-code']  === 'FR41'){
    header("Location: ./carrinho.php?error-code=FR41");
    exit();
}

if (empty($_REQUEST['carrinho'])){
    //Não enviou o ID do carrinho
    header("Location: ./carrinho.php?error-code=FR00");
    exit();
}

$value = filter_input(INPUT_GET, 'value');
$idCarrinho = $_REQUEST['carrinho'];

require_once __DIR__ . "/../../vendor/autoload.php";
use app\model\Manager;

$manager = new Manager();

$returnEnderecos = $manager->getInfo('user_endereco_cliente', 'id_cliente', $_SESSION['USER-ID']);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once __DIR__ . "/../config/stylesConfig.php"  ?>
    <link rel="stylesheet" href="../assets/styles/my-info.css">
    <title>Meus Endereços - 2UCASE</title>
</head>
<!-- Barra de Navegação -->
<?php require_once './navbar.php'; ?>

<body id="body-margin">
<main class="container-new-produto">
    <article class="container-enderecos">
        <h1>Meus Endereços</h1>
        <form method="POST" action="./frete-endereco.php" class="form-select-endereco">
            <input type="hidden" name="id_carrinho" value="<?=$idCarrinho?>">
            <section class="debugger-container">
                <?php
                //INICIO FOR
                if (count($returnEnderecos) > 0):
                    for ($i = 0, $iMax = count($returnEnderecos); $i < $iMax; $i++):
                        ?>

                        <div class="flex-enderecos">
                            <div class="box-endereco">
                                <div class="row-log-numero row-endereco">
                                    <p>Endereço <?=$i+1?></p>
                                    <input type="radio" name="id_endereco" value="<?=$returnEnderecos[$i]['id_endereco']?>">
                                </div>

                                <div class="row-log-numero row-endereco">
                                    <p><?=$returnEnderecos[$i]['logradouro_cliente']?></p>
                                    <p><?=$returnEnderecos[$i]['numero_cliente']?></p>
                                </div>

                                <div class="row-bairro-cep row-endereco">
                                    <p><?=$returnEnderecos[$i]['bairro_cliente']?></p>
                                    <p><?=$returnEnderecos[$i]['cep_cliente']?></p>
                                </div>

                                <div class="row-cidade-uf row-endereco">
                                    <p><?=$returnEnderecos[$i]['cidade_cliente']?></p>
                                    <p><?=$returnEnderecos[$i]['uf_cliente']?></p>
                                </div>

                            </div>
                        </div>
                    <?php
                        //ENDFOR
                    endfor;
                endif;
                ?>
            </section>
            <button type="submit" id="btn-add-endereco" class="btn-form-address">
                Continuar com o selecionado
            </button>
        </form>



        <button id="btn-add-endereco" onclick='window.location.href="./entrega.php?carrinho=<?=$idCarrinho?>&value=<?=$value?>"'>Adicionar outro Endereco</button>

        <button id="btn-exit" onclick="window.location.href='./carrinho.php'">Voltar</button>
    </article>
</main>
</body>
</html>