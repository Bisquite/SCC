<div id="content">
<h3>Member Login</h3>

<?php echo form_open('users/login') ; ?>
    <?php if (validation_errors()) : ?>
        <h3>Whoops! There was an error:</h3>
        <p><?php echo validation_errors(); ?></p>
    <?php endif; ?>

    <?php if (isset($login_fail)) : ?>
        <h4>Login Error:</h4>
        <p>Username or Password is incorrect, please try again.</p>
    <?php endif; ?>  
    
    <table border="0">
        <tr>
            <td>User Email</td>
            <td><?php echo form_input(array('name' => 'email', 'id' => 'email', 'value' => set_value('email', ''), 'maxlength' => '100', 'size' => '50', 'style' => 'width:100%')); ?></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><?php echo form_password(array('name' => 'password', 'id' => 'password', 'value' => set_value('password', ''), 'maxlength' => '100', 'size' => '50', 'style' => 'width:100%')); ?></td>
        </tr>
    </table>
   <?php echo form_submit('submit', 'Login'); ?>
   or <?php echo anchor('users/index', 'cancel'); ?>
<br>
<?php echo anchor('users/forgot_password', 'Forgot Password'); ?>
<?php echo form_close(); ?>

</div>