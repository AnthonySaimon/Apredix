<?php

include './protocolouser.php';

$manager = new protocoloUser();
 var_dump($_POST);
if (!empty($_POST)) {
    $manager->add_comentario($_POST);
    header("Location: ../modelo_cusos/index.php");
}


?>