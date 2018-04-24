<?php require_once('../../../private/initialize.php'); ?>

<?php
$id = $_GET['id'] ?? '1'; // PHP > 7.0
//echo $id;

$department_man = find_department_manager_by_emp_no($id);
?>

<?php $page_title = 'Show Department Manager'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <a class="back-link" href="<?php echo url_for('/Staff/Department_Managers/index.php'); ?>">&laquo; Back to List</a>
  <div class="department manager show">
    <h1>Department Manager: <?php echo h($department_man['emp_no']); ?></h1>

    <div class="attributes">
      <dl>
        <dt>Employee Number</dt>
        <dd><?php echo h($department_man['emp_no']); ?></dd>
      </dl>
      <dl>
        <dt>Department Name</dt>
        <dd><?php echo h($department_man['dept_no']); ?></dd>
      </dl>
      <dl>
        <dt>Start date</dt>
        <dd><?php echo h($department_man['from_date']); ?></dd>
      </dl>
      <dl>
        <dt>End date</dt>
        <dd><?php echo h($department_man['to_date']); ?></dd>
      </dl>
    </div>
  </div>
</div>
<?php include(SHARED_PATH . '/staff_footer.php'); ?>
