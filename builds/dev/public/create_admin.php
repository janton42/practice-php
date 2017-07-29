<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>



<?php include("../includes/layouts/header.php"); ?>

<?php 
	if(isset($_POST["submit"])); {
	
		$required_fields = array("username", "password");
		validate_presences($required_fields);

		$fields_with_max_length = has_max_length($username => 30);
		validate_max_lengths($fields_with_max_length);
		

		if(empty($errors)); {

			$username = mysql_prep($_POST["username"]);
			$hashed_password = password_encrypt($_POST["password"]);
		
			$query = "INSERT INTO admins(";
			$query .= "username, hashed_password";
			$query .= ") VALUES (";
			$query .= "'{$username}', {$hashed_password}"
			$query .= ")";
			$result = mysqli_query($connection, $query);
 
			if($result){
				$_SESSION["message"] = "Admin $username created";
				redirect_to("admin.php");
			} else {
				$_SESSION["message"] = "Failed to create admin $username";
			}

		}
	} else {
		//probably a $_GET request
	}

?>

<main>
	<?php echo message();?>
	<?php echo form_errors();?>
	<div class="container">
		<form action="create_admin.php" method="post">
			<input type="username" name="username" value="">
			&nbsp;
			<input type="password" name="password" value="">
		</form>
		<input type="submit" name="Create Admin">
		&nbsp;
		<a href="admin.php">Cancel</a>	
	</div>
</main>

<?php include("../includes/layouts/footer.php") ;?>