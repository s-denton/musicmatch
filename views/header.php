<? require_once('includes/connection.php'); ?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?= $title; ?></title>

	<!-- link to bootstrap and style sheets -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-social.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap3_player.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/fileinput.min.css">
    
    <script src="audiojs/audio.min.js"></script>
    <script>
		audiojs.events.ready(function() {
		var as = audiojs.createAll();
		});
    </script>
</head>
<body data-target=".navbar-collapse">

	<!-- fixed navigation bar -->
	<div class="navbar navbar-default navbar-fixed-top" role="navigation">	
		<div class="container-fluid">	
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigationBar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">MusicMatch</a>
			</div>
				
			<nav class="collapse navbar-collapse" id="navigationBar">
				<ul class="nav navbar-nav">
					<li><a href="index.php#about">about</a></li>
					<li><a href="browse.php">browse</a></li>
					<li><a href="upload.php">upload</a></li>
					<li><a href="#" id="contactLink">contact</a></li>
				</ul>

				<? if (isset($_SESSION['login_user'])): ?>
					<div class="nav navbar-nav navbar-right">
						<a class="navbar-brand" href="user_home.php"><?= $_SESSION["login_user"]; ?>'s CP</a>
						<button id="nav_logout" class="btn navbar-btn btn-primary nav-inline" onclick="window.location.href='logout.php'">logout</button>
					</div>
				<? else: ?>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="signup.php"><span class="glyphicon glyphicon-user" id="nav_signup"></span> sign up</a></li>
						<li><a href="login.php"><span class="glyphicon glyphicon-log-in" id="nav_login"></span> login</a></li>
					</ul>
				<? endif ?>
			</nav>
		</div>
	</div>

	<div id="page" class="parallax_landing">