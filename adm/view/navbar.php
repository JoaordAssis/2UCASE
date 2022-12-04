<?php

if (isset($_SESSION['ADM-ID']) && $_SESSION['ADM-ID'] != '') :
?>

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <?php require_once "../config/config.php" ?>
        <link rel="stylesheet" href="../assets/css/navbar.css">
        <!-- <title>Document</title> -->
    </head>

    <body class="nav-body">
        <header id="nav-header">
            <h1 id="logo">2UCASE</h1>

            <nav id="nav-links">
                <ul>
                    <li><a href="./listPedidos.php">Pedidos</a></li>
                    <li><a href="./listProdutos.php">Produtos</a></li>
                    <li><a href="./listClientes.php">Clientes</a></li>
                    <li><a href="./ListComentarios.php">Feedback</a></li>
                    <?php
                    if ($_SESSION['ADM-PODER'] >= 9) :
                    ?>
                        <li><a href="./listUsuariosADM.php">Administração</a></li>
                        <div class="dropdown-link">
                            Configurações
                            <!-- <i class="fa-solid fa-angle-down"></i> -->
                            <li class="dropdown-content">
                                <a href="./listMenus.php">Menus</a>
                                <a href="./carrossel.php">Carrossel</a>
                                <a href="./listCupons.php">Cupons</a>
                            </li>
                        </div>
                    <?php endif; ?>
                </ul>
            </nav>

            <section class="container-session">
                <p><?= $_SESSION['ADM-EMAIL'] ?></p>
                <?php
                if ($_SESSION['ADM-PODER'] >= 9) {
                    echo "<P>Função:<br> Administrador</p>";
                } else {
                    echo "<P>Função:<br> Repositor</p>";
                }
                ?>
            </section>
            
            <button id="logout-session" onclick="window.location.href='../controller/validaLogin.php?action=logoutADM'">Logout</button>

        </header>
    </body>

    </html>

<?php endif; ?>