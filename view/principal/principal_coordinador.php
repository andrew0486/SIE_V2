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
                include_once 'general/_top.php';
            ?>
	</nav><br><br>
	<br>
	<div class="container">
		<div class="row-fluid">
			<div class="span2"></div>
			<div class="span8">
				<div class="span6 offset3"><img src="../img/frailejon.png">
				</div>	
			</div>
			<div class="span2"></div>
		</div>
		
	</div>
	
	<footer><div class="modal-footer"><br><br><br>
			<div align="center">
 
				<b>Sede:</b> Antigua Vía a Paipa No. 53-70, Municipio Tunja, Boyacá - Colombia
				<br><b>Email:</b>
				<a href="mailto:corpoboyaca@corpoboyaca.gov.co">corpoboyaca@corpoboyaca.gov.co</a> y 
				<a href="mailto:ousuario@corpoboyaca.gov.co">ousuario@corpoboyaca.gov.co</a>
				<br><b>Subdirección Técnica Ambiental y de Planeación y Sistemas</b>
 			</div>
	</div>
	</footer>

	<div id="movimientos" class="modal hide fade in" style="display: none;"> <!--Modal Movimientos-->
    	<div class="modal-header">
	         <button type="button" data-dismiss="modal" class="close">&times;</button>
	        <h3>Movimientos</h3>
     	</div>
     	<div class="modal-body"> <!--Cuerpo del modal-->
	         <form class="form" role="form" id="crearMovimiento">
	         	<div class="controls controls-row">
	         		<label class="span2" for="selectContrato">Contrato:</label>
	         		<select class="" id="selectContrato">
	         			<option>Seleccione Contrato</option>
	         		</select> 
	         	</div>
	         	<div class="controls controls-row">
	         		
	         		
	         	</div>
	         	<div class="controls controls-row">
	         		<label class="span2">Valor de Movimiento:</label>
	         		<input class="s" type="text">
	         	</div>
	         	<div class="controls controls-row">
	         		<label class="span2">Fecha de Inicio</label>
	         		<input type="date">
	         	</div>
	  		 </form>                
    	</div>
	    	<div class="modal-footer"> <!-- Pie de modal-->
	        <a href="#" class="btn btn-primary" onclick="document.crearMovimiento.submit();">Realizar Movimiento</a>
	        <a href="#" data-dismiss="modal" class="btn">Cerrar</a>
    	</div>
	</div>
        <?php 
                include_once '../coodinator/modal_movements.php';
        ?>
	
<!--JavaScript================================================================================================-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script src="../../js/jquery.js"></script>
        <script src ="../../js/bootstrap.min.js"></script>
</body>
</html>