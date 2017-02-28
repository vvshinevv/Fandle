
			<script type="text/javascript" src="/static/js/social_accounts.js"></script>
			<script type="text/javascript" src="/static/js/jquery.qrcode.js"></script>
			<script type="text/javascript" src="/static/js/qrcode.js"></script>


			<?php
				$url = "http://www.fandle.net/index.php/".$this->uri->uri_string();
				//echo $project_views[0]->youtube_img;
			if($this->uri->segment(3) == '' || $this->uri->segment(3) == 'ko' || $this->uri->segment(3) == 'projects_ko') {
				$rate = 1;
			} else if($this->uri->segment(3) == 'en' || $this->uri->segment(3) == 'projects_en') {
				$rate = 1176.5;
			} else {
				$rate = 169.51;
			}

			?>


			<script>
				function sharefacebook() {
					FB.ui({
						method: 'share',
						href: '<?= $url ?>',
						title: '<?= $project_views[0]->subject ?>',
						picture: '<?= $project_views[0]->youtube_img ?>',
						display: 'popup',
						description: '<?= $project_views[0]->summary ?>'

					}, function(response){
						if (response && !response.error_message) {
							alert('Posting completed.');
						} else {
							alert('Error while posting.');
						}
					});
				}
			</script>
			<?php
				$i = sizeof($progress_update_views);

				//echo $url;

				foreach ($project_views as $pv) {
					echo "<script type='text/javascript'>
							$(window).load( function() {
								var tag = document.createElement('script');
								tag.src = '//www.youtube.com/iframe_api';
								var firstScriptTag =  document.getElementsByTagName('script')[0];
								firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

			    				var player;
			    				onYouTubeIframeAPIReady = function () {
							        player = new YT.Player('player', {
							            height: '395px',
							            width: 'auto',
							            videoId: '$pv->youtube_url',
							            playerVars: {
							                'autoplay': 0,
							                'rel': 0,
							                'showinfo': 0
							            },
							            events: {
							                'onStateChange': onPlayerStateChange
							            }
							        });
						    	}

						    	var p = document.getElementById ('player');
			    				$(p).hide();

			    				var t = document.getElementById('youtube_img');
			    				t.src = '$pv->youtube_img';

			    				onPlayerStateChange = function (event) {
							        if (event.data == YT.PlayerState.ENDED) {
							            $('#start_video').fadeIn('normal');
							        }
							    }

							    $(document).on('click', '#start_video', function () {
							        $(this).hide();
							        $('#player').show();
							        $('#overlay-container').hide();
							        player.playVideo();
							    });
							});
						</script>";
				}
			?>



			<?php
				foreach ($project_views as $pv) {
					$percent_val = round(($pv->gather_amount / $pv->target_amount) * 100);
					if($percent_val	>= 100) {
						$percent = 100;
					} else {
						$percent = $percent_val;
					}
			?>



			<div class="pv-40 footer-top" style="background-image: url('/static/img/pro_detail.png'); background-size: 100% auto;  background-repeat: no-repeat;">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<h2 class="text-center"><strong><?php echo $pv->subject; ?></strong></h2>
						</div>
					</div>
					<div class="row mb-20">
						<div class="col-lg-7">
							<div id="player" style="width: 100%;"></div>
							<div class="overlay-container" id="overlay-container">
								<img class="youtube_img" id="youtube_img"/>
								<a class="overlay-link" id="start_video"><i class="icon-play-1"></i></a>
							</div>
							<h4><?php echo $pv->summary; ?></h4>
						</div>
						
						<div class="col-lg-4">
<!--							<div style="text-align: right;">--><?php //echo substr($pv->launch_date, 0, 10);?><!-- ~ --><?php //echo substr($pv->due_date, 0, 10); ?><!--</div>-->

							<div style="position: relative; margin-top: 0;">
								<h1 style="display: inline; margin: 0 0;"><strong><?php echo $pv->funding_user_count; ?></strong></h1>
<!--								<span class="badge" style="position: absolute; right: 0;">-->
<!--								 --><?php
//								 	if($pv->state == 0) {
//								 		echo $this->lang->line('close');
//								 	} else if($pv->state == 2) {
//										echo $this->lang->line('yet');
//								 	} else {
//										echo $this->lang->line('open');
//								 	}
//								 ?>
<!--								</span>-->

							</div>
							<strong style="font-size: 13px;"><?php echo $this->lang->line('backer'); ?></strong>

							
							<div style="margin-top:0;">
								<h1 style="margin-bottom:0;"><strong><?php echo $pv->period; ?></strong></h1>
								<strong style="font-size: 13px;"><?php echo $this->lang->line('day'); ?></strong>
							</div>

							
							<div style="margin-top:0;">
								<h1 style="margin-bottom:0;"><strong><?php echo $this->lang->line('currency')." ".round($pv->gather_amount/$rate, 2); ?></strong></h1>
<!--								<strong style="font-size: 13px;">--><?php //echo $this->lang->line('target'); ?><!----><?php //echo ": ";?><!-- --><?php //echo $this->lang->line('currency'); ?><!----><?php //echo $pv->target_amount; ?><!-- --><?php //echo $this->lang->line('goal'); ?><!--</strong>-->
							</div>

							<div class="progress style-2 dark">
								<span class="text"></span>
								<div class="progress-bar progress-bar-white" role="progressbar" data-animate-width="<?php echo $percent; ?>">
									<span class="label object-non-visible" data-animation-effect="fadeInLeftSmall" data-effect-delay="1000"></span>
								</div>
							</div>

							<div>
								<h5 style="margin-bottom: 0;"><?php echo $this->lang->line('share'); ?></h5>
								<a target="_blank" href="javascript:sharefacebook()" class="btn btn-animated btn-sm facebook">Facebook<i class="pl-10 fa fa-facebook-square"></i></a>
								<a class="btn btn-animated btn-sm vimeo" href="" data-toggle="modal" data-target="#myModal">Wechat<i class="fa fa-weixin"></i></a>
								<a class="btn btn-animated btn-sm pinterest" href="" data-toggle="modal" data-target="#myModal">Weibo<i class="fa fa-weibo"></i></a>
							</div>


							<div class="modal fade bs-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-sm">
									<div class="modal-content">
										<div class="modal-body">
											<div id="qrcodeTable"></div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-sm btn-dark" data-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div>

							<div class="mt-10" style="text-align: center;">

								<a class="btn radius-50 btn-danger btn-xl" href="/index.php/path/pledge/<?php echo $this->uri->segment(3); ?>/projects_num/<?php echo $this->uri->segment(5); ?>">
									Donate now <i class=" icon-star-1"></i>
								</a>
							</div>		
						</div>
					</div>

					
<!--					<div class="col-lg-7">-->
<!--						<h4>--><?php //echo $pv->summary; ?><!--</h4>-->
<!--					</div>-->
				</div>
			</div>

			<div id="tab"></div>
			<div class="container">
				<div class="row mb-20">
					<div class="col-lg-7">
						<ul class="nav nav-tabs nav-justified style-2" role="tablist">
							<li class="active"><a href="#h2tab1" role="tab" data-toggle="tab"><?php echo $this->lang->line('projectSynopsis'); ?></a></li>
							<li><a href="#h2tab2" role="tab" data-toggle="tab"><?php echo $this->lang->line('update'); ?>(<?php echo sizeof($progress_update_views); ?>)</a></li>
							<li><a href="#h2tab3" role="tab" data-toggle="tab"><?php echo $this->lang->line('comment'); ?>(<?php echo sizeof($project_comment_views); ?>)</a></li>
							<li><a href="#h2tab4" role="tab" data-toggle="tab"><?php echo $this->lang->line('participant'); ?></a></li>
						</ul>
						
						<div class="tab-content">
							<div class="tab-pane in active" id="h2tab1">
								<div class="row ph-20">
									<?php echo $pv->contents; ?>
								</div>
							</div>
							<!-- UPDATE 부분 -->
							<div class="tab-pane" id="h2tab2">
								<div class="row ph-20">
									<ul class="pagination">
										<?php 
											foreach ($progress_update_views as $puv) {
												
												if($i == sizeof($progress_update_views)) {
										?>
													<li class="active">
														<a href="#update<?php echo $i; ?>" role="tab" data-toggle="tab"><?php echo $i; ?></a>
													</li>
										<?php
												} else {
										?>
													<li>
														<a href="#update<?php echo $i; ?>" role="tab" data-toggle="tab"><?php echo $i; ?></a>
													</li>
										<?php
												}
												$i--;
											}
										?>
									
									</ul>
									<div class="tab-content">
										<?php
											$i = sizeof($progress_update_views);
											foreach ($progress_update_views as $puv) {
												
												if($i == sizeof($progress_update_views)) {
										?>
													<div class="tab-pane in active" id="update<?php echo $i; ?>">
														<div class="row ph-20">
															<h2>
																<strong>
																<?php
																	echo $puv->progress_subject;
																?>
																</strong>
															</h2>
															<?php
																echo $puv->progress_contents;
															?>
															<?php
																if($puv->progress_youtube_url != NULL) {
															?>
																<div class="text-center">
																	<iframe width="100%" height="395px" src="https://www.youtube.com/embed/<?php echo $puv->progress_youtube_url; ?>" frameborder="0" allowfullscreen></iframe>
																</div>
															<?php
																}
															?>
														</div>
													</div>
										<?php
												} else {
										?>
													<div class="tab-pane" id="update<?php echo $i; ?>">
														<div class="row ph-20">
															<h2>
																<strong>
																<?php
																	echo $puv->progress_subject;
																?>
																</strong>
															</h2>
															<?php
																echo $puv->progress_contents;
															?>
															<?php
																if($puv->progress_youtube_url != NULL) {
															?>
																<div class="text-center">
																	<iframe width="100%" height="395px" src="https://www.youtube.com/embed/<?php echo $puv->progress_youtube_url; ?>" frameborder="0" allowfullscreen></iframe>
																</div>
																	
															<?php
																}
															?>

														</div>
													</div>
										<?php
												}
												$i--;
											}
										?>		
									</div>
								</div>
							</div>

							<!-- 프로젝트 댓글 
							===============================-->
							<div class="tab-pane" id="h2tab3">
								<div class="row ph-20">
									<div id="comments" class="comments" style="margin-top: 0;">
										<?php 
											foreach ($project_comment_views as $pcv) {
										?>
												<div class="comment clearfix" id="row_num_<?php echo $pcv->projects_comment_id; ?>">
													<header>
														<div class="comment-meta pull-right"><button id="comment_delete" vals="<?php echo $pcv->projects_comment_id; ?>" style="border: 0; outline: 0; background-color: #ffffff;  background-color: rgba( 255, 255, 255, 0 );"><?php echo $this->lang->line('delete'); ?><i class="icon-trash"></i></button></div>
														<div class="comment-meta" style="font-weight: bold;"><?php echo $pcv->nickname; ?> | <?php echo $pcv->reg_date; ?></div>
													</header>
													<div class="comment-content">
														<div class="comment-body clearfix">
															<p><?php echo $pcv->contents; ?> </p>
														</div>
													</div>
												</div>
										<?php
											}
										?>
									</div>

									<div>
										<form method="post" action="" name="com_add">
											<div class="form-group has-feedback">
												<label for="message4"><?php echo $this->lang->line('comment');?></label>
												<textarea class="form-control" rows="8" placeholder="" id="comment_contents" name="comment_contents" required></textarea>
												<i class="fa fa-envelope-o form-control-feedback"></i>
												<input type="button" value="<?php echo $this->lang->line('submit');?>" class="btn square btn-danger pull-right" id="comment_add">
											</div>
										</form>
									</div>

								</div>
							</div>

							<div class="tab-pane" id="h2tab4">
								<div class="row ph-20">
									<div class="form-block center-block" align="center">
										<img src="/static/movie/gongsa.gif">
									</div>
									<p align="center"><strong>알리페이 개발 이후 개설 예정</strong></p>
								</div>
							</div>

						</div>
					</div>

					<div class="col-lg-4">

						<?php
						foreach ($reward_views as $rv) {
							?>

							<a href="/index.php/path/payment/<?php echo $this->uri->segment(3);?>/projects_num/<?php echo $this->uri->segment(5); ?>/reward_id/<?php echo $rv->reward_id; ?>" style="text-decoration: none; color: #777777;">
								<div class="pv-20 ph-20 feature-box light-gray-bg bordered text-left object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="100" style="margin: 5px 5px;">
									<?php
									if($rv->state == 1) {
										?>
										<h3 style="display: inline; margin: 0 0 0 10px; color: indianred;"><?php echo $this->lang->line('currency'); ?> <?php echo round(($rv->reward_amount/$rate), 2); ?></h3>
										<span class="badge pull-right" style="border-radius: 2px; background-color: indianred">
											<?php echo $this->lang->line('available'); ?>
										</span>
										<?php
									} else {
										?>
										<h3 style="display: inline; margin: 0 0 0 10px;"><?php echo $this->lang->line('currency'); ?> <?php echo round(($rv->reward_amount/$rate), 2); ?></h3>
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
			<?php	
			}
			?>

			<script>
				//jQuery('#qrcode').qrcode("this plugin is great");
				jQuery('#qrcodeTable').qrcode({

					text	: "<?= $url ?>"
				});
			</script>
