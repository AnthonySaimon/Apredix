<?php
include '../protocolo/protocolo.php';
$id = $_POST['id'];

$manager = new protocolo();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>

    <link rel="shortcut icon" href="../../imagem/Logo-aprendix.png" type="image/ico" />

     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Kodchasan:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

</head>
<body>


    <h1>Tem certeza que deseja excluir esta conta ⛔</h1>
    <br>
    <form action="../protocolo/userDLT.php" class="aba1" method="POST">
        <div class="lado1">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT9Etrj7SYknitFM3_TL7O2S1YoU7yswbXBLQ&s" alt="">
        </div>

        <div class="lado2">
            <?php foreach ($manager->list_client_by_id($id) as $data) :  ?>
                <input type="hidden" name="id" value="<?= htmlspecialchars($data['id']) ?>">
                
                <input name="id" class="input-style" value="<?= htmlspecialchars($data['id']) ?>" disabled>

                <input name="nome" placeholder="Nome" class="input-style" type="text" value="<?= htmlspecialchars($data['nome']) ?>"disabled>
                <input name="sobrenome" placeholder="Sobrenome" class="input-style" type="text" value="<?= htmlspecialchars($data['sobrenome']) ?>"disabled>
                <input name="email" placeholder="Email" class="input-style" type="email" value="<?= htmlspecialchars($data['email']) ?>"disabled>
                <input name="senha" class="input-style" value="<?= htmlspecialchars($data['senha']) ?>"disabled>
                <input list="browsers" name="permissao" class="input-style" value="<?= htmlspecialchars($data['permissao']) ?>"disabled>
                
                <datalist id="browsers">
                    <option value="ADM">
                    <option value="Use Free">
                    <option value="Use Premium">
                </datalist>

                <div>
                    <button type="submit" class="input-style2">EXCLUIR</button>
                    <a class="input-style" href="../Gerenciar_user/index.php">Cancelar</a>
                </div>
            <?php endforeach; ?>
        </div>
    </form>
    
</body>
</html>