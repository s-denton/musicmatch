
<? require_once('includes/helpers.php'); ?>

<? render(header, array('title' => 'MusicMatch - Log In')); ?>

<? if(isset($_POST['login_btn'])) {
		authenticate($_POST['login_username'], $_POST['login_password']);
	} ?>

	<!-- login page content -->

	<div id="signup_frame">
		<h1>Enter Your Username &amp; Password</h1><br>
		<div class="container">
			<!-- signup form -->
			<div class="row text-center">
				<form action="" method="post" role="form">
					<div class="form-group col-md-6 col-md-offset-3">
    					<input type="text" class="form-control input-lg text_box" placeholder="Username" name="login_username" required>
    				</div>
    				<div class="form-group col-md-6 col-md-offset-3">
    					<input type="password" class="form-control input-lg text_box" placeholder="Password" name="login_password" required>
    				</div>
    				<div class="form-group col-md-12">
    					<button type="submit" class="btn btn-success btn-lg" name="login_btn" value="login_btn">Sign In</button>
    				</div>
    				<div class="form-group col-md-12">
    					<a href="#" id="forgotPassword" class="forgot_password_link">Forgot Password?</a>
    				</div>
    			</form>
			</div>
		</div>
	</div>
</div>
<? require_once('views/footer.php'); ?>
</body>
</html>