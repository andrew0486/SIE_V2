<?php session_start();
    @$doc_num = $_SESSION['sesion'];
    @$proj = $_SESSION['project'];
    @$py = $_SESSION['save_py'];
    $_SESSION['error'] = "";
    
    if (isset($proj) && !empty($proj)){
        if (isset($py) && !empty($py)){
            if (count($py) ==  $proj['years']) {
                echo 'entro correctamente';
                
                require_once '../database/consultas.php';
                $save_pj = new Consulta();
                $save_pj->setConsulta("INSERT INTO sie.projects (PROJECT_ID, PROGRAM_ID, 
                    DOCUMENT_NUMBER, PROJECT_NAME, PROJECT_OBJECTIVE, PROJECT_WEIGHTING) 
                    VALUES ($proj[id], $proj[program], '".$doc_num."', '".$proj[name]."', '".$proj[objective]."', $proj[weighting])");
                
                $save_pj->setConsulta("INSERT INTO sie.deadlines (PROJECT_ID, DEADLINE_START_DATE, DEADLINE_END_DATE) 
                    VALUES (".$proj['id'].", '".$proj['startDate']."', '".$proj['endDate']."')");
                
                $save_pj->setConsulta("INSERT INTO sie.responsible (PROJECT_ID, DOCUMENT_NUMBER) VALUES (".$proj['id'].", '".$proj['responsible']."')");
                
                header('Location: ../../view/admin/project_consult.php');
                
            }  else {
                $_SESSION['error'] = "No se han completado todos los años";
                header('Location: ../../view/admin/project_year.php');
            }
        }else{
            $_SESSION['error'] = "No se han completado todos los años";
            //echo $_SESSION['error'];
            header('Location: ../../view/admin/project_year.php');
        }
    }  else {
        echo 'no hay datos de proyecto';
    }
?>
