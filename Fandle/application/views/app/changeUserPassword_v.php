
    <div class="main-container">
        <div class="container">
            <h2 class="title space-top" style="color: black; text-align: center;"><?php echo $this->lang->line('changePassword'); ?></h2>
            <div class="row form-block center-block" style="border: 1px solid #dcdcdc;">
                <div class="main object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="100">
                    <form class="form-horizontal col-md-12" method="post" action="" id="resetPassword_action">
                        <div>
                            <input type="hidden" id="email" name="email" value="<?php echo $this->session->userdata('email'); ?>">
                        </div>
                        <div class="form-group has-feedback">
                            <div class="col-sm-12">
                                <input type="password" class="form-control" id="password" name="password" placeholder="<?php echo $this->lang->line('password'); ?>" required>
                                <i class="fa fa-lock form-control-feedback"></i>
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <div class="col-sm-12">
                                <input type="password" class="form-control" id="re_password" name="re_password" placeholder="<?php echo $this->lang->line('password'); ?>" required>
                                <i class="fa fa-lock form-control-feedback"></i>
                            </div>
                        </div>

                        <div class="form-group text-right">
                            <div class="col-sm-12">
                                <button type="submit" class="btn square btn-danger" id="changeUserPassword_submit"><?php echo $this->lang->line('change'); ?> <i class="fa fa-check"></i></button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>