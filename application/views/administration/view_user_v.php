	<article id="project_area">
		<header>
			<h1></h1>
		</header>

		<?php //var_dump($user_views); //object?>
		<?php //echo '<br>';?>
		<?php //var_dump($delivery_views); //object?>
		<?php //echo '<br>';?>
		<?php //var_dump($funding_user_views); ?>
		<?php //echo '<br>';?>
		<?php //var_dump($reward_views); ?>
		<?php //echo '<br>';?>
		<?php //var_dump($projects_views); ?>


		
		<table cellspacing="0" cellpadding="0" class="table table-striped" style="border: solid black 2px;">
			<thead></thead>
			<tbody>
				<tr>
					<th>번호</th>
					<td><?php echo $user_views->user_id; ?></td>
				</tr>
				<tr>
					<th>이름</th>
					<td><?php echo $user_views->username; ?></td>
				</tr>
				<tr>
					<th>닉네임</th>
					<td><?php echo $user_views->nickname; ?></td>
				</tr>
				<tr>
					<th>이메일</th>
					<td><?php echo $user_views->email; ?></td>
				</tr>
				<tr>
					<th>가입일</th>
					<td><?php echo $user_views->reg_date; ?></td>
				</tr>	
			</tbody>
			<tfoot></tfoot>
		</table>

		<?php
			if($funding_user_views != NULL) {
		?>
			<table cellspacing="0" cellpadding="0" class="table table-striped" style="border: solid black 2px;">
				<thead >
					<tr>
						<th style="text-align: center;">프로젝트 사진</th>
						<th style="text-align: center;" colspan="2">리워드</th>
						<th style="text-align: center;">수량</th>
						<th style="text-align: center;">금액</th>
						<th style="text-align: center;">배송 상태</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<img style="height: 100px;" src="<?php echo $projects_views->project_img; ?>">
							<div>
								<?php echo $projects_views->subject; ?>
							</div>
						</td>
						<td style="text-align: auto;" colspan="2">
							<?php echo $reward_views->reward_contents; ?>
						</td>
						<td>
							<?php echo 1;?>
						</td>
						<td>
							<?php echo $reward_views->reward_amount; ?>
						</td>
						<?php 
							if($funding_user_views->delivery_state == 1) {
						?>
							<td style="font-weight: bold; color: blue;">
								<?php echo "배송 완료";?>
							</td>
						<?php
							} else if ($funding_user_views->delivery_state == 2) {
						?>
							<td style="font-weight: bold; color: green;">
								<?php echo "배송 중"; ?>
							</td>
						<?php
							} else {
						?>
							<td style="font-weight: bold; color: red;">
								<?php echo "배송 전"; ?>
							</td>
						<?php
							}
						?>
					</tr>
					<tr>
						<th colspan="6" style="text-align: center;">배송 정보</th>
					</tr>
					<tr>
						<th>국가</th>
						<td><?php echo $delivery_views->nation; ?></td>
						<th>전화 번호</th>
						<td><?php echo $delivery_views->phone; ?></td>
						<th>우편 번호</th>
						<td><?php echo $delivery_views->zipcode; ?></td>
					</tr>
					<tr>
						<th>주소</th>
						<td colspan="5"><?php echo $delivery_views->address; ?></td>
					</tr>
					<tr>
						<th>상세 주소</th>
						<td colspan="5"><?php echo $delivery_views->address_detail; ?></td>
					</tr>
					<tr>
						<th>배송 방법</th>
						<td><?php echo $delivery_views->shipping_method; ?></td>
						<th>도시</th>
						<td><?php 
							if($delivery_views->city != NULL) {
								echo $delivery_views->city;
							} else {
								echo "없음";
							}
						?></td>
						<th>주</th>
						<td><?php 
							if($delivery_views->state != NULL) {
								echo $delivery_views->state; 
							} else {
								echo "없음";
							}
						?></td>
					</tr>
					<tr>
						<th>비고</th>
						<td colspan="5"><?php echo $delivery_views->note; ?></td>
					</tr>
				</tbody>
				<tfoot></tfoot>
			</table>
		<?php
			}
		?>
		<div align="right">
			<a href="/index.php/administration/users/lists_user/<?php echo $this->uri->segment(4); ?>/page/<?php echo $this->uri->segment(8); ?>" class="btn btn-primary">목록</a>
		</div>
	</article>