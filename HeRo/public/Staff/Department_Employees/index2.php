<?php require_once('../../../private/initialize.php'); ?>

<?php

  $department_emp_set = find_all_department_employees();

?>

<?php $page_title = 'Department Employees'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="Department employees listing">
    <h1>Department Employees</h1>

    <div class="actions">
      <a class="action" href="<?php echo url_for('/Staff/Department_Employees/new.php'); ?>">Create New Department Manager</a>
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

      <?php while($department_emp = mysqli_fetch_assoc($department_emp_set)) { ?>
        <tr>
          <td><?php echo h($department_emp['emp_no']); ?></td>
          <td><?php echo h($department_emp['dept_no']); ?></td>
          <td><?php echo h($department_emp['from_date']); ?></td>
          <td><?php echo h($department_emp['to_date']); ?></td>
          <td><a class="action" href="<?php echo url_for('/Staff/Department_Employees/show.php?id=' . h(u($department_emp['emp_no']))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/Staff/Department_Employees/edit.php?id=' . h(u($department_emp['emp_no']))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/Staff/Department_Employees/delete.php?id=' . h(u($department_emp['emp_no']))); ?>">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>

    <?php
      mysqli_free_result($department_emp_set);
    ?>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
