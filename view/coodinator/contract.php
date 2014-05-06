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
								<select class="span3" id="" required>
									<option value="">Seleccione Linea Estrategica</option>
								</select >
								<select class="span3" id="" required>
									<option value="">Seleccione Programa</option>
								</select>
								<select class="span3" id="" required>
									<option value="">Seleccione Proyecto</option>
								</select>
								<a  href="" class="btn btn-primary span3" title="Agrega el contrato a un programas"> Agregar</a>
							</div><br>
							<div class="controls controls-row">
								<table class="table table-striped" id="proyectosLocalizacion">
									<thead>
										<tr>
											<th>#</th>
											<th>Linea</th>
											<th>Programa</th>
											<th>Proyecto</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td></td>
											<td></td>
											<td></td>
											<td><button type="button" class="btn btn-primary" onclick="" rel="tooltip" data-placement="top" title="Eliminar"><i class="icon-remove"></i></button></td>
										</tr>
										<tr>
											<td>2</td>
											<td></td>
											<td></td>
											<td></td>
											<td><button type="button" class="btn btn-primary" onclick="" rel="tooltip" data-placement="top" title="Eliminar"><i class="icon-remove"></i></button></td>
										</tr>
									</tbody>
								</table>
							</div><br>
							<div class="controls controls-row">
								<input class="span5" type="text" placeholder="Código de Contrato" title="Código de Contrato" required>								
							</div><br>
							<div class="controls controls-row">
								<textarea class="span12" rows="4" style="resize:none" id="program_objetive" placeholder="*Objeto del Contrato" title="Objeto del Contrato" required></textarea>
							</div><br>
							<div class="controls controls-row">
								<label class="span2">Tipo de Contrato</label>
								<select class="span3" required>
									<option value="">CPS</option>
									<option value="">OPS</option>
								</select>
							</div><br>
							<div class="control-group">
								<legend>Inversión</legend>
								 	<div class="controls controls-row">
						         		<label class="span2">Valor de Movimiento:</label>
						         		<input class="" type="text" required>
						         	</div>	
						         	<div class="controls controls-row">
						         		<label class="span2">Fecha de Inicio</label>
						         		<input type="date" required>
						         	</div>
							</div>
							
							<div class="controls controls-row">
								<label class="checkbox span4">
								<input type="checkbox" onclick="muestra_oculta('localizacionInversion')"> Pertenece al mapa de Inversión?
								</label>
							</div>
							<div class="controls controls-row" id="localizacionInversion" style="display: none;">
								<table class="table table-striped">
									<thead>
										<tr>
										<th>#</th>
										<th>Proyecto</th>
										<th>Municipio</th>
										<th>Inversión</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td></td>
											<td></td>
											<td></td>
											<td><input type="text"></td>
										</tr>
									</tbody>
								</table>
							</div>
								
						</div>
						<div class="control-group">
								<button class="btn btn-primary span2 offset5" type="submit" tittle="Crear Contrato" onclick="document.crearContratos.submit();">Crear</button>
							</div>
					</form>
				</div>
			</div>
		</div>
		
	</div>
	
	
	
	
	
<!--JavaScript================================================================================================-->
	<script language="JavaScript">

function muestra_oculta(id){
if (document.getElementById){ //se obtiene el id
var el = document.getElementById(id); //se define la variable "el" igual a nuestro div
el.style.display = (el.style.display == 'none') ? 'block' : 'none'; //damos un atributo display:none que oculta el div
}
}
window.onload = function(){/*hace que se cargue la función lo que predetermina que div estará oculto hasta llamar a la función nuevamente*/
muestra_oculta('contenido_a_mostrar');/* "contenido_a_mostrar" es el nombre que le dimos al DIV */
}
</script>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script src="../../js/jquery.js"></script>
	<script src ="../../js/bootstrap.min.js"></script>
</body>
</html>
<?php }?>