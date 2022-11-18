<?php

require_once __DIR__ . '/../../vendor/autoload.php';


use app\model\Clientes;
use app\model\Ferramentas;
use app\model\Manager;

session_start();

if (!empty($_SESSION["USER-ID"])) {

    ?>
    <!--Ja esta logado-->
    <form action="../view/login.php?030" name="myForm" id="myForm" method="post">
        <input type="hidden" name="msg" value="Você já esta logado">
    </form>
    <script>
        document.getElementById('myForm').submit();
    </script>

    <?php

}
