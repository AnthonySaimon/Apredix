<?php

include './protocolouser.php';

$manager = new protocoloUser();
 var_dump($_POST);
if (!empty($_POST)) {
    $manager->add_comentario($_POST);
    header("Location: ../../view/Modelo_cusos/index.php");
}


?>