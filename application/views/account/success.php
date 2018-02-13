<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container">
	<h4>Success !</h4>
	<div class="row">
		<div class="col s2">
			<i class="material-icons large">mood_good</i>
		</div>
		<div class="col s10">
			<p class="flow-text"><?php echo $text; ?></p>
			<?php if(!empty($mini_text)) : ?>
				<p><?php echo $mini_text; ?></p>
			<?php endif; ?>
		</div>
	</div>
</div>