<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {
   function __construct() {
       parent::__construct();
       $this->load->helper('form');
       $this->load->helper('url');
       $this->load->helper('security');
       $this->load->model('Calendar_model');
   	   $this->load->database();
   	   
   	   $sections = array(
   	   		'config'  => TRUE,
   	   		'queries' => TRUE
   	   );
   	   
   	   $this->output->set_profiler_sections($sections);
   }
   
   public function index() {
       redirect('club/club_history');
   } 
   
   
   /* ------------------------------------------
    * View diary events
   * ------------------------------------------*/
   public function view_calendar() {
   	$data['query'] = $this->News_model->get_recent_news();
   	$this->load->view ('header');
   	$this->load->view('news/view_recent_news', $data);
   	$this->load->view ('footer');
   }
   
   
   /* ------------------------------------------
    * Create event in the calendar
    * ------------------------------------------*/
  
   public function enter_calendar_event() {
   	 
   	// Load support assets
   	$this->load->library('form_validation');
   	$this->form_validation->set_error_delimiters('', '<br />');
   	 
   	// Set validation rules
   	$this->form_validation->set_rules('headline_text', 'Headline text', 'required|min_length[1]|max_length[400]');
   	$this->form_validation->set_rules('content_text', 'Second inns no of players', 'required|min_length[1]|max_length[50000]');
   	 
   	if ($this->input->post()) {
   		$news_id = $this->input->post('news_id');
   	} else {
   		$news_id = $this->uri->segment(3);
   	}
   	 
   	 
   	// Begin validation
   	if ($this->form_validation->run() == FALSE) { // First load, or problem with form
   		$data['headline_text'] = array('name' => 'headline_text', 'value' => set_value('headline_text', 'Sample headline'));
   		$data['content_text'] = array('name' => 'content_text', 'value' => set_value('content_text', 'Sample content'));
 		
   		// Load data model for news dropdown lists
   		$data['q_news_category_dropdown'] = $this->News_model->get_news_category_dropdown($news_id);
   		 
   
   		// Load views
   		$this->load->view ('header');
   		$this->load->view ('news/enter_news', $data);
   		$this->load->view ('footer');
   
   	} else { 
   		// Validation passed, now escape the data and put into an array
   		$data = array(
   				'news_category_id' => $this->input->post('news_category_id'),
   				'headline_text' => $this->input->post('headline_text'),
   				'content_text' => $this->input->post('content_text'),
   				'news_created_date' => date('Y-m-d H:i:s')
   		);
   		 
   		
   		if ($this->News_model->process_create_news($data)) {
   			redirect('news/create_news_confirm'. $data);
   		}
   	}
   	 
   	 
   }
   

   
}