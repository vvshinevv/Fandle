

    <div class="main-container">
        <div class="container">
            <h2 class="title" style="text-align: center;">
                <?php echo $this->lang->line('payment');?>
                <?php
                if($payment_views['status'] === 'paid') {
                    ?>
                    <strong style="color: blue;"><?php echo $this->lang->line('complete'); ?></strong>
                    <?php
                } else {
                    ?>
                    <strong style="red: blue;"><?php echo $this->lang->line('fail'); ?></strong>
                    <?php
                }
                ?>
            </h2>
            <div class="row form-block center-block">
                <div class="main object-non-visible table-responsive" data-animation-effect="fadeInUpSmall">
                        <table class="table cart">
                            <thead>
                                <tr>
                                    <th style="font-size: 13.5px;"><?php echo $this->lang->line('paymentNum'); ?></th>
                                    <th style="font-size: 13.5px;"><?php echo $this->lang->line('paymentState'); ?></th>
                                    <th style="font-size: 13.5px;"><?php echo $this->lang->line('paymentAmount'); ?></th>
                                    <th style="font-size: 13.5px;"><?php echo $this->lang->line('paymentMethod'); ?></th>
                                    <th style="font-size: 13.5px;"><?php echo $this->lang->line('paymentReceipt'); ?></th>
                                </tr>
                            </thead>
                            <?php
                                if($payment_views['status'] === 'paid') {
                            ?>
                                    <tbody>
                                        <tr>
                                            <td style="text-align: center;"><?php echo $payment_views['merchant_uid']; ?></td>
                                            <td style="text-align: center;"><?php echo $payment_views['status']; ?></td>
                                            <td style="text-align: center;"><?php echo $this->lang->line('currency'); ?><?php echo $payment_views['amount']; ?></td>
                                            <td style="text-align: center;"><?php echo $payment_views['pay_method']; ?></td>
                                            <td style="text-align: center;">
                                                <button class="btn square btn-gray-transparent">
                                                    <a target="_blank" href="<?php echo $payment_views['receipt_url']; ?>" style="color: #777777"><?php echo $this->lang->line('receipt'); ?></a>
                                                </button>

                                            </td>
                                        </tr>
                                    </tbody>
                            <?php
                                } 
                            ?>
                        </table>
                        <div style="text-align: center">
                            <a class="btn square btn-danger" href="/index.php/path/index/<?php echo $this->uri->segment(3); ?>"><?php echo $this->lang->line('goToHome'); ?></a>
                            <a class="btn square btn-danger" href="/index.php/path/fundingUserDetail/<?php $this->uri->segment(3); ?>"><?php echo $this->lang->line('myProject'); ?></a>
                        </div>
                </div>
            </div>
        </div>
    </div>