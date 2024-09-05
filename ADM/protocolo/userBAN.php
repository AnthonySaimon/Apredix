<?php

include '../protocolo/protocolo.php';

$manager = new protocolo();
 var_dump($_POST);
if (!empty($_POST)) {
    $manager->Ban_client($_POST);
    header("Location: ../Gerenciar_user/index.php?erro=5");
}
else {
    header("Location: ../Gerenciar_user/index.php?erro=6");
}
?>
