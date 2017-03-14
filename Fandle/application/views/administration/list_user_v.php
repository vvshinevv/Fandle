	<article id="project_area">
		<header>
			<h1></h1>
		</header>

		<table cellspacing="0" cellpadding="0" class="table table-striped">
			<thead>
				<tr>
					<th scope="col">번호</th>
					<th scope="col">이메일</th>
					<th scope="col">이름</th>
					<th scope="col">닉네임</th>
					<th scope="col">등록일</th>
					<th scope="col">상세보기</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach($user_lists as $ul) {
				?>
					<tr>
						<th scope="row">
							<?php echo $ul->user_id; ?>								
						</th>
						<td>
							<?php echo $ul->email; ?>
						</td>
						<td>
							<?php echo $ul->username; ?>
						</td>
						<td>
							<?php echo $ul->nickname; ?>
						</td>
						<td><time datetime="<?php echo mdate("%Y-%m-%d %h:%i:%s", human_to_unix($ul->reg_date)); ?>"><?php echo mdate("%Y-%m-%d %h:%i:%s", human_to_unix($ul->reg_date));?></time>
						</td>
						<td>
							<a href="/index.php/administration/users/user_detail/user/user_id/<?php echo $ul->user_id;?>/page/<?php echo $this->uri->segment(6); ?>">보기</a>
						</td>
					</tr>
				<?php
				}
				?>
			</tbody>
			<tfoot>
				<tr>
					<th colspan="6"><?php echo $pagination; ?></th>
				</tr>
			</tfoot>
		</table>

		<div>
			<!-- <?php
				// $attributes = array('class'=>'form-horizontal', 'id'=>'bd_search');
				// echo form_open('administration/project/lists/projects', $attributes);
			?> -->
			<form id="bd_search_user" method="post">
				<input type="text" name="search_word" id="q" onkeypress="board_search_enter(document.q);"/> 
				<input type="button" value="검색" id="search_btn_user"/>
			</form>
		</div>
	</article>

