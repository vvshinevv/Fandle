<!DOCTYPE html>
<html lang="ko">
	<head>
		<meta charset="utf-8">
		<title>KWAVE D</title>
		<meta name="author" content="Choi Hong Hee">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="google-site-verification" content="jRJnUChoju9DmmrDoZlG2bgRxucTC3BeZxjrLM0NQSs" />

		<link rel="shortcut icon" href="/static/movie/d_fa.png">
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Raleway:700,400,300' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=PT+Serif' rel='stylesheet' type='text/css'>
		<link href="https://fonts.googleapis.com/css?family=Baloo+Thambi" rel="stylesheet">

		<link href="/static/bootstrap/css/bootstrap.css" rel="stylesheet">
		<link href="/static/fonts/font-awesome/css/font-awesome.css" rel="stylesheet">
		<link href="/static/fonts/fontello/css/fontello.css" rel="stylesheet">

		<link href="/static/plugins/magnific-popup/magnific-popup.css" rel="stylesheet">
		<link href="/static/plugins/rs-plugin/css/settings.css" rel="stylesheet">
		<link href="/static/css/animations.css" rel="stylesheet">
		<link href="/static/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">
		<link href="/static/plugins/owl-carousel/owl.transitions.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/css/swiper.min.css">
		<link href="/static/plugins/hover/hover-min.css" rel="stylesheet">		
		<link href="/static/css/style.css" rel="stylesheet" >
		<link href="/static/css/skins/light_blue.css" rel="stylesheet">

		<link href="/static/css/customize.css" rel="stylesheet">

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<style>
			.dropdown-menu > li > a:hover,
			.dropdown-menu > li > a:focus {
				background-color: transparent;
				color: indianred;
				border-color: transparent;
			}

			.transparent-header .header:not(.dark) .navbar-nav > li.open > a,
			.transparent-header .header:not(.dark) .navbar-nav > li > a:hover,
			.transparent-header .header:not(.dark) .navbar-nav > li > a:focus {
				color: indianred;
			}

		</style>
	</head>


	<?php
		if($this->uri->segment(3) == '' || $this->uri->segment(3) == 'ko' || $this->uri->segment(3) == 'projects_ko') {
			$lang = 'ko';
			$this->lang->load('translate', 'korean'); $rate = 1;
		} else if($this->uri->segment(3) == 'en' || $this->uri->segment(3) == 'projects_en') {
			$lang = 'en';
			$this->lang->load('translate', 'english'); $rate = 1176.5;
		} else {
			$lang = 'ch';
			$this->lang->load('translate', 'china'); $rate = 169.51;
		}
	?>
	<body class="transparent-header">
		<div class="scrollToTop circle"><i class="icon-up-open-big"></i></div>
		<div class="page-wrapper">
			<div class="header-container">
				<header class="header fixed full-width clearfix">
					<div class="container">
						<div class="row">
							<div class="header-right clearfix">
								<div class="main-navigation animated with-dropdown-buttons" >
									<nav class="navbar navbar-default" role="navigation" style="display: table; margin-left: auto; margin-right: auto; " >
										<div class="container-fluid" style="display: table; margin-left: auto; margin-right: auto; " >
											<div class="navbar-header">
												<div class="clearfix" style="margin-top: 10px;">
													<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1" style="position: absolute; right: 0; top: 0">
														<span class="sr-only">Toggle navigation</span>
														<span class="icon-bar"></span>
														<span class="icon-bar"></span>
														<span class="icon-bar"></span>
													</button>
													<div id="logo-mobile" class="logo">
														<a href="/index.php"><img id="logo-img-mobile" src="/static/images/title_logo.png" alt="The Project" style="width: 150px; height: auto;"></a>
													</div>

												</div>
											</div>
										</div>
										<div class="collapse navbar-collapse" id="navbar-collapse-1" style="font-weight: bold;">
											<!-- main-menu -->
											<ul class="nav navbar-nav navbar-left">
												<li>
													<a href="/index.php/path/project/<?php echo $lang; ?>"><?php echo $this->lang->line('projectBan'); ?></a>
												</li>
											</ul>
											<ul class="nav navbar-nav navbar-left">
												<li>
													<a href="/index.php/path/about_us/<?php echo $lang; ?>"><?php echo $this->lang->line('aboutUs'); ?></a>
												</li>
												<?php
							                    	if($this->session->userdata('is_login')) {
							                    ?>
													<li class="dropdown">
														<a href="" class="dropdwon-toggle" data-toggle="dropdown">
															<?php echo $this->session->userdata('nickname'); ?>
														</a>
														<ul class="dropdown-menu">
															<li><a href="/index.php/path/userProfile/<?php echo $lang; ?>"><?php echo $this->lang->line('profile'); ?></a></li>
															<li><a href="/index.php/path/fundingUserDetail/<?php echo $lang; ?>"><?php echo $this->lang->line('myProject'); ?></a></li>
															<li class="divider"></li>
															<li><a href="/index.php/auth/logout/<?php echo $lang; ?>"><?php echo $this->lang->line('logOut'); ?></a></li>
														</ul>
													</li>
												<?php
							                    	} else {
							                    ?>
								                    <li>
														<a href="/index.php/auth/login/<?php echo $lang; ?>"><?php echo $this->lang->line('logIn'); ?></a>
													</li>
												<?php
													}
												?>
												<li class="dropdown">
													<a href="" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->lang->line('language'); ?></a>
													<ul class="dropdown-menu">
														<li ><a href="/index.php/path/index/ko"><?php echo $this->lang->line('korean'); ?></a></li>
														<li ><a href="/index.php/path/index/en"><?php echo $this->lang->line('english'); ?></a></li>
<!--														<li ><a href="/index.php/path/index/ch">--><?php //echo $this->lang->line('china'); ?><!--</a></li>-->
													</ul>
												</li>
											</ul>
										</div>
									</nav>
								</div>
							</div>
						</div>
					</div>	
				</header>
			</div>
		</div>


