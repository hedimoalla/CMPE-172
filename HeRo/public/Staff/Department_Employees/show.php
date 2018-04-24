<?php require_once('../../../private/initialize.php'); ?>

<?php
$id = $_GET['id'] ?? '1'; // PHP > 7.0
//echo $id;

$department_emp = find_department_employee_by_emp_no($id);
?>

<?php $page_title = 'Show Department Employee'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <a class="back-link" href="<?php echo url_for('/Staff/Department_Employees/index.php'); ?>">&laquo; Back to List</a>
  <div class="department employee show">
    <h1>Department Employee: <?php echo h($department_emp['emp_no']); ?></h1>

    <div class="attributes">
      <dl>
        <dt>Employee Number</dt>
        <dd><?php echo h($department_emp['emp_no']); ?></dd>
      </dl>
      <dl>
        <dt>Department Name</dt>
        <dd><?php echo h($department_emp['dept_no']); ?></dd>
      </dl>
      <dl>
        <dt>Start date</dt>
        <dd><?php echo h($department_emp['from_date']); ?></dd>
      </dl>
      <dl>
        <dt>End date</dt>
        <dd><?php echo h($department_emp['to_date']); ?></dd>
      </dl>
    </div>
  </div>
</div>
<?php include(SHARED_PATH . '/staff_footer.php'); ?>
