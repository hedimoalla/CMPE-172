<?php 

require_once('../../../private/initialize.php'); 

// Check if request contains an ID, if not then redirect
if (!isset($_GET['id'])) {
  redirect_to(url_for('/Staff/Department_Managers/index.php'));
}
$id = $_GET['id'];

if (is_post_request()) {

    // Handle form values sent by new.php
    $department_man = [];
    $department_man['emp_no'] = $_POST['emp_no'] ?? '';    
    $department_man['dept_no'] = $_POST['dept_no'] ?? '';
    $department_man['from_date'] = $_POST['from_date'] ?? '';   
    $department_man['to_date'] = $_POST['to_date'] ?? '';      

    $result = update_department_manager($department_man);
    redirect_to(url_for('/Staff/Department_Managers/show.php?id=' . $id));

} else {

  $department_man = find_department_manager_by_emp_no($id);

}
?>

<?php $page_title = 'Edit Department Manager'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/Staff/Department_Managers/index.php'); ?>">&laquo; Back to List</a>

  <div class="department manager edit">
    <h1>Edit Department Manager</h1>

    <form action="<?php echo url_for('/Staff/Department_Managers/edit.php?id=' . h(u($id))); ?>" method="post">
      <dl>
        <dt>Department Number</dt>
        <dd><input type="text" name="dept_no" value="<?php echo h($department_man['dept_no']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Start Date</dt>
        <dd><input type="text" name="from_date" value="<?php echo h($department_man['from_date']); ?>" /></dd>
      </dl>
      <dl>
        <dt>End Date</dt>
        <dd><input type="text" name="to_date" value="<?php echo h($department_man['to_date']); ?>" /></dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Edit Department Manager" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
