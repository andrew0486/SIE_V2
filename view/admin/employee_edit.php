<?php session_start();
@$user = $_SESSION['sesion'];
//session_destroy();
if (!isset($user) && empty($user)) {
    header('Location: http://localhost/SIE_V2/view/index.php');
}else{
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>SAGI Edición Funcionarios</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../css/bootstrap.css">
        <link href="../../css/bootstrap-responsive.css" rel="stylesheet">
        <script type="text/javascript" language="javascript" src="../../js/ajax.js"></script>
</head>
<body onload="Combos(subdirectorate);">
    <?php
        require_once '../general/_top.php';
        print '<br><br>';

        @$emp = $_GET['id'];
        require_once '../../controller/database/consultas.php';
        $consulta = new Consulta();
        
        //Querty Subdirectorates all
        $consulta->setConsulta("SELECT * FROM sie.subdirectorates ORDER BY subdirectorate_name");
        $subdAll = $consulta->getConsulta();
        //$allSubdirectorate = mysql_fetch_array($subdAll);
        
        //Querty job
        $consulta->setConsulta("SELECT * FROM sie.jobs");
        $job = $consulta->getConsulta();
        //$job = mysql_fetch_array($j);
        
        if (isset($emp) && !empty($emp)) {
            
            $consulta->setConsulta("SELECT * FROM sie.employees WHERE document_number like '$emp'");
            $employ = mysql_fetch_array($consulta->getConsulta());
            //print $employ ['ONE_FIRST_NAME']." - ".$employ['ONE_LAST_NAME']." - ".$employ['ACTIVE_STATE'];
            $doc = $employ['DOCUMENT_NUMBER'];
            
            //Querty Subdirectorate
            /*$consulta->setConsulta("SELECT * FROM sie.subdirectorates s where
                s.subdirectorate_id like $employ[SUBDIRECTORATE_ID]");
            $subd = $consulta->getConsulta();
            $subdirectorate = mysql_fetch_array($subd);*/
            $_SESSION['emp_edit_subd']=$employ['SUBDIRECTORATE_ID'];

            //Querty job
            if ($employ['MANAGER_ID'] != ""){
                $consulta->setConsulta("SELECT * FROM sie.employees s where
                    s.DOCUMENT_NUMBER like $employ[MANAGER_ID]");
                $emp_man = $consulta->getConsulta();
            }
            //$job = mysql_fetch_array($j);
        }
    ?>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="container span2"></div>
			<!--============columna Formulario==================-->
			<div class="container span8">
                            <form class="form-horizontal" name="form_edit" action=
                                  "<?php if (!isset($doc) && empty($doc)) {print '../../controller/Employee/employee_save.php';}
                                else{print '../../controller/Employee/employee_update.php';}?>" method="post">
					<legend>
						<div class="row">
							<div class="span4 offset1">Registrar Datos</div>
						</div>
					</legend>
					<div class="row">
						<div class="span5 offset1">
							Nombres:<br>
							<div class="control-group">
								<div class="span6">
									<input type="text" class="input-block-level" autocomplete="off" id="oneFirstName" placeholder="Primer Nombre" maxlength="45" name="oneFirstName" required
                                                                               value="<?php if (isset($doc) && !empty($doc)) { print $employ['ONE_FIRST_NAME'];}?>"/>	
								</div>
								<div class="span6">
									<input type="text" class="input-block-level" autocomplete="off" id="twoFirstName" placeholder="Segundo Nombre" maxlength="45" name="twoFirstName"
									value="<?php if (isset($doc) && !empty($doc)) { print $employ['TWO_FIRST_NAME'];}?>"/>	
								</div>
							</div>
						</div>
						<div class="span5">
							Apellidos:<br>
							<div class="control-group">
								<div class="span6">
									<input type="text" class="input-block-level" autocomplete="off" id="oneLastName" placeholder="Primer Apellido" maxlength="45" name="oneLastName" required
									value="<?php if (isset($doc) && !empty($doc)) { print $employ['ONE_LAST_NAME'];}?>"/>	
								</div>
								<div class="span6">
									<input type="text" class="input-block-level" autocomplete="off" id="twoLastName" placeholder="Segundo Apellido" maxlength="45" name="twoLastName" required
									value="<?php if (isset($doc) && !empty($doc)) { print $employ['TWO_LAST_NAME'];}?>"/>	
								</div>
							</div>
						</div>
						<div class="span1"></div>
					</div>

					<div class="row">
						<div class="span5 offset1">
							Dirección:<br>
							<input type="text" class="input-block-level" autocomplete="off" id="streetAddress" placeholder="tipo numero1 - numero 2 barrio" maxlength="45" name="streetAddress" required
							value="<?php if (isset($doc) && !empty($doc)) { print $employ['STREET_ADDRESS'];}?>"
							/>
						</div>
						<div class="span5">
							Ciudad de Residencia:<br>
							<input type="text" class="input-block-level" id="cityResident" placeholder="Ciudad" maxlength="45" name="cityResident" required
							value="<?php if (isset($doc) && !empty($doc)) { print $employ['CITY'];}?>"
							/>
						</div>
						<div class="span1"></div>
					</div>

					<br>
					<div class="row">
						<div class="span5 offset1">
							Teléfono:<br>
							<input type="text" class="input-block-level" autocomplete="off" id="phoneNumber" placeholder="09874540.. o 31241401.." maxlength="10"  
							name="phoneNumber"  pattern="[0-9]{10}" required
							value="<?php if (isset($doc) && !empty($doc)) { print $employ['PHONE_NUMBER'];}?>"
							/>
						</div>
						<div class="span5">
							Correo Electrónico:<br>
							<input type="email" class="input-block-level" autocomplete="off" id="email" placeholder="ejemplo@ejemplo.com" maxlength="45" name="email" required
							value="<?php if (isset($doc) && !empty($doc)) { print $employ['EMAIL'];}?>"
							/>
						</div>
						<div class="span1"></div>
					</div>

					<br>
					<div class="row">
						<div class="span3 offset1">
							Tipo de Documento:<br>
							<select name="documentType" class="input-block-level">
								<option value="CEDULA CIUDADANÍA" 
                                                                        <?php if (isset($doc) && !empty($doc) && $employ['DOCUMENT_TYPE'] == "CEDULA CIUDADANÍA") {print 'selected';}?>
                                                                        >CEDULA CIUDADANIA</option>
								<option value="CEDULA EXTRANJERÍA"
                                                                        <?php if (isset($doc) && !empty($doc) && $employ['DOCUMENT_TYPE'] == "CEDULA EXTRANJERÍA") {print 'selected';}?>
                                                                        >CEDULA EXTRANJERIA</option>
							</select>
						</div>
						<div class="span4">
							Ciudad de Expedición:<br>
							<input type="text" class="input-block-level" id="documentCity" placeholder="Ciudad(Departamento)" maxlength="45" name="documentCity" required
							value="<?php if (isset($doc) && !empty($doc)) { print $employ['DOCUMENT_CITY'];}?>"/>
						</div>
						<div class="span3">
							Número de Documento:<br>
							<input type="text" class="input-block-level" autocomplete="off" id="documentNumber" placeholder="N° documento de identidad" maxlength="25" name="documentNumber" required
							<?php if (isset($doc) && !empty($doc)) { print "value='$employ[DOCUMENT_NUMBER]' disabled='"."true'";}?>/>
						</div>
						<div class="span1"></div>
					</div>
					<br>
                                        <div class="row">
						<div class="span10 offset1">
							Funciones:<br>
                                                        <label for="administrator" class="checkbox">
                                                            <input type="checkbox" name="administrator" id="administrator" onclick="create_user.disabled = !this.checked;upload_user.disabled = !this.checked;
                                                                            create_line.disabled = !this.checked;upload_line.disabled = !this.checked;create_program.disabled = !this.checked;
                                                                            upload_program.disabled = !this.checked;create_project.disabled = !this.checked;upload_project.disabled = !this.checked;
                                                                            create_contract.disabled = !this.checked;upload_contract.disabled = !this.checked;
                                                                            create_project_year.disabled = !this.checked;upload_project_year.disabled = !this.checked;
                                                                            create_pa.disabled = !this.checked;upload_pa.disabled = !this.checked;create_poa.disabled = !this.checked;
                                                                            upload_poa.disabled = !this.checked;"> Administrador
							</label>
							<div class="container">
								<div class="span3">
									<h4>Usuarios</h4>
									<label for="create_user" class="checkbox"><input type="checkbox" name="create_user" id="create_user" value="create_user" disabled>
                                                                            Crear Usuarios
                                                                        </label>
									<label for="upload_user" class="checkbox"><input type="checkbox" name="upload_user" id="upload_user" value="upload_user" disabled>
                                                                            Actualizar Usuarios
                                                                        </label>
									<label for="read_user" class="checkbox"><input type="checkbox" name="read_user" id="read_user" value="read_user">
                                                                            Leer Usuarios
                                                                        </label>
                                                                        
									<h4>Linea</h4>
									<label for="create_line" class="checkbox"><input type="checkbox" name="create_line" id="create_line" value="create_line" disabled>
                                                                            Crear Linea
                                                                        </label>
									<label for="upload_line" class="checkbox"><input type="checkbox" name="upload_line" id="upload_line" value="upload_line" disabled>
                                                                            Actualizar Linea
                                                                        </label>
									<label for="read_line" class="checkbox"><input type="checkbox" name="read_line" id="read_line" value="read_line">
                                                                            Leer Linea
                                                                        </label>
                                                                        
									<h4>Programa</h4>
									<label for="create_program" class="checkbox"><input type="checkbox" name="create_program" id="create_program" value="create_program" disabled>
                                                                            Crear Programa
                                                                        </label>
									<label for="upload_program" class="checkbox"><input type="checkbox" name="upload_program" id="upload_program" value="upload_program" disabled>
                                                                            Actualizar Programa
                                                                        </label>
									<label for="read_program" class="checkbox"><input type="checkbox" name="read_program" id="read_program" value="read_program">
                                                                            Leer Programa
                                                                        </label>
								</div>
								<div class="span3">
									<h4>Proyecto</h4>
									<label for="create_project" class="checkbox"><input type="checkbox" name="create_project" id="create_project" value="create_project" disabled>
                                                                           Crear Proyecto
                                                                        </label>
									<label for="upload_project" class="checkbox"><input type="checkbox" name="upload_project" id="upload_project" value="upload_project" disabled
									
									>Actualizar Proyecto</label>
									<label for="read_project" class="checkbox"><input type="checkbox" name="read_project" id="read_project" value="read_project"
									
									>Leer Proyecto</label>
									<h4>Contratos</h4>
									<label for="create_contract" class="checkbox"><input type="checkbox" name="create_contract" id="create_contract" value="create_contract" disabled
									
									>Crear Contrato</label>
									<label for="upload_contract" class="checkbox"><input type="checkbox" name="upload_contract" id="upload_contract" value="upload_contract" disabled
									
									>Actualizar Contrato</label>
									<label for="read_contract" class="checkbox"><input type="checkbox" name="read_contract" id="read_contract" value="read_contract"
									
									>Leer Contrato</label>
									<h4>Año Proyecto</h4>
									<label for="create_project_year" class="checkbox"><input type="checkbox" name="create_project_year" id="create_project_year" value="create_project_year" disabled
									
									>Crear Año Proyecto</label>
									<label for="upload_project_year" class="checkbox"><input type="checkbox" name="upload_project_year" id="upload_project_year" value="upload_project_year" disabled
									
									>Actualizar Año Proyecto</label>
									<label for="read_project_year" class="checkbox"><input type="checkbox" name="read_project_year" id="read_project_year" value="read_project_year"
									
									>Leer Año Proyecto</label>
								</div>
								<div class="span3">
									<h4>Actividad PA</h4>
									<label for="create_pa" class="checkbox"><input type="checkbox" name="create_pa" id="create_pa" value="create_pa" disabled
									
									>Crear Actividad PA</label>
									<label for="upload_pa" class="checkbox"><input type="checkbox" name="upload_pa" id="upload_pa" value="upload_pa" disabled
									
									>Actualizar Actividad PA</label>
									<label for="read_pa" class="checkbox"><input type="checkbox" name="read_pa" id="read_pa" value="read_pa"
									
									>Leer Actividad PA</label>
									<h4>Actividad POA</h4>
									<label for="create_poa" class="checkbox"><input type="checkbox" name="create_poa" id="create_poa" value="create_poa" disabled
									
									>Crear Actividad POA</label>
									<label for="upload_poa" class="checkbox"><input type="checkbox" name="upload_poa" id="upload_poa" value="upload_poa" disabled
									
									>Crear Actividad POA</label>
									<label for="read_poa" class="checkbox"><input type="checkbox" name="read_poa" id="read_poa" value="read_poa"
									
									>Crear Actividad POA</label>
									<h4>Avance POA</h4>
									<label for="create_advance_poa" class="checkbox"><input type="checkbox" name="create_advance_poa" id="create_advance_poa" value="create_advance_poa" 
									
									>Crear Avance POA</label>
									<label for="upload_advance_poa" class="checkbox"><input type="checkbox" name="upload_advance_poa" id="upload_advance_poa" value="upload_advance_poa" 
									
									>Actualizar Avance POA</label>
									<label for="read_advance_poa" class="checkbox"><input type="checkbox" name="read_advance_poa" id="read_advance_poa" value="read_advance_poa"
									
									>Leer Avance POA</label>
								</div>
								
							
							</div>
						</div>
						<div class="span1"></div>
					</div>

					<br>
					<div class="row">
						<div class="span5 offset1">
							Subdirección:<br>
                                                        <select id="subdirectorate" name="subdirectorate" class="input-block-level" required onchange="from(document.form_edit.subdirectorate.value, 'manager', '../../controller/Employee/managerSelect.php')">
                                                            <option value="">Seleccione</option>
                                                                <?php 
                                                                while ($row = mysql_fetch_array($subdAll)){?>
                                                                    <option value="<?php print $row['SUBDIRECTORATE_ID'];?>"
                                                                         <?php if (isset($doc) && !empty($doc)) {
                                                                             if ($employ['SUBDIRECTORATE_ID'] == $row['SUBDIRECTORATE_ID']) { print 'selected';}
                                                                             }?>
                                                                            >
                                                                        <?php print $row['SUBDIRECTORATE_NAME'];?>
                                                                    </option>
                                                                <?php } ?>
								
							</select>
						</div>
						<div class="span5" id="mydiv">
							Jefe Inmediato o Supervisor:<br>
							<select id="manager" name="manager" class="input-block-level">
                                                            <option value="">Seleccione</option>
                                                            <?php $emp_manager = mysql_fetch_array($emp_man);
                                                            if (isset($doc) && !empty($doc) && (isset($emp_manager) && !empty($emp_manager))) { 
                                                                
                                                            ?>
                                                            <option value="<?php print $emp_manager['DOCUMENT_NUMBER'] ?>" <?php print 'selected'; ?>
                                                                ><?php print($emp_manager['ONE_LAST_NAME']." ".$emp_manager['TWO_LAST_NAME']." ".$emp_manager['ONE_FIRST_NAME']." ".$emp_manager['TWO_FIRST_NAME']."<br>"); ?></option>
                                                            <?php } ?>
							</select>
						</div>
						<div class="span1"></div>
					</div>

					<br>
					<div class="row">
						<div class="span5 offset1">
							Fecha de Incio de Contrato:<br>
							<input type="date" class="input-block-level" id="hireDate" placeholder="Tunja(Bayacá)" maxlength="45" name="hireDate" required
							value="<?php if (isset($doc) && !empty($doc)) { print $employ['HIRE_DATE'];}?>"/>
							
						</div>
						<div class="span5">
							Fecha de Finalizacion de Contrato:<br>
							<input type="date" class="input-block-level" id="endDate" placeholder="Tunja(Bayacá)" maxlength="45" name="endDate"
							value="<?php if (isset($doc) && !empty($doc)) { print $employ['END_DATE'];}?>"/>
						</div>
						<div class="span1"></div>
					</div>

					<br>
					<div class="row">
						<div class="span5 offset1">
							Cargo:<br>
							<div class="control-group">
								<div class="span8">
									<select  name="job" class="input-block-level" required>
                                                                            <option value="">Seleccione</option>
                                                                            <?php 
                                                                            while ($row1 = mysql_fetch_array($job)){?>
										<option value="<?php print $row1['JOB_ID'];?>"
                                                                                    <?php if (isset($doc) && !empty($doc)) {
                                                                                        if ($employ['JOB_ID'] == $row1['JOB_ID']) { print 'selected';}
                                                                                        }?>
                                                                                       >
                                                                                   <?php print $row1['JOB_TITLE'];?>
                                                                               </option>
                                                                            <?php } ?>
									</select>
								</div>
								<div class="span4">
									<a data-toggle="modal" href="#newJob" class="btn btn-default input-block-level" onclick="sendListJob()"><strong>Nuevo!</strong></a>
								</div>
							</div>		
						</div>
						<div class="span5">
							Estado Funcionario:<br>
							<select class="input-block-level" name="activeState" required>
                                                            <option value="">Seleccione</option>
                                                            <option value="0" <?php if (isset($doc) && !empty($doc) && $employ['ACTIVE_STATE'] == 0 ) { print 'selected';} ?>>INACTIVO</option>
                                                            <option value="1" <?php if (isset($doc) && !empty($doc) && $employ['ACTIVE_STATE'] == 1 ) { print 'selected';} ?>>ACTIVO</option>
							</select>
						</div>
						<div class="span1"></div>
					</div>

					<br>
					<div class="row">
						<div class="span8 offset2 control-group">
							<div class="span6">
								<button type="submit" class="btn btn-primary input-block-level"
                                                                        <?php if (isset($doc) && !empty($doc)) {
                                                                        $_SESSION['edit_employee'] = $employ['DOCUMENT_NUMBER'];
                                                                    } ?>>Aceptar</button>	
							</div>
							<div class="span6">
                                                            <a href="http://localhost/SIE_V2/view/principal.php" class="btn btn-default input-block-level" >Cancelar</a>	
							</div>
							
							
						</div>
						<div class="span2"></div>
					</div>
				</form>
			</div>
			<!--============columna derecha==================-->
			<div class="container span2"></div>
		</div>
	</div>
    <script type="text/javascript" src="../../js/jquery.js"></script>
    <script type="text/javascript" src="../../js/bootstrap.js"></script>
</body>
</html>
<?php } ?>