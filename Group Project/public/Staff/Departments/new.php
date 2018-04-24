<?php 

require_once('../../../private/initialize.php'); 

?>

<?php $page_title = 'Create Department'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/Staff/Departments/index.php'); ?>">&laquo; Back to List</a>

  <div class="department new">
    <h1>Create Department</h1>

    <form action="<?php echo url_for('/Staff/Departments/create.php'); ?>" method="post">
      <dl>
        <dt>Department Number</dt>
        <dd><input type="text" name="dept_no" value="" /></dd>
      </dl>
      <dl>
        <dt>Department Name</dt>
        <dd><input type="text" name="dept_name" value="" /></dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Create Department" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
