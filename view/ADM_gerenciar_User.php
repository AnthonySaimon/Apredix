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
if ($_SESSION['permissao'] === "ADM") {
} else {
    header("Location: ../PHP/sair");
}
if ($_SESSION['permissao'] === "Banido") 
{    
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
    <title>Gerenciar Usuario</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name="author" content="Anthony/MariaEduarda - Aprendix">
    <link rel='stylesheet' type='text/css' media='screen' href='../CSS/gerenciar_user.css'>
    <link rel="shortcut icon" href="../../imagem/Logo-aprendix.png" type="image/ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kodchasan:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

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
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT9Etrj7SYknitFM3_TL7O2S1YoU7yswbXBLQ&s"
                    alt="...">
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
                        <ion-icon name="code-working-outline"></ion-icon> Depuração
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

    <nav class="user">
        <div class="nome">
            <li>Usuarios registrados</li>

            <form method="POST" action="../view/ADM_gerenciar_user_add">
                <input type="hidden" name="id">
                <button class="bt_add" type="submit">
                    <ion-icon name="person-add-outline"></ion-icon>
                </button>
            </form>

        </div>

        <?php
        // Mostra mensagem de erro, se houver
        if (isset($_GET['erro'])) {
            $erro = $_GET['erro'];
            if ($erro == 1) {
                echo  '<div class="C"> <h3>Foi Atualizado com sucesso </h3> <a href="./ADM_gerenciar_User.php"> <ion-icon name="close-sharp"></ion-icon></a></div>';
            } elseif ($erro == 2) {
                echo '<div class="E"> <h3>Erro ao Inserir</h3> <a href="./ADM_gerenciar_User.php"> <ion-icon name="close-sharp"></ion-icon></a></div>';
            } elseif ($erro == 3) {
                echo  '<div class="C"> <h3>Foi Excluido com sucesso</h3> <a href="./ADM_gerenciar_User.php"> <ion-icon name="close-sharp"></ion-icon></a></div>';
            } elseif ($erro == 4) {
                echo  '<div class="E"> <h3>Erro com ID do usuario</h3> <a href="./ADM_gerenciar_User.php"> <ion-icon name="close-sharp"></ion-icon></a></div>';
            } elseif ($erro == 5) {
                echo  '<div class="C"> <h3>Foi Banir com sucesso</h3> <a href="./ADM_gerenciar_User.php"> <ion-icon name="close-sharp"></ion-icon></a></div>';
            } elseif ($erro == 6) {
                echo  '<div class="E"> <h3>Erro ou banir o usuario</h3> <a href="./ADM_gerenciar_User.php"> <ion-icon name="close-sharp"></ion-icon></a></div>';
            }
        }
        ?>


        <?php foreach ($manager->list_client() as $data) : ?>
            <div class="elemuser">
                <div class="aba1">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT9Etrj7SYknitFM3_TL7O2S1YoU7yswbXBLQ&s" alt="">
                    <div class="nomeuser">
                        <ul>
                            <h1><?= $data['nome'] ?> <?= $data['sobrenome'] ?></h1>
                            <li><?= $data['permissao'] ?></li>
                            <li><?= $data['id'] ?></li>
                        </ul>
                    </div>
                </div>

                <div class="aba2">

                    <form method="POST" action="../view/ADM_gerenciar_User_editar.php">
                        <input type="hidden" name="id" value=<?= $data['id'] ?>>
                        <button class="bt_edt" type="submit">
                            <ion-icon name="create-outline"></ion-icon>
                        </button>
                    </form>

                    <form method="POST" action="../view/ADM_gerenciar_user_delet.php">
                        <input type="hidden" name="id" value=<?= $data['id'] ?>>
                        <button class="bt_dlt" type="submit">
                            <ion-icon name="trash-outline"></ion-icon>
                        </button>
                    </form>

                    <form method="POST" action="../view/ADM_gerenciar_BAM.php">
                        <input type="hidden" name="id" value=<?= $data['id'] ?>>
                        <button class="bt_bam" type="submit">
                            <ion-icon name="ban"></ion-icon>
                        </button>
                    </form>

                </div>
            </div>
        <?php endforeach; ?>

    </nav>


</body>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src='../Javascript/home/main.js'></script>

</html>