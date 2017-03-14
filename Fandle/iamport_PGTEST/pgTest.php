<!DOCTYPE html>
<html>
    <head>
        <!-- Basic Page Needs -->
        <meta charset="utf-8">
        <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>아임포트 데모 보기 - 개발자를 위한 무료 결제연동 서비스</title>
        <meta name="description" content="원하는 PG사를 선택하여 아임포트로 연동된 결제 창을 테스트해 보세요">
        <meta name="keywords" content="python inicis, node.js inicis, ruby inicis, python LGU+, node.js
                                       LGU+, ruby LGU+, python 나이스페이, node.js 나이스페이, ruby 나이스페이,
                                       python pg연동, node.js pg연동, ruby pg연동, python 결제개발,
                                       node.js 결제개발, ruby 결제개발, python 결제연동, node.js 결제연동,
                                       ruby 결제연동, python KCP, node.js KCP, ruby KCP, PHP 결제연동,
                                       JAVA 결제연동, ASP 결제연동, PHP PG연동, JAVA PG연동, ASP PG연동, PG연동,
                                       PG사, PG결제, PG변경, KG이니시스, LGU+, 나이스페이, 페이게이트, KCP, JTNet, tPay,
                                       카카오페이, kakaopay, 전자결제, 결제연동, 결제개발, 결제서비스, 인터넷결제, 온라인결제, 카드결제,
                                       가상계좌, 실시간계좌이체, 휴대폰소액결제, 해외결제, 간편결제, 인앱결제,
                                       워드프레스 우커머스, 워드프레스 결제, 우커머스, 우커머스 쇼핑몰, 우커머스 결제,
                                       우커머스 플러그인, 워드프레스 플러그인, 무료 결제 플러그인, 결제 API, Paypal,
                                       Stripe, 카카오페이, 결제분석">
        <meta name="author" content="SIOT">
        
        <!-- Facebook Open Graph -->
        <meta property="og:title" content="아임포트 데모 보기">
        <meta property="og:description" content="원하는 PG사를 선택하여 아임포트로 연동된 결제 창을 테스트해 보세요">
        <meta property="og:url" content="http://www.iamport.kr/">
        <meta property="og:site_name" content="아임포트">
        <meta property="og:image:type" content="image/png">
        <meta property="og:type" content="website">
        <meta property="og:image" content="http://www.iamport.kr/images/iamport_main.png">
        <meta property="og:image:url" content="http://www.iamport.kr/images/iamport_main.png">
        <meta property="og:image:width" content="600">
        <meta property="og:image:height" content="315">
        <meta property="fb:app_id" content="1655157841399316">
        
        <!-- Page Level meta tag -->
            
        <!-- 링크 미리보기 이미지 -->
        <meta name="image" content="/images/iamport_main.png">
        <meta name="thumbnail" content="/images/iamport_main.png">
        
        <meta name="naver-site-verification" content="71208a8b0ce5b6fdee7da4683fd81f72b28764e3"/>
        
        <link href="http://www.iamport.kr/" rel="canonical">
        
        <!-- Favicons -->
        <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
        <link rel="apple-touch-icon" href="/images/favicon.ico">

        <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css" href="http://d3tik7g7snxrwv.cloudfront.net/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="http://d3tik7g7snxrwv.cloudfront.net/css/jasny-bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="http://d3tik7g7snxrwv.cloudfront.net/fonts/font-awesome-4.2.0/css/font-awesome.css">

        <!-- Animate -->
        <link href="/css/effect2.css" rel="stylesheet" type="text/css">
        <link href="/css/animate.css" rel="stylesheet" type="text/css">

        <!-- Add fancyBox CSS files -->
        <link rel="stylesheet" type="text/css" href="http://d3tik7g7snxrwv.cloudfront.net/js/fancybox/jquery.fancybox.css?v=2.1.5" media="screen" />

        <!-- Owl Slider CSS -->
        <link rel="stylesheet" type="text/css" href="http://d3tik7g7snxrwv.cloudfront.net/css/owl.carousel.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="http://d3tik7g7snxrwv.cloudfront.net/css/owl.theme.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="http://d3tik7g7snxrwv.cloudfront.net/css/owl.transitions.css" media="screen" />

        <!-- Custom Css -->
        <link rel="stylesheet" type="text/css" href="http://d3tik7g7snxrwv.cloudfront.net/css/rs-wp-v1.2.css">
        <link rel="stylesheet" type="text/css" href="http://d3tik7g7snxrwv.cloudfront.net/css/countrySelect.css">
        <link rel="stylesheet" type="text/css" href="http://d3tik7g7snxrwv.cloudfront.net/css/main.css">
        <link rel="stylesheet" type="text/css" href="http://d3tik7g7snxrwv.cloudfront.net/css/responsive.css">
        <link rel="stylesheet" type="text/css" href="http://d3tik7g7snxrwv.cloudfront.net/css/iamport.css">
        <link rel="stylesheet" type="text/css" href="http://d3tik7g7snxrwv.cloudfront.net/css/siot.css">
        <link rel="stylesheet" type="text/css" href="http://d3tik7g7snxrwv.cloudfront.net/css/NotoSansKR-Hestia.css">
        <link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

        <!-- Page Level css -->
        <link rel="stylesheet" type="text/css" href="/css/demo.css"/>
        <!-- Google Fonts -->
        <link href='//fonts.googleapis.com/css?family=Raleway:400,200,100,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <!-- Side Menu -->
        <section class="rst-sidemenu">
    <a href="https://admin.iamport.kr/users/login" target="_blank"
       class="btn btn-join btn-sm rst-sidemenu-signup"
       style="font-size: 14px;" title="아임포트 연동 시작하기"
       onclick="ga('send', 'event', 'outbound', '연동 시작하기');">
        <i class="fa fa-code-fork" style="font-size: 18px;"></i> 연동 시작하기
    </a>
	<a href="#" class="rst-sidemenu-close">
	    <img src="/images/icon/login-close.png" alt="sidemenu-close" />
    </a>
	<nav class="rst-topmenu">
		<ul>
			<li>
			    <a href="/getstarted" title="아임포트 설치하기 - 개발자를 위한 무료 결제연동 서비스">
			        get started
                </a>
            </li>
			<li>
			    <a href="/dashboard" title="아임포트 결제 관리/분석 기능 - 개발자를 위한 무료 결제연동 서비스">
                    dashboard
                </a>
            </li>
			<li>
                <a href="/pricing" title="아임포트 이용요금 - 개발자를 위한 무료 결제연동 서비스">
                    아임포트 이용요금
                </a>
            </li>
            <li>
                <a href="/promotion" title="아임포트 PG사 가입신청 - 개발자를 위한 무료 결제연동 서비스">
                    PG사 가입신청
                </a>
            </li>
            <li>
                <a href="/faq" title="아임포트 자주 묻는 질문 - 개발자를 위한 무료 결제연동 서비스">
                    faq
                </a>
            </li>
			<li>
                <a href="/manual" target="_blank" title="아임포트 매뉴얼 - 개발자를 위한 무료 결제연동 서비스">
                   manual
                </a>
            </li>
            <li>
                <a href="/demo" target="_blank" title="아임포트 데모 - 개발자를 위한 무료 결제연동 서비스">
                    demo
                </a>
            </li>
            <li>
                <a href="https://github.com/iamport/iamport-rest-client" target="_blank"
                   onclick="ga('send', 'event', 'outbound', 'Github');"
                   title="아임포트 github - 개발자를 위한 무료 결제연동 서비스">
                    github
                </a>
            </li>
		</ul>
	</nav>
