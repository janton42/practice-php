<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php $layout_context = check_for_logged_in(); ?>
<?php include("../includes/layouts/header.php"); ?>

<?php echo select_admin(); ?>

<br>
<a href="admin.php">Cancel</a>
<?php include("../includes/layouts/footer.php") ;?>