<?php

require_once('../../../private/initialize.php');

if (is_post_request()) {

    // Handle form values sent by new.php
    $title = [];
    $title['emp_no'] = $_POST['emp_no'] ?? '';
    $title['title'] = $_POST['title'] ?? '';
    $title['from_date'] = $_POST['from_date'] ?? '';
    $title['to_date'] = $_POST['to_date'] ?? '';

    $result = insert_title($title);
    $_SESSION['message'] = 'The Title was created successfully.';
    redirect_to(url_for('/Staff/Titles/index.php'));

} else {
    redirect_to(url_for('/Staff/Titles/new.php'));
}

?>