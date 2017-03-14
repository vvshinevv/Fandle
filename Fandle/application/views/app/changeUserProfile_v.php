
<div class="main-container">
    <div class="container">
        <h2 class="title" style="color: black; text-align: center;"><?php echo $this->lang->line('changeUserProfile'); ?></h2>
        <div class="row form-block center-block">
            <div class="main object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="100">

                <form class="form-horizontal" method="post" action="" id="changeProfile_action">
                    <div class="form-group has-feedback">
                        <label for="inputUserName" class="col-sm-3 control-label"><?php echo $this->lang->line('userName'); ?> <span class="text-danger small">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="username" name="username" placeholder="<?php echo $this->lang->line('userName'); ?>" value="<?php echo $this->session->userdata('username'); ?>" required>
                            <i class="fa fa-user form-control-feedback"></i>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="inputName" class="col-sm-3 control-label"><?php echo $this->lang->line('nickName') ?> <span class="text-danger small">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nickname" name="nickname" placeholder="<?php echo $this->lang->line('nickName') ?>" value="<?php echo $this->session->userdata('nickname'); ?>" required>
                            <i class="fa fa-pencil form-control-feedback"></i>
                        </div>
                    </div>
                    <div>
                        <input type="hidden" id="email" name="email" value="<?php echo $this->session->userdata('email'); ?>">
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-8">
                            <button type="submit" class="btn square btn-danger" id="changeProfile_submit"><?php echo $this->lang->line('change'); ?> <i class="fa fa-check"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>