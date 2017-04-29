<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?
// fetch songs from database based on dropdown selections
	include ('connection.php');

	$q = strval($_GET['q']);

	if($q == "price1") {
		$sql = "SELECT * FROM song WHERE price >= 0 AND price <= 100";
	} else if($q == "price2") {
		$sql = "SELECT * FROM song WHERE price > 100 AND price <= 250";
	} else if($q == "price3") {
		$sql = "SELECT * FROM song WHERE price > 250";
	}

	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) > 0) {
		echo '<table class="table" align="center" cellspacing="5" cellpadding="8">
		<thead>
		<tr>
			<th><b>Title</th>
			<th><b>Genre</th>
			<th><b>Composer</th>
			<th><b>Price</th>
			<th class="col-md-2"><b>Preview</th>
			<th class="col-md-2"><b>Purchase</th>
		</tr>
		</thead>';

		while($row = mysqli_fetch_assoc($result)) {
		    echo "<tbody>";
		    echo "<tr>";
		    echo "<th scope='row'>" . $row['song_name'] . "</th>";
		    echo "<td>" . $row['genre'] . "</td>";
		    echo "<td>" . $row['username'] . "</td>";
		    echo "<td>" . "$" . $row['price'] . "</td>";
		    echo '<td align="center">' . 
		    	'<div class="row col-md-12">
					<audio preload="auto">
		 				<source src="' . $row['file_path'] . '">
					</audio>
				</div>
				</td>';
			echo "<td><a href='#'><img src='https://www.paypalobjects.com/webstatic/en_US/i/btn/png/gold-pill-paypal-34px.png' alt='PayPal'></a></td>";
		    echo "</tr>";
		    echo "</tbody>";
		}
		echo "</table>";
	} else {
		echo "<h5>No results</h5>";
	}
?>
</body>
</html>