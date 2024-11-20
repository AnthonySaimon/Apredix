<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='./CSS/Login.css'>
    <script src='main.js'></script>
</head>

<body>
    <div class="container">
        <div class="panel">
            <h2>Login</h2>
            <form method="POST" action="./PHP/login.php">
                <div class="bodas">
                    <label for="username">Email:</label>
                    <input type="text" id="username" name="username" required>
                </div>

                <div class="bodas">
                    <label for="password">Senha:</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <br>
                <button class="logar1" type="submit">Logar</button>
                <a class="logar2" href="./view/cadastro.html">Cadastrar</a>
            </form>
            <div class="extra">
                <?php
                // Mostra mensagem de erro, se houver
                if (isset($_GET['erro'])) {
                    $erro = $_GET['erro'];
                    if ($erro == 1) {
                        echo  '<div class="incorreto">
                                   <br>
                                   <h4>Senha incorreta.</h4>
                                   </div>';
                    } elseif ($erro == 2) {
                        echo '<div class="incorreto">
                               <br>
                               <h4>Email não encontrado.</h4>
                               </div>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
    </div>
    </div>

</body>

</html>