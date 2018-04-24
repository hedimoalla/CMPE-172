<?php require_once('../../../private/initialize.php'); ?>

<?php
$id = $_GET['id'] ?? '1'; // PHP > 7.0
//echo $id;

$department = find_department_by_no($id);
?>

<?php $page_title = 'Show Department'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <a class="back-link" href="<?php echo url_for('/Staff/Departments/index.php'); ?>">&laquo; Back to List</a>
  <div class="department show">
    <h1>Department: <?php echo h($department['dept_name']); ?></h1>

    <div class="attributes">
      <dl>
        <dt>Department Number</dt>
        <dd><?php echo h($department['dept_no']); ?></dd>
      </dl>
      <dl>
        <dt>Department Name</dt>
        <dd><?php echo h($department['dept_name']); ?></dd>
      </dl>
    </div>
  </div>
</div>
<?php include(SHARED_PATH . '/staff_footer.php'); ?>
