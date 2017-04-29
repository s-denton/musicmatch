<? require_once('includes/helpers.php'); ?>

<? render(header, array('title' => 'MusicMatch - Sign Up')); ?>

	<!-- signup page content -->

		<div id="signup_frame">
			<h1>Enter Your Information</h1>
			<div class="container">
				<!-- signup form -->
				<div class="row text-center">
					<form action="confirm_signup.php" method="POST" role="form">
						<div class="form-group col-md-6 col-md-offset-3">
	    					<input type="text" class="form-control input-lg text_box" id="username" placeholder="Username" name="username" required>
	    				</div>
	    				<div class="form-group col-md-6 col-md-offset-3">
	    					<input type="text" class="form-control input-lg text_box" id="email" placeholder="Email" name="email" required>
	    				</div>
	    				<div class="form-group col-md-6 col-md-offset-3">
	    					<input type="password" class="form-control input-lg text_box" id="password" placeholder="Password" name="password" required>
	    				</div>
	    				<div class="form-group col-md-6 col-md-offset-3">
	    					<input type="password" class="form-control input-lg text_box" id="password_conf" placeholder="Re-Enter Password" name="password_conf" required>
	    				</div>
	    				<div class="form-group col-md-6 col-md-offset-3">
	    					<input type="text" class="form-control input-lg text_box" id="firstname" placeholder="First Name" name="firstname" required>
	    				</div>
	    				<div class="form-group col-md-6 col-md-offset-3">
	    					<input type="text" class="form-control input-lg text_box" id="lastname" placeholder="Last Name" name="lastname">
	    				</div>
	    				<div class="form-group col-md-6 col-md-offset-3">
	    					<input type="text" class="form-control input-lg text_box" id="paypal" placeholder="PayPal" name="paypal">
	    				</div>
	    				<div class="radio form-group col-md-6 col-md-offset-3">
						  <label class="margin_sides"><input type="radio" name="type" value="buyer">Buyer</label>
						  <label class="margin_sides"><input type="radio" name="type" value="seller">Seller</label>
						</div>
	    				<div class="form-group col-md-12">
	    					<button type="submit" id="reg_buttom" class="btn btn-success btn-lg" name="signup" value="signup">Register</button>
	    				</div>
	    			</form>
				</div>
			</div>
		</div>
	</div>
	<? require_once('views/footer.php'); ?>
</body>
</html>