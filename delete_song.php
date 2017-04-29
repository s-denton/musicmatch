<? require_once('includes/helpers.php'); ?>

<? render(header, array('title' => 'MusicMatch - Remove a Song')) ?>

<? if($_SERVER["REQUEST_METHOD"] == "POST"): ?>
	<? deleteSong($_POST['song']); ?>
<? endif ?>

<div id="table_frame">
	<h2><? if(loginCheck() == true): break; ?></h2>
	<? endif ?>
	<h1>Select a Song to Delete</h1><br>
	<div class="container">
		<label class="col-md-4 control-label"></label>
		<div class="col-md-4">
			<form name="ddlist" action="" method="POST">
				<select class="form-control" name="song">
					<? songDropDown($_SESSION['login_user']); ?>
				</select>
				<div class="row margin_top margin_bottom">
					<input type="button" class="btn btn-primary btn-lg" onclick="window.location.href='user_home.php'" value="Go Back">
					<input type="submit" name="submit" class="btn btn-danger btn-lg" value="Remove Song">
				</div>
			</form>
		</div>
	</div>
</div>
<? require_once('views/footer.php'); ?>
</body>
</html>
