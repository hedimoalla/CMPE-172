<?php 

require_once('../../../private/initialize.php'); 

?>

<?php $page_title = 'Add Title'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/Staff/Titles/index.php'); ?>">&laquo; Back to List</a>

  <div class="title new">
    <h1>Add Title</h1>

    <form action="<?php echo url_for('/Staff/Titles/create.php'); ?>" method="post">
      <dl>
        <dt>Employee Number</dt>
        <dd><input type="text" name="emp_no" value="" /></dd>
      </dl>
      <dl>
        <dt>Title</dt>
        <dd><input type="text" name="title" value="" /></dd>
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
        <input type="submit" value="Add Title" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
