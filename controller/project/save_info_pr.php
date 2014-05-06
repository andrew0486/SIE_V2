<?php session_start();

    $strategicLine = $_POST['strategic_line'];
    $program = $_POST['program'];
    $superProject = $_POST['super_proyecto'];
    $id = $_POST['project_id'];
    $name = strtoupper($_POST['project_name']);
    $objective = strtoupper($_POST['project_objective']);
    $weighting = $_POST['program_weighting'];
    $startDate = $_POST['deadline_start_date'];
    $endDate = $_POST['deadline_end_date'];
    $subdirResponsible = $_POST['subdirectorate_id'];
    $responsible = $_POST['document_number'];

    require_once '../../model/project/projectClass.php';
    $project = "";
    
    if (isset($superProject) && !empty($superProject)){
        $project = array ('strategicLine'=>$strategicLine, 'program'=>$program, 'superProject'=>$superProject,
            'id'=>$id, 'name'=>$name, 'objective'=>$objective, 'weighting'=>$weighting,
            'startDate'=>$startDate, 'endDate'=>$endDate, 'subdirResponsible'=>$subdirResponsible, 'responsible'=>$responsible, 'years'=>1);
//        echo 'hay sub proyectos '.$superProject;
    }  elseif (!isset($superProject) || empty($superProject)) {
        $project = array ('strategicLine'=>$strategicLine, 'program'=>$program,
            'id'=>$id, 'name'=>$name, 'objective'=>$objective, 'weighting'=>$weighting,
            'startDate'=>$startDate, 'endDate'=>$endDate, 'subdirResponsible'=>$subdirResponsible, 'responsible'=>$responsible, 'years'=>1);
//        echo 'no hay sub proyectos';
    }
    
    
    echo "start date".$project['startDate']."<br> end date ".$project['endDate'];    
    $anioStart = substr($project['startDate'], 0, 4);
    $mesStart = substr($project['startDate'], 5, 2);
    $diaStart = substr($project['startDate'], 8, 2);
//    echo "<br>anio ".$anioStart."<br>mes ".$mesStart."<br>dia ".$diaStart;
    
    $anioEnd = substr($project['endDate'], 0, 4);
    $mesEnd = substr($project['endDate'], 5, 2);
    $diaEnd = substr($project['endDate'], 8, 2);
//    echo "<br>anio ".$anioEnd."<br>mes ".$mesEnd."<br>dia ".$diaEnd;
    
    //calculo timestam de las dos fechas 
    $timestamp1 = mktime(0,0,0,$mesStart,$diaStart,$anioStart); 
    $timestamp2 = mktime(4,12,0,$mesEnd,$diaEnd,$anioEnd); 

    //resto a una fecha la otra 
    $segundos_diferencia = $timestamp1 - $timestamp2; 
    //echo $segundos_diferencia; 

    //convierto segundos en días 
    $dias_diferencia = $segundos_diferencia / (60 * 60 * 24); 

    //obtengo el valor absoulto de los días (quito el posible signo negativo) 
    $dias_diferencia = abs($dias_diferencia); 

    //quito los decimales a los días de diferencia 
    $dias_diferencia = floor($dias_diferencia); 

//    echo "<br>dias diferencia ".$dias_diferencia; 
    
//    echo "<br>Numero de años ".ceil( $dias_diferencia/365);
    
    $project['years'] = ceil( $dias_diferencia/365);
    
    $_SESSION['project'] = $project;
    header('Location: ../../view/admin/project_year.php');
    
    
?>
