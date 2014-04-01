<?php session_start();
@$user = $_SESSION['sesion'];
//session_destroy();
if (!isset($user) && empty($user)) {
    header('Location: http://localhost/SIE_V2/view/index.php');
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
        <div class="span1"></div>
            <table class="table table-striped table-hover-green well" id="proyectosLocalizacion">
                    <thead>
                        <tr>
                            <td><strong>CÓDIGO</strong></td>
                            <td><strong>NOMBRE</strong></td>
                            <td><strong>FECHA CREACIÓN</strong></td>
                            <td><strong>ESTADO</strong></td>
                            <td><strong>Editar</strong></td>
                        </tr>

                    </thead>
                    <tbody>
                        <?php  
                        require_once '../../controller/database/consultas.php';
                        $consulta_slc = new Consulta();
                        $consulta_slc->setConsulta("SELECT * FROM sie.strategics_lines");
                        $consulta_slc_aux = $consulta_slc->getConsulta();
                        /*if (isset($consulta_slc_aux) && !empty($consulta_slc_aux)) {*/
                            while ($row = mysql_fetch_array($consulta_slc_aux)) {
                                $status = 'INACTIVO';
                                if ($row['STRATEGIC_LINE_STATUS'] == 1){
                                    $status = 'ACTIVO';
                                }
                                    
                        ?>
                            <tr>
                                <td><?php print $row['STRATEGIC_LINE_ID'];?></td>
                                <td><?php print $row['STRATEGIC_LINE_NAME'];?></td>
                                <td><?php print $row['STRATEGIC_LINE_STAR_DATE'];?></td>
                                <td><?php print $status;?></td>
                                <td><a href="http://localhost/SIE_V2/view/admin/strategic_lines.php?id=<?php print $row['STRATEGIC_LINE_ID'];?>" class="btn btn-primary " title="Editar"><i class="icon-edit"></i></a></td>
                            </tr>
                        <?php 
                            }/*
                        }else{?>
                            <tr>
                                <td></td>
                                <td><?php print 'No existen lineas aun';?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        <?php
                        }*/
                        ?>
                    </tbody>
            </table>
        </div>
        <div class="container">
		<!--% if (administrator != null){ %-->
		<div class="row-fluid">
                    <a href="http://localhost/SIE_V2/view/admin/strategic_lines.php" class="btn btn-primary "><img alt="Prev" src="../../img/glyphicons/glyphicons_036_file.png" height="20" width="20"> <strong>Nueva Linea</strong></a>
		</div>
		<!--% }%-->
	</div>
	
	
	
<!--JavaScript================================================================================================-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script src="../../js/jquery.js"></script>
        <script src ="../../js/bootstrap.min.js"></script>
</body>
</html>
<?php } ?>