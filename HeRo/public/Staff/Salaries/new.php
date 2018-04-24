<?php 

require_once('../../../private/initialize.php'); 

?>

<?php $page_title = 'Add Salary'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/Staff/Salaries/index.php'); ?>">&laquo; Back to List</a>

  <div class="salary new">
    <h1>Add Salary</h1>

    <form action="<?php echo url_for('/Staff/Salaries/create.php'); ?>" method="post">
      <dl>
        <dt>Employee Number</dt>
        <dd><input type="text" name="emp_no" value="" /></dd>
      </dl>
      <dl>
        <dt>Salary</dt>
        <dd><input type="text" name="salary" value="" /></dd>
      </dl>
      <dl>
        <dt>Beginning Date</dt>
        <dd><input type="text" name="from_date" value="" /></dd>
      </dl>
      <dl>
        <dt>End Date</dt>
        <dd><input type="text" name="to_date" value="" /></dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Add Salary" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
