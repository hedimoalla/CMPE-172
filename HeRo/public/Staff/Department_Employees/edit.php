<?php 

require_once('../../../private/initialize.php'); 

// Check if request contains an ID, if not then redirect
if (!isset($_GET['id'])) {
  redirect_to(url_for('/Staff/Department_Employees/index.php'));
}
$id = $_GET['id'];

if (is_post_request()) {

    // Handle form values sent by new.php
    $department_emp = [];
    $department_emp['emp_no'] = $_POST['emp_no'] ?? '';    
    $department_emp['dept_no'] = $_POST['dept_no'] ?? '';
    $department_emp['from_date'] = $_POST['from_date'] ?? '';   
    $department_emp['to_date'] = $_POST['to_date'] ?? '';      

    $result = update_department_employee($department_emp);
    redirect_to(url_for('/Staff/Department_Employees/show.php?id=' . $id));

} else {

  $department_emp = find_department_employee_by_emp_no($id);

}
?>

<?php $page_title = 'Edit Department Employee'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/Staff/Department_Employees/index.php'); ?>">&laquo; Back to List</a>

  <div class="department employee edit">
    <h1>Edit Department Employee</h1>

    <form action="<?php echo url_for('/Staff/Department_Employees/edit.php?id=' . h(u($id))); ?>" method="post">
      <dl>
        <dt>Employee Number</dt>
        <dd><?php echo h($department_emp['emp_no']); ?></dd>
      </dl>
      <dl>
        <dt>Department Number</dt>
        <dd><input type="text" name="dept_no" value="<?php echo h($department_emp['dept_no']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Start Date</dt>
        <dd><input type="text" name="from_date" value="<?php echo h($department_emp['from_date']); ?>" /></dd>
      </dl>
      <dl>
        <dt>End Date</dt>
        <dd><input type="text" name="to_date" value="<?php echo h($department_emp['to_date']); ?>" /></dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Edit Department Employee" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
