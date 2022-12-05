<?php
session_start();

require_once __DIR__ . "/../../vendor/autoload.php";
use app\model\Manager;

if (empty($_GET['category']) && $_GET['category'] !== 'Acessorios'){
    //Criar uma pagina para isso
    header("Location: ./homepage.php");
}
$manager = new Manager();
$returnCategoryAcessorios = $manager->selectWhere(['nome_categoria'], ['Acessorios'], 'user_categoria');

$returnCategoryPop = $manager->selectWhere(['nome_categoria'], ['Pop-Sockets'], 'user_categoria');
$returnCategoryPods = $manager->selectWhere(['nome_categoria'], ['Airpods'], 'user_categoria');

$returnProdutos = $manager->selectWhereAcessorios('id_categoria', $returnCategoryPop[0]['id_categoria'], $returnCategoryPods[0]['id_categoria']);

$listCategory = $manager->listClient('user_categoria', 'id_categoria');

//Select por relevancia e preço

if (!empty($_GET['selectOrdem'])) {

    if ($_GET['selectOrdem'] === '1') {
        // Maior para menor preço
        $resultSearchOrdem = $manager->selectCategoriaOrderAcessorios('user_produto', 'preco_produto',
            'DESC', 'id_categoria', $returnCategoryPop[0]['id_categoria'], $returnCategoryPods[0]['id_categoria']);

        $returnProdutos = $resultSearchOrdem;
    }

    if ($_GET['selectOrdem'] === '2') {
        // Menor para Maior preço
        $resultSearchOrdem = $manager->selectCategoriaOrderAcessorios('user_produto', 'preco_produto',
            'ASC', 'id_categoria', $returnCategoryPop[0]['id_categoria'], $returnCategoryPods[0]['id_categoria']);

        $returnProdutos = $resultSearchOrdem;
    }

    if ($_GET['selectOrdem'] === '3') {
        // Relevancia
        $resultSearchOrdem = $manager->selectCategoriaOrderAcessorios('user_produto', 'quantidade_produto',
            'DESC', 'id_categoria', $returnCategoryPop[0]['id_categoria'], $returnCategoryPods[0]['id_categoria']);

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
        <picture>
            <source media="(max-width:470px)" srcset="../assets/img/Banner-Mobile-<?=$returnCategoryAcessorios[0]['nome_categoria']?>.png">
            <img src="<?=$returnCategoryAcessorios[0]['img_categoria']?>" alt="<?=$returnCategoryAcessorios[0]['nome_categoria']?>" id="image-category">
        </picture>
    </div>

    <article class="filters-category">
        <section class="filtros-path">
            <div class="title-filtros">
                <h2><?=strtoupper($returnCategoryAcessorios[0]['nome_categoria'])?></h2>
                <p>HOME / <span id="last-path"><?=strtoupper($returnCategoryAcessorios[0]['nome_categoria'])?></span></p>
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

<script src="../assets/./js/acessorios-page.js"></script>
</body>
<!-- Footer -->
<?php require_once './footer.php'; ?>

</html>