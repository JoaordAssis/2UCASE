<?php
session_start();

require_once __DIR__ . "/../../vendor/autoload.php";
use app\model\Manager;

if (empty($_GET['category'])){
    //Criar uma pagina para isso
    header("Location: ./homepage.php");
}
$manager = new Manager();
$category = filter_input(INPUT_GET, 'category');
$returnCategory = $manager->selectWhere(['nome_categoria'], [$category], 'user_categoria');

$returnProdutos = $manager->selectWhere(['id_categoria', 'status'], [$returnCategory[0]['id_categoria'], 1], 'user_produto');


//Select por relevancia e preço

if (!empty($_GET['selectOrdem'])) {

    if ($_GET['selectOrdem'] === '1') {
        // Maior para menor preço
        $resultSearchOrdem = $manager->selectCategoriaOrder('user_produto', 'preco_produto', 'DESC', 'id_categoria', $returnCategory[0]['id_categoria']);
        $returnProdutos = $resultSearchOrdem;
    }

    if ($_GET['selectOrdem'] === '2') {
        // Menor para Maior preço
        $resultSearchOrdem = $manager->selectCategoriaOrder('user_produto', 'preco_produto', 'ASC', 'id_categoria', $returnCategory[0]['id_categoria']);
        $returnProdutos = $resultSearchOrdem;
    }

    if ($_GET['selectOrdem'] === '3') {
        // Relevancia
        $resultSearchOrdem = $manager->selectCategoriaOrder('user_produto', 'quantidade_produto', 'DESC', 'id_categoria', $returnCategory[0]['id_categoria']);
        $returnProdutos = $resultSearchOrdem;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once __DIR__ . "/../config/stylesConfig.php"  ?>
    <link rel="stylesheet" href="../assets/styles/category.css">
</head>
<!-- Barra de Navegação -->
<?php require_once './navbar.php'; ?>

<body id="body-margin">
<main class="category-container">
    <div class="image-container">
        <img src="<?=$returnCategory[0]['img_categoria']?>" alt="<?=$returnCategory[0]['nome_categoria']?>" id="image-category">
    </div>

    <article class="filters-category">
        <section class="filtros-path">
            <div class="title-filtros">
                <h2>Time</h2>
                <p>HOME / CAPINHAS /<span id="last-path"><?=strtoupper($returnCategory[0]['nome_categoria'])?></span></p>
            </div>

            <div class="filters-container row-product-container">

                <div class="pergunta">
                    <button class="accordion">Pergunta muito requisitada<img width="40" height="40" src="../assets/./svg/./arrow.svg" alt="icone de dropdown"></button>
                    <div class="panel">
                        <div class="checkbox">
                            <label for="time">
                                <input type="checkbox" name="time" id="input-checkbox">
                                Times
                            </label>
                        </div>
                    </div>
                </div>

                <div class="pergunta">
                    <button class="accordion">Pergunta muito requisitada<img width="40" height="40" src="../assets/./svg/./arrow.svg" alt="icone de dropdown"></button>
                    <div class="panel">
                        <div class="checkbox">
                            <label for="time">
                                <input type="checkbox" name="time" id="input-checkbox">
                                Times
                            </label>
                        </div>
                    </div>
                </div>

                <div class="pergunta">
                    <button class="accordion">
                        Pergunta muito requisitada
                        <img width="40" height="40" src="../assets/./svg/./arrow.svg" alt="icone de dropdown">
                    </button>
                    <div class="panel">
                        <div class="checkbox">
                            <label for="time">
                                <input type="checkbox" name="time" id="input-checkbox">
                                Times
                            </label>
                        </div>
                    </div>
                </div>

        </section>


        <section class="row-product-container" id="resize-container">
            <div class="order-option">
                <h4>Ordenar Por: </h4>
                <select id="order-select" oninput="redirectOrdem('<?=$_GET['category']?>')" name="select-ordem">
                    <option>Todos</option>
                    <option value="1">Maior Preço</option>
                    <option value="2">Menor Preço</option>
                    <option value="3">Mais Relevante</option>
                </select>
            </div>
            <?php
            if (count($returnProdutos) > 0):
                ?>

                <div class="product-container">
                    <?php for ($i = 0, $iMax = count($returnProdutos); $i < $iMax; $i++) : ?>

                        <a class="produto-box glide__slide" href="./produto.php?pd=<?=$returnProdutos[$i]['id_produto']?>">
                            <img src="<?=$returnProdutos[$i]['imagem_principal_produto']?>" alt="Capinha Flamengo">
                            <h4><?=$returnProdutos[$i]['nome_produto']?></h4>
                            <p>R$ <?=$returnProdutos[$i]['preco_produto']?></p>
                        </a>

                    <?php endfor; ?>
                </div>

            <?php
            endif;
            ?>
        </section>
    </article>
</main>

<script src="../assets/./js/category.js"></script>
</body>
<!-- Footer -->
<?php require_once './footer.php'; ?>

</html>