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

include '../PHP/ADM/protocolo.php';
$id = $_POST['id'];
$manager = new protocolo();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Aprendix</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../CSS/genrenciar_user_edt.css'>
    <link rel="shortcut icon" href="../imagem/Logo-aprendix.png" type="image/ico" />

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
                    <a href="">
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
                        <a href="">
                            <ion-icon name="home-outline"></ion-icon> Home
                        </a>
                    </li>

                </div>

            </ul>
        </div>
    </nav>

    <form action="../PHP/ADM/userUP.php" class="aba1" method="POST">
        <div class="lado1">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT9Etrj7SYknitFM3_TL7O2S1YoU7yswbXBLQ&s" alt="">
        </div>

        <div class="lado2">
            <?php foreach ($manager->list_client_by_id($id) as $data) : ?>
                <INPUT TYPE="hidden" name="id" value="<?= htmlspecialchars($data['id']) ?>">
                <input name="id" class="input-style" value="<?= htmlspecialchars($data['id']) ?>" disabled>

                <input name="nome" placeholder="Nome" class="input-style" type="text" value="<?= htmlspecialchars($data['nome']) ?>">
                <input name="sobrenome" placeholder="Sobrenome" class="input-style" type="text" value="<?= htmlspecialchars($data['sobrenome']) ?>">
                <input name="email" placeholder="Email" class="input-style" type="email" value="<?= htmlspecialchars($data['email']) ?>">
                <input name="senha" class="input-style" value="<?= htmlspecialchars($data['senha']) ?>">
                <input list="browsers" name="permissao" class="input-style" value="<?= htmlspecialchars($data['permissao']) ?>">
                <datalist id="browsers">
                    <option value="ADM">
                    <option value="Use Free">
                    <option value="Use Premium">
                </datalist>

                <div>
                    <button type="submit" class="input-style2">Atualizar</button>
                    <a class="input-style" href="./ADM_gerenciar_User.php">Cancelar</a>
                </div>
            <?php endforeach; ?>
        </div>
    </form>

</body>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src='../Javascript/home/main.js'></script>


</html>