<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {
   function __construct() {
       parent::__construct();
       $this->load->helper('form');
       $this->load->helper('url');
       $this->load->helper('security');
       $this->load->library('encrypt');
       $this->load->model('Users_model');
       $this->load->model('Players_model');
       $this->load->database();
   }
   
   public function index() {
       redirect('users/login');
   } 
   
   


   
   
   /* ------------------------------------------
    * New user registration
   * ------------------------------------------*/
   public function new_user() {
       // Load support assets
       $this->load->library('form_validation');
       $this->form_validation->set_error_delimiters('', '<br />');

       // Set validation rules
       $this->form_validation->set_rules('first_name', 'First Name', 'required|min_length[1]|max_length[125]');
       $this->form_validation->set_rules('last_name', 'Last Name', 'required|min_length[1]|max_length[125]');
       $this->form_validation->set_rules('screen_name', 'Screen Name', 'required|min_length[1]|max_length[20]');
       $this->form_validation->set_rules('email', 'Email', 'required|min_length[1]|max_length[255]|valid_email');
       $this->form_validation->set_rules('password1','Password','required|min_length[8]|max_length[20]'); 
       $this->form_validation->set_rules('password2','Confirmation Password','required|min_length[8]|max_length[20]|matches[password1]');
       

       // Begin validation
       if ($this->form_validation->run() == FALSE) { // First load, or problem with form
           $data['first_name']      = array('name' => 'first_name', 'id' => 'first_name', 'value' => set_value('first_name', ''), 'maxlength'   => '100', 'size' => '35');
           $data['last_name']       = array('name' => 'last_name', 'id' => 'last_name', 'value' => set_value('last_name', ''), 'maxlength'   => '100', 'size' => '35');
           $data['screen_name']     = array('name' => 'screen_name', 'id' => 'screen_name', 'value' => set_value('screen_name', ''), 'maxlength'   => '200', 'size' => '35');
           $data['email']           = array('name' => 'email', 'id' => 'email', 'value' => set_value('email', ''), 'maxlength'   => '100', 'size' => '35');
           $data['password1']       = array('name' => 'password1', 'id' => 'password1', 'value' => set_value('password1', ''), 'maxlength'   => '20', 'size' => '35');
           $data['password2']       = array('name' => 'password2', 'id' => 'password2', 'value' => set_value('password2', ''), 'maxlength'   => '20', 'size' => '35');
         

           // Load data for person drop down list
           $data['q_person_dropdown'] = $this->Players_model->get_person_dropdown();
           
           $this->load->view ('header');
           $this->load->view('users/new_user',$data);
           $this->load->view ('footer');
           
           
       } else { // Validation passed, now escape the data
       	
       	   $hash = $this->encrypt->sha1($this->input->post('password1'));
       	   
           $data = array(
               'first_name' => $this->input->post('first_name'),
               'last_name' => $this->input->post('last_name'),
           	   'screen_name' => $this->input->post('screen_name'),
               'email' => $this->input->post('email'),
           	   'person_id' => $this->input->post('person_id'),
           	   'password' => $hash,
           	   'is_active' => true,
           	   'created_date' => date('Y-m-d H:i:s', time()),
           	   'is_person_id_verified' => false
           );

           if ($this->Users_model->process_create_user($data)) {
               redirect('signin');
           } else {
               redirect('users');
           }
    }
   
}



/* ------------------------------------------
 * User admin management
* ------------------------------------------*/
 
	public function view_users() {
		$data['query'] = $this->Users_model->get_users();
		$this->load->view('users/view_users', $data);
	}

	public function edit_user() {
	       // Load support assets
	       $this->load->library('form_validation');
	       $this->form_validation->set_error_delimiters('', '<br />');
	
	       // Set validation rules
	       // Format: 
	       // set_rules (
	       			// Field - form field
	       			// , Label - human readable label, shown on failures
	       			// , Rules - string containing names of callbacks)
	       $this->form_validation->set_rules('first_name', 'First Name', 'required|min_length[1]|max_length[125]');
	       $this->form_validation->set_rules('last_name', 'Last Name', 'required|min_length[1]|max_length[125]');
	       $this->form_validation->set_rules('email', 'Email', 'required|min_length[1]|max_length[255]|valid_email');
	       $this->form_validation->set_rules('is_active', 'Is Active', 'min_length[1]|max_length[1]|integer|is_natural');
	
	       if ($this->input->post()) {
	           $id = $this->input->post('user_id');
	       } else {
	           $id = $this->uri->segment(3); 
	       }
	       
	               
	       // Begin validation
	       if ($this->form_validation->run() == FALSE) { // First load, or problem with form           
	               $query = $this->Users_model->get_user_details($id);
	               foreach ($query->result() as $row) {
	                   $first_name = $row->first_name;
	                   $last_name = $row->last_name;
	                   $email = $row->email;
	                   $is_active= $row->is_active;
	                   $user_id =$row->user_id;
	               }
	
	               $data['first_name']      = array('name' => 'first_name', 'id' => 'first_name', 'value' => set_value('first_name', $first_name), 'maxlength'   => '100', 'size' => '35');
	               $data['last_name']       = array('name' => 'last_name', 'id' => 'last_name', 'value' => set_value('last_name', $last_name), 'maxlength'   => '100', 'size' => '35');
	               $data['email']           = array('name' => 'email', 'id' => 'email', 'value' => set_value('email', $email), 'maxlength'   => '100', 'size' => '35');
	               $data['is_active']       = array('name' => 'is_active', 'id' => 'is_active', 'value' => set_value('is_active', $is_active), 'maxlength'   => '100', 'size' => '35');
	               $data['user_id']         = array('name' => 'user_id', 'value' => set_value('user_id', $user_id));
	
	               $this->load->view('users/edit_user', $data);
	           
	       } else { // Validation passed, now escape the data
	           $data = array(
	               'first_name' => $this->input->post('first_name'),
	               'last_name' => $this->input->post('last_name'),
	               'email' => $this->input->post('email'),
	               'is_active' => $this->input->post('is_active'),
	           );
	
	           if ($this->Users_model->process_update_user($user_id, $data)) {
	               redirect('users/view_users');
	           }
	       }
	}
   
   public function delete_user() {
       // Load support assets
       $this->load->library('form_validation');
       $this->form_validation->set_error_delimiters('', '<br />');

       // Set validation rules
       $this->form_validation->set_rules('user_id', 'User ID', 'required|min_length[1]|max_length[11]|integer|is_natural');

       if ($this->input->post()) {
           $user_id = $this->input->post('user_id');
       } else {
           $user_id = $this->uri->segment(3);
       }
           
       if ($this->form_validation->run() == FALSE) { // First load, or problem with form

           $data['query'] = $this->Users_model->get_user_details($user_id);

           $this->load->view('users/delete_user', $data);
       } else {
           if ($this->Users_model->delete_user($user_id)) {
               redirect('users/view_users');
           }
       }
   }
   

   
   /* ------------------------------------------
    * User login
   * ------------------------------------------*/
   
   public function login() {
   	if ($this->session->userdata('logged_in') == TRUE) {
   		redirect('users/loggedin');
   	} else {
   		$this->load->library('form_validation');
   
   		// Set validation rules for view filters
   		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|min_length[5]|max_length[125]');
   		$this->form_validation->set_rules('password', 'Password ', 'required|min_length[8]|max_length[20]');
   
   		if ($this->form_validation->run() == FALSE) {
   			$this->load->view ('header');   			
   			$this->load->view('users/login');
   			$this->load->view ('footer');
   		} else {
   			$email = $this->input->post('email');
   			$password = $this->input->post('password');
   
   			$query = $this->Users_model->does_user_exist($email);
   
   			if ($query->num_rows() == 1) { // One matching row found
   				foreach ($query->result() as $row) {
   
   					// Generate hash from a their password
   					$hash = $this->encrypt->sha1($password);
   
   					// Compare the generated hash with that in the database
   					if ($hash != $row->password) {
   						// Didn't match so send back to login
   						$data['login_fail'] = true;
   						$this->load->view ('header');
   						$this->load->view('users/login', $data);
   						$this->load->view ('footer');
   					} else {
   						$data = array(
   								'user_id' => $row->user_id,
   								'email' => $row->email,
   								'logged_in' => TRUE
   						);
   
   						// Save data to session
   						$this->session->set_userdata($data);
   						redirect('users/loggedin');
   					}
   				}
   			}
   		}
   	}
   }
   
   function loggedin() {
   	if ($this->session->userdata('logged_in') == TRUE) {
   		$this->load->view ('header');
   		$this->load->view('users/loggedin');
   		$this->load->view ('footer');
   	} else {
   		redirect('login');
   	}
   }
   
   public function forgot_password() {
   	$this->load->library('form_validation');
   	$this->form_validation->set_rules('email', 'Email', 'required|valid_email|min_length[5]|max_length[125]');
   
   	if ($this->form_validation->run() == FALSE) {
   		$this->load->view ('header');
   		$this->load->view('users/forgot_password');
   		$this->load->view ('footer');
   	} else {
   		$email = $this->input->post('email');
   
   		$this->db->where('email', $email);
   		$this->db->from('users');
   		$num_res = $this->db->count_all_results();
   
   		if ($num_res == 1) {
   			// Make a small string (code) to assign to the user to
   			// indicate they've requested a change of password
   			$code = mt_rand('5000', '200000');
   			$data = array(
   					'forgot_password' => $code,
   			);
   
   			$this->db->where('email', $email);
   			if ($this->db->update('users', $data)) { // Update okay, send email
   				$url = "http://www.domain.com/signin/new_password/".$code;
   				$body = "\nPlease click the following link to reset your password:\n\n".$url."\n\n";
   				if (mail($email, 'Password reset', $body, 'From: no-reply@domain.com')) {
   					$data['submit_success'] = true;
   					$this->load->view ('header');
   					$this->load->view('users/signin', $data);
   					$this->load->view ('footer');
   				}
   			} else {
   				// Some sort of error happened, redirect user back to form
   				redirect('users/forgot_password');
   			}
   		} else { // Some sort of error happened, redirect user back to form
   			redirect('users/forgot_password');
   		}
   	}
   }
   
   public function new_password() {
   	$this->load->library('form_validation');
   	$this->form_validation->set_rules('code', 'Code', 'required|min_length[4]|max_length[7]');
   	$this->form_validation->set_rules('email', 'Email', 'required|valid_email|min_length[5]|max_length[125]');
   	$this->form_validation->set_rules('password1', 'Password', 'required|min_length[5]|max_length[15]');
   	$this->form_validation->set_rules('password2', 'Confirmation Password', 'required|min_length[5]|max_length[15]|matches[password1]');
   
   	// Get Code from URL or POST and clean up
   	if ($this->input->post()) {
   		$data['code'] = xss_clean($this->input->post('code'));
   	} else {
   		$data['code'] = xss_clean($this->uri->segment(3));
   	}
   
   	if ($this->form_validation->run() == FALSE) {
   		$this->load->view ('header');
   		$this->load->view('users/new_password', $data);
   		$this->load->view ('footer');
   	} else {
   		// Does code from input match the code against the email
   		$email = xss_clean($this->input->post('email'));
   		if (!$this->Users_model->does_code_match($data['code'], $email)) { // Code doesn't match
   			redirect ('users/forgot_password');
   		} else {  // Code does match
   			$hash = $this->encrypt->sha1($this->input->post('password1'));
   
   			$data = array(
   					'password' => $hash
   			);
   
   			if ($this->Users_model->update_user($data, $email)) {
   				redirect ('login');
   			}
   		}
   	}
   }


}