<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Aprendix ADM</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='Main.css'>
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
            <h3>Usuario <br><samp>aaaaa</samp></h3>
            <div class="imgcx">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT9Etrj7SYknitFM3_TL7O2S1YoU7yswbXBLQ&s"
                    alt="...">
            </div>
        </div>
        <div class="menu">
            <ul>
                <li>
                    <a href="./Gerenciar_user/index.php">
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
                    <a href="../configuracao/index.html">
                        <ion-icon name="settings-outline"></ion-icon>
                        Comfiguração
                    </a>
                </li>

                <li>
                    <a href="../sair.php">
                        ---
                    </a>
                </li>

                <div class="menuextra">

                    <li class="menuextrali">
                        <a href="../sair.php">
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

    <div class="avisos">

        <div class="celulaDNC">
            <h2>+99</h2>
            <h3>Denuncia</h3>
        </div>

        <div class="celulaBAN">
            <h2>+99</h2>
            <h3>Banidos</h3>
        </div>

        <div class="celulaSCT">
            <h2>+99</h2>
            <h3>Solicitasao</h3>
        </div>

        <div class="celulaUSE">
            <h3>Usuario Ativo</h3>
            <h2>+99</h2>
        </div>

    </div>


</body>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src='../home/main.js'></script>

</html>