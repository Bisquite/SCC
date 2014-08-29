<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Matches_model extends CI_Model {
   function __construct() {
       parent::__construct();
   }

   /* Create matches */
   public function process_create_match($data) {
   //	$query = 'insert into matches (
   			  
   	if ($this->db->insert('matches', $data)) {
   		return true;
   	} else {
   		return false;
   	}
   }
   
   /* ------------------------------------------
    * Dropdown lists
    * ------------------------------------------*/
   public function get_home_club_team_dropdown() {
   	$query = "
			select team_id, team_name
			from teams
			where club_id = 1
			order by team_id;";
   	return $this->db->query($query);
   }
   
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
   
   public function get_match_teams_dropdown($match_id) {
   	$query = "
   			select a.home_team_id as team_id, th.team_name
			from matches a
			  inner join teams th
			  on a.home_team_id = th.team_id
			where a.match_id = $match_id
			union
			select a.away_team_id as team_id, ta.team_name
			from matches a
			  inner join teams ta
			  on a.away_team_id = ta.team_id
			where a.match_id = $match_id";
   	return $this->db->query($query);
   }
   
   public function get_match_years() {
	 $query = "
	   	select distinct year(match_date) as year
		from matches
		order by year(match_date) desc";
   	return $this->db->query($query);
   }
   
   /* ----------------------------------------*/

   
   public function get_matches_by_year($year) {
       $query = "select 
					  m.match_id
					  , m.match_date
					  , m.match_time
					  , case when th.club_id = 1 then th.team_name else ta.team_name end as home_club_team
					  , case when th.club_id = 1 then ta.team_name else th.team_name end as oppo_team
					  , case when th.club_id = 1 then 'H' else 'A' end as home_away
					  , g.ground_name
				from matches m
					  inner join teams th
					  on m.home_team_id = th.team_id
					  inner join teams ta
					  on m.away_team_id = ta.team_id
					  inner join grounds g
					  on m.ground_id = g.ground_id
				where year(m.match_date) = $year
				order by m.match_date;";
       return $this->db->query($query);
   } 
   
   public function get_match_details($match_id) {
   		$query = "select * from matches where match_id = $match_id";
   		return $this->db->query($query);
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
   
   
   public function get_scorecard_first_inns($match_id) {
   	$query = "	select a.bat_order
				      , case when e.club_id = 1 then d.initials_last_name else concat(a.bat_init, '. ', a.bat_lname) end as batsman
				      , a.time_in
				      , a.time_out
				      , a.how_out
				      , case when e.club_id <> 1 then fp.initials_last_name else concat(f.bat_init, '. ', f.bat_lname) end as fielder
				      , case when e.club_id <> 1 then blp.initials_last_name else concat(bl.bat_init, '. ', bl.bat_lname) end as bowler
				      , a.score
				      , a.fours
				      , a.sixes
				      , a.comment
				      , a.batsman_id
				      , a.person_id as batsman_person_id
   				from batsman a
				   inner join innings b
				   	on a.inns_id = b.inns_id
				   inner join matches c
				   	on b.match_id = c.match_id
				   inner join persons d
				   	on a.person_id = d.person_id
				   inner join teams e
				   	on b.bat_team_id = e.team_id
		           left outer join batsman f          -- fielder
		            on a.fielder = f.batsman_id
		           left outer join persons fp
		            on f.person_id = fp.person_id
		           left outer join batsman bl         -- bowler
		            on a.bowler = bl.batsman_id
		           left outer join persons blp
		            on bl.person_id = blp.person_id
			   where c.match_id = $match_id
				   	and b.inns_num = 1
			   order by bat_order";
   	return $this->db->query($query);
   }
   
   public function get_scorecard_second_inns($match_id) {
   	$query = "	select a.bat_order
				   	, case when e.club_id = 1 then d.initials_last_name else concat(a.bat_init, '. ', a.bat_lname) end as batsman
				   	, a.time_in
				   	, a.time_out
				   	, a.how_out
				   	, case when e.club_id <> 1 then fp.initials_last_name else concat(f.bat_init, '. ', f.bat_lname) end as fielder
				   	, case when e.club_id <> 1 then blp.initials_last_name else concat(bl.bat_init, '. ', bl.bat_lname) end as bowler
				   	, a.score
				   	, a.fours
				   	, a.sixes
				   	, a.comment
				    , a.batsman_id
				    , a.person_id as batsman_person_id
			   	from batsman a
				   	inner join innings b
				   	on a.inns_id = b.inns_id
				   	inner join matches c
				   	on b.match_id = c.match_id
				   	inner join persons d
				   	on a.person_id = d.person_id
				   	inner join teams e
				   	on b.bat_team_id = e.team_id
				   	left outer join batsman f          -- fielder
				   	on a.fielder = f.batsman_id
				   	left outer join persons fp
				   	on f.person_id = fp.person_id
				   	left outer join batsman bl         -- bowler
				   	on a.bowler = bl.batsman_id
				   	left outer join persons blp
				   	on bl.person_id = blp.person_id
			   	where c.match_id = $match_id
			   	and b.inns_num = 2
			   	order by bat_order";
   	
   	return $this->db->query($query);
   }

}
