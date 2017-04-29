<!-- Contact Modal -->
<div class="modal fade" id="contact" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog">
		<form role="form" id="contactForm" method="post">
			<div class="modal-content">
				<div class="modal-header">
					<h4 id="myModalLabel">Contact Site Administrator</h4>
					<div id="msgSubmit" class="h3 text-center hidden">Message Submitted!</div>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="contact_name">Name</label>
						<input type="text" class="form-control input-lg" id="contact_name" placeholder="Full Name">
					</div>
					<div class="form-group">
						<label for="contact_email">Email</label>
						<input type="email" class="form-control input-lg" id="contact_email" placeholder="Email Address">
					</div>
					<div class="form-group">
						<label for="contact_msg">Message</label>
						<textarea class="form-control" rows="5" id="contact_msg"></textarea>
					</div>										
				</div>
				<div class="modal-footer">
					<div class="row">
						<button class="btn btn-primary" data-dismiss="modal">Cancel</button>
						<button type="submit" id="form-submit" class="btn btn-success margin_sides">Submit</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<div class="modal fade" id="responseModal" data-backdrop="false" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4>Thank you!</h4>
			</div>
			<div class="modal-body">
				<p>Submitted Successfully</p>
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="forgotPasswordModal" data-backdrop="false" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<form role="form" id="forgotPasswordForm" method="post">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="text-center">Enter your email address</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<input type="email" class="form-control input-lg" id="forgotEmail" placeholder="Email Address">
					</div>
					<div class="h4 hidden" id="passMailed">Your password has been emailed to you, please close this window</div>
				</div>
				<div class="modal-footer">
					<div class="row">
						<button class="btn btn-primary" data-dismiss="modal">Cancel</button>
						<button type="submit" id="forgotpass-submit" class="btn btn-success margin_sides">Submit</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<div class="modal fade" id="msgModal" data-backdrop="false" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="text-center" id="msgHeader"></h4>
			</div>
			<div class="modal-body">
				<p class="text-center" id="msgBody"></p>
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<!--~~~~~~~~~~~~~~~~~~~~~~~~~ Required Javascript files ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<!-- jQuery -->
<script src="js/jquery-3.2.0.min.js"></script>
<!-- Ajax -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Bootstrap Javascript -->
<script src="js/bootstrap.min.js"></script>
<!-- Javascript Player -->
<script src="audiojs/audio.min.js"></script>
<!-- My Scripts -->
<script src="js/scripts.js"></script>
<!--^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^-->
