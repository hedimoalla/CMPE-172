<?php require_once('../../private/initialize.php'); ?>

<?php $page_title = 'Staff Menu'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>
    
<div id="content">
  <div id="main-menu">
      <h2>Main Menu</h2>
      <ul>
        <li>
          <a href="<?php echo url_for('/Staff/Employees/index.php'); ?>">Employees</a>
        </li>
        <li>
          <a href="<?php echo url_for('/Staff/Departments/index.php'); ?>">Departments</a>
        </li>
        <li>
          <a href="<?php echo url_for('/Staff/Department_Managers/index.php'); ?>">Department Managers</a>
        </li>
        <li>
          <a href="<?php echo url_for('/Staff/Department_Employees/index.php'); ?>">Department Employees</a>
        </li>
        <li>
          <a href="<?php echo url_for('/Staff/Salaries/index.php'); ?>">Salaries</a>
        </li>
        <li>
          <a href="<?php echo url_for('/Staff/Titles/index.php'); ?>">Titles</a>
        </li>
        <li>
          <a href="<?php echo url_for('/Staff/Admins/index.php'); ?>">Admins</a>
        </li>
      </ul>
  </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>

    
