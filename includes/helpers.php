<?
// authenticate login information
function authenticate($login_username, $login_password) {
	include ('includes/connection.php');

	$sql = "SELECT user_id FROM users WHERE BINARY username = '$login_username' and password = '$login_password'";
	$result = $conn -> query($sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$active = $row['active'];
	$count = mysqli_num_rows($result);

	// If result matched $myusername and $mypassword, table row must be 1 row	
	if($count == 1) {
	    $_SESSION['login_user'] = $login_username;
	    header("location: user_home.php");
	} else {
	    $error = "Your username or password is invalid";
	    echo "<h5>$error</h5>";
	}
}

// submit contact form info into database
function contactSubmit($c_name, $c_email, $c_msg) {
	include ('includes/connection.php');

	$status = "open";
	$thanks = "Thank you, we will be in touch soon!";
	$error = "Something went wrong...";

	$sql = "INSERT INTO contact (name, email, message, status) VALUES ('$c_name', '$c_email', '$c_msg', '$status')";
	if($result = $conn -> query($sql)) {
		echo "";
	}else {
		echo "<h2>Something went wrong...</h2>";
	}
}

// delete song from database
function deleteSong($songID) {
	include ('includes/connection.php');

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
	    header("location: view_uploads.php");
	}else {
	    echo "Error deleting song: " . mysqli_error($conn);
	}
}

// insert user info into database
function insertUser($in_username, $in_firstname, $in_lastname, $in_email, $in_password, $in_type, $in_paypal) {
	include ('includes/connection.php');

	// check for duplicate entry
	$select_sql = "SELECT user_id FROM users WHERE BINARY username = '$in_username'";
	$result = $conn -> query($select_sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$active = $row['active'];
	$count = mysqli_num_rows($result);

	// If result matched $myusername, username already exists	
	if($count == 1) {
	    echo "<h2>Username exists already</h2>";
	    echo "<form action='confirm_signup.php'>
		<input type='submit' class='btn btn-primary btn-lg' id='back_button' value='Go Back'>
		</form>";
	    break;
	}

	$insert_sql = "INSERT INTO users (username, firstname, lastname, email, password, account_type, paypal) VALUES ('$in_username', '$in_firstname', '$in_lastname', '$in_email', '$in_password', '$in_type', '$in_paypal')";
						
	// check for connection to database, else error
	if ($conn -> query($insert_sql)) {
		
	} else {
		echo "<br> Error Occured";	
	}
}

// check if a user is logged in before viewing a page
function logInCheck() {
	if (!isset($_SESSION['login_user'])) {
		echo "Please log in to view this page";
		return true;
	}
}

// populate a list of available genres
function listGenres() {
	include ('includes/connection.php');

	$query = "SELECT * FROM genre";

	$result = mysqli_query($conn, $query);

	while ($row = mysqli_fetch_array($result)) {
		echo "<option value=" . $row["genre"] . ">" . $row["genre"] . "</option>";
	}
}

// populate a list of available sellers
function listUsers() {
	include ('includes/connection.php');

	$query = "SELECT * FROM users WHERE account_type = 'seller'";

	$result = mysqli_query($conn, $query);

	while ($row = mysqli_fetch_array($result)) {

		echo "<option value=" . $row["username"] . ">" . $row["username"] . "</option>";

	}
}

// renders a page view and title
function render($view, $data = array()) {
	$path = 'views/' . $view . '.php';

	if(file_exists($path)) {

		extract($data);
		require($path);

	}
}

// display songs by user in a dropdown list
function songDropDown($username) {
	include ('includes/connection.php');

	$query = "SELECT * FROM song WHERE username = '$username'";

	$result = mysqli_query($conn, $query);

	while ($row = mysqli_fetch_array($result)) {

		echo "<option value=" . $row["song_id"] . ">" . $row["song_name"] . "</option>";

	}
}

// upload a song to the server and insert song file info into the database
function songUpload($songname, $genre, $price, $duration) {
include ('includes/connection.php');

	if(isset($_FILES['file'])) {

		$file = $_FILES['file'];

		// file properties
		$file_name = $file['name'];
		$file_tmp = $file['tmp_name'];
		$file_size = $file['size'];
		$file_error = $file['error'];

		// figure out the file extension
		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));

		$allowed = array('mp3');

		if (in_array($file_ext, $allowed)) {

			if($file_error == 0) {

				if ($file_size <= 20000000) {
					
					$file_name_new = uniqid('', true) . '.' . $file_ext;
					$file_destination = 'songs/' . $file_name_new;

					if (!$songname == "" || !$price == "" || !$duration == "") {
						$sql = "INSERT INTO song (song_name, genre, username, price, duration, file_path) VALUES ('$songname', '$genre', '".$_SESSION["login_user"]."', '$price', '$duration', '$file_destination')";

						if ($conn -> query($sql)) {
							if(move_uploaded_file($file_tmp, $file_destination)) {
								header("location: view_uploads.php");
							}				
						} else {
							echo "<h5>Error Occured</h5>";	
						}
					} else {
						echo "<h5>You must fill out all the fields</h5>";
					}

				} else {
					echo "<h5>File is Too Large</h5>";	
				}
			} else {
				echo "<h5>File Error Exists</h5>";	
			}

		} else {
			echo "<h5>Only .mp3 or .m4a Files Allowed</h5>";	
		}
	} else {
		echo "<h5>No File Sent</h5>";	
	}
}