</section>
        <!-- End Side Menu -->

        <!--- Wrapper -->
        <section class="wrapper">
            <!--- Header -->
            <header>
    <div class="rst-header-menu">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <nav class="rst-header-menu">
                        <a href="/" title="아임포트 - 개발자를 위한 무료 결제연동 서비스">
                            <img src="/images/iamport-logo.png" alt="iamport_logo" />
                        </a>
                        <ul class="rst-login">
                            <!-- 모바일 header height 유지 용 -->
                            <li id="for-mobile-spacing"></li>
                            <li>
                                <a class="rst-menubtn" href="#" title="사이드 메뉴">
                                    <img src="/images/icon/menu-mobile.png" alt="사이드 메뉴 버튼" />
                                </a>
                            </li>
                        </ul>
                        <ul>
                            <li class="">
                                <a href="/getstarted" title="아임포트 설치하기">
                                    get started
                                </a>
                            </li>
                            <li class="">
                                <a href="/dashboard" title="결제 관리/분석 기능">
                                    dashboard
                                </a>
                            </li>
                            <li class="">
                                <a href="#">pricing</a>
                                <ul>
                                    <li>
                                        <a href="/pricing" title="가격정책 : 무료 결제연동 서비스">
                                            아임포트 이용요금
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/promotion" title="PG 가입 신청">
                                            PG사 가입신청
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                               <a href="#">support</a>
                               <ul>
                                    <li class="">
                                        <a href="/faq" title="자주 묻는 질문">FAQ</a>
                                    </li>
                                    <li>
                                        <a href="http://www.iamport.kr/manual" target="_blank"
                                        title="아임포트 메뉴얼">
                                        MANUAL
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="/class" title="아임포트 관련 클래스">CLASS</a>
                                    </li>
                                    <li>
                                        <a href="/demo" title="아임포트 데모 보기">DEMO</a>
                                    </li>
                               </ul>
                            </li>
                            <li style="margin-left: 55px;">
                                <a href="https://github.com/iamport/iamport-rest-client" target="_blank"
                                onclick="ga('send', 'event', 'outbound', 'Github');"
                                title="github - 아임포트 개발자를 위한 무료 결제연동 서비스">
                                <i class="fa fa-github" id="github"></i> github</a>
                            </li>
                            <li style="margin-left: 20px;">
                                <a href="https://admin.iamport.kr/users/login" target="_blank" id="sign-up"
                                   title="연동 시작하기 - 아임포트 개발자를 위한 무료 결제연동 서비스"
                                   onclick="ga('send', 'event', 'outbound', '연동 시작하기');">
                                    <i class="fa fa-code-fork"></i> 연동 시작하기
                                </a>
                            </li>
                        </ul>
                        <div class="clear"></div>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="google-searchbox">
                        <gcse:search></gcse:search>
                    </div>
                </div>
            </div>
        </div>
        <!-- google 맞춤 검색 엔진 -->
	<!-- end header menu -->
	    </div>
