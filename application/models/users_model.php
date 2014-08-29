<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model {
   function __construct() {
       parent::__construct();
   }

   public function get_users() {
       return $this->db->get('users');
   } 

   public function process_create_user($data) {
       if ($this->db->insert('users', $data)) {
       	return true;
       } else {
       	return false;
       }
   }
   
   public function process_update_user($user_id, $data) {
       $this->db->where('user_id', $user_id);
       if ($this->db->update('users', $data)) {
           return true;
       } else {
           return false;
       }
   }
   

   public function get_user_details($user_id) {
       $this->db->where('user_id', $user_id);
       return $this->db->get('users');
   }    

   public function delete_user($user_id) {
       $this->db->where('user_id', $user_id);
       if ($this->db->delete('users')) {
           return true;
       } else {
           return false;
       }
   }
   
   
   /* ------------------------------------------
    * User login queries & checks
   * ------------------------------------------*/
   public function update_user($data, $email) {
   	$this->db->where('email', $email);
   	$this->db->update('users', $data);
   }
   
   
   public function does_user_exist($email) {
   		$this->db->where('email', $email);
   		$query = $this->db->get('users');
   	return $query;
   }
   
   
   public function does_email_exist($email) {
   	$this->db->where('email', $email);
   	$this->db->from('users');
   	$num_res = $this->db->count_all_results();
   	if ($num_res == 1) {
   		return TRUE;
   	} else {
   		return FALSE;
   	}
   }

   
   public function does_code_match($code, $email) {
   	$this->db->where('email', $email);
   	$this->db->where('forgot_password', $code);
   	$this->db->from('users');
   	$num_res = $this->db->count_all_results();
   
   	if ($num_res == 1) {
   		return TRUE;
   	} else {
   		return FALSE;
   	}
   }

}