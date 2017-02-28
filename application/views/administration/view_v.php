
	<article id="project_area">
		<header>
			<h1></h1>
		</header>

		<?php
			if($this->uri->segment(4) == "projects_ko") {
				$segment = "lists_ko"; $reward = "reward_ko"; $progress_project = "progress_project_ko";
			} else if($this->uri->segment(4) == "projects_en") {
				$segment = "lists_en"; $reward = "reward_en"; $progress_project = "progress_project_en";
			} else if($this->uri->segment(4) == "projects_ch") {
				$segment = "lists_ch"; $reward = "reward_ch"; $progress_project = "progress_project_ch";
			}
		?>

		<div class="tabbable">
			<ul class="nav nav-tabs nav-justified">
				<li class="active"><a href="#tab1" data-toggle="tab">개요</a></li>
				<li><a href="#tab2" data-toggle="tab">리워드</a></li>
				<li><a href="#tab3" data-toggle="tab">진행상황</a></li>
				<li><a href="#tab4" data-toggle="tab">참여인원</a></li>
			</ul>

			<!-- project -->
			<div class="tab-content">
				<div class="tab-pane active" id="tab1">
					<p></p>
					<table cellspacing="0" cellpadding="0" class="table table-striped">
						<thead></thead>
						<tbody>

						<tr>
							<th>제목</th>
							<td colspan="5"><?php echo $projects_views->subject; ?></td>
						</tr>

						<tr>
							<th>프로젝트 요약</th>
							<td colspan="5"><?php echo $projects_views->summary; ?></td>
						</tr>
						<tr>
							<th>프로젝트 번호</th>
							<td style="font-weight: bold; color: blue;"><?php echo $projects_views->projects_num; ?></td>

							<th>국가</th>
							<td>
								<?php
									if($this->uri->segment(4) == 'projects_ko') {
								?>
								
										<input type="radio" name="nation" id="nation" value="1" checked> 한국어
										<!-- <input type="radio" name="nation" id="nation" value="2"> 영어
										<input type="radio" name="nation" id="nation" value="3"> 중국어
										<div style="size: 0.5em;"><span style="size: 1em; font-weight: bold; font-color: green;">한국어</span>관련 프로젝트</div> -->
								<?php
									} else if($this->uri->segment(4) == 'projects_en') {
								?>
										<!--<input type="radio" name="nation" id="nation" value="1" disabled> 한국어 -->
										<input type="radio" name="nation" id="nation" value="2" checked disabled> 영어
										<!--<input type="radio" name="nation" id="nation" value="3" disabled> 중국어
										<div style="size: 0.5em;"><span style="size: 1em; font-weight: bold; font-color: green;">영어</span>관련 프로젝트</div> -->
								<?php		
									} else {
								?>
										<!--<input type="radio" name="nation" id="nation" value="1" disabled> 한국어
										<input type="radio" name="nation" id="nation" value="2" disabled> 영어 -->
										<input type="radio" name="nation" id="nation" value="3" checked disabled> 중국어
										<!-- <div style="size: 0.5em;"><span style="size: 1em; font-weight: bold; font-color: green;">중국어</span>관련 프로젝트</div> -->
								<?php		
									}
								?>			
							</td>
							
							<th>작성자</th>
							<td><?php echo $projects_views->administor_id; ?></td>
						</tr>
						<tr>
							<th>목표 금액</th>
							<td><?php echo $projects_views->target_amount; ?></td>
							<th>모인 금액</th>
							<td><?php echo $projects_views->gather_amount; ?></td>
							<th>참여 인원 수</th>
							<td><?php echo $projects_views->funding_user_count; ?></td>
						</tr>
						
						<tr>
							<th>런칭 날짜</th>
							<td><?php echo $projects_views->launch_date; ?></td>
							<th>종료 날짜</th>
							<td><?php echo $projects_views->due_date; ?></td>
							<th>남은 기간</th>
							<td><?php echo $projects_views->period; ?></td>
						</tr>

						<tr>
							<th>Youtube 대표 사진</th>
							<td colspan="2">
								<div style="margin-bottom: 1.5em;">현재 Youtube 대표 사진</div>
								<img style="height: 250px; margin-bottom: 10px;" src="<?php echo $projects_views->youtube_img; ?>">
							</td>
							
							<th>project 대표 사진</th>
							<td colspan="2">
								<div style="margin-bottom: 1.5em;">현재 project 대표 사진</div>
								<img style="height: 250px; margin-bottom: 10px;" src="<?php echo $projects_views->project_img; ?>">
							</td>
						</tr>
						
						<tr>
							<th>Youtube URL</th>
							<td colspan="2">
								<?php echo $projects_views->youtube_url; ?>
							</td>
							<th>진행 여부</th>
							<td colspan="2">
								<?php 
									if($projects_views->state == 1) {
										echo "진행 중";
									} else if($projects_views->state == 2) {
										echo "런칭 전";
									} else {
										echo "종료";
									}
								?>
									
							</td>
						</tr>
						<tr>
							<th colspan="6">내용</th>		
						</tr>
						<tr>
							<td colspan="6"><?php echo $projects_views->contents; ?></td>
						</tr>
						</tbody>
						<tfoot></tfoot>
					</table>

					<hr>

					<div align="right">
						<a href="/index.php/administration/project/<?php echo $segment; ?>/<?php echo $this->uri->segment(4); ?>/page/<?php echo $this->uri->segment(8); ?>" class="btn btn-primary">목록</a>
						<a href="/index.php/administration/project/modify/<?php echo $this->uri->segment(4); ?>/projects_id/<?php echo $this->uri->segment(6) ;?>/page/<?php echo $this->uri->segment(8); ?>" class="btn btn-warning">수정</a>
					</div>
				</div>

				<!-- reward -->
				<div class="tab-pane" id="tab2">
					<p></p>
					<?php
						if($reward_views == NULL) {
							echo "<h1>리워드 정보가 없습니다.</h1>";
						} else {
							foreach ($reward_views as $rv) {
					?>
								<table cellspacing="0" cellpadding="0" class="table table-striped" style="border: solid black 2px;">
									<thead></thead>
									<tbody>
									<tr>
										<th class="col-md-2">리워드 번호</th>
										<td class="col-md-10" style="font-weight: bold; color:blue;"><?php echo $rv->reward_num; ?></td>
									</tr>
									<tr>
										<th class="col-md-2">리워드 금액</th>
										<td class="col-md-10"><?php echo $rv->reward_amount; ?></td>
									</tr>
									<tr>
										<th class="col-md-2">리워드 이름</th>
										<td class="col-md-10"><?php echo $rv->reward_subject; ?></td>
									</tr>
									<tr>
										<th class="col-md-2">수 량</th>
										<td class="col-md-10"><?php echo $rv->count; ?></td>
									</tr>
									<tr>
										<th class="col-md-2">참여 상태</th>
										<?php
											if($rv->state == 1) {
										?>
												<td class="col-md-10" style="color: blue;">
										<?php		
													echo '참여 가능';
										?>
												</td>
										<?php
											} else {
										?>
												<td class="col-md-10" style="color: red;">
										<?php 
													echo '참여 불가능'

										?>
												</td>
										<?php
											}
										?>
									</tr>
									<tr>
										<th colspan="2">리워드 내용</th>		
									</tr>
									<tr>
										<td colspan="2"><?php echo $rv->reward_contents; ?></td>
									</tr>
									<tr>
										<td colspan="2" align="right">
											<a href="/index.php/administration/project/reward_modify/<?php echo $reward; ?>/projects_id/<?php echo $this->uri->segment(6); ?>/reward_id/<?php echo $rv->reward_id; ?>" class="btn btn-warning">수정</a>
											<a href="/index.php/administration/project/reward_delete/<?php echo $reward; ?>/project_id/<?php echo $this->uri->segment(6); ?>/reward_id/<?php echo $rv->reward_id; ?>" class="btn btn-danger">삭제</a>
										</td>
									</tr>
									</tbody>
									<tfoot></tfoot>
								</table>
					<?php
							}
						}
					?>
					<hr>
					<div align="right">
						<a href="/index.php/administration/project/<?php echo $segment; ?>/<?php echo $this->uri->segment(4); ?>/page/<?php echo $this->uri->segment(8); ?>" class="btn btn-primary">목록</a>
						<a href="/index.php/administration/project/reward_write/<?php echo $reward; ?>/projects_id/<?php echo $this->uri->segment(6); ?>" class="btn btn-success">추가</a>
					</div>
				</div>
				
				<!-- progress_project -->
				<div class="tab-pane" id="tab3">
					<p></p>
					<?php
						if($progress_views == NULL) {
							echo "<h1>프로젝트 진행 상황 정보가 없습니다.</h1>";
						} else {
							foreach ($progress_views as $pv) {
					?>
								<table cellspacing="0" cellpadding="0" class="table table-striped" style="border: solid black 2px;">
									<thead></thead>
									<tbody>
									<tr>
										<th class="col-md-2">Progress 번호</th>
										<td class="col-md-10"><?php echo $pv->progress_project_id; ?></td>
									</tr>
									<tr>
										<th class="col-md-2">Progress 제목</th>
										<td class="col-md-10"><?php echo $pv->progress_subject; ?></td>
									</tr>
									<tr>
										<th class="col-md-2">Progress 영상</th>
										<td class="col-md-10">
											<?php 
												if($pv->progress_youtube_url != NULL ) {
											?>
													<a href="<?php echo $pv->progress_youtube_url; ?>"><?php echo $pv->progress_youtube_url?></a>
											<?php
												} else {
											
													echo "영상 없음";	
												}
											?>
												
										</td>
									</tr>
									<tr>
										<th colspan="2">Progress 내용</th>		
									</tr>
									<tr>
										<td colspan="2"><?php echo $pv->progress_contents; ?></td>
									</tr>
									<tr>
										<td colspan="2" align="right">
											<a href="/index.php/administration/project/progress_project_modify/<?php echo $progress_project; ?>/projects_id/<?php echo $this->uri->segment(6); ?>/progress_project_id/<?php echo $pv->progress_project_id; ?>" class="btn btn-warning">수정</a>
											<a href="/index.php/administration/project/progress_project_delete/<?php echo $progress_project;?>/projects_id/<?php echo $this->uri->segment(6); ?>/progress_project_id/<?php echo $pv->progress_project_id; ?>" class="btn btn-danger">삭제</a>
										</td>
									</tr>
									</tbody>
									<tfoot></tfoot>
								</table>
					<?php
							}
						}
					?>
					<hr>
					<div align="right">
						<a href="/index.php/administration/project/<?php echo $segment; ?>/<?php echo $this->uri->segment(4); ?>/page/<?php echo $this->uri->segment(8); ?>" class="btn btn-primary">목록</a>
						<a href="/index.php/administration/project/progress_project_write/<?php echo $progress_project; ?>/projects_id/<?php echo $this->uri->segment(6); ?>" class="btn btn-success">추가</a>
					</div>	
				</div>


				<!-- funding user -->
				<div class="tab-pane" id="tab4">
					<p></p>
					<table cellspacing="0" cellpadding="0" class="table table-striped" style="border: solid black 2px;">
						<thead>
							<tr>
								<th>이름</th>
								<th>이메일</th>
								<th>전화 번호</th>
								<th>총 결제 금액</th>
								<th>상세 보기</th>
							</tr>
						</thead>
						<tbody>

							<?php
								if($fundingUser_views == NULL ){
									echo "해당 프로젝트의 후원자가 없습니다.";
								} else {
									foreach ($fundingUser_views as $fuv) {
							?>
										<tr>
											<td><?php echo $fuv->buyer_name; ?></td>
											<td><?php echo $fuv->buyer_email; ?></td>
											<td><?php echo $fuv->buyer_tel; ?></td>
											<td><?php echo $fuv->amount; ?></td>
											<td>
												<a href="/index.php/administration/project/fundingUserDetail/<?php echo $this->uri->segment(4); ?>/delivery_id/<?php echo $fuv->delivery_id; ?>?projects_id=<?php echo $this->uri->segment(6); ?>&page=<?php echo $this->uri->segment(8); ?>">상세보기</a>
											</td>
										</tr>
							<?php
									}
								}
							?>
						</tbody>
						<tfoot></tfoot>
					</table>
				</div>
			</div>
		</div>
	</article>