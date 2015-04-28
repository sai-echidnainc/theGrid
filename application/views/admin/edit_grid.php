<div class="container-fluid grid_opt_container">
	<div class="row-fluid">
		<div class="options_div">
			<h2 class="h2">GRID OPTIONS</h2>
			<div class="options_field col-lg-8">
				<form class="col-lg-6">
					<div class="form-group">
						<label for="exampleInputEmail1">GRID NAME*</label>
						<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Page Title">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">GRID BACKGROUND COLOR*</label>
						<input type="email" class="form-control" id="gridBGColor" placeholder="Enter Hexcode or Use the Color Wheel" value=""/>
						<span id="picker"><img src="<?php echo base_url(); ?>asserts/img/col-pick.png"></span>
					</div>
				</form>
				<form class="col-lg-6">
					<div class="form-group">
						<label for="exampleInputEmail1">SELECT GRID ARRANGEMENT*</label>
						<select class="form-control">
							<option default>Select Arrangement (Randomize or Default)</option>
							<option>Randomize</option>
							<option>Default</option>
						</select>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">CHOOSE GRID FONT FAMILY*</label>
						<select class="form-control">
							<option class="roboto">Roboto</option>
							<option class="times_new_roman">Open Sans</option>
							<option class="montserrat">Montserrat</option>
							<option class="lato">Lato</option>
							<option class="proxima_nova">Proxima Nova</option>
							<option class="helvetica">Helevetica</option>
							<option class="raleway">Raleway</option>
							<option class="avenir">Avenir</option>
							<option class="din">DIN</option>
							<option class="pt_sans">PT Sans</option>
						</select>
					</div>
				</form>
			</div>
			<div class="col-lg-4 upload">
				<label for="exampleInputEmail1">PREVIEW IMAGE</label>
				<img src="<?php echo base_url(); ?>asserts/img/preview.png" class="img-responsive">
				<input type="file" value="BROWSE" class="browse"/>
			</div>
			<div class="clearfix"></div>
			<button class="save_btn btn btn-default">Save Grid</button>
		</div>		
	</div>
</div>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="new_card">
			<div class="new_card_head">
				<h2 class="h2">ADD NEW CARDS</h2>
				<h2 class="h2 card_options_heading">CARD OPTIONS</h2>
				<select class="form-control card_type_select">
					<option default selected value="1">Select Type</option>
					<option value="2">Text</option>
					<option value="3">Image</option>
				</select>
			</div>
			<div class="clearfix"></div>
			<div class="text_div">
				<div class="card_options_div col-lg-8">
					<form class="col-lg-6">
						<div class="form-group">
							<label for="exampleInputEmail1">CARD SIZE*</label>
							<select class="form-control">
								<option>Small</option>
								<option>Medium</option>
								<option>Large</option>
							</select>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">CARD NAME*</label>
							<input type="email" class="form-control" id="exampleInputEmail1">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">OVERLAY COLOR*</label>
							<input type="email" class="form-control" id="gridBGColor1" placeholder="Enter Hexcode or Use the Color Wheel"/>
							<span href="#" id="picker1"><img src="<?php echo base_url(); ?>asserts/img/col-pick.png"></span>
						</div>
					</form>
					<form class="col-lg-6">
						<div class="form-group">
							<label for="exampleInputEmail1">CARD LINK*</label>
							<input type="email" class="form-control" id="exampleInputEmail1">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">CARD LINK*</label>
							<input type="email" class="form-control" id="exampleInputEmail1">
						</div>
					</form>
				</div>
				<div class="col-lg-4 prev">
					<label for="exampleInputEmail1">CARD PREVIEW</label>
					<img src="<?php echo base_url(); ?>asserts/img/preview.png" class="img-responsive">
				</div>
				<div class="clearfix"></div>
				<button class="save_btn btn btn-default">Save Card</button>
			</div>
			<div class="img_div">
				<div class="card_options_div col-lg-8">
					<form class="col-lg-6">
						<div class="form-group">
							<label for="exampleInputEmail1">CARD SIZE*</label>
							<select class="form-control">
								<option>Small</option>
								<option>Medium</option>
								<option>Large</option>
							</select>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">CARD NAME*</label>
							<input type="email" class="form-control" id="exampleInputEmail1">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">OVERLAY COLOR*</label>
							<input type="email" class="form-control" id="gridBGColor2" placeholder="Enter Hexcode or Use the Color Wheel"/>
							<span id="picker2"><img src="<?php echo base_url(); ?>asserts/img/col-pick.png"></span>
						</div>
					</form>
					<form class="col-lg-6">
						<div class="form-group">
							<label for="exampleInputEmail1">CARD LINK*</label>
							<input type="email" class="form-control" id="exampleInputEmail1">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">CARD LINK*</label>
							<input type="email" class="form-control" id="exampleInputEmail1">
						</div>
					</form>
				</div>
				<div class="col-lg-4 prev">
					<label for="exampleInputEmail1">CARD PREVIEW</label>
					<img src="<?php echo base_url(); ?>asserts/img/preview.png" class="img-responsive">
					<input type="file" value="BROWSE" class="browse"/>
				</div>
				<div class="clearfix"></div>
				<button class="save_btn btn btn-default">Save Card</button>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="active_card_container">
			<h2 class="h2">ACTIVE CARDS</h2>
			<div class="col-lg-3">
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
			<div class="col-lg-3">
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
			<div class="col-lg-3">
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
			<div class="col-lg-3">
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
			<div class="col-lg-3">
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
			<div class="col-lg-3">
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
</div>
