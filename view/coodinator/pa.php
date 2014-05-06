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
			<div class="span10 offset1 well">
				<form id="crearPa">
					<legend>Información</legend>
					<div class="well">
						<div class="control controls-row">
							<label class="span2">Linea Estrategica</label>
							<select class="span4">
								<option>Linea Estrategica</option>
							</select>
							<label class="span1">Programa</label>
							<select class="span5">
								<option>Programa</option>
							</select>
						</div>
						<div class="control controls-row">
							<label class="span2">Seleccione Proyecto</label>
							<select class="span10">
								<option></option>
							</select>
						</div>
						<div class="control controls-row">
							<label class="span2">Año de Ejecución</label>
							<select class="span2">
								<option>2013</option>
							</select>
						</div>
					</div>
					<div class="control controls-row">
						<input class="span12" type="text" placeholder="Nombre de Actividad P.A" name="activity_name" id="activity_name" title="Nombre de Actividad P.A" required >
					</div>
					<div class="control controls-row">
						<input class="span6" type="text" placeholder="Ponderación Actividad P.A" name="activity_weighting" id="activity_weighting" title="Ponderación Actividad P.A" required>
					</div>
					<div class="controls controls-row">
						<textarea class="span12" rows="4" style="resize:none" id="program_objetive" placeholder="Objetivo Actividad P.A" title="Objeto del Contrato" required name="activity_objective"></textarea>
					</div>
					<div class="control controls-row">
						<input type="text" class="span6" placeholder="Indicador" id="activity_unit_measure" name="activity_unit_measure" title="Indicador" required >
					</div>
					<div class="control controls-row">
						<textarea name="activity_unit_description" id="activity_unit_description" rows="4" class="span6" style="resize:none" placeholder="Descripción Indicador" title="Descripción Indicador" required></textarea>
					</div>
				</form>
				<div class="control controls-row">
					<a type="submit" href="" class="btn btn-primary span2 offset4">Crear</a>
					<a type="submit" href="principal_coordinador.html" class="btn btn-primary span2 offset4">Cancelar</a>
				</div>
			</div>
		</div>
	</div>
<!--JavaScript================================================================================================-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="../../js/jquery.js"></script>
	<script src ="../../js/bootstrap.min.js"></script>
</body>
</html>
<?php } ?>