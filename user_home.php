<? require_once('includes/helpers.php'); ?>

<? render(header, array('title' => 'MusicMatch - Control Panel')); ?>

	<!-- signup page content -->

		<div id="signup_frame">
		<h2><? if(loginCheck() == true): break; ?></h2>
			<? endif ?>
			<h1><?= $_SESSION["login_user"]; ?>'s Control Panel</h1>
			<div class="container">
				<div class="row text-center">
					<div class="col-md-3">
    					<h2><a href="upload.php"><span class="glyphicon glyphicon_user glyphicon-upload"></span></a><br>Upload a Song</h2>
    				</div>

    				<div class="col-md-3">
    					<h2><a href="view_uploads.php"><span class="glyphicon glyphicon_user glyphicon-music"></span></a><br>View My Uploads</h2>
    				</div>

    				<div class="col-md-3">
    					<h2><a href="delete_song.php"><span class="glyphicon glyphicon_user glyphicon-wrench"></span></a><br>Change Password</h2>
    				</div>

	    			<div class="col-md-3">
	    				<h2><a href="logout.php"><span class="glyphicon glyphicon_user glyphicon-log-out"></span></a><br>Log Out</h2>
	    			</div>
				</div>
			</div>	
		</div>
	</div>
	<? require_once('views/footer.php'); ?>
</body>
</html>