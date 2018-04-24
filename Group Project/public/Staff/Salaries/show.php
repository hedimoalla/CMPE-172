<?php require_once('../../../private/initialize.php'); ?>

<?php
$id = $_GET['id'] ?? '1'; // PHP > 7.0
//echo $id;

$salary = find_salary_by_emp_no($id);
?>

<?php $page_title = 'Show Salary Information'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <a class="back-link" href="<?php echo url_for('/Staff/Salaries/index.php'); ?>">&laquo; Back to List</a>
  <div class="salary show">
    <h1>Salary: <?php echo h($salary['salary']); ?></h1>

    <div class="attributes">
      <dl>
        <dt>Employee Number</dt>
        <dd><?php echo h($salary['emp_no']); ?></dd>
      </dl>
      <dl>
        <dt>First Name</dt>
        <dd><?php echo h($salary['salary']); ?></dd>
      </dl>
      <dl>
        <dt>Last Name</dt>
        <dd><?php echo h($salary['from_date']); ?></dd>
      </dl>
      <dl>
        <dt>Birthdate</dt>
        <dd><?php echo h($salary['to_date']); ?></dd>
      </dl>
    </div>
  </div>
</div>
<?php include(SHARED_PATH . '/staff_footer.php'); ?>
