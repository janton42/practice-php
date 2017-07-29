<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>



<?php 
	if(isset($_POST["submit"])) {

	$required_fields = array("title", "position", "visible", "content");
	validate_presences($required_fields);

	$fields_with_max_lengths = array("title" => 40);
	validate_max_lengths($fields_with_max_lengths);

		if(empty($errors)) {
			$title = mysql_prep($_POST["title"]);
			$position = (int)$_POST["position"];
			$visible = (int)$_POST["visible"];
			$content = mysql_prep($_POST["content"]);

			$query = "INSERT INTO sections (";
			$query .= "title, position, visible, content";
			$query .= ") VALUES (";
			$query .= "'{$title}', {$position}, {$visible}, '{$content}')";
			$result = mysqli_query($connection, $query);

			if($result) {
				$_SESSION["message"] = "Section created!";
				redirect_to("admin.php");
			} else {
				$_SESSION["message"] = "Section creation failed!";
			}

		}
	} else {
		//This is probably a GET request.
	}

?>

<?php $layout_context = check_for_logged_in(); ?>
<?php include("../includes/layouts/header.php"); ?>

	<main>
		<?php echo message(); ?>
		<?php echo form_errors($errors); ?>
		<h3>Create New Section</h3>
		<div class="container">
			<form action="create_section.php" method="post">
				<p>Title:
					<input type="text" name="title" value="">
				</p>
				<p>
					Position:
					<select name="position">
						<?php 
							$section_set = find_all_sections();
							$section_count = mysqli_num_rows($section_set);
							for($count=1; $count <= ($section_count + 1); $count++) {
								echo "<option value=\"{$count}\">{$count}</option>";
							}
						?>
					</select>
				</p>
				<p>
					Visible:
					<input type="radio" name="visible" value="0"> No
					&nbsp;
					<input type="radio" name="visible" value="1" checked=""> Yes
				</p>
				<p>
					Content:
					</p>
				<p>
					<textarea name="content" rows="10" columns="150" value=""></textarea>
				</p>
				<input type="submit" name="submit" value="Create section">
				<br>
				<a href="admin.php">Cancel</a>
			</form>
		</div>	
		
	</main>

<?php include("../includes/layouts/footer.php") ;?>