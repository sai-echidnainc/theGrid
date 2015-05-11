<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['templet_URL'] = "home";
		$data['page_title'] = "The Grid - EchidnaLabs";
		$this->load->model('home_model');
		$data['navigation'] = true;
		$data['grids'] = $this->home_model->getAllPublishedGrids();
		$this->load->view('base',$data);
	}
	public function detailpage(){
		$data['templet_URL'] = "gridDetail";
		$this->load->view('base',$data);
	}
	public function preview($theSlug = ""){
		$funcName = 'getPublishedcards';
		$userId = "";
		if(isset($_GET['mode']) && $_GET['mode'] == 'admin'){
			$funcName = 'getCards';
		}
		$this->load->model('home_model');
		$data['cards'] = $this->home_model->$funcName($theSlug);
		// if(count($data['cards']) <= 0){
		// 	show_404();
		// 	die();
		// }		
		if(count($data['cards']) > 0 && $data['cards'][0]['grid_arrangement'] == 'random' ){
			shuffle($data['cards']);
		}
		//echo json_encode($cards);
		$data['templet_URL'] = "gridDetail";
		$data['page_title'] = $this->home_model->getTitle($theSlug)[0]['title'];
		$this->load->view('base',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */