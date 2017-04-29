<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?
// email password to users email address
include ('connection.php');

$from = "steve@sdenton.net";
$email = $_POST["email"];

$sql = "SELECT * FROM users WHERE email = '$email'";

if($result = $conn -> query($sql)) {
	$row = mysqli_fetch_assoc($result);
	$password = $row['password'];

	$EmailTo = $email;
	$Subject = "Your Requested Password";
	 
	// prepare email body text
	$Body .= "Email: ";
	$Body .= $email;
	$Body .= "\n";
	 
	$Body .= "Password: ";
	$Body .= $password;
	$Body .= "\n";
	 
	// send email
	$success = mail($EmailTo, $Subject, $Body, "From: " . $from);

	// redirect to success page
	if ($success){
	   echo "success";
	}else{
	    die(header("HTTP/1.0 404 Not Found"));
	}
} else {
	echo "Something went wrong";
}
?>
</body>
</html>