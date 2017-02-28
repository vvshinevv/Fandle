	<label></label>
	<?php 
		//var_dump($reward_views);
	?>
	<section class="section light-gray-bg clearfix">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<?php 
						foreach ($project_views as $pv) {
					?>
							<h2 class="text-center"><?php echo $pv->subject; ?></h2>
							<div class="separator"></div>
					<?php
						}
					?>				
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
						<?php
						foreach ($reward_views as $rv) {
							?>

							<a href="/index.php/path/payment/<?php echo $this->uri->segment(3);?>/projects_num/<?php echo $this->uri->segment(5); ?>/reward_id/<?php echo $rv->reward_id; ?>" style="text-decoration: none; color: #777777;">
								<div class="pv-20 ph-20 feature-box light-gray-bg bordered text-left object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="100" style="margin: 5px 5px;">
									<?php
									if($rv->state == 1) {
										?>
										<h3 style="display: inline; margin: 0 0 0 10px; color: indianred;"><?php echo $this->lang->line('currency'); ?> <?php echo $rv->reward_amount; ?></h3>
										<span class="badge pull-right" style="border-radius: 2px; background-color: indianred">
											<?php echo $this->lang->line('available'); ?>
											</span>
										<?php
									} else {
										?>
										<h3 style="display: inline; margin: 0 0 0 10px;"><?php echo $this->lang->line('currency'); ?> <?php echo $rv->reward_amount; ?></h3>
										<span class="badge pull-right" style="border-radius: 2px;">
											<?php echo $this->lang->line('notAvailable'); ?>
											</span>
										<?php
									}
									?>


									<div class="separator" style="margin-top: 10px;"></div>

									<p style="margin: 0 0 0 20px;"><strong><?php echo $rv->reward_subject; ?></strong></p>
									<p class="mv-5"><?php echo $rv->reward_contents; ?></p>
								</div>
							</a>

							<?php
						}
						?>
				</div>


			</div>			
		</div>
	</section>