<?php

require_once('../../../private/initialize.php');

if (is_post_request()) {

    // Handle form values sent by new.php
    $employee = [];
    $employee['emp_no'] = $_POST['emp_no'] ?? '';
    $employee['birth_date'] = $_POST['birth_date'] ?? '';
    $employee['first_name'] = $_POST['first_name'] ?? '';
    $employee['last_name'] = $_POST['last_name'] ?? '';
    $employee['gender'] = $_POST['gender'] ?? '';
    $employee['hire_date'] = $_POST['hire_date'] ?? '';

    $result = insert_employee($employee);
    $_SESSION['message'] = 'The Employee was created successfully.';
    redirect_to(url_for('/Staff/Employees/index.php'));

} else {
    redirect_to(url_for('/Staff/Employees/new.php'));
}

?>