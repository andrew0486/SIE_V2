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
<body >
	<header>
	</header>
        <nav>
            <?php
                include_once '../general/_top.php';
            ?>
        </nav>
	<div class="container">
		<div class="row-fluid">
			<div class="span2"></div>
			<div class="span8">
                            <br><br><br>
                            <div class="span6 offset3"><img src="../../img/frailejon.png">
				</div>	
			</div>
			<div class="span2"></div>
		</div>
		
	</div>
	
        <!--div class="visible-phone"> 
            <h2 align="center">
                <a href="index.jsp" >
                    <img src="../../img/glyphicons/glyphicons_380_message_forward.png" height="100" width="100" alt="">
                    Inicio
                </a>
            </h2>
            <h3>Esta página no es visible desde su dispositivo o resolución del navegador.</h3>
        </div-->
        
	<?php
            include_once '../coodinator/modal_movements.php';
            include '../general/_down.php';
        ?>
	
<!--JavaScript================================================================================================-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="../../js/jquery.js"></script>
	<script src ="../../js/bootstrap.min.js"></script>
</body>
</html>
<?php } ?>