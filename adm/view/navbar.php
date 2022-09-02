<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once "../config/config.php" ?>
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <!-- <title>Document</title> -->
</head>

<body>
    <header>
        <h1 id="logo">2UCASE</h1>

        <nav id="nav-links">
            <ul>
                <li><a href="listPedidos.php">Pedidos</a></li>
                <li><a href="listProdutos.php">Produtos</a></li>
                <li><a href="ListClientes.php">Clientes</a></li>
                <li><a href="ListComentarios.php">Feedback</a></li>
                <li><a href="ListUsuariosADM.php">Administração</a></li>
                <div class="dropdown-link">
                    Configurações
                    <!-- <i class="fa-solid fa-angle-down"></i> -->
                    <li class="dropdown-content">
                        <a href="ListMenus.php">Menus</a>
                        <a href="carrossel.php">Carrossel</a>
                        <a href="ListCupons.php">Cupons</a>
                    </li>
                </div>

            </ul>
        </nav>
    </header>
</body>

</html>