<?php

require_once('../../../private/initialize.php');

if (is_post_request()) {

    // Handle form values sent by new.php
    $department_man = [];
    $department_man['emp_no'] = $_POST['emp_no'] ?? '';
    $department_man['dept_no'] = $_POST['dept_no'] ?? '';
    $department_man['from_date'] = $_POST['from_date'] ?? '';
    $department_man['to_date'] = $_POST['to_date'] ?? '';

    $result = insert_department_manager($department_man);
    redirect_to(url_for('/Staff/Department_Managers/index.php'));

} else {
    redirect_to(url_for('/Staff/Department_Managers/new.php'));
}

?>