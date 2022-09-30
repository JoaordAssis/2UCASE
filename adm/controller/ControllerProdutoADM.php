<?php
session_start();

if (!isset($_SESSION["ADM-ID"]) || empty($_SESSION["ADM-ID"])) {
    session_destroy();
?>
    <form action="../index.php" name="myForm" id="myForm" method="post">
        <input type="hidden" name="msg" value="OA00">
    </form>
    <script>
        document.getElementById('myForm').submit();
    </script>
    <?php
    exit();
}

if (isset($_REQUEST['action']) && $_REQUEST['action'] != '' && isset($_REQUEST['id']) && $_REQUEST['id'] != '') {

    // DELETAR MENU ADMINISTRATIVO
    if ($_REQUEST['action'] === 'deleteProdutoADM') {
        $idProdutoADM = $_REQUEST['id'];
        require_once "../model/Manager.class.php";

        $manager = new Manager();

        $searchSubMenus = $manager->getInfo('user_produtos_img', 'id_produto', $idProdutoADM);

        if (count($searchSubMenus) > 0) {
            for ($ssm = 0; $ssm < count($searchSubMenus); $ssm++) {
                $deleteSubImgADM = $manager->deleteClient('user_produtos_img', 'id_produto', $searchSubMenus[$ssm]['id_produto']);
            }
        }

        $deleteProdutoADM = $manager->deleteClient('user_produto', 'id_produto', $idProdutoADM);

        // Sucesso
    ?>
        <form action="../view/listProdutos.php" name="myForm" id="myForm" method="post">
            <input type="hidden" name="msg" value="BD54">
        </form>
        <script>
            document.getElementById('myForm').submit();
        </script>
    <?php
    }

    // EDITAR PRODUTO 
    if ($_REQUEST['action'] === 'editProdutoADM') {
        $idProdutoADM = $_REQUEST['id'];
        require_once "../model/Manager.class.php";

        $manager = new Manager();

        $searchProduto = $manager->getInfo('user_produto', 'id_produto', $idProdutoADM);

        $imgRetrieveData = $manager->imgUpload('imagem_principal_produto', $_REQUEST["nome_produto"]);


        $dadosProdutoADM['id_modelo_celular'] = $_REQUEST['marca_celular'];
        $dadosProdutoADM['id_categoria'] = $_REQUEST['categoria_produto'];
        $dadosProdutoADM['nome_produto'] = $_REQUEST['nome_produto'];
        $dadosProdutoADM['preco_produto'] = $_REQUEST['preco_produto'];
        $dadosProdutoADM['descricao_produto'] = $_REQUEST['descricao_produto'];
        $dadosProdutoADM['quantidade_produto'] = $_REQUEST['quantidade_produto'];
        $dadosProdutoADM['garantias_produto'] = $_REQUEST['garantias_produto'];
        $dadosProdutoADM['status'] = $_REQUEST['status'];
        $dados["categoria_special_produto"] = $_REQUEST["categoria_special_produto"];
        $dadosProdutoADM['imagem_principal_produto'] = $imgRetrieveData[0];

        $manager->updateClient("user_produto", $dadosProdutoADM, $idProdutoADM, 'id_produto');

    ?>
        <form action="../view/listProdutos.php" name="myForm" id="myForm" method="post">
            <input type="hidden" name="msg" value="BD53">
        </form>
        <script>
            document.getElementById('myForm').submit();
        </script>
    <?php
    }
} else {
    // Não existe requisição
    ?>
    <form action="../view/listProdutos.php" name="myForm" id="myForm" method="post">
        <input type="hidden" name="msg" value="BD00">
    </form>
    <script>
        document.getElementById('myForm').submit();
    </script>
<?php
}


// PESQUISA DE PRODUTOS

if (isset($_REQUEST['searchBarProdutos'])) {
    // require_once "../model/Manager.class.php";
    // $manager = new Manager();
    // $columns = ['nome_adm '];
    // $resultSearchUsuario = $manager->selectLike('adm_administrador', 1, $columns, 'Davi');
    // echo "<pre>";
    // print_r($resultSearchUsuario);
    // echo "<pre>";

    $exibSearch = $_REQUEST['searchBarProdutos'];
    $header = 'Location: ../view/listProdutos.php?searchBarProdutos=' . $exibSearch;

    header($header);
    exit();
}


// FILTROS DE CATEGORIA

if (isset($_REQUEST['selectOrdem']) && !empty($_REQUEST['selectOrdem'])) {
    $exibSearch = $_REQUEST['selectOrdem'];
    $header = 'Location: ../view/ListProdutos.php?selectOrdem=' . $exibSearch;

    header($header);
    exit();
} else if (isset($_REQUEST['selectCategoria']) && !empty($_REQUEST['selectCategoria'])) {

    $exibSearch = $_REQUEST['selectCategoria'];
    $header = 'Location: ../view/ListProdutos.php?selectCategoria=' . $exibSearch;

    header($header);
    exit();
} else if (isset($_REQUEST['selectStatus']) && !empty($_REQUEST['selectStatus'])) {

    $exibSearch = $_REQUEST['selectStatus'];
    $header = 'Location: ../view/ListProdutos.php?selectStatus=' . $exibSearch;

    header($header);
    exit();
} else {
?>
    <form action="../view/ListProdutos.php" name="myForm" id="myForm" method="post">
        <input type="hidden" name="msg" value="BD05">
    </form>
    <script>
        document.getElementById('myForm').submit();
    </script>
<?php
    exit();
}
