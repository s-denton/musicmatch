<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?
// insert contact form info into database
include ('connection.php');

$c_name = $_POST["name"];
$c_email = $_POST["email"];
$c_msg = $_POST["message"];
$c_status = "open";

$sql = "INSERT INTO contact (name, email, message, status) VALUES ('$c_name', '$c_email', '$c_msg', '$c_status')";

if($result = $conn -> query($sql)) {
	echo "success";
}else {
	die(header("HTTP/1.0 404 Not Found"));
}
?>
</body>
</html>