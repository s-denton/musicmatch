<?php
session_start();

	$servername = "localhost";
	$serverusername = "stevede7_c13";
	$serverpassword = "cps3500";
	$dbname = "stevede7_music_match";
	$today_date = date("Y/m/d");

	$conn = mysqli_connect($servername, $serverusername, $serverpassword, $dbname);

	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
?>