<?php session_start();
    $emp_edit = $_SESSION['edit_employee'];
    //echo "ESTE ES EL EMPLEADO ".$idEMP;
    
    //BASIC REFERENCES EMPLOYE
    $emp_oneFirstName = strtoupper($_POST['oneFirstName']);
    $emp_twoFirstName = strtoupper($_POST['twoFirstName']);
    $emp_oneLastName = strtoupper($_POST['oneLastName']);
    $emp_twoLastName = strtoupper($_POST['twoLastName']);
    $emp_streetAddress = strtoupper($_POST['streetAddress']);
    $emp_cityResident = strtoupper($_POST['cityResident']);
    $emp_phoneNumber = strtoupper($_POST['phoneNumber']);
    $emp_email = strtoupper($_POST['email']);
    $emp_documentType = strtoupper($_POST['documentType']);
    $emp_documentCity = strtoupper($_POST['documentCity']);
    //$emp_documentNumber = strtoupper($_POST['documentNumber']);
    
    //FUNCTIONS EMPLOYRR
    
    //JOB REFERENCES EMPLOYEE
    $emp_manager = strtoupper($_POST['manager']);
    $emp_subdirectorate = strtoupper($_POST['subdirectorate']);
    $emp_job = strtoupper($_POST['job']);
    $emp_hireDate = strtoupper($_POST['hireDate']);
    $emp_activeState = strtoupper($_POST['activeState']);
    $emp_endDate = strtoupper($_POST['endDate']);
    //$emp_ = strtoupper($_POST['']);
    
    /*
    require_once '../database/consultas.php';
    $consulta = new Consulta();
    $consulta->setConsulta("INSERT INTO sie.employees (DOCUMENT_NUMBER, MANAGER_ID, SUBDIRECTORATE_ID, 
        JOB_ID, ONE_FIRST_NAME, TWO_FIRST_NAME, ONE_LAST_NAME, TWO_LAST_NAME, STREET_ADDRESS, CITY, 
        PHONE_NUMBER, EMAIL, DOCUMENT_TYPE, DOCUMENT_CITY, HIRE_DATE, ACTIVE_STATE, END_DATE) 
        VALUES ('$emp_edit', '$emp_manager', $emp_subdirectorate, $emp_job, '$emp_oneFirstName', '$emp_twoFirstName', '$emp_oneLastName',
            '$emp_twoLastName', '$emp_streetAddress', 
        '$emp_cityResident', '$emp_phoneNumber', '$emp_email', '$emp_documentType', '$emp_documentCity', 
        '$emp_hireDate', $emp_activeState,'$emp_endDate')");
     * 
     */
    
    
?>
