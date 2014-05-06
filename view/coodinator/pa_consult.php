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
					<div class="control controls-row">
						<a href="" class="btn btn-primary span2 offset5">Consultar</a>
					</div>
				</div>
				<div class="well">
					<legend>Resultados</legend>
					<table class="table table-striped" id="actividadesPa">
						<thead>
							<tr>
							<th>#</th>
							<th>Proyecto</th>
							<th>Año Ejecución</th>
							<th>Actividad P.A</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>Gestión de información y desarrollo tecnologico para el conocimiento del territorio y toma de decisiones</td>
								<td>2013</td>
								<td>Fortalecer la línea base ambiental de la jurisdicción, como apoyo a la toma de decisiones.			
								</td>
								<td><button type="button" class="btn btn-primary" onclick="agregarPunto(document.tabla)"><i class="icon-edit"></i></button></td>
								
							</tr>
						</tbody>
					</table>
				</div>
					<div class="control controls-row">
						<a href="plan_accion.html" class="btn btn-primary span4 offset4" type="submit">Nueva Actividad P.A</a>
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