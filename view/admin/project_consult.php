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
                    
                    include_once '../../controller/database/consultas.php';
                    $consulta = new Consulta();
                ?>	
	</nav><br><br><br>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class=""></div>
			<div class="span12">
				<div class="span10 offset1 well">
					<form role="form" id="consultarPrograma">
						<div class="form-group form-inline well">
                                                    <div class="well">
                                                    <div class="control-group">
                                                        <?php 
                                                            $consulta->setConsulta("SELECT * FROM sie.strategics_lines");
                                                        ?>
                                                            <select class="span8" id="strategic_line_id" name="strategic_line_id" required>
                                                                    <option value="">Seleccione Linea Estratégica</option>
                                                                    <?php while ($row = mysql_fetch_array($consulta->getConsulta())) {?>
                                                                    <option value="<?php print $row['STRATEGIC_LINE_ID'] ?>">
                                                                        <?php print $row['STRATEGIC_LINE_NAME'] ?>
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
                                                        <select id="subproyectos">
								<option>Seleccione Proyecto</option>
                                                        </select> <span> (Opcional)</span>
                                                    </div>
                                                    </div>
                                                    <div class="control controls-row">
                                                        <a class="btn btn-primary span2 offset5" type="submit">Consultar</a>
                                                    </div><br>
							<div class="controls controls-row">
								<table class="table table-striped" id="proyectosLocalizacion">
									<thead>
                                                                            <tr>
										<th>Código</th>
										<th>Proyecto</th>
										<th>Ponderación</th>
										<th>Inversión</th>
										<th>Vigencia</th>
                                                                                <th>Ver</th>
                                                                                <th>Editar</th>
                                                                            </tr>
									</thead>
									<tbody>
                                                                            <tr>
                                                                                <td>1</td>
                                                                                <td>Paipa</td>
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td><button type="button" class="btn btn-primary " onclick="agregarPunto(document.tabla)" rel="tooltip" data-placement="top" title="Editar Proyecto"><i class="icon-edit"></i></button></td>
                                                                                <td><button type="button" class="btn btn-primary" onclick="agregarPunto(document.tabla)"rel="tooltip" data-placement="top" title="Editar Localización"><i class="icon-edit"></i></button></td>
                                                                            </tr>
									</tbody>
								</table>
							</div>
						</div>
					</form>
                                    <div class="">
                                        <a href="projectInfo.php" class="btn btn-primary "><img alt="Prev" src="../../img/glyphicons/glyphicons_144_folder_open.png" height="20" width="20"> <strong>Nuevo Proyecto</strong></a>
                                    </div>
				</div>
                             
			</div>
                       
		</div>
		
	</div>
	
	
	<br>
        <?php include_once '../general/_down.php'; ?>
<!--JavaScript================================================================================================-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="../../js/jquery.js"></script>
	<script src ="../../js/bootstrap.min.js"></script>
</body>
</html>
<?php } ?>