			<?php
				//var_dump($projects_views);
				if(($this->uri->segment(3) == 'ko') || ($this->uri->segment(3) == '')) {
					$p_table = 'projects_ko'; $lang = 'ko'; $rate = 1;
				} else if(($this->uri->segment(3) == 'en')) {
					$p_table = 'projects_en'; $lang = 'en';  $rate = 1176.5;
				} else {
					$p_table = 'projects_ch'; $lang = 'ch'; $rate = 169.51;
				}

//			echo "<script type='text/javascript'>
//							$(window).load( function() {
//								var tag = document.createElement('script');
//								tag.src = '//www.youtube.com/iframe_api';
//								var firstScriptTag =  document.getElementsByTagName('script')[0];
//								firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
//
//			    				var player;
//			    				onYouTubeIframeAPIReady = function () {
//							        player = new YT.Player('player', {
//							            height: '395px',
//							            width: 'auto',
//							            videoId: 'QDiSwBA8QYQ',
//							            playerVars: {
//							                'autoplay': 0,
//							                'rel': 0,
//							                'showinfo': 0
//							            },
//							            events: {
//							                'onStateChange': onPlayerStateChange
//							            }
//							        });
//						    	}
//
//						    	var p = document.getElementById ('player');
//			    				$(p).hide();
//
//			    				var t = document.getElementById('youtube_img');
//			    				t.src = 'http://52.78.64.172/static/img/lauch.jpg';
//
//			    				onPlayerStateChange = function (event) {
//							        if (event.data == YT.PlayerState.ENDED) {
//							            $('#start_video').fadeIn('normal');
//							        }
//							    }
//
//							    $(document).on('click', '#start_video', function () {
//							        $(this).hide();
//							        $('#player').show();
//							        $('#overlay-container').hide();
//							        player.playVideo();
//							    });
//							});
//						</script>"
//
//
//			?>
			<div class="banner clearfix" style="position: relative;">
				<div class="slideshow">
					<div class="slider-banner-container">
						<div class="slider-banner-fullwidth-big-height">
							<ul class="slides">
								<li>
									<img src="/static/movie/main-oh3.png" style="max-width: 100%; height: auto;">
									<div class="tp-caption tp-fade fadeout fullscreenvideo"
										 data-x="0"
										 data-y="0"
										 data-speed="1000"
										 data-start="1100"
										 data-elementdelay="0.01"
										 data-endelementdelay="0.1"
										 data-endspeed="1500"
										 data-endeasing="Power4.easeIn"
										 data-autoplay="true"
										 data-autoplayonlyfirsttime="false"
										 data-volume="mute"
										 data-forceCover="1"
										 data-aspectratio="16:9"
										 data-forcerewind="on"
										 style="z-index: 2;" style="padding: 0;">
										<video class="" preload="none" width="100%" height="100%">
											<source src='/static/movie/movieMain.mp4' type='video/mp4'/>
										</video>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<img src="/static/movie/pink.png" style="position: absolute; bottom: 0; left:0; z-index: 20; background-size: cover;">
					<img src="/static/movie/black.png" style="position: absolute; bottom: 0; right:0; z-index: 20;">
					<img src="/static/movie/d_logo.png" style="opacity: 0.8; filter: alpha(opacity=80); position: absolute; bottom: 0; z-index: 20;">
				</div>
			</div>
			<label></label>
			<div id="page-start">
