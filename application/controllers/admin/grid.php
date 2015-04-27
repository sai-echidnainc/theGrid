<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grid extends CI_Controller {

	public function __construct(){
    	parent::__construct();
		$this->load->library('session');
		$is_logged_in = $this->session->userdata('is_logged_in');
			if(!isset($is_logged_in) || $is_logged_in != true){
       			 redirect('/admin');
       		}
	}

	public function index()	{
		//echo "Grid";
		//echo json_encode($this->session->all_userdata());
		$user_id = $this->session->userdata('user_data')['user_id'];
		//var_dump($user_id);
		$this->load->model('admin/grid_model');
		$result_arr = array('status'=>'error','message'=>'No Grids Available');
		$gridData = $this->grid_model->getAllGrids($user_id);
		if(count($gridData) > 0){
			$result_arr['status'] = "ok";
			$result_arr['grid_data'] = $gridData;
			unset($result_arr['message']);
		}
		echo json_encode($result_arr);
	}

	public function delete($id){
		//var_dump(isset($id));
		$result_arr = array('status'=>'error','message'=>'No records found on the id');
		if(isset($id)){
			$this->load->model('admin/grid_model');
			$user_id = $this->session->userdata('user_data')['user_id'];
			if($this->grid_model->delete_grid($id,$user_id)){
				$result_arr['status'] = "ok";
				$result_arr['message'] = "Successfully deleted";
			}
		}
		echo json_encode($result_arr);
	}

	public function edit_grid(){		
		$data['user_login_stat'] = true;
		$data['templet_URL'] = "admin/edit_grid";
		$this->load->view('admin/default',$data);
	}
}