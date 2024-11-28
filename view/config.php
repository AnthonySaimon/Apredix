<?php
session_start();
if ((!isset($_SESSION['id']) == true) and (!isset($_SESSION['permissao']) == true)) {
    unset($_SESSION['id']);
    unset($_SESSION['usuario']);
    unset($_SESSION['permissao']);
    header("Location: ../index.php");
}
$_tudo = ($_SESSION['tudo']);

$email = $_tudo['email'];
$senha = $_tudo['senha'];
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
    <title>Configurações</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name="author" content="Anthony/MariaEduarda - Aprendix">
    <link rel='stylesheet' type='text/css' media='screen' href='../CSS/Config.css'>
    <link rel="shortcut icon" href="../imagem/Logo-aprendix.png" type="image/ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&family=SUSE:wght@100..800&display=swap"
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
                    <a href="">
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

    <div class="inv"></div>

    <div class="janelas">

        <div class="janelas1">

            <a href="./config.php" class="on">
                <ion-icon name="person-outline"></ion-icon>
                Usuario
            </a>

            <a href="./config_pagamento.php" class="caixa">
                <ion-icon name="wallet-outline"></ion-icon>
                Pagamento
            </a>

            <a href="./config_Segurancao.php" class="caixa">
                <ion-icon name="eye-off-outline"></ion-icon>
                Senha e Seguranção
            </a>

            <a href="./config_ET.php" class="caixa">
                <ion-icon name="git-compare-outline"></ion-icon>
                Conexão
            </a>

            <a href="./config_ET.php" class="caixa">
                <ion-icon name="file-tray-full-outline"></ion-icon>
                Historico
            </a>

        </div>

        <div class="janelas2">

            <h2 class="titulo">Configurações da conta</h2>
            <li>Gerencie os detalhes de sua conta.</li>

            <div class="Ppart">
                <h3>Informações da conta</h3>
                <br>
                <h2>ID: <?php echo $id; ?></h3>

                    <div class="form1">

                        <form method="POST" action="../PHP/ProtocoloUser/user_atualizar.php">
                            <h4>Nome de exibição</h4>
                            <div>
                                <INPUT TYPE="hidden" name="id" value="<?php echo "$id" ?>">
                                <INPUT TYPE="hidden" name="sobrenome" value="">
                                <INPUT TYPE="hidden" name="email" value="<?php echo "$email" ?>">
                                <INPUT TYPE="hidden" name="senha" value="<?php echo "$senha" ?>">
                                <INPUT TYPE="hidden" name="permissao" value="<?php echo "$permisao" ?>">
                                <div class="flx">
                                    <h4>Nome</h4>
                                    <input type="text" name="nome" class="input-style" id="">
                                </div>
                                <div class="flx">
                                    <h4>Sobrenome</h4>
                                    <input type="text" name="sobrenome" class="input-style" id="">
                                </div>
                                <button type="submit"><ion-icon name="create-outline"></ion-icon></button>
                            </div>
                        </form>

                        <form method="POST" action="../imagem/404error.gif">
                            <h4>Endereço de E-mail</h4>
                            <div>
                                <input type="email" name="username" class="input-style" id="">
                                <button type="submit"><ion-icon name="create-outline"></ion-icon></button>
                            </div>
                        </form>
                    </div>
            </div>

            <div class="abaexcluir">
                <h2>Excluir conta</h2>

                <p>Ao solicitar a exclusão da sua conta, todos os seus dados serão permanentemente apagados. Esta ação não pode ser desfeita.</p>
                <form method="POST" action="../PHP/ADM/userDLT.php">

                    <input type="hidden" name="id" value="<?php echo "$id";   ?>">

                    <button type="submit">
                        <h3>Solicita Exclusão</h3>
                    </button>
                    <?php
                    // Mostra mensagem de erro, se houver
                    if (isset($_GET['erro'])) {
                        $erro = $_GET['erro'];
                        if ($erro == 1) {
                            echo  '<div class="C"><h3> Aconteceu um erro, estamos trabalhando nisso </h3></div>';
                        }
                    }
                    ?>
                </form>
            </div>


        </div>

    </div>

</body>

<script src='../Javascript/home/main.js'></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</html>