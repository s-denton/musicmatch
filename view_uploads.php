<? require_once('includes/helpers.php'); ?>

<? render(header, array('title' => 'MusicMatch - View Uploads')); ?>

<div id="table_frame">
	<h2><? if(loginCheck() == true): break; ?></h2>
		<? endif ?>
	<h1><?= $_SESSION["login_user"] ?>'s Uploads</h1><br>
	<div class="table center">
		<? viewUploads(); ?>
		<div class="row">
			<button class="btn btn-primary btn-lg" onclick="window.location.href='user_home.php'">Back</button>
		</div>
	</div>
</div>
<? require_once('views/footer.php'); ?>
</body>
</html>