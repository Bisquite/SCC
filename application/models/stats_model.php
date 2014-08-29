<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stats_model extends CI_Model {
   function __construct() {
       parent::__construct();
   }

   /* Set variables */
   public $current_season = 2008;
  
 
   /* ------------------------------------------
    * Stats by team & year
   * ------------------------------------------*/
   public function get_batsman_stats_by_year_team($year, $teamid) {   	
   	   $query = "	select 
					  a.person_id
					  , a.initials_last_name
					  , a.bat_runs
					  , a.high_score
					  , a.bat_avg
					from player_stats_season_team a
					where season = " . $year . "
        				and team_id = " . $teamid . "
					order by a.bat_runs desc;";
        return $this->db->query($query);
   }
   
 
   public function get_bowler_stats_by_year_team($year, $teamid) {
   	$query = "	select 
				  a.person_id
				  , a.initials_last_name
   				  , a.overs
				  , a.wickets
				  , a.bowl_runs
				  , a.bowl_avg
				from player_stats_season_team a
				where season = " . $year . "
   					and team_id = " . $teamid . "
				order by 
					a.wickets desc
					, a.bowl_avg asc";
   	return $this->db->query($query);
   }
   
   
   
   public function get_fielder_stats_by_year_team($year, $teamid) {
   	$query = "select
				  a.person_id
				  , a.initials_last_name
				  , a.catches
				  , a.stumpings
				  , a.dismissals_half_st as dismissals
				from player_stats_season_team a
				where season = " . $year . "
   					and team_id = " . $teamid . "
				order by a.dismissals_half_st desc;";
   	return $this->db->query($query);
   }
   
   
   /* ------------------------------------------
    * Stats by team - all years
   * ------------------------------------------*/
   public function get_batsman_stats_by_team($teamid) {
   	$query = "	select
					  a.person_id
					  , a.initials_last_name
					  , a.bat_runs
					  , a.high_score
					  , a.bat_avg
					from player_stats_season_team a
					where team_id = " . $teamid . "
					order by a.bat_runs desc;";
   	return $this->db->query($query);
   }
    
   
   public function get_bowler_stats_by_team($year, $teamid) {
   	$query = "	select
				  a.person_id
				  , a.initials_last_name
   				  , a.overs
				  , a.wickets
				  , a.bowl_runs
				  , a.bowl_avg
				from player_stats_season_team a
				where team_id = " . $teamid . "
				order by
					a.wickets desc
					, a.bowl_avg asc";
   	return $this->db->query($query);
   }
    
    
    
   public function get_fielder_stats_by_team($year, $teamid) {
   	$query = "select
				  a.person_id
				  , a.initials_last_name
				  , a.catches
				  , a.stumpings
				  , a.dismissals_half_st as dismissals
				from player_stats_season_team a
				where team_id = " . $teamid . "
				order by a.dismissals_half_st desc;";
   	return $this->db->query($query);
   }
   
  
   
}
