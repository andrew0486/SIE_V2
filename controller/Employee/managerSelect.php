<?php session_start();
    //$var = $_GET['id'];
    //print $var;
    $em = $_SESSION['emp_edit_subd'];
    require_once '../database/consultas.php';
    $consulta1 = new Consulta();
    //if (isset($em) && !empty($em)){
        $consulta1->setConsulta("SELECT * FROM sie.employees e 
        WHERE subdirectorate_id = ".$_GET['id']."
        OR MANAGER_ID IS NULL
        AND  NOT (e.DOCUMENT_NUMBER LIKE '".$em."')
        ORDER BY e.one_last_name, e.two_last_name, e.one_first_name, e.two_first_name");
    $_SESSION['emp_edit_subd']="";
    print ("<BR><option value=''><br>");
        print("Seleccione"."<br>");
    print ("</option>");
    while ($e = mysql_fetch_array($consulta1->getConsulta())) {
        print ("<BR><option value=".$row['DOCUMENT_NUMBER']."><br>");
            print($e['ONE_LAST_NAME']." ".$e['TWO_LAST_NAME']." ".$e['ONE_FIRST_NAME']." ".$e['TWO_FIRST_NAME']."<br>");
        print ("</option>");
    }
?>
