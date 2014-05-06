<?php session_start();
    /**
    * fuciones
    */
   //include '../db/conectionDB.php';
   //conection();
   //conectionDB(conection());
   //$datos = query("SELECT * FROM sie.employees ORDER BY one_first_name, two_last_name, one_first_name, two_first_name;");
   
   $userName = trim($_POST['username']);
   $password = $_POST['pass'];

   require_once '../../controller/database/consultas.php';
   $consulta = new Consulta();
   $consulta->setConsulta("SELECT * FROM sie.employees 
       where document_number like '$userName'
       and password like '$password'
       ORDER BY one_first_name, two_last_name, one_first_name, two_first_name");
   
   //while ($reg = mysql_fetch_array($datos)){
   //     echo $reg['DOCUMENT_NUMBER']." - ".$reg['ONE_FIRST_NAME']." ".$reg['TWO_FIRST_NAME']." ".$reg['ONE_LAST_NAME']." ".$reg['TWO_LAST_NAME']."<br>";
   //}
   $dato = mysql_fetch_array($consulta->getConsulta());
   if ((isset($dato['DOCUMENT_NUMBER']) && !empty($dato['DOCUMENT_NUMBER']) && ($dato['ACTIVE_STATE'] == 1))){
       $dateEmplo = strtotime($dato['END_DATE']);
       $actual = strtotime(date("y-m-d"));
       
       if (($actual <= $dateEmplo) || (empty($dateEmplo))){
           $_SESSION['sesion'] = $dato['DOCUMENT_NUMBER'];
           $_SESSION['nameLogin'] = $dato['ONE_FIRST_NAME'];
           $admin = false;
           if($dato['JOB_ID']==1 || $dato['JOB_ID']==3){
               $admin = true;
           }
           $_SESSION['admin'] = $admin;
           header('Location: ../../view/principal/principal.php');
           //echo "entro siedo menor actual o nulo";
       }else{
           header('Location: ../../view/principal/index.php');
       }
       
   }else{
       header('Location: ../../view/principal/index.php');
   }
?>
