<?php 
    $id = $_GET['id'];
    //print $var;

    require_once '../database/consultas.php';
    $consulta = new Consulta();
    //if (isset($em) && !empty($em)){
        $consulta->setConsulta("SELECT * FROM sie.programs p WHERE p.strategic_line_id like ".$id);
    print ("<BR><option value=''><br>");
        print("Seleccione Programa"."<br>");
    print ("</option>");
    while ($row = mysql_fetch_array($consulta->getConsulta())) {
        print ("<BR><option value='".$row['PROGRAM_ID']."'><br>");
            print($row['PROGRAM_NAME']."<br>");
        print ("</option>");
    }
?>