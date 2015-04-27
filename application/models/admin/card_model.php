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
				var_dump($resArry);
				return $this->db->delete('cards', array('card_id' => $resArry[0]['card_id']));
		}
		return false;		
	}

}