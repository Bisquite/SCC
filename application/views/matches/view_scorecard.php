<?php if ($q_first_inns->num_rows() > 0 ) : ?> 
<table border="0">
 <tr>
     <td>Posn</td>
     <td>Batsman</td>
     <td>Time in</td>
     <td>Time out</td>
     <td>How out</td>
     <td>Fielder</td>
     <td>Bowler</td>
     <td>Runs</td>
     <td>Balls</td>
     <td>4s</td>
     <td>6s</td>
     <td>Comment</td>
          <td>batsman_id</td>
     <td>batsman_person_id</td>
 </tr> 
 <?php foreach ($q_first_inns->result() as $row) : ?>
 <tr>
     <td><?php echo $row->bat_order; ?></td>
     <td><?php echo $row->batsman; ?></td>
     <td><?php echo $row->time_in; ?></td>
     <td><?php echo $row->time_out; ?></td>
     <td><?php echo $row->how_out; ?></td>
     <td><?php echo $row->fielder; ?></td>
     <td><?php echo $row->bowler; ?></td>
     <td><?php echo $row->score; ?></td>
     <td><?php echo $row->fours; ?></td>
     <td><?php echo $row->sixes; ?></td>
     <td><?php echo $row->comment; ?></td>
          <td><?php echo $row->batsman_id; ?></td>
     <td><?php echo $row->batsman_person_id; ?></td>

 </tr>           
 <?php endforeach ; ?>
</table>

<table border="0">
 <tr>
     <td>Posn</td>
     <td>Batsman</td>
     <td>Time in</td>
     <td>Time out</td>
     <td>How out</td>
     <td>Fielder</td>
     <td>Bowler</td>
     <td>Runs</td>
     <td>Balls</td>
     <td>4s</td>
     <td>6s</td>
     <td>Comment</td>
     <td>batsman_id</td>
     <td>batsman_person_id</td>
 </tr> 
 <?php foreach ($q_second_inns->result() as $row) : ?>
 <tr>
     <td><?php echo $row->bat_order; ?></td>
     <td><?php echo $row->batsman; ?></td>
     <td><?php echo $row->time_in; ?></td>
     <td><?php echo $row->time_out; ?></td>
     <td><?php echo $row->how_out; ?></td>
     <td><?php echo $row->fielder; ?></td>
     <td><?php echo $row->bowler; ?></td>
     <td><?php echo $row->score; ?></td>
     <td><?php echo $row->fours; ?></td>
     <td><?php echo $row->sixes; ?></td>
     <td><?php echo $row->comment; ?></td>
     <td><?php echo $row->batsman_id; ?></td>
     <td><?php echo $row->batsman_person_id; ?></td>
     

 </tr>           
 <?php endforeach ; ?>
</table>

<?php endif ; ?>