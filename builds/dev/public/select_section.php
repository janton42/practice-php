<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>


<?php include("../includes/layouts/header.php"); ?>
<h3>Choose the form of the destructor!</h3>
<?php echo select_section(); ?>
<br>
<a href="admin.php">Cancel</a>

<?php include("../includes/layouts/footer.php") ;?>