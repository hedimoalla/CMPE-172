<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/Staff/Titles/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {

    $result = delete_title($id);
    $_SESSION['message'] = 'The title was deleted successfully.';
    redirect_to(url_for('/Staff/Titles/index.php'));

} else {
    $title = find_title_by_emp_no($id);
}

?>

<?php $page_title = 'Titles'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/Staff/Titles/index.php'); ?>">&laquo; Back to List</a>

  <div class="title delete">
    <h1>Delete Title</h1>
    <p>Are you sure you want to delete this title?</p>
    <p class="item"><strong><?php echo h($title['title']); ?></strong></p>

    <form action="<?php echo url_for('/Staff/Titles/delete.php?id=' . h(u($title['emp_no']))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Title" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
