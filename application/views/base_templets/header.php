<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php echo isset($page_title) ? $page_title : "The Grid" ?></title>
		<?php $this->load->view('base_templets/style');?>
	</head>
	<body class="opensans">
		<nav class="navbar navbar-default header-container">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="<?php echo base_url(); ?>">
						<img alt="Brand" src="<?php echo base_url(); ?>asserts/img/logo-mini.png">
					</a>
				</div>
			</div>
		</nav>
