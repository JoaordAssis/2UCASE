<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/clientes.css">
    <!-- <title>Document</title> -->
</head>
<body>
    <div id="container">
        <div id="menu" target="screen">
            <?php
                include_once 'navbar.php';
            ?>
        </div>
        <div id="apres">
        <iframe name="screen" id="screen" width="100%" height="100%" src="listClientes.php" style="border: 0px;"></iframe>
        </div>
    </div>
</body>
</html>