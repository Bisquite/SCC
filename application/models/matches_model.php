<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Matches_model extends CI_Model {
   function __construct() {
       parent::__construct();
   }

   public function get_matches_by_year() {
       $query = "select * from matches where matchid = 49";
       $result = $this->db->query($query);
       return $result->result();
   } 
   
   public function get_match_innings() {
   		//$this->db->select('*');
   		//$this->db->from('batsman');
   		//$this->db->where('innsid',45);
   		$query = "select * from batsman where innsid = 49";
   		$result = $this->db->query($query);
   		return $result->result();
   	
   }
   
   
   public function get_match_2() {
   		$this->db->select('*');
   		$this->db->from('matches');
   		$this->db->where('matchid', 2);
   		return $this->db->get();
   }
   

    public function process_create_match($data) {
       if ($this->db->insert('matches', $data)) {
       	return true;
       } else {
       	return false;
       }
   }
   /*
   public function process_update_user($id, $data) {
       $this->db->where('id', $id);
       if ($this->db->update('users', $data)) {
           return true;
       } else {
           return false;
       }
   }
*/
   
/*
   public function delete_user($id) {
       $this->db->where('id', $id);
       if ($this->db->delete('users')) {
           return true;
       } else {
           return false;
       }
   }
   
   */
}
