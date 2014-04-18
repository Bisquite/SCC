<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Players_model extends CI_Model {
   function __construct() {
       parent::__construct();
   }

   /* Set variables */
   public $current_season = 2008;
  
 
   
   public function get_top_batsmen_1sts() {
   	
   	   $query = "	select 
					  a.person_id
					  , a.initials_last_name
					  , a.bat_runs
					  , a.high_score
					  , a.bat_avg
					from player_stats_season_team a
					where season = " . $this->current_season . "
        				and team_id = 1
					order by a.bat_runs desc
					limit 5;";
        return $this->db->query($query);
   }
   
   public function get_top_batsmen_2nds() {
   		$query = "	select
					  a.person_id
					  , a.initials_last_name
					  , a.bat_runs
					  , a.high_score
					  , a.bat_avg
					from player_stats_season_team a
					where season = " . $this->current_season . "
        				and team_id = 2
					order by a.bat_runs desc
					limit 5;";
   	return $this->db->query($query);
   }
   
   public function get_top_batsmen_sun() {
   	$query = "	select
					  a.person_id
					  , a.initials_last_name
					  , a.bat_runs
					  , a.high_score
					  , a.bat_avg
					from player_stats_season_team a
					where season = " . $this->current_season . "
        				and team_id = 3
					order by a.bat_runs desc
					limit 5;";
   	return $this->db->query($query);
   }
 
   public function get_top_bowlers_1sts() {
   	$query = "	select 
				  a.person_id
				  , a.initials_last_name
				  , a.wickets
				  , a.high_score
				  , a.bowl_avg
				from player_stats_season_team a
				where season = " . $this->current_season . "
   					and team_id = 1
				order by a.wickets desc
				limit 5;";
   	return $this->db->query($query);
   }
   
   public function get_top_bowlers_2nds() {
   	$query = "	select
				  a.person_id
				  , a.initials_last_name
				  , a.wickets
				  , a.high_score
				  , a.bowl_avg
				from player_stats_season_team a
				where season = " . $this->current_season . "
   					and team_id = 2
				order by a.wickets desc
				limit 5;";
   	return $this->db->query($query);
   }
   
   public function get_top_bowlers_sun() {
   	$query = "	select
				  a.person_id
				  , a.initials_last_name
				  , a.wickets
				  , a.high_score
				  , a.bowl_avg
				from player_stats_season_team a
				where season = " . $this->current_season . "
   					and team_id = 3
				order by a.wickets desc
				limit 5;";
   	return $this->db->query($query);
   }
   
   public function get_top_fielders_1sts() {
   	$query = "select
				  a.person_id
				  , a.initials_last_name
				  , a.catches
				  , a.stumpings
				  , a.dismissals_half_st as dismissals
				from player_stats_season_team a
				where season = " . $this->current_season . "
   					and team_id = 1
				order by a.dismissals_half_st desc
				limit 5;";
   	return $this->db->query($query);
   }
   
   public function get_top_fielders_2nds() {
   	$query = "select
				  a.person_id
				  , a.initials_last_name
				  , a.catches
				  , a.stumpings
				  , a.dismissals_half_st as dismissals
				from player_stats_season_team a
				where season = " . $this->current_season . "
   					and team_id = 2
				order by a.dismissals_half_st desc
				limit 5;";
   	return $this->db->query($query);
   }
   
   public function get_top_fielders_sun() {
   	$query = "select
				  a.person_id
				  , a.initials_last_name
				  , a.catches
				  , a.stumpings
				  , a.dismissals_half_st as dismissals
				from player_stats_season_team a
				where season = " . $this->current_season . "
   					and team_id = 3
				order by a.dismissals_half_st desc
				limit 5;";
   	return $this->db->query($query);
   }
   
   /*
   insert into player_stats
   select
   py.person_id
   , initials_last_name
   , py.season
   , batsmen.tot_runs as tot_bat_runs
   , batsmen.high_score
   , batsmen.tot_runs / (case when batsmen.innings = 0 then 1 else batsmen.innings end) as bat_avg
   , bowlers.tot_wickets
   , bowlers.tot_runs as tot_bowl_runs
   , case when ifnull(bowlers.tot_wickets, 0) = 0 then null else (bowlers.tot_runs / bowlers.tot_wickets) end as bowl_avg
   , bowlers.tot_overs
   , bowlers.tot_odd_balls
   , fielders.tot_catches
   , fielders.tot_stumpings
   from
   (select person_id, years.cal_year as season, persons.initials_last_name
   from persons
   cross join (select distinct cal_year from dates) years
   ) py
   left outer join
   (select a.fielder_id as person_id
   , year(c.match_date) as season
   , sum(case when ifnull(a.catch, 0) = 1 then 1 else 0 end) as tot_catches
   , sum(case when ifnull(a.stumping, 0) = 1 then 1 else 0 end) as tot_stumpings
   from batsman a
   inner join innings b
   on a.inns_id = b.inns_id
   inner join matches c
   on b.match_id = c.match_id
   inner join persons d
   on a.fielder_id = d.person_id
   inner join teams e
   on b.bowl_team_id = e.team_id
   where e.club_id = 1
   group by a.fielder_id
   , year(c.match_date) ) as fielders
   on py.person_id = fielders.person_id
   and py.season = fielders.season
   left outer join
   (select b.person_id as person_id
   , year(d.match_date) as season
   , sum(a.wickets) as tot_wickets
   , sum(a.runs) as tot_runs
   , sum(a.overs) + floor((sum(a.odd_balls) / 6)) as tot_overs
   , sum(a.odd_balls) - floor((sum(a.odd_balls) / 6) * 6) as tot_odd_balls
   from bowler a
   inner join batsman b
   on a.batsman_id = b.batsman_id
   inner join innings c
   on a.inns_id = c.inns_id
   inner join matches d
   on c.match_id = d.match_id
   inner join persons e
   on b.person_id = e.person_id
   inner join teams f
   on c.bat_team_id = f.team_id
   where e.club_id = 1
   group by b.person_id
   , year(d.match_date)) as bowlers
   on py.person_id = bowlers.person_id
   and py.season = bowlers.season
   left outer join
   (select a.person_id as person_id
   , year(c.match_date) as season
   , sum(a.score) as tot_runs
   , max(a.score) as high_score
   , sum(case when a.not_out = 0 then 1 else 0 end) as innings
   from batsman a
   inner join innings b
   on a.inns_id = b.inns_id
   inner join matches c
   on b.match_id = c.match_id
   inner join persons d
   on a.person_id = d.person_id
   inner join teams e
   on b.bat_team_id = e.team_id
   where e.club_id = 1
   group by a.person_id
   , year(c.match_date)) as batsmen
   on py.person_id = batsmen.person_id
   and py.season = batsmen.season
   where batsmen.person_id is not null   -- ensure they have played in that season;
   
   */
}
