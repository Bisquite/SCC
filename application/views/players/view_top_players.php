<?php if ($qTopBatsmen->num_rows() > 0 ) : ?> 
<table border="0">
 <tr>
     <td>Batsman</td>
     <td>Runs</td>
 </tr> 
 <?php foreach ($qTopBatsmen->result() as $row) : ?>
 <tr>
     <td><?php echo $row->batsman; ?></td>
     <td><?php echo $row->totRuns; ?></td>
 </tr>           
 <?php endforeach ; ?>
</table>
<?php endif ; ?>

<?php if ($qTopBowlers->num_rows() > 0 ) : ?> 
<table border="0">
 <tr>
     <td>Bowler</td>
     <td>Wickets</td>
 </tr> 
 <?php foreach ($qTopBowlers->result() as $row) : ?>
 <tr>
     <td><?php echo $row->bowler; ?></td>
     <td><?php echo $row->totWickets; ?></td>
 </tr>           
 <?php endforeach ; ?>
</table>
<?php endif ; ?>

