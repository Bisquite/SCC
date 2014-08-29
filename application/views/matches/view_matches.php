 <div id="content">
<h3>Fixtures <?php echo date("Y");?></h3>

<?php if ($q_matches_by_year->num_rows() > 0 ) : ?>
<table border="0" >
 <tr>
     <td>Match ID</td>
     <td>Match Date</td>
     <td>Match Time</td>
 </tr> 
 <?php foreach ($q_matches_by_year->result() as $row) : ?>
 <tr>
     <td><?php echo $row->match_id; ?></td>
     <td><?php echo $row->match_date; ?></td>
     <td><?php echo $row->match_time; ?></td>
 </tr>           
 <?php endforeach ; ?>
 <tr><td colspan = "3">And now the second matches</td></tr>
 <?php foreach ($q_matches_by_year->result() as $row) : ?>
 <tr>
     <td><?php echo $row->match_id; ?></td>
     <td><?php echo $row->match_date; ?></td>
     <td><?php echo $row->match_time; ?></td>
 </tr>        
 <?php endforeach ; ?>

</table>
<?php endif ; ?>
</div>