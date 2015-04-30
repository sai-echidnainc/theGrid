<div class="container-fluid search_sort_div">
	<div class="row-fluid">
		<div class="col-lg-2">
			<select class="form-control pull-right filter_grid">
				<option value='0' selected>Select Grids By</option>
				<option value="createdDate">Date</option>
				<!-- <option value="-createdDate">Date -</option> -->
				<option value="COUNT">Count</option>
				<!-- <option value="-COUNT">Count -</option> -->
			</select>
		</div>
		<div class="col-lg-8"></div>
		<div class="col-lg-2 pull-right">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Search for...">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">Go!</button>
				</span>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid grid_view_section">
	<div class="row-fluid">
		<div class="col-lg-4 cen">
			<div class="grid-container">
				<a href="#">
					<img src="<?php echo base_url();?>asserts/img/grid.png" class="img-responsive" ng-if="!grid.image">
					<img ng-src="<?php echo base_url();?>{{grid.image}}" class="img-responsive" ng-if="grid.image" alt="{{grid.title}}">
				</a>
				<div class="grid_detail">
					<h4 class="h4">The Grids will Got Bigger</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pretium at purus sed volutpat. Morbi tristique sapien justo, nec cursus leo.</p>
				</div>
				<div class="hover_content">
					<span class="gridno">4 Cards</span>
					<span class="date">Created on 29/04/15</span>
				</div>
				<div class="overlay"></div>
			</div>
		</div>
	</div>
</div>