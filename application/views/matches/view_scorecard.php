<?php if ($query->num_rows() > 0 ) : ?> 
<table border="0">
 <tr>
     <td>Match ID</td>
     <td>Match Date</td>
     <td>Match Time</td>
 </tr> 
 <?php foreach ($query->result() as $row) : ?>
 <tr>
     <td><?php echo $row->match_id; ?></td>
     <td><?php echo $row->match_date; ?></td>
     <td><?php echo $row->match_time; ?></td>

 </tr>           
 <?php endforeach ; ?>
</table>
<?php endif ; ?>