</header>
            <!--- End Header -->

            <!-- Content -->
                        <!-- Content -->
<section style="background-color: #18bc9c">
	<div class="container" style="padding: 50px 0 50px 0;">
		<h1>I'mport; 결제 모듈 DEMO</h1>
		<div id="demo" class="col-md-8 col-md-offset-1 col-xs-11">
			<form name="frm_payment" id="frm_payment" class="form-horizontal">
                <div class="form-group" style="margin-bottom: 0px;">
                    <label for="pg_provider" class="col-md-4 col-xs-4">지원 PG사</label>
                    <select name="pg_provider" id="pg-provider" class="col-md-8 col-xs-8">
                        <option value="kakao" data-option="card" selected>카카오페이</option>
                        <option value="html5_inicis" data-option="card,trans,vbank,phone">KG이니시스(웹표준결제)</option>
                        <option value="inicis" data-option="card,trans,vbank,phone">KG이니시스(기존모듈)</option>
                        <option value="uplus" data-option="card,trans,vbank,phone">LG유플러스</option>
                        <option value="nice" data-option="card,trans,vbank,phone">나이스정보통신</option>
                        <option value="jtnet" data-option="card,trans,vbank,phone">JTNet</option>
                        <option value="danal" data-option="phone">다날-휴대폰소액결제전용</option>
                        <option value="paypal" data-option="card">페이팔-ExpressCheckout</option>
                    </select>
                </div>
                <div class="form-group">
                    <p id="pay_method_help" class="col-md-8 col-md-offset-4 col-xs-11 col-xs-offset-1">
                        실제 승인이 이루어진 테스트 결제건은 30분이내로 카카오페이에서 자동 취소처리 합니다.
                    </p>
                </div>
                <div class="form-group" style="margin-bottom: 0px;">
                    <label for="pay_method" class="col-md-4 col-xs-4">결제수단</label>

                    <select name="pay_method" id="pay_method" class="col-md-8 col-xs-8">
				        <option value="card">신용카드</option>
				    </select>
                </div>
                <div class="form-group">
                    <div class="checkbox col-md-4 col-md-offset-3" style="padding: 0px;">
                        <label>
                            <input type="checkbox" name="use_escrow" value="escrow" id="use_escrow">
                            <span id="escrow-label"> 에스크로결제적용</span>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="merchant_uid" class="col-md-4 col-xs-4">주문번호</label>
					<input type="text" name="merchant_uid" id="merchant_uid" value="" class="col-md-8 col-xs-8"/>
                </div>
                <div class="form-group">
					<label for="name" class="col-md-4 col-xs-4">결제명</label>
					<input type="text" name="name" id="name" value="결제테스트" class="col-md-8 col-xs-8"/>
                </div>
                <div class="form-group">
					<label for="amount" class="col-md-4 col-xs-4">금액</label>
					<input type="tel" name="amount" id="amount" value="1004" class="col-md-8 col-xs-8"/>
                </div>
                <div class="form-group">
                    <label for="buyer_email" class="col-md-4 col-xs-4">이메일주소</label>
					<input type="text" name="buyer_email" id="buyer_email" value="iamport@siot.do" class="col-md-8 col-xs-8"/>
                </div>
                <div class="form-group">
					<label for="buyer_name" class="col-md-4 col-xs-4">성함</label>
					<input type="text" name="buyer_name" id="buyer_name" value="구매자" class="col-md-8 col-xs-8"/>
                </div>
                <div class="form-group">
					<label for="buyer_tel" class="col-md-4 col-xs-4">전화번호</label>
					<input type="tel" name="buyer_tel" id="buyer_tel" value="010-1234-5678" class="col-md-8 col-xs-8"/>
                </div>
                <div class="form-group">
					<label for="buyer_addr" class="col-md-4 col-xs-4">주소</label>
					<input type="text" name="buyer_addr" id="buyer_addr" value="서울특별시 강남구 삼성동" class="col-md-8 col-xs-8"/>
                </div>
                <div class="form-group">
                    <label for="buyer_postcode" class="col-md-4 col-xs-4">우편번호</label>
					<input type="text" name="buyer_postcode" id="buyer_postcode" value="123-456" class="col-md-8 col-xs-8"/>
                </div>
                <div class="form-group">
                    <label for="vbank_due" class="col-md-4 col-xs-4">가상계좌 입금일자<br>(YYYYMMDD)</label>
					<input type="text" name="vbank_due" id="vbank_due" value="" class="col-md-8 col-xs-8"/>
                </div>

                <div class="form-group">
                    <label for="in_app" class="col-md-4 col-xs-4"></label>
                    <label for="in_app" class="col-md-8 col-xs-8" style="text-align:left">
                        <input type="checkbox" name="in_app" value="in_app" id="in_app">
                        <span> 앱내 webView를 통한 결제인 경우만 체크</span>
                    </label>
                </div>
			</form>
			<div id="responser"></div>
			<a id="requester" class="btn btn-primary">결제하기</a>
		</div>
	</div>
