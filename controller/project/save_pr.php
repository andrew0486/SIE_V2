<?php session_start();
/**
    
    $doc_user = $_SESSION['sesion'];
    $id_program_pr =$_POST['strategic_line_id'];
    $id_pr = $_POST['program_id'];
    $name_pr = strtoupper($_POST['project_name']);
    $objective_pr = $_POST['program_objetive'];
    $weighting_pr = $_POST['program_weighting'];
    $investment_pr = strtoupper($_POST['investment']);
    $date_start_pr=$_POST['deadline_start_date'];
    $date_end_pr=$_POST['deadline_end_date'];
    
    require_once '../database/consultas.php';
    //INSERT INTO `sie`.`strategics_lines` (`STRATEGIC_LINE_ID`, `STRATEGIC_LINE_NAME`, `STRATEGIC_LINE_STAR_DATE`, `STRATEGIC_LINE_STATUS`, `DESCRIPTION`) VALUES (3, 'PRUEBA4', '2014-03-02', 1, 'ESTA ES UNA LINEA ESTRATéGICA ');

    $save_pr = new Consulta();
    $save_pr->setConsulta("INSERT INTO `sie`.`projects` (`PROJECT_ID`, `PROGRAM_ID`, `DOCUMENT_NUMBER`, `PROJECT_NAME`, `PROJECT_OBJECTIVE`, `PROJECT_WEIGHTING`)
        VALUES ('$id_pr', '$id_program_pr', '$doc_user', '$name_pr', '$objective_pr', '$weighting_pr');
");
    header('Location: ../../view/admin/strategic_line_consult.php');
 * 
 */
    $strategicLine = $_POST['strategic_line'];
    $program = $_POST['program'];
    $superProject = $_POST['super_proyecto'];
    $id = $_POST['project_id'];
    $name = $_POST['project_name'];
    $objective = $_POST['project_objective'];
    $weighting = $_POST['program_weighting'];
    $investment = $_POST['investment'];
    $startDate = $_POST['deadline_start_date'];
    $endDate = $_POST['deadline_end_date'];
    $responsible = $_POST['document_number'];

    require_once '../../model/project/projectClass.php';
    $project = "";
    
    if (isset($superProject) && !empty($superProject)){
        $project = array ('strategicLine'=>$strategicLine, 'program'=>$program, 'superProject'=>$superProject,
            'id'=>$id, 'name'=>$name, 'objective'=>$objective, 'weighting'=>$weighting, 'investment'=>$investment,
            'startDate'=>$startDate, 'endDate'=>$endDate, 'responsible'=>$responsible);
        echo 'hay sub proyectos '.$superProject;
    }  elseif (!isset($superProject) || empty($superProject)) {
        $project = array ('strategicLine'=>$strategicLine, 'program'=>$program,
            'id'=>$id, 'name'=>$name, 'objective'=>$objective, 'weighting'=>$weighting, 'investment'=>$investment,
            'startDate'=>$startDate, 'endDate'=>$endDate, 'responsible'=>$responsible);
        echo 'no hay sub proyectos';
    }
    
    $_SESSION['project'] = $project;
    
    header('Location: http://localhost/SIE_V2/controller/project/update_pr.php');
    
    
?>
