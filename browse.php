<? require_once('includes/helpers.php'); ?>

<? render(header, array('title' => 'MusicMatch - Browse Music')); ?>

<!-- browse content -->
<div class="container parallax_landing">	
	<div class="row white" id="home">
		<div class="col-md-12" id="top_bar">
			<div class="col-md-12" id="top_row">
				<h1 class="margin_bottom">Browse Music</h1>
				<div class="form-group" id="browse_form" z-index:2>
					<select class="form-control" name="byGenre" id="byGenre" onchange="showSongsByGenre(this.value)">
						<option name="genre" label="By Genre"><? listGenres(); ?></option>
					</select>
					<select class="form-control" name="byUser" id="byUser" onchange="showSongsByUser(this.value)">
						<option name="users" label="By Composer"><? listUsers(); ?></option>
					</select>
					<select class="form-control" name="byPrice" id="byPrice" onchange="showSongsByPrice(this.value)">
						<option label="By Price"></option>
						<option value="price1">$0 - $100</option>
						<option value="price2">$101 - $250</option>
						<option value="price3">over $250</option>
					</select>
				</div>
			</div>
			<div id="browse_results" class="table center"></div>
		</div>
	</div>
</div>
<? require_once('views/footer.php'); ?>
</body>
</html>