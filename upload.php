<? require_once('includes/helpers.php'); ?>

<? render(header, array('title' => 'MusicMatch - Song Upload')); ?>

<? if(isset($_POST['upload']) && loginCheck() != true): ?>
	<? songUpload($_POST['songname'], $_POST['genre'],$_POST['price'], $_POST['duration']); ?>
<? endif ?>

	<!-- upload page form -->
		<div id="signup_frame">
		<h2><? if(loginCheck() == true): break; ?></h2>
			<? endif ?>
			<h1>Enter Song Info</h1>
			<hr><br>
			<div class="container">
				<!-- signup form -->
				<div class="row col-md-8 col-md-offset-2">
					<form class="form form-horizontal" action="" method="POST" enctype="multipart/form-data" role="form">
						<div class="form-group">
							<label class="control-label col-md-3" for="songname">Song Title</label>
							<div class="col-md-8">
    							<input type="text" class="form-control input-lg" id="songname" name="songname" required>
	    					</div>
	    				</div>
	    				<div class="form-group">
	    					<label class="control-label col-md-3" for="price">Price</label>
	    					<div class="col-md-8">
	    						<input type="text" class="form-control input-lg" id="price" placeholder="e.g. 49.99" name="price" required>
	    					</div>
	    				</div>
	    				<div class="form-group">
	    					<label class="control-label col-md-3" for="duration">Duration</label>
	    					<div class="col-md-8">
	    						<input type="text" class="form-control input-lg" id="duration" placeholder="e.g. 4.05 for 4m 5s" name="duration" required>
	    					</div>
	    				</div>
						<div class="form-group">
							<label class="control-label col-md-3" for="genre">Genre</label>
							<div class="col-md-8">
								<select class="form-control" id="genre" name="genre">
									<? listGenres(); ?>									
								</select>
							</div>
						</div>
					
	    				<div class="form-group ">
	    					<h3>Upload a File</h3>
	    					<label class="control-label col-md-4" for="file">Upload File:</label>
	    					<div class="col-md-5">
	    						<input type="file" class="form-control input-lg" id="file" name="file" required>
	    					</div>
	    				</div>
	    				<div class="form-group text-center">
	    					<button type="submit" id="upload_buttom" class="btn btn-success btn-lg" name="upload" value="upload">Upload</button>
	    				</div>
	    			</form>
				</div>
			</div>	
		</div>
	</div>
	<? require_once('views/footer.php'); ?>
</body>
</html>