<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Players extends CI_Controller {
   function __construct() {
       parent::__construct();
       $this->load->helper('form');
       $this->load->helper('url');
       $this->load->helper('security');
       $this->load->model('Players_model');
   	   $this->load->database();
   }
   
   public function index() {
       redirect('players/view_top_batsmen');
   } 
   
   public function view_top_batsmen() {
   	$data['query'] = $this->Players_model->get_top_batsmen_1sts();
   	$this->load->view('players/view_top_batsmen', $data);
   }
   
   public function view_top_bowlers() {
   	$data['query'] = $this->Players_model->get_top_bowlers();
   	$this->load->view('players/view_top_bowlers', $data);
   }
    
   public function view_top_players() {
   	$data['qTopBatsmen'] = $this->Players_model->get_top_batsmen();
   	$data['qTopBowlers'] = $this->Players_model->get_top_bowlers();
   	$this->load->view('players/view_top_players', $data);   
   }
   
}