</section>
            <!-- End Content -->

            <!--- Footer -->
            <footer>


	<div class="rst-footer-menu">
		<div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 snsicon">
                    <a href="https://ko.wordpress.org/plugins/iamport-for-woocommerce/" target="_blank" onclick="ga('send', 'event', 'outbound', '우커머스용 아임포트 플러그인');">
                        <img alt="woocommerce icon" src="/images/woo-icon-white.png">
                    </a>
                    <a href="https://ko.wordpress.org/plugins/iamport-payment/" target="_blank" onclick="ga('send', 'event', 'outbound', '결제버튼 생성 플러그인');">
                       <i class="fa fa-wordpress"></i>
                    </a>
                    <a href="https://www.facebook.com/iamportservice?_rdr=p" target="_blank"
                       onclick="ga('send', 'event', 'outbound', '페이스북 링크');">
                        <i class="fa fa-facebook"></i>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-6 text-left facebooklike">
                    <div id="fb-root"></div>
                    <div class="fb-like" data-href="https://www.facebook.com/iamportservice" data-layout="standard" data-action="like" data-show-faces="true" data-share="true" data-colorscheme="dark"></div>
               </div>
               <div style="clear:both;"></div>
           </div>
           <div class="row">
               <div class="col-xs-12">
                    <ul class="companyinfo">
                        <li class="companylabel">상호명</li>
                        <li>(주)시옷</li>
                        <li class="companylabel">대표</li>
                        <li>장지윤</li>
                        <li class="companylabel">개인정보담당자</li>
                        <li>장지윤</li>
                        <li class="companylabel">사업자등록번호</li>
                        <li>117-81-78260</li>
                        <li class="hidden-xs" style="display:block;"></li>
                        <li class="companylabel">사업장소재지</li>
                        <li>서울시 영등포구 국제금융로 10 Three IFC 19층</li>
                        <li class="companylabel">Tel</li>
                        <li><a href="tel:1670-5176">1670-5176 (운영시간 : 13:00~19:00)</a></li>
                        <li class="companylabel">Email</li>
                        <li><a href="mailto:iamport@siot.do">iamport@siot.do</a></li>
                        <li class="hidden-xs" style="display:block;"></li>
                        <li><a href="/faq" style="border-bottom:1px dotted #aaa;">[공지] 2016년 추석 연휴기간 고객센터 운영시간 안내 (9월 13일부터~)</a></li>
                        <li class="hidden-xs" style="display:block;"></li>
                        <li class="companylabel">© 2014 ~ 2016 SIOT. All right reserved.</li>
                    </ul>
               </div>
           </div>
		</div>
	</div>
