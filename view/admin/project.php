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
	<br>
	<br>
	<br>
	<div class="container">
		<div class="row-fluid">
			<div class="span12">
				<div class="span10 offset1 well">
					<div class="tabbable">
						<ul class="nav nav-tabs">
	                        <li class=""><a href="#tab1" data-toggle="tab">Información</a></li>
	                        <li class=""><a href="#tab2" data-toggle="tab" >Localización</a></li>
	                        <li class=""><a href="#tab3" data-toggle="tab" >Años de Ejecución</a></li>
	                    </ul>
                                            <form role="form" id="crearProyecto" name="crearProyecto" action="<?php if (!isset($edit_l) && empty($edit_l)) {print '../../controller/project/save_pr.php';}
			                                else{print '../../controller/project/update_pr.php';}?>" method="post">
                                                        <div class="form-group form-inline well">
					                    <div class="tab-content">
                                                                    <div class="tab-pane active" id="tab1">

                                                                        <?php
                                                                        require_once '../../controller/database/consultas.php';
                                                                        $consulta = new Consulta();
                                                                        $consulta->setConsulta('SELECT * FROM sie.programs;')
                                                                        ?>
                                                                        <div class="control-group">
                                                                                <select class="span8" id="strategic_line_id" name="strategic_line_id" required>
                                                                                        <option value="">Seleccione Linea Estratégica</option>
                                                                                </select>
                                                                        </div>
                                                                        <div class="control controls-row">
                                                                            <select class="span8" id="program_id" name="program_id" required>
                                                                                                                                            <option>Seleccione Programa</option>
                                                                            </select>
                                                                        </div><br>
                                                                        <div class="control controls-row">
                                                                            <select id="subproyectos" name="subproyectos">
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
                                                                                    <select class="" id="document_number">
                                                                                            <option>Seleccione Subdirección</option>
                                                                                    </select>
                                                                                    <select>
                                                                                            <option>Seleccione Empleado</option>
                                                                                    </select>
                                                                            </div><br>
                                                                            <div class="control controls-row">
										                                            <a class="btn btn-primary span2 offset4 " href="#tab2" data-toggle="tab" onclick="" value="Siguiente">Siguiente</a>
										                                            <a class="btn btn-default span2" href="http://localhost/SIE_V2/view/principal.php" value="Cancelar">Cancelar</a>
																				</div>
                                                                </div>
                                                                <div class="tab-pane" id="tab2">
                                                                        <div class="controls controls-row">
                                                                                                        <input class="span4" type="text" placeholder="Nombre:*" id="location_name" name="location_name" required>
                                                                                                        <input class="span4" type="text" placeholder="Tipo:*" id="location_type" name="location_type" required>
                                                                                                        <a href="" class="btn btn-primary span2" type="submit" >Agregar</a>
                                                                        </div>
                                                                        <br>
                                                                                <div class="controls controls-row">
                                                                                        <table class="table table-striped" id="proyectosLocalizacion">
                                                                                                <thead>
                                                                                                        <th>#</th>
                                                                                                        <th>Nombre Ubicación</th>
                                                                                                        <th>Tipo</th>
                                                                                                        <th></th>
                                                                                                        <th></th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                        <tr>
                                                                                                                <td>1</td>
                                                                                                                <td>Paipa</td>
                                                                                                                <td></td>
                                                                                                                <td><button type="button" class="btn btn-primary" onclick="agregarPunto(document.tabla)"><i class="icon-edit"></i></button></td>
                                                                                                                <td><button type="button" class="btn btn-primary" onclick="agregarPunto(document.tabla)"><i class="icon-remove"></i></button></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                                <td>2</td>
                                                                                                                <td>Duitama</td>
                                                                                                                <td></td>
                                                                                                                <td><button type="button" class="btn btn-primary" onclick="agregarPunto(document.tabla)"><i class="icon-edit"></i></button></td>
                                                                                                                <td><button type="button" class="btn btn-primary" onclick="agregarPunto(document.tabla)"><i class="icon-remove"></i></button></td>
                                                                                                        </tr>
                                                                                                </tbody>
                                                                                        </table>
                                                                                </div>
                                                                                <br>
                                                                                                                        <div class="control controls-row">
                                                                                    <a class="btn btn-primary span2 offset4 " href="#tab3" data-toggle="tab" onclick="" value="Siguiente">Siguiente</a>
                                                                                    <a class="btn btn-default span2" href="#tab1" data-toggle="tab" value="Cancelar">Cancelar</a>
                                                                                                                        </div>
                                                                </div>
                                                                <div class="tab-pane" id="tab3">
                                                                        <div class="control-group ">
                                                                                                                <input class="span2" type="text" placeholder="*Año:" title="Año" required>
                                                                                                                <input class="span2" type="text" placeholder="Ponderación" title="Ponderación" required>
                                                                                                                <input class="span3" type="date" title="Fecha de Terminación" required></label>
                                                                                                                <a class="btn btn-primary" href="#" type="submit">Agregar</a>
                                                                                                </div>

                                                                                        <div class="controls controls-row">
                                                                                                <table class="table table-striped" id="proyectosLocalizacion">
                                                                                                        <thead>
                                                                                                                <th>#</th>
                                                                                                                <th>Año</th>
                                                                                                                <th>Ponderación</th>
                                                                                                                <th>Fecha</th>
                                                                                                                <th></th>
                                                                                                        </thead>
                                                                                                        <tbody>
                                                                                                                <tr>
                                                                                                                        <td>1</td>
                                                                                                                        <td>2013</td>
                                                                                                                        <td>25%</td>
                                                                                                                        <td></td>
                                                                                                                        <td><button type="button" class="btn btn-primary" onclick="agregarPunto(document.tabla)"><i class="icon-remove"></i></button></td>

                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                        <td>2</td>
                                                                                                                        <td>2014</td>
                                                                                                                        <td>25%</td>
                                                                                                                        <td></td>
                                                                                                                        <td><button type="button" class="btn btn-primary" onclick="agregarPunto(document.tabla)"><i class="icon-remove"></i></button></td>

                                                                                                                </tr>
                                                                                                        </tbody>
                                                                                                </table>
                                                                                        </div>
                                                                                    <div class="control controls-row">
                                                                                        <button type="submit" class="btn btn-primary span2 offset4">Aceptar</button>
                                                                                        <a class="btn btn-default span2" href="#tab2" data-toggle="tab" value="Cancelar">Cancelar</a>
                                                                                </div>
                                                                </div>

                                                            </div>
                                                    </div>
						</form>
					</div>
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