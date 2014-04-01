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
    <?php
        @$edit_l = $_GET['id'];
        if (isset($edit_l) && !empty($edit_l)) {
            require_once '../../controller/database/consultas.php';
            $consulta_form_sl = new Consulta();
            $consulta_form_sl->setConsulta("SELECT * FROM sie.strategics_lines
                WHERE strategic_line_id like $edit_l");
            $edit_l = mysql_fetch_array($consulta_form_sl->getConsulta());
            
            $consulta_form_sl->setConsulta("SELECT * FROM sie.deadlines
                WHERE strategic_line_id like $edit_l[STRATEGIC_LINE_ID]");
            $edit_deadline = mysql_fetch_array($consulta_form_sl->getConsulta());
            
            $_SESSION['edit_strategic_line'] = $edit_l['STRATEGIC_LINE_ID'];
            
        }
    ?>
	<div class="container">
		<div class="row-fluid">
			<div class=""></div>
			<div class="span12">
                            <div class="span10 offset1 well">
                                <form role="form" id="crearLinea" name="form_line" action="<?php if (!isset($edit_l) && empty($edit_l)) {print '../../controller/strategic_line/save_sl.php';}
                                else{print '../../controller/strategic_line/update_sl.php';}?>" method="post">
                                    <legend>Información</legend>
                                    <div class="form-group form-inline well">
                                            <input class="input-block-level" type="text" id="strategic_line_name" placeholder="Nombre*" 
                                                   name="strategic_line_name" title="Nombre linea estrategica" required
                                                   <?php if (isset($edit_l) && !empty($edit_l)) {print "value='$edit_l[STRATEGIC_LINE_NAME]' disabled='"."true'";}?>>
                                                    <br><br>
                                                    <label class="" for="strategic_line_start_date">Fecha de Inicio
                                                    </label><br>
                                            <input class="span6" type="date" id="strategic_line_start_date" 
                                                    name="strategic_line_start_date" required 
                                                    <?php if (isset($edit_l) && !empty($edit_l)) {print "value='$edit_l[STRATEGIC_LINE_STAR_DATE]' disabled='"."true'";}?>>
                                            <br><br>	
                                            <div class="controls controls-row">
                                                    <label class="span2" for="deadline_start_date">Vigencia:</label>
                                                    <input class="span4" type="date" id="deadline_start_date" name="deadline_start_date" required disabled="true"
                                                    <?php if (isset($edit_l) && !empty($edit_l)) {print "value='$edit_deadline[DEADLINE_START_DATE]' disabled='"."true'";}?>>	
                                                    <label class="span1" for="deadline_start_end_date">a</label>
                                                    <input class="span4" type="date" id="deadline_start_end_date" name="deadline_start_end_date" required
                                                    <?php if (isset($edit_l) && !empty($edit_l)) {print "value='$edit_deadline[DEADLINE_END_DATE]' disabled='"."true'";}?>>	
                                            </div>
                                            <div class="controls controls-row">
                                                    <label class="span2" for="strategic_line_status">Estado:</label>
                                                    <select class="span4" id="strategic_line_status" name="strategic_line_status" required>
                                                            <option value="0" <?php if (isset($edit_l) && !empty($edit_l) && $edit_l['STRATEGIC_LINE_STATUS'] == 0 ) { print 'selected';} ?>>INACTIVO</option>
                                                            <option value="1" <?php if (isset($edit_l) && !empty($edit_l) && $edit_l['STRATEGIC_LINE_STATUS'] == 1 ) { print 'selected';} ?>>ACTIVO</option>
                                                    </select>	
                                            </div>
                                            <div class="controls controls-row">
                                            <label for="description">Descripción:</label>
                                            <textarea class="span12" rows="4" style="resize:none" id="description" title="Descripción Linea Estratégica	" name="description" required
                                                      ><?php if (isset($edit_l) && !empty($edit_l)) {print $edit_l['DESCRIPTION'];}?></textarea>
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