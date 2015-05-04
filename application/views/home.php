<div class="container-fluid search_sort_div">
	<div class="row-fluid">
		<div class="col-lg-2 col-md-2 col-sm-2">
			<select class="form-control pull-right filter_grid" id="sortBy">
				<option value='0' selected>Select Grids By</option>
				<option value="date">Date</option>
				<!-- <option value="-createdDate">Date -</option> -->
				<option value="count">Count</option>
				<!-- <option value="-COUNT">Count -</option> -->
			</select>
		</div>
		<div class="col-lg-8 col-md-8 col-sm-8"></div>
		<div class="col-lg-2 col-md-2 col-sm-2 pull-right">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Search for..." id="searchTxt">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button" id="search">Go!</button>
				</span>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid grid_view_section">
	<div class="row-fluid" id="gridContainer">

		<?php
			if(count($grids) > 0){
				foreach ($grids as $key => $grid) {
		?>

		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 cen sorting" data-date="<?php echo strtotime($grid['createdDate']);?>" data-count="<?php echo $grid['COUNT'];?>" data-title="<?php echo  strtolower($grid['title']);?>">
			<a href="<?php echo site_url('preview').'/'.$grid['slug'];?>">
				<div class="grid-container" style="background:url('<?php echo base_url().$grid['image'];?>');">
						<!-- <img src="<?php echo base_url().$grid['image'];?>" class="img-responsive"> -->
					<div class="grid_detail">
						<h4 class="h4"><?php echo $grid['title'];?></h4>
						<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pretium at purus sed volutpat. Morbi tristique sapien justo, nec cursus leo.</p> -->
					</div>
					<div class="hover_content">
						<span class="gridno"><?php echo $grid['COUNT'];?> Cards</span>
						<span class="date">Created on <?php echo $grid['createdDate'];?></span>
					</div>
					<div class="overlay"></div>
				</div>
			</a>
		</div>

		<?php
			}
			}else{
				echo "No Grids available";
			}
		?>

		<?php 
		//echo json_encode($grids);
		?>
	</div>
</div>