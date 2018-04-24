<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/Staff/Salaries/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {

    $result = delete_salary($id);
    $_SESSION['message'] = 'The Salary was deleted successfully.';
    redirect_to(url_for('/Staff/Salaries/index.php'));

} else {
    $salary = find_salary_by_emp_no($id);
}

?>

<?php $page_title = 'Salaries'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/Staff/Salaries/index.php'); ?>">&laquo; Back to List</a>

  <div class="salary delete">
    <h1>Delete Salary</h1>
    <p>Are you sure you want to delete this Salary?</p>
    <p class="item"><strong><?php echo h($salary['salary']); ?></strong></p>

    <form action="<?php echo url_for('/Staff/Salaries/delete.php?id=' . h(u($salary['emp_no']))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Salary" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
