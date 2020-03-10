<div class="container">
	<h1>Instructions</h1>
	<p>General Instructions:</p>
	<p>This is a Mock test. Question Paper displayed is for practice purpose only. Under no circumstances should this be presumed as a sample paper.tte.</p>
	<a href="<?php echo URL; ?>indexPage/instructions" type="button" class="btn btn-primary">Previous</a>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<select class="form-control" id="selectSet" onchange="getSetName();">
				<option>Select Set</option>
				<?php for($i=0; $i<count($this->examSet); $i++ ) { ?>
				<option value="<?php echo $this->examSet[$i]['set_no']; ?>"><?php echo $this->examSet[$i]['set_no']; ?></option>
			<?php } ?>
			</select>
		</div>
		<div class="col-md-4"></div>
		<a href="<?php echo URL; ?>examPage/index" type="button" class="btn btn-primary" name="">Ready to Began</a>

	</div>
</div>

<script>
	function getSetName()
	{
		var setName = $('#selectSet').val();
		if(setName != '')
		{
			document.cookie = "setNo=" + setName + "; path=/";
		}
		 
	}
</script>