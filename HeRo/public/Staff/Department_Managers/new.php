<?php 

require_once('../../../private/initialize.php'); 

?>

<?php $page_title = 'Create Department Manager'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/Staff/Department_Managers/index.php'); ?>">&laquo; Back to List</a>

  <div class="department manager new">
    <h1>Create Department Manager</h1>

    <form action="<?php echo url_for('/Staff/Department_Managers/create.php'); ?>" method="post">
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
        <input type="submit" value="Create Department Manager" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
