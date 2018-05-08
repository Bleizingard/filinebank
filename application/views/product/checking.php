<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
?>
<div class="container">
	<div class="row valign-wrapper center-align">
	<?php echo form_open('product/subcribe/checking', array("class" => "col s12", "id" => "checking_form", "novalidate" => "")); ?>
	<div class="row">
			<div class="input-field col s12">
				<select name="plan">
					<option disabled
						<?php echo (set_value("plan") == NULL) ? "selected" : ""; ?>>Choose
						your plan</option>
						<?php
						foreach ( $form_plan_option as $key => $option )
						{
							printf ( '<option %s value="%s">%s</option>', set_select ( "plan", $key ), $key, $option );
						}
						?>
					</select>
				<?php
				
				echo form_label ( "Choose your plan", "plan", $form_plan_label );
				?>
				<p>
					<?php 
					echo form_error("plan", '<span class="red-text">', "</span>");
					?>
				</p>
				</div>
		</div>
		<div class="row">
			<div class="input-field col s12">
				<select name="card">
					<option disabled
						<?php echo (set_value("card") == NULL) ? "selected" : ""; ?>>Choose
						your card</option>
						<?php
						foreach ( $form_card_option as $key => $option )
						{
							printf ( '<option %s value="%s">%s</option>', set_select ( "card", $key ), $key, $option );
						}
						?>
					</select>
				<?php
				
				echo form_label ( "Choose your card", "card", $form_plan_label );
				?>
				<p>
					<?php 
					echo form_error("card", '<span class="red-text">', "</span>");
					?>
				</p>
				</div>
		</div>
		<div class="row">
			<div class="col s12">
				<p>
				<?php
				
				echo form_checkbox ( $form_tos );
				
				echo form_label ( "I accept the Terms of Sales", "tos", $form_tos_label );
				
				?>
				</p>
				<p>
					<?php 
					echo form_error("tos", '<span class="red-text">', "</span>");
					?>
				</p>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s12">
				<button class="btn waves-effect waves-light modal-trigger" type="button" data-target="modal1">
					Subscribe <i class="material-icons right">done</i>
				</button>
				<div id="modal1" class="modal">
          <div class="modal-content">
            <h4>I accept the contract</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
          </div>
          <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat ">Disagree</a>
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat" onclick="$('#checking_form').submit();">Agree</a>
          </div>
        </div>
			</div>
		</div>
	<?php echo form_close(); ?>
	</div>
	
</div>