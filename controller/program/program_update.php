<?php session_start();
    $edit = $_SESSION['program_edit'];
    //ECHO 'esta en update program '.$edit;
    $prg_status = $_POST['program_status'];
    $prg_weighting = $_POST['program_weighting'];
    $prg_objective = strtoupper($_POST['program_objective']);
    
    //echo $prg_status." ".$prg_weighting." ".$prg_objective;

    require_once '../database/consultas.php';
    $consulta = new Consulta();
    $consulta->setConsulta("UPDATE sie.programs SET PROGRAM_STATUS=$prg_status, PROGRAM_WEIGHTING=$prg_weighting, PROGRAM_OBJECTIVE='$prg_objective' WHERE PROGRAM_ID='$edit'");
    
    $_SESSION['program_edit'] = "";
    
    header('Location: ../../view/admin/programs_consult.php');
    
?>
