<?php

require_once('../../../private/initialize.php');

if (is_post_request()) {

    // Handle form values sent by new.php
    $department_emp = [];
    $department_emp['emp_no'] = $_POST['emp_no'] ?? '';
    $department_emp['dept_no'] = $_POST['dept_no'] ?? '';
    $department_emp['from_date'] = $_POST['from_date'] ?? '';
    $department_emp['to_date'] = $_POST['to_date'] ?? '';

    $result = insert_department_employee($department_emp);
    redirect_to(url_for('/Staff/Department_Employees/index.php'));

} else {
    redirect_to(url_for('/Staff/Department_Employees/new.php'));
}

?>