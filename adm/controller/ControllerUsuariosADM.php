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
    if ($_REQUEST['action'] === 'deleteUserADM') {
        $idUserADM = $_REQUEST['id'];
        require_once "../model/Manager.class.php";

        $manager = new Manager();

        $deleteUserADM = $manager->deleteClient('adm_administrador', 'id_adm', $idUserADM);

        // Sucesso
    ?>
        <form action="../view/listUsuariosADM.php" name="myForm" id="myForm" method="post">
            <input type="hidden" name="msg" value="BD54">
        </form>
        <script>
            document.getElementById('myForm').submit();
        </script>
        <?php
    }


   
} else {
    // Não existe requisição
    ?>
    <!-- <form action="../view/listUsuariosADM.php" name="myForm" id="myForm" method="post">
        <input type="hidden" name="msg" value="BD00">
    </form>
    <script>
        document.getElementById('myForm').submit();
    </script> -->
<?php

// EDITAR USUARIO ADMINISTRATIVO

    if (isset($_REQUEST['editUsuario'])) {

        require_once "../model/Manager.class.php";
        require_once "../model/Ferramentas.class.php";

        $manager = new Manager();
        $ferr = new Ferramentas();

        $verificaNomeADM = $ferr->antiInjection($_REQUEST['nome_adm']);
        $verificaEmailADM = $ferr->antiInjection($_REQUEST['email_adm']);
        

        if ($verificaNomeADM && $verificaEmailADM === 1) {

            $idUser = $_REQUEST['idUser'];

            $dadosUserADM['nome_adm'] = $_REQUEST['nome_adm'];
            $dadosUserADM['email_adm'] = $_REQUEST['email_adm'];
            $dadosUserADM['senha_adm'] = $ferr->hash256($_REQUEST['senha_adm']);
            $dadosUserADM['poder_adm'] = $_REQUEST['poder_adm'];
            $dadosUserADM['status'] = $_REQUEST['status'];


            $manager->updateClient("adm_administrador", $dadosUserADM, $idUser, 'id_adm');

        ?>
            <form action="../view/listUsuariosADM.php" name="myForm" id="myForm" method="post">
                <input type="hidden" name="msg" value="BD53">
            </form>
            <script>
                document.getElementById('myForm').submit();
            </script>
        <?php
        }

        ?>
        <form action="../view/CRUDEditUsuarioADM.php" name="myForm" id="myForm" method="post">
            <input type="hidden" name="msg" value="BD03">
        </form>
        <script>
            document.getElementById('myForm').submit();
        </script>
    <?php
    }


    if(isset($_REQUEST['searchBarUsuarios'])){
        // require_once "../model/Manager.class.php";
        // $manager = new Manager();
        // $columns = ['nome_adm '];
        // $resultSearchUsuario = $manager->selectLike('adm_administrador', 1, $columns, 'Davi');
        // echo "<pre>";
        // print_r($resultSearchUsuario);
        // echo "<pre>";

        $exibSearch = $_REQUEST['searchBarUsuarios'];
        $header = 'Location: ../view/listUsuariosADM.php?searchBarUsuarios='.$exibSearch;

        header($header);
        exit();
    }
}




 