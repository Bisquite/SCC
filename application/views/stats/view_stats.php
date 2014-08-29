<div id="content">
<h3>Stats <?php echo date("Y");?></h3>

 	<!-- Get list of match years for use in dropdown lists -->
 	<?php foreach($q_match_years->result_array() as $row) {
		$match_years_dropdown[$row['year']] = $row['year'];
	}
	?>
	
	<?php foreach($q_home_club_team_dropdown->result_array() as $row) {
		$home_club_team_dropdown[$row['team_id']] = $row['team_name'];
	}
	?>
	
<!--  Generate seasons drop down list and update page button -->
<?php echo form_open('stats/view_stats') ; ?>
<tr>
   <td>Season</td>
   <td><?php echo form_dropdown('year', $match_years_dropdown) ?></td> 
</tr>
<tr>
   <td>Team</td>
   <td><?php echo form_dropdown('team_id', $home_club_team_dropdown) ?></td> 
</tr>
<tr>
   <td><?php echo form_submit('', 'Update') ; ?></td>
</tr>
<?php echo form_close(); ?>
	
<?php if ($q_batsman_stats_by_year_team->num_rows() > 0 ) : ?>
<table border="0" >
 <tr>
     <td>Batsman</td>
     <td>Runs</td>
     <td>Avg</td>
     <td>Best</td>
     <td>4s</td>
     <td>6s</td>
     <td>NO</td>
     <td>Ducks</td>
 </tr> 
 <?php foreach ($q_batsman_stats_by_year_team->result() as $row) : ?>
 <tr>
     <td><?php echo $row->initials_last_name; ?></td>
     <td><?php echo $row->bat_runs; ?></td>
     <td><?php echo $row->bat_avg; ?></td>
     <td><?php echo $row->high_score; ?></td>
 </tr>           
 <?php endforeach ; ?>
 
<table border="0" >
 <tr>
     <td>Bowler</td>
     <td>Overs</td>
     <td>Wickets</td>
     <td>Runs</td>
     <td>Avg</td>
     <td>Best</td>
     <td>NB</td>
 </tr> 
 <?php foreach ($q_bowler_stats_by_year_team->result() as $row) : ?>
 <tr>
     <td><?php echo $row->initials_last_name; ?></td>
     <td><?php echo $row->overs; ?></td>
     <td><?php echo $row->wickets; ?></td>
     <td><?php echo $row->bowl_runs; ?></td>
     <td><?php echo $row->bowl_avg; ?></td>
 </tr>           
 <?php endforeach ; ?>
 
</table>
<table border="0" >
 <tr>
     <td>Player</td>
     <td>Catches</td>
     <td>Stumpings</td>
     <td>Tot. Dismissals</td>
 </tr> 
 <?php foreach ($q_fielder_stats_by_year_team->result() as $row) : ?>
 <tr>
     <td><?php echo $row->initials_last_name; ?></td>
     <td><?php echo $row->catches; ?></td>
     <td><?php echo $row->stumpings; ?></td>
     <td><?php echo $row->dismissals; ?></td>
 </tr>           
 <?php endforeach ; ?>

</table>
<?php endif ; ?>
</div>