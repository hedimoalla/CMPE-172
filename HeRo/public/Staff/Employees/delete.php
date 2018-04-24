<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/Staff/Employees/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {

    $result = delete_employee($id);
    $_SESSION['message'] = 'The Employee was deleted successfully.';
    redirect_to(url_for('/Staff/Employees/index.php'));

} else {
    $employee = find_employee_by_emp_no($id);
}

?>

<?php $page_title = 'Employee Department'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/Staff/Employees/index.php'); ?>">&laquo; Back to List</a>

  <div class="employee delete">
    <h1>Delete Employee</h1>
    <p>Are you sure you want to delete this employee?</p>
    <p class="item"><strong><?php echo h($employee['first_name']); ?></strong></p>

    <form action="<?php echo url_for('/Staff/Employees/delete.php?id=' . h(u($employee['emp_no']))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Employee" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
