<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/Staff/Departments_Employees/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {

    $result = delete_department_employee($id);
    redirect_to(url_for('/Staff/Department_Employees/index.php'));

} else {
    $department_emp = find_department_employee_by_emp_no($id);
}

?>

<?php $page_title = 'Delete Department Employee'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/Staff/Department_Employees/index.php'); ?>">&laquo; Back to List</a>

  <div class="department employee delete">
    <h1>Delete Department Employee</h1>
    <p>Are you sure you want to delete this department employee?</p>
    <p class="item"><strong><?php echo h($department_emp['emp_no']); ?></strong></p>

    <form action="<?php echo url_for('/Staff/Department_Employees/delete.php?id=' . h(u($department_emp['emp_no']))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Department Employee" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
