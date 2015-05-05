<?php 

	if(!isset($user_login_stat)){
		return;
	}

?>
<div class="container-fluid header-container" ng-controller="navController">
	<div class="row-fluid ">
		<div class="logo-div pull-left">
			<a href="<?php echo site_url('admin');?>"><img src="<?php echo base_url(); ?>asserts/img/logo-mini.png" class="img-responsive"></a>
		</div>
		<div class="grid_btn pull-right">
			<a href="<?php echo site_url('admin/logout');?>"><img src="<?php echo base_url(); ?>asserts/img/logout.png" alt="Logout"></a>
			<?php
				if( isset($nav) && $nav =="edit"){
			?>
				<a href="<?php echo site_url('grid/add');?>{{gridID}}"><input type="button" value="Preview Grid" class="btn btn-default head_btn" ng-disabled="!gridID"/></a>
				<input type="button" value="{{pBtnTxt}}" class="btn btn-default head_btn loader" ng-disabled="!gridID" ng-click="publish()"/>
				
			<?php		
				}else{
			?>
			<a href="<?php echo site_url('grid/add');?>"><input type="button" value="Add New Grid" class="btn btn-default head_btn"/></a>
			<?php } ?>
		</div>
	</div>
</div>