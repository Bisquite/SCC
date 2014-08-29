 <div id="content">
<h3>Registration</h3>

<!--  Notice regarding members will be authorised first -->
<p>User registration is reserved for playing members and associate members of Shalford Cricket Club. Once you have registered below your details will be authorised by an administrator, after which you will receive an approval notification when you will be able to login to the members' area.</p>

<?php echo form_open('users/new_user') ; ?>
 <?php if (validation_errors()) : ?>
   <h3>Whoops! There was an error:</h3>
   <p><?php echo validation_errors(); ?></p>
 <?php endif; ?>
 <table border="0" >
 
  	<!-- Get list of teams for use in dropdown lists -->
 	<?php foreach($q_person_dropdown->result_array() as $row) {
		$person_dropdown[$row['person_id']] = $row['initials_last_name'];
	}
	?>	
	
 <tr>
   <td>First Name</td>
   <td><?php echo form_input($first_name); ?></td>
 </tr>   
 <tr>
   <td>Last Name</td>
   <td><?php echo form_input($last_name); ?></td>
 </tr>
 <tr>
   <td>Screen name</td>
   <td><?php echo form_input($screen_name); ?></td>
 </tr>
 <tr>
   <td>Email (this will also be your user name</td>
   <td><?php echo form_input($email); ?></td>
 </tr>
 
  <tr>
   <td>Who are you?</td>
   <td><?php echo form_dropdown('person_id', $person_dropdown) ?></td>
   <td>(This will be used to link to your player profile. Will require admin verification.)</td>
 </tr>
  <tr>
   <td>Password</td>
   <td><?php echo form_password($password1); ?></td>
   <td>Must be between 8 and 20 characters and include an upper case letter, numeric and a symbol</td>
 </tr>
 <tr>
   <td>Confirm Password</td>
   <td><?php echo form_password($password2); ?></td> 
 </tr>
</table>
   <?php echo form_submit('submit', 'Register'); ?>
   or <?php echo anchor('users/index', 'cancel'); ?>
<?php echo form_close(); ?>

</div>