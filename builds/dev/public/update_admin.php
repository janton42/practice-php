<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php find_selected_admin();
	if(!$current_admin) {
		$_SESSION["message"] = "No admin selected";
		redirect_to("admin.php");
		} ?>

<?php 
	if(isset($_POST["submit"])) {

		$required_fields = array("username", "password");
		validate_presences($required_fields);

		$fields_with_max_length = array("username" => 30);
		validate_max_lengths($fields_with_max_length);
		

		if(empty($errors)) {
			$id = $current_admin["id"];		
			$username = mysql_prep($_POST["username"]);
			$hashed_password = password_encrypt($_POST["password"]);

			$query = "UPDATE admins SET ";
			$query .= "username = '{$username}', ";
			$query .= "hashed_password = '{$hashed_password}' ";
			$query .= "WHERE id = {$id} ";
			$query .= "LIMIT 1";
			$result = mysqli_query($connection, $query);
			
			if($result && mysqli_affected_rows($connection) >= 0) {
				$_SESSION["message"] = "Admin updated!";
				redirect_to("admin.php");
			} else {
				$_SESSION["message"] = "Update failed!";
			}

		}
	} else {
		//This is probably a GET request.
	}
	
?>

<?php include("../includes/layouts/header.php"); ?>

	<main>
		<?php echo message(); ?>
		<?php echo form_errors($errors); ?>
		<h3>Edit Admin:<?php echo htmlentities($current_admin["username"]); ?></h3>
		<div class="container">
			<form action="update_admin.php?admin=<?php echo urlencode($current_admin["id"]); ?>" method="post">
				<p>Username:
					<input type="text" name="username" value="<?php echo htmlentities($current_admin["username"]); ?>">
				</p>
				<p>Password:
					<input type="password" name="password" value="">
				</p>
				<input type="submit" name="submit" value="Update admin">
				<br>
				<a href="delete_admin.php?admin=<?php echo urldecode($current_admin["id"]); ?>" onclick="return confirm('Are you sure?')">delete admin</a>
				<br>
				<a href="admin.php">Cancel</a>
			</form>
		</div>	
		
	</main>

<?php include("../includes/layouts/footer.php") ;?>