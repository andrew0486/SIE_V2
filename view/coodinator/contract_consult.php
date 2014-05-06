<?php session_start();
@$user = $_SESSION['sesion'];
//session_destroy();
if (!isset($user) && empty($user)) {
    header('Location: ../principal/index.php');
}else{
?>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../css/bootstrap.css" media="screen">
	<link rel="stylesheet" href="../../css/bootstrap-responsive.min.css">
	

	<title>SIE</title>
</head>
<body>
	<nav>
            <?php
                include_once '../general/_top.php';
            ?>
	</nav><br><br><br>
	<div class="container">
		<div class="row-fluid">
			<div class=""></div>
			<div class="span12 ">
				<div class="span10 offset1 well">
					<form role="form" id="crearContratos">
						<legend>Información</legend>
						<div class="form-group form-inline well">
							<div class="controls controls-row">
								<select class="span3" id="">
									<option>Seleccione Linea Estrategica</option>
								</select>
								<select class="span3" id="">
									<option>Seleccione Programa</option>
								</select>
								<select class="span3" id="">
									<option>Seleccione Proyecto</option>
								</select>
								<a href="" class="btn btn-primary span3" title="Agrega el contrato a un programas"> Consultar</a>
							</div><br>
							<div class="controls controls-row">
								<legend>Resultados</legend>
								<table class="table table-striped" id="proyectosLocalizacion">
									<thead>
										<tr><th>#</th>
										<th>Proyectos</th>
										<th>Contrato</th>
										<th>Localización</th>
										<th>Inversión</th>
										<th></th>
									</tr></thead>
									<tbody>
										<tr>
											<td>1</td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td><button type="button" class="btn btn-primary" onclick="" rel="tooltip" data-placement="top" title="Eliminar"><i class="icon-edit"></i></button></td>
										</tr>
										<tr>
											<td>2</td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td><button type="button" class="btn btn-primary" onclick="" rel="tooltip" data-placement="top" title="Eliminar"><i class="icon-edit"></i></button></td>
										</tr>
									</tbody>
								</table>
							</div><br>
						</div>
						<div class="control-group">
								<a class="btn btn-primary span2 offset5" type="submit" title="Nuevo Contrato" href="contratos.html">Nuevo Contrato</a>
							</div>
						</form>

				</div>
				<form>
					
				</form>	
			</div>
			<div class=""></div>
		</div>
		
	</div>
	
	
<!--JavaScript================================================================================================-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="../../js/jquery.js"></script>
	<script src ="../../js/bootstrap.min.js"></script>
</body>
</html>
<?php } ?>