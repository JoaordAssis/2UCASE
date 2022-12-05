<?php
session_start();

require_once __DIR__ . "/../../vendor/autoload.php";
use app\model\Manager;

if (empty($_GET['category'])){
    //Criar uma pagina para isso
    header("Location: ./homepage.php");
    exit();
}

$manager = new Manager();
$category = filter_input(INPUT_GET,'category');
$searchQuery = filter_input(INPUT_GET,'search');
$columnSearch = ['nome_produto ', 'categoria_special_produto '];

$listCategory = $manager->listClient('user_categoria', 'id_categoria');



//Select Like
if (!empty($_REQUEST['search']) && $_REQUEST['category'] === 'todos'){
    $returnCategory = strtoupper($searchQuery);
    $returnProdutos = $manager->selectLike('user_produto', $columnSearch, $searchQuery);

} else if($_REQUEST['category'] === 'Nenhum'){
    $returnProdutos = [];
    $returnCategory = strtoupper($searchQuery);
}else{
    header("Location: ./homepage.php");
    exit();
}


//Select por relevancia e preço

if (!empty($_GET['selectOrdem'])) {

    if ($_GET['selectOrdem'] === '1') {
        // Maior para menor preço
        $resultSearchOrdem = $manager->selectSearchOrder('user_produto', $columnSearch, $searchQuery, 'preco_produto', 'DESC');
        $returnProdutos = $resultSearchOrdem;
    }

    if ($_GET['selectOrdem'] === '2') {
        // Menor para maior preço
        $resultSearchOrdem = $manager->selectSearchOrder('user_produto', $columnSearch, $searchQuery, 'preco_produto', 'ASC');
        $returnProdutos = $resultSearchOrdem;
    }

    if ($_GET['selectOrdem'] === '3') {
        // Relevancia
        $resultSearchOrdem = $manager->selectSearchOrder('user_produto', $columnSearch, $searchQuery, 'quantidade_produto', 'DESC');
        $returnProdutos = $resultSearchOrdem;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once __DIR__ . "/../config/stylesConfig.php"  ?>
    <link rel="stylesheet" href="../assets/styles/search.css">
</head>
<!-- Barra de Navegação -->
<?php require_once './navbar.php'; ?>

<body id="body-margin">
<main class="category-container">
    <div class="image-container">
        <?php
        if (is_array($returnCategory)):
            ?>
            <img src="<?=$returnCategory[0]['img_categoria']?>" alt="<?=$returnCategory[0]['nome_categoria']?>" id="image-category">
        <?php
        endif;
        ?>
    </div>

    <article class="filters-category">
        <section class="filtros-path">
            <div class="title-filtros">
                <h2><?=strtoupper($_REQUEST['category'])?></h2>
                <p>HOME /
                    <span id="last-path">
                            <?php
                            if ($_REQUEST['search'] === 'invalid'):
                                echo "";
                            else:
                                ?>
                                <?=is_array($returnCategory) ? $returnCategory[0]['nome_categoria'] : $returnCategory?>
                            <?php
                            endif;
                            ?>
                        </span>
                </p>
            </div>

            <div class="filters-container row-product-container">
                    <div class="pergunta">
                        <button class="accordion">Categorias<img width="40" height="40" src="../assets/./svg/./arrow.svg" alt="icone de dropdown"></button>
                        <form class="panel" action="../controllers/ControllerCategoria.php?change-category" method="post" id="form-change-category">
                            <?php
                            if (count($listCategory) > 0):
                                for ($i = 0, $iMax = count($listCategory); $i < $iMax; $i++):
                                    if ($listCategory[$i]['nome_categoria'] === $_REQUEST['category']):
                                        ?>
                                        <label class="container"><?=$listCategory[$i]['nome_categoria']?>
                                            <input type="radio" value="<?=$listCategory[$i]['nome_categoria']?>" checked="checked" name="category">
                                            <span class="checkmark"></span>
                                        </label>
                                    <?php
                                    else:
                                        ?>
                                        <label class="container"><?=$listCategory[$i]['nome_categoria']?>
                                            <input type="radio" value="<?=$listCategory[$i]['nome_categoria']?>" name="category">
                                            <span class="checkmark"></span>
                                        </label>

                                    <?php
                                    endif;
                                endfor;
                            endif;
                            ?>
                        </form>
                    </div>
                </div>
        </section>


        <section class="row-product-container" id="resize-container">
            <div class="order-option">
                <h4>Ordenar Por: </h4>
                <select id="order-select" oninput="redirectOrdem('<?=$_REQUEST['search']?>')" name="select-ordem">
                    <option>Todos</option>
                    <option value="1">Maior Preço</option>
                    <option value="2">Menor Preço</option>
                    <option value="3">Mais Relevante</option>
                </select>
            </div>
            <?php
            if ($_REQUEST['search'] !== 'invalid' && count($returnProdutos) > 0):
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
            else:
                ?>
                <div class="product-container">
                    <h1>Nenhum produto foi encontrado!</h1>
                </div>
            <?php
            endif;
            ?>
        </section>
    </article>
</main>

<script src="../assets/./js/search.js"></script>
</body>
<!-- Footer -->
<?php require_once './footer.php'; ?>

</html>