<?php require_once('../../../private/initialize.php'); ?>

<?php
$id = $_GET['id'] ?? '1'; // PHP > 7.0
//echo $id;

$title = find_title_by_emp_no($id);
?>

<?php $page_title = 'Show Title Information'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <a class="back-link" href="<?php echo url_for('/Staff/Titles/index.php'); ?>">&laquo; Back to List</a>
  <div class="title show">
    <h1>Title: <?php echo h($title['title']); ?></h1>

    <div class="attributes">
      <dl>
        <dt>Employee Number</dt>
        <dd><?php echo h($title['emp_no']); ?></dd>
      </dl>
      <dl>
        <dt>Title</dt>
        <dd><?php echo h($title['title']); ?></dd>
      </dl>
      <dl>
        <dt>Start Date</dt>
        <dd><?php echo h($title['from_date']); ?></dd>
      </dl>
      <dl>
        <dt>End Date</dt>
        <dd><?php echo h($title['to_date']); ?></dd>
      </dl>
    </div>
  </div>
</div>
<?php include(SHARED_PATH . '/staff_footer.php'); ?>
