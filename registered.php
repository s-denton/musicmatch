<? require_once('includes/helpers.php'); ?>

<? render(header, array('title' => 'MusicMatch - Registered')); ?>


		<div id="signup_frame">
			<div class="php_text">
				<?
				insertUser($_SESSION['username'], $_SESSION['firstname'], $_SESSION['lastname'], $_SESSION['email'], $_SESSION['password'], $_SESSION['type'], $_SESSION['paypal']); 
				?>
				<h1>Welcome, <?= $_SESSION['firstname']; ?></h1><br>
				<h2>Thank you for registering!</h2><br>
				<p class="text-center">Your username is <?= $_SESSION['username']; ?><br>
					Please sign in via the navigation bar above.
				</p>
			</div>
		</div>
	</div>
	<? require_once('views/footer.php'); ?>
</body>
</html>




