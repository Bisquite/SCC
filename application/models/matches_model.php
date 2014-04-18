<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Matches_model extends CI_Model {
   function __construct() {
       parent::__construct();
   }

   /* Create matches */
   public function process_create_match($data) {
   	$query = 'insert into matches (
   			  '
   	if ($this->db->insert('matches', $data)) {
   		return true;
   	} else {
   		return false;
   	}
   }
   
   /* ------------------------------------------
    * Dropdown lists
    * ------------------------------------------*/
   
   public function get_team_dropdown() {
   	$query = "
			select team_id, team_name 
			from teams
			where club_id = 1
			union
			select team_id, team_name
			from 
			(
			select team_id, team_name 
			from teams
			where club_id <> 1
			order by team_name
   			) as s";
   	return $this->db->query($query);
   }
   
   
   public function get_ground_dropdown() {
   	$query = "
			select -1 as ground_id, '-- Team default --' as ground_name
   			union
   			select ground_id, ground_name
			from grounds";
   	return $this->db->query($query);
   }
   
   public function get_match_type_dropdown() {
   	$query = "
   			select match_type_id, concat(match_type_name,'  (', match_group_type_name, ')') as match_type_name
			from match_types";
   	return $this->db->query($query);
   }
   
   public function get_match_format_dropdown() {
   	$query = "
   			select match_format_id, match_format_name
			from match_formats";
   	return $this->db->query($query);
   }
   
   /* ----------------------------------------*/

   
   public function get_matches_by_year() {
       $query = "select * from matches where match_id = 49";
       return $this->db->query($query);
   } 
   
   public function get_matches_by_year_50() {
   		$query_50 = "select * from matches where match_id between 49 and 51";
   		return $this->db->query($query_50);
   }
   
   
   public function get_match_1st_innings() {
   	$query = "	select a.bat_order, initials_last_name as batsman, a.time_in, a.time_out, a.how_out, a.score, a.fours, a.sixes
   				from batsman a
				   inner join innings b
				   	on a.inns_id = b.inns_id
				   inner join matches c
				   	on b.match_id = c.match_id
				   inner join persons d
				   	on a.person_id = d.person_id
				   inner join teams e
				   	on b.bat_team_id = e.team_id
				   where c.match_id = 48
				   	and b.inns_num = 1
				order by a.bat_order";
   	return $this->db->query($query);
   }
   
   
   public function get_match_innings() {
   		$query = "select * from batsman where inns_id = 49";
   		return $this->db->query($query);
   	
   }
   
   
   public function get_scorecard($match_id) {
   	$query = "	select a.bat_order, initials_last_name as batsman, a.time_in, a.time_out, a.how_out, a.score, a.fours, a.sixes
   				from batsman a
				   inner join innings b
				   	on a.inns_id = b.inns_id
				   inner join matches c
				   	on b.match_id = c.match_id
				   inner join persons d
				   	on a.person_id = d.person_id
				   inner join teams e
				   	on b.bat_team_id = e.team_id
				   where c.match_id = $match_id
				   	and b.inns_num = 1
				order by a.bat_order";
   	return $this->db->query($query);
   }
   

}