<!--				<img src="/static/movie/top.png">-->
				<!-- footer top start -->
				<!-- ================ -->
				<div class="footer-top" style="margin: 0 auto;">
					<div class="container" style="margin: 0 auto;">
                        <div class="col-md-10 space-top text-center" style="float: none; margin: 0 auto;">
                            <img src="/static/movie/d_fa.png" width="25px" height="auto" style="margin-bottom:10px; display: inline-block;"/>
                            <h3 style="display:inline; padding:0; color: #000; font-weight: bold;"> 's Project</h3>
                        </div>
						<label></label>
						<div class="project-box col-md-8 space-top">
							<?php
							foreach ($main_project_views as $mpv) {
							$percent_val = round(($mpv->gather_amount / $mpv->target_amount) * 100);
							if($percent_val	>= 100) {
								$percent = 100;
							} else {
								$percent = $percent_val;
							}
							?>
								<span class="badge pull-right project-box-date">
									<?php echo $this->lang->line('day'); ?><?php echo ": ".$mpv->period; ?>
								</span>
								<div class="overlay-container">
									<img src="<?php echo $mpv->project_img; ?>">
									<a class="overlay-link" href="/index.php/path/project_detail/<?php echo $p_table; ?>/projects_num/<?php echo $mpv->projects_num; ?>"></a>
								</div>
								<h3 style="margin-left: 10px;">
									<strong><a href="/index.php/path/project_detail/<?php echo $p_table; ?>/projects_num/<?php echo $mpv->projects_num; ?>"><?php echo $mpv->subject; ?></a></strong>
								</h3>
								<div class="text-right pr-10 clearfix">
									<p>
										<a href="/index.php/path/project_detail/<?php echo $p_table; ?>/projects_num/<?php echo $mpv->projects_num; ?>">
											더보기 >
										</a>
									</p>
								</div>


<!--							<div class="col-md-6">-->
<!--								<p style="font-size: 15px;">--><?php //echo $mpv->summary; ?><!--</p>-->


<!--								<h5><span class="text-default">--><?php //echo $this->lang->line('pledgeOf'); ?><!--  </span><strong>--><?php //echo $mpv->gather_amount; ?><!--</strong></h5>-->
<!--								<div class="progress style-2 dark" style="margin: 0 0 10px 0">-->
<!--									<div class="progress-bar progress-bar-white" role="progressbar" data-animate-width="--><?php //echo $percent?><!--%">-->
<!--										<span class="label object-non-visible" data-animation-effect="fadeInLeftSmall" data-effect-delay="1000"></span>-->
<!--									</div>-->
<!--								</div>-->
<!--								<div style="font-size: 13px; margin-bottom: 0; text-align: right;">-->
<!--									<strong>--><?php //echo $this->lang->line('target'); ?><!-- : </strong>--><?php //echo $mpv->target_amount; ?>
<!--								</div>-->

<!--								<div class="clearfix stats">-->
<!--									<div class="col-md-2 col-xs-2 text-center" style="padding: 0 0 0 0;">-->
<!--										<div class="feature-box object-non-visible" data-animation-effect="fadeIn" data-effect-delay="300" style="margin: 0 0 0 0;">-->
<!--											<strong><span class="counter" data-to="--><?php //echo $percent; ?><!--" data-speed="4000" style="font-size: 14px; display: inline;">--><?php //echo $percent; ?><!-- </span>%</strong>-->
<!--											<h6 style="margin: 0 0 0 0; padding: 0 0 0 0; font-size: 12px;">--><?php //echo $this->lang->line('percent'); ?><!--</h6>-->
<!--										</div>-->
<!--									</div>-->
<!--									<div class="col-md-4 col-xs-4 text-center" style="padding: 0 0 0 0;">-->
<!--										<div class="feature-box object-non-visible" data-animation-effect="fadeIn" data-effect-delay="300" style="margin: 0 0 0 0;">-->
<!--											<strong>--><?php //echo $this->lang->line('currency'); ?><!-- <span class="counter" data-to="--><?php //echo round($mpv->gather_amount/$rate, 2); ?><!--" data-speed="4000" style="font-size: 14px; display: inline;">--><?php //echo round($mpv->gather_amount/$rate, 2); ?><!--</span></strong>-->
<!--											<h6 style="margin: 0 0 0 0; padding: 0 0 0 0; font-size: 12px;">--><?php //echo $this->lang->line('pledgeOf'); ?><!--</h6>-->
<!--										</div>-->
<!--									</div>-->
<!--									<div class="col-md-3 col-xs-3 text-center" style="padding: 0 0 0 0;">-->
<!--										<div class="feature-box object-non-visible" data-animation-effect="fadeIn" data-effect-delay="300" style="margin: 0 0 0 0;">-->
<!--											<strong><span class="counter" data-to="--><?php //echo $mpv->funding_user_count; ?><!--" data-speed="4000" style="font-size: 14px; display: inline;">0</span></strong>-->
<!--											<h6 style="margin: 0 0 0 0; padding: 0 0 0 0; font-size: 12px;">--><?php //echo $this->lang->line('backer'); ?><!--</h6>-->
<!--										</div>-->
<!--									</div>-->
<!--									<div class="col-md-3 col-xs-3 text-center" style="padding: 0 0 0 0;">-->
<!--										<div class="feature-box object-non-visible" data-animation-effect="fadeIn" data-effect-delay="300" style="margin: 0 0 0 0;">-->
<!--											<strong><span class="counter" data-to="--><?php //echo $mpv->period; ?><!--" data-speed="4000" style="font-size: 14px; display: inline;">0</span></strong>-->
<!--											<h6 style="margin: 0 0 0 0; padding: 0 0 0 0; font-size: 12px;">--><?php //echo $this->lang->line('day'); ?><!--</h6>-->
<!--										</div>-->
<!--									</div>-->
<!--								</div>-->
<!--							</div>-->
						</div>
						<?php
						}
						?>
					</div>
				</div>
				<!-- footer top end -->
			</div>

            <div class="separator"></div>

            <section class="section clearfix">
				<div class="col-md-10 space-top text-center" style="float: none; margin: 0 auto;">
					<img src="/static/movie/d_fa.png" width="25px" height="auto" style="margin-bottom:10px; display: inline-block;"/>
					<h3 style="display:inline; padding:0; color: #000; font-weight: bold;"> 's Update</h3>
				</div>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <iframe class="launchingYoutube" width="350px" height="400px" src="https://www.youtube.com/embed/qAY7fZYSLBY" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <div class="swiper-slide">
                            <iframe class="launchingYoutube" width="350px" height="400px" src="https://www.youtube.com/embed/k7i_8uW0McQ" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <div class="swiper-slide">
                            <iframe class="launchingYoutube" width="350px" height="400px" src="https://www.youtube.com/embed/p0px8YjQlPQ" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <div class="swiper-slide">
                            <iframe class="launchingYoutube" width="350px" height="400px" src="https://www.youtube.com/embed/xYP7GuQYzTI" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>

            </section>

            <section class="section light-gray-bg clearfix">
				<div class="col-md-10 space-top text-center" style="float: none; margin: 0 auto;">
					<img src="/static/movie/d_fa.png" width="25px" height="auto" style="margin-bottom:10px; display: inline-block;"/>
					<h3 style="display:inline; padding:0; color: #000; font-weight: bold;"> 's Story</h3>
				</div><label></label>
                <div class="owl-carousel carousel-autoplay pl-10 pr-10">
                    <div class="listing-item pl-10 pr-10 mb-20">
                        <div class="overlay-container bordered overlay-visible">
                            <img src="/static/movie/1.jpg" width="350px" height="350px">
                        </div>
                    </div>
                    <div class="listing-item pl-10 pr-10 mb-20" >
                        <div class="overlay-container bordered overlay-visible">
                            <img src="/static/movie/2.jpg" width="350px" height="350px">
                        </div>
                    </div>
                    <div class="listing-item pl-10 pr-10 mb-20">
                        <div class="overlay-container bordered overlay-visible">
                            <img src="/static/movie/3.jpg" width="350px" height="350px">
                        </div>
                    </div>
                    <div class="listing-item pl-10 pr-10 mb-20 mb-20">
                        <div class="overlay-container bordered overlay-visible">
                            <img src="/static/movie/4.jpg" width="350px" height="350px">
                        </div>
                    </div>
                    <div class="listing-item pl-10 pr-10 mb-20 mb-20">
                        <div class="overlay-container bordered overlay-visible">
                            <img src="/static/movie/6.jpg" width="350px" height="350px">
                        </div>
                    </div>
                </div>
            </section>

            <section class="section translucent-bg pv-100" style="background-image:url('/static/movie/aboutUs.jpg'); background-repeat: no-repeat; background-size: cover; margin-top: 0px;">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="call-to-action text-center">
								<div class="row">
									<div class="col-md-8 col-md-offset-2">
										<h1 class="title" style="color: white;"><strong>스타 기부</strong>의 <br/>새로운 문화를 만들다</h1>
										
										<a class="btn radius-50 btn-danger btn-xl mt-10" href="/index.php/path/about_us/<?php echo $lang; ?>">
											About Us
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>




<!--			<section class="section light-bg clearfix">-->
<!--				<div class="container">-->
<!--					<div class="row">-->
<!--						<div class="col-md-8" style="float: none; margin: 0 auto;">-->
<!--							<label style="margin-top: 70px;"></label>-->
<!--							<div class="listing-item pl-10 pr-10 mb-20">-->
<!--								<div id="player" style="width: 100%;"></div>-->
<!--								<div class="overlay-container bordered overlay-visible" id="overlay-container">-->
<!--									<img class="youtube_img" id="youtube_img"/>-->
<!--									<div class="overlay-bottom">-->
<!--										<div class="badge" style="background-color: transparent; border: 1px solid white;" >-->
<!--											<a id="start_video"><i class="icon-play-1"></i></a>-->
<!--										</div>-->
<!--									</div>-->
<!--								</div>-->
<!--							</div>-->
<!---->
<!--							<div class="listing-item pl-10 pr-10 mb-20">-->
<!--								<div class="col-md-6 listing-item" style="margin-bottom: 10px;">-->
<!--									<div class="overlay-container overlay-visible">-->
<!--										<a href="/index.php/path/about_us/--><?php //echo $lang; ?><!--"><img src="/static/img/aboutUs.png" alt=""></a>-->
<!--									</div>-->
<!--								</div>-->
<!--								<div class="col-md-6 listing-item" style="margin-bottom: 10px;">-->
<!--									<div class="overlay-container overlay-visible">-->
<!--										<a href="#"><img src="/static/img/howtowork.png" alt=""></a>-->
<!--									</div>-->
<!--								</div>-->
<!--							</div>-->
<!---->
<!---->
<!--						</div>-->
<!--					</div>-->
<!---->
<!--				</div>-->
<!--			</section>-->

			<!-- section start -->
			<!-- 프로젝트 올라가면 더 추가할 부분-->
			<!-- ================ -->
<!--			<section class="section light-bg clearfix">-->
<!--				<div class="container">-->
<!--					<div class="row">-->
<!--						<div class="col-md-10 col-md-offset-1">-->
<!--							<div class="separator"></div>-->
<!--							<h3 align="center">--><?php //echo $this->lang->line('projects'); ?><!--</h3>-->
<!--							<div class="tab-content clear-style">-->
<!--								<div class="tab-pane active" id="pill-1">-->
<!--									<div class="row masonry-grid-fitrows grid-space-10">-->
<!--									--><?php //
//										foreach ($projects_views as $pv) {
//											$percent_val = round(($pv->gather_amount / $pv->target_amount) * 100);
//											if($percent_val	>= 100) {
//												$percent = 100;
//											} else {
//												$percent = $percent_val;
//											}
//									?>
<!--										<div class="col-md-3 col-sm-6 masonry-grid-item">-->
<!--											<div class="listing-item white-bg bordered mb-20">-->
<!--												<div class="overlay-container">-->
<!--													<img src="--><?php //echo $pv->project_img; ?><!--" alt="">-->
<!--													<a class="overlay-link" href="/index.php/path/project_detail/--><?php //echo $p_table; ?><!--/projects_num/--><?php //echo $pv->projects_num; ?><!--"></i></a>-->
<!--												</div>-->
<!--												<div class="body">-->
<!--													<h5><a href="/index.php/path/project_detail/--><?php //echo $p_table; ?><!--/projects_num/--><?php //echo $pv->projects_num; ?><!--">--><?php //echo $pv->subject; ?><!--</a></h5>-->
<!--													<p class="small" style="font-size: 13px; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; word-wrap:break-word; line-height: 1.2em; height: 3.6em;">--><?php //echo $pv->summary; ?><!--</p>-->
<!---->
<!--													<div class="progress style-2 dark" style="margin: 0 0">-->
<!--														<span class="text"></span>-->
<!--														<div class="progress-bar progress-bar-white" role="progressbar" data-animate-width="--><?php //echo $percent?><!--%">-->
<!--															<span class="label object-non-visible" data-animation-effect="fadeInLeftSmall" data-effect-delay="1000" style="font-size: 13px;">--><?php //echo $percent?><!--%</span>-->
<!--														</div>-->
<!--													</div>-->
<!--													-->
<!--													<div class="clearfix stats padding-bottom-clear">-->
<!--														<div class="col-md-3 col-xs-3 text-center">-->
<!--															<div class="feature-box object-non-visible" data-animation-effect="fadeIn" data-effect-delay="300">-->
<!--																<h6><strong>--><?php //echo $this->lang->line('backer'); ?><!--</strong></h6>-->
<!--																<span class="counter" data-to="--><?php //echo $pv->funding_user_count; ?><!--" data-speed="4000" style="font-size: 13px;">0</span>-->
<!--															</div>-->
<!--														</div>-->
<!--														<div class="col-md-4 col-xs-4 text-center">-->
<!--															<div class="feature-box object-non-visible" data-animation-effect="fadeIn" data-effect-delay="300">-->
<!--																<h6><strong>--><?php //echo $this->lang->line('day'); ?><!--</strong></h6>-->
<!--																<span class="counter" data-to="--><?php //echo $pv->period; ?><!--" data-speed="4000" style="font-size: 13px;">0</span>-->
<!--															</div>-->
<!--														</div>-->
<!--														<div class="col-md-4 col-xs-4 text-center">-->
<!--															<div class="feature-box object-non-visible" data-animation-effect="fadeIn" data-effect-delay="300">-->
<!--																<h6><strong>--><?php //echo $this->lang->line('pledgeOf'); ?><!--</strong></h6>-->
<!--																<span class="counter" data-to="--><?php //echo round($pv->gather_amount/$rate, 2); ?><!--" data-speed="4000" style="font-size: 13px;">0</span>-->
<!--															</div>-->
<!--														</div>-->
<!--													</div>-->
<!--												</div>-->
<!--											</div>-->
<!--										</div>-->
<!--										--><?php
//											}
//										?><!--		-->
<!--									</div>-->
<!--								</div>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!--				</div>-->
<!--			</section>-->
			<!-- section end -->




