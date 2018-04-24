<?php require_once('../../../private/initialize.php'); ?>

<?php

  $employee_set = find_all_employees();

?>

<?php $page_title = 'Employees'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="Employees listing">
    <h1>Employees</h1>

    <div class="actions">
      <a class="action" href="<?php echo url_for('/Staff/Employees/new.php'); ?>">Add New Employee</a>
    </div>

  	<table class="list">
  	  <tr>
        <th>Employee Number</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Birthdate</th>
        <th>Gender</th>
        <th>Hire Date</th>
  	    <th>&nbsp;</th>
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
  	  </tr>

      <?php while($employee = mysqli_fetch_assoc($employee_set)) { ?>
        <tr>
          <td><?php echo h($employee['emp_no']); ?></td>
          <td><?php echo h($employee['first_name']); ?></td>
          <td><?php echo h($employee['last_name']); ?></td>
          <td><?php echo h($employee['birth_date']); ?></td>
          <td><?php echo h($employee['gender']); ?></td>
          <td><?php echo h($employee['hire_date']); ?></td>
          <td><a class="action" href="<?php echo url_for('/Staff/Employees/show.php?id=' . h(u($employee['emp_no']))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/Staff/Employees/edit.php?id=' . h(u($employee['emp_no']))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/Staff/Employees/delete.php?id=' . h(u($employee['emp_no']))); ?>">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>

    <?php
      mysqli_free_result($employee_set);
    ?>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
