 <div id="content">
<h3>Match creation</h3>
 
 <?php echo form_open('matches/new_match', 'id="form"') ; ?>
 <?php if (validation_errors()) : ?>
   <h3>Whoops! There was an error:</h3>
   <p><?php echo validation_errors(); ?></p>
 <?php endif; ?>
 

 
 <table border="0">
 
 	<!-- Get list of teams for use in dropdown lists -->
 	<?php foreach($q_team_dropdown->result_array() as $row) {
		$team_dropdown[$row['team_id']] = $row['team_name'];
	}
	?>	
	
	<?php foreach($q_ground_dropdown->result_array() as $row) {
		$ground_dropdown[$row['ground_id']] = $row['ground_name'];
	}
	?>
	
	<?php foreach($q_match_type_dropdown->result_array() as $row) {
		$match_type_dropdown[$row['match_type_id']] = $row['match_type_name'];
	}
	?>
	
	<?php foreach($q_match_format_dropdown->result_array() as $row) {
		$match_format_dropdown[$row['match_format_id']] = $row['match_format_name'];
	}
	?>
<tr>
   <td>Home team</td>
   <td><?php echo form_dropdown('team_home', $team_dropdown) ?></td> 
</tr>
<tr>
   <td>Away team</td>
   <td><?php echo form_dropdown('team_away', $team_dropdown) ?></td> 
</tr>
<tr>
   <td>Choose ground</td>
   <td><?php echo form_dropdown('ground_id', $ground_dropdown) ?></td> 
</tr>
<tr>
   <td>Match type</td>
   <td><?php echo form_dropdown('match_type', $match_type_dropdown) ?></td> 
</tr>
<tr>
   <td>Match format</td>
   <td><?php echo form_dropdown('match_format', $match_format_dropdown) ?></td> 
</tr>
<tr>
   <td>Date</td>
   <td><?php echo form_input($match_date, 'class="text"') ?></td>
</tr>
<tr>
   <td>Time</td>
   <td><?php echo form_input($match_time) ?></td>
</tr>
<tr>
   <td>Allow draws?</td>
   <td><?php echo form_checkbox($allow_draws_flag); ?></td>
</tr>
</table>
   <?php echo form_submit('submit', 'Add match'); ?>
   or <?php echo anchor('matches/index', 'cancel'); ?>
<?php echo form_close(); ?>
</div>