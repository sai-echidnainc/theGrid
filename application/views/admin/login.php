<!-- Login Container -->
<div class="container-fluid login" ng-controller="LoginController">
	<div class="row-fluid">
		<div class="echidna_home text-center">
			<img src="<?php echo base_url(); ?>asserts/img/logo.png" class="img-responsive" alt="logo"/>
			<div class="welcome">
				<h3 class="h3">WELCOME TO THE GRID</h3>
			</div>
		</div>
	</div>
	<div class="row-fluid form-container">
		<div class="form_div">
			<!-- <form class="form-inline" method="post" action="<?php echo base_url();?>admin/login"> -->
			<?php
				$attributes = array('class' => 'form-inline', 'id' => 'loginForm');
				echo form_open('admin/login', $attributes);
			?>
				<div class="form-group">
					<div><label class="sr-only" for="exampleInputEmail3">USERNAME</label></div>
					<input type="text" class="form-control" name="username" id="exampleInputEmail3">
				</div>
				<div class="form-group password">
					<div><label class="sr-only" for="exampleInputPassword3">PASSWORD</label></div>
					<input type="password" name="password" class="form-control" id="exampleInputPassword3">
				</div>
				<div class="clearfix"></div>
				<?php 
					if(isset($error) && $error != '')
						echo '<div class="error">'.$error.'</div>';				
				?>
				<input type="submit" class="btn btn-default" value="submit">
			</form>
		</div>
	</div>
</div>