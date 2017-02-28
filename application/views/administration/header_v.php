<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
	<title>Fandle 관리자 페이지</title>
	<!--<script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>-->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/sweetalert2/4.0.16/sweetalert2.min.css">

	<script type="text/javascript">
		$(document).ready(function() {
			$("#search_btn_ko").click( function(){
				//한국어 목록 검색
				if($("#q").val() == '') {
					swal('검색어를 입력하세요.');
					return false;
				} else { 
					var act = '/index.php/administration/project/lists/projects_ko/q/'+$("#q").val()+'/page/1';
					$("#bd_search_ko").attr('action', act).submit();
				}
			});

			$("#search_btn_en").click( function(){
				//영어 목록 검색
				if($("#q").val() == '') {
					swal('검색어를 입력하세요.');
					return false;
				} else { 
					var act = '/index.php/administration/project/lists/projects_en/q/'+$("#q").val()+'/page/1';
					$("#bd_search_en").attr('action', act).submit();
				}
			});

			$("#search_btn_ch").click( function(){
				//중국어 목록 검색
				if($("#q").val() == '') {
					swal('검색어를 입력하세요.');
					return false;
				} else { 
					var act = '/index.php/administration/project/lists/projects_ch/q/'+$("#q").val()+'/page/1';
					$("#bd_search_ch").attr('action', act).submit();
				}
			});

			$("#search_btn_user").click( function() {
				//사용자 검색
				if($("#q").val() == '') {
					swal('검색어를 입력하세요.');
					return false;
				} else {
					var act = '/index.php/administration/users/user/q/'+$("#q").val()+'/page/1';
					$("#bd_search_user").attr('action', act).submit();
				}
			});
		});

		function board_search_enter(form) {
			var keycode = window.event.keyCode;
			if(keycode == 13) $("#search_btn").click();
		}
	</script>
	
		
	<style type="text/css">
		body {
			padding: 10px;
		}
	</style>
</head>

<body>
	<div id="main">
		<header id="header" data-role="header" data-position="fixed">
			<blockquote>
				<p>관리자 페이지</p>
				<label></label>
				<p>
					<?php
						if($this->session->userdata('admin_login')) {
					?>
					<?php echo $this->session->userdata('administor_name')?>님 환영합니다. <a href="/index.php/path/admin_logout" class="btn">로그아웃</a>
							
					<?php
						} else {
							$this->load->helper('url');
							redirect('/path/admin');	
						}
					?>
				</p>	
			</blockquote>
		</header>

		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li><a href="/index.php/administration/project/main"><span>홈</span></a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">프로젝트 관리 <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="/index.php/administration/project/lists_ko/projects_ko">한국어</a></li>
								<li><a href="/index.php/administration/project/lists_en/projects_en">영어</a></li>
								<li><a href="/index.php/administration/project/lists_ch/projects_ch">중국어</a></li>	
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">회원 관리 <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="/index.php/administration/users/lists_user/user">회원 리스트</a></li>
								<li><a href="/index.php/administration/users/lists_dormancy/user_dormancy">휴면회원 리스트</a></li>
								<li><a href="/index.php/administration/users/lists_withdrawal">탈퇴 리스트</a></li>	
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		
