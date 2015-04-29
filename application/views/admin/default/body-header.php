<?php 

	if(!isset($user_login_stat)){
		return;
	}

?>
<div class="container-fluid header-container">
	<div class="row-fluid ">
		<div class="logo-div pull-left">
			<a href="<?php echo site_url('admin');?>"><img src="<?php echo base_url(); ?>asserts/img/logo-mini.png" class="img-responsive"></a>
		</div>
		<div class="grid_btn pull-right">
			<a href="<?php echo site_url('admin/logout');?>"><img src="<?php echo base_url(); ?>asserts/img/logout.png" alt="Logout"></a>
			<?php
				if( isset($nav) && $nav =="edit"){
			?>
					<a href="<?php echo site_url('grid/add');?>"><input type="button" value="Preview Grid" class="btn btn-default head_btn"/></a>
					<a href="<?php echo site_url('grid/add');?>"><input type="button" value="Publish Grid" class="btn btn-default head_btn"/></a>
			<?php		
				}else{
			?>
			<a href="<?php echo site_url('grid/add');?>"><input type="button" value="Add New Grid" class="btn btn-default head_btn"/></a>
			<?php } ?>
		</div>
	</div>
</div>