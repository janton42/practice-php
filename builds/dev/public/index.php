<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php $layout_context = check_for_logged_in(); ?>
<?php include("../includes/layouts/header.php") ?>

	<main>
	<?php echo section_view() ;?>
		
	</main>

<?php include("../includes/layouts/footer.php") ?>




