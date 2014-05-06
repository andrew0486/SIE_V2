<div class="navbar navbar-fixed-top" role="navigation">
    <div class="navbar-inner">
      <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <a class="brand" href="../principal/index.php">SIE</a>
        <?php 
            @$nombre = $_SESSION['nameLogin'];
            @$admin = $_SESSION['admin'];
            if ($admin == true){
        ?>
        <div class="nav-collapse  visible-desktop"> 
          <ul class="nav">
                  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-th-list"></i> Usuarios</a>
                        <ul class="dropdown-menu">
                            <li><a class="button" href="../admin/employee_edit.php">Crear Usuario</a></li>
                            <li><a class="button" href="../admin/employees_list.php">Listar Usuarios</a></li>
                        </ul>
                  </li>
                  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-th-list"></i> Lineas Estrategicas</a>
                        <ul class="dropdown-menu">
                                <li><a class="button" href="../admin/strategic_lines.php">Crear</a></li>
                                <li><a class="button" href="../admin/strategic_line_consult.php">Consultar</a></li>
                        </ul>
                      <?php
                      //require '../../img/Logo/';
                      ?>
                  </li>
                  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class=" icon-list-alt"></i>  Programas</a>
                        <ul class="dropdown-menu">
                                <li><a class="button" href="../admin/programs.php">Crear</a></li>
                                <li><a class="button" href="../admin/programs_consult.php">Consultar</a></li>
                        </ul>	
                  </li>

                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-folder-open"></i> Proyectos</a>
                        <ul class="dropdown-menu">
                                <li><a class="button" href="../admin/projectInfo.php">Crear</a></li>
                                <li><a class="button" href="../admin/project_consult.php">Consultar</a></li>
                        </ul>
                    </li>	

                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-user"></i> <?php echo $nombre;?></a>
                        <ul class="dropdown-menu">
                            <li><a class="button" href="../../controller/session/logout.php">Salir</a></li>
                        </ul>
                    </li>	
            </ul>
        </div>
        <div class="nav-collapse  hidden-desktop"> 
          <ul class="nav">
            <li><a class="button" href="../admin/employees_list.php">Listar Usuarios</a></li>
            <li><a class="button" href="../admin/strategic_line_consult.php">Listar Lineas Est</a></li>
            <li><a class="button" href="../admin/programs_consult.php">Listar Programas</a></li>
            <li><a class="button" href="../admin/project_consult.php">Listar Proyectos</a></li>
            <li><a class="button" href="../../controller/session/logout.php">Salir</a></li>
          </ul>
        </div>
        <?php }else{ ?>
        <!--div class="nav-collapse visible-desktop">
              <ul class="nav">
                      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-th-list"></i> Contratos</a>
                            <ul class="dropdown-menu">
                                
                            </ul>
                      </li>
                      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class=" icon-list-alt"></i>  Plan de Accion</a>
                            <ul class="dropdown-menu">
                                    
                            </ul>	
                      </li>

                      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-folder-open"></i> Plan Operativo Anual</a>
                            <ul class="dropdown-menu">
                                    
                            </ul>
                      </li>	
                      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-user"></i> <?php echo $nombre;?></a>
                          <ul class="dropdown-menu">
                              <li><a class="button" href="../../controller/session/logout.php">Salir</a></li>
                          </ul>
                      </li>		
              </ul>
        </div-->
        <div class="nav-collapse  visible-desktop"> 
          <ul class="nav">
                  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-th-list"></i> Contratos</a>
                        <ul class="dropdown-menu">
                            <li><a class="button" href="../coodinator/contract.php">Crear</a></li>
                            <li><a class="button" href="../coodinator/contract_consult.php">Consultar</a></li>
                            <li><a class="button" href="../principal/principal.php#movimientos" data-toggle="modal">Movimientos</a></li>
                        </ul>
                  </li>
                  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-th-list"></i> Plan de Acción</a>
                        <ul class="dropdown-menu">
                                <li><a class="button" href="../coodinator/pa.php">Crear</a></li>
                                <li><a class="button" href="../coodinator/pa_consult.php">Consultar</a></li>
                        </ul>
                      <?php
                      //require '../../img/Logo/';
                      ?>
                  </li>
                  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class=" icon-list-alt"></i> Plan Operativo Anual</a>
                        <ul class="dropdown-menu">
                                <li><a class="button" href="../coodinator/poa.php">Crear</a></li>
                                <li><a class="button" href="../coodinator/poa_consult.php">Consultar</a></li>
                        </ul>	
                  </li>
                  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-user"></i> <?php echo $nombre;?></a>
                        <ul class="dropdown-menu">
                            <li><a class="button" href="../../controller/session/logout.php">Salir</a></li>
                        </ul>
                  </li>	
            </ul>
        </div>
        <?php }?>
      </div>
  </div>
</div>
