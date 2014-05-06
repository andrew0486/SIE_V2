<?php session_start();
    @$doc_num = $_SESSION['sesion'];
    $prgm_sl = $_POST['strategic_line'];
    $prgm_name = strtoupper($_POST['program_name']);
    $prgm_status = $_POST['program_status'];
    $prgm_weighting = $_POST['program_weighting'];
    $prgm_objective = strtoupper($_POST['program_objective']);
    $prgm_start_date = $_POST['deadline_start_date'];
    $prgm_end_date = $_POST['deadline_end_date'];
    
    //echo $doc_num;echo $prgm_end_date;echo $prgm_name;echo $prgm_objective;echo $prgm_sl;echo $prgm_start_date;echo $prgm_status;echo $prgm_weighting;
    
    require_once '../database/consultas.php';
    $save_prgm = new Consulta();
    //CREACION DEL PROGRAMA
    $save_prgm->setConsulta("INSERT INTO sie.programs (STRATEGIC_LINE_ID, DOCUMENT_NUMBER, 
            PROGRAM_NAME, PROGRAM_STATUS, PROGRAM_WEIGHTING, PROGRAM_OBJECTIVE) 
            VALUES ($prgm_sl, '$doc_num', '$prgm_name', $prgm_status, $prgm_weighting, '$prgm_objective')");
    
    //hallar el id de a anterior consulta
    $save_prgm->setConsulta("SELECT * FROM sie.PROGRAMS S
        WHERE S.PROGRAM_ID LIKE(
        SELECT MAX(P.PROGRAM_ID) FROM sie.PROGRAMS P)");
    $max_id = mysql_fetch_array($save_prgm->getConsulta());
    
    //CREACION DE DEADLINE
    $save_prgm->setConsulta("INSERT INTO sie.deadlines (PROGRAM_ID, DEADLINE_START_DATE, DEADLINE_END_DATE) 
        VALUES (".$max_id['PROGRAM_ID'].", '".$prgm_start_date."', '".$prgm_end_date."')");
    
    header('Location: ../../view/admin/programs_consult.php');
?>
