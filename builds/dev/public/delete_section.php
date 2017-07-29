<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php
	$testvar = 42;
	$current_section = find_selected_section($_GET["id"]);
	if(!$current_section) {
		$_SESSION["message"] = "You done fucked up again...";
		redirect_to("admin.php");
	}
	// $current_section = find_section_by_id($_GET["id"]);
	// if (!$current_section) {
	// 	redirect_to("admin.php");
	// }

	$id = $current_section["id"];
	$query = "DELETE FROM sections WHERE id = {$id} LIMIT 1";
	$result = mysqli_query($connection, $query);

	if($result && mysqli_affected_rows($connection) == 1) {
		$_SESSION["message"] = "Section deleted!";
		redirect_to("admin.php");
	} else {
		$_SESSION["message"] = "Section not deleted. Section id: $current_section";
		redirect_to("admin.php");
	}