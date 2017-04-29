<? require_once('includes/helpers.php'); ?>

<? render(header, array('title' => 'MusicMatch - Sign Up')); ?>



	<h1></h1>
		<div id="signup_frame">
			<div class="php_text text-center">
				<? validateSignupInfo($_POST['username'], $_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['paypal'], $_POST['password'], $_POST['password_conf'], $_POST['type']); ?>
			</div>
		</div>
	</div>
<? require_once('views/footer.php'); ?>
</body>
</html>