	<article id="project_area">
		<header>
			<h1></h1>
		</header>

		<table cellspacing="0" cellpadding="0" class="table table-striped">
				<thead>
					<tr>
						<th scope="col">번호</th>
						<th scope="col">제목</th>
						<th scope="col">작성자</th>
						<th scope="col">등록일</th>
						<th scope="col">상태</th>
						<th scope="col"></th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach($projects_list_ch as $plc) {
					?>
						<tr>
							<th scope="row">
								<?php echo $plc->projects_num; ?>								
							</th>
							<td style="font-weight: bold;">
								<a rel="external" href="/index.php/administration/project/view/projects_ch/projects_id/<?php echo $plc->projects_id; ?>/page/<?php echo $this->uri->segment(6); ?>"><?php echo $plc->subject; ?></a>
							</td>
							<td>
								<?php 
								echo $plc->administor_id;
								?>
							</td>
							<td><time datetime="<?php echo mdate("%Y-%m-%d %h:%i:%s", human_to_unix($plc->reg_date)); ?>"><?php echo mdate("%Y-%m-%d %h:%i:%s", human_to_unix($plc->reg_date));?></time>
							</td>
							<?php 
							if($plc->state == 1) {
							?>
								<td style="color: blue; font-weight: bold;">
								<?php
									echo '진행 중';
								?>
								</td>
							<?php
							} else if($plc->state == 2) {
							?>
								<td style="color: green;">
								<?php
									echo '런칭 전';
								?>
								</td>
							<?php
							} else {
							?>
								<td style="color: black;">
								<?php
									echo '종료';
								?>
								</td>
							<?php
							}
							?>
							<td>
								<a href="/index.php/administration/project/delete/projects_ch/projects_id/<?php echo $plc->projects_id;?>/page/<?php echo $this->uri->segment(6); ?>">삭제</a>
							</td>
						</tr>
					<?php
					}
					?>
				</tbody>
				<tfoot>
					<tr>
						<th colspan="5"><?php echo $pagination; ?></th>
						<th class="col-md-1"><a href="/index.php/administration/project/write/<?php echo $this->uri->segment(4); ?>" class="btn btn-primary">프로젝트 추가</a></th>
					</tr>
				</tfoot>
			</table>

			<div>
				<!-- <?php
					// $attributes = array('class'=>'form-horizontal', 'id'=>'bd_search');
					// echo form_open('administration/project/lists/projects', $attributes);
				?> -->
				<form id="bd_search_ch" method="post">
					<input type="text" name="search_word" id="q" onkeypress="board_search_enter(document.q);"/> 
					<input type="button" value="검색" id="search_btn_ch"/>
				</form>
			</div>

	</article>

	