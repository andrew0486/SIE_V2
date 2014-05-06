<?php session_start();
    @$py = $_SESSION['save_py'];
    $proj = $_SESSION['project'];
    $_SESSION['save_py'] = "";
    $projectYear = array('year'=>$_POST['yearProject'], 'weighting'=>$_POST['yearWeighting']);
    if (isset($py) && !empty($py)) {
        echo 'entro a uno ya creado';
        if (count($py) < $proj['years']) {
            $py[$projectYear['year']] = $projectYear; 
        }
    }elseif (!isset($py) || empty($py)) {
        echo 'entro a nuevo';
        $py = array ($projectYear['year']=>$projectYear);
    }
    $_SESSION['save_py'] = $py;
    
    /**
    foreach ($py as $key => $value) {
        echo "key ".$key."<br>Año: ".$value['year']." - weighting: ".$value['weighting'];
    }
     * 
     */

    header('Location: ../../view/admin/project_year.php');
?>
