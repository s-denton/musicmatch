<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?
include ('connection.php');

$sub_email = $_POST["email"];
$sql = "INSERT INTO mailing_list (email) VALUES ('$sub_email')";

if(filter_var($sub_email, FILTER_VALIDATE_EMAIL)) {
	// check for connection to database, else error
	if ($conn -> query($sql)) {
		echo "success";				
	} else {
		echo "<br> Error Occured";	
	}		
}else {
	echo "<h5>Invalid Email, please go back</h5><b>";
	?>
	<form action="index.php">
	<input type="submit" id="back_button" class="btn btn-primary btn-lg col-md-2 col-md-offset-5" value="Go Back">
	</form>
	<?
	break;
}
?>
</body>
</html>