<?php

include './protocolo.php';

$manager = new protocolo();
 var_dump($_POST);
if (!empty($_POST)) {
    $manager->Ban_client($_POST);
    header("Location: ../../view/ADM_gerenciar_User.php?erro=5");
}
else {
    header("Location: ../../view/ADM_gerenciar_User.php?erro=6");
}
?>
