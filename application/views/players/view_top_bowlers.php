<?php if ($query->num_rows() > 0 ) : ?> 
<table border="0">
 <tr>
     <td>Bowler</td>
     <td>Runs</td>
 </tr> 
 <?php foreach ($query->result() as $row) : ?>
 <tr>
     <td><?php echo $row->bowler; ?></td>
     <td><?php echo $row->totWickets; ?></td>
 </tr>           
 <?php endforeach ; ?>
</table>
<?php endif ; ?>

