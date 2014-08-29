<div id="content">
<h3>Player Profile</h3>

<!--  Get profile data -->
<?php 
	foreach ($q_player_profile->result() as $row)
	{
		echo "Player name: " . $row->first_name . ' ' . $row->last_name;
	}
?>
    
<table border="0">


<table border="0" >
 <tr>Batting statistics
     <td>Team</td>
     <td>Runs</td>
     <td>Avg</td>
     <td>Best</td>
     <td>4s</td>
     <td>6s</td>
     <td>NO</td>
     <td>Ducks</td>
 </tr> 
 <?php foreach ($q_player_profile_stats_cs->result() as $row) : ?>
 <tr>
     <td><?php echo $row->team_name; ?></td>
     <td><?php echo $row->bat_runs; ?></td>
     <td><?php echo $row->bat_avg; ?></td>
     <td><?php echo $row->high_score; ?></td>
     <td><?php echo "4s" ?></td>
     <td><?php echo "6s" ?></td>
     <td><?php echo "NO" ?></td>
     <td><?php echo "Ducks" ?></td>
 </tr>           
 <?php endforeach ; ?>
</table>

<table border="0" >
 <tr>Bowling statistics
     <td>Team</td>
     <td>Overs</td>
     <td>Wickets</td>
     <td>Runs</td>
     <td>Avg</td>
 </tr> 
 <?php foreach ($q_player_profile_stats_cs->result() as $row) : ?>
 <tr>
     <td><?php echo $row->team_name; ?></td>
     <td><?php echo $row->overs; ?></td>
     <td><?php echo $row->wickets; ?></td>
     <td><?php echo $row->bowl_runs; ?></td>
     <td><?php echo $row->bowl_avg ?></td>
 </tr>           
 <?php endforeach ; ?>
</table>

</div>