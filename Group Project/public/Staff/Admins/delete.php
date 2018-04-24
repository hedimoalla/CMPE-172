<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/Staff/Admins/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {

    $result = delete_admin($id);
    $_SESSION['message'] = 'The admin was deleted successfully.';
    redirect_to(url_for('/Staff/Admins/index.php'));

} else {
    $admin = find_admin_by_id($id);
}

?>

<?php $page_title = 'Admins'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/Staff/Admins/index.php'); ?>">&laquo; Back to List</a>

  <div class="admin delete">
    <h1>Delete Admin</h1>
    <p>Are you sure you want to delete this admin?</p>
    <p class="item"><strong><?php echo h($admin['first_name']); ?></strong></p>

    <form action="<?php echo url_for('/Staff/Admins/delete.php?id=' . h(u($admin['id']))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete admin" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
