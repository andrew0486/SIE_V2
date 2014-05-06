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
	<script type="text/javascript" language="javascript" src="../../js/ajax.js"></script>

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
            <div class="form-group form-inline well">
                    <?php
                        require_once '../../controller/database/consultas.php';
                        $consulta = new Consulta();
                        $consulta->setConsulta("SELECT * FROM sie.strategics_lines");
                        $consulta_sl = $consulta->getConsulta();
                    ?>
                    <form name="form_cons_prog">
                        <div class="controls controls-row">

                                <select class="span6" id="strategic_line_id" name="strategic_line_id" onchange="from(document.form_cons_prog.strategic_line_id.value, 'table_body', '../../controller/program/program_consult.php')">
                                    <option value="">Seleccione linea estratégica</option>
                                    <?php 
                                    while ($row_sl = mysql_fetch_array($consulta_sl)) {
                                    ?>
                                    <option value="<?php print $row_sl['STRATEGIC_LINE_ID'] ?>">
                                        <?php print $row_sl['STRATEGIC_LINE_NAME'] ?>
                                    </option>
                                    <?php }?>
                                </select>
                        </div><br>
                        <div class="controls controls-row">
                                <table class="table table-striped table-hover-green well" id="proyectosLocalizacion">
                                        <thead>
                                            <th><strong>CÓDIGO</strong></th>
                                            <th><strong>PROGRAMA</strong></th>
                                            <th><strong>ESTADO</strong></th>
                                            <th><strong>PONDERACION</strong></th>
                                            <th class="visible-desktop"><strong>EDITAR</strong></th>
                                        </thead>
                                        <tbody id="table_body">
                                                
                                        </tbody>
                                </table>
                        </div>
                    </form>
            </div>
        </div>
        <div class="container">
		<!--% if (administrator != null){ %-->
		<div class="row-fluid">
                    <a href="programs.php" class="span2 btn btn-primary visible-desktop"><img alt="Prev" src="../../img/glyphicons/glyphicons_036_file.png" height="20" width="20"> <strong>Nuevo Programa</strong></a>
		</div>
		<!--% }%-->
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