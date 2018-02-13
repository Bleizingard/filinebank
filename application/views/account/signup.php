<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<div class="container">
	<div class="row">
		<?php echo form_open('signup', array("class" => "col s12 m7 offset-m3 l6 offset-l3", "novalidate" => "")); ?>
			<div class="row">
				<div class="input-field col s12">
				<?php 
					echo form_input($form_login);
					
					echo form_label("Login", "login", $form_login_label);
				?>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s6">
				<?php 
					echo form_password($form_password);
					
					echo form_label("Password", "password", $form_password_label);
				?>
				</div>
				<div class="input-field col s6">
				<?php 
					echo form_password($form_password_confirm);
					
					echo form_label("Password Confirmation", "password_confirm", $form_password_confirm_label);
				?>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
				<?php 
					echo form_input($form_email);
					
					echo form_label("Email", "email", $form_email_label);
				?>
				</div>
			</div>
			<div class="row">
				<button class="btn waves-effect waves-light" type="submit">
					Sign up <i class="material-icons right">send</i>
				</button>
			</div>
		<?php echo form_close(); ?>
	</div>
</div>