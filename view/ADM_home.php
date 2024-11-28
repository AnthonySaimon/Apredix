<?php
session_start();
//print_r($_SESSION);
if ((!isset($_SESSION['id']) == true) and (!isset($_SESSION['permissao']) == true)) {
    unset($_SESSION['id']);
    unset($_SESSION['usuario']);
    unset($_SESSION['permissao']);
    header("Location: ../index.php");
}
$usuario = $_SESSION['usuario'];
$permisao = $_SESSION['permissao'];

// Redirecionar para a página de login
if ($_SESSION['permissao'] === "ADM") {
} else {
    header("Location: ../PHP/sair");
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Aprendix ADM</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name="author" content="Anthony/MariaEduarda - Aprendix">
    <link rel='stylesheet' type='text/css' media='screen' href='../CSS/Home_adm.css'>
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

        <div class="perfil">

            <?php
            echo "<h3> $usuario <br><samp>$permisao</samp></h3>"
            ?>

            <div class="imgcx">
                <img src="../imagem/Apredix_user.png" alt="...">
            </div>
        </div>

        <div class="menu">
            <ul>
                <li>
                    <a href="./ADM_gerenciar_User">
                        <ion-icon name="body-outline"></ion-icon>
                        Gerenciar Usuario
                    </a>
                </li>

                <li>
                    <a href="">
                        <ion-icon name="chatbox-ellipses-outline"></ion-icon>
                        Adiministra Chat
                    </a>
                </li>

                <li>
                    <a href="./config">
                        <ion-icon name="settings-outline"></ion-icon>
                        Comfiguração
                    </a>
                </li>

                <li>
                    <a href="./home">
                        <ion-icon name="home-outline"></ion-icon>
                            Home Usuario
                    </a>
                </li>

                <div class="menuextra">

                    <li class="menuextrali">
                        <a href="../php/sair.php">
                            <ion-icon name="log-out-outline"></ion-icon> Deslogar
                        </a>
                    </li>

                    <li class="menuextrali2">
                        <a href="./ADM_home.php">
                            <ion-icon name="home-outline"></ion-icon> Home
                        </a>
                    </li>

                </div>

            </ul>
        </div>
    </nav>



</body>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src='../Javascript/home/main.js'></script>

</html>