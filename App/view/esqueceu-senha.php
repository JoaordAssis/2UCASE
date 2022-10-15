<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once __DIR__ . "/../config/stylesConfig.php"  ?>
    <link rel="stylesheet" href="../assets/styles/esqueceu-senha.css">

</head>
<!-- Barra de Navegação -->
<?php require_once './navbar.php'; ?>

<body id="body-margin">
    <main class="container-senha">
        <h1>Esqueceu sua Senha?</h1>

        <form action="#" class="email-check">
            <p>Identifique-se para receber um e-mail com as instruções e o link para criar uma nova senha.</p>
            <label for="email-confirmation">Email
                <input type="email" name="email-confirmation" id="input-email">
            </label>
            <input type="submit" value="Enviar">
        </form>
    </main>
</body>
<!-- Footer -->
<?php //require_once './footer.php'; 
?>

</html>