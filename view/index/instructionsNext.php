<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h4 class="bg-info text-light p-1">Instructions</h4>
			<p>This is a Mock test. Question Paper displayed is for practice purpose only. Under no circumstances should this be presumed as a sample paper.tte.</p>
			<div class="row">
				<div class="col-md-5 text-right">
					<a href="<?php echo URL; ?>indexPage/instructions" type="button" class="btn btn-primary">Previous</a>
				</div>
				<div class="col-md-2">
					<select class="form-control" id="selectSet" onchange="getSetName();">
						<option>Select Set</option>
						<?php for($i=0; $i<count($this->examSet); $i++ ) { ?>
						<option value="<?php echo $this->examSet[$i]['set_no']; ?>"><?php echo $this->examSet[$i]['set_no']; ?></option>
					<?php } ?>
					</select>
				</div>
				<div class="col-md-5 text-left">
				<a href="<?php echo URL; ?>examPage/index" type="button" class="btn btn-primary" name="">Ready to Began</a>
				</div>
			</div>
		</div>
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