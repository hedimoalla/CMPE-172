<?php

require_once('../../../private/initialize.php');

if (is_post_request()) {

    // Handle form values sent by new.php
    $department = [];
    $department['dept_no'] = $_POST['dept_no'] ?? '';
    $department['dept_name'] = $_POST['dept_name'] ?? '';

    $result = insert_department($department);
    $_SESSION['message'] = 'The Department was created successfully.';
    redirect_to(url_for('/Staff/Departments/index.php'));

} else {
    redirect_to(url_for('/Staff/Departments/new.php'));
}

?>