<?php 

require_once('../../../private/initialize.php'); 

// Check if request contains an ID, if not then redirect
if (!isset($_GET['id'])) {
  redirect_to(url_for('/Staff/Admins/index.php'));
}
$id = $_GET['id'];

if (is_post_request()) {

    // Handle form values sent by new.php
    $admin = [];
    $admin['id'] = $_POST['id'] ?? '';
    $admin['first_name'] = $_POST['first_name'] ?? '';
    $admin['last_name'] = $_POST['lasy_name'] ?? '';
    $admin['email'] = $_POST['email'] ?? '';
    $admin['username'] = $_POST['username'] ?? '';
    $admin['password'] = $_POST['password'] ?? '';
    $admin['hashed_password'] = $_POST['hashed_password'] ?? '';

    $result = update_admin($admin);
    $_SESSION['message'] = 'The admin was updated successfully.';
    redirect_to(url_for('/Staff/Admins/show.php?id=' . $id));

} else {

  $admin = find_admin_by_id($id);

}
?>

<?php $page_title = 'Edit Admin'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/Staff/Admins/index.php'); ?>">&laquo; Back to List</a>

  <div class="admin edit">
    <h1>Edit Admin</h1>

    <form action="<?php echo url_for('/Staff/Admins/edit.php?id=' . h(u($id))); ?>" method="post">
      <dl>
        <dt>Admin ID</dt>
        <dd><?php echo h($admin['id']); ?></dd>
      </dl>
      <dl>
        <dt>First name</dt>
        <dd><input type="text" name="first_name" value="<?php echo h($admin['first_name']); ?>" /></dd>
      </dl>

      <dl>
        <dt>Last name</dt>
        <dd><input type="text" name="last_name" value="<?php echo h($admin['last_name']); ?>" /></dd>
      </dl>

      <dl>
        <dt>Username</dt>
        <dd><input type="text" name="username" value="<?php echo h($admin['username']); ?>" /></dd>
      </dl>

      <dl>
        <dt>Email</dt>
        <dd><input type="text" name="email" value="<?php echo h($admin['email']); ?>" /><br /></dd>
      </dl>

      <dl>
        <dt>Password</dt>
        <dd><input type="password" name="password" value="" /></dd>
      </dl>

      <dl>
        <dt>Confirm Password</dt>
        <dd><input type="password" name="confirm_password" value="" /></dd>
      </dl>
      <p>
        Passwords should be at least 12 characters and include at least one uppercase letter, lowercase letter, number, and symbol.
      </p>
      <br />
      <div id="operations">
        <input type="submit" value="Edit Admin" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
