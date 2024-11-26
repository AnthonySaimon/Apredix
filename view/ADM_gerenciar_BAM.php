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
    <meta name="author" content="Anthony/MariaEduarda - Aprendix">
    <link rel='stylesheet' type='text/css' media='screen' href='../CSS/gerenciar_bam.css'>
    <link rel="shortcut icon" href="../../imagem/Logo-aprendix.png" type="image/ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Kodchasan:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

</head>

<body>


    <div class="ifro">
        <?php foreach ($manager->list_client_by_id($id) as $data) : ?>
            <form action="../PHP/ADM/userBAN.php" method="POST">
                <img class="img_fot" src="../imagem/ECG_chat.png" alt="">
                <div class="ifro_div ">
                    <ul class="elemento_ifor">
                        <INPUT TYPE="hidden" name="id" value="<?= htmlspecialchars($data['id']) ?>">
                        <input TYPE="hidden" name="nome" placeholder="Nome" class="input-style" type="text" value="<?= htmlspecialchars($data['nome']) ?>">
                        <input TYPE="hidden" name="sobrenome" placeholder="Sobrenome" class="input-style" type="text" value="<?= htmlspecialchars($data['sobrenome']) ?>">
                        <input TYPE="hidden" name="email" placeholder="Email" class="input-style" type="email" value="<?= htmlspecialchars($data['email']) ?>">
                        <input TYPE="hidden" name="senha" class="input-style" value="<?= htmlspecialchars($data['senha']) ?>">
                        <input TYPE="hidden" list="browsers" name="permissao" class="input-style" value="<?= htmlspecialchars($data['permissao']) ?>">


                        <h3><?= htmlspecialchars($data['nome']) ?> <?= htmlspecialchars($data['sobrenome']) ?></h3>
                        <li><?= htmlspecialchars($data['email']) ?></li>
                        <li><?= htmlspecialchars($data['permissao']) ?></li>
                    </ul>
                    <div>
                        <a class="input-style2" href="../Gerenciar_user/">Cancelar</a>
                        <button class="input-style">Banir</button>
                    </div>

                </div>
            </form>
        <?php endforeach; ?>
    </div>



</body>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src='../Javascript/home/main.js'></script>

</html>