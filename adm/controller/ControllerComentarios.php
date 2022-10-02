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



if (isset($_REQUEST['selectOrdem']) && !empty($_REQUEST['selectOrdem'])) {
    $exibSearch = $_REQUEST['selectOrdem'];
    $header = 'Location: ../view/ListComentarios.php?selectOrdem=' . $exibSearch;

    header($header);
    exit();

} else if (isset($_REQUEST['selectAvaliacao']) && !empty($_REQUEST['selectAvaliacao'])) {

    $exibSearch = $_REQUEST['selectAvaliacao'];
    $header = 'Location: ../view/ListComentarios.php?selectAvaliacao=' . $exibSearch;

    header($header);
    exit();

} else if (isset($_REQUEST['selectStatus']) && !empty($_REQUEST['selectStatus'])) {

    $exibSearch = $_REQUEST['selectStatus'];
    $header = 'Location: ../view/ListComentarios.php?selectStatus=' . $exibSearch;

    header($header);
    exit();

} else if (isset($_REQUEST['dataStart']) && !empty($_REQUEST['dataStart']) && isset($_REQUEST['dataEnd']) && !empty($_REQUEST['dataEnd'])){
    $exibSearchStart = $_REQUEST['dataStart'];
    $exibSearchEnd = $_REQUEST['dataEnd'];

    $header = 'Location: ../view/ListComentarios.php?dataStart=' . $exibSearchStart . '&dataEnd=' . $exibSearchEnd;

    header($header);
    exit();
    
}else{

?>
    <form action="../view/ListComentarios.php" name="myForm" id="myForm" method="post">
        <input type="hidden" name="msg" value="BD05">
    </form>
    <script>
        document.getElementById('myForm').submit();
    </script>
<?php
    exit();
}
