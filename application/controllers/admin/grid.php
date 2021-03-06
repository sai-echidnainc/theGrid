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

	private function __create_slug($string) {

	   $string = preg_replace('/[^A-Za-z0-9\s\-]/', '', $string); 
	   return str_replace(' ', '-', $string);
	}

	private function __upload_file($file_path,$file_name){
		$config['upload_path'] = $file_path;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '10000';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload($file_name))
		{
			$error['status'] = "error";
			$error['error'] = $this->upload->display_errors();
			return $error;
			//var_dump($error);
		}
		else
		{
			$data['status'] = "ok";
			$data['data'] = $this->upload->data();
			return $data;
			//var_dump($data);
		}
	}


	public function index()	{
		/*
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
		*/
		redirect('admin');
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

	public function add($mode = 'create', $grid_id = 0){
		$data['user_login_stat'] = true;
		$data['page_title'] = "Add Grid";
		$data['initFunc'] = "init()";
			if($mode == 'edit'){				
				$data['initFunc'] = "editInit($grid_id)";
				$data['page_title'] = "Edit Grid";
			}
		$data['templet_URL'] = "admin/edit_grid";
		$data['nav'] = 'edit';
		$this->load->view('admin/default',$data);
	}

	public function edit_grid(){		
		$data['user_login_stat'] = true;
		$data['templet_URL'] = "admin/edit_grid";
		$this->load->view('admin/default',$data);
	}


	//adding grid function ajax
	public function add_grid($mode = 'create'){

		$mode = (isset($mode)) ? $mode : 'create';

		$gridTitle = $this->input->post('gTitle',true);
		$gridType = $this->input->post('gType',true);
		$gridBGColor = $this->input->post('BGColor',true);
		$gridFF = $this->input->post('gFont',true);
		$gridImageThumb = $this->input->post('gImageThumbnail',true);

		$user_id = $this->session->userdata('user_data')['user_id'];

		$resArr['status'] = "error";
		$resArr['message'] = "Don't Miss any data";

		if ($gridTitle && $gridType && $gridBGColor && $gridFF) {

			$file_path = "./uploads/grids";

			$data = array(
				'user_id' => $user_id,
				'grid_name' => $gridTitle, 
				'grid_arrangement' => $gridType, 
				'grid_color' => $gridBGColor, 
				'grid_font' => $gridFF, 
				'grid_image' => "",					
	   			'grid_slug' => strtolower($this->__create_slug($gridTitle)),
			);

			switch (strtolower($mode)) {
				case 'create':		

					if(isset($_FILES['gImage'])){
						$result = $this->__upload_file($file_path,"gImage");
						if($result['status'] === "error"){
							$resArr['message'] = $result['error'];
						}else{
							$data['grid_image'] = $file_path.'/'.$result['data']['file_name'];
 						}
					}					
					$func_name = "add_grid";

					break;

				case 'update':
					$func_name = "update_grid";
					$data['grid_id'] = $this->input->post('gId',true);
					if(!$gridImageThumb && isset($_FILES['gImage'])){
						$result = $this->__upload_file($file_path,"gImage");
						if($result['status'] === "error"){
							$resArr['message'] = $result['error'];
						}else{
							$data['grid_image'] = $file_path.'/'.$result['data']['file_name'];
 						}
					}else{
						$data['grid_image'] = ($gridImageThumb) ? $gridImageThumb : '' ;
					}
					break;
				
			}// End of switch

			$this->load->model('admin/grid_model');
			if($gID = $this->grid_model->$func_name($data)){
				$resArr['status'] = "ok";
				$resArr['message'] = "Grid Updated Successfully";
				$resArr['grid_id'] = $gID;
			}else{
				//unlink($file_path.'/'.$result['data']['file_name']);
				$resArr['message'] = "Please try again";
			}
		
		}

		echo json_encode($resArr);
	}

	public function getAllGrids(){
		$this->load->model('admin/grid_model');
		echo json_encode($this->grid_model->getAllGrids($this->session->userdata('user_data')['user_id']));
	}
	public function getGrid($grid_id = ""){
		$resArr['status'] = "error";
		$resArr['message'] = "No Grid found, Try to add a new Grid";
		if($grid_id!=''){
			$this->load->model('admin/grid_model');
			$result = $this->grid_model->getGrid($this->session->userdata('user_data')['user_id'], $grid_id);
			//var_dump($result);
			if($result && count($result) >= 1){
				$resArr['status'] = "ok";
				unset($resArr['message']);
				$resArr['data'] = $result[0];
			}
		}
		echo json_encode($resArr);
	}
	public function publish(){
		$resArr['status'] = "error";
		$resArr['message'] = "pls try again";

		$gridId = $this->input->post('gridID',true);
		$publishStat = $this->input->post('publishStatus',true);

		if($gridId != "" && ($publishStat == 'Y' || $publishStat == 'N') && $publishStat != ""){
			//echo "going into";
			$this->load->model('admin/grid_model');
			if($result = $this->grid_model->publish($this->session->userdata('user_data')['user_id'], $gridId,$publishStat)){
				$resArr['status'] = "ok";
			}else{
				$resArr['message'] = "No data available";
			}
		}

		echo json_encode($resArr);
	}
}