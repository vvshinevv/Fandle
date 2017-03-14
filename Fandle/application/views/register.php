	<section>
        <div class="container-fluid">
            <div class="row">
            	<div class="col-lg-8 col-lg-offset-2 text-center">
                	<h2 class="margin-top-0 wow fadeIn">Sing In</h2>
                	<hr class="primary">
                </div>
            </div>
            <div class="col-lg-10 col-lg-offset-1 text-center">
                <form class="contact-form row" method="post" action="/index.php/auth/register">
                    <div class="col-md-4 col-md-offset-4">
                        <label></label>
                        <input type="text" id="email" name="email" class="form-control" value="<?php echo set_value('email')?>" placeholder="Email">
                    </div>
                    <div class="col-md-4 col-md-offset-4">
                        <label></label>
                        <input type="password" id="password" name="password" class="form-control" value="<?php echo set_value('password')?>" placeholder="Password">
                    </div>
                    <div class="col-md-4 col-md-offset-4">
                        <label></label>
                        <input type="password" id="re_password" name="re_password" class="form-control" value="<?php echo set_value('re_password')?>" placeholder="Password Confirm">
                    </div>
                    <div class="col-md-4 col-md-offset-4">
                        <label></label>
                        <input type="text" id="username" name="username" class="form-control" value="<?php echo set_value('username')?>" placeholder="name">
                    </div>
                    <div class="col-md-4 col-md-offset-4">
                        <label></label>
                        <input type="text" id="nickname" name="nickname" class="form-control" value="<?php echo set_value('nickname')?>" placeholder="nickname">
                    </div>
                 
                    <div class="col-md-4 col-md-offset-4">
                        <button type="submit" data-toggle="modal" class="btn btn-primary btn-block btn-lg">register <i class="ion-person"></i></button>
                    </div>
                </form>
            </div>
        </div>
	</section>