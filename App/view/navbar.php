<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once __DIR__ . "/../config/stylesConfig.php"  ?>
    <link rel="stylesheet" href="../assets/styles/navbar.css">
</head>

<body>
    <header class="header-navbar header-primario">
        <nav id="logo-informations">
            <h1>VILICAPAS</h1>
            <section class="input-search">
                <input type="search" id="searchIn" placeholder="Pesquisar" name="search">
                <button id="search-button">
                    <img src="../assets/svg/search.svg" alt="icone de pesquisa" id="search-icon" width="40" height="40"></img>
                </button>
            </section>
            <section class="user-login">
                <button id="login-button">
                    <img src="../assets/svg/Login.svg" alt="icone de login" id="login-icon" width="50" height="50"></img>
                </button>
                <div class="login-links">
                    <a href="#">Minha conta</a>
                    <a href="#" id="login-sign">Entre ou Cadastre-se</a>
                </div>
            </section>
            <button id="favorito-button">
                <img src="../assets/svg/CoracaoFavoritos.svg" alt="Icone de favoritos" id="coracaoSVG" width="40" height="40"></img>
            </button>
            <button id="bag-button">
                <img src="../assets/svg/BagCarrinho.svg" alt="icone do carrinho de compras" id="carrinhoSVG" width="40" height="40"></img>
            </button>
        </nav>

        <nav id="menu">
            <ul id="nav-links">
                <a href="#">
                    <li>Página Inicial</li>
                </a>
                <a href="#">
                    <li>Promoções</li>
                </a>
                <a href="#">
                    <li>Capinhas</li>
                </a>
                <a href="#">
                    <li>Pop Socket</li>
                </a>
                <a href="#">
                    <li>Carregadores</li>
                </a>
                <a href="#">
                    <li>Acessórios</li>
                </a>
            </ul>
        </nav>
    </header>

    <section class="nav-container">
        <header class="header-navbar header-secundario">

            <section class="logo-responsive">
                <button id="menu-button">
                    <span id="hamburguer"></span>
                </button>
                <h2 id="logo-mobile">VILICAPAS</h2>
            </section>

            <section class="util-icons">
                <button id="bag-button">
                    <img src="../assets/svg/BagCarrinho.svg" alt="icone do carrinho de compras" id="carrinhoSVG" width="30" height="30"></img>
                </button>
                <button id="favorito-button">
                    <img src="../assets/svg/CoracaoFavoritos.svg" alt="Icone de favoritos" id="coracaoSVG" width="30" height="30"></img>
                </button>
                <button id="login-button">
                    <img src="../assets/svg/Login.svg" alt="icone de login" id="login-icon" width="40" height="40"></img>
                </button>
            </section>

        </header>
        <nav id="nav-mobile" class="header-navbar">

            <section class="input-search">
                <input type="search" id="searchIn" placeholder="Pesquisar" name="search">
                <button id="search-button">
                    <img src="../assets/svg/search.svg" alt="icone de pesquisa" id="search-icon" width="40" height="40"></img>
                </button>
            </section>

            <ul id="links-mobile">
                <a href="#">
                    <li>Página Inicial</li>
                </a>
                <a href="#">
                    <li>Promoções</li>
                </a>
                <a href="#">
                    <li>Capinhas</li>
                </a>
                <a href="#">
                    <li>Pop Socket</li>
                </a>
                <a href="#">
                    <li>Carregadores</li>
                </a>
                <a href="#">
                    <li>Acessórios</li>
                </a>

                <section class="util-icons-xs">
                    <button id="bag-button">
                        <img src="../assets/svg/BagCarrinho.svg" alt="icone do carrinho de compras" id="carrinhoSVG" width="30" height="30"></img>
                    </button>
                    <button id="favorito-button">
                        <img src="../assets/svg/CoracaoFavoritos.svg" alt="Icone de favoritos" id="coracaoSVG" width="30" height="30"></img>
                    </button>
                    <button id="login-button">
                        <img src="../assets/svg/Login.svg" alt="icone de login" id="login-icon" width="40" height="40"></img>
                    </button>
                </section>
            </ul>
        </nav>
    </section>

    <script src="../assets/js/navbar.js"></script>

</body>

</html>