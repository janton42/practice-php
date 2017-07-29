<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php 
	//v1: simple logout
	$_SESSION["admin_id"] = null;
	$_SESSION["username"] = null;
	redirect_to("index.php");
?>