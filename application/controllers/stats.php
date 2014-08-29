<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stats extends CI_Controller {
   function __construct() {
       parent::__construct();
       $this->load->helper('form');
       $this->load->helper('url');
       $this->load->helper('security');
       $this->load->model('Stats_model');
       $this->load->model('Matches_model');
   	   $this->load->database();
   }
   
   public function index() {
       redirect('stats/view_stats');
   } 
   
   
   /* ------------------------------------------
    * Viewing stats
   * ------------------------------------------*/
   public function view_stats() {
   	if ($this->input->post()) {
   		$year = $this->input->post('year');
   		$teamid = $this->input->post('team_id');
   	} else {
   		$year = date("Y") - 6;
   		$teamid = 1;			// default to 1st team when page first loaded
   	}
   
   	
   	$data['q_match_years'] = $this->Matches_model->get_match_years();
   	$data['q_home_club_team_dropdown'] = $this->Matches_model->get_home_club_team_dropdown();
   	
   	$data['q_batsman_stats_by_year_team'] = $this->Stats_model->get_batsman_stats_by_year_team($year,$teamid);
   	$data['q_bowler_stats_by_year_team'] = $this->Stats_model->get_bowler_stats_by_year_team($year,$teamid);
   	$data['q_fielder_stats_by_year_team'] = $this->Stats_model->get_fielder_stats_by_year_team($year,$teamid);
   	$this->load->view ('header');
   	$this->load->view('stats/view_stats', $data);
   	$this->load->view ('footer');
   	
   	
   }

   
}