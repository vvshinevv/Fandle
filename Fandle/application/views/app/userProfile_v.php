
    <div class="main-container">
        <div class="container">
            <h2 class="title space-top" align="center"><?php echo $this->lang->line('profile'); ?></h2>
            <div class="row">
                <div class="main object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="100" >
                    <div class="form-block center-block light-gray-bg" style="background: white; border: 1px solid #dcdcdc;">
                        <ul class="nav nav-tabs nav-justified" >
                            <li class="active"><a href="/index.php/path/userProfile/<?php echo $this->uri->segment(3); ?>" style="text-decoration:none; "><?php echo $this->lang->line('accountInfo');?></a></li>
                            <li><a href="/index.php/path/checkPassword/<?php echo $this->uri->segment(3); ?>" style="text-decoration:none; "><?php echo $this->lang->line('changePassword'); ?></a></li>
                        </ul>
                        <label></label>
                        <div class="form-horizontal">
                            <div class="form-group has-feedback">
                                <label for="inputEmail" class="col-sm-3 control-label"><?php echo $this->lang->line('email'); ?></label>
                                <div class="col-sm-8" style="font-weight: bold; color: #2e3537; ">
                                    <input type="text" class="form-control" id="email" name="email" placeholder="<?php echo $this->lang->line('email'); ?>" value="<?php echo $this->session->userdata('email'); ?>" disabled>
                                    <i class="fa fa-envelope form-control-feedback"></i>
                                </div>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="inputUserName" class="col-sm-3 control-label"><?php echo $this->lang->line('userName'); ?></label>
                                <div class="col-sm-8" style="font-weight: bold; color: #2e3537; ">
                                    <input type="text" class="form-control" id="username" name="username" placeholder="<?php echo $this->lang->line('userName'); ?>" value="<?php echo $this->session->userdata('username'); ?>" disabled>
                                    <i class="fa fa-user form-control-feedback"></i>
                                </div>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="inputName" class="col-sm-3 control-label"><?php echo $this->lang->line('nickName'); ?></label>
                                <div class="col-sm-8" style="font-weight: bold; color: #2e3537; ">
                                    <input type="text" class="form-control" id="nickname" name="nickname" placeholder="<?php echo $this->lang->line('nickName'); ?>" value="<?php echo $this->session->userdata('nickname'); ?>" disabled>
                                    <i class="fa fa-pencil form-control-feedback"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-8">
                                    <a href="/index.php/path/changeUserProfile/<?php echo $this->uri->segment(3); ?>">
                                        <button class="btn square btn-danger"><?php echo $this->lang->line('changeUserProfile'); ?><i class="fa fa-check"></i></button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>