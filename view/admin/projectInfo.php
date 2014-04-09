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
	<script type="text/javascript" language="javascript" src="../../js/ajax.js"></script>

	<title>SIE</title>
</head>
<body>
	<nav>
        <?php
            include_once '../general/_top.php';
            require_once '../../controller/database/consultas.php';
            $consulta = new Consulta();
        ?>
        </nav>
	<br>
	<br>
	<br>
	<div class="container">
		<div class="row-fluid">
			<div class=""></div>
			<div class="span12">
				<div class="span10 offset1 well">
					<ul class="nav nav-tabs">
                                            <li class="active"><a href="#">Información</a></li>
                                            <li class="disabled"><a href="#" >Localización</a></li>
                                            <li class="disabled"><a href="#"  >Años de Ejecución</a></li>
                                        </ul>
                                    <form role="form" id="crearProyecto" name="crearProyecto" action="<?php if (!isset($edit_l) && empty($edit_l)) {print '../../controller/project/save_pr.php';}
                                            else{print '../../controller/project/update_pr.php';}?>" method="post">
						
						<div class="form-group form-inline well">
                                                    <?php
                                                    $consulta->setConsulta('SELECT * FROM sie.strategics_lines;')
                                                    ?>
							<div class="control-group">
                                                            <select class="span8" id="strategic_line" name="strategic_line" onchange="from(document.crearProyecto.strategic_line.value, 'program', '../../controller/project/program_consult.php')" required>
									<option value="">Seleccione Linea Estratégica</option>
                                                                        <?php 
                                                                        while ($row = mysql_fetch_array($consulta->getConsulta())) {
                                                                        ?>
                                                                        <option value="<?php print $row['STRATEGIC_LINE_ID']; ?>">
                                                                            <?php print $row['STRATEGIC_LINE_NAME']; ?>
                                                                        </option>
                                                                        <?php } ?>
								</select>
							</div>
                                                    <div class="control controls-row">
                                                        <select class="span8" id="program" name="program" required>
									<option>Seleccione Programa</option>
                                                        </select>
                                                    </div><br>
                                                    <div class="control controls-row">
                                                        <select id="super_proyecto" name="super_proyecto">
								<option>Seleccione Proyecto</option>
                                                        </select> <span> (Opcional)</span>
                                                    </div> <br>
							<div class="controls controls-row">
								<input class="span5" type="text" placeholder="Código Proyecto" name="project_id" required>
							</div> <br>
							<div class="controls controls-row">
								<input class="span8" type="text" id="" placeholder="Nombre:*" name="project_name" required>	
							</div><br>
							<div class="controls controls-row">
								<textarea class="span12" rows="4" style="resize:none" id="program_objetive" placeholder="Objetivo:*" name="project_objective" required></textarea>
							</div><br>
							<div class="controls controls-row">
								<input class="span3" type="text" id="program_weighting" placeholder="Ponderación:*" name="program_weighting" required>
							</div><br>
							<div class="controls controls-row">
							<input class="span3" type="text" id="investment" placeholder="Inversión:*" name="investment" required>
							</div><br>
							<div class="controls controls-row">
								<label class="span2" for="deadline_start_date">Vigencia:</label>
								<input class="span4" type="date" id="deadline_start_date" name="deadline_start_date" required>	
								<label class="span1" for="deadline_end_date">a</label>
								<input class="span4" type="date" id="deadline_end_date" name="deadline_end_date" required>	
							</div><br>
                                                        <legend>Responsable</legend>
                                                        <div class="controls controls-row">
                                                                <select class="" id="subdirectorate_id" name="subdirectorate_id">
                                                                        <option>Seleccione Subdirección</option>
                                                                </select>
                                                                <select id="document_number" name="document_number">
                                                                        <option>Seleccione Empleado</option>
                                                                </select>
                                                        </div>
						</div>
                                                <div class="control-group">
                                                    <button class="btn btn-primary span2 offset4 " type="submit"  >Siguiente</button>>
                                                    <a class="btn btn-default span2" href="" value="Cancelar">Cancelar</a>
                                                </div>
					</form>
					
					
						
						
					
				</div>	
			</div>
			
		</div>
	</div>
	
	
	
<!--JavaScript================================================================================================-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="../../js/jquery.js"></script>
	<script src ="../../js/bootstrap.min.js"></script>
</body>
</html
<?php }?>