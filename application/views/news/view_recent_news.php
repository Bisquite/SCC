<div id="content">
<h3>In the News</h3>

<?php if ($query->num_rows() > 0 ) : ?> 
<table border="0">

 <?php foreach ($query->result() as $row) : ?>
 <tr>
     <td><?php echo $row->headline_text; ?></td>
 </tr>
 <tr>
     <td><?php echo $row->content_text; ?></td>
 </tr>           
 <?php endforeach ; ?>
</table>
<?php endif ; ?>

