<!-- Fixed navbar -->
	<div class="navbar navbar-default navbar-fixed-top" role="navigation">
		
		<div class="container">

			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><?php xecho ( $site_title ) ?></a>
			</div>		
							
							
			<div class="collapse navbar-collapse">
				
				<ul class="nav navbar-nav">
					<li class="<?php if ( uri_string() == '') echo 'active' ?>"><a href="<?php echo base_url()?>">Home</a></li>

					<li class="<?php if ( uri_string() == 'crud/index') echo 'active' ?>"><a href="crud/index">CRUD sample</a></li>
				
					
					
					<!--		
					<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown menu <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li class="dropdown-header">Header</li>
						<li class="<?php if ( uri_string() == 'ctrl/method') echo 'active' ?>"><a href="ctrl/method">Method</a></li>

						<li class="divider"></li>
						<li class="<?php if ( uri_string() == 'ctrl/method') echo 'active' ?>"><a href="ctrl/method">Method</a></li>
					</ul>
					</li>
					-->
				</ul>
			
				
				<ul class="nav navbar-nav navbar-right">
					<?php if ($user) : ?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<span class="glyphicon glyphicon-user"></span> <?php echo $user->username ?> <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="auth/change_password"><?php echo lang('change_password_heading')?></a></li>
							<li class="divider"></li>
							<li><a href="auth/logout"><?php echo lang('custom_logout')?></a></li>
						</ul>
					</li>
					<?php else : ?>	
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<span class="glyphicon glyphicon-user"></span> <?php echo lang('login_heading')?> <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="auth/login"><?php echo lang('login_heading')?></a></li>
							<li><a href="auth/forgot_password"><?php echo lang('login_forgot_password')?></a></li>
						</ul>
					</li>					
					<?php endif; ?>	
				</ul>
					
								
			</div>
			
		</div>
	</div>
