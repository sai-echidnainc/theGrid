<div class="container-fluid">
	<div class="row-fluid">
		<div class="col-lg-3" ng-repeat="card in cards">
			<div class="crd">
				<div class="preview">
					<img src="<?php echo base_url(); ?>asserts/img/view.png" class="img-responsive">
				</div>
				<div class="card_title"><h4 class="h4">Card Title</h4></div>					
				<div class="preview_hover">
					<div class="edit_pre">
						<img src="<?php echo base_url(); ?>asserts/img/edit.png" class="img-responsive">
					</div>
					<div class="delete_pre"><img src="<?php echo base_url(); ?>asserts/img/del.png" class="img-responsive"></div>
				</div>
			</div>
		</div>
	</div>
</div>