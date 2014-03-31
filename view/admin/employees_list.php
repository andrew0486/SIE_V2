<?php session_start();
@$user = $_SESSION['sesion'];
//session_destroy();
if (!isset($user) && empty($user)) {
    header('Location: http://localhost/SIE_V2/view/index.php');
}else{
?>
<!DOCTYPE html>
<html lang="ESP">
<head>
<meta charset="utf-8">
<title>SIE - FUNCIONARIOS</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../../css/bootstrap.css">
<link href="../../css/bootstrap-responsive.css" rel="stylesheet">
</head>
<body>
    <?php 
        require_once '../general/_top.php';
        print '<br><br>';
    ?>
	<jsp:include page="_top.jsp"></jsp:include>
	<jsp:include page="_heroUnit.jsp"></jsp:include>
	<div class="container">
		<div class="row-fluid">
			<table class="table table-striped table-hover-green well">
				<thead>
					<tr>
						<td style ="aligne: center;"><strong>PRIMER APELLIDO</strong></td>
						<td aligne = 'center'><strong>SEGÚNDO APELLIDO</strong></td>
						<td aligne = 'center'><strong>PRIMER NOMBRE</strong></td>
                                                <td aligne = 'center'><strong>SEGÚNDO NOMBRE</strong></td>
						<!--% if (administrator != null){ %-->
						<td><strong>TIPO DOCUMENTO</strong></td>
						<td><strong>NÚMERO DOCUMENTO</strong></td>
						<td><strong>CIUDAD EXPEDICIÓN</strong></td>
						<td><strong>DIRECCIÓN</strong></td>
						<!--% }%-->
						<td><strong>TELÉFONO</strong></td>
						<td style = "aligne: center; "><strong>EMAIL</strong></td>
						<td><strong>SUBDIRECCIÓN</strong></td>
						<td><strong>PROFESIÓN</strong></td>
						<!--% if (administrator != null){ %-->
						<td><strong>ESTADO</strong></td>
						<td><strong>EDICIÓN</strong></td>
						<!--% }%-->
					</tr>
				</thead>
				<tbody>
					<?php
                                            require_once '../../controller/database/consultas.php';
                                            $consulta = new Consulta();
                                            $consulta->setConsulta("SELECT * FROM sie.employees
                                                ORDER BY one_first_name, two_last_name, one_first_name, two_first_name");
                                            $employees = $consulta->getConsulta();
                                            
						while ($reg = mysql_fetch_array($employees)){
                                                    //Querty Subdirectorate
                                                    $consulta->setConsulta("SELECT * FROM sie.subdirectorates s where
                                                        s.subdirectorate_id like $reg[SUBDIRECTORATE_ID]");
                                                    $subdirectorate = $consulta->getConsulta();
                                                    $subd = mysql_fetch_array($subdirectorate);
                                                    
                                                    //Querty job
                                                    $consulta->setConsulta("SELECT * FROM sie.jobs s where
                                                        s.job_id like $reg[JOB_ID]");
                                                    $job = $consulta->getConsulta();
                                                    $j = mysql_fetch_array($job);
                                                    
                                                    $estado = "INACTIVO";
                                                    if ($reg['ACTIVE_STATE'] == 1){
                                                        $estado = 'ACTIVO';
                                                    }
                                        ?>
					<tr>
						<!--%if (employee.getEmployeeId()!=1){ %-->
							<td><?php print $reg['ONE_LAST_NAME'];?></td>
							<td><?php print $reg['TWO_LAST_NAME']?></td>
							<td><?php print $reg['ONE_FIRST_NAME'];?></td>
							<td><?php print $reg['TWO_FIRST_NAME'];?></td>
							<!--% if (administrator != null){ % -->
							<td><?php print $reg['DOCUMENT_TYPE'];?></td>
							<td><?php print $reg['DOCUMENT_NUMBER'];?></td>
							<td><?php print $reg['DOCUMENT_CITY'];?></td>
							<td><?php print $reg['STREET_ADDRESS'].' - '. $reg['CITY'];?></td>
							<!--% }%-->
							<td><?php print $reg['PHONE_NUMBER'];?></td>
							<td><?php print $reg['EMAIL']?></td>
                                                            
							<td><?php print $subd['SUBDIRECTORATE_NAME'];?></td>
							<td><?php print $j['JOB_TITLE'];?></td>
							<!--% if (administrator != null){ %-->
                                                        <td <?php if ($estado === "INACTIVO") { print "style ='color:red;'";}else{}?>>
                                                            <?php print $estado;?>
							</td>
							<td>
								<a href="http://localhost/SIE_V2/view/admin/employee_edit.php?id=<?php print $reg['DOCUMENT_NUMBER'];?>" class='btn btn-primary btn-small'>Editar</a>
							</td -->
					<!--%
						} //end for 
						//SessionDB.close();
					%-->
                                                <?php }?>
				</tbody>
			</table>
		</div>
		<!--% if (administrator != null){ %-->
		<div class="row-fluid">
                    <a href="http://localhost/SIE_V2/view/admin/employee_edit.php" class="btn btn-primary "><img alt="Prev" src="../../img/glyphicons/glyphicons_006_user_add.png" height="30" width="30"> <strong>Nuevo Funcionario</strong></a>
		</div>
		<!--% }%-->
	</div>


	<!--jsp:include page="_down.jsp"></jsp:include-->
        <script type="text/javascript" src="../../js/jquery.js"></script>
	<script type="text/javascript" src="../../js/bootstrap.js"></script>
</body>
</html>
<?php } ?>