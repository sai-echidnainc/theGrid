<?php
class Home_Model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function getAllPublishedGrids(){		
		$sql = "SELECT DISTINCT g.grid_id, (SELECT COUNT(c.card_id) FROM cards AS c WHERE c.grid_id = g.grid_id ) AS COUNT, g.grid_creation_time AS createdDate, g.grid_slug AS slug, g.grid_name AS title, g.grid_image as image
				FROM grids AS g
				LEFT JOIN cards AS c
				ON g.grid_id = c.grid_id WHERE g.is_published = 'Y'";

		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getPublishedcards($theSlug){
		if($theSlug == "")
			return false;
		$sql = "SELECT * FROM cards AS c INNER JOIN grids AS g ON g.grid_id = c.grid_id WHERE g.grid_slug = '$theSlug' AND g.is_published = 'Y' ORDER BY grid_creation_time DESC";

		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function getCards($theSlug){
		if($theSlug == "")
			return false;
		$sql = "SELECT * FROM cards AS c INNER JOIN grids AS g ON g.grid_id = c.grid_id WHERE g.grid_slug = '$theSlug' ORDER BY grid_creation_time DESC";

		$query = $this->db->query($sql);
		return $query->result_array();
	}
 	public function getTitle($slug){
 		if($slug == "")
		return false;
		$sql = "SELECT grid_name AS title FROM grids WHERE grid_slug = '$slug'";

		$query = $this->db->query($sql);
		return $query->result_array();
 	}
}
?>