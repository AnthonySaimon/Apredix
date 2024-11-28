<?php
include './protocolo.php';

$manager = new protocolo();
 var_dump($_POST);
if (!empty($_POST)) {
    $manager->update_client($_POST);
    header("Location: ../../view/ADM_gerenciar_User.php?erro=1");
}
else{
    header("Location: ../../view/ADM_gerenciar_User.php?erro=1");
}
?>
