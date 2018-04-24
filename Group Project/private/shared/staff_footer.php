<footer>
    &copy; <?php echo date('Y'); ?> HeRo
</footer>

</body>
</html>

<?php
    db_disconnect($db); // Close the database when the page is finished rendering
?>