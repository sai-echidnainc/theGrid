<?php 

	if(!isset($user_login_stat)){
		return;
	}

?>
<div class="container-fluid header-container">
	<div class="row-fluid ">
		<div class="logo-div pull-left">
			<a href="#"><img src="<?php echo base_url(); ?>asserts/img/logo-mini.png" class="img-responsive"></a>
		</div>
		<div class="grid_btn pull-right">
			<input type="button" value="Add New Grid" class="btn btn-default"/>
		</div>
	</div>
</div>