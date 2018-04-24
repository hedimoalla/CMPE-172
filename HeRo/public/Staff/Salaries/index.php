<?php require_once('../../../private/initialize.php'); ?>

<?php

  $salary_set = find_all_salaries();

?>

<?php $page_title = 'Salaries'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="Salaries listing">
    <h1>Salaries</h1>

    <div class="actions">
      <a class="action" href="<?php echo url_for('/Staff/Salaries/new.php'); ?>">Add New Salary</a>
    </div>

  	<table class="list">
  	  <tr>
        <th>Employee Number</th>
        <th>Salary</th>
        <th>Begninning Date</th>
        <th>End Date</th>
  	    <th>&nbsp;</th>
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
  	  </tr>

      <?php while($salary = mysqli_fetch_assoc($salary_set)) { ?>
        <tr>
          <td><?php echo h($salary['emp_no']); ?></td>
          <td><?php echo h($salary['salary']); ?></td>
          <td><?php echo h($salary['from_date']); ?></td>
          <td><?php echo h($salary['to_date']); ?></td>
          <td><a class="action" href="<?php echo url_for('/Staff/Salaries/show.php?id=' . h(u($salary['emp_no']))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/Staff/Salaries/edit.php?id=' . h(u($salary['emp_no']))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/Staff/Salaries/delete.php?id=' . h(u($salary['emp_no']))); ?>">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>

    <?php
      mysqli_free_result($salary_set);
    ?>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
