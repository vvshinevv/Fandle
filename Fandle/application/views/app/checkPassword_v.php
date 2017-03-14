

    <div class="main-container">
        <div class="container">
            <h2 class="title space-top" style="color: black; text-align: center;"><?php echo $this->lang->line('checkPassword');?></h2>
            <div class="row form-block center-block" style="border: 1px solid #dcdcdc;">
                <div class="main object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="100">
                    <form class="form-horizontal col-md-6" method="post" action="" id="checkPassword_action" style="border-right: 1px solid #dcdcdc;">
                        <div class="form-group has-feedback">
                            <div class="col-sm-12">
                                <input type="password" class="form-control" id="re_password" name="re_password" placeholder="<?php echo $this->lang->line('currentPassword');?>" required>
                                <i class="fa fa-lock form-control-feedback"></i>
                            </div>
                        </div>
                        <div>
                            <input type="hidden" id="email" value="<?php echo $this->session->userdata('email'); ?>">
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn square btn-danger" style="width: 100%;"><?php echo $this->lang->line('next');?> <i class="fa fa-check"></i></button>
                            </div>
                        </div>
                    </form>
                    <form class="form-horizontal col-md-6">
                        <div class="form-group has-feedback">
                            <div class="col-sm-12">
                                <label><i class="icon-check-1"></i><?php echo $this->lang->line('currentPass');?></label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>