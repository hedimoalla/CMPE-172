<?php

require_once('../../../private/initialize.php');

if (is_post_request()) {

    // Handle form values sent by new.php
    $admin = [];
    $admin['id'] = $_POST['id'] ?? '';
    $admin['first_name'] = $_POST['first_name'] ?? '';
    $admin['last_name'] = $_POST['last_name'] ?? '';
    $admin['email'] = $_POST['email'] ?? '';
    $admin['username'] = $_POST['username'] ?? '';
    $admin['hashed_password'] = $_POST['hashed_password'] ?? '';

    $result = insert_admin($admin);
    $_SESSION['message'] = 'The Admin was created successfully.';
    redirect_to(url_for('/Staff/Admins/index.php'));

} else {
    redirect_to(url_for('/Staff/Admins/new.php'));
}

?>