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
				if(!$cards || count($cards) <= 0){
					echo "No cards Found";
				}else{
				foreach ($cards as $key => $card) {
					//echo json_encode($card['card_type']);
					switch ($card['card_type']) {
						case 'text':
							?>
							<div class="grid_element <?php echo $card['card_size'];?>">
								<a href="<?php echo ($card['card_url'] != '') ? $card['card_url'].'"  target="_blank' : '#';?>">
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
								<a href="<?php echo ($card['card_url'] != '') ? $card['card_url'].'"  target="_blank' : '#';?>">
									<img src="<?php echo $imageSizeArr[$card['card_size']]; ?>" class="img-responsive">
									<div class="card_data image_card <?php echo ($card['card_preview'] == 'Y') ? 'preview' : ''; ?>" style="background-image:url('<?php echo base_url().$card['card_image']; ?>'); background-position:<?php echo (isset($card['card_image_position'])) ? $card['card_image_position'] : 'left'; ?>;" data-image="<?php echo base_url().$card['card_image']; ?>">
										<div class="descp" style="color:<?php echo $card['text_color']; ?>; background-color:<?php echo $card['overlay_color']; ?>;">
											<div class="fullscreen"></div>
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
			}
			?>		
		</div>
	</div>
</div>

<div class="image_fullscreenContainer cus_hide">
	<div class="back_overlay"></div>
	<div class="close_overlay"></div>
	<img src="http://192.168.100.18/theGrid/uploads/grids/Tulips.jpg" id="image" alt="PreviewImage">
</div>