</footer>
            <!--- End Footer -->
        </section>
        <!--- End Wrapper -->

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script type="text/javascript" src="http://d3tik7g7snxrwv.cloudfront.net/js/jquery.1.11.1.js"></script>

        <!-- Bootstrap Js Compiled Plugins -->
        <script type="text/javascript" src="http://d3tik7g7snxrwv.cloudfront.net/js/bootstrap.min.js"></script>

        <!-- WoW Js -->
        <script type="text/javascript" src="http://d3tik7g7snxrwv.cloudfront.net/js/wow.min.js"></script>

        <!-- Add Fancybox -->
        <script type="text/javascript" src="http://d3tik7g7snxrwv.cloudfront.net/js/fancybox/jquery.fancybox.js?v=2.1.5"></script>
        <script type="text/javascript" src="http://d3tik7g7snxrwv.cloudfront.net/js/fancybox/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

        <!-- Owl Slider Js -->
        <script type="text/javascript" src="http://d3tik7g7snxrwv.cloudfront.net/js/owl.carousel.js"></script>

        <!-- Custom Js -->
        <script type="text/javascript" src="http://d3tik7g7snxrwv.cloudfront.net/js/jqBootstrapValidation.js"></script>
        <script type="text/javascript" src="http://d3tik7g7snxrwv.cloudfront.net/js/jquery.ddslick.min.js"></script>
        <script type="text/javascript" src="http://d3tik7g7snxrwv.cloudfront.net/js/custom-form-elements.js"></script>
        <script type="text/javascript" src="http://d3tik7g7snxrwv.cloudfront.net/js/countrySelect.js"></script>
        <script type="text/javascript" src="http://d3tik7g7snxrwv.cloudfront.net/js/jquery.countdown.js"></script>
        <script type="text/javascript" src="http://d3tik7g7snxrwv.cloudfront.net/js/circle-progress.js"></script>
        <script type="text/javascript" src="http://d3tik7g7snxrwv.cloudfront.net/js/jquery.appear.js"></script>
        <script type="text/javascript" src="http://d3tik7g7snxrwv.cloudfront.net/js/main.js"></script>

        <!-- Angular.js -->
                <script type="text/javascript" src="/js/moment.min.js"></script><script type="text/javascript" src="/js/demo.js"></script>
        <script>
            // Google Analytics
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-53976410-1', 'auto');
            ga('send', 'pageview');

            // Google CSE code snippet
            (function() {
                // Custom Search Engine ID
                var cx = '017524840236596159276:4u23l5rfvii';
                var gcse = document.createElement('script');
                gcse.type = 'text/javascript';
                gcse.async = true;
                gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
                           '//cse.google.com/cse.js?cx=' + cx;
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(gcse, s);
            })();

            // Facebook Pixel Code
            !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
            n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
            document,'script','//connect.facebook.net/en_US/fbevents.js');

            fbq('init', '781773038618579');
            fbq('track', "PageView");

            // Facebook API
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/ko_KR/sdk.js#xfbml=1&version=v2.5&appId=1655157841399316";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
        <script>
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-53976410-1']);
            _gaq.push(['_trackPageview']);

            (function() {
                var ga = document.createElement('script');
                ga.type = 'text/javascript';
                ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www')
                              + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(ga, s);
            })();
        </script>
        <noscript>
            <img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=781773038618579&ev=PageView&noscript=1"/>
        </noscript>
    </body>
</html>
