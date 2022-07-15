<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once __DIR__ . "/../config/stylesConfig.php"  ?>
    <link rel="stylesheet" href="../assets/styles/homepage.css">
    <link rel="stylesheet" href="node_modules/@glidejs/glide/dist/css/glide.core.min.css">
    <link rel="stylesheet" href="node_modules/@glidejs/glide/dist/css/glide.theme.min.css">

</head>
<!-- Barra de Navegação -->
<?php require_once './navbar.php'; ?>

<body id="body-margin">
    <div class="glide">
        <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides">
                <li class="glide__slide">0</li>
                <li class="glide__slide">1</li>
                <li class="glide__slide">2</li>
            </ul>
        </div>
    </div>
</body>
<script src="../assets/./js/glideCarrosel.js"></script>
</html>