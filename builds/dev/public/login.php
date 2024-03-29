<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>

<?php
	$username = "";
	if (isset($_POST["submit"])) {

		// validations
		$required_fields = array("username", "password");
		validate_presences($required_fields);

				if (empty($errors)) {
				// Attempt login
				$username = $_POST["username"];
				$password = $_POST["password"];

				$found_admin = attempt_login($username, $password);

				if ($found_admin) {
					// Success
					//Mark user as logged in
					$_SESSION["admin_id"] = $found_admin["id"];
					$_SESSION["username"] = $found_admin["username"];
					redirect_to("admin.php" . urlencode($current_subject["id"]));
				}
			} else {
				// Failure
				$SESSION["message"] = "Username/password not found.";
		}

	} else {
		//This is probably a GET request

	}
?>
<?php $layout_context = check_for_logged_in(); ?>
<?php include("../includes/layouts/header.php"); ?>

<main>
	<?php echo message(); ?>
	<?php echo form_errors($errors); ?>
	<h3>Login</h3>
	<div class="container">
		<form action="login.php" method="post">
			<p>Username:
				<input type="text" name="username" value="<?php echo htmlentities($username); ?>">
			</p>
			<p>Password:
				<input type="password" name="password" value="">
			</p>
			<input type="submit" name="submit" value="Log the fuck in, bruh!">
			<br>
			<a href="index.php">Cancel</a>
		</form>
	</div>	
	
</main>


<?php include("../includes/layouts/footer.php") ;?>