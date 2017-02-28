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
				foreach($projects_list_ko as $plk) {
				?>
					<tr>
						<th scope="row">
							<?php echo $plk->projects_num; ?>								
						</th>
						<td style="font-weight: bold;">
							<a rel="external" href="/index.php/administration/project/view/projects_ko/projects_id/<?php echo $plk->projects_id; ?>/page/<?php echo $this->uri->segment(6); ?>"><?php echo $plk->subject; ?></a>
						</td>
						<td>
							<?php 
							echo $plk->administor_id;
							?>
						</td>
						<td><time datetime="<?php echo mdate("%Y-%m-%d %h:%i:%s", human_to_unix($plk->reg_date)); ?>"><?php echo mdate("%Y-%m-%d %h:%i:%s", human_to_unix($plk->reg_date));?></time>
						</td>
						<?php 
						if($plk->state == 1) {
						?>
							<td style="color: blue; font-weight: bold;">
							<?php
								echo '진행 중';
							?>
							</td>
						<?php
						} else if($plk->state == 2) {
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
							<a href="/index.php/administration/project/delete/projects_ko/projects_id/<?php echo $plk->projects_id;?>/page/<?php echo $this->uri->segment(6); ?>">삭제</a>
						</td>
					</tr>
				<?php
				}

				?>
			</tbody>
			<tfoot>
				<tr>
					<th colspan="5"><?php echo $pagination; ?></th>
					<th class="col-md-1"><a href="/index.php/administration/project/write/projects_ko" class="btn btn-primary">프로젝트 추가</a></th>
				</tr>
			</tfoot>
		</table>

		<div>
			<!-- <?php
				// $attributes = array('class'=>'form-horizontal', 'id'=>'bd_search');
				// echo form_open('administration/project/lists/projects', $attributes);
			?> -->
			<form id="bd_search_ko" method="post">
				<input type="text" name="search_word" id="q" onkeypress="board_search_enter(document.q);"/> 
				<input type="button" value="검색" id="search_btn_ko"/>
			</form>
		</div>
	</article>

