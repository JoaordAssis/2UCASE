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

if (isset($_REQUEST['searchBarClientes'])) {
    $exibSearch = $_REQUEST['searchBarUsuarios'];
    $header = 'Location: ../view/listClientes.php?searchBarClientes=' . $exibSearch;

    header($header);
    exit();
} else {
?>
    <form action="../view/listClientes.php" name="myForm" id="myForm" method="post">
        <input type="hidden" name="msg" value="BD05">
    </form>
    <script>
        document.getElementById('myForm').submit();
    </script>
<?php
    exit();
}
