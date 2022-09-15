<?php
require_once "../model/Manager.class.php";
$manager = new Manager();
$idProduto = $_REQUEST['id'];

$exibCategoriaFilters = $manager->listClient('user_categoria', 'id_categoria');
$exibModeloFilters = $manager->listClient('user_mod_celular', 'id_modelo_celular');
$exibProduto = $manager->getInfo('user_produto', 'id_produto', $idProduto);

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
        <h1>Editar Produto</h1>
        <form action="../controller/ControllerAddProdutoADM.php" method="POST" class="form-add-produto" enctype="multipart/form-data">

            <input type="hidden" name="editProdutoADM">

            <label for="nome_produto">
                <input type="text" name="nome_produto" value="<?= $exibProduto[0]['nome_produto'] ?>" id="input-nome" placeholder="Nome do Produto">
            </label>

            <div class="row-preco-quant row-inputs">
                <label for="preco_produto">
                    <input type="text" data-js="money" value="<?= $exibProduto[0]['preco_produto'] ?>" name="preco_produto" id="input-preco" placeholder="Preço do Produto">
                </label>

                <label for="quantidade_produto">
                    <input type="number" name="quantidade_produto" value="<?= $exibProduto[0]['quantidade_produto'] ?>" min="0" id="input-quant" placeholder="Quantidade">
                </label>
            </div>

            <div class="row-garantia-status row-inputs">
                <select name="garantias_produto" id="select-garantia">

                    <?php
                    if ($exibProduto[0]['garantias_produto'] === '7 Dias') {
                    ?>
                        <option>Escolha a garantia</option>
                        <option selected>7 Dias</option>
                        <option>1 Mês</option>
                        <option>3 Mêses</option>
                        <option>6 Mêses</option>
                        <option>1 Ano</option>
                    <?php
                    }
                    ?>

                    <?php
                    if ($exibProduto[0]['garantias_produto'] === '1 Mês') {
                    ?>
                        <option>Escolha a garantia</option>
                        <option>7 Dias</option>
                        <option selected>1 Mês</option>
                        <option>3 Mêses</option>
                        <option>6 Mêses</option>
                        <option>1 Ano</option>
                    <?php
                    }
                    ?>

                    <?php
                    if ($exibProduto[0]['garantias_produto'] === '3 Mêses') {
                    ?>
                        <option>Escolha a garantia</option>
                        <option>7 Dias</option>
                        <option>1 Mês</option>
                        <option selected>3 Mêses</option>
                        <option>6 Mêses</option>
                        <option>1 Ano</option>
                    <?php
                    }
                    ?>

                    <?php
                    if ($exibProduto[0]['garantias_produto'] === '6 Mesês') {
                    ?>
                        <option>Escolha a garantia</option>
                        <option>7 Dias</option>
                        <option>1 Mês</option>
                        <option>3 Mêses</option>
                        <option selected>6 Mêses</option>
                        <option>1 Ano</option>
                    <?php
                    }
                    ?>

                    <?php
                    if ($exibProduto[0]['garantias_produto'] === '1 Ano') {
                    ?>
                        <option>Escolha a garantia</option>
                        <option>7 Dias</option>
                        <option>1 Mês</option>
                        <option>3 Mêses</option>
                        <option>6 Mêses</option>
                        <option selected>1 Ano</option>
                    <?php
                    }
                    ?>
                </select>

                <select name="status" id="select-status">
                    <?php
                    if ($exibProduto[0]['status'] === 1) {
                    ?>
                        <option value="1" selected>Disponível</option>
                        <option value="0">Indisponível</option>
                    <?php
                    }
                    ?>

                    <?php
                    if ($exibProduto[0]['status'] === 0) {
                    ?>
                        <option value="1">Disponível</option>
                        <option value="0" selected>Indisponível</option>
                    <?php
                    }
                    ?>

                </select>
            </div>

            <select name="categoria_produto" id="select-categoria">
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
                <!-- <label for="marca_samsung">
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
                </label> -->

                <select name="marca_celular" id="select-categoria">
                    <option value="0" selected>Marcas</option>
                    <?php
                    if (count($exibModeloFilters) > 0) :
                        for ($i = 0; $i < count($exibModeloFilters); $i++) :
                    ?>
                            <option value="<?= $exibModeloFilters[$i]['id_modelo_celular'] ?>">
                                <?= $exibModeloFilters[$i]['marca_celular'] ?>
                            </option>
                    <?php
                        endfor;
                    endif;
                    ?>
                </select>
            </article>

            <label for="descricao_produto">Descrição
                <textarea name="descricao_produto" id="textarea-desc" cols="30" rows="10">

                </textarea>
            </label>

            <h3>Imagens</h3>
            <label for="img_principal">Imagem Principal
                <input type="file" name="imagem_principal_produto" id="input-img">
            </label>

            <label for="img_principal">Outras Imagens
                <input type="file" name="link_img[]" multiple onchange="newInput(this)" id="input-img-multiple">
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