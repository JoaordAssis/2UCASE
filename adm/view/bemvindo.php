<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "../config/config.php"; ?>
    <link rel="stylesheet" href="../assets/css/bemvindo.css">
</head>

<?php require_once "./navbar.php"; ?>

<body id="body-margin">
    <main class="container-bemvindo">
        <h1>Página Inicial</h1>
    </main>
</body>
<?php
    if (isset($_POST['msg'])) {
        require_once './msg.php';
        $msg = $_POST["msg"];
        $msgExibir = $MSG[$msg];
        echo "<script>alert('" . $msgExibir . "');</script>";
    }
?>
</html>


