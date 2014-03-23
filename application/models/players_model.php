<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Players_model extends CI_Model {
   function __construct() {
       parent::__construct();
   }

   public function get_top_batsmen() {
       	$this->db->SELECT ('d.lname as Batsman, sum(a.score) as totRuns');
       	$this->db->FROM ('batsman a');
		$this->db->inner join innings b
		$this->db->on a.innsid = b.innsid
		$this->db->inner join matches c
		$this->db->on b.matchid = c.matchid
		$this->db->inner join persons d
		$this->db->on a.personid = d.personid
		$this->db->where c.matchdate >= '2007-01-01'
		$this->db->group by d.lname
		$this->db->order by totRuns desc
		$this->db->limit 5
   } 
   
   public function get_match_innings() {
   		$this->db->select('*');
   		$this->db->from('batsman');
   		$this->db->where('innsid',45);
   	
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

}
