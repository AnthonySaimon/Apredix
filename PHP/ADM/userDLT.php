<?php
include '../protocolo/protocolo.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $manager = new protocolo();
    $manager->delete_client($id);

    // Redirecione ou faça algo após a exclusão
    header("Location: ../Gerenciar_user/index.php?erro3");
    exit;
} else {
    // Caso o ID não esteja definido
    header("Location: ../Gerenciar_user/index.php?erro4");
    exit;
}
?>
