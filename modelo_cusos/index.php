<?php
include '../ProtocoloUser/protocolouser.php';
$manager = new protocoloUser();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Aprendix</title>
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

        <div class="menutoggle" id="menutoggle"></div>


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
                    <a href="">
                        <ion-icon name="file-tray-outline"></ion-icon>
                        Biblioteca
                    </a>
                </li>
                <li>
                    <a href="../configuracao/index.html">
                        <ion-icon name="settings-outline"></ion-icon>
                        Comfiguração
                    </a>
                </li>

                <li>
                    <a href="../Chat/index.html">
                        <ion-icon name="chatbox-ellipses-outline"></ion-icon>
                        Chat
                    </a>
                </li>

                <li>
                    <a href="../index.php">
                        <ion-icon name="log-out-outline"></ion-icon>
                        Deslogar
                    </a>
                </li>

            </ul>
        </div>
    </nav>

    <nav class="elementoscusos">
        <div class="abacusos">
            <div class="aba1">
                <img class="abaimg" src="../imagem/Aprendix_sem_foto.png" alt="">

                <div class="subfotos">
                    <div class="elementofotos">
                        <img src="../imagem/Aprendix_sem_foto.png" alt="">
                    </div>

                    <div class="elementofotos">
                        <img src="../imagem/Aprendix_sem_foto.png" alt="">
                    </div>

                    <div class="elementofotos">
                        <img src="../imagem/Aprendix_sem_foto.png" alt="">
                    </div>
                </div>
            </div>

            <div class="aba2">
                <div class="inforcusos">
                    <div class="nomecuso">
                        <h3>Nome do cusor</h3>
                    </div>

                    <div class="descuso">
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In luctus
                            iaculis leo in tempor. Fusce quis eros lectus. Maecenas a euismod tortor.
                            Mauris nunc quam, viverra ut volutpat ac, maximus ac nunc. Etiam mattis
                            ligula a sapien sollicitudin, vitae faucibus ante laoreet. Maecenas non elit
                            hendrerit, pretium lectus eu, mattis velit. Pellentesque facilisis libero non
                            elit sodales semper. Donec mi nisi, molestie id libero placerat, imperdiet tempus
                            ligula. Nulla vel interdum metus. Cras eu interdum velit. Donec magna nibh, semper
                            non vestibulum a, auctor non lectus. Fusce sed finibus est. Proin rhoncus efficitur
                            rhoncus.
                        </li>
                    </div>

                    <div class="boton">
                        <a class="compra" href="">
                            <li>Compra</li>
                        </a>
                        <div class="carrinho">
                            <a href="carrinho.html" target="_blank" rel="noopener noreferrer" class="carrinho">
                                <li>Carrinho</li>
                            </a>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </nav>

    <div class="comentarios">
        <div class="comnome">
            <h2>COMENTARIOS</h2>
        </div>

        <div class="fscoment" id="comentario-1">
            <div class="user">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT9Etrj7SYknitFM3_TL7O2S1YoU7yswbXBLQ&s" alt="">
                <h2 id="usuario-1">Nome de usuario</h2>
            </div>

            <div class="input-container">
                <form action="../ProtocoloUser/adddcommit.php"  method="POST"  class="input-container" id="comentario-form">
                    <input type="text" name="comentario" id="input-comentario" required="">
                    <label for="input-comentario" class="label">Escreva Aqui</label>
                    <div class="underline"></div>
                    <button class="buteviar" type="submit"> <img src="../imagem/bxs-send.png" alt=""> </button>
                </form>
            </div>
        </div>


        <?php foreach ($manager->list_client() as $data) : ?>
        <div class="fscoment">
            <div class="user">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT9Etrj7SYknitFM3_TL7O2S1YoU7yswbXBLQ&s" alt="User">
                <h2>Nome de usuario</h2>
            </div>
            <div class="comentario">
            <?= $data['comentario'] ?>
            </div>
        </div>
        <?php endforeach; ?>

    </div>


    <script>
        // document.getElementById('comentario-form').addEventListener('submit', function(event) {
        //     event.preventDefault();

        //     // Get the input value
        //     const comentarioText = document.getElementById('input-comentario').value;

        //     // Example: You might use a real username here
        //     const usuarioNome = "Nome de usuario";

        //     // Create a new comment element
        //     const novoComentario = document.createElement('div');
        //     novoComentario.className = 'fscoment';
        //     novoComentario.innerHTML = `
        //         <div class="user">
        //             <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT9Etrj7SYknitFM3_TL7O2S1YoU7yswbXBLQ&s" alt="">
        //             <h2>${usuarioNome}</h2>
        //         </div>
        //         <div class="comentario">
        //             ${comentarioText}
        //         </div>
        //     `;

        //     // Append the new comment
        //     document.querySelector('.comentarios').appendChild(novoComentario);

        //     // Clear the input
        //     document.getElementById('input-comentario').value = '';
        // });
    </script>
</body>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src='../home/main.js'></script>

</html>