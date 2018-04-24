<?php require_once('../../../private/initialize.php'); ?>

<?php

  $department_set = find_all_departments();

?>

<?php $page_title = 'Departments'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="Departments listing">
    <h1>Departments</h1>

    <div class="actions">
      <a class="action" href="<?php echo url_for('/Staff/Departments/new.php'); ?>">Create New Department</a>
    </div>

  	<table class="list">
  	  <tr>
        <th>Department Number</th>
        <th>Department Name</th>
  	    <th>&nbsp;</th>
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
  	  </tr>

      <?php while($department = mysqli_fetch_assoc($department_set)) { ?>
        <tr>
          <td><?php echo h($department['dept_no']); ?></td>
          <td><?php echo h($department['dept_name']); ?></td>
          <td><a class="action" href="<?php echo url_for('/Staff/Departments/show.php?id=' . h(u($department['dept_no']))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/Staff/Departments/edit.php?id=' . h(u($department['dept_no']))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/Staff/Departments/delete.php?id=' . h(u($department['dept_no']))); ?>">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>

    <?php
      mysqli_free_result($department_set);
    ?>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
