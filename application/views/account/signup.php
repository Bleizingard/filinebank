<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

?>

<div class="container">
	<div class="row">
		<?php echo form_open('signup', array("class" => "col s12 m7 offset-m3 l6 offset-l3", "novalidate" => "")); ?>
			<div class="row">
			<div class="input-field col s2">
				<select name="gender">
					<option value="Monsieur" <?php echo set_select("gender", "Monsieur"); ?>>Sir</option>
					<option value="Madame" <?php echo set_select("gender", "Madame"); ?>>Madame</option>
				</select>
			</div>
			<div class="input-field col s5">
				<?php
				echo form_input ( $form_firstname );
				
				echo form_label ( "Firstname", "firstname", $form_firstname_label );
				?>
				</div>
			<div class="input-field col s5">
				<?php
				echo form_input ( $form_lastname );
				
				echo form_label ( "Lastname", "lastname", $form_lastname_label );
				?>
				</div>
		</div>
		<div class="row">
			<div class="input-field col s12">
				<?php
				echo form_input ( $form_email );
				
				echo form_label ( "Email", "email", $form_email_label );
				?>
				</div>
		</div>
		<div class="row">
			<div class="input-field col s6">
				<?php
				echo form_password ( $form_password );
				
				echo form_label ( "Password", "password", $form_password_label );
				?>
				</div>
			<div class="input-field col s6">
				<?php
				echo form_password ( $form_password_confirm );
				
				echo form_label ( "Password Confirmation", "password_confirm", $form_password_confirm_label );
				?>
				</div>
		</div>
		<div class="row">
			<div class="input-field col s12">
				<?php
				echo form_input ( $form_address );
				
				echo form_label ( "Address", "address", $form_address_label );
				?>
				</div>
		</div>
		<div class="row">
			<div class="input-field col s3">
				<?php
				echo form_input ( $form_zipcode );
				
				echo form_label ( "ZIP Code", "zipcode", $form_zipcode_label );
				?>
				</div>
			<div class="input-field col s9">
				<?php
				echo form_input ( $form_city );
				
				echo form_label ( "City", "city", $form_city_label );
				?>
				</div>
		</div>
		<div class="row">
			<div class="input-field col s12">
				<?php
				echo form_input ( $form_country );
				
				echo form_label ( "Country", "country", $form_country_label );
				?>
				</div>
		</div>
		<div class="row">
			<div class="input-field col s12">
				<?php
				echo form_input ( $form_phone );
				
				echo form_label ( "Phone Number", "phone", $form_phone_label );
				?>
				</div>
		</div>
		<div class="row">
			<div class="input-field col s12">
				<?php
				echo form_input ( $form_num_child );
				
				echo form_label ( "Number of child", "num_child", $form_num_child_label );
				?>
				</div>
		</div>
		<div class="row">
			<div class="input-field col s12">
				<?php
				echo form_input ( $form_social_group );
				
				echo form_label ( "Your Social Group", "social_group", $form_social_group_label );
				?>
				</div>
		</div>
		<div class="row">
			<div class="input-field col s12">
				<?php
				echo form_input ( $form_work );
				
				echo form_label ( "Current Work", "work", $form_work_label );
				?>
				</div>
		</div>
		<div class="row">
			<div class="input-field col s12">
				<select name="bank">
					<option disabled
						<?php echo (set_value("bank") == NULL) ? "selected" : ""; ?>>Choose
						your bank</option>
						<?php
						foreach ( $form_bank_option as $option )
						{
							printf ( '<option %s value="%s">%s</option>', set_select ( "bank", $option->idBanque ), $option->idBanque, $option->Nom );
						}
						?>
					</select>
				<?php
				
				echo form_label ( "Choose your bank", "bank", $form_bank_label );
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