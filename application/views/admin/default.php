<?php

 	$this->load->view('admin/default/header');
 	$this->load->view( isset($templet_URL) ? $templet_URL : 'default/404');
 	$this->load->view('admin/default/footer');

 ?>