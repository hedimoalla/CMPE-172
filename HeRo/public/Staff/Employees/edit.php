<?php 

require_once('../../../private/initialize.php'); 

// Check if request contains an ID, if not then redirect
if (!isset($_GET['id'])) {
  redirect_to(url_for('/Staff/Employees/index.php'));
}
$id = $_GET['id'];

if (is_post_request()) {

    // Handle form values sent by new.php
    $employee = [];
    $employee['emp_no'] = $_POST['emp_no'] ?? '';
    $employee['birth_date'] = $_POST['birth_date'] ?? '';
    $employee['first_name'] = $_POST['first_name'] ?? '';
    $employee['last_name'] = $_POST['last_name'] ?? '';
    $employee['gender'] = $_POST['gender'] ?? '';
    $employee['hire_date'] = $_POST['hire_date'] ?? '';

    $result = update_employee($employee);
    $_SESSION['message'] = 'The Employee was updated successfully.';
    redirect_to(url_for('/Staff/Employees/show.php?id=' . $id));

} else {

  $employee = find_employee_by_emp_no($id);

}
?>

<?php $page_title = 'Edit Employee'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/Staff/Employees/index.php'); ?>">&laquo; Back to List</a>

  <div class="employee edit">
    <h1>Edit Employee</h1>

    <form action="<?php echo url_for('/Staff/Employees/edit.php?id=' . h(u($id))); ?>" method="post">
      <dl>
        <dt>Employee Number</dt>
        <dd><?php echo h($employee['emp_no']); ?></dd>
      </dl>
      <dl>
        <dt>First Name</dt>
        <dd><input type="text" name="first_name" value="<?php echo h($employee['first_name']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Last Name</dt>
        <dd><input type="text" name="last_name" value="<?php echo h($employee['last_name']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Birthdate</dt>
        <dd><input type="text" name="birth_date" value="<?php echo h($employee['birth_date']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Gender</dt>
        <dd><input type="text" name="gender" value="<?php echo h($employee['gender']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Hire Date</dt>
        <dd><input type="text" name="hire_date" value="<?php echo h($employee['hire_date']); ?>" /></dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Edit Employee" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
