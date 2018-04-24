<?php 

require_once('../../../private/initialize.php'); 

?>

<?php $page_title = 'Add Employee'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/Staff/Employees/index.php'); ?>">&laquo; Back to List</a>

  <div class="employee new">
    <h1>Add Employee</h1>

    <form action="<?php echo url_for('/Staff/Employees/create.php'); ?>" method="post">
      <dl>
        <dt>Employee Number</dt>
        <dd><input type="text" name="emp_no" value="" /></dd>
      </dl>
      <dl>
        <dt>First Name</dt>
        <dd><input type="text" name="first_name" value="" /></dd>
      </dl>
      <dl>
        <dt>Last Name</dt>
        <dd><input type="text" name="last_name" value="" /></dd>
      </dl>
      <dl>
        <dt>Birthdate</dt>
        <dd><input type="text" name="birth_date" value="" /></dd>
      </dl>
      <dl>
        <dt>Gender</dt>
        <dd><input type="text" name="gender" value="" /></dd>
      </dl>
      <dl>
        <dt>Hire Date</dt>
        <dd><input type="text" name="hire_date" value="" /></dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Add Employee" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
