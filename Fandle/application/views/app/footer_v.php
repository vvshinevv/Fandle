
<?php
if($this->uri->segment(3) == '' || $this->uri->segment(3) == 'ko' || $this->uri->segment(3) == 'projects_ko') {
	$lang = 'ko';
	$this->lang->load('translate', 'korean');
} else if($this->uri->segment(3) == 'en' || $this->uri->segment(3) == 'projects_en') {
	$lang = 'en';
	$this->lang->load('translate', 'english');
} else {
	$lang = 'ch';
	$this->lang->load('translate', 'china');
}
?>
<!--			<img src="/static/movie/footer.png">-->



		<section id="footer-start" class="section translucent-bg pv-70" style="background-color: #333333;">
			<div class="container">
				<div class="row">
					<div class="clients text-center">
						<ul class="social-links circle animated-effect-1">
							<li class="facebook"><a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
							<li class="twitter"><a target="_blank" href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
							<li class="weibo"><a target="_blank" href="http://weibo.com"><i class="fa fa-weibo"></i></a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="footer-category container">
				<div class="row text-center" >
					<div class="form-inline margin-clear" data-animation-effect="fadeIn" style="font-size: 12px;">
						<a class="btn btn-gray-transparent foot-cate" href="/index.php/path/about_us/<?php echo $lang; ?>" style="margin: 5px;"><?php echo $this->lang->line('aboutUs'); ?></a>
						<a class="btn btn-gray-transparent foot-cate" href="/index.php/path/partnership/<?php echo $lang; ?>" style="margin: 5px;"><?php echo $this->lang->line('partnership'); ?></a>
						<a class="btn btn-gray-transparent foot-cate" href="/index.php/path/accessTerm/<?php echo $lang; ?>" style="margin: 5px;"><?php echo $this->lang->line('conditions'); ?></a>
						<a class="btn btn-gray-transparent foot-cate" href="/index.php/path/privacyPolicy/<?php echo $lang; ?>" style="margin: 5px;"><?php echo $this->lang->line('privacyPolicy'); ?></a>
					</div>
				</div>
			</div>
			<label></label>
			<div class="container">
				<div class="row text-center">
					<div class="col-md-12 " data-animation-effect="fadeIn" style="font-size: 12px;">
						<p>© Developer 최홍희. All Rights Reserved.</p>
					</div>
				</div>
			</div>

		</section>


		<!-- page-wrapper end -->
		<script type="text/javascript" src="/static/plugins/jquery.min.js"></script>
		<script type="text/javascript" src="/static/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="/static/plugins/modernizr.js"></script>
		<script type="text/javascript" src="/static/plugins/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
		<script type="text/javascript" src="/static/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
		<script type="text/javascript" src="/static/plugins/isotope/isotope.pkgd.min.js"></script>
		<script type="text/javascript" src="/static/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
		<script type="text/javascript" src="/static/plugins/waypoints/jquery.waypoints.min.js"></script>
		<script type="text/javascript" src="/static/plugins/jquery.countTo.js"></script>
		<script src="/static/plugins/jquery.parallax-1.1.3.js"></script>
		<script src="/static/plugins/jquery.validate.js"></script>
		<script src="/static/plugins/vide/jquery.vide.js"></script>
		<script type="text/javascript" src="/static/plugins/owl-carousel/owl.carousel.js"></script>
		<script type="text/javascript" src="/static/plugins/jquery.browser.js"></script>
		<script type="text/javascript" src="/static/plugins/SmoothScroll.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/js/swiper.min.js"></script>
		<script type="text/javascript" src="/static/js/template.js"></script>
		<script type="text/javascript" src="https://service.iamport.kr/js/iamport.payment-1.1.3.js"></script>
		<script type="text/javascript" src="/static/js/cus.js"></script>
	</body>
</html>
  