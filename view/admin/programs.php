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
		<div class="row-fluid">
			<div class=""></div>
			<div class="span12">
				<div class="span10 offset1 well">
                                    <?php  
                                        require_once '../../controller/database/consultas.php';
                                        $consulta = new Consulta();
                                        $consulta->setConsulta("SELECT * FROM sie.strategics_lines");
                                        $cons_sl = $consulta->getConsulta();
                                        
                                        @$edit_p = $_GET['id'];
                                        if (isset($edit_p) && !empty($edit_p)){
                                            $consulta->setConsulta("SELECT S.STRATEGIC_LINE_ID, S.STRATEGIC_LINE_NAME, P.PROGRAM_NAME, 
                                                P.PROGRAM_STATUS, P.PROGRAM_WEIGHTING, P.PROGRAM_OBJECTIVE,
                                                D.DEADLINE_START_DATE, DEADLINE_END_DATE
                                                FROM sie.programs P, sie.strategics_lines S, sie.deadlines D
                                                WHERE P.PROGRAM_ID LIKE $edit_p
                                                AND S.STRATEGIC_LINE_ID LIKE P.STRATEGIC_LINE_ID
                                                AND D.PROGRAM_ID LIKE $edit_p");
                                            $cons_prgm = $consulta->getConsulta();
                                            
                                            $edit_p = mysql_fetch_array($cons_prgm);
                                        }
                                    ?>
                                    <form role="form" name="form_prgm" id="crearPrograma" method="post" action="">
						<legend>Información</legend>
						<div class="form-group form-inline well">
							<div class="control-group well">
								<select class="span8" id="strategic_line_id" name="strategic_line_id" required >
                                                                    <option value="">Seleccione una Linea Estrategica</option>
                                                                    <?php 
                                                                        while ($row_sl = mysql_fetch_array($cons_sl)) {
                                                                    ?>
                                                                    <option value="<?php print $row_sl['STRATEGIC_LINE_ID']; ?>"
                                                                            <?php if (isset($edit_p) && !empty($edit_p)) {
                                                                                if ($edit_p['STRATEGIC_LINE_ID'] == $row_sl['STRATEGIC_LINE_ID']){
                                                                                    print "selected";
                                                                                }else{ print "disabled = 'true'";}
                                                                            }?>
                                                                            >
                                                                        <?php print $row_sl['STRATEGIC_LINE_NAME']; ?>
                                                                    </option>
                                                                    <?php } ?>
								</select>
							</div>
							<div class="controls controls-row">
								<input class="span8" type="text" id="program_name" name="program_name" placeholder="Nombre:*" required
                                                                       <?php if (isset($edit_p) && !empty($edit_p)) {print "value='$edit_p[PROGRAM_NAME]' disabled='"."true'";}?>>	
							</div><br>
							<div class="controls controls-row">
								<textarea class="span12" rows="4" style="resize:none" id="program_objective" name="program_objective" placeholder="Objetivo:*" required
                                                                          ><?php if (isset($edit_p) && !empty($edit_p)) {print $edit_p['PROGRAM_OBJECTIVE'];}?>
                                                                </textarea>
							</div><br>
							<div class="controls controls-row">
								<input class="span3" type="text" id="program_weighting" name="program_weighting" placeholder="Ponderación:*" required
                                                                       value="<?php if (isset($edit_p) && !empty($edit_p)) {print $edit_p['PROGRAM_WEIGHTING'];}?>">
							</div><br>
							<div class="controls controls-row">
								<label class="span2" for="deadline_start_date">Vigencia:</label>
								<input class="span4" type="date" id="deadline_start_date" name="dead_line_start_date" required
                                                                       <?php if (isset($edit_p) && !empty($edit_p)) {print "value='$edit_p[DEADLINE_START_DATE]' disabled='"."true'";}?>>	
								<label class="span1" for="deadline_start_end_date">a</label>
								<input class="span4" type="date" id="deadline_start_end_date" required
                                                                       <?php if (isset($edit_p) && !empty($edit_p)) {print "value='$edit_p[DEADLINE_END_DATE]' disabled='"."true'";}?>>	
							</div><br>
                                                        <div class="controls controls-row">
                                                                <label class="span2" for="program_status">Estado:</label>
                                                                <select class="span4" id="program_status" name="program_status" required>
                                                                        <option value="0" <?php if (isset($edit_p) && !empty($edit_l) && $edit_p['PROGRAM_STATUS'] == 0 ) { print 'selected';} ?>>INACTIVO</option>
                                                                        <option value="1" <?php if (isset($edit_p) && !empty($edit_l) && $edit_p['PROGRAM_STATUS'] == 1 ) { print 'selected';} ?>>ACTIVO</option>
                                                                </select>	
                                                        </div>
						</div>
						<br>
                                                <div class="row">
                                                        <div class="span8 offset2 control-group">
                                                                <div class="span6">
                                                                        <button type="submit" class="btn btn-primary input-block-level">Aceptar</button>	
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