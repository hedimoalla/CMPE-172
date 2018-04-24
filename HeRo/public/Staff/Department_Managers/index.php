<?php require_once('../../../private/initialize.php'); ?>

<?php

  $department_man_set = find_all_department_managers();

?>

<?php $page_title = 'Department Managers'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="Department Managers listing">
    <h1>Department Managers</h1>

    <div class="actions">
      <a class="action" href="<?php echo url_for('/Staff/Department_Managers/new.php'); ?>">Create New Department Manager</a>
    </div>

  	<table class="list">
  	  <tr>
        <th>Employee Number</th>
        <th>Department Number</th>
        <th>Start Date</th>
        <th>End Date</th>
  	    <th>&nbsp;</th>
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
  	  </tr>

      <?php while($department_man = mysqli_fetch_assoc($department_man_set)) { ?>
        <tr>
          <td><?php echo h($department_man['emp_no']); ?></td>
          <td><?php echo h($department_man['dept_no']); ?></td>
          <td><?php echo h($department_man['from_date']); ?></td>
          <td><?php echo h($department_man['to_date']); ?></td>
          <td><a class="action" href="<?php echo url_for('/Staff/Department_Managers/show.php?id=' . h(u($department_man['emp_no']))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/Staff/Department_Managers/edit.php?id=' . h(u($department_man['emp_no']))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/Staff/Department_Managers/delete.php?id=' . h(u($department_man['emp_no']))); ?>">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>

    <?php
      mysqli_free_result($department_man_set);
    ?>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
