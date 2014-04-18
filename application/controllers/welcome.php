<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Welcome extends CI_Controller {
	
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * http://example.com/index.php/welcome
	 * - or -
	 * http://example.com/index.php/welcome/index
	 * - or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * 
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	
	function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->database();
	}
		
	public function index() {
		
		$this->load->model('Players_model');
		$data['q_top_batsmen_1sts'] = $this->Players_model->get_top_batsmen_1sts();
		$data['q_top_batsmen_2nds'] = $this->Players_model->get_top_batsmen_2nds();
		$data['q_top_batsmen_sun'] = $this->Players_model->get_top_batsmen_sun();
		
		$data['q_top_bowlers_1sts'] = $this->Players_model->get_top_bowlers_1sts();
		$data['q_top_bowlers_2nds'] = $this->Players_model->get_top_bowlers_2nds();
		$data['q_top_bowlers_sun'] = $this->Players_model->get_top_bowlers_sun();
		
		$data['q_top_fielders_1sts'] = $this->Players_model->get_top_fielders_1sts();
		$data['q_top_fielders_2nds'] = $this->Players_model->get_top_fielders_2nds();
		$data['q_top_fielders_sun'] = $this->Players_model->get_top_fielders_sun();
		
		
		/** Load views **/
		$this->load->view ('header');
		$this->load->view ('body', $data);
		$this->load->view ('footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */