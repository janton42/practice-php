<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>


<?php include("../includes/layouts/header.php"); ?>

	<main>
		<?php echo message(); ?>
		<?php echo form_errors($errors); ?>
		<h3>Create New Section</h3>
		<div class="container">
			<form action="create_section.php" method="post">
				<p>Section title:
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
					<input type="radio" name="visible" value="1"> Yes
				</p>
				<p>
					Content:
					</p>
				<p>
					<textarea name="content" rows="10" columns="150" value=""></textarea>
				</p>
				<input type="submit" name="submit" value="Create section">
			</form>
		</div>	
		
	</main>

<?php include("../includes/layouts/footer.php") ;?>