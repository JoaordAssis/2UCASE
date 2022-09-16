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

    // DELETAR CUPOM 
    if ($_REQUEST['action'] === 'deleteCupomADM') {
        $idCupomADM = $_REQUEST['id'];
        require_once "../model/Manager.class.php";

        $manager = new Manager();
        
        $deleteUserADM = $manager->deleteClient('user_cupom', 'id_cupom', $idCupomADM);
        
        // Sucesso
        ?>
        <form action="../view/listCupons.php" name="myForm" id="myForm" method="post">
            <input type="hidden" name="msg" value="BD54">
        </form>
        <script>
            document.getElementById('myForm').submit();
        </script>
        <?php
    }

    // EDITAR CUPOM

    
    if ($_REQUEST['action'] === 'editCupomADM') {
            require_once "../model/Manager.class.php";
            require_once "../model/Ferramentas.class.php";
    
            $manager = new Manager();
            $ferr = new Ferramentas();
    
            $verificaCupomNome = $ferr->antiInjection($_REQUEST['nome_cupom']);
            $verificaCupomCode = $ferr->antiInjection($_REQUEST['codigo_cupom']);
    
    
            if ($verificaCupomNome && $verificaCupomCode === 1) {
    
    
                $idCupom = $_REQUEST['idMenu'];
    
                $dateTo = strtotime($_REQUEST['data_expira_cupom']);
                $newDate = date("Y-m-d", $dateTo);
    
                $dadosCupom["nome_cupom"] = $_REQUEST["nome_cupom"];
                $dadosCupom["id_categoria"] = $_REQUEST["id_categoria"];
                $dadosCupom["codigo_cupom"] = $_REQUEST["codigo_cupom"];
                $dadosCupom["data_expira_cupom"] = $newDate;
                $dadosCupom["desconto_cupom"] = $_REQUEST["desconto_cupom"];
                $dadosCupom["status"] = $_REQUEST["status"];
    
    
                $manager->updateClient("user_cupom", $dadosCupom, $idCupom, 'id_cupom');
    
            ?>
                <form action="../view/listCupons.php" name="myForm" id="myForm" method="post">
                    <input type="hidden" name="msg" value="BD53">
                </form>
                <script>
                    document.getElementById('myForm').submit();
                </script>
            <?php
            }
    
            ?>
            <form action="../view/CRUDEditCupom.php" name="myForm" id="myForm" method="post">
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
    <form action="../view/listCupons.php" name="myForm" id="myForm" method="post">
        <input type="hidden" name="msg" value="BD00">
    </form>
    <script>
        document.getElementById('myForm').submit();
    </script>
<?php
}

