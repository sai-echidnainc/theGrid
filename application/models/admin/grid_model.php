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

		$sql = "SELECT DISTINCT g.grid_id, (SELECT COUNT(c.card_id) FROM cards AS c WHERE c.grid_id = g.grid_id ) AS COUNT, g.grid_creation_time AS createdDate, g.grid_slug AS slug, g.grid_name AS title
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

}
?>