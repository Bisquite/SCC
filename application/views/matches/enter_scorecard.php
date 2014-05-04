 <div id="content">
<h3>Match creation</h3>
 
 <?php echo form_open('matches/enter_scorecard', 'id="form"') ; ?>
 <?php if (validation_errors()) : ?>
   <h3>Whoops! There was an error:</h3>
   <p><?php echo validation_errors(); ?></p>
 <?php endif; ?>
 
 
 <table border="0">
 
 	<!-- Get list of teams for use in dropdown lists -->
 	<?php foreach($q_match_teams_dropdown->result_array() as $row) {
		$match_teams_dropdown[$row['team_id']] = $row['team_name'];
	}
	?>	

<tr>
   <td>Team batting first: </td>
   <td><?php echo form_dropdown('first_inns_team', $match_teams_dropdown) ?></td> 
   <td>No. of players:</td>
   <td><?php echo form_input('first_inns_no_of_players', $first_inns_no_of_players) ?></td> 
</tr>
<tr>
   <td>Team batting second: </td>
   <td><?php echo form_dropdown('second_inns_team', $match_teams_dropdown) ?></td> 
   <td>No. of players:</td>
   <td><?php echo form_input('second_inns_no_of_players', $second_inns_no_of_players) ?></td> 
</tr>
	

</table>
   <?php echo form_submit('submit', 'Save and Continue'); ?>
   or <?php echo anchor('matches/index', 'cancel'); ?>
<?php echo form_close(); ?>
</div>