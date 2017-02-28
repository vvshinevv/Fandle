
	<div class="main-container">
		<div class="container">
			<h2 class="title space-top" style="color: black; text-align: center;"><?php echo $this->lang->line('changePassword'); ?></h2>
			<div class="row form-block center-block" style="border: 1px solid #dcdcdc;">
				<div class="main object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="100">
					<form id="findPassword_action" class="form-horizontal col-md-12" method="post" action="">
						<p><?php echo $this->lang->line('findPasswordSentence1'); ?><br/><?php echo $this->lang->line('findPasswordSentence2'); ?></p>

						<div class="form-group has-feedback">
							<div class="col-sm-12">
								<input type="email" class="form-control" placeholder="<?php echo $this->lang->line('email'); ?>" id="email" name="email" value="" required>
								<i class="fa fa-user form-control-feedback"></i>
							</div>
						</div>
						<div id="resultFail" style="margin-left: 0px; color: red; font-weight: bold;"></div>
						<div class="form-group">
							<div class="col-sm-12">
								<button type="submit" class="btn square btn-danger" style="width: 100%;"><?php echo $this->lang->line('sendLink'); ?> <i class="fa fa-user"></i></button>
							</div>
						</div>
						<div id="resultSuccess" class="resultSuccess" style="margin-left: 0px; color: blue; font-weight: bold;"></div>
					</form>
					</div>
				</div>
			</div>
		</div>
	</div>