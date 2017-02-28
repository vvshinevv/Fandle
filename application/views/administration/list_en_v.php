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
				foreach($projects_list_en as $ple) {
				?>
					<tr>
						<th scope="row">
							<?php echo $ple->projects_num; ?>								
						</th>
						<td style="font-weight: bold;">
							<a rel="external" href="/index.php/administration/project/view/projects_en/projects_id/<?php echo $ple->projects_id; ?>/page/<?php echo $this->uri->segment(6); ?>"><?php echo $ple->subject; ?></a>
						</td>
						<td>
							<?php 
							echo $ple->administor_id;
							?>
						</td>
						<td><time datetime="<?php echo mdate("%Y-%m-%d %h:%i:%s", human_to_unix($ple->reg_date)); ?>"><?php echo mdate("%Y-%m-%d %h:%i:%s", human_to_unix($ple->reg_date));?></time>
						</td>
						<?php 
						if($ple->state == 1) {
						?>
							<td style="color: blue; font-weight: bold;">
							<?php
								echo '진행 중';
							?>
							</td>
						<?php
						} else if($ple->state == 2) {
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
							<a href="/index.php/administration/project/delete/projects_en/projects_id/<?php echo $ple->projects_id;?>/page/<?php echo $this->uri->segment(6); ?>">삭제</a>
						</td>
					</tr>
				<?php
				}
				?>
			</tbody>
			<tfoot>
				<tr>
					<th colspan="5"><?php echo $pagination; ?></th>
					<th class="col-md-1"><a href="/index.php/administration/project/write/projects_en" class="btn btn-primary">프로젝트 추가</a></th>
				</tr>
			</tfoot>
		</table>

		<div>
			<!-- <?php
				// $attributes = array('class'=>'form-horizontal', 'id'=>'bd_search');
				// echo form_open('administration/project/lists/projects', $attributes);
			?> -->
			<form id="bd_search_en" method="post">
				<input type="text" name="search_word" id="q" onkeypress="board_search_enter(document.q);"/> 
				<input type="button" value="검색" id="search_btn_en"/>
			</form>
		</div>
	</article>

	

	