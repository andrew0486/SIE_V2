<?php 
    session_start();
    session_destroy();    
    header('Location: ../../view/principal/index.php');
?>

