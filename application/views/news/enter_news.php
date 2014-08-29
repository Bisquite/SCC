 <div id="content">
<h3>News creation</h3>
 
 <?php echo form_open('news/enter_news', 'id="form"') ; ?>
 <?php if (validation_errors()) : ?>
   <h3>Whoops! There was an error:</h3>
   <p><?php echo validation_errors(); ?></p>
 <?php endif; ?>
 
 
 <table border="0">	

  	<!-- Get list of news categories for use in dropdown lists -->
 	<?php foreach($q_news_category_dropdown->result_array() as $row) {
		$news_category_dropdown[$row['news_category_id']] = $row['news_category_name'];
	}
	?>
	
<tr>
   <td>News category: </td>
   <td><?php echo form_dropdown('news_category', $news_category_dropdown) ?></td> 
</tr>
<tr>
   <td>News headline: </td>
   <td><?php echo form_input($headline_text) ?></td> 
</tr>
<tr>
   <td>News content:</td>
   <td><?php echo form_textarea($content_text) ?></td> 
</tr>	

</table>
   <?php echo form_submit('submit', 'Save and Continue'); ?>
   or <?php echo anchor('news/index', 'cancel'); ?>
<?php echo form_close(); ?>
</div>