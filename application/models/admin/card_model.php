<?php
class Card_Model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function delete_card($cId, $user_id){

		return $this->db->where(array('g.grid_id' => 'c.grid_id', 'g.user_id' => $user_id ,'c.card_id'=> $cId ))
				 ->join('grids as g', 'g.grid_id = c.grid_id')
				 ->delete('cards as c');

	}

}