// validate form info for registration
function validateSignupInfo($myusername, $myfirstname, $mylastname, $myemail, $mypaypal, $mypassword, $mypassword_conf, $mytype) {

	if (!'$myusername' == "" || !$myfirstname == "" || !$myemail == "" || !$mypassword == "" || !$myType == "") {
		$_SESSION['username'] = $myusername;
		$_SESSION['firstname'] = $myfirstname;
		$_SESSION['lastname'] = $mylastname;
		$_SESSION['email'] = $myemail;
		$_SESSION['paypal'] = $mypaypal;
		$_SESSION['password'] = $mypassword;
		$_SESSION['type'] = $mytype;

		if(filter_var($myemail, FILTER_VALIDATE_EMAIL)) {
			
		}else {
			echo "<h5>Invalid Email, please go back</h5><br>";
			?>
			<form action="signup.php">
			<input type="submit" id="back_button" value="Go Back">
			</form>
			<?
			break;
		}

		if($mypassword === $mypassword_conf) {
			echo "<h2>Is your information correct?</h2><br>";
			echo "Username: " . $myusername . "<br>";
			echo "First Name: " . $myfirstname . "<br>";
			echo "Last Name: " . $mylastname . "<br>";
			echo "Email: " . $myemail . "<br>";
			if(!$mypaypal == "") {
				echo "PayPal: " . $mypaypal . "<br>";
			}
			echo "Account Type: " . $mytype;
			?>

			<form action="registered.php" class="margin_top">
			<input type="button" onclick="window.location.href='signup.php'" id="back_button" class="btn btn-primary btn-lg" value="Go Back">
			<input type="submit" id="confirm" class="btn btn-success btn-lg" value="Confirm">
			</form>
			<?

		}else{
			echo "<h5>Passwords do not match, please go back</h5><br>";
			?>
			<form action="signup.php">
			<input type="submit" class="btn btn-primary btn-lg" id="back_button" value="Go Back">
			</form>
			<?
		}
	} else {
		echo "<h5>You have not filled out the form, please go back</h5>";
		?>
		<form action="signup.php">
		<input type="submit" class="btn btn-primary btn-lg" id="back_button" value="Go Back">
		</form>
		<?
	}
}

// display logged-in user's audio uploads and a preview player in a table
function viewUploads() {
	include ('includes/connection.php');

	$username = $_SESSION["login_user"];

	$query = "SELECT * FROM song WHERE username = '$username'";
	$response = mysqli_query($conn, $query);

	if (mysqli_num_rows($response) > 0) {
		echo '<table class="table table-condensed" align="center" cellspacing="5" cellpadding="8">
		
		<tr>
			<td align="center"><b>Song ID</b></td>
			<td align="center"><b>Title</b></td>
			<td align="center"><b>Price</b></td>
			<td align="center"><b>Duration</b></td>
			<td align="center" class="col-md-4"><b>Preview</b></td>
		</tr>';

		while ($row = mysqli_fetch_assoc($response)) {
			echo '<tr><td align="center">' . $row['song_id'] . 
			'</td><td align="center">' . $row['song_name'] . 
			'</td><td align="center">' . '$' . $row['price'] . 
			'</td><td align="center">' . $row['duration'] . 
			'</td><td align="center">' . 
			'<div class="row col-md-12">
				<audio preload="auto">
		 			<source src="' . $row['file_path'] . '">
				</audio>
			</div>
			</td>' . 
			'<td align="center">
			<a href="#" id="delete_icon"><span class="glyphicon glyphicon-trash table_trash"></span>
			</a>
			</td>';
			echo '</tr>';
		}
		echo '</table>';
		mysqli_close($conn);
	} else {
		echo "<h5>No songs uploaded yet</h5>";
	}
}

?>