	<script type="text/javascript">
		var flag_reward = 0;
		$(document).ready( function() {
			$("#write_btn").click( function() {
				if($("#reward_amount").val() == '') {
					alert("리워드 금액을 입력해주세요.");
					$("#reward_amount").focus();
					return false;
				} else if($("#reward_subject").val() == '') {
					alert("리워드 이름을 입력해주세요.");
					$("#reward_subject").focus();
					return false;
				} else if($("#count").val() == '') {
					alert("리워드 수량을 입력해주세요.");
					$("#count").focus();
					return false;
				} else if(flag_reward == 0) {
					alert('중복확인을 눌러주세요.');
					flag_reward = 0;
					$("#reward_num").focus();
					return false;
				}  
				else {
					$("#write_action").submit();
				}
			});
		});

		$(function() {

			$("#confirm_dup").click( function() {
				// 리워드 중복 확인 function
				$.ajax({
					url: "/index.php/ajax/reward_confirm_dup",
					type: "POST",
					data: {
						"reward_num": encodeURIComponent($("#reward_num").val()),
						"projects_id": "<?php echo $this->uri->segment(6); ?>",
						"csrf_test_name": getCookie('csrf_cookie_name'),
						"table": "<?php echo $this->uri->segment(4); ?>"
					},
					dataType: "html",
					complete: function(xhr, textStatus) {
						if(xhr.responseText == 1000) {
							alert('글 번호를 입력하세요.');
						} else if(xhr.responseText == 2000) {
							alert('다시 입력하세요.');
						} else if(xhr.responseText == 9000) {
							alert('로그인하여야 합니다.');
						} else if(xhr.responseText == 1001) {
							alert('중복되는 번호입니다. 다른 번호를 입력하세요.');
						} else {
							// html 형식으로 껴 넣는다.
							swal({
								title: '다음 번호를 사용하시겠습니까?',
								text: '같은 리워드는 반드시 같은 번호로 입력해주셔야 합니다.' + flag_reward,
								type: 'info',
								showCancelButton: true,
								confirmButtonColor: '#3085d6',
								cancelButtonColor: '#d33',
								confirmButtonText: 'Yes'
							}).then(function() {
								$("#confirm_dup_div").html(xhr.responseText);
								$('#confirm_dup').attr('disabled', true);
								flag_reward = 1;
								'확인.',
								$('#reward_num').val() + '로 사용됩니다.',
								'success'
							});
						}
					}
				});
			});
		});

		function getCookie(name) {
			var nameOfCookie = name + "=";
			var x = 0;

			while(x <= document.cookie.length) {
				var y = (x + nameOfCookie.length);

				if(document.cookie.substring(x, y) == nameOfCookie) {
					if((endOfCookie = document.cookie.indexOf(";", y)) == -1)
						endOfCookie = document.cookie.length;

					return unescape(document.cookie.substring(y, endOfCookie)); 
				}

				x = document.cookie.indexOf(" ", x) + 1;

				if(x == 0)

				break;
			}

			return "";
		}

		function only_num(event) {
			// 숫자만 입력
			flag_reward = 0;
			$('#confirm_dup').attr('disabled', false);
			event = event || window.event;
			var keyID = (event.which) ? event.which : event.keyCode;
			if((keyID>=48&&keyID<=57)||(keyID>=96&&keyID<=105)||keyID==8||keyID==46||keyID==37||keyID==39) {
				return;
			} else {
				return false;
			}
		}
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
		<?php
			if(form_error('reward_contents')) {
				$error_contents = form_error('reward_contents');
			} else {
				$error_contents = form_error('reward_contents_check');
			}
		?>

		<form class="form-horizontal" method="post" action="" id="write_action" action="administration/project/reward_write/reward/projects_id/".<?php $this->uri->segment(6)?>>
		<!-- <?php
			//$attributes = array('class'=>'form-horizontal', 'id'=>'write_action');
			//echo form_open('administration/project/reward_write/reward/projects_id/'.$this->uri->segment(6), $attributes);
		?> -->
			<fieldset>
				<legend>리워드 추가</legend>

					<table cellspacing="0" cellpadding="0" class="table table-striped">
						<thead></thead>
						<tbody>
						<tr>
							<th>리워드 이름</th>
							<td>
								<input type="text" id="reward_subject" name="reward_subject" value="<?php echo set_value('reward_subject'); ?>">
								<div>리워드 이름을 입력하세요</div>
							</td>
						</tr>
						<tr>
							<th>리워드 번호</th>
							<td>
								<div id="confirm_dup_div" style="float: left;">
									<input type="text" id="reward_num" name="reward_num" value="<?php echo set_value('reward_num'); ?>" onkeydown="return only_num(event)">
								</div>
								<div style="float: left; margin-left: 10px;">
									<button type="button" id="confirm_dup" name="confirm_dup_sub">중복확인</button>
								</div>
								
								<div style="clear: both;">리워드 번호를 입력해주세요. 프로젝트당 같은 리워드는 <span style="color: red; font-weight: bold; font-size: 1.5em;">반드시 같은 번호</span>를 입력하셔야 합니다. </div>
								
							</td>
						</tr>
						<tr>
							<th>리워드 금액</th>
							<td>
								<input type="text" id="reward_amount" name="reward_amount" value="<?php echo set_value('reward_amount'); ?>" placeholder=", 없이 입력" onkeydown="return only_num(event)">
								<div>리워드 금액을 입력하세요</div>
							</td>
						</tr>
						<tr>
							<th>리워드 수량</th>
							<td>
								<input type="text" id="count" name="count" value="<?php echo set_value('count'); ?>" onkeydown="return only_num(event)">
								<div>리워드 수량을 입력해주세요</div>
							</td>
						</tr>
						
						<tr>
							<th>리워드 내용</th>	
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
								<textarea class="col-md-12" id="reward_contents" name="reward_contents" style="padding: 0px;"><?php echo set_value('reward_contents')?></textarea>
							</td>
						</tr>
						</tbody>
						<tfoot></tfoot>
					</table><hr>
					
					<div class="form-actions" align="right">
						<button type="submit" class="btn btn-primary" id="write_btn">추가</button>
						<button class="btn" onclick="document.location.reload()">취소</button>				
					</div>
			</fieldset>
		</form>
	</article>
	<script src="/static/lib/ckeditor/ckeditor.js"></script>
	<script>
		CKEDITOR.replace('reward_contents', {
			'filebrowserUploadUrl':'/index.php/administration/project/upload_receive/' // 파일 전송
		});
	</script>