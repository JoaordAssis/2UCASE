<?php
require_once "../model/Manager.class.php";
$manager = new Manager();

$exibCategoriaFilters = $manager->listClient('user_categoria', 'id_categoria');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once '../config/config.php'; ?>
    <link rel="stylesheet" href="../assets/css/AddProduto.css">
</head>

<?php require_once "./navbar.php"; ?>

<body id="body-margin">
    <main class="container-new-produto">
        <h1>Adicionar novo Produto</h1>
        <form action="#" method="POST" class="form-add-produto" enctype="multipart/form-data">
            <label for="nome_prod">
                <input type="text" name="nome_prod" id="input-nome" placeholder="Nome do Produto">
            </label>

            <div class="row-preco-quant row-inputs">
                <label for="preco_prod">
                    <input type="text" data-js="money" name="preco_prod" id="input-preco" placeholder="Preço do Produto">
                </label>

                <label for="quant_prod">
                    <input type="number" name="quant_prod" id="input-quant" placeholder="Quantidade">
                </label>
            </div>

            <div class="row-garantia-status row-inputs">
                <select name="garantia_prod" id="select-garantia">
                    <option selected>Escolha a garantia</option>
                    <option>7 Dias</option>
                    <option>1 Mês</option>
                    <option>3 Mêses</option>
                    <option>6 Mêses</option>
                    <option>1 Ano</option>
                </select>

                <select name="status_prod" id="select-status">
                    <option value="incorrect" selected>Status</option>
                    <option value="1">Disponível</option>
                    <option value="0">Indisponível</option>
                </select>
            </div>

            <select name="categoria_prod" id="select-categoria">
                <option value="1" selected>Categoria</option>
                <?php
                if (count($exibCategoriaFilters) > 0) :
                    for ($i = 0; $i < count($exibCategoriaFilters); $i++) :
                ?>
                        <option value="<?= $exibCategoriaFilters[$i]['id_categoria'] ?>">
                            <?= $exibCategoriaFilters[$i]['nome_categoria'] ?>
                        </option>
                <?php
                    endfor;
                endif;
                ?>
            </select>

            <h3>Marcas</h3>

            <article class="row-marca">
                <label for="marca_samsung">
                    <input type="checkbox" name="marca_samsung" id="checkbox-samsung">
                    Samsung
                </label>
                <label for="marca_apple">
                    <input type="checkbox" name="marca_apple" id="checkbox-apple">
                    Apple
                </label>

                <label for="marca_xiaomi">
                    <input type="checkbox" name="marca_xiaomi" id="checkbox-xiaomi">
                    Xiaomi
                </label>
            </article>

            <label for="descricao_prod">Descrição
                <textarea name="descricao_prod" id="textarea-desc" cols="30" rows="10">

                </textarea>
            </label>

            <h3>Imagens</h3>
            <label for="img_principal">Imagem Principal
                <input type="file" name="img_principal" id="input-img">
            </label>

            <label for="img_principal">Outras Imagens
                <input type="file" name="imgProduto" multiple="multiple" onchange="newInput(this)" id="input-img-multiple">
                <button style="width: 50%; padding: 1rem !important;" onclick="removeAllImages()" id="btn-remove-file">Remover todas as imagens</button>
            </label>
            <ul id="dp-files"></ul>

            <input type="submit" value="Adicionar">
        </form>
        <button id="btn-exit" onclick="window.location.href='./listProdutos.php'">Voltar</button>
    </main>
</body>
<script src="../assets/js/addProduto.js"></script>

</html>