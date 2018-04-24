<?php 

require_once('../../../private/initialize.php'); 

?>

<?php $page_title = 'Create Department Employee'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/Staff/Department_Employees/index.php'); ?>">&laquo; Back to List</a>

  <div class="department employee new">
    <h1>Create Department Employee</h1>

    <form action="<?php echo url_for('/Staff/Department_Employees/create.php'); ?>" method="post">
      <dl>
        <dt>Employee Number</dt>
        <dd><input type="text" name="emp_no" value="" /></dd>
      </dl>
      <dl>
        <dt>Department Number</dt>
        <dd><input type="text" name="dept_no" value="" /></dd>
      </dl>
      <dl>
        <dt>Start Date</dt>
        <dd><input type="text" name="from_date" value="" /></dd>
      </dl>
      <dl>
        <dt>End Date</dt>
        <dd><input type="text" name="to_date" value="" /></dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Create Department Employee" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
