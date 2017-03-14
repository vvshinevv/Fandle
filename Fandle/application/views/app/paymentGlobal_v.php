<label></label>
<section class="section light-gray-bg clearfix">
    <?php
    if($this->uri->segment(3) == '' || $this->uri->segment(3) == 'ko' || $this->uri->segment(3) == 'projects_ko') {
        $rate = 1;
    } else if($this->uri->segment(3) == 'en' || $this->uri->segment(3) == 'projects_en') {
        $rate = 1176.5;
    } else {
        $rate = 169.51;
    }

    foreach ($project_views as $pv) {
        ?>

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="text-center"><?php echo $pv->subject; ?></h2>
                    <div class="separator"></div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="main col-md-8 col-md-offset-2">

                    <table class="table cart">
                        <thead>
                        <tr>
                            <th><?php echo $this->lang->line('projectName'); ?></th>
                            <th><?php echo $this->lang->line('reward'); ?></th>
                            <th><?php echo $this->lang->line('selectedQuantity'); ?></th>
                            <th class="amount"><?php echo $this->lang->line('price'); ?> </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($reward_views as $rv) {
                            ?>
                            <tr>
                                <td style="text-align: center;">
                                    <img src="<?php echo $pv->project_img; ?>" width="190px" style="margin: auto;">
                                    <small><?php echo $rv->reward_subject; ?></small>
                                </td>
                                <td><?php echo $rv->reward_contents; ?></td>
                                <td class="quantity">
                                    <div>
                                        <input type="text" class="form-control" value="1" disabled>
                                    </div>
                                </td>
                                <td class="amount"><?php echo $this->lang->line('currency'); ?><?php echo round($rv->reward_amount/$rate, 2); ?> </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>

                    <form method="post" id="frm_payment" name="frm_payment" class="form-horizontal">

                        <fieldset>
                            <legend><?php echo $this->lang->line('deliveryInfo'); ?></legend>

                            <div class="row">
                                <div class="col-md-2">
                                    <h5 class="title"><?php echo $this->lang->line('personalInfo');?></h5>
                                </div>
                                <div class="col-lg-10">
                                    <div class="form-group">
                                        <label for="buyer_name" class="col-md-3 control-label"><?php echo $this->lang->line('userName');?> <small class="text-default">*</small></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="buyer_name" name="buyer_name" placeholder="<?php echo $this->lang->line('userName');?>" value="<?php echo $this->session->userdata('username'); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="buyer_tel" class="col-md-3 control-label"><?php echo $this->lang->line('phone'); ?><small class="text-default">*</small></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="buyer_tel" name="buyer_tel" placeholder="<?php echo $this->lang->line('phone'); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="buyer_email" class="col-md-3 control-label"><?php echo $this->lang->line('email'); ?><small class="text-default">*</small></label>
                                        <div class="col-md-9">
                                            <input type="email" class="form-control" id="buyer_email" name="buyer_email" placeholder="<?php echo $this->lang->line('email'); ?>" value="<?php echo $this->session->userdata('email'); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="space"></div>

                            <div class="row">
                                <div class="col-md-2">
                                    <h5 class="title"><?php echo $this->lang->line('address'); ?></h5>
                                </div>
                                <div class="col-lg-10">
                                    <div class="form-group">
                                        <label for="buyer_postcode" class="col-md-3 control-label"><?php echo $this->lang->line('postCode'); ?><small class="text-default">*</small></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control postcodify_postcode5" id="buyer_postcode" name="buyer_postcode" placeholder="<?php echo $this->lang->line('postCode'); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="buyer_addr" class="col-md-3 control-label"><?php echo $this->lang->line('address'); ?><small class="text-default">*</small></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="buyer_addr" name="buyer_addr" placeholder="<?php echo $this->lang->line('address'); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="buyer_addr_detail" class="col-md-3 control-label"><?php echo $this->lang->line('address2'); ?></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="buyer_addr_detail" name="buyer_addr_detail" placeholder="<?php echo $this->lang->line('address2'); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="buyer_city" class="col-md-3 control-label"><?php echo $this->lang->line('city'); ?><small class="text-default">*</small></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="buyer_city" name="buyer_city" placeholder="<?php echo $this->lang->line('city'); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="buyer_state" class="col-md-3 control-label"><?php echo $this->lang->line('stateRegionProvince'); ?><small class="text-default">*</small></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="buyer_state" name="buyer_state" placeholder="<?php echo $this->lang->line('stateRegionProvince'); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="buyer_nation" class="col-md-3 control-label"><?php echo $this->lang->line('country'); ?><small class="text-default">*</small></label>
                                        <div class="col-md-9" style="margin-top: 5px;">
                                            <select id="buyer_nation" name="buyer_nation">
                                                <option value="0" data-delivery="0">== <?php echo $this->lang->line('select'); ?> ==</option>
                                                <option value="AL">Albania</option>
                                                <option value="DZ">Algeria</option>
                                                <option value="AR">Argentina</option>
                                                <option value="AM">Armenia</option>
                                                <option value="AU">Australia</option>
                                                <option value="AT">Austria</option>
                                                <option value="AZ">Azerbaijan</option>
                                                <option value="BH">Bahrain</option>
                                                <option value="BD">Bangladesh</option>
                                                <option value="BY">Belarus</option>
                                                <option value="BE">Belgium</option>
                                                <option value="BT">Bhutan</option>
                                                <option value="BA">Bosnia and Herzegovina</option>
                                                <option value="BW">Botswana</option>
                                                <option value="BR">Brazil</option>
                                                <option value="BN">Brunei Darussalam</option>
                                                <option value="BG">Bulgaria</option>
                                                <option value="KH">Cambodia</option>
                                                <option value="CA">Canada</option>
                                                <option value="CV">Cape Verde</option>
                                                <option value="CL">Chile</option>
                                                <option value="CN">China</option>
                                                <option value="CR">Costa Rica</option>
                                                <option value="HR">Croatia</option>
                                                <option value="CU">Cuba</option>
                                                <option value="CY">Cyprus</option>
                                                <option value="CZ">Czech Republic</option>
                                                <option value="DK">Denmark</option>
                                                <option value="DJ">Djibouti</option>
                                                <option value="DM">Dominica</option>
                                                <option value="EC">Ecuador</option>
                                                <option value="EG">Egypt</option>
                                                <option value="EE">Estonia</option>
                                                <option value="ET">Ethiopia</option>
                                                <option value="FJ">Fiji</option>
                                                <option value="FI">Finland</option>
                                                <option value="FR">France</option>
                                                <option value="GE">Georgia</option>
                                                <option value="DE">Germany</option>
                                                <option value="GR">Greece</option>
                                                <option value="HK">Hong Kong</option>
                                                <option value="HU">Hungary</option>
                                                <option value="IN">India</option>
                                                <option value="ID">Indonesia</option>
                                                <option value="IR">Iran, Islamic Republic of</option>
                                                <option value="IE">Ireland</option>
                                                <option value="IL">Israel</option>
                                                <option value="IT">Italy</option>
                                                <option value="JP">Japan</option>
                                                <option value="JO">Jordan</option>
                                                <option value="KZ">Kazakhstan</option>
                                                <option value="KE">Kenya</option>
                                                <option value="KR">Korea</option>
                                                <option value="LA">Lao People's Democratic Republic</option>
                                                <option value="LV">Latvia</option>
                                                <option value="LU">Luxembourg</option>
                                                <option value="MO">Macao</option>
                                                <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                                <option value="MY">Malaysia</option>
                                                <option value="MV">Maldives</option>
                                                <option value="MU">Mauritius</option>
                                                <option value="MX">Mexico</option>
                                                <option value="MN">Mongolia</option>
                                                <option value="MA">Morocco</option>
                                                <option value="MZ">Mozambique</option>
                                                <option value="MM">Myanmar</option>
                                                <option value="NP">Nepal</option>
                                                <option value="NL">Netherlands</option>
                                                <option value="NZ">New Zealand</option>
                                                <option value="NG">Nigeria</option>
                                                <option value="NO">Norway</option>
                                                <option value="OM">Oman</option>
                                                <option value="PK">Pakistan</option>
                                                <option value="PA">Panama</option>
                                                <option value="PE">Peru</option>
                                                <option value="PH">Philippines</option>
                                                <option value="PL">Poland</option>
                                                <option value="PT">Portugal</option>
                                                <option value="QA">Qatar</option>
                                                <option value="RO">Romania</option>
                                                <option value="RU">Russian Federation</option>
                                                <option value="RW">Rwanda</option>
                                                <option value="SA">Saudi Arabia</option>
                                                <option value="SG">Singapore</option>
                                                <option value="SK">Slovakia</option>
                                                <option value="SI">Slovenia</option>
                                                <option value="ES">Spain</option>
                                                <option value="LK">Sri Lanka</option>
                                                <option value="SE">Sweden</option>
                                                <option value="CH">Switzerland</option>
                                                <option value="TW">Taiwan</option>
                                                <option value="TZ">Tanzania, United Republic of</option>
                                                <option value="TH">Thailand</option>
                                                <option value="TN">Tunisia</option>
                                                <option value="TR">Turkey</option>
                                                <option value="UA">Ukraine</option>
                                                <option value="AE">United Arab Emirates</option>
                                                <option value="GB">United Kingdom</option>
                                                <option value="US">United States</option>
                                                <option value="UZ">Uzbekistan</option>
                                                <option value="VE">Venezuela</option>
                                                <option value="VN">Viet Nam</option>
                                                <option value="ZM">Zambia</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="buyer_state" class="col-md-3 control-label"><?php echo $this->lang->line('delivery'); ?></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" value="EMS" disabled>
                                            <input type="hidden" class="form-control" id="shipping_method" name="shipping_method" value="EMS">
                                            <div><small><?php echo $this->lang->line('emsSentence'); ?></small></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="space"></div>
                            <div class="row">
                                <div class="col-md-2">
                                    <h5 class="title"><?php echo $this->lang->line('note'); ?></h5>
                                </div>
                                <div class="col-lg-10">
                                    <div class="form-group">
                                        <label for="note" class="col-md-3 control-label"></label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" rows="4" id="note" name="note"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <table class="table cart" style="text-align: center;">
                            <thead>
                            <tr>
                                <th><?php echo $this->lang->line('reward'); ?> </th>
                                <th><?php echo $this->lang->line('deliveryFee'); ?> </th>
                                <th><?php echo $this->lang->line('totalCost'); ?> </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            foreach ($reward_views as $rv) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $this->lang->line('currency');?> <?php echo round($rv->reward_amount/$rate, 2); ?>
                                        <input type="hidden" id="reward_amount" name="reward_amount" value="<?php echo round($rv->reward_amount/$rate, 2); ?>">
                                        <input type="hidden" id="reward_num" name="reward_num" value="<?php echo $rv->reward_num; ?>">
                                    </td>
                                    <td>
                                        <?php echo $this->lang->line('currency');?> <?php echo round(10000/$rate, 2);?> <!-- 배송비 어떻게 할 것인지 결정해야 됨 -->
                                        <input type="hidden" id="shipping_amount" name="shipping_amount" value="<?php echo round(10000/$rate, 2);?>">
                                    </td>
                                    <td style="font-weight: bold; color: red;">
                                        <?php
                                        $total = round(($rv->reward_amount/$rate) + (10000/$rate), 2);
                                        echo $this->lang->line('currency').$total;
                                        ?>
                                    </td>
                                </tr>
                                <!-- 결제명 : "프로젝트 제목_리워드 제목_날짜" -->
                                <input type="hidden" name="name" id="name" value="<?php echo $pv->subject; ?>_<?php echo $rv->reward_subject; ?>_<?php echo date("YmdHis"); ?>" class="col-md-8 col-xs-8"/>
                                <!-- 총액 -->
                                <input type="hidden" name="amount" id="amount" value="<?php echo $total; ?>" class="col-md-8 col-xs-8"/>
                                <!-- 구매자 user_uid -->
                                <input type="hidden" name="merchant_uid" id="merchant_uid" value="" class="col-md-8 col-xs-8"/>
                                <?php
                            }
                            ?>
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                        <table class="table cart" style="text-align: center;">
                            <thead>
                            <tr>
                                <th><?php echo $this->lang->line('methodOfPayment'); ?> </th>
                                <!-- 숨김 정보 -->
                                <input type="hidden" name="pg_provider" id="pg_provider" value="paypal">
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="col-md-4">
                                        <input type="radio" name="pay_method" id="pay_method" value="paypal" checked> Paypal
                                    </div>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                        <div class="text-right">
                            <a id="requester" class="btn btn-group btn-default"><?php echo $this->lang->line('pledge')?></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</section>

