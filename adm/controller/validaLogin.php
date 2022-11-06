<?php
session_start();
if (isset($_POST['email-login']) && $_POST['email-login'] != '' && isset($_POST['senha-login']) && $_POST['senha-login'] != '') {
    // Formulario com dados
    require_once "../model/Ferramentas.class.php";
    $ferr = new Ferramentas();
    // var_dump($_POST['email-login']);
    $verificaEmail = $ferr->validaEmail($_POST['email-login']);
    if ($verificaEmail == 0) {
        session_destroy();

?>

        <form action="../index.php" name="myForm" id="myForm" method="post">
            <input type="hidden" name="msg" value="FR09">
        </form>
        <script>
            document.getElementById('myForm').submit();
        </script>
    <?php
    exit();
    }
    // Anti-Injection

    $vEmail = $ferr->antiInjection($_POST['email-login']);
    $VSenha = $ferr->antiInjection($_POST['senha-login']);

    if ($vEmail === 0 || $VSenha === 0) {
        session_destroy();
    ?>
        <form action="../index.php" name="myForm" id="myForm" method="post">
            <input type="hidden" name="msg" value="FR24">
        </form>
        <script>
            document.getElementById('myForm').submit();
        </script>
        <?php
        exit();
    }

    // Se email existe no BD


    require_once '../model/Manager.class.php';
    $manager = new Manager();
    $res = $manager->dadosClient("adm_administrador", $_POST["email-login"]);
    $dados = array();
    if (count($res) > 0) {
        for ($i = 0, $iMax = count($res); $i < $iMax; $i++) {
            foreach ($res[$i] as $k => $v) {
                $dados[$k] = $v;
            }
        }
    }

    // Senha está certa

    if (isset($dados["id_adm"])) {
        require_once '../model/Ferramentas.class.php';
        $ferr = new Ferramentas();
        $senhaHash = $ferr->hash256($_POST['senha-login']);
        if ($dados["senha_adm"] === $senhaHash) { //tudo validado

            $_SESSION["ADM-ID"] = $dados["id_adm"];
            $_SESSION["ADM-NOME"] = $dados["nome_adm"];
            $_SESSION["ADM-EMAIL"] = $dados["email_adm"];
            $_SESSION["ADM-PODER"] = $dados["poder_adm"];

        ?>
            <form action="../view/BemVindo.php" name="myForm" id="myForm" method="post">
                <input type="hidden" name="result" value="OA50">
            </form>
            <script>
                document.getElementById('myForm').submit();
            </script>

        <?php


        } else {
            session_destroy();
        ?>
            <form action="../index.php" name="myForm" id="myForm" method="post">
                <input type="hidden" name="msg" value="FR03">
            </form>
            <script>
                document.getElementById('myForm').submit();
            </script>
        <?php
            exit();
        }
    } else {
        session_destroy();
        ?>
        <form action="../index.php" name="myForm" id="myForm" method="post">
            <input type="hidden" name="msg" value="FR03">
        </form>
        <script>
            document.getElementById('myForm').submit();
        </script>
    <?php
        exit();
    }
}


// LOGOUT


if (isset($_REQUEST['action']) && $_REQUEST['action'] === 'logoutADM') :

    session_destroy();
    ?>
    <form action="../index.php" name="myForm" id="myForm" method="post">
        <input type="hidden" name="msg" value="OA51">
    </form>
    <script>
        document.getElementById('myForm').submit();
    </script>
<?php
    exit();

endif;
