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
   
   public function view_matches_by_year() {        
       $data['query'] = $this->Matches_model->get_matches_by_year();
       $this->load->view('matches/view_matches_by_year', $data);
   }
   
   public function view_match_innings() {
   	$data['query'] = $this->Matches_model->get_match_innings();
   	$this->load->view('matches/view_match_innings', $data);
   }

   public function view_match_2() {
   	$data['query'] = $this->Matches_model->get_match_2();
   	$this->load->view('matches/view_match_2', $data);
   }
  
}