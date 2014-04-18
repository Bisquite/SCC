<?php if ($query->num_rows() > 0 ) : ?> 
<table border="0">
 <tr>
     <td>Batsman</td>
     <td>Runs</td>
 </tr> 
 <?php foreach ($query->result() as $row) : ?>
 <tr>
     <td><?php echo $row->batsman; ?></td>
     <td><?php echo $row->totRuns; ?></td>
 </tr>           
 <?php endforeach ; ?>
</table>
<?php endif ; ?>

