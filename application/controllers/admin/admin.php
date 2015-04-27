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
		$data['templet_URL'] = "admin/login";
		$this->load->view('admin/default',$data);
	}
	public function create_grid(){		
		$data['user_login_stat'] = true;
		$data['templet_URL'] = "admin/grid";
		$this->load->view('admin/default',$data);
	}

	public function login(){
		$result_arr = array('status'=>'error','message'=>'Invalid Credentials');
		$username = $this->input->post('username',true);
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
				//redirect logic to Home Page
			}

		}
		echo json_encode($result_arr);
	}
	public function logout(){
		$this->session->sess_destroy();
		//redirect logic after loggedout Sucessfully
		echo "logout sucessfully";
		//var_dump($this->__is_user_loggedin());
	}
}
