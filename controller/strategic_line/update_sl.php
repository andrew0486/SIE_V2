<?php session_start();
    //setlocale(LC_ALL,'es_ES');
    $edit = $_SESSION['edit_strategic_line'];
    $_SESSION['edit_strategic_line']="";
    //echo "este es el ID de la linea ".$edit;
    $status_sl = $_POST['strategic_line_status'];
    $description_sl = strtoupper($_POST['description']);
    //echo "status ".$status_sl." - descr ".$description_sl;
    require_once '../database/consultas.php';
    $updt_sl = new Consulta();
    $updt_sl->setConsulta("UPDATE `sie`.`strategics_lines` SET `STRATEGIC_LINE_STATUS`=".(int)$status_sl.", `DESCRIPTION`='".$description_sl."' WHERE `STRATEGIC_LINE_ID`='$edit'");
    header('Location: ../../view/admin/strategic_line_consult.php');
?>
