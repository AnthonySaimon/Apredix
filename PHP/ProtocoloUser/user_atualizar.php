<?php
include '../ADM/protocolo.php';

$manager = new protocolo();

if (!empty($_POST)) {
    $manager->update_client($_POST);
    header("Location: ../../view/config.php");
}
else{
    header("Location: ../../view/config.php");
}
?>
