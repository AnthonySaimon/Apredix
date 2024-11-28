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
    <title>Configurações</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name="author" content="Anthony/MariaEduarda - Aprendix">
    <link rel='stylesheet' type='text/css' media='screen' href='../CSS/config_pagamento.css'>
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

        <a href="./usuario">
            <div class="perfil">

                <?php
                echo "<h3> $usuario <br><samp>$permisao</samp></h3>"
                ?>

                <div class="imgcx">
                    <img src="../imagem/Apredix_user.png" alt="...">
                </div>
            </div>
        </a>

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

    <div class="inv"></div>

    <div class="janelas">

        <div class="janelas1">

            <a href="./config.php" class="caixa">
                <ion-icon name="person-outline"></ion-icon>
                Usuario
            </a>

            <a href="./config_pagamento.php" class="on">
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

            <h2 class="titulo">Pagamentos</h2>

            <a href="">
                <h4>Adicionar Cartão</h4>
            </a>

            <div class="cartao">
                <div class="card-container">
                    <div class="card-box">
                        <div class="card-head">
                            <div class="card-chip">
                                <svg viewBox="0 0 26 26" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5.813 2C2.647 2 0 4.648 0 7.813v10.375C0 21.352 2.648 24 5.813 24h14.375C23.352 24 26 21.352 26 18.187V7.813C26 4.649 23.352 2 20.187 2H5.813zm0 2h14.375C22.223 4 24 5.777 24 7.813V9h-6c-.555 0-1-.445-1-1c0-.555.445-1 1-1a1 1 0 1 0 0-2c-1.645 0-3 1.355-3 3c0 1.292.844 2.394 2 2.813v4.968c-1.198.814-2 2.18-2 3.719c0 .923.293 1.781.781 2.5H10.22a4.439 4.439 0 0 0 .78-2.5c0-1.538-.802-2.905-2-3.719v-4.969c1.156-.418 2-1.52 2-2.812c0-1.645-1.355-3-3-3H6a1 1 0 0 0-.094 0a1.001 1.001 0 0 0-.093 0A1.004 1.004 0 0 0 6 7h2c.555 0 1 .445 1 1c0 .555-.445 1-1 1H2V7.812C2 5.777 3.777 4 5.813 4zM2 11h5v4H2v-4zm17 0h5v4h-5v-4zM2 17h4.5C7.839 17 9 18.161 9 19.5S7.839 22 6.5 22h-.688C3.777 22 2 20.223 2 18.187V17zm17.5 0H24v1.188C24 20.223 22.223 22 20.187 22H19.5c-1.339 0-2.5-1.161-2.5-2.5s1.161-2.5 2.5-2.5z"
                                        fill="currentcolor"></path>
                                </svg>
                            </div>
                            <div class="card-logo">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <g fill-rule="evenodd" fill="none">
                                        <circle r="7" fill="#ea001b" cy="12" cx="7"></circle>
                                        <circle
                                            r="7"
                                            fill-opacity=".8"
                                            fill="#ffa200"
                                            cy="12"
                                            cx="17"></circle>
                                    </g>
                                </svg>
                            </div>
                        </div>
                        <div class="card-number-row">
                            <span> --- --- ---- 8910</span>
                        </div>
                        <div class="card-details">
                            <div class="card-holder-col">
                                <span class="card-holder-title">NOME DO TITULAR</span>
                                <span class="card-holder-name">VALIDADE</span>
                            </div>
                            <div class="card-date-col">
                                <span class="card-date-title">VALID THRU</span>
                                <span class="card-date-sub">06/26</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="erro">
                <div class="conversas">
                    <ion-icon name="warning-outline"></ion-icon>
                    <p>Essa parte pode não esta funcionando, Nos desculpe</p>
                </div>
            </div>

            <br>

            <h2 class="titulo">Assinatura Ativas</h2>

            <div class="erro">
                <div class="conversas">
                    <ion-icon name="warning-outline"></ion-icon>
                    <p>Estamos com dificuldade nesta parte, tenha paciência</p>
                </div>
            </div>
        </div>

    </div>

</body>

<script src='../Javascript/home/main.js'></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</html>