			
	<script type="text/javascript" src="/static/js/social_accounts.js"></script>
	
	<div class="main-container">
		<div class="container">
			<h2 class="title space-top" style="color: black; text-align: center;"><?php echo $this->lang->line('logIn'); ?></h2>
			<div class="row form-block center-block" style="border: 1px solid #dcdcdc;">
				<div class="main object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="100">
					<form id="login_action" class="form-horizontal col-md-6" method="post" action="" style="border-right: 1px solid #dcdcdc; padding-top: 10px;">
						<div class="form-group has-feedback">
							<div class="col-sm-12">
								<input type="text" class="form-control" placeholder="<?php echo $this->lang->line('email'); ?>" id="email" name="email" required>
								<i class="fa fa-user form-control-feedback"></i>
							</div>
						</div>
						<div class="form-group has-feedback">
							<div class="col-sm-12">
								<input type="password" class="form-control" placeholder="<?php echo $this->lang->line('password'); ?>" id="password" name="password" required style="">
								<i class="fa fa-lock form-control-feedback"></i>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<button type="submit" class="btn square btn-danger" style="width: 100%;"><?php echo $this->lang->line('logIn'); ?><i class="fa fa-user"></i></button>
								<a class="btn square btn-gray-transparent" href="/index.php/auth/register/<?php echo $this->uri->segment(3); ?>" style="width: 49%;"><?php echo $this->lang->line('signIn'); ?></a>
								<a class="btn square btn-gray-transparent" href="/index.php/auth/findPassword/<?php echo $this->uri->segment(3); ?>" style="width: 49%;"><?php echo $this->lang->line('forgotYourPassword'); ?></a>
							</div>
						</div>
					</form>
					<form class="form-horizontal col-md-6">
						<div class="form-group has-feedback">
							<div class="col-sm-12" style="height: 30px;"></div>
							<div class="col-sm-12">
								<h4>SNS <?php echo $this->lang->line('logIn'); ?></h4>
								<p><small><?php echo $this->lang->line('loginThrough'); ?></small></p>
							</div>
							<div class="col-sm-12">
								<a class="btn square btn-gray-transparent" id="facebookLoginBtn" style="width: 100%;"><i class="fa fa-facebook"></i> <?php echo $this->lang->line('facebookLogin'); ?></a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>