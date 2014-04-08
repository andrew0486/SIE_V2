<?php session_start();
    $emp_documentNumber = $_SESSION['edit_employee'];
    //echo "ESTE ES EL EMPLEADO ".$idEMP;
    
    //BASIC REFERENCES EMPLOYE
    $emp_oneFirstName = strtoupper($_POST['oneFirstName']);
    $emp_twoFirstName = strtoupper($_POST['twoFirstName']);
    $emp_oneLastName = strtoupper($_POST['oneLastName']);
    $emp_twoLastName = strtoupper($_POST['twoLastName']);
    $emp_streetAddress = strtoupper($_POST['streetAddress']);
    $emp_cityResident = strtoupper($_POST['cityResident']);
    $emp_phoneNumber = strtoupper($_POST['phoneNumber']);
    $emp_email = $_POST['email'];
    $emp_documentType = strtoupper($_POST['documentType']);
    $emp_documentCity = strtoupper($_POST['documentCity']);
    //$emp_documentNumber = strtoupper($_POST['documentNumber']);
    
    //JOB REFERENCES EMPLOYEE
    @$emp_manager = $_POST['manager']; 
    $emp_subdirectorate = (int)$_POST['subdirectorate'];
    $emp_job = (int)$_POST['job'];
    $emp_hireDate = strtoupper($_POST['hireDate']);
    $emp_activeState = $_POST['activeState'];
    $emp_endDate = strtoupper($_POST['endDate']);
    //echo $emp_manager." - ".$emp_subdirectorate." - ".$emp_job." - ".$emp_hireDate." - ".$emp_activeState." - ".$emp_endDate;

    //FUNCTIONS EMPLOYRE
    $emp_administrator = 0; if (!empty($_POST['administrator'])){$emp_administrator = 1;}
    $emp_create_user = 0; if (!empty($_POST['create_user'])){$emp_create_user = 1;}
    $emp_upload_user = 0; if (!empty($_POST['upload_user'])){$emp_upload_user = 1;}
    $emp_read_user = 0; if (!empty($_POST['read_user'])){$emp_read_user = 1;}
    $emp_create_line = 0; if (!empty($_POST['create_line'])){$emp_create_line = 1;}
    $emp_upload_line = 0; if (!empty($_POST['upload_line'])){$emp_upload_line = 1;}
    $emp_read_line = 0; if (!empty($_POST['read_line'])){$emp_read_line = 1;}
    $emp_create_program = 0; if (!empty($_POST['create_program'])){$emp_create_program = 1;}
    $emp_upload_program = 0; if (!empty($_POST['upload_program'])){$emp_upload_program = 1;}
    $emp_read_program = 0; if (!empty($_POST['read_program'])){$emp_read_program = 1;}
    $emp_create_project = 0; if (!empty($_POST['create_project'])){$emp_create_project = 1;}
    $emp_upload_project = 0; if (!empty($_POST['upload_project'])){$emp_upload_project = 1;}
    $emp_read_project = 0; if (!empty($_POST['read_project'])){$emp_read_project = 1;}
    $emp_create_contract = 0; if (!empty($_POST['create_contract'])){$emp_create_contract = 1;}
    $emp_upload_contract = 0; if (!empty($_POST['upload_contract'])){$emp_upload_contract = 1;}
    $emp_read_contract = 0; if (!empty($_POST['read_contract'])){$emp_read_contract = 1;}
    $emp_create_project_year = 0; if (!empty($_POST['create_project_year'])){$emp_create_project_year = 1;}
    $emp_upload_project_year = 0; if (!empty($_POST['upload_project_year'])){$emp_upload_project_year = 1;}
    $emp_read_project_year = 0; if (!empty($_POST['read_project_year'])){$emp_read_project_year = 1;}
    $emp_create_pa = 0; if (!empty($_POST['create_pa'])){$emp_create_pa = 1;}
    $emp_upload_pa = 0; if (!empty($_POST['upload_pa'])){$emp_upload_pa = 1;}
    $emp_read_pa = 0; if (!empty($_POST['read_pa'])){$emp_read_pa = 1;}
    $emp_create_poa = 0; if (!empty($_POST['create_poa'])){$emp_create_poa = 1;}
    $emp_upload_poa = 0; if (!empty($_POST['upload_poa'])){$emp_upload_poa = 1;}
    $emp_read_poa = 0; if (!empty($_POST['read_poa'])){$emp_read_poa = 1;}
    $emp_create_advance_poa = 0; if (!empty($_POST['create_advance_poa'])){$emp_create_advance_poa = 1;}
    $emp_upload_advance_poa = 0; if (!empty($_POST['upload_advance_poa'])){$emp_upload_advance_poa = 1;}
    $emp_read_advance_poa = 0; if (!empty($_POST['read_advance_poa'])){$emp_read_advance_poa = 1;}
    //echo $emp_create_advance_poa." - ".$emp_upload_advance_poa." - ".$emp_read_advance_poa;
    
    require_once '../database/consultas.php';
    $consulta = new Consulta();
    
     if ((isset($emp_endDate) && !empty($emp_endDate)) && (isset($emp_manager) && !empty($emp_manager))){
        //echo 'entro a la normal';
         $consulta->setConsulta("UPDATE sie.employees SET MANAGER_ID='$emp_manager', SUBDIRECTORATE_ID=$emp_subdirectorate,
        JOB_ID=$emp_job, ONE_FIRST_NAME='$emp_oneFirstName', TWO_FIRST_NAME='$emp_twoFirstName', ONE_LAST_NAME='$emp_oneLastName', TWO_LAST_NAME='$emp_twoLastName',
        STREET_ADDRESS='$emp_streetAddress', CITY='$emp_cityResident', PHONE_NUMBER='$emp_phoneNumber', EMAIL='$emp_email',
        DOCUMENT_TYPE='$emp_documentType', DOCUMENT_CITY='$emp_documentCity', HIRE_DATE='$emp_hireDate',
        ACTIVE_STATE=$emp_activeState, END_DATE='$emp_endDate' WHERE DOCUMENT_NUMBER='$emp_documentNumber'");
 
    } elseif ((!isset($emp_endDate) || empty($emp_endDate)) && (isset($emp_manager) && !empty($emp_manager))) {
        //echo 'entro a la fecha nula';
        $consulta->setConsulta("UPDATE sie.employees SET MANAGER_ID='$emp_manager', SUBDIRECTORATE_ID=$emp_subdirectorate,
        JOB_ID=$emp_job, ONE_FIRST_NAME='$emp_oneFirstName', TWO_FIRST_NAME='$emp_twoFirstName', ONE_LAST_NAME='$emp_oneLastName', TWO_LAST_NAME='$emp_twoLastName',
        STREET_ADDRESS='$emp_streetAddress', CITY='$emp_cityResident', PHONE_NUMBER='$emp_phoneNumber', EMAIL='$emp_email',
        DOCUMENT_TYPE='$emp_documentType', DOCUMENT_CITY='$emp_documentCity', HIRE_DATE='$emp_hireDate',
        ACTIVE_STATE=$emp_activeState, END_DATE=null WHERE DOCUMENT_NUMBER='$emp_documentNumber'");
    
    } elseif ((isset($emp_endDate) && !empty($emp_endDate)) && (!isset($emp_manager) || empty($emp_manager))) {
        //echo 'entro al manager nulo';
        $consulta->setConsulta("UPDATE sie.employees SET MANAGER_ID=null, SUBDIRECTORATE_ID=$emp_subdirectorate,
        JOB_ID=$emp_job, ONE_FIRST_NAME='$emp_oneFirstName', TWO_FIRST_NAME='$emp_twoFirstName', ONE_LAST_NAME='$emp_oneLastName', TWO_LAST_NAME='$emp_twoLastName',
        STREET_ADDRESS='$emp_streetAddress', CITY='$emp_cityResident', PHONE_NUMBER='$emp_phoneNumber', EMAIL='$emp_email',
        DOCUMENT_TYPE='$emp_documentType', DOCUMENT_CITY='$emp_documentCity', HIRE_DATE='$emp_hireDate',
        ACTIVE_STATE=$emp_activeState, END_DATE='$emp_endDate' WHERE DOCUMENT_NUMBER='$emp_documentNumber'");
         
    }  else {
        //echo 'ni la fecha final ni el manager existen';
        
    }
    
    $consulta->setConsulta("UPDATE sie.employees SET MANAGER_ID=null, SUBDIRECTORATE_ID=$emp_subdirectorate,
        JOB_ID=$emp_job, ONE_FIRST_NAME='$emp_oneFirstName', TWO_FIRST_NAME='$emp_twoFirstName', ONE_LAST_NAME='$emp_oneLastName', TWO_LAST_NAME='$emp_twoLastName',
        STREET_ADDRESS='$emp_streetAddress', CITY='$emp_cityResident', PHONE_NUMBER='$emp_phoneNumber', EMAIL='$emp_email',
        DOCUMENT_TYPE='$emp_documentType', DOCUMENT_CITY='$emp_documentCity', HIRE_DATE='$emp_hireDate',
        ACTIVE_STATE=$emp_activeState, END_DATE=null WHERE DOCUMENT_NUMBER='$emp_documentNumber'");
    
    header('Location: http://localhost/SIE_V2/view/admin/employees_list.php');
?>
