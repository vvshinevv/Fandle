    <?php
    $payment_data = $checkPayment_views->data;
    $merchant_uid = $payment_data->merchant_uid;
    ?>
    <script type="text/javascript">
        $(document).ready( function() {

            <!-- 자바 스크립트에서 주소값 파싱해서 get방식으로 받기 -->
            var getParam = function(key){
                var _parammap = {};
                document.location.search.replace(/\??(?:([^=]+)=([^&]*)&?)/g, function () {
                    function decode(s) {
                        return decodeURIComponent(s.split("+").join(" "));
                    }

                    _parammap[decode(arguments[1])] = decode(arguments[2]);
                });

                return _parammap[key];
            };

            <!-- 자바스크립트에서 uri segment 함수-->
            var uri = {
                segment_array: function() {
                    var path = location.pathname;
                    path = path.substr(1);

                    if (path.slice(-1) == '/') {
                        path = path.substr(0 , path.length-1);
                    }

                    var seg_arr = path.split('/');

                    if (seg_arr[0] == 'index.php') {
                        seg_arr.shift();
                    }
                    return seg_arr;
                },
                segment: function(n , v) {
                    var seg_array = this.segment_array();
                    var seg_n = seg_array[n-1];

                    if (typeof seg_n == 'undefined') {
                        if (typeof v != 'undefined') {
                            return v;
                        } else {
                            return false;
                        }
                    } else {
                        return seg_n;
                    }
                }
            };

           $("#cancelPayment").click(function() {
               var f = confirm("정말 취소하시겠습니까?");
               if(f) {
                   location.href = "/index.php/path/cancelPayment/" + uri.segment(4) + "/delivery_id/" + uri.segment(6) + "?projects_id=" + getParam("projects_id") + "&page=" + getParam("page") + "&merchant_uid=<?php echo $merchant_uid; ?>";
               } else {
                   return false;
               }
           });


        });
    </script>

    <table cellspacing="0" cellpadding="0" class="table table-striped">
        <thead>
            <tr>
                <th colspan="2">프로젝트명</th>
                <th colspan="6">리워드 명</th>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <img width="250px;" src="<?php echo $projects_views->project_img; ?>">
                    <p style="text-align: center;"><?php echo $projects_views->subject; ?></p>
                </td>
                <td colspan="6">
                    <?php
                        foreach ($reward_views as $rv) {
                    ?>
                            <h4><strong><?php echo $rv->reward_subject; ?></strong></h4>
                    <?php

                            echo $rv->reward_contents;
                        }
                    ?>
                </td>
            </tr>

        </thead>
        <tbody>
            <tr>
                <th>이름</th>
                <td><?php echo $fundingUser_views->buyer_name; ?></td>
                <th>이메일</th>
                <td><?php echo $fundingUser_views->buyer_email ?></td>
                <th>전화번호</th>
                <td colspan="3"><?php echo $fundingUser_views->buyer_tel; ?></td>
            </tr>

            <tr>
                <th>리워드 금액</th>
                <td><?php echo $fundingUser_views->reward_amount; ?></td>
                <th>배송 금액</th>
                <td><?php echo $fundingUser_views->shipping_amount; ?></td>
                <th>총 금액</th>
                <td><?php echo $fundingUser_views->amount; ?></td>
                <th>배송 방법</th>
                <td>

                    <?php
                        if($fundingUser_views->shipping_method == NULL) {
                            echo "국내 배송";
                        } else {
                            echo "국제 배송";
                        } ?>
                </td>
            </tr>

            <tr>
                <th>주소</th>
                <td colspan="7"><?php echo $fundingUser_views->buyer_addr; ?></td>
            </tr>
            <tr>
                <th>상세주소</th>
                <td colspan="7">
                    <?php
                        if($fundingUser_views->buyer_addr_detail != null) {
                            echo $fundingUser_views->buyer_addr_detail;
                        } else {
                            echo "상세 주소 없음";
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <th>우편번호</th>
                <td><?php echo $fundingUser_views->buyer_postcode; ?></td>
                <th>후원자 국적</th>
                <td>
                    <?php
                        if($fundingUser_views->buyer_nation == 'ko') {
                            echo '한국';
                        } else if($fundingUser_views->buyer_nation == 'en') {
                            echo '미국';
                        } else {
                            echo '중국';
                        }
                    ?>
                </td>
                <th>후원자 도시</th>
                <td>
                    <?php
                        if($fundingUser_views->buyer_city != null) {
                            echo $fundingUser_views->buyer_addr_detail;
                        } else {
                            echo "내용 없음";
                        }
                    ?>
                </td>
                <th>후원자 주</th>
                <td>
                    <?php

                        if($fundingUser_views->buyer_state != null){
                            echo $fundingUser_views->buyer_state;
                        } else {
                            echo "내용 없음";
                        }
                    ?>
                </td>
            </tr>
        </tbody>
        <tfoot></tfoot>
    </table>
    <table cellspacing="0" cellpadding="0" class="table table-striped">
        <thead></thead>
        <tbody>
            <tr style="font-size: 15px;">
                <th>imp_uid<small style="font-size: 10px;">(고유아이디)</small></th>
                <th>결제 금액</th>
                <th>PG사</th>
                <th>카드사승인번호</th>
                <th>할부</th>
                <th>주문명</th>
                <th>결제 시각</th>
                <th>상태</th>
            </tr>
            <tr style="font-size: 13px;">

                <td>
                    <?php echo $payment_data->merchant_uid; ?>
                </td>
                <td style="font-weight: bold; color: blue; font-size: medium;"><?php echo $payment_data->amount; ?></td>
                <td><?php
                        if($payment_data->pg_provider == 'html5_inicis') {
                            echo "이니시스(웹표준)";
                        } else if($payment_data->pg_provider == 'paypal') {
                            echo "페이팔";
                        } else {
                            echo "정보 불확인";
                        }

                    ?>
                </td>
                <td><?php echo $payment_data->pg_tid; ?></td>
                <td>
                    <?php
                        if($payment_data->card_quota == 0){
                            echo "일시불";
                        } else {
                            echo $payment_data->card_quota." 개월";
                        }
                    ?>
                </td>
                <td><?php echo $payment_data->name; ?></td>
                <td><?php echo date("Y-m-d G:i:s", $payment_data->paid_at); ?></td>
                <td>
                    <?php
                        if($payment_data->status == 'ready') {
                            echo "미결제";
                        } else if($payment_data->status == 'paid') {
                            echo "결제 완료";
                    ?>
                            <button id="cancelPayment" name="cancelPayment" class="btn btn-danger" value="결제 취소" style="height: 20px; font-size: 10px; align-self: center">결제취소</button>
                    <?php
                        } else if($payment_data->status == 'cancelled') {
                            echo "결제 취소";
                        } else {
                            echo "결제 실패";
                        }
                    ?>
                </td>
            </tr>
        </tbody>
        <tfoot></tfoot>
    </table>

























