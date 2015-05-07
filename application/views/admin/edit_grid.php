<div  ng-controller="gridEditController" ng-init="<?php echo $initFunc;?>">
<div class="container-fluid grid_opt_container">
	<div class="row-fluid">
		<div class="options_div">
			<h2 class="h2">GRID OPTIONS</h2>
			<div class="options_field col-lg-8 col-md-8 col-sm-8">
				<form class="col-lg-6 col-md-6 col-sm-6" id="gridForm">
					<div class="form-group">
						<label for="exampleInputEmail1">GRID NAME*</label>
						<input type="text" class="form-control" ng-model="grid.title" placeholder="Enter Page Title">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">GRID BACKGROUND COLOR*</label>
						<input type="text" minicolors class="form-control" ng-model="grid.bgcolor" placeholder="Enter Hexcode or Use the Color Wheel" value=""/>
						<span id="picker"><img src="<?php echo base_url(); ?>asserts/img/col-pick.png"></span>
					</div>
				</form>
				<form class="col-lg-6 col-md-6 col-sm-6" id="gridForm">
					<div class="form-group">
						<label for="exampleInputEmail1">SELECT GRID ARRANGEMENT*</label>
						<select class="form-control" ng-model="grid.arrangement" ng-options="opt.value as opt.name for opt in gridArrOptions">
							<!-- <option value="0">Select Arrangement (Randomize or Default)</option>
							<option value="random" selected>Randomize</option>
							<option value="date">Default</option> -->
						</select>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">CHOOSE GRID FONT FAMILY*</label>
						<select class="form-control" ng-model="grid.font">
							<option class="roboto" value="roboto" selected>Roboto</option>
							<option class="opensans" value="opensans">Open Sans</option>
							<option class="montserrat" value="montserrat">Montserrat</option>
							<option class="lato" value="lato">Lato</option>
							<option class="proxima_nova" value="proxima_nova">Proxima Nova</option>
							<option class="helvetica" value="helvetica">Helevetica</option>
							<option class="raleway" value="raleway">Raleway</option>
							<option class="avenir" value="avenir">Avenir</option>
							<option class="din" value="din">DIN</option>
							<option class="pt_sans" value="pt_sans">PT Sans</option>
						</select>
					</div>
				</form>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 upload">
				<label for="exampleInputEmail1">PREVIEW IMAGE</label>
				<img src="" class="img-responsive" ng-src="{{grid.imageThumbnail}}" ng-init="grid.imageThumbnail = '<?php echo base_url(); ?>asserts/img/preview.png'">
				<input type="file" value="BROWSE" class="browse" file-model="grid.image" onchange="angular.element(this).scope().imageUpload(this)"/>
			</div>
			<div class="clearfix"></div>
			<button class="save_btn btn btn-default" ng-click="saveGrid()" ng-class="{loader: loaders.saveGrid}" ng-disabled="loaders.saveGrid">Save Grid</button>
		</div>		
	</div>
