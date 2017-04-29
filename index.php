<? include 'includes/helpers.php'; ?>

<? render(header, array('title' => 'MusicMatch - Sign Up')); ?>

<!-- landing content -->
<div class="container parallax_landing">	
	<div class="row white" id="home">
		<div class="col-md-12 jumbotron" id="top_bar">
			<div class="col-md-6 col-md-offset-3" id="top_row">
				<h1 class="display-3">Welcome to MusicMatch</h1>
				<h2>Connecting musicians with people seeking music for their projects</h2>
				<? if (!isset($_SESSION['login_user'])): ?>
				<h3 class="margin_top margin_bottom">Register now for a free account!</h3>
				<div class="col-md-12">
					<button type="submit" id="signup_button" name="signup" onclick="window.location.href='signup.php'" class="btn btn-primary btn-lg margin_bottom landing_button">Sign Up</button>
					<button type="submit" id="login_button" name="signup" onclick="window.location.href='login.php'" class="btn btn-success btn-lg margin_bottom landing_button">Log In</button>
				</div>	
				<? else: ?>
				<h2>Welcome, <?= $_SESSION['login_user'] ?>!</h2>
				<div class="col-md-12">
					<button type="submit" id="cpanel_btn" name="cpanel" onclick="window.location.href='user_home.php'" class="btn btn-primary btn-lg margin_bottom landing_button">Control Panel</button>
				</div>
			<? endif ?>
			</div>
		</div>
	</div>
</div>

<!-- about section -->
<div class="container contentContainer" id="about">
	<div class="row center margin_bottom">
		<h1 id="how_it_works">How It Works</h1>
		<div class="row">
			<div id="aboutUser" class="col-md-4 margin_top margin_bottom">
				<h2><span class="glyphicon glyphicon_about glyphicon-user"></span><br>Create an Account</h2>
				<p>
					Create a free account in minutes by clicking the Customer button above.
				</p>
			</div>

			<div id="aboutBrowse" class="col-md-4 margin_top margin_bottom">
				<h2><span class="glyphicon glyphicon_about glyphicon-search"></span><br>Browse Music</h2>
				<p>
					Specify the genre of music you are looking for, or songs by a specific composer, or in a price range to match your budget. You can preview any song to decide if it suits your project.
				</p>
			</div>

			<div id="aboutBuy" class="col-md-4 margin_top margin_bottom">
				<h2><span class="glyphicon glyphicon_about glyphicon-shopping-cart"></span><br>Buy Songs</h2>
				<p>
					When you are ready to purchase, simply click to pay via PayPal, and you will be sent a song file.
				</p>
			</div>
		</div>
	</div>


<!-- mailing list subscription form -->
	<div class="row center margin_bottom" id="subscribe_frame">
		<h3>Be sure to subscribe to our mailing list!</h3>
		<form method="POST" role="form" id="landingEmail">
			<div class="form-group col-md-6 col-md-offset-3">
				<input type="email" class="form-control input-lg text-center" id="mailing" placeholder="Email Address" required="required" data-error="Valid email is required">
		        <div class="help-block with-errors"></div>
			</div>
			<div class="row col-md-6 col-md-offset-3">
				<button type="submit" id="email-submit" value="email_submit" class="btn btn-success">Submit</button>
			</div>
		</form>
	</div>
</div>
<div class="white_space"></div>

<? require_once('views/footer.php'); ?>
</body>
</html>