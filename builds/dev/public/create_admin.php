<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php 
	if(isset($_POST["submit"])) {
	
		$required_fields = array("username", "password");
		validate_presences($required_fields);

		$fields_with_max_length = array("username" => 30);
		validate_max_lengths($fields_with_max_length);
		

		if(empty($errors)) {

			$username = mysql_prep($_POST["username"]);
			$hashed_password = password_encrypt($_POST["password"]);
		
			$query = "INSERT INTO admins(";
			$query .= "username, hashed_password";
			$query .= ") VALUES (";
			$query .= "'{$username}', '{$hashed_password}'";
			$query .= ")";
			$result = mysqli_query($connection, $query);
 
			if($result){
				$_SESSION["message"] = "Admin $username created!";
				redirect_to("admin.php");
			} else {
				$_SESSION["message"] = "Failed to create admin $username";
				}
			}	
	} else {

	}

?>

<?php $layout_context = check_for_logged_in(); ?>
<?php include("../includes/layouts/header.php"); ?>

<main>
	<?php echo message();?>
	<?php echo form_errors();?>
	<div class="container">
		<form action="create_admin.php" method="post">
			Username:
			<input type="text" name="username" value="">
			<br>
			Password:
			&nbsp;<input type="password" name="password" value="">
			<br>
			<input type="submit" name="submit" value="Create Admin">
		</form>
		<br>
		<a href="admin.php">Cancel</a>	
	</div>
</main>

<?php include("../includes/layouts/footer.php") ;?>