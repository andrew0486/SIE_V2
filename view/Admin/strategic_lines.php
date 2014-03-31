<?php session_start();
@$user = $_SESSION['sesion'];
//session_destroy();
if (!isset($user) && empty($user)) {
    header('Location: index.php');
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
    </nav>
	<br><br><br>
	<div class="container">
		<div class="row-fluid">
			<div class=""></div>
			<div class="span12">
				<div class="span10 offset1 well">
					<form role="form" id="crearLinea">
						<legend>Información</legend>
						<div class="form-group form-inline well">
							<input class="span12" type="text" id="strategic_line_name" placeholder="Nombre*" name="strategic_line_name" title="Nombre linea estrategica" required><br><br>
								<label class="" for="strategic_line_start_date">Fecha de Inicio
								</label><br>
								<input class="span6" type="date" id="strategic_line_start_date" name="strategic_line_start_date" required>
							<br><br>	

							
							<div class="controls controls-row">
								<label class="span2" for="deadline_start_date">Vigencia:</label>
								<input class="span4" type="date" id="deadline_start_date" name="deadline_start_date" required>	
								<label class="span1" for="deadline_start_end_date">a</label>
								<input class="span4" type="date" id="deadline_start_end_date" name="deadline_start_end_date" required>	
							</div>
							<div class="controls controls-row">
								<label class="span2" for="strategic_line_status">Estado:</label>
								<select class="span4" id="strategic_line_status" required>
									<option value="0">Activo</option>
									<option value="1">Inactivo</option>
								</select>	
							</div>
							<div class="controls controls-row">
							<label for="description">Descripción:</label>
							<textarea class="span12" rows="4" style="resize:none" id="description" title="Descripción Linea Estratégica	" name="description" required></textarea>
							</div>
						</div>
						
						<div class="row">
							<div class="span8 offset2 control-group">
								<div class="span6">
									<button type="submit" class="btn btn-primary input-block-level">Crear</button>	
								</div>
								<div class="span6">
		                                                        <a href="http://localhost/SIE_V2/view/principal.php" class="btn btn-default input-block-level" >Cancelar</a>	
								</div>
								
								
							</div>
							<div class="span2"></div>
						</div>
					</form>
				</div>	
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