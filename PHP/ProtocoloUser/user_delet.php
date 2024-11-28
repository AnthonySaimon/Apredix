<?php
include './protocolo.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $manager = new protocolo();
    $manager->delete_client($id);

    // Redirecione ou faça algo após a exclusão
    header("Location: ../../index");
    exit;
} else {
    // Caso o ID não esteja definido
    header("Location: ../../view/config.php?erro1");
    exit;
}
?>