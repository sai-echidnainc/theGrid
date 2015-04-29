<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Card extends CI_Controller {

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

	public function index(){
		redirect('/admin');
	}

	public function delete($cardId = ""){

		$result_arr = array('status'=>'error','message'=>'No records found on the id');
		if(isset($cardId) && $cardId != ""){
			$this->load->model('admin/card_model');
			$user_id = $this->session->userdata('user_data')['user_id'];
			if($this->card_model->delete_card($cardId,$user_id)){
				$result_arr['status'] = "ok";
				$result_arr['message'] = "Successfully deleted";
			}
		}
		echo json_encode($result_arr);

	}

	public function add_card($mode = 'create'){

		$mode = (isset($mode)) ? $mode : 'create';

		$cType = $this->input->post('cType',true);
		$cSize = $this->input->post('cSize',true);
		$cName = $this->input->post('cName',true);
		$cLink = $this->input->post('cLink',true);
		$cDesc = $this->input->post('cDesc',true);
		$cOverColor = $this->input->post('cOverColor',true);
		$cForeColor = $this->input->post('cForeColor',true);
		$gID = $this->input->post('gId',true);
		$imgThumb = $this->input->post('cImageThumbnail',true);;

		$resArr['status'] = "error";
		$resArr['message'] = "Don't Miss any data";

		if ($cType && $cSize && $cName && $cLink && $cDesc && $cOverColor && $cForeColor && $gID) {
			
			// $file_path = "./uploads/cards";
			// $result = $this->__upload_file($file_path,"cImage");

			$this->load->model('admin/card_model');

			$data['user_id'] = $this->session->userdata('user_data')['user_id'];
			$data['card_type'] = $cType;
			$data['card_Size'] = $cSize;
			$data['card_Name'] = $cName;
			$data['card_Link'] = $cLink;
			$data['card_Desc'] = $cDesc;
			$data['card_OverColor'] = $cOverColor;
			$data['card_ForeColor'] = $cForeColor;
			$data['grid_id'] = $gID;
			$data['card_slug'] = strtolower($this->__create_slug($cName));

			$funcName = "add_card";

			switch ($cType) {
				case 'text':
					
					break;
				case 'image':
					if($imgThumb){
						$data['card_image'] = $imgThumb;
						break;
					}

					$file_path = "./uploads/cards";
					$result = $this->__upload_file($file_path,"cImage");
					if($result['status'] == 'error'){
						$resArr['message'] = $result['error'];
						echo json_encode($resArr);
						return;
					}
					$data['card_image'] = $file_path.'/'.$result['data']['file_name'];
					break;
			}
			
			if($mode != '' && strtolower($mode) == 'update'){
				$funcName = "update_card";
				$data['card_id'] = $this->input->post('cId',true);
			}
			
			if($card_id = $this->card_model->$funcName($data)){
					$resArr['status'] = "ok";
					$resArr['message'] = "Card Created Successfully";
					$resArr['card_id'] = $card_id;
				}else{
					$resArr['message'] = "Please try again";
				}
		}
		echo json_encode($resArr);
	}

	public function getCards($grid_id = ""){
		$resArr['status'] = "error";
		$resArr['message'] = "Don't Miss any data";

		if($grid_id != ""){
			$this->load->model('admin/card_model');
			if($cardD = $this->card_model->getAllCards($this->session->userdata('user_data')['user_id'],$grid_id)){
				$resArr['status'] = "ok";
				unset($resArr['message']);
				$resArr['data'] = $cardD;
			}
		}

		echo json_encode($resArr);
	}

}