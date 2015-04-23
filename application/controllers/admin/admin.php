<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function index()
	{
		//$this->load->view('welcome_message');
		$data['templet_URL'] = "admin/login";
		$this->load->view('admin/default',$data);
	}
	public function create_grid(){		
		$data['user_login_stat'] = true;
		$data['templet_URL'] = "admin/grid";
		$this->load->view('admin/default',$data);
	}
}
