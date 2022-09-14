<?php
session_start();

if (!isset($_SESSION["ADM-ID"]) || empty($_SESSION["ADM-ID"])) {
    session_destroy();

?>
    <form action="../index.php" name="myForm" id="myForm" method="post">
        <input type="hidden" name="msg" value="OA01">
    </form>
    <script>
        document.getElementById('myForm').submit();
    </script>

<?php

}

if (isset($_REQUEST['newUsuario']) && $_REQUEST['newUsuario'] != '') :

    require_once '../model/Manager.class.php';
    require_once '../model/Ferramentas.class.php';

    $manager = new Manager();
    $ferr = new Ferramentas();

    // Organizando os dados
    $verificaNomeADM = $ferr->antiInjection($_REQUEST['nome_adm']);
    $verificaEmailADM = $ferr->antiInjection($_REQUEST['email_adm']);

    if($verificaNomeADM && $verificaEmailADM === 1){
        
        $dadosUserADM['nome_adm'] = $_REQUEST['nome_adm'];
        $dadosUserADM['email_adm'] = $_REQUEST['email_adm'];
        $dadosUserADM['senha_adm'] = $ferr->hash256($_REQUEST['senha_adm']);
        $dadosUserADM['poder_adm'] = $_REQUEST['poder_adm'];
        $dadosUserADM['status'] = $_REQUEST['status'];


        $manager->insertClient("adm_administrador", $dadosUserADM);
    }


?>
    <form action="../view/listUsuariosADM.php" name="myForm" id="myForm" method="post">
        <input type="hidden" name="msg" value="BD52">
    </form>
    <script>
        document.getElementById('myForm').submit();
    </script>

<?php

else :

?>
    <form action="../view/CRUDAddUsuarioADM.php" name="myForm" id="myForm" method="post">
        <input type="hidden" name="msg" value="BD02">
    </form>
    <script>
        document.getElementById('myForm').submit();
    </script>

<?php

endif;
