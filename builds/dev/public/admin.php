<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>


<?php include("../includes/layouts/header.php"); ?>

<main>
	<?php echo message(); ?>
	<div>
		<div id="intpeople">
			<h3>Pow!</h3>
			<div class="container">
					<div id="peoplebox">
						<a href="#" id="prev_btn">&laquo;</a>
						<a href="#" id="next_btn">&raquo;</a>
						<div id="carousel"></div>
					</div>
			</div>
		</div>
		
		<div id="intro">
			<h3>Section 2</h3>
			<div class="container">
					<p>
						<img class="flow-left col-narrow" src="images/bulls_tn.jpg">
						Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. 
						<img src="images/paintball_tn.jpg" class="col-narrow flow-right">
					</p>
					<p>
						Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?
					</p>
					<p>
						<img src="images/lucas_drum_tn.jpg" class="col-narrow flow-left">
						Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
					</p>
			</div>
		</div>

 		<div id=\"work\">
 			<h3>Section 3</h3>
 				<div class=\"container\">
 					<p>
 						Sed ut perspiciatis unde
 					</p>
 				</div>
 		</div>		
		<div id="edu">
			<h3>Section 4</h3>
			<div class="container">
					<p>
						Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?
					</p>	
			</div>	
		</div>
	</div>

	<?php echo section_view() ?>

	<div id="create">
		<h3>Manage Content</h3>
		<div class="container">
			+<a href="create_section.php">New Section</a>
			<br>
			+<a href="select_section.php">Edit Section</a>
		</div>
	</div>

	<div id="create">
		<h3>Manage Admins</h3>
		<div class="container">
			+<a href="create_admin.php">New Admin</a>
			<br>
			+<a href="select_admin.php">Manage Admins</a>
		</div>
	</div>

</main>

<?php include("../includes/layouts/footer.php") ;?>