<?php
require_once "../../vendor/autoload.php";

use app\model\Manager;

$manager = new Manager();
$menuReturn = $manager->listClient('adm_menu', 'id_menu');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once "../config/stylesConfig.php"?>
    <link rel="stylesheet" href="../assets/styles/navbar.css">
</head>

<body>
    <header class="header-navbar header-primario">
        <nav id="logo-informations">
            <h1 id="logo-site"><a href="./homepage.php">2UCASE</a></h1>
            <form class="input-search" method="post" action="../controllers/ControllerSearchBar.php">
                <input type="search" id="searchIn" placeholder="Pesquisar" name="search">
                <button id="search-button">
                    <img src="../assets/svg/search.svg" alt="icone de pesquisa" id="search-icon" width="40" height="40" />
                </button>
            </form>
            <section class="user-login">
                <?php
                //START SESSION
                //Verificando se existe sessão
                if (!isset($_SESSION['USER-ID'])) {
                ?>
                    <button id="login-button" onclick="window.location.href='./login.php'">
                        <img src="../assets/svg/Login.svg" alt="icone de login" id="login-icon" width="50" height="50" />
                    </button>
                    <div class="login-links">
                        <a href="./login.php">Minha conta</a>
                        <a href="./login.php" id="login-sign">Entre ou Cadastre-se</a>
                    </div>
                <?php
                } else {
                ?>
                    <button id="login-button" onclick="window.location.href='./my-info.php'">
                        <img src="../assets/svg/Login.svg" alt="icone de login" id="login-icon" width="50" height="50" />
                    </button>
                    <div class="login-session">
                        <nav id="menu">
                            <ul id="nav-links">
                                <li class="menu-link">
                                    <a href="#" id="first-link">
                                       Minha Conta
                                    </a>
                                    <ul class="container-submenu">
                                        <li>
                                            <a href="./meus-pedidos.php">
                                                Meus Pedidos
                                            </a>
                                        </li>
                                        <li>
                                            <a href="./my-info.php">
                                                Alterar Dados
                                            </a>
                                        </li>
                                        <li>
                                            <a href="../controllers/ControllerValidaLogin.php?exit=true">
                                                Sair
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                <?php
                }
                ?>
            </section>
            <button id="favorito-button" onclick="window.location.href='./favoritos.php'">
                <img src="../assets/svg/CoracaoFavoritos.svg" alt="Icone de favoritos" id="coracaoSVG" width="40" height="40"></img>
            </button>
            <button id="bag-button" onclick="window.location.href='./carrinho.php'">
                <img src="../assets/svg/BagCarrinho.svg" alt="icone do carrinho de compras" id="carrinhoSVG" width="40" height="40"></img>
            </button>
        </nav>

        <nav id="menu">
            <ul id="nav-links">
                <?php
                //FOR
                if (count($menuReturn) > 0) :
                    for ($i = 0, $iMax = count($menuReturn); $i < $iMax; $i++) :
                        $subMenuReturn = $manager->getInfoSub('adm_submenu', $menuReturn[$i]['id_menu']);
                ?>

                        <?php
                        if (count($subMenuReturn) > 0) {
                        ?>

                            <li class="menu-link">
                                <a href="<?= $menuReturn[$i]['link_menu'] ?>" id="first-link">
                                    <?= $menuReturn[$i]['nome_menu'] ?>
                                    <i class="fa-solid fa-chevron-down"></i>
                                </a>
                                <ul class="container-submenu">
                                    <?php
                                    if (count($subMenuReturn) > 0) :
                                        for ($j = 0, $jMax = count($subMenuReturn); $j < $jMax; $j++) :
                                            //FOR
                                    ?>
                                            <li>
                                                <a href="<?= $subMenuReturn[$j]['link_submenu'] ?>">
                                                    <?= $subMenuReturn[$j]['nome_submenu'] ?>
                                                </a>
                                            </li>
                                    <?php
                                        endfor;
                                    endif;

                                    //ENDFOR
                                    ?>
                                </ul>
                            </li>
                        <?php
                        } else {
                        ?>
                            <li class="menu-link">
                                <a href="<?= $menuReturn[$i]['link_menu'] ?>" class="unique-link" id="first-link">
                                    <?= $menuReturn[$i]['nome_menu'] ?>
                                </a>
                            </li>
                <?php
                            //ENDFOR
                        }
                    endfor;
                endif;
                ?>
            </ul>
        </nav>
    </header>

    <section class="nav-container">
        <header class="header-navbar header-secundario">

            <section class="logo-responsive">
                <button id="menu-button">
                    <span id="hamburguer"></span>
                </button>
                <h2 id="logo-site">
                    <a href="./homepage.php">
                        2UCASE
                    </a>
                </h2>
            </section>

            <section class="util-icons">
                <button id="bag-button" onclick="window.location.href='./carrinho.php'">
                    <img src="../assets/svg/BagCarrinho.svg" alt="icone do carrinho de compras" id="carrinhoSVG" width="30" height="30"></img>
                </button>
                <button id="favorito-button" onclick="window.location.href='./favoritos.php'">
                    <img src="../assets/svg/CoracaoFavoritos.svg" alt="Icone de favoritos" id="coracaoSVG" width="30" height="30"></img>
                </button>
                <?php
                //START SESSION
                //Verificando se existe sessão
                if (!isset($_SESSION['USER-ID'])) {
                ?>
                    <button id="login-button" onclick="window.location.href='./login.php'">
                        <img src="../assets/svg/Login.svg" alt="icone de login" id="login-icon" width="40" height="40"></img>
                    </button>
                <?php
                }else{

                ?>
                    <button id="login-button" onclick="window.location.href='./mobile-conta.php'">
                        <img src="../assets/svg/Login.svg" alt="icone de login" id="login-icon" width="40" height="40"></img>
                    </button>
                <?php
                }
                //END SESSION
                ?>
            </section>

        </header>
        <nav id="nav-mobile" class="header-navbar">

            <form method="post" action="../controllers/ControllerSearchBar.php" class="input-search">
                <input type="search" id="searchIn" placeholder="Pesquisar" name="search">
                <button id="search-button">
                    <img src="../assets/svg/search.svg" alt="icone de pesquisa" id="search-icon" width="40" height="40"></img>
                </button>
            </form>

            <ul id="links-mobile">
                <?php
                //FOR
                if (count($menuReturn) > 0) :
                    for ($t = 0, $iMax = count($menuReturn); $t < $iMax; $t++) :
                        $subMenuReturnM = $manager->getInfoSub('adm_submenu', $menuReturn[$t]['id_menu']);
                ?>

                        <li>
                            <?php
                            if (count($subMenuReturnM) > 0) {
                            ?>
                                <button id="btn-submenu" onclick="dropdownSubMenu(<?= $t ?>)">
                                    <?= $menuReturn[$t]['nome_menu'] ?>
                                    <i class="fa-solid fa-chevron-down"></i>
                                </button>
                            <?php
                                //CASO NÃO HAJA SUBMENUS LINKADOS
                            } else {
                            ?>
                                <a id="correct-padding" href="<?= $menuReturn[$t]['link_menu'] ?>">
                                    <?= $menuReturn[$t]['nome_menu'] ?>
                                </a>
                            <?php
                            }
                            ?>

                            <ul id="submenu-container-call" class="container-submenu">
                                <?php
                                if (count($subMenuReturnM) > 0) :
                                    for ($l = 0, $jMax = count($subMenuReturnM); $l < $jMax; $l++) :
                                        //FOR
                                ?>

                                        <li>
                                            <a href="<?= $subMenuReturnM[$l]['link_submenu'] ?>">
                                                <?= $subMenuReturnM[$l]['nome_submenu'] ?>
                                            </a>
                                        </li>

                                <?php
                                    endfor;
                                endif;
                                //ENDFOR
                                ?>
                            </ul>
                        </li>

                <?php
                    //ENDFOR
                    endfor;
                endif;
                ?>

                <section class="util-icons-xs">
                    <button id="bag-button" onclick="window.location.href='./carrinho.php'">
                        <img src="../assets/svg/BagCarrinho.svg" alt="icone do carrinho de compras" id="carrinhoSVG" width="30" height="30"></img>
                    </button>
                    <button id="favorito-button" onclick="window.location.href='./favoritos.php'">
                        <img src="../assets/svg/CoracaoFavoritos.svg" alt="Icone de favoritos" id="coracaoSVG" width="30" height="30"></img>
                    </button>
                    <button id="login-button" onclick="window.location.href='./login.php'">
                        <img src="../assets/svg/Login.svg" alt="icone de login" id="login-icon" width="40" height="40"></img>
                    </button>
                </section>
            </ul>
        </nav>
    </section>

    <script src="../assets/js/navbar.js"></script>

</body>

</html>