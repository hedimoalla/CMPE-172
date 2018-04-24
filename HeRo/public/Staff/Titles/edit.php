<?php 

require_once('../../../private/initialize.php'); 

// Check if request contains an ID, if not then redirect
if (!isset($_GET['id'])) {
  redirect_to(url_for('/Staff/Titles/index.php'));
}
$id = $_GET['id'];

if (is_post_request()) {

    // Handle form values sent by new.php
    $title = [];
    $title['emp_no'] = $_POST['emp_no'] ?? '';
    $title['title'] = $_POST['title'] ?? '';
    $title['from_date'] = $_POST['from_date'] ?? '';
    $title['to_date'] = $_POST['to_date'] ?? '';

    $result = update_title($title);
    $_SESSION['message'] = 'The Title was updated successfully.';
    redirect_to(url_for('/Staff/Titles/show.php?id=' . $id));

} else {

  $title = find_title_by_emp_no($id);

}
?>

<?php $page_title = 'Edit Title'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/Staff/Titles/index.php'); ?>">&laquo; Back to List</a>

  <div class="title edit">
    <h1>Edit Title</h1>

    <form action="<?php echo url_for('/Staff/Titles/edit.php?id=' . h(u($id))); ?>" method="post">
      <dl>
        <dt>Employee Number</dt>
        <dd><?php echo h($title['emp_no']); ?></dd>
      </dl>
      <dl>
        <dt>Title</dt>
        <dd><input type="text" name="title" value="<?php echo h($title['title']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Beginning Date</dt>
        <dd><input type="text" name="from_date" value="<?php echo h($title['from_date']); ?>" /></dd>
      </dl>
      <dl>
        <dt>End Date</dt>
        <dd><input type="text" name="to_date" value="<?php echo h($title['to_date']); ?>" /></dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Edit Title" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
