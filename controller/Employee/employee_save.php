<?php 
    //BASIC REFERENCES EMPLOYE
    $emp_oneFirstName = trim(strtoupper($_POST['oneFirstName']));
    $emp_twoFirstName = trim(strtoupper($_POST['twoFirstName']));
    $emp_oneLastName = trim(strtoupper($_POST['oneLastName']));
    $emp_twoLastName = trim(strtoupper($_POST['twoLastName']));
    $emp_streetAddress = strtoupper($_POST['streetAddress']);
    $emp_cityResident = strtoupper($_POST['cityResident']);
    $emp_phoneNumber = trim(strtoupper($_POST['phoneNumber']));
    $emp_email = trim($_POST['email']);
    $emp_documentType = trim(strtoupper($_POST['documentType']));
    $emp_documentCity = strtoupper($_POST['documentCity']);
    $emp_documentNumber = trim(strtoupper($_POST['documentNumber']));
    
    //JOB REFERENCES EMPLOYEE
    @$emp_manager = $_POST['manager']; 
    $emp_subdirectorate = (int)$_POST['subdirectorate'];
    $emp_job = (int)$_POST['job'];
    $emp_hireDate = strtoupper($_POST['hireDate']);
    $emp_activeState = $_POST['activeState'];
    $emp_endDate = strtoupper($_POST['endDate']);
    
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
    
    require_once '../database/consultas.php';
    $consulta = new Consulta();
    if ((isset($emp_endDate) && !empty($emp_endDate)) && (isset($emp_manager) && !empty($emp_manager))){
        //echo 'entro a la normal';
    $consulta->setConsulta("INSERT INTO sie.employees (DOCUMENT_NUMBER, MANAGER_ID, SUBDIRECTORATE_ID, JOB_ID, ONE_FIRST_NAME, 
        TWO_FIRST_NAME, ONE_LAST_NAME, TWO_LAST_NAME, STREET_ADDRESS, CITY, PHONE_NUMBER, EMAIL, DOCUMENT_TYPE, 
        DOCUMENT_CITY, HIRE_DATE, PASSWORD, ACTIVE_STATE, END_DATE, FIRST_TIME) 
        VALUES ('$emp_documentNumber', '$emp_manager', $emp_subdirectorate, $emp_job, '$emp_oneFirstName', '$emp_twoFirstName', '$emp_oneLastName',
            '$emp_twoLastName', '$emp_streetAddress', 
        '$emp_cityResident', '$emp_phoneNumber', '$emp_email', '$emp_documentType', '$emp_documentCity', 
        '$emp_hireDate', $emp_documentNumber, $emp_activeState,'$emp_endDate', 1)");
 
    } elseif ((!isset($emp_endDate) || empty($emp_endDate)) && (isset($emp_manager) && !empty($emp_manager))) {
        //echo 'entro a la fecha nula';
        $consulta->setConsulta("INSERT INTO sie.employees (DOCUMENT_NUMBER, MANAGER_ID, SUBDIRECTORATE_ID, JOB_ID, ONE_FIRST_NAME, 
        TWO_FIRST_NAME, ONE_LAST_NAME, TWO_LAST_NAME, STREET_ADDRESS, CITY, PHONE_NUMBER, EMAIL, DOCUMENT_TYPE, 
        DOCUMENT_CITY, HIRE_DATE, PASSWORD, ACTIVE_STATE, END_DATE, FIRST_TIME) 
        VALUES ('$emp_documentNumber', '$emp_manager', $emp_subdirectorate, $emp_job, '$emp_oneFirstName', '$emp_twoFirstName', '$emp_oneLastName',
            '$emp_twoLastName', '$emp_streetAddress', 
        '$emp_cityResident', '$emp_phoneNumber', '$emp_email', '$emp_documentType', '$emp_documentCity', 
        '$emp_hireDate', $emp_documentNumber, $emp_activeState, null, 1)");
    
    } elseif ((isset($emp_endDate) && !empty($emp_endDate)) && (!isset($emp_manager) || empty($emp_manager))) {
        //echo 'entro al manager nulo';
        $consulta->setConsulta("INSERT INTO sie.employees (DOCUMENT_NUMBER, MANAGER_ID, SUBDIRECTORATE_ID, JOB_ID, ONE_FIRST_NAME, 
        TWO_FIRST_NAME, ONE_LAST_NAME, TWO_LAST_NAME, STREET_ADDRESS, CITY, PHONE_NUMBER, EMAIL, DOCUMENT_TYPE, 
        DOCUMENT_CITY, HIRE_DATE, PASSWORD, ACTIVE_STATE, END_DATE, FIRST_TIME) 
        VALUES ('$emp_documentNumber', null, $emp_subdirectorate, $emp_job, '$emp_oneFirstName', '$emp_twoFirstName', '$emp_oneLastName',
            '$emp_twoLastName', '$emp_streetAddress', 
        '$emp_cityResident', '$emp_phoneNumber', '$emp_email', '$emp_documentType', '$emp_documentCity', 
        '$emp_hireDate', $emp_documentNumber, $emp_activeState,'$emp_endDate', 1)");
         
    }  else {
        //echo 'ni la fecha final ni el manager existen';
        $consulta->setConsulta("INSERT INTO sie.employees (DOCUMENT_NUMBER, MANAGER_ID, SUBDIRECTORATE_ID, JOB_ID, ONE_FIRST_NAME, 
        TWO_FIRST_NAME, ONE_LAST_NAME, TWO_LAST_NAME, STREET_ADDRESS, CITY, PHONE_NUMBER, EMAIL, DOCUMENT_TYPE, 
        DOCUMENT_CITY, HIRE_DATE, PASSWORD, ACTIVE_STATE, END_DATE, FIRST_TIME) 
        VALUES ('$emp_documentNumber', null, $emp_subdirectorate, $emp_job, '$emp_oneFirstName', '$emp_twoFirstName', '$emp_oneLastName',
            '$emp_twoLastName', '$emp_streetAddress', 
        '$emp_cityResident', '$emp_phoneNumber', '$emp_email', '$emp_documentType', '$emp_documentCity', 
        '$emp_hireDate', $emp_documentNumber, $emp_activeState, null, 1)");
    }

     
    $consulta->setConsulta("INSERT INTO sie.functions (FUNCTION_ID, DOCUMENT_NUMBER, ADMINISTRATOR, 
        CREATE_USER, UPLOAD_USER, READ_USER, CREATE_LINE, UPLOAD_LINE, READ_LINE, CREATE_PROGRAM, UPLOAD_PROGRAM,
        READ_PROGRAM, CREATE_PROJECT, UPLOAD_PROJECT, READ_PROJECT, CREATE_CONTRACT, UPLOAD_CONTRACT, READ_CONTRACT,
        CREATE_PROJECT_YEAR, UPLOAD_PROJECT_YEAR, READ_PROJECT_YEAR, CREATE_PA, UPLOAD_PA, READ_PA, CREATE_POA, UPLOAD_POA,
        READ_POA, CREATE_ADVANCE_POA, UPLOAD_ADVANCE_POA, READ_ADVANCE_POA) 
        VALUES (NULL,'$emp_documentNumber', $emp_administrator, $emp_create_user, $emp_upload_user, $emp_read_user, 
            $emp_create_line, $emp_upload_line, $emp_read_line, $emp_create_program, $emp_upload_program, $emp_read_program, 
            $emp_create_project, $emp_upload_project, $emp_read_project, $emp_create_contract, $emp_upload_contract, $emp_read_contract, 
            $emp_create_project_year, $emp_upload_project_year, $emp_read_project_year, $emp_create_pa, $emp_upload_pa, $emp_read_pa, 
            $emp_create_poa, $emp_upload_poa, $emp_read_poa, $emp_create_advance_poa, $emp_upload_advance_poa, $emp_read_advance_poa)");
     
    header('Location: ../../view/admin/employees_list.php');
    
?>
