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
$manager = new protocolo();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Tela de Cadastro</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name="author" content="Anthony/MariaEduarda - Aprendix">
    <link rel='stylesheet' type='text/css' media='screen' href='../CSS/gerenciar_user_add.css'>
</head>

<body>
    <div class="container">
        <div class="panel">
            <h2>Cadastro por ADM</h2>
            <form method="POST" action="../PHP/ADM/cadastro.php">

                <div id="nome">

                    <div>
                        <label for="fullname">Nome:</label>
                        <input type="text" id="fullname" name="fullname" required>
                    </div>
                    <div>
                        <label for="leftname">Sobrenome:</label>
                        <input type="text" id="leftname" name="leftname" required>
                    </div>

                </div>

                <div id="nome">

                    <div>
                        <label for="email">E-mail:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div>
                        <label for="password">Senha:</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                </div>

                <label for="permissao">Permição:</label>
                <input list="browsers" type="permissao" id="permissao" name="permissao" required>
                <datalist id="browsers">
                    <option value="ADM">
                    <option value="Use Free">
                    <option value="Use Premium">
                </datalist>

                <div class="t1">
                    <button class="logar1" type="submit">Cadastrar</button>
                    <a href="./ADM_gerenciar_User.php" class="exit-btn">Cancelar</a>
                </div>

            </form>
            <br>

        </div>
    </div>
</body>

</html>