
	<div class="main-container">
		<div class="container">
			<h2 class="title" style="color: black; text-align: center;"><?php echo $this->lang->line('signUp'); ?></h2>
			<div class="row form-block center-block" style="border: 1px solid #dcdcdc;">
				<div class="main object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="100">
					<form class="form-horizontal col-sm-12" method="post" action="" id="sign_action" style="padding-top: 10px;">
						<div class="col-sm-6">
							<div class="form-group has-feedback">
								<div class="col-sm-12">
									<input type="email" class="form-control col-md-6" id="email" name="email" placeholder="<?php echo $this->lang->line('email'); ?>" required>
									<i class="fa fa-envelope form-control-feedback"></i>
								</div>
							</div>
							<div class="form-group has-feedback">
								<div class="col-sm-12">
									<input type="password" class="form-control" id="password" name="password" placeholder="<?php echo $this->lang->line('password'); ?>" required>
									<i class="fa fa-lock form-control-feedback"></i>
								</div>
							</div>
							<div class="form-group has-feedback">
								<div class="col-sm-12">
									<input type="password" class="form-control" id="re_password" name="re_password" placeholder="<?php echo $this->lang->line('password'); ?>" required>
									<i class="fa fa-lock form-control-feedback"></i>
								</div>
							</div>
							<div class="form-group has-feedback">
								<div class="col-sm-12">
									<input type="text" class="form-control" id="username" name="username" placeholder="<?php echo $this->lang->line('userName'); ?>" required>
									<i class="fa fa-user form-control-feedback"></i>
								</div>
							</div>
							<div class="form-group has-feedback">
								<div class="col-sm-12">
									<input type="text" class="form-control" id="nickname" name="nickname" placeholder="<?php echo $this->lang->line('nickName'); ?>" required>
									<i class="fa fa-pencil form-control-feedback"></i>
								</div>
							</div>

							<div class="form-group">
								<div class="col-sm-12">
									<button type="submit" class="btn square btn-danger" id="sign_btn" style="width: 100%;"><?php echo $this->lang->line('signUp'); ?> <i class="fa fa-check"></i></button>
								</div>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group has-feedback">
								<div class="col-sm-12">
									<h4><?php echo $this->lang->line('conditions');?></h4>
								</div>
								<div class="col-sm-11" style="overflow-y: scroll; border: 1px solid #dcdcdc; margin: 0px 10px 10px; height: 250px;">
									<h4 style="color: black; text-align: center;"><strong><?php echo $this->lang->line('term1');?></strong></h4>
									<h5 style="color: black;"><strong><?php echo $this->lang->line('term1_1'); ?></strong></h5>
									<p>
										<strong>
											<?php echo $this->lang->line('term1_1_1');?>
										</strong>
									</p>
									<label></label>
									<h5 style="color: black;"><strong><?php echo $this->lang->line('term1_2');?></strong></h5>
									<p>
										<strong>
											<?php echo $this->lang->line('term1_2_1');?>
										</strong>
									</p>
									<label></label>
									<h5 style="color: black;"><strong><?php echo $this->lang->line('term1_3');?></strong></h5>
									<p>
										<strong>
											<?php echo $this->lang->line('term1_3_1');?>
										</strong>
									</p>
									<label></label>
									<h5 style="color: black;"><strong><?php echo $this->lang->line('term1_4');?></strong></h5>
									<p>
										<strong>
											<?php echo $this->lang->line('term1_4_1');?>
										</strong>
									</p>
									<label></label>
									<h4 style="color: black; text-align: center;"><strong><?php echo $this->lang->line('term2');?></strong></h4>
									<h5 style="color: black;"><strong><?php echo $this->lang->line('term2_1');?></strong></h5>
									<p>
										<strong>
											<?php echo $this->lang->line('term2_1_1');?>
										</strong>
									</p>
									<label></label>
									<h5 style="color: black;"><strong><?php echo $this->lang->line('term2_2');?></strong></h4>
									<p>
										<strong>
											<?php echo $this->lang->line('term2_2_1');?>
										</strong>
									</p>
									<label></label>
									<h5 style="color: black;"><strong><?php echo $this->lang->line('term2_3');?></strong></h5>
									<p>
										<strong>
											<?php echo $this->lang->line('term2_3_1');?>
										</strong>
									</p>
									<label></label>
									<h5 style="color: black;"><strong><?php echo $this->lang->line('term2_4');?></strong></h5>
									<p>
										<strong>
											<?php echo $this->lang->line('term2_3_1');?>
										</strong>
									</p>
									<label></label>
									<h5 style="color: black;"><strong><?php echo $this->lang->line('term2_5');?></strong></h5>
									<p>
										<strong>
											<?php echo $this->lang->line('term2_5_1');?>
										</strong>
									</p>
									<label></label>
									<h5 style="color: black;"><strong><?php echo $this->lang->line('term2_6');?></strong></h5>
									<p>
										<strong>
											<?php echo $this->lang->line('term2_6_1');?>
										</strong>
									</p>
									<label></label>
									<h4 style="color: black; text-align: center;"><strong><?php echo $this->lang->line('term3');?></strong></h4>
									<h5 style="color: black;"><strong><?php echo $this->lang->line('term3_1');?></strong></h5>
									<p>
										<strong>
											<?php echo $this->lang->line('term3_1_1');?>
										</strong>
									</p>
									<label></label>
									<h5 style="color: black;"><strong><?php echo $this->lang->line('term3_2');?></strong></h5>
									<p>
										<strong>
											<?php echo $this->lang->line('term3_2_1');?>
										</strong>
									</p>
									<label></label>
									<h5 style="color: black;"><strong><?php echo $this->lang->line('term3_3');?></strong></h5>
									<p>
										<strong>
											<?php echo $this->lang->line('term3_3_1');?>
										</strong>
									</p>
									<label></label>
									<h5 style="color: black;"><strong><?php echo $this->lang->line('term3_4');?></strong></h5>
									<p>
										<strong>
											<?php echo $this->lang->line('term3_4_1');?>
										</strong>
									</p>
									<label></label>
									<h4 style="color: black; text-align: center;"><strong><?php echo $this->lang->line('term4');?></strong></h4>
									<h5 style="color: black;"><strong><?php echo $this->lang->line('term4_1');?></strong></h5>
									<p>
										<strong>
											<?php echo $this->lang->line('term4_1_1');?>
										</strong>
									</p>
									<label></label>
									<h5 style="color: black;"><strong><?php echo $this->lang->line('term4_2');?></strong></h5>
									<p>
										<strong>
											<?php echo $this->lang->line('term4_2_1');?>
										</strong>
									</p>
									<label></label>
									<h5 style="color: black;"><strong><?php echo $this->lang->line('term4_3');?></strong></h5>
									<p>
										<strong>
											<?php echo $this->lang->line('term4_3_1');?>
										</strong>
									</p>
									<label></label>
									<h5 style="color: black;"><strong><?php echo $this->lang->line('term4_4');?></strong></h5>
									<p>
										<strong>
											<?php echo $this->lang->line('term4_4_1');?>
										</strong>
									</p>
									<label></label>
									<h5 style="color: black;"><strong><?php echo $this->lang->line('term4_5');?></strong></h5>
									<p>
										<strong>
											<?php echo $this->lang->line('term4_5_1');?>
										</strong>
									</p>
									<label></label>
									<h5 style="color: black;"><strong><?php echo $this->lang->line('term4_6');?></strong></h5>
									<p>
										<strong>
											<?php echo $this->lang->line('term4_6_1');?>
										</strong>
									</p>
									<label></label>
									<h5 style="color: black;"><strong><?php echo $this->lang->line('term4_7');?></strong></h5>
									<p>
										<strong>
											<?php echo $this->lang->line('term4_7_1');?>
										</strong>
									</p>
									<label></label>
									<h5 style="color: black;"><strong><?php echo $this->lang->line('term4_8');?></strong></h5>
									<p>
										<strong>
											<?php echo $this->lang->line('term4_8_1');?>
										</strong>
									</p>
									<label></label>
									<h5 style="color: black;"><strong><?php echo $this->lang->line('term4_9');?></strong></h5>
									<p>
										<strong>
											<?php echo $this->lang->line('term4_9_1');?>
										</strong>
									</p>
									<label></label>
									<h4 style="color: black; text-align: center;"><strong><?php echo $this->lang->line('term5');?></strong></h4>
									<h5 style="color: black;"><strong><?php echo $this->lang->line('term5_1');?></strong></h5>
									<p>
										<strong>
											<?php echo $this->lang->line('term5_1_1');?>
										</strong>
									</p>
									<label></label>
									<h5 style="color: black;"><strong><?php echo $this->lang->line('term5_2');?></strong></h5>
									<p>
										<strong>
											<?php echo $this->lang->line('term5_2_1');?>
										</strong>
									</p>
									<label></label>
									<h5 style="color: black;"><strong><?php echo $this->lang->line('term5_3');?></strong></h5>
									<p>
										<strong>
											<?php echo $this->lang->line('term5_3_1');?>
										</strong>
									</p>
									<label></label>
									<h4 style="color: black; text-align: center;"><strong><?php echo $this->lang->line('term6');?></strong></h4>
									<p>
										<strong>
											<?php echo $this->lang->line('term6_1');?>
										</strong>
									</p>
									<label></label>
								</div>
								<div class="col-sm-11" style="margin: 0px 10px 10px;">
									<input type="checkbox" id="agreement" name="agreement"><?php echo $this->lang->line('agreement'); ?>
								</div>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>