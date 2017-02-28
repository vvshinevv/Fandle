<!DOCTYPE html>
<html lang="ko">
	<head>
		<title>Fandle</title>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="generator" content="Codeply">
		<link href="https://cdn.jsdelivr.net/sweetalert2/4.0.8/sweetalert2.min.css" rel="stylesheet" type="text/css">
    	<link rel="stylesheet" href="/static/lib/bootstrap-3.3.4/dist/css/bootstrap.min.css" />
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">	    
		<link href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.1.1/animate.min.css" rel="stylesheet" />
	    <link rel="stylesheet" href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
	    <link rel="stylesheet" href="/static/css/styles.css" />
	   
	    <style type="text/css">
	        @media screen and (max-width: 600px) {
	            .main-project-cart {
	                position: relative;
				    font-family: Arial;
				    width: 100%;
				    height: auto;
				    padding: 5px;
				    border: 1px solid #d3d3d3;
				    border-radius: 0px 0px 10px 10px;
				    border-top: none;
	            }
	            .img-box {
				    display: block;
				    position: relative;
				    width: 100%;
				    height: auto;
				    max-height: 250px;
				    overflow:hidden;
				    border: 1px solid #d3d3d3;
				    border-bottom: none;
				}
	        }
        
    	</style>
	</head>
	<body>
		<nav id="topNav" class="navbar navbar-default navbar-fixed-top">
	        <div class="container-fluid">
	            <div class="navbar-header">
	                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar">
	                    <span class="sr-only">Toggle navigation</span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                </button>
	                <a class="navbar-brand page-scroll" href="/index.php"><i class="ion-ios-analytics-outline"></i> Fandle</a>
	            </div>
	            <div class="navbar-collapse collapse" id="bs-navbar">
	                <ul class="nav navbar-nav">
	                    <li>
	                        <a class="page-scroll" href="/index.php/path/project">Project</a>
	                    </li>
	                </ul>
	                <ul class="nav navbar-nav navbar-right">
	                    <li>
	                        <a class="page-scroll" data-toggle="modal" title="About Us" href="/index.php/path/about_us">About Us</a>
	                    </li>
	                    <?php
	                    	if($this->session->userdata('is_login')) {
	                    ?>
	                    <li>
	                        <a class="page-scroll" data-toggle="modal" title="Sign In" href="/index.php/auth/logout">Log out</a>
	                    </li>
	                    <?php		
	                    	} else {
	                    ?>
	                    <li>
	                        <a class="page-scroll" data-toggle="modal" title="Log In" href="/index.php/auth/login">Log In</a>
	                    </li>
	                    <?php		
	                    	}
	                    ?>
	                    <li>
	                    	<a class="page-scroll" data-toggle="modal" title="Log In" href="/index.php/auth/register">Register</a>
	                    </li>

	                    <li class="dropdown">
	                    	<a href="blog-large-image-right-sidebar.html" class="dropdown-toggle" data-toggle="dropdown">Laguage</a>
							<ul class="dropdown-menu">
								<li ><a href="/index.php">Korean</a></li>
								<li ><a href="/index.php/auth/language/en">Enlish</a></li>
								<li ><a href="/index.php/auth/language/ch">Chinese</a></li>
							</ul>
	                    </li>
	                </ul>
	            </div>	
	        </div>
	    </nav>