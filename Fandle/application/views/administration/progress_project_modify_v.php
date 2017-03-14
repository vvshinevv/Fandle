	<script type="text/javascript">
		$(document).ready( function() {
			$("#write_btn").click( function() {
				if($("#progress_subject").val() == '') {
					alert("진행 관련 제목을 입력해주세요.");
					$("#progress_subject").focus();
					return false;
				} else {
					$("#write_action").submit();
				}
			});
		});
	</script>
	<style type="text/css">
		input {
			padding: 0px;
		}
		table div {
			font-size: 0.8em;
		}
	</style>
	<article id="board_area">
		<header>
			<h1></h1>
		</header>
			<?php echo validation_errors(); ?>
			<?php
				if(form_error('progress_contents')) {
					$error_contents = form_error('progress_contents');
				} else {
					$error_contents = form_error('progress_contents_check');
				}
			?>
			<form class="form-horizontal" method="post" action="" id="write_action" action="">
			<!-- <?php
				//$attributes = array('class'=>'form-horizontal', 'id'=>'write_action');
				//echo form_open('administration/project/progress_project_modify/progress_project/projects_id/'.$this->uri->segment(6).'/progress_project_id/'.$this->uri->segment(8), $attributes);
			?> -->
				<fieldset>
					<legend>진행 프로젝트 수정</legend>

					<table cellspacing="0" cellpadding="0" class="table table-striped">
						<thead></thead>
						<tbody>
						<tr>
							<th>진행 프로젝트 제목</th>
							<td>
								<input type="text" id="progress_subject" name="progress_subject" value="<?php echo set_value('progress_subject', $progress_views->progress_subject); ?>">
								<div>진행 프로젝트 제목을 입력하세요</div>
							</td>
						</tr>
						<tr>
							<th>진행 프로젝트 영상 URL</th>
							<td>
								<input type="text" id="progress_youtube_url" name="progress_youtube_url" value="<?php echo set_value('progress_youtube_url', $progress_views->progress_youtube_url); ?>" placeholder="영상이 없으면 비어두세요.">
								<div>youtube ID</div>
							</td>
						</tr>
						<tr>
							<th>진행 프로젝트 내용</th>	
							<td>
								<?php
									if($error_contents == FALSE ) {
								?>
										<div>아래 부분에 내용을 입력해주세요</div>
								<?php
									} else {
								?>
										<div style="color: red; font-weight: bold;">내용을 입력해주세요!</div>
								<?php		
									}
								?>
								
							</td>	
						</tr>
						<tr>
							<td colspan="2">
								<textarea class="col-md-12" id="progress_contents" name="progress_contents" style="padding: 0px;"><?php echo set_value('progress_contents', $progress_views->progress_contents); ?></textarea>
							</td>
						</tr>
						</tbody>
						<tfoot></tfoot>
					</table><hr>
					
					<div class="form-actions" align="right">
						<button type="submit" class="btn btn-primary" id="write_btn">수정</button>
						<button class="btn" onclick="document.location.reload()">취소</button>				
					</div>
				</fieldset>
			</form>
	</article>
	<script src="/static/lib/ckeditor/ckeditor.js"></script>
	<script>
		CKEDITOR.replace('progress_contents', {
			'filebrowserUploadUrl':'/index.php/administration/project/upload_receive/' // 파일 전송
		});
	</script>