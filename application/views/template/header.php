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
				<li class="logo"><a id="logo-container"
					href="<?php echo base_url(); ?>" class="brand-logo">Filine Bank</a>
					<object id="front-page-logo" type="image/svg+xml"
						data="res/materialize.svg">Your browser does not support SVG</object></li>
				<li><a class="waves-effect waves-teal"
					href="<?php echo base_url(); ?>">Home</a></li>
				<li class="no-padding">
					<ul class="collapsible collapsible-accordion">
						<li class="bold"><a
							class="collapsible-header waves-effect waves-teal">Bank Account</a>
							<div class="collapsible-body" style="display: none;">
								<ul>
									<li><a href="<?php echo base_url(); ?>">Add a product</a></li>
								</ul>
							</div></li>
						<li class="bold"><a
							class="collapsible-header waves-effect waves-teal">Insurance</a>
							<div class="collapsible-body">
								<ul>
									<li><a href="<?php echo base_url(); ?>">Add a product</a></li>
								</ul>
							</div></li>
					</ul>
				</li>

				<li><a class="waves-effect waves-teal"
					href="<?php echo base_url('account/me'); ?>">My Account</a></li>
				<li><div class="divider"></div></li>
				<li><a class="waves-effect waves-teal"
					href="<?php echo base_url("signout"); ?>">Sign out</a></li>
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
			<a id="logo-container" href="#" class="brand-logo">Filine Bank</a>
			<ul class="right hide-on-med-and-down">
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<li><a href="<?php echo base_url("signin"); ?>">Sign in</a></li>
				<li><a href="<?php echo base_url("signup"); ?>">Sign up</a></li>
			</ul>

			<ul id="nav-mobile" class="side-nav">
				<li><a class="waves-effect waves-teal"
					href="<?php echo base_url(); ?>">Home</a></li>
				<li><div class="divider"></div></li>
				<li><a class="waves-effect waves-teal"
					href="<?php echo base_url("signin"); ?>">Sign in</a></li>
				<li><a class="waves-effect waves-teal"
					href="<?php echo base_url("signup"); ?>">Sign up</a></li>
			</ul>
			<a href="#" data-activates="nav-mobile" class="button-collapse"><i
				class="material-icons">menu</i></a>
		</div>
	</nav>
	<?php endif; ?>	
</header>