<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
	<title>관리자 로그인</title>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<div class="container-fluid">
            <div class="row">
            	<div class="col-lg-8 col-lg-offset-2 text-center">
                	<h2 class="margin-top-0 wow fadeIn">Fandle 관리자 로그인</h2>
                	<hr class="primary">
                </div>
            </div>
            <div class="col-lg-10 col-lg-offset-1 text-center">
            <!-- <?php
                //$attributes = array('class'=>'form-horizontal', 'id'=>'login_action');
                //echo form_open('/path/admin', $attributes);
            ?> -->
                <form class="contact-form row" method="post" action="">
                    <div class="col-md-4 col-md-offset-4">
                        <label></label>
                        <input type="text" id="administor_id" name="administor_id" class="form-control" placeholder="아이디">
                    </div>
                    <div class="col-md-4 col-md-offset-4">
                        <label></label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="비밀번호">
                    </div>
                    <div class="col-md-4 col-md-offset-4">
                        <label></label>
                        <button type="submit" class="btn btn-primary btn-block btn">Enter</button>
                    </div>
                </form>
            </div>
        </div>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>