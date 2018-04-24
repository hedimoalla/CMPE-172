<?php 

require_once('../../../private/initialize.php'); 

// Check if request contains an ID, if not then redirect
if (!isset($_GET['id'])) {
  redirect_to(url_for('/Staff/Departments/index.php'));
}
$id = $_GET['id'];

if (is_post_request()) {

    // Handle form values sent by new.php
    $department = [];
    $department['dept_no'] = $_POST['dept_no'] ?? '';    
    $department['dept_name'] = $_POST['dept_name'] ?? '';   

    $result = update_department($department);
    $_SESSION['message'] = 'The Department was updated successfully.';
    redirect_to(url_for('/Staff/Departments/show.php?id=' . $id));

} else {

  $department = find_department_by_no($id);

}
?>

<?php $page_title = 'Edit Department'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/Staff/Departments/index.php'); ?>">&laquo; Back to List</a>

  <div class="department edit">
    <h1>Edit Department</h1>

    <form action="<?php echo url_for('/Staff/Departments/edit.php?id=' . h(u($id))); ?>" method="post">
      <dl>
        <dt>Department Number</dt>
        <dd><?php echo h($department['dept_no']); ?></dd>
      </dl>
      <dl>
        <dt>Department Name</dt>
        <dd><input type="text" name="dept_name" value="<?php echo h($department['dept_name']); ?>" /></dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Edit Department" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
