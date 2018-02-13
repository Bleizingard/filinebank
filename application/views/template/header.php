<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
?>
<header>
	
	<?php
	if ($this->toolbox->is_logged ())
	:
		?>
		<!-- MENU PRINCIPAL (Connecté) -->
	<nav class="white" role="navigation">
		<div class="nav-wrapper container">
			<ul id="nav-mobile" class="side-nav fixed">
				<li class="logo"><a id="logo-container" href="#" class="brand-logo">Logo</a>
					<object id="front-page-logo" type="image/svg+xml"
						data="res/materialize.svg">Your browser does not support SVG</object></li>
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<li><a href="<?php echo base_url('account/me'); ?>">My Account</a></li>
				<li><div class="divider"></div></li>
				<li><a href="<?php echo base_url("signout"); ?>">Sign out</a></li>
			</ul>
			<a href="#" data-activates="nav-mobile" class="button-collapse"><i
				class="material-icons">menu</i></a>
		</div>
	</nav>
	<?php
	
	else
	:
		?>
		<!-- MENU PRINCIPAL (Non connnecté) -->
	<nav class="white" role="navigation">
		<div class="nav-wrapper container">
			<a id="logo-container" href="#" class="brand-logo">Logo</a>
			<ul class="right hide-on-med-and-down">
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<li><a href="<?php echo base_url("signin"); ?>">Sign in</a></li>
				<li><a href="<?php echo base_url("signup"); ?>">Sign up</a></li>
			</ul>

			<ul id="nav-mobile" class="side-nav">
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<li><div class="divider"></div></li>
				<li><a href="<?php echo base_url("signin"); ?>">Sign in</a></li>
				<li><a href="<?php echo base_url("signup"); ?>">Sign up</a></li>
			</ul>
			<a href="#" data-activates="nav-mobile" class="button-collapse"><i
				class="material-icons">menu</i></a>
		</div>
	</nav>
	<?php endif; ?>	
</header>