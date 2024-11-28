<?php
include '../ADM/protocolo.php';

$manager = new protocolo();
 var_dump($_POST);
if (!empty($_POST)) {
    $manager->update_client($_POST);
    header("../../view/config.php");
}
else{
    header("Location: ../../view/config.php");
}
?>
