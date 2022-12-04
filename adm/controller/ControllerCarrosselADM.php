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

    // DELETAR USUÁRIO ADMINISTRATIVO
    if ($_REQUEST['action'] === 'deleteCarrosselADM') {
        $idCarrosselADM = $_REQUEST['id'];
        require_once "../model/Manager.class.php";

        $manager = new Manager();

        $deleteUserADM = $manager->deleteClient('adm_carrossel', 'id_carrossel', $idCarrosselADM);

        // Sucesso
    ?>
        <form action="../view/carrossel.php" name="myForm" id="myForm" method="post">
            <input type="hidden" name="msg" value="BD54">
        </form>
        <script>
            document.getElementById('myForm').submit();
        </script>
        <?php
    }

    // EDITAR CARROSSEL

    if ($_REQUEST['action'] === 'editCarrosselADM') {
        require_once "../model/Manager.class.php";
        require_once "../model/Ferramentas.class.php";

        $manager = new Manager();
        $ferr = new Ferramentas();

        $verificaNomeBanner = $ferr->antiInjection($_REQUEST['nome_carrossel']);


        if ($verificaNomeBanner === 1) {

            $idCarrossel = $_REQUEST['id'];

            $dadosBannerADM['nome_carrossel'] = $_REQUEST['nome_carrossel'];
            $dadosBannerADM['link_promo_carrossel'] = $_REQUEST['link_promo_carrossel'];

            if(empty($_FILES['link_carrossel_new']['name'])){
                $dadosBannerADM['link_carrossel'] = $_REQUEST['link_carrossel'];
            }else{
                $imgRetrieveData = $manager->imgUpload('link_carrossel_new', $_REQUEST["nome_carrossel"]);
                $dadosBannerADM['link_carrossel'] = $imgRetrieveData[0];
            }

            $dadosBannerADM['status'] = $_REQUEST['status'];

            $manager->updateClient("adm_carrossel", $dadosBannerADM, $idCarrossel, 'id_carrossel');

        ?>
            <form action="../view/carrossel.php" name="myForm" id="myForm" method="post">
                <input type="hidden" name="msg" value="BD53">
            </form>
            <script>
                document.getElementById('myForm').submit();
            </script>
        <?php
        }

        ?>
        <form action="../view/CRUDEditCarrossel.php" name="myForm" id="myForm" method="post">
            <input type="hidden" name="msg" value="BD03">
        </form>
        <script>
            document.getElementById('myForm').submit();
        </script>
    <?php
    }
} else {
    // Não existe requisição
    ?>
    <form action="../view/carrossel.php" name="myForm" id="myForm" method="post">
        <input type="hidden" name="msg" value="BD00">
    </form>
    <script>
        document.getElementById('myForm').submit();
    </script>
<?php
}
