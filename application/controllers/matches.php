<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Matches extends CI_Controller {
   function __construct() {
       parent::__construct();
       $this->load->helper('form');
       $this->load->helper('url');
       $this->load->helper('security');
       $this->load->model('Matches_model');
   	   $this->load->database();
   }
   
   public function index() {
       redirect('matches/view_matches_by_year');
   } 
   
   /* ------------------------------------------
    * Date validation callback
    * @param string $input
    * @return boolean
   * ------------------------------------------*/
   public function date_validation($input) {
   	$input_date = explode('/', $input);
   	if (!@checkdate($input_date[1], $input_date[0], $input_date[2])) {		// swapped 1 and 2 round for English format
   		$this->form_validation->set_message('date_validation','The %s field must be in the format DD/MM/YYYY'.$input.' 0: '.$input_date[0].' 1: '.$input_date[1].' 2: '.$input_date[2]);
   		return false;
   	}
	return true;
   }
   
   public function view_matches_by_year() {        
       $data['query'] = $this->Matches_model->get_matches_by_year();
       $data['query_50'] = $this->Matches_model->get_matches_by_year_50();
       $this->load->view('matches/view_matches_by_year', $data);
   }
   
   public function view_match_innings() {
   	$data['query'] = $this->Matches_model->get_match_innings();
   	$this->load->view('matches/view_match_innings', $data);
   }

   public function view_scorecard() {
   	$data['query'] = $this->Matches_model->get_scorecard($match_id);
   	$this->load->view('matches/view_scorecard', $data);
   }
   

   
   /* ------------------------------------------
    * Create new match
    * ------------------------------------------*/
   
   public function new_match() {
   	
   	// Load support assets
   	$this->load->library('form_validation');
   	$this->form_validation->set_error_delimiters('', '<br />');
   	 
   	// Set validation rules
   	$this->form_validation->set_rules('match_date', 'Match date', 'required|callback_date_validation');
   	$this->form_validation->set_rules('match_time', 'Match time', 'min_length[5]|max_length[5]|');
   	$this->form_validation->set_rules('allow_draws_flag', 'Allow Draws Flag', 'min_length[1]|max_length[1]|integer|is_natural');
   
   	
   	 
   	// Begin validation
   	if ($this->form_validation->run() == FALSE) { // First load, or problem with form
   		$data['match_date'] = array('name' => 'match_date', 'id' => 'match_date', 'value' => set_value('match_date', ''), 'maxlength'   => '100', 'size' => '35');
   		$data['match_time'] = array('name' => 'match_time', 'id' => 'match_time', 'value' => set_value('match_time', ''), 'maxlength'   => '100', 'size' => '35');
   		$data['allow_draws_flag'] = array('name' => 'allow_draws_flag', 'id' => 'allow_draws_flag', 'value' => set_value('allow_draws_flag', ''));
   		 
	  	// Load data model for team dropdown lists
	   	$data['q_team_dropdown'] = $this->Matches_model->get_team_dropdown();
	   	$data['q_ground_dropdown'] = $this->Matches_model->get_ground_dropdown();
	   	$data['q_match_type_dropdown'] = $this->Matches_model->get_match_type_dropdown();
	   	$data['q_match_format_dropdown'] = $this->Matches_model->get_match_format_dropdown();
	   	
	   	// Load views
	   	$this->load->view ('header');
	   	$this->load->view ('matches/new_match', $data);
	   	$this->load->view ('footer');
   		
   	} else { 
   		// Validation passed, now escape the data and put into an array
   		$data = array(
   				'match_date' => $this->input->post('match_date'),
   				'match_time' => $this->input->post('match_time'),
   				'ground_id' => $this->input->post('ground_id')
   		);
   		 
   		//$this->load->view ('matches/new_match_confirm', $data);
   		
   		if ($this->Matches_model->process_create_match($data)) {
   			redirect('matches/new_match_confirm'. $data);
   		}
   	}
   
   	
   }
 
   

}