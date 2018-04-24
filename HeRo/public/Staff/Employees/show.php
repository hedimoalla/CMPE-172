<?php require_once('../../../private/initialize.php'); ?>

<?php
$id = $_GET['id'] ?? '1'; // PHP > 7.0
//echo $id;

$employee = find_employee_by_emp_no($id);
?>

<?php $page_title = 'Show Employee Information'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <a class="back-link" href="<?php echo url_for('/Staff/Employees/index.php'); ?>">&laquo; Back to List</a>
  <div class="employee show">
    <h1>Employee: <?php echo h($employee['first_name']); ?></h1>

    <div class="attributes">
      <dl>
        <dt>Employee Number</dt>
        <dd><?php echo h($employee['emp_no']); ?></dd>
      </dl>
      <dl>
        <dt>First Name</dt>
        <dd><?php echo h($employee['first_name']); ?></dd>
      </dl>
      <dl>
        <dt>Last Name</dt>
        <dd><?php echo h($employee['last_name']); ?></dd>
      </dl>
      <dl>
        <dt>Birthdate</dt>
        <dd><?php echo h($employee['birth_date']); ?></dd>
      </dl>
      <dl>
        <dt>Gender</dt>
        <dd><?php echo h($employee['gender']); ?></dd>
      </dl>
      <dl>
        <dt>Hire Date</dt>
        <dd><?php echo h($employee['hire_date']); ?></dd>
      </dl>
    </div>
  </div>
</div>
<?php include(SHARED_PATH . '/staff_footer.php'); ?>
