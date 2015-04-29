<?php
class Grid_Model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function getAllGrids($userID){
		// $this->db->select('DISTINCT grids.grid_id, (SELECT COUNT(cards.card_id) FROM cards WHERE cards.grid_id = grids.grid_id ) AS COUNT');
		// $this->db->from('grids');
		// $this->db->join('cards', 'grids.grid_id = cards.grid_id', 'left');
		// $this->db->where('grids.user_id', $userID);
		// $query = $this->db->get();

		$sql = "SELECT DISTINCT g.grid_id, (SELECT COUNT(c.card_id) FROM cards AS c WHERE c.grid_id = g.grid_id ) AS COUNT, g.grid_creation_time AS createdDate, g.grid_slug AS slug, g.grid_name AS title, g.grid_image as image
				FROM grids AS g
				LEFT JOIN cards AS c
				ON g.grid_id = c.grid_id WHERE g.user_id = $userID;";

		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function delete_grid($gId, $user_id){
		$this->db->delete('cards', array('grid_id' => $gId));
		return $this->db->delete('grids', array('grid_id' => $gId, 'user_id' => $user_id)); 
	}

	public function viewCards($gId, $user_id){
		$sql = "SELECT *
				FROM grids AS g
				LEFT JOIN cards AS c
				ON g.grid_id = c.grid_id WHERE g.user_id = $userID AND c.grid_id = $gId;";

		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function add_grid($data){
		$data = array(
		   'user_id' => $data['user_id'] ,
		   'grid_name' => $data['grid_name'] ,
		   'grid_arrangement' => $data['grid_arrangement'],
		   'grid_color' => $data['grid_color'],
		   'grid_font' => $data['grid_font'],
		   'grid_image' => $data['grid_image'],
		   'grid_slug' => $data['grid_slug'],
		);

		$this->db->insert('grids', $data); 
		$insert_id = $this->db->insert_id();
		if($insert_id)
			return $insert_id;
		return false;
	}

	public function update_grid($data){
		if(!$data['grid_id'])
			return false;
		$data2 = array(
		   'user_id' => $data['user_id'] ,
		   'grid_name' => $data['grid_name'] ,
		   'grid_arrangement' => $data['grid_arrangement'],
		   'grid_color' => $data['grid_color'],
		   'grid_font' => $data['grid_font'],
		   'grid_image' => $data['grid_image'],
		   'grid_slug' => $data['grid_slug'],
		);
		unset($data2['grid_slug']);
		$this->db->where('grid_id', $data['grid_id']);
		$this->db->update('grids', $data2); 
		if($this->db->affected_rows() > 0)
			return true;
		return false;
	}

	public function getGrid($user_id,$grid_id){
		$sql = "SELECT * FROM grids AS g WHERE g.user_id = $user_id AND g.grid_id = $grid_id";
		//var_dump($sql);	
		$query = $this->db->query($sql);
		$resArry = $query->result_array();
		if (count($resArry) >= 1) {
			return $resArry;
		}
		return false;
	}

}
?>