
    <div class="main-container">
        <div class="container">
            <h2 class="title space-top" style="color: black; text-align: center;"><?php echo $this->lang->line('donationInfo'); ?></h2>
            <div class="row center-block">
                <div class="main object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="100">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?php echo $this->lang->line('donationNum'); ?> </th>
                                    <th><?php echo $this->lang->line('projectName'); ?> </th>
                                    <th><?php echo $this->lang->line('donationAmount'); ?> </th>
                                    <th><?php echo $this->lang->line('deliveryState'); ?> </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($fundingUser_views as $fv) {
                                ?>
                                    <tr>
                                        <td class="product">
                                            <?php
                                                echo $fv->merchant_uid;
                                            ?>
                                        </td>
                                        <td class="total-quantity">
                                            <?php
                                                if ($fv != null) {
                                            ?>
                                                    <img width="200px;"
                                                         src="<?php echo $fv->project_img; ?>">
                                                    <p>
                                                        <small><?php echo $fv->subject; ?></small>
                                                    </p>
                                            <?php
                                                }
                                            ?>
                                        </td>

                                        <td class="amount">
                                            <?php
                                            if ($fv != null) {
                                                echo $fv->reward_amount;
                                            }
                                            ?>
                                        </td>

                                        <?php
                                        if ($fv == null) {
                                            ?>
                                            <td class="total-quantity" style="color: blue; text-align: right;"></td>
                                            <?php
                                        } else {
                                            if ($fv->deliery_state == 1) {

                                                ?>
                                                <td class="total-quantity"
                                                    style="color: blue; text-align: right;"><?php echo $this->lang->line('completedDelivery'); ?></td>
                                                <?php
                                            } else if ($fv->deliery_state == 2) {
                                                ?>
                                                <td class="total-quantity"
                                                    style="color: green; text-align: right;"><?php echo $this->lang->line('shipped'); ?></td>
                                                <?php
                                            } else {
                                                ?>
                                                <td class="total-quantity"
                                                    style="color: red; text-align: right;"><?php echo $this->lang->line('preDelivery'); ?></td>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
