<?php
	define("DB_SERVER", "homepage.dev");
	define("DB_USER", "homepage_cms");
	define("DB_PASS", "0neSh0t0neKill69!");
	define("DB_NAME", "bio_website");
	$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	if(mysqli_connect_errno()) {
		die("Datebase connection failed: " . mysqli_connect_errno() . " (" . mysqli_connect_errno() . ")");
	}
  ?>