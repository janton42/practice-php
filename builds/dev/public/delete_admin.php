<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php
	$current_admin = find_selected_admin($_GET["id"]);
	if(!$current_admin) {
		$_SESSION["message"] = "You done fucked up again...";
		redirect_to("admin.php");
	}

	$id = $current_admin["id"];
	$query = "DELETE FROM admins WHERE id = {$id} LIMIT 1";
	$result = mysqli_query($connection, $query);

	if($result && mysqli_affected_rows($connection) == 1) {
		$_SESSION["message"] = "Admin deleted!";
		redirect_to("admin.php");
	} else {
		$_SESSION["message"] = "Admin not deleted.";
		redirect_to("admin.php");
	}