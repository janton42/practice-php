<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>

<?php find_selected_section(); ?>

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

			$query = "UPDATE sections SET ";
			$query .= "title = '{title}' ";
			$query .= "position = {position} ";
			$query .= "visible = {visible}";
			$query .= "content = '{content}'";
			$result = mysqli_query($connection, $query);

			if($result) {
				$_SESSION["message"] = "Section updated!";
				redirect_to("admin.php");
			} else {
				$_SESSION["message"] = "Section update failed - it's really stubborn!";
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
		<h3>Edit Section:<?php echo htmlentities($current_section["title"]); ?></h3>
		<div class="container">
			<form action="update_section.php?section=<?php echo urlencode($current_section["id"]); ?>" method="post">
				<p>Title:
					<input type="text" name="title" value="<?php echo htmlentities($current_section["title"]); ?>">
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
					<input type="radio" name="visible" value="0" <?php if ($current_section["visible"] == 0) {echo "checked";} ?> > No
					&nbsp;
					<input type="radio" name="visible" value="1" <?php if ($current_section["visible"] == 0) {echo "checked";} ?>> Yes
				</p>
				<p>
					Content:
					</p>
				<p>
					<textarea name="content" rows="10" columns="150"><?php echo htmlentities($current_section["content"]); ?></textarea>
				</p>
				<input type="submit" name="submit" value="Update section">
				<br>
				<a href="admin.php">Cancel</a>
			</form>
		</div>	
		
	</main>

<?php include("../includes/layouts/footer.php") ;?>