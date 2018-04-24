<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/Staff/Departments/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {

    $result = delete_department($id);
    $_SESSION['message'] = 'The Department was deleted successfully.';
    redirect_to(url_for('/Staff/Departments/index.php'));

} else {
    $department = find_department_by_no($id);
}

?>

<?php $page_title = 'Delete Department'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/Staff/Departments/index.php'); ?>">&laquo; Back to List</a>

  <div class="department delete">
    <h1>Delete Department</h1>
    <p>Are you sure you want to delete this department?</p>
    <p class="item"><strong><?php echo h($department['dept_name']); ?></strong></p>

    <form action="<?php echo url_for('/Staff/Departments/delete.php?id=' . h(u($department['dept_no']))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Department" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
