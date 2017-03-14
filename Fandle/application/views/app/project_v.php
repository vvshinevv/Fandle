			<?php
				//var_dump($projects_views);
				if(($this->uri->segment(3) == 'ko') || ($this->uri->segment(3) == '')) {
					$p_table = 'projects_ko';
					$stateOpen = '진행 중'; $stateClose = '종료'; $stateTotal = '전체'; $rate = 1;
				} else if(($this->uri->segment(3) == 'en')) {
					$p_table = 'projects_en';
					$stateOpen = 'Open'; $stateClose = 'Close'; $stateTotal = 'Total'; $rate = 1176.5;
				} else {
					$p_table = 'projects_ch';
					$stateOpen = '进行中'; $stateClose = '结束'; $stateTotal = '全部'; $rate = 169.51;
				}

			?>
			<section class="section light-gray-bg clearfix" style="padding-top: 50px;">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<ul class="nav nav-pills" role="tablist">
								<li class="active"><a href="#pill-1" role="tab" data-toggle="tab" title="Latest Arrivals"><i class="icon-star"></i><?php echo $stateTotal; ?></a></li>
								<li><a href="#pill-2" role="tab" data-toggle="tab" title="Featured"><i class="icon-heart"></i><?php echo $stateOpen; ?></a></li>
								<li><a href="#pill-3" role="tab" data-toggle="tab" title="Top Sellers"><i class=" icon-up-1"></i><?php echo $stateClose; ?></a></li>

							</ul>
							<!-- Tab panes -->
							<div class="tab-content clear-style">
								<div class="tab-pane active" id="pill-1">
									<div class="row masonry-grid-fitrows grid-space-10">
										<?php
											foreach ($projects_views as $pv) {
												$percent_val = round(($pv->gather_amount / $pv->target_amount) * 100);
												if($percent_val	>= 100) {
													$percent = 100;
												} else {
													$percent = $percent_val;
												}
										?>
										<div class="col-md-3 col-sm-6 masonry-grid-item">
											<div class="listing-item white-bg bordered mb-20">
												<div class="overlay-container">
													<img src="<?php echo $pv->project_img; ?>" alt="">
													<a class="overlay-link" href="/index.php/path/project_detail/<?php echo $p_table; ?>/projects_num/<?php echo $pv->projects_num; ?>">
												</div>
												<div class="body">
													<h5><a href="/index.php/path/project_detail/<?php echo $p_table; ?>/projects_num/<?php echo $pv->projects_num; ?>"><?php echo $pv->subject; ?></a></h5>
													<p class="small" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; word-wrap:break-word; line-height: 1.2em; height: 3.6em; font-size: 13px;"><?php echo $pv->summary; ?></p>

													<div class="progress style-2 dark" style="margin: 0 0">
														<span class="text"></span>
														<div class="progress-bar progress-bar-white" role="progressbar" data-animate-width="<?php echo $percent?>%">
															<span class="label object-non-visible" data-animation-effect="fadeInLeftSmall" data-effect-delay="1000"></span>
														</div>
													</div>
													<div class="clearfix stats padding-bottom-clear">
														<div class="col-md-3 col-xs-3 text-center">
															<div class="feature-box object-non-visible" data-animation-effect="fadeIn" data-effect-delay="300" style="margin: 0 0 0 0;">
																<strong><span class="counter" data-to="<?php echo $pv->funding_user_count; ?>" data-speed="4000" style="font-size: 14px; display: inline;">0</span></strong>
																<h6 style="margin: 0 0 0 0; padding: 0 0 0 0; font-size: 10px;"><?php echo $this->lang->line('percent'); ?></h6>

															</div>
														</div>
														<div class="col-md-3 col-xs-3 text-center">
															<div class="feature-box object-non-visible" data-animation-effect="fadeIn" data-effect-delay="300" style="margin: 0 0 0 0;">
																<strong><span class="counter" data-to="<?php echo $pv->period; ?>" data-speed="4000" style="font-size: 14px; display: inline;">0</span></strong>
																<h6 style="margin: 0 0 0 0; padding: 0 0 0 0; font-size: 10px;"><?php echo $this->lang->line('day'); ?></h6>
															</div>
														</div>
														<div class="col-md-3 col-xs-3 text-center">
															<div class="feature-box object-non-visible" data-animation-effect="fadeIn" data-effect-delay="300" style="margin: 0 0 0 0;">
																<strong><?php echo $this->lang->line('currency'); ?><span class="counter" data-to="<?php echo round($pv->gather_amount/$rate, 2); ?>" data-speed="4000" style="font-size: 14px; display: inline;"><?php echo round($pv->gather_amount/$rate, 2); ?></span></strong>
																<h6 style="margin: 0 0 0 0; padding: 0 0 0 0; font-size: 10px;"><?php echo $this->lang->line('pledgeOf'); ?></h6>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<?php
											}
										?>
									</div>
								</div>
								
								<div class="tab-pane" id="pill-2">
									<div class="row masonry-grid-fitrows grid-space-10">
										<?php
											foreach ($projects_views as $pv) {
												if ($pv->state == 1) {

													$percent_val = round(($pv->gather_amount / $pv->target_amount) * 100);
													if ($percent_val >= 100) {
														$percent = 100;
													} else {
														$percent = $percent_val;
													}
										?>

													<div class="col-md-3 col-sm-6 masonry-grid-item">
														<div class="listing-item white-bg bordered mb-20">
															<div class="overlay-container">
																<img src="<?php echo $pv->project_img; ?>" alt="">
																<a class="overlay-link" href="/index.php/path/project_detail/<?php echo $p_table; ?>/projects_num/<?php echo $pv->projects_num; ?>">
															</div>
															<div class="body">
																<h5><a href="/index.php/path/project_detail/<?php echo $p_table; ?>/projects_num/<?php echo $pv->projects_num; ?>"><?php echo $pv->subject; ?></a></h5>
																<p class="small" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; word-wrap:break-word; line-height: 1.2em; height: 3.6em; font-size: 13px;"><?php echo $pv->summary; ?></p>

																<div class="progress style-2 dark" style="margin: 0 0">
																	<span class="text"></span>
																	<div class="progress-bar progress-bar-white" role="progressbar" data-animate-width="<?php echo $percent?>%">
																		<span class="label object-non-visible" data-animation-effect="fadeInLeftSmall" data-effect-delay="1000"></span>
																	</div>
																</div>
																<div class="clearfix stats padding-bottom-clear">
																	<div class="col-md-3 col-xs-3 text-center">
																		<div class="feature-box object-non-visible" data-animation-effect="fadeIn" data-effect-delay="300" style="margin: 0 0 0 0;">
																			<strong><span class="counter" data-to="<?php echo $pv->funding_user_count; ?>" data-speed="4000" style="font-size: 14px; display: inline;">0</span></strong>
																			<h6 style="margin: 0 0 0 0; padding: 0 0 0 0; font-size: 10px;"><?php echo $this->lang->line('percent'); ?></h6>

																		</div>
																	</div>
																	<div class="col-md-3 col-xs-3 text-center">
																		<div class="feature-box object-non-visible" data-animation-effect="fadeIn" data-effect-delay="300" style="margin: 0 0 0 0;">
																			<strong><span class="counter" data-to="<?php echo $pv->period; ?>" data-speed="4000" style="font-size: 14px; display: inline;">0</span></strong>
																			<h6 style="margin: 0 0 0 0; padding: 0 0 0 0; font-size: 10px;"><?php echo $this->lang->line('day'); ?></h6>
																		</div>
																	</div>
																	<div class="col-md-3 col-xs-3 text-center">
																		<div class="feature-box object-non-visible" data-animation-effect="fadeIn" data-effect-delay="300" style="margin: 0 0 0 0;">
																			<strong><?php echo $this->lang->line('currency'); ?><span class="counter" data-to="<?php echo round($pv->gather_amount/$rate, 2); ?>" data-speed="4000" style="font-size: 14px; display: inline;"><?php echo round($pv->gather_amount/$rate, 2); ?></span></strong>
																			<h6 style="margin: 0 0 0 0; padding: 0 0 0 0; font-size: 10px;"><?php echo $this->lang->line('pledgeOf'); ?></h6>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
										<?php
												}
											}
										?>
									</div>
								</div>

								<div class="tab-pane" id="pill-3">
									<div class="row masonry-grid-fitrows grid-space-10">
										<?php
											foreach ($projects_views as $pv) {
												if ($pv->state == 0) {

													$percent_val = round(($pv->gather_amount / $pv->target_amount) * 100);
													if ($percent_val >= 100) {
														$percent = 100;
													} else {
														$percent = $percent_val;
													}
													?>
													<div class="col-md-3 col-sm-6 masonry-grid-item">
														<div class="listing-item white-bg bordered mb-20">
															<div class="overlay-container">
																<img src="<?php echo $pv->project_img; ?>" alt="">
																<a class="overlay-link" href="/index.php/path/project_detail/<?php echo $p_table; ?>/projects_num/<?php echo $pv->projects_num; ?>">
															</div>
															<div class="body">
																<h5><a href="/index.php/path/project_detail/<?php echo $p_table; ?>/projects_num/<?php echo $pv->projects_num; ?>"><?php echo $pv->subject; ?></a></h5>
																<p class="small" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; word-wrap:break-word; line-height: 1.2em; height: 3.6em; font-size: 13px;"><?php echo $pv->summary; ?></p>

																<div class="progress style-2 dark" style="margin: 0 0">
																	<span class="text"></span>
																	<div class="progress-bar progress-bar-white" role="progressbar" data-animate-width="<?php echo $percent?>%">
																		<span class="label object-non-visible" data-animation-effect="fadeInLeftSmall" data-effect-delay="1000"></span>
																	</div>
																</div>
																<div class="clearfix stats padding-bottom-clear">
																	<div class="col-md-3 col-xs-3 text-center">
																		<div class="feature-box object-non-visible" data-animation-effect="fadeIn" data-effect-delay="300" style="margin: 0 0 0 0;">
																			<strong><span class="counter" data-to="<?php echo $pv->funding_user_count; ?>" data-speed="4000" style="font-size: 14px; display: inline;">0</span></strong>
																			<h6 style="margin: 0 0 0 0; padding: 0 0 0 0; font-size: 10px;"><?php echo $this->lang->line('percent'); ?></h6>

																		</div>
																	</div>
																	<div class="col-md-3 col-xs-3 text-center">
																		<div class="feature-box object-non-visible" data-animation-effect="fadeIn" data-effect-delay="300" style="margin: 0 0 0 0;">
																			<strong><span class="counter" data-to="<?php echo $pv->period; ?>" data-speed="4000" style="font-size: 14px; display: inline;">0</span></strong>
																			<h6 style="margin: 0 0 0 0; padding: 0 0 0 0; font-size: 10px;"><?php echo $this->lang->line('day'); ?></h6>
																		</div>
																	</div>
																	<div class="col-md-3 col-xs-3 text-center">
																		<div class="feature-box object-non-visible" data-animation-effect="fadeIn" data-effect-delay="300" style="margin: 0 0 0 0;">
																			<strong><?php echo $this->lang->line('currency'); ?><span class="counter" data-to="<?php echo round($pv->gather_amount/$rate, 2); ?>" data-speed="4000" style="font-size: 14px; display: inline;"><?php echo round($pv->gather_amount/$rate, 2); ?></span></strong>
																			<h6 style="margin: 0 0 0 0; padding: 0 0 0 0; font-size: 10px;"><?php echo $this->lang->line('pledgeOf'); ?></h6>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
										<?php
												}
											}
										?>

									</div>
								</div>






							</div>
							<!-- pills end -->
						</div>
					</div>
				</div>
			</section>
			<!-- section end -->