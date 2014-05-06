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
        <?php include_once '../general/_top.php'; 
            @$error = $_SESSION['error'];
            echo '<br><br>';
            //echo $_SESSION['error'];
            if (isset($error) && !empty($error)){
        ?>
                <div class="alert alert-error">
                        <a class="close" data-dismiss="alert">&times;</a>
                        <strong>Error!</strong> <?php echo $error;?>
                </div>
        <?php } $_SESSION['error'] = "";?>
       
    </nav>
	<div class="container"><br><br><br>
		<div class="row-fluid well">
			<div class="span10 offset1">
                             <ul class="nav nav-tabs">
                                <li class="disabled"><a href="#">Información</a></li>
                                <li class="active"><a href="#"  >Años de Ejecución</a></li>
                            </ul>
				<form role="form" id="yearProject" name="yearProject" action="<?php if (!isset($edit_l) && empty($edit_l)) {print '../../controller/project/save_year_pr.php';}
                                            else{print '../../controller/project/update_year_pr.php';}?>" method="post">		
                                    <legend>Años de Ejecución</legend>
                                    <div class="control-group ">
                                        <input class="span4" type="number" min="<?php 
                                         $project = $_SESSION['project'];
                                        $anioStart = substr($project['startDate'], 0, 4);echo $anioStart;
                                        ?>" max="<?php 
                                        $anioEnd = $anioStart + ($project['years']-1);
                                        echo $anioEnd;
                                        ?>" step="1" id="yearProject" name="yearProject" placeholder="*Año:" title="Año" required>
                                        <input class="span4" id="yearWeighting" name="yearWeighting" type="number" min="0.1" max="100" step="0.1" placeholder="Ponderación" title="Ponderación" required>
                                    </div>
                                    <div class="control-group">
                                        <button class="btn btn-primary span2" type="submit"  >Agregar</button>
                                    </div>
                                </form> 
                            <br><br>
                            <legend></legend>
                                <div class="controls controls-row">
                                        <table class="table table-striped" id="proyectosAño">
                                                <thead>
                                                        <th>Año</th>
                                                        <th>Ponderación</th>
                                                        <th>Vigencia</th>
                                                        <th>Eliminar</th>
                                                        <th>Editar</th>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        @$py = $_SESSION['save_py'];
                                                        if (isset($py) && !empty($py)){
                                                        foreach ($py as $key => $value) {
                                                    ?>
                                                        <tr>
                                                                <td><?php echo $value['year']; ?></td>
                                                                <td><?php echo $value['weighting']." %"; ?></td>
                                                                <td></td>
                                                                <td><a type="button" class="btn btn-primary" href="../../controller/project/remove_year.php?year=<?php print $value['year']; ?>"><i class="icon-remove"></i></a></td></td>
                                                                <td><a type="button" class="btn btn-primary" onclick="agregarPunto(document.tabla)"><i class="icon-edit"></i></a></td>

                                                        </tr>
                                                    <?php } } ?>
                                                </tbody>
                                        </table>
                                </div>
			</div>

		</div>
		<div class="control controls-row">
                    <a class="btn btn-primary span2 offset4 " type="project" href="../../controller/project/save_project_all.php" value="Siguiente">Finalizar</a>
                    <a class="btn btn-default span2" href="projectInfo.php" value="Cancelar">Cancelar</a>
                </div>
	</div>
<!--JavaScript================================================================================================-->
	<?php //require_once '../general/_salir_project_year.php';?>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="../../js/jquery.js"></script>
	<script src ="../../js/bootstrap.min.js"></script>
</body>
</html
<?php }?>