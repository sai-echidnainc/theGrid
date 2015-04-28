<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct(){
    	parent::__construct();
		$this->load->library('session');
	}

	private function __is_user_loggedin(){		
		$is_logged_in = $this->session->userdata('is_logged_in');
			if(!isset($is_logged_in) || $is_logged_in != true){
       			return false;
       		}else{
       			return true;
       		}
	}	

	public function index()	{

		if($this->__is_user_loggedin()){
			$data['user_login_stat'] = true;
			$this->load->model('admin/grid_model');
			$data['grid_data'] = $this->grid_model->getAllGrids($this->session->userdata('user_data')['user_id']);			
			$data['page_title'] = "Grid Home Page";
			$data['templet_URL'] = "admin/grid_landing";
			$this->load->view('admin/default',$data);
		}else{
			$data['error'] = $this->session->flashdata('error');
			$data['page_title'] = "Login Page";
			$data['templet_URL'] = "admin/login";
			$this->load->view('admin/default',$data);
		}
	}
	public function create_grid(){		
		$data['user_login_stat'] = true;
		$data['templet_URL'] = "admin/grid_landing";
		$this->load->view('admin/default',$data);
	}

	public function login(){
		$result_arr = array('status'=>'error','message'=>'Invalid Credentials');
		$username = trim($this->input->post('username',true));
		$password = $this->input->post('password',true);

		if (!$username || !$password) {
			$result_arr['message'] = 'Please provide username and password';

		}else{
			$this->load->model('admin/admin_model');
			$user_data = $this->admin_model->check_user($username,$password);
			if(count($user_data) > 0){
				$result_arr['status'] = 'OK';
				$result_arr['message'] = 'Login Sucessfull';
				$this->session->set_userdata('user_data',$user_data);
				$this->session->set_userdata('is_logged_in',true);
			}
		}
		if($result_arr['status'] == "error")
			$this->session->set_flashdata('error', $result_arr['message']);
		redirect('admin');
	}
	public function logout(){
		$this->session->sess_destroy();
		//redirect logic after loggedout Sucessfully
		echo "logout sucessfully";
		//var_dump($this->__is_user_loggedin());
	}
}
