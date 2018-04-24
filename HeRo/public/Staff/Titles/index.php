<?php require_once('../../../private/initialize.php'); ?>

<?php

  $title_set = find_all_titles();

?>

<?php $page_title = 'Titles'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="Titles listing">
    <h1>Titles</h1>

    <div class="actions">
      <a class="action" href="<?php echo url_for('/Staff/Titles/new.php'); ?>">Add New Title</a>
    </div>

  	<table class="list">
  	  <tr>
        <th>Employee Number</th>
        <th>Title</th>
        <th>Begninning Date</th>
        <th>End Date</th>
  	    <th>&nbsp;</th>
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
  	  </tr>

      <?php while($title = mysqli_fetch_assoc($title_set)) { ?>
        <tr>
          <td><?php echo h($title['emp_no']); ?></td>
          <td><?php echo h($title['title']); ?></td>
          <td><?php echo h($title['from_date']); ?></td>
          <td><?php echo h($title['to_date']); ?></td>
          <td><a class="action" href="<?php echo url_for('/Staff/Titles/show.php?id=' . h(u($title['emp_no']))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/Staff/Titles/edit.php?id=' . h(u($title['emp_no']))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/Staff/Titles/delete.php?id=' . h(u($title['emp_no']))); ?>">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>

    <?php
      mysqli_free_result($title_set);
    ?>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
