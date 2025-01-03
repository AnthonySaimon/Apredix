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

$tudo = $_SESSION['tudo'];
//-----------------------------------------
$nome = $tudo['nome'];
$sobrenome = $tudo['sobrenome'];
$permit = $tudo['permissao'];
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Anthony/MariaEduarda - Aprendix">
    <title>Perfil</title>
    <link rel="stylesheet" href="../CSS/Usuario.css">
    <link rel="shortcut icon" href="../imagem/Logo-aprendix.png" type="image/ico" />
</head>

<body>
    <div class="perfil-container">
        <div class="header">
            PERFIL
        </div>
        <div class="content">
            <div>
                <div class="profile-picture">
                    <img src="default-profile.png" alt="Foto do perfil" id="profileImage">
                    <button id="changePhotoBtn">Alterar Foto</button>
                    <input type="file" id="uploadPhotoInput" style="display: none;">
                </div>

                <?php
                echo "<h2 id='username'>$nome $sobrenome</h2>";
                ?>
            </div>

            <div class="Segunta-part">
                <div class="change-username">
                    <label for="newUsername">Alterar Nome de Usuário:</label>
                    <input type="text" id="newUsername" placeholder="Digite um novo nome">
                    <button id="saveUsername">Salvar</button>
                </div>
                <div class="bio">
                    <label for="bioInput">Bio:</label>
                    <textarea id="bioInput" maxlength="150" placeholder="Escreva sua bio aqui..."></textarea>
                    <span id="bioCount">0/150</span>

                </div>
                <div class="category">
                    <label for="category">Categoria:</label>
                    <div id="userCategory">

                        <?php
                        echo "<p>$permit</p>";
                        ?>

                    </div>
                </div>
            </div>


        </div>
    </div>

    <script src="../Javascript/User/scripts.js"></script>
</body>

</html>