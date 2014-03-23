<?php if ($query->num_rows() > 0 ) : ?> 
<table border="0" >
 <tr>
     <td>Match ID</td>
     <td>Match Date</td>
     <td>Match Time</td>
     <td>Match Summary</td>
 </tr> 
 <?php foreach ($query->result() as $row) : ?>
 <tr>
     <td><?php echo $row->matchid; ?></td>
     <td><?php echo $row->matchdate; ?></td>
     <td><?php echo $row->matchtime; ?></td>
     <td><?php echo $row->summary; ?></td>
 </tr>           
 <?php endforeach ; ?>
</table>
<?php endif ; ?>