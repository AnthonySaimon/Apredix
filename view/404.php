<?php
session_start();
//print_r($_SESSION);
if ((!isset($_SESSION['id']) == true) and (!isset($_SESSION['permissao']) == true)) {
    unset($_SESSION['id']);
    unset($_SESSION['usuario']);
    unset($_SESSION['permissao']);
    header("Location: ../index.php");
}
$_SESSION['usuario'];
$_SESSION['permissao'];

// Redirecionar para a página de login
if ($_SESSION['permissao'] === "Banido") {
    header("Location: ./Banido");
}
include '../PHP/ADM/protocolo.php';
$manager = new protocolo();

$banana = new protocolo();
$id = $_SESSION['id'];
foreach ($banana->list_client_by_id($id) as $oi) {
    $usuario = $oi['nome'];
    $permisao = $oi['permissao'];
    $_SESSION['usuario'] = $oi['nome'];
    $_SESSION['permissao'] = $oi['permissao'];
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>404</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name="author" content="Anthony/MariaEduarda - Aprendix">
    <link rel='stylesheet' type='text/css' media='screen' href='../CSS/e404.css'>
    <link rel="shortcut icon" href="../imagem/Logo-aprendix.png" type="image/ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Kodchasan:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

</head>

<body>

    <nav class="menu-nav">

        <div class="menutoggle" id="menutoggle">
            <label for="check" class="menuButton">
                <input id="check" type="checkbox">
                <span class="top"></span>
                <span class="mid"></span>
                <span class="bot"></span>
            </label>
        </div>

        <a href="./usuario">
            <div class="perfil">

                <?php
                echo "<h3> $usuario <br><samp>$permisao</samp></h3>"
                ?>

                <div class="imgcx">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT9Etrj7SYknitFM3_TL7O2S1YoU7yswbXBLQ&s" alt="...">
                </div>
            </div>
        </a>

        <div class="menu">
            <ul>
                <li>
                    <a href="">
                        <ion-icon name="file-tray-outline"></ion-icon>
                        Biblioteca
                    </a>
                </li>
                <li>
                    <a href="./config.php">
                        <ion-icon name="settings-outline"></ion-icon>
                        Comfiguração
                    </a>
                </li>

                <li>
                    <a href="./Chat.php">
                        <ion-icon name="chatbox-ellipses-outline"></ion-icon>
                        Chat
                    </a>
                </li>

                <li>
                <a href="./carrinho.HTML">
                        <ion-icon name="bag-outline"></ion-icon> Carrinho
                    </a>
                </li>
                <?php
                if ($permisao === 'ADM') {
                    echo " <li> <a href='./ADM_home'> <ion-icon name='people-circle-outline'></ion-icon> Home ADM </a> </li>";
                }
                ?>

                <div class="menuextra">

                    <li class="menuextrali">
                        <a href="../PHP/sair.php">
                            <ion-icon name="log-out-outline"></ion-icon> Deslogar
                        </a>
                    </li>

                    <li class="menuextrali2">
                        <a href="./home.php">
                            <ion-icon name="home-outline"></ion-icon> Home
                        </a>
                    </li>

                </div>

            </ul>
        </div>
    </nav>


    <div class="erro">
        <div class="imgoi"></div>
    </div>


</body>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src='../Javascript/home/main.js'></script>
<script type='text/javascript'>
    document.addEventListener('DOMContentLoaded', function() {
        window.setTimeout(document.querySelector('svg').classList.add('animated'), 1000);
    })
</script>

</html>