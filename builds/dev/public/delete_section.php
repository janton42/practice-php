<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php
	$current_section = find_section_by_id($_GET["id"]);
	if (!$current_section) {
		redirect_to("admin.php");
	}

	$id = $current_section["id"];
	$query = "DELETE FROM sections WHERE id = {id} LIMIT 1";
	$result = mysql_query($connection, $query);

	if($result && mysqli_affected_rows ==1) {
		$_SESSION["message"] = "Section deleted!";
		redirect_to("admin.php");
	} else {
		$_SESSION["message"] = "Section not deleted; you just can't kill it!!";
		redirect_to("admin.php");
	}