<?php
session_start();
require_once "../model/Manager.class.php";
$manager = new Manager();

$exibCategoriaFilters = $manager->listClient('user_categoria', 'id_categoria');
$exibModeloFilters = $manager->listClient('user_mod_celular', 'id_modelo_celular');

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
        <form action="../controller/ControllerAddProdutoADM.php" method="POST" class="form-add-produto" enctype="multipart/form-data">
            <label for="nome_produto">
                <input type="text" required name="nome_produto" id="input-nome" placeholder="Nome do Produto">
            </label>

            <div class="row-preco-quant row-inputs">
                <label for="preco_produto">
                    <input type="text" required data-js="money" name="preco_produto" id="input-preco" placeholder="Preço do Produto">
                </label>

                <label for="quantidade_produto">
                    <input type="number" required name="quantidade_produto" min="0" id="input-quant" placeholder="Quantidade">
                </label>
            </div>



            <div class="row-garantia-status row-inputs">
                <select required name="garantias_produto" id="select-garantia">
                    <option selected>Escolha a garantia</option>
                    <option>7 Dias</option>
                    <option>1 Mes</option>
                    <option>3 Meses</option>
                    <option>6 Meses</option>
                    <option>1 Ano</option>
                </select>

                <select required name="status" id="select-status">
                    <option value="incorrect" selected>Status</option>
                    <option value="1">Disponível</option>
                    <option value="0">Indisponível</option>
                </select>
            </div>

            <select required name="categoria_produto" id="select-categoria-tipo">
                <?php
                if (count($exibCategoriaFilters) > 0) :
                    for ($i = 0, $iMax = count($exibCategoriaFilters); $i < $iMax; $i++) :
                ?>
                        <option value="<?= $exibCategoriaFilters[$i]['id_categoria'] ?>">
                            <?= $exibCategoriaFilters[$i]['nome_categoria'] ?>
                        </option>
                <?php
                    endfor;
                endif;
                ?>
            </select>

            <div class="row-preco-quant row-inputs">
                <label for="peso_produto">
                    <input type="number" required name="peso_produto" id="input-peso" placeholder="Peso em gramas">
                </label>

                <label for="cod_produto">
                    <input type="number" required name="cod_produto" min="0" id="input-cod" placeholder="Codigo do Produto">
                </label>
            </div>

            <select required name="categoria_special_produto" id="select-status">
                <option selected>Nenhuma</option>
                <option>Mais Vendidos</option>
                <option>Promoções</option>
                <option>Novidades</option>
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

                <select name="marca_celular" id="select-categoria-marca">
                    <?php
                    if (count($exibModeloFilters) > 0) :
                        for ($i = 0, $iMax = count($exibModeloFilters); $i < $iMax; $i++) :
                    ?>
                            <option value="<?= $exibModeloFilters[$i]['id_modelo_celular'] ?>">
                                <?= $exibModeloFilters[$i]['modelo_celular'] ?>
                            </option>
                    <?php
                        endfor;
                    endif;
                    ?>
                </select>
            </article>

            <label for="descricao_produto">Descrição
                <textarea required name="descricao_produto" id="textarea-desc" cols="30" rows="10"></textarea>
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
<script src="../assets/js/navbarFix.js"></script>

</html>