<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
?>
<header>
	
	<?php
	if ($this->toolbox->is_logged ())
	:
	$menu_product_active = $this->toolbox->get_user_menu_product_active();
	
	
		?>
		<!-- MENU PRINCIPAL (Connecté) -->
	<nav class="white" role="navigation">
		<div class="nav-wrapper container">
			<a id="logo-container" href="#" class="brand-logo center">Filine Bank</a>
			<ul id="nav-mobile" class="side-nav fixed">
				<li><a class="waves-effect waves-teal"
					href="<?php echo base_url(); ?>">Home</a></li>
				<li class="no-padding">
					<ul class="collapsible collapsible-accordion">
						<li class="bold"><a
							class="collapsible-header waves-effect waves-teal">Consultation</a>
							<div class="collapsible-body" style="display: none;">
								<ul>
									<li><a href="<?php echo base_url(); ?>">Bank Account</a></li>
									<li><a href="<?php echo base_url(); ?>">Insurance</a></li>
								</ul>
							</div></li>
					</ul>
				</li>
				<li class="no-padding">
					<ul class="collapsible collapsible-accordion">
						<li class="bold"><a
							class="collapsible-header waves-effect waves-teal">Add new product</a>
							<div class="collapsible-body" style="display: none;">
								<ul>
									<li><a class="<?php echo $menu_product_active["Checking"]; ?>" href="<?php echo base_url("product/subcribe/checking"); ?>">Bank Account</a></li>
									<li><a class="<?php echo $menu_product_active["Saving"]; ?>" href="<?php echo base_url("product/subcribe/saving"); ?>">Saving Account</a></li>
									<li><a href="<?php echo base_url("product/subcribe/life"); ?>">Life Insurance</a></li>
									<li><a href="<?php echo base_url("product/subcribe/mutual"); ?>">Mutual Health</a></li>
								</ul>
							</div></li>
					</ul>
				</li>
				<li><div class="divider"></div></li>	
				<li class="no-padding" ><a class="waves-effect waves-teal"
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
			<a id="logo-container" href="<?php echo base_url(); ?>" class="brand-logo">Filine Bank</a>
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