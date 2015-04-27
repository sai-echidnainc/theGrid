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

	public function index(){
		redirect('/admin');
	}

	public function delete($cardId){

		$result_arr = array('status'=>'error','message'=>'No records found on the id');
		if(isset($cardId)){
			$this->load->model('admin/card_model');
			$user_id = $this->session->userdata('user_data')['user_id'];
			if($this->card_model->delete_card($cardId,$user_id)){
				$result_arr['status'] = "ok";
				$result_arr['message'] = "Successfully deleted";
			}
		}
		echo json_encode($result_arr);

	}

	public function add_card($grid_id, $data){
		$data = array(
		   'grid_id' => $grid_id ,
		   'card_type' => $data['card_type'] ,
		   'card_size' => $data['card_size'],
		   'card_url' => $data['card_url'],
		   'card_name' => $data['card_name'],
		   'card_description' => $data['card_description'],
		   'overlay_color' => $data['overlay_color'],
		   'text_color' => $data['text_color'],
		   'card_image' => $data['card_image'],
		   'card_slug' => $data['card_slug']
		);

		$this->db->insert('cards', $data); 
		$insert_id = $this->db->insert_id();
		if($insert_id)
			return true;
		return false;
	}


}