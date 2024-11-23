<?php
// Mostra mensagem de erro, se houver
if (isset($_GET['erro'])) {
    $comando = 'erros';
} else {
    $comando = 'Nerros';
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='./CSS/login.css'>
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
                <div class="oi">
                    <p>Não tem uma conta ?</p>
                    <a class="logar2" href="./view/cadastro.html">Inscrevar-se</a>
                </div>

            </form>
            <div class="extra">
                <div class='<?php echo "$comando"; ?>'>

                    <?php
                    // Mostra mensagem de erro, se houver
                    if (isset($_GET['erro'])) {
                        $erro = $_GET['erro'];
                        if ($erro == 1) {
                            echo  '<ion-icon name="warning"></ion-icon> <p>erro, eu so o melhor</p>';
                        } elseif ($erro == 2) {
                            echo '<ion-icon name="warning"></ion-icon> <p>erro, eu so o melhor</p>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

</body>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</html>