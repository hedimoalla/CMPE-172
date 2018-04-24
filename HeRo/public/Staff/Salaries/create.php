<?php

require_once('../../../private/initialize.php');

if (is_post_request()) {

    // Handle form values sent by new.php
    $salary = [];
    $salary['emp_no'] = $_POST['emp_no'] ?? '';
    $salary['salary'] = $_POST['salary'] ?? '';
    $salary['from_date'] = $_POST['from_date'] ?? '';
    $salary['to_date'] = $_POST['to_date'] ?? '';

    $result = insert_salary($salary);
    $_SESSION['message'] = 'The Salary was created successfully.';
    redirect_to(url_for('/Staff/Salaries/index.php'));

} else {
    redirect_to(url_for('/Staff/Salaries/new.php'));
}

?>