<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>비밀번호 변경</title>
	<meta name="author" content="Choi Hong Hee">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="shortcut icon" href="/static/movie/d_fa.png">
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:700,400,300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=PT+Serif' rel='stylesheet' type='text/css'>

	<link href="/static/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="/static/fonts/font-awesome/css/font-awesome.css" rel="stylesheet">
	<link href="/static/fonts/fontello/css/fontello.css" rel="stylesheet">

	<link href="/static/plugins/magnific-popup/magnific-popup.css" rel="stylesheet">
	<link href="/static/plugins/rs-plugin/css/settings.css" rel="stylesheet">
	<link href="/static/css/animations.css" rel="stylesheet">
	<link href="/static/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">
	<link href="/static/plugins/owl-carousel/owl.transitions.css" rel="stylesheet">
	<link href="/static/plugins/hover/hover-min.css" rel="stylesheet">		
	<link href="/static/css/style.css" rel="stylesheet" >
	<link href="/static/css/skins/light_blue.css" rel="stylesheet">

	<link href="/static/css/customize.css" rel="stylesheet">

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	</head>
</head>
<body>

	<div class="main-container">
		<div class="container">
			<h2 class="title space-top" style="color: black;">비밀번호 변경</h2>
			<div class="row form-block center-block col-md-4" style="border: 1px solid #dcdcdc;">
				<div class="main object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="100">
					<form id="resetPassword_action" class="form-horizontal col-md-12" method="post" action="">
						<p style="margin-top: 15px;">새로 희망하는 비밀번호를 아래 재입력까지 입력해주세요.</p>
						<div class="form-group has-feedback">
							<div class="col-sm-12">
								<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
							</div>
						</div>
						<div class="form-group has-feedback">
							<div class="col-sm-12">
								<input type="password" class="form-control" id="re_password" name="re_password" placeholder="Password" required>
							</div>
						</div>
						<div class="form-group has-feedback" hidden>
							<div class="col-sm-12">
								<input type="email" class="form-control" id="email" name="email" value="<?php echo $this->input->get('email'); ?>" required>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<button type="submit" class="btn square btn-danger" style="width: 100%;">변 경<i class="fa fa-user"></i></button>
							</div>
						</div>
						<div id="result" class="resultSucces" style="margin-left: 0px; color: blue; font-weight: bold;"></div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- JavaScript files placed at the end of the document so the pages load faster -->
	<!-- ================================================== -->
	<!-- Jquery and Bootstap core js files -->
	<script type="text/javascript" src="/static/plugins/jquery.min.js"></script>
	<script type="text/javascript" src="/static/bootstrap/js/bootstrap.min.js"></script>
	<!-- Modernizr javascript -->
	<script type="text/javascript" src="/static/plugins/modernizr.js"></script>
	<!-- jQuery Revolution Slider  -->
	<script type="text/javascript" src="/static/plugins/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script type="text/javascript" src="/static/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<!-- Isotope javascript -->
	<script type="text/javascript" src="/static/plugins/isotope/isotope.pkgd.min.js"></script>
	<!-- Magnific Popup javascript -->
	<script type="text/javascript" src="/static/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
	<!-- Appear javascript -->
	<script type="text/javascript" src="/static/plugins/waypoints/jquery.waypoints.min.js"></script>
	<!-- Count To javascript -->
	<script type="text/javascript" src="/static/plugins/jquery.countTo.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/js/swiper.min.js"></script>

	<!-- Parallax javascript -->
	<script src="/static/plugins/jquery.parallax-1.1.3.js"></script>
	<!-- Contact form -->
	<script src="/static/plugins/jquery.validate.js"></script>
	<!-- Background Video -->
	<script src="/static/plugins/vide/jquery.vide.js"></script>
	<!-- Owl carousel javascript -->
	<script type="text/javascript" src="/static/plugins/owl-carousel/owl.carousel.js"></script>
	<!-- SmoothScroll javascript -->
	<script type="text/javascript" src="/static/plugins/jquery.browser.js"></script>
	<script type="text/javascript" src="/static/plugins/SmoothScroll.js"></script>
	<!-- Initialization of Plugins -->
	<script type="text/javascript" src="/static/js/template.js"></script>
	
	<!-- Iamport PG javascript -->
	<script type="text/javascript" src="https://service.iamport.kr/js/iamport.payment-1.1.3.js"></script>
	<!-- Custom Scripts -->
	<script type="text/javascript" src="/static/js/cus.js"></script>

</body>
</html>

	
	
