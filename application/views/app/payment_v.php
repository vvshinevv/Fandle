	<label></label>
	<section class="section light-gray-bg clearfix">
		<?php
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
								<th>상품명 </th>
								<th>리워드 </th>
								<th>수량 </th>
								<th class="amount">금액 </th>
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
									<td class="amount"><?php echo $this->lang->line('currency'); ?> <?php echo $rv->reward_amount; ?> </td>
								</tr>
							<?php
								}
							?>
						</tbody>
					</table>

					<form method="post" id="frm_payment" name="frm_payment" class="form-horizontal">

						<fieldset>
							<legend>배송정보</legend>
							
								<div class="row">
									<div class="col-md-2">
										<h5 class="title">개인 정보</h5>
									</div>
									<div class="col-lg-10">
										<div class="form-group">
											<label for="buyer_name" class="col-md-3 control-label">이 름<small class="text-default">*</small></label>
											<div class="col-md-9">
												<input type="text" class="form-control" id="buyer_name" name="buyer_name" placeholder="이름" value="<?php echo $this->session->userdata('username'); ?>">
											</div>
										</div>
										<div class="form-group">
											<label for="buyer_tel" class="col-md-3 control-label">전화번호<small class="text-default">*</small></label>
											<div class="col-md-9">
												<input type="text" class="form-control" id="buyer_tel" name="buyer_tel" placeholder="전화번호">
											</div>
										</div>
										<div class="form-group">
											<label for="buyer_email" class="col-md-3 control-label">이메일<small class="text-default">*</small></label>
											<div class="col-md-9">
												<input type="email" class="form-control" id="buyer_email" name="buyer_email" placeholder="이메일" value="<?php echo $this->session->userdata('email'); ?>">
											</div>
										</div>
									</div>
								</div>

								<div class="space"></div>

								<div class="row">
									<div class="col-md-2">
										<h5 class="title">주소</h5>
									</div>
									<div class="col-lg-10">
										<div class="form-group">
											<label for="buyer_postcode" class="col-md-3 control-label">우편 번호<small class="text-default">*</small></label>
											<div class="col-md-7">
												<input type="text" class="form-control postcodify_postcode5" id="buyer_postcode" name="buyer_postcode" placeholder="우편번호">
											</div>
											<div class="col-md-1">
												<a id="postcodify_search_button" class="btn btn-dark btn-sm" style="font-size: 10px;">검색</a>
											</div>
										</div>
										<div class="form-group">
											<label for="buyer_addr" class="col-md-3 control-label">주소<small class="text-default">*</small></label>
											<div class="col-md-9">
												<input type="text" class="form-control postcodify_address" id="buyer_addr" name="buyer_addr" placeholder="주소">
											</div>
										</div>
										<div class="form-group">
											<label for="buyer_addr_detail" class="col-md-3 control-label">상세주소</label>
											<div class="col-md-9">
												<input type="text" class="form-control postcodify_details" id="buyer_addr_detail" name="buyer_addr_detail" placeholder="상세주소">
											</div>
										</div>
									</div>
								</div>
								<div class="space"></div>
								<div class="row">
									<div class="col-md-2">
										<h5 class="title">비고</h5>
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
								<th>리워드 </th>
								<th>배송비 </th>
								<th>최종 결제 금액 </th>
							</tr>
							</thead>
							<tbody>
							<?php

							foreach ($reward_views as $rv) {
								?>
								<tr>
									<td>
										<?php echo $this->lang->line('currency'); ?> <?php echo $rv->reward_amount; ?>
										<input type="hidden" id="reward_amount" name="reward_amount" value="<?php echo $rv->reward_amount; ?>">
										<input type="hidden" id="reward_num" name="reward_num" value="<?php echo $rv->reward_num; ?>">
									</td>
									<td>
										<?php echo $this->lang->line('currency'); ?> 2500 <!-- 배송비 어떻게 할 것인지 결정해야 됨 -->
										<input type="hidden" id="shipping_amount" name="shipping_amount" value="2500">
									</td>
									<td style="font-weight: bold; color: red;">
										<?php echo $this->lang->line('currency'); ?>
										<?php
										$total = $rv->reward_amount + 2500;
										echo $total;
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
								<!-- 구매자 국가 -->
								<input type="hidden" id="buyer_nation" name="buyer_nation" value="KR">
								<!-- 구매자 도시 -->
								<input type="hidden" id="buyer_city" name="buyer_city" value="KR">
								<!-- 구매자 주 -->
								<input type="hidden" id="buyer_state" name="buyer_state" value="KR">
								<!-- 구매자 배송 방법 -->
								<input type="hidden" id="shipping_method" name="shipping_method" value="KR">
								
							</tfoot>
						</table>



						<table class="table cart" style="text-align: center;">
							<thead>
								<tr>
									<th>결제 방법 </th>
									<!-- 숨김 정보 -->
									<input type="hidden" name="pg_provider" id="pg_provider" value="html5_inicis">
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<div class="col-md-4">
											<input type="radio" name="pay_method" id="pay_method" value="card" checked> 신용카드
										</div>
										<div class="col-md-4">
											<input type="radio" name="pay_method" id="pay_method" value="trans"> 계좌이체
										</div>
										<div class="col-md-4">
											<input type="radio" name="pay_method" id="pay_method" value="phone"> 휴대폰 결제
										</div>
									</td>
								</tr>
								
							</tbody>
						</table>
						
						<div class="text-right">
							<a id="requester" class="btn btn-group btn-default" style="background-color: indianred; border: 0px;">결제</a>
						</div>
					</form>
				</div>
			</div>
		</div>
		<?php
			}
		?>
	</section>
	<!-- 우편 검색 -->
	<script src="//d1p7wdleee1q2z.cloudfront.net/post/search.min.js"></script>
	<script type="text/javascript">
		// 우편 검색
		//-----------------------------------------------
		$("#postcodify_search_button").postcodifyPopUp();
	</script>
