<?php
class Card_Model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function delete_card($cId, $user_id){

		$sql = "SELECT c.card_id FROM cards AS c
			INNER JOIN grids AS g
			ON g.grid_id = c.grid_id WHERE g.user_id = $user_id AND c.card_id = $cId";
		$query = $this->db->query($sql);
		$resArry = $query->result_array();
		if (count($resArry) >= 1) {
				//var_dump($resArry);
				return $this->db->delete('cards', array('card_id' => $resArry[0]['card_id']));
		}
		return false;		
	}

	public function add_card($data){
		$user_id = $data['user_id'];
		$grid_id = $data['grid_id'];
		$data = array(
		   'grid_id' => $data['grid_id'],
		   'card_type' => $data['card_type'],
		   'card_size' => $data['card_Size'],
		   'card_name' => $data['card_Name'],
		   'card_url' => $data['card_Link'],
		   'card_description' => $data['card_Desc'],
		   'overlay_color' => $data['card_OverColor'],
		   'text_color' => $data['card_ForeColor'],
		   'card_slug' => $data['card_slug'],
		   'card_image' => (isset($data['card_image'])) ? $data['card_image'] : ''
		);

		$sql = "SELECT g.grid_id FROM grids AS g
			INNER JOIN cards AS c
			ON g.grid_id = c.grid_id WHERE g.user_id = $user_id AND g.grid_id = $grid_id";
		$query = $this->db->query($sql);
		$resArry = $query->result_array();
		if (count($resArry) >= 1) {				
			$this->db->insert('cards', $data); 
			$insert_id = $this->db->insert_id();
			if($insert_id)
				return true;
		}
		return false;
	}

	public function update_card($data){
		if(!$data['card_id'] || $data['card_id'] == "")
			return false;

		$card_id = $data['card_id'];
		$user_id = $data['user_id'];
		$grid_id = $data['grid_id'];
		$data = array(
		   'grid_id' => $data['grid_id'],
		   'card_type' => $data['card_type'],
		   'card_size' => $data['card_Size'],
		   'card_name' => $data['card_Name'],
		   'card_url' => $data['card_Link'],
		   'card_description' => $data['card_Desc'],
		   'overlay_color' => $data['card_OverColor'],
		   'text_color' => $data['card_ForeColor'],
		   'card_slug' => $data['card_slug'],
		   'card_image' => (isset($data['card_image'])) ? $data['card_image'] : ''
		);
		
		
		$sql = "SELECT g.grid_id FROM grids AS g
			INNER JOIN cards AS c
			ON g.grid_id = c.grid_id WHERE g.user_id = $user_id AND g.grid_id = $grid_id;";
		$query = $this->db->query($sql);
		$resArry = $query->result_array();
		if (count($resArry) >= 1) {	
			$this->db->where('card_id', $card_id);
			$this->db->update('cards', $data); 
			if($this->db->affected_rows() > 0)
				return true;
		}
		return false;
	}

	public function getAllCards($user_id, $grid_id){
		$sql = " SELECT c.card_id, c.card_type AS type, c.card_size AS size, c.card_url AS link, c.card_name AS title, c.card_description AS description, c.overlay_color AS bgcolor, c.text_color AS fgcolor, c.card_image AS image, c.card_slug AS slug FROM cards AS c
			INNER JOIN grids AS g
			ON g.grid_id = c.grid_id WHERE g.user_id = $user_id AND g.grid_id = $grid_id";
		$query = $this->db->query($sql);
		$resArry = $query->result_array();
		if (count($resArry) >= 1) {	
			return $resArry;
		}
		return false;
	}

}