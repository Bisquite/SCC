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
   
   
   /* ------------------------------------------
    * Viewing matches and scorecards
   * ------------------------------------------*/
   public function view_matches() {  
   	if ($this->input->post()) {
   		$year = $this->input->post('year');
   	} else {
   		$year = date("Y") - 6;
   	}
   	      
       $data['q_matches_by_year'] = $this->Matches_model->get_matches_by_year($year);
	   $this->load->view ('header');
       $this->load->view('matches/view_matches', $data);
	   $this->load->view ('footer');
   }
   

   public function view_scorecard() {
   	$match_id = $this->uri->segment(3);
   	
   	$data['q_first_inns'] = $this->Matches_model->get_scorecard_first_inns($match_id);
   	$data['q_second_inns'] = $this->Matches_model->get_scorecard_second_inns($match_id);
   	
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
 
   
   /* ------------------------------------------
    * Enter new scorecard
   * ------------------------------------------*/
    
   public function enter_scorecard() {
   
   	// Load support assets
   	$this->load->library('form_validation');
   	$this->form_validation->set_error_delimiters('', '<br />');
   	 
   	// Set validation rules
   	$this->form_validation->set_rules('first_inns_no_of_players', 'Second inns no of players', 'greater_than[5]|less_than[15]|integer|is_natural');
   	$this->form_validation->set_rules('second_inns_no_of_players', 'Second inns no of players', 'greater_than[5]|less_than[15]|integer|is_natural');
   	 
   	if ($this->input->post()) {
   		$match_id = $this->input->post('match_id');
   	} else {
   		$match_id = $this->uri->segment(3);
   	}
   
   	 
   	// Begin validation
   	if ($this->form_validation->run() == FALSE) { // First load, or problem with form
   		$data['first_inns_no_of_players'] = array('name' => 'first_inns_no_of_players', 'value' => set_value('first_inns_no_of_players', 11));
   		$data['second_inns_no_of_players'] = array('name' => 'second_inns_no_of_players', 'value' => set_value('second_inns_no_of_players', 11));
   		//$data['match_time'] = array('name' => 'match_time', 'id' => 'match_time', 'value' => set_value('match_time', ''), 'maxlength'   => '100', 'size' => '35');
   		//$data['allow_draws_flag'] = array('name' => 'allow_draws_flag', 'id' => 'allow_draws_flag', 'value' => set_value('allow_draws_flag', ''));
   
   		// Load data model for team dropdown lists
   		$data['q_match_teams_dropdown'] = $this->Matches_model->get_match_teams_dropdown($match_id);
   		$data['q_match_details'] = $this->Matches_model->get_match_details($match_id);
   		
   	  
   		// Load views
   		$this->load->view ('header');
   		$this->load->view ('matches/enter_scorecard', $data);
   		$this->load->view ('footer');
   		 
   	} else {
   		// Validation passed, now escape the data and put into an array
   		$data = array(
   				'match_date' => $this->input->post('match_date'),
   		);
   
   		//$this->load->view ('matches/new_match_confirm', $data);
   		 
   		//if ($this->Matches_model->process_create_match($data)) {
   			//redirect('matches/new_match_confirm'. $data);
   		//}
   	}
   	 
   
   }
   
    
   
    

}