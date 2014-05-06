<?php session_start();
    @$py = $_SESSION['save_py'];
    unset($py[$_GET['year']]);
    $_SESSION['save_py']=$py;
    header('Location: ../../view/admin/project_year.php');
?>
