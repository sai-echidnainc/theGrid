<!-- Grid Detail -->
<?php 
$baseURL = base_url();
 
$imageSizeArr = array(
 	'onebyone' => $baseURL.'asserts/img/1x1.jpg',
 	'onebytwo' => $baseURL.'asserts/img/1x2.jpg',
 	'twobyone' => $baseURL.'asserts/img/2x1.jpg',
 	'twobytwo' => $baseURL.'asserts/img/2x2.jpg',
 	'twobythree' => $baseURL.'asserts/img/2x3.jpg',
 	'threebytwo' => $baseURL.'asserts/img/3x2.jpg',
 	'threebythree' => $baseURL.'asserts/img/3x3.jpg'
 	); 
	
?>

<div class="container-fluid grid_msnry" style="background-color:<?php echo (isset($cards[0]['grid_color'])) ? $cards[0]['grid_color'] : '';?>;">
	<div class="row-fluid">
		<div class="masonry-container <?php echo (isset($cards[0]['grid_font'])) ? $cards[0]['grid_font'] : '';?>">
			<?php
				foreach ($cards as $key => $card) {
					//echo json_encode($card['card_type']);
					switch ($card['card_type']) {
						case 'text':
							?>
							<div class="grid_element <?php echo $card['card_size'];?>">
								<a href="<?php echo $card['card_url'];?>" target="_blank">
									<img src="<?php echo $imageSizeArr[$card['card_size']]; ?>" class="img-responsive">
									<div class="card_data text_card" style="color:<?php echo $card['text_color']; ?>;background-color:<?php echo $card['overlay_color']; ?>;">
										<h2 class="h2"><?php echo $card['card_name']; ?></h2>
										<p><?php echo $card['card_description']; ?></p>
									</div>
								</a>
							</div>
							<?php
							break;
						case 'image':
							?>
							<div class="grid_element <?php echo $card['card_size'];?>">
								<a href="<?php echo $card['card_url'];?>" target="_blank">
									<img src="<?php echo $imageSizeArr[$card['card_size']]; ?>" class="img-responsive">
									<div class="card_data image_card" style="background-image:url('<?php echo base_url().$card['card_image']; ?>');">
										<div class="descp" style="color:<?php echo $card['text_color']; ?>; background-color:<?php echo $card['overlay_color']; ?>;">
											<h2 class="h2"><?php echo $card['card_name']; ?></h2>
											<p><?php echo $card['card_description']; ?></p>
										</div>
									</div>
								</a>
							</div>
							<?php
							break;
					}
				}
			?>
		<!-- 
			<div class="grid_element onebyone">
				<a href="#">
					<img src="<?php echo base_url(); ?>asserts/img/1x1.jpg" class="img-responsive">
					<div class="card_data image_card" style="background-image:url('<?php echo base_url(); ?>asserts/img/grid.png');">
						<div class="descp" style="color:#000; background-color:#fff;">
							<h2 class="h2">THE GRID</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pretium at purus sed volutpat. Morbi tristique sapien justo, nec cursus leo.</p>
						</div>
					</div>
				</a>
			</div>
			<div class="grid_element onebytwo">
				<a href="#">
					<img src="<?php echo base_url(); ?>asserts/img/1x1.jpg" class="img-responsive">
					<div class="card_data image_card" style="background-image:url('<?php echo base_url(); ?>asserts/img/grid.png');">
						<div class="descp" style="color:#000; background-color:#fff;">
							<h2 class="h2">THE GRID</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pretium at purus sed volutpat. Morbi tristique sapien justo, nec cursus leo.</p>
						</div>
					</div>
				</a>
			</div>
			<div class="grid_element twobyone">
				<a href="#">
					<img src="<?php echo base_url(); ?>asserts/img/1x1.jpg" class="img-responsive">
					<div class="card_data image_card" style="background-image:url('<?php echo base_url(); ?>asserts/img/grid.png');">
						<div class="descp" style="color:#000; background-color:#fff;">
							<h2 class="h2">THE GRID</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pretium at purus sed volutpat. Morbi tristique sapien justo, nec cursus leo.</p>
						</div>
					</div>
				</a>
			</div>
			<div class="grid_element twobytwo">
				<a href="#">
					<img src="<?php echo base_url(); ?>asserts/img/1x1.jpg" class="img-responsive">
					<div class="card_data image_card" style="background-image:url('<?php echo base_url(); ?>asserts/img/grid.png');">
						<div class="descp" style="color:#000; background-color:#fff;">
							<h2 class="h2">THE GRID</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pretium at purus sed volutpat. Morbi tristique sapien justo, nec cursus leo.</p>
						</div>
					</div>
				</a>
			</div>
			<div class="grid_element twobythree">
				<a href="#">
					<img src="<?php echo base_url(); ?>asserts/img/1x1.jpg" class="img-responsive">
					<div class="card_data image_card" style="background-image:url('<?php echo base_url(); ?>asserts/img/grid.png');">
						<div class="descp" style="color:#000; background-color:#fff;">
							<h2 class="h2">THE GRID</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pretium at purus sed volutpat. Morbi tristique sapien justo, nec cursus leo.</p>
						</div>
					</div>
				</a>
			</div>
			<div class="grid_element threebytwo">
				<a href="#">
					<img src="<?php echo base_url(); ?>asserts/img/1x1.jpg" class="img-responsive">
					<div class="card_data text_card" style="background-image:url('<?php echo base_url(); ?>asserts/img/grid.png');color:#000;font-family:'Roboto';background-color:#ccc;">
						<h2 class="h2">THE GRID</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pretium at purus sed volutpat. Morbi tristique sapien justo, nec cursus leo.</p>
					</div>
				</a>
			</div>
			<div class="grid_element threebythree">
				<a href="#">
					<img src="<?php echo base_url(); ?>asserts/img/1x1.jpg" class="img-responsive">
					<div class="card_data image_card" style="background-image:url('<?php echo base_url(); ?>asserts/img/grid.png');">
						<div class="descp" style="color:#000; background-color:#fff;">
							<h2 class="h2">THE GRID</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pretium at purus sed volutpat. Morbi tristique sapien justo, nec cursus leo.</p>
						</div>
					</div>
				</a>
			</div>
			<div class="grid_element onebytwo">
				<a href="#">
					<img src="<?php echo base_url(); ?>asserts/img/1x1.jpg" class="img-responsive">
					<div class="card_data image_card" style="background-image:url('<?php echo base_url(); ?>asserts/img/grid.png');">
						<div class="descp" style="color:#000; background-color:#fff;">
							<h2 class="h2">THE GRID</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pretium at purus sed volutpat. Morbi tristique sapien justo, nec cursus leo.</p>
						</div>
					</div>
				</a>
			</div>
			<div class="grid_element twobythree">
				<a href="#">
					<img src="<?php echo base_url(); ?>asserts/img/1x1.jpg" class="img-responsive">
					<div class="card_data image_card" style="background-image:url('<?php echo base_url(); ?>asserts/img/grid.png');">
						<div class="descp" style="color:#000; background-color:#fff;">
							<h2 class="h2">THE GRID</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pretium at purus sed volutpat. Morbi tristique sapien justo, nec cursus leo.</p>
						</div>
					</div>
				</a>
			</div>
			<div class="grid_element onebyone">
				<a href="#">
					<img src="<?php echo base_url(); ?>asserts/img/1x1.jpg" class="img-responsive">
					<div class="card_data text_card" style="background-image:url('<?php echo base_url(); ?>asserts/img/grid.png');color:#000;font-family:'Roboto';background-color:#ccc;">
						<h2 class="h2">THE GRID</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pretium at purus sed volutpat. Morbi tristique sapien justo, nec cursus leo.</p>
					</div>
				</a>
			</div> -->
		</div>
	</div>
</div>

<!-- <div class="wrapper">
	<div class="container main" id="work-page">
		<div class="row">
			<div class="twelvecol">
				<div class="postContainer postContent masonry-container">

					<div class="outer-container large" style="">
						<a href="#" style="">
							<img src="<?php echo base_url(); ?>asserts/img/grid.png" class="img-responsive">
							<div class="inner-relative" style="">
								<p class="p-1">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> -->