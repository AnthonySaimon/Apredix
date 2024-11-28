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
    <title>Chat</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name="author" content="Anthony/MariaEduarda - Aprendix">
    <link rel='stylesheet' type='text/css' media='screen' href='../CSS/CHat.css'>
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

    <div class="chat-elemento">


        <div class="aba-chat">
            <div class="conversas">
                <img src="../imagem/ECG_chat.png" alt="">
                <ul>
                    <h2>Nome do Chat<h2>
                            <li>Criador</li>
                </ul>
            </div>

            <a href="./adicionar_chat.php">
                <div class="addchat">
                    <ion-icon name="add-outline"></ion-icon>
                </div>
            </a>

        </div>

        <div class="chat">
            <section class="chat__messages"></section> <!-- Onde as mensagens serão exibidas -->

            <form class="caixachat" id="chatForm">
                <input placeholder="Digite aqui ..." class="input" name="text" type="text" id="messageInput">

                <!-- Botão de "+" ao lado do botão de enviar -->
                <button type="button" class="add-button" id="addButton">+</button>

                <!-- Botão de enviar, agora tem o tipo 'submit' -->
                <button type="submit" class="buteviar">
                    <img src="../imagem/bxs-send.png" alt="">
                </button>

                <!-- Menu suspenso que será mostrado quando clicar no botão "+" -->
                <div class="dropdown-menu" id="dropdownMenu" style="display: none;">

                    <button type="button" class="location-button" id="locationButton">
                        <ion-icon name="location-outline"></ion-icon> Enviar Localização
                    </button>

                    <button class="camera-button">
                        <ion-icon name="camera-outline"></ion-icon> Enviar Foto
                    </button> <!-- Novo botão da câmera -->
                </div>
            </form>
            <div class="camera-container" style="display: none;">
                <video id="video" width="300" height="300" autoplay></video>
                <button id="capture-button">Capturar Foto</button>
                <canvas id="canvas" style="display: none;"></canvas>
            </div>

        </div>

        <script>
            const chatForm = document.getElementById('chatForm');
            const messageInput = document.getElementById('messageInput');
            const chatMessages = document.querySelector('.chat__messages');
            const addButton = document.getElementById('addButton');
            const dropdownMenu = document.getElementById('dropdownMenu');
            const locationButton = document.getElementById('locationButton');

            // Enviar mensagem

            // Enviar mensagem
            chatForm.addEventListener('submit', function(event) {
                event.preventDefault(); // Evitar o comportamento padrão do formulário

                const messageText = messageInput.value.trim();
                if (messageText) {
                    // Adicionar mensagem ao chat
                    const messageElement = document.createElement('div');
                    messageElement.textContent = messageText;
                    messageElement.classList.add('message'); // Adicionar classe para estilizar a mensagem
                    chatMessages.appendChild(messageElement);
                    messageInput.value = ''; // Limpar o campo de entrada
                    chatMessages.scrollTop = chatMessages.scrollHeight; // Rolagem para a mensagem mais recente
                }
            });



            // Mostrar/Ocultar menu suspenso
            addButton.addEventListener('click', function() {
                dropdownMenu.style.display = dropdownMenu.style.display === 'none' ? 'block' : 'none';
            });

            // Enviar localização
            locationButton.addEventListener('click', function() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        const lat = position.coords.latitude;
                        const lon = position.coords.longitude;
                        // Adicionar a localização ao chat
                        const locationMessage = `Localização: https://www.google.com/maps?q=${lat},${lon}`;
                        const messageElement = document.createElement('div');
                        messageElement.textContent = locationMessage;
                        chatMessages.appendChild(messageElement);
                        chatMessages.scrollTop = chatMessages.scrollHeight; // Rolagem para a mensagem mais recente
                        dropdownMenu.style.display = 'none'; // Fechar o menu após o envio
                    });
                } else {
                    alert('Geolocalização não é suportada neste navegador.');
                }
            });
            document.querySelector('.camera-button').addEventListener('click', async () => {
                // Verifica se o navegador suporta o acesso à câmera
                if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                    try {
                        // Pede permissão para acessar a câmera
                        const stream = await navigator.mediaDevices.getUserMedia({
                            video: true
                        });
                        const video = document.getElementById('video');
                        video.srcObject = stream;

                        // Mostra o contêiner da câmera
                        document.querySelector('.camera-container').style.display = 'block';

                        // Captura a foto ao clicar no botão
                        document.getElementById('capture-button').onclick = () => {
                            const canvas = document.getElementById('canvas');
                            const context = canvas.getContext('2d');
                            canvas.width = video.videoWidth;
                            canvas.height = video.videoHeight;
                            context.drawImage(video, 0, 0);

                            // Para o stream da câmera
                            stream.getTracks().forEach(track => track.stop());

                            // Converte a imagem para URL de dados e envia
                            const imageDataUrl = canvas.toDataURL('image/png');
                            enviarImagemParaChat(imageDataUrl);

                            // Oculta o contêiner da câmera
                            document.querySelector('.camera-container').style.display = 'none';
                        };
                    } catch (error) {
                        console.error("Erro ao acessar a câmera: ", error);
                    }
                } else {
                    alert("A câmera não é suportada neste navegador.");
                }
            });

            // Função para enviar a imagem para o chat
            function enviarImagemParaChat(imageDataUrl) {
                // Crie uma nova mensagem com a imagem
                const messageContainer = document.createElement('div');
                messageContainer.className = 'message';
                const img = document.createElement('img');
                img.src = imageDataUrl;
                img.style.maxWidth = '100%'; // Limita o tamanho da imagem
                messageContainer.appendChild(img);

                // Adiciona a mensagem ao chat
                document.querySelector('.chat__messages').appendChild(messageContainer);
            }
        </script>

</body>

</html>

</div>


</div>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src='../Javascript/home/main.js'></script>


</body>




</html>