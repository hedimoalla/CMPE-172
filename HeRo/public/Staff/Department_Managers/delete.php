<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/Staff/Departments_Managers/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {

    $result = delete_department_manager($id);
    redirect_to(url_for('/Staff/Department_Managers/index.php'));

} else {
    $department_man = find_department_manager_by_emp_no($id);
}

?>

<?php $page_title = 'Delete Department Manager'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/Staff/Department_Managers/index.php'); ?>">&laquo; Back to List</a>

  <div class="department manager delete">
    <h1>Delete Department Manager</h1>
    <p>Are you sure you want to delete this department manager?</p>
    <p class="item"><strong><?php echo h($department_man['emp_no']); ?></strong></p>

    <form action="<?php echo url_for('/Staff/Department_Managers/delete.php?id=' . h(u($department_man['emp_no']))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Department Manager" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