</div>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="new_card">
			<div class="new_card_head">
				<h2 class="h2">ADD NEW CARDS</h2>
				<h2 class="h2 card_options_heading">CARD OPTIONS</h2>				
				<select class="form-control card_type_select" ng-change = "changeType()" ng-disabled="!grid.gridId" ng-model="cardType" ng-options="opt.value as opt.name for opt in cardTypeOpt">
					<!-- <option ng-repeat="opt in cardTypeOpt" value="{{opt.value}}">{{opt.name}}</option> -->
				</select>				
				<button class="save_btn cancel btn btn-default inline pull-right" ng-click="cancelCard()" ng-show="newcartType != cardTypeOpt['0'].value">Cancel</button>

			</div>
			<div class="clearfix"></div>
			<div class="text_div" ng-class="{slideDown: newcartType != cardTypeOpt['0'].value}">
				<div class="card_options_div col-lg-8">
					<form class="col-lg-6">
						<div class="form-group">
							<label for="exampleInputEmail1">CARD SIZE*</label>
							<select class="form-control" ng-model="cardData.size" ng-options="opt.value as opt.name for opt in cardSizeOpt">
							</select>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">CARD NAME*</label>
							<input type="text" class="form-control" ng-model="cardData.title">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">OVERLAY COLOR*</label>
							<input type="text" class="form-control" ng-model="cardData.bgcolor" minicolors placeholder="Enter Hexcode or Use the Color Wheel"/>
							<span href="#" id="picker1"><img src="<?php echo base_url(); ?>asserts/img/col-pick.png"></span>
						</div>
						<div class="form-group" ng-hide="newcartType !='image'">
							<label for="exampleInputEmail1">IMAGE ALIGNMENT*</label>
							<select class="form-control" ng-model="cardData.align" ng-options="opt.value as opt.name for opt in cardAlignmentOpt">
							</select>
						</div>
					</form>
					<form class="col-lg-6">
						<div class="form-group">
							<label for="exampleInputEmail1">CARD LINK*</label>
							<input type="text" class="form-control" ng-model="cardData.url">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">CARD DESCRIPTION*</label>
							<input type="text" class="form-control" ng-model="cardData.description">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">FONT COLOR*</label>
							<input type="text" ng-model="cardData.fgcolor" class="form-control" minicolors placeholder="Enter Hexcode or Use the Color Wheel"/>
							<span href="#" id="picker1"><img src="<?php echo base_url(); ?>asserts/img/col-pick.png"></span>
						</div>
					</form>
				</div>
				<div class="col-lg-4 prev" ng-hide = "newcartType !='text' && newcartType != cardTypeOpt['0'].value">
					<label for="exampleInputEmail1">CARD PREVIEW</label>
					<div class="prev_box {{grid.font}}" style="background-color:{{cardData.bgcolor}};color:{{cardData.fgcolor}};">
				      <h2 class="h2">{{cardData.title}}</h2>
				      <p>{{cardData.description}}</p>
				    </div>
				</div>

				<div class="col-lg-4 prev" ng-hide = "newcartType !='image'">
					<label for="exampleInputEmail1">IMAGE PREVIEW</label>
					<img src="" ng-src="{{cardData.imageThumbnail}}" class="img-responsive" ng-init="cardData.imageThumbnail = '<?php echo base_url(); ?>asserts/img/preview.png'">
					<input type="file" value="BROWSE" class="browse" file-model="cardData.image" onchange="angular.element(this).scope().cardImageUpload(this)"/>
				</div>

				<div class="clearfix"></div>
				<button class="save_btn btn btn-default inline" ng-click="saveCard()" ng-class="{loader: loaders.saveCard}" ng-disabled="loaders.saveCard">Save Card</button>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="active_card_container {{grid.font}}">
			<h2 class="h2">ACTIVE CARDS</h2>
			<div ng-if="!cardsData"> No cards available try to create a card</div>
			<div class="col-lg-3" ng-repeat="card in cardsData">
				<div class="crd" ng-if="card.type == 'image'">
					<div class="preview" style="background-color:#ccc;background-image:url(<?php echo base_url(); ?>{{card.image}});">
						<!-- <img src="" ng-src="<?php echo base_url(); ?>{{card.image}}" class="img-responsive"> -->
					</div>
					<div class="card_title"><h4 class="h4" ng-bind="card.title">Card Title</h4></div>					
					<div class="preview_hover">
						<div class="edit_pre" ng-click="editCard($index)"><img src="<?php echo base_url(); ?>asserts/img/edit.png" class="img-responsive"></div>
						<div class="delete_pre" ng-click="deleteCard($index)"><img src="<?php echo base_url(); ?>asserts/img/del.png" class="img-responsive" ng-disabled="loaders.deleteCard"></div>
					</div>
				</div>
				<div class="crd" ng-if="card.type == 'text'" style="background-color:{{card.bgcolor}};color:{{card.fgcolor}};">
					<div class="text_co">
				       <div class="txt_div">
				        	<div class="card_title1"><h4 class="h4" ng-bind="card.title">Title</h4></div> 
				        	<p ng-bind="card.description">Description</p>
				       </div>
				    </div>					
					<div class="preview_hover">
						<div class="edit_pre" ng-click="editCard($index)"><img src="<?php echo base_url(); ?>asserts/img/edit.png" class="img-responsive"></div>
						<div class="delete_pre" ng-click="deleteCard($index)"><img src="<?php echo base_url(); ?>asserts/img/del.png" class="img-responsive" ng-disabled="loaders.deleteCard"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>