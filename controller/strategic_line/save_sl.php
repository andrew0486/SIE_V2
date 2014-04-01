<?php session_start();
    $name_sl = strtoupper($_POST['strategic_line_name']);
    $start_date_sl = $_POST['strategic_line_start_date'];
    $date_end_sl = $_POST['deadline_start_end_date'];
    $status_sl = $_POST['strategic_line_status'];
    $description_sl = strtoupper($_POST['description']);
    $doc_num = $_SESSION['sesion'];
    
    require_once '../database/consultas.php';
    //INSERT INTO `sie`.`strategics_lines` (`STRATEGIC_LINE_ID`, `STRATEGIC_LINE_NAME`, `STRATEGIC_LINE_STAR_DATE`, `STRATEGIC_LINE_STATUS`, `DESCRIPTION`) VALUES (3, 'PRUEBA4', '2014-03-02', 1, 'ESTA ES UNA LINEA ESTRATéGICA ');

    $save_sl = new Consulta();
    $save_sl->setConsulta("INSERT INTO `sie`.`strategics_lines` (`DOCUMENT_NUMBER`, `STRATEGIC_LINE_NAME`, `STRATEGIC_LINE_STAR_DATE`, `STRATEGIC_LINE_STATUS`, `DESCRIPTION`)
        VALUES ('".$doc_num."', '$name_sl', '$start_date_sl', $status_sl, '$description_sl')");
    
    $save_sl->setConsulta("SELECT * FROM sie.STRATEGICS_LINES S
        WHERE S.STRATEGIC_LINE_ID LIKE(
        SELECT MAX(P.STRATEGIC_LINE_ID) FROM sie.STRATEGICS_LINES P)");
    $max_id = mysql_fetch_array($save_sl->getConsulta());

    $save_sl->setConsulta("INSERT INTO `sie`.`deadlines` (`STRATEGIC_LINE_ID`, `DEADLINE_START_DATE`, `DEADLINE_END_DATE`) 
        VALUES ('".$max_id['STRATEGIC_LINE_ID']."', '$start_date_sl', '$date_end_sl')");
    header('Location: ../../view/admin/strategic_line_consult.php');
    
?>
