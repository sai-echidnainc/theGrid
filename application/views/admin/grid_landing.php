<div ng-controller="gridController">
<div class="container-fluid">
	<div class="row-fluid">
		<div class="grid_head">
			<h2 class="h2 pull-left">THE GRID</h2>
			<select class="form-control pull-right filter_grid">
				<option selected>Select Grids By</option>
				<option>Date</option>
				<option>Type</option>
				<option>Number</option>
			</select>
		</div>
	</div>
</div>
<div class="container-fluid" ng-init="gridData = false">

	<div ng-show="!gridData">
		No grid data Available
	</div>

	<div class="row-fluid" ng-show="gridData">

		<div class="col-lg-4 cen" ng-repeat="grid in gridData">
			<div class="grid-container">
				<a href="#">
					<img src="<?php echo base_url();?>asserts/img/grid.png" class="img-responsive" ng-if="!grid.image">
					<img ng-src="<?php echo base_url();?>{{grid.image}}" class="img-responsive" ng-if="grid.image" alt="{{grid.title}}">
				</a>
				<div class="grid_detail">
					<h4 class="h4" ng-bind="grid.title"></h4>
					<p ng-if="grid.description" ng-bind="grid.description"></p>
					<a href="javascript:void(0)" ng-click="deleteGrid(grid.grid_id,$index)">Delete Grid</a>
				</div>
				<div class="hover_content">
					<span class="gridno">{{grid.COUNT}} Cards</span>
					<span class="date">Created on {{grid.createdDate}}</span>
					<input type="button" value="Edit Grid">
				</div>
				<div class="overlay"></div>
			</div>
		</div>



		<!--<?php 
			if(count($grid_data)){
				foreach ($grid_data as $key => $grid) {
		?>

		<div class="col-lg-4 cen">
			<div class="grid-container">
				<a href="#">
					<?php if(isset($grid['image'])){						
						echo '<img src="'.base_url().$grid['image'].'" class="img-responsive">';
					}else{
						echo '<img src="'.base_url().'asserts/img/grid.png" class="img-responsive">';
					}?>
				</a>
				<div class="grid_detail">
					<h4 class="h4"><?php echo $grid['title'];?></h4>
					<?php 
						echo (isset($grid['description'])) ? '<p>'.$grid['description'].'</p>' : '';
					?>
					<a href="#">Delete Grid</a>
				</div>
				<div class="hover_content">
					<span class="gridno"><?php echo $grid['COUNT'];?> Cards</span>
					<span class="date">Created on <?php echo $grid['createdDate'];?></span>
					<input type="button" value="Edit Grid">
				</div>
				<div class="overlay"></div>
			</div>
		</div>

		<?php
				}
			}else{
				echo "No grids are available try create grids first";
			}
		?>-->
	</div>
</div>
</div>