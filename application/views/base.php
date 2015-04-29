<?php

 	$this->load->view('base_templets/header');
 	$this->load->view( isset($templet_URL) ? $templet_URL : 'default/404');
 	$this->load->view('base_templets/footer');

 ?>