<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?
include ('connection.php');

$songID = $_POST["song_id"];

$sql = "DELETE FROM song WHERE song_id = '$songID'";
$query = "SELECT * FROM song WHERE song_id = '$songID'";

$result = $conn -> query($query);
$row = mysqli_fetch_assoc($result);
$path = $row['file_path'];
$count = mysqli_num_rows($result);

if($count == 1) {
	unlink($path);
} else {
	echo "Could not delete file!";
}

if(mysqli_query($conn, $sql)) {
    echo "success";
}else {
    echo "Error deleting song: " . mysqli_error($conn);
}
?>
</body>
</html>