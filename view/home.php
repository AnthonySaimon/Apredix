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
    <title>Aprendix</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name="author" content="Anthony/MariaEduarda - Aprendix">
    <link rel='stylesheet' type='text/css' media='screen' href='../CSS/home.css'>
    <link rel="shortcut icon" href="../imagem/Logo-aprendix.png" type="image/ico" />
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
                    <a href="./biblioteca.php">
                        <ion-icon name="file-tray-outline"></ion-icon>
                        Biblioteca
                    </a>
                </li>
                <li>
                    <a href="./config.php">
                        <ion-icon name="settings-outline"></ion-icon>
                        Configuração
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



    <div class="slider">

        <div class="slides">
            <input type="radio" name="radio-btn" id="radio1">
            <input type="radio" name="radio-btn" id="radio2">
            <input type="radio" name="radio-btn" id="radio3">
            <input type="radio" name="radio-btn" id="radio4">

            <div class="slide first">
                <img src="../imagem/slider_1.png" alt="natureza">
            </div>

            <div class="slide">
                <img src="../imagem/slider_2.png" alt="natureza">
            </div>

            <div class="slide">
                <img src="../imagem/Aprendix_sem_foto.png" alt="natureza">
            </div>

            <div class="slide">
                <img src="../imagem/Aprendix_sem_foto.png" alt="natureza">
            </div>

            <div class="navigation-auto">
                <div class="auto-btn1"></div>
                <div class="auto-btn2"></div>
                <div class="auto-btn3"></div>
                <div class="auto-btn4"></div>
            </div>

        </div>

        <div class="manual-navigation">
            <label for="radio1" class="manual-btn"></label>
            <label for="radio2" class="manual-btn"></label>
            <label for="radio3" class="manual-btn"></label>
            <label for="radio4" class="manual-btn"></label>
        </div>

    </div>

    <div class="abacusos">
        <div class="nome">
            <h2>Seu Cusos</h2>
        </div>

        <div class="cusos">

            <div class="elemento">
                <div class="fotoaba"><img class="ing" src="../imagem/Logo-aprendix.png" alt=""></div>
                <a href="./cusos.php">
                    <img src="../imagem/Aprendix_sem_cusos.png" alt="cusos">
                </a>
            </div>

            <div class="elemento">
                <div class="fotoaba"><img class="ing" src="../imagem/Logo-aprendix.png" alt=""></div>
                <a href="./cusos.php">
                    <img src="../imagem/Aprendix_sem_cusos.png" alt="cusos">
                </a>
            </div>

            <div class="elemento">
                <div class="fotoaba"><img class="ing" src="../imagem/Logo-aprendix.png" alt=""></div>
                <a href="./cusos.php">
                    <img src="..//imagem/Aprendix_sem_cusos.png" alt="cusos">
                </a>
            </div>

            <div class="elemento">
                <div class="fotoaba"><img class="ing" src="../imagem/Logo-aprendix.png" alt=""></div>
                <a href="./cusos.php">
                    <img src="../imagem/Aprendix_sem_cusos.png" alt="cusos">
                </a>
            </div>

            <div class="elemento">
                <div class="fotoaba"><img class="ing" src="../imagem/Logo-aprendix.png" alt=""></div>
                <a href="./cusos.php">
                    <img src="../imagem/Aprendix_sem_cusos.png" alt="cusos">
                </a>
            </div>

        </div>

        <div class="nome">
            <h2>Cusos</h2>
        </div>

        <div class="cusos">

            <div class="elemento">
                <div class="fotoaba"><img class="ing" src="../imagem/Logo-aprendix.png" alt=""></div>
                <a href="./cusos.php">
                    <img src="../imagem/Aprendix_sem_cusos.png" alt="cusos">
                </a>
            </div>

            <div class="elemento">
                <div class="fotoaba"><img class="ing" src="../imagem/Logo-aprendix.png" alt=""></div>
                <a href="./cusos.php">
                    <img src="../imagem/Aprendix_sem_cusos.png" alt="cusos">
                </a>
            </div>

            <div class="elemento">
                <div class="fotoaba"><img class="ing" src="../imagem/Logo-aprendix.png" alt=""></div>
                <a href="./cusos.php">
                    <img src="../imagem/Aprendix_sem_cusos.png" alt="cusos">
                </a>
            </div>

            <div class="elemento">
                <div class="fotoaba"><img class="ing" src="../imagem/Logo-aprendix.png" alt=""></div>
                <a href="./cusos.php">
                    <img src="../imagem/Aprendix_sem_cusos.png" alt="cusos">
                </a>
            </div>

            <div class="elemento">
                <div class="fotoaba"><img class="ing" src="../imagem/Logo-aprendix.png" alt=""></div>
                <a href="./cusos.php">
                    <img src="../imagem/Aprendix_sem_cusos.png" alt="cusos">
                </a>
            </div>

        </div>

    </div>


</body>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script defer src='../Javascript/home/main.js'></script>

</html>