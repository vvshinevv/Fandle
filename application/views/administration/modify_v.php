	<script type="text/javascript">
		$(document).ready( function() {

			$("#write_btn").click( function() {

				if($("#subject").val() == '') {
					alert("제목을 입력해주세요.");
					$("#subject").focus();
					return false;
				} else if ($("projects_num").val() == '') {
					alert("프로젝트 번호를 입력해주세요.");
					return false;
				} else if($("#summary").val() == '') {
					alert("프로젝트 한줄 요약을 입력해주세요.");
					$("#summary").focus();
					return false;
				} else if($("#target_amount").val() == '') {
					alert("목표 금액을 입력해주세요.");
					$("#target_amount").focus();
					return false;
				} else if($("#launch_date").val() == '') {
					alert("런칭 날짜를 입력해주세요.");
					$("#launch_date").focus();
					return false;
				} else if($("#due_date").val() == '') {
					alert("종료 날짜를 입력해주세요.");
					$("#due_date").focus();
					return false;
				} else if($("#youtube_url").val() == '') {
					alert("유튜브 경로를 입력해주세요.");
					$("#youbue_url").focus();
					return false;
				} else if(!CKEDITOR.instances.contents.getData()) {
					alert("내용을 입력해주세요.");
					return false;
				} else {
					if($("#youtube_img").val() == '') {
						document.getElementById("youtube_val").value = 0;
					}

					if($("#project_img").val() == '') {
						document.getElementById("project_val").value = 0;
					}
					$("#write_action").submit();
				}
			});
		});
		$(function() { 
			$("#confirm_dup").click(function() {
				// 프로젝트 번호 중복 확인 function
				$.ajax({
					url: "/index.php/ajax/project_confirm_dup",
					type: "POST",
					data: {
						"projects_num": encodeURIComponent($("#projects_num").val()),
						"csrf_test_name": getCookie('csrf_cookie_name'),
						"table": "<?php echo $this->uri->segment(4); ?>"
					},
					dataType: "html",
					complete: function(xhr, textStatus) {
						if(textStatus == 'success') {
							if(xhr.responseText == 1000) {
								alert('글 번호를 입력하세요.');
							} else if(xhr.responseText == 2000) {
								alert('다시 입력하세요.');
							} else if(xhr.responseText == 9000) {
								alert('로그인하여야 합니다.');
							} else if(xhr.responseText == 1001) {
								alert('중복되는 번호입니다. 다른 번호를 입력하세요.')
							} else {
								// html 형식으로 껴 넣는다.
								swal({
									title: '다음 번호를 사용하시겠습니까?',
									text: '같은 프로젝트는 반드시 같은 번호로 입력해주셔야 합니다.',
									type: 'info',
									showCancelButton: true,
									confirmButtonColor: '#3085d6',
									cancelButtonColor: '#d33',
									confirmButtonText: 'Yes'
								}).then(function() {
									flag = 1;
									$("#confirm_dup_div").html(xhr.responseText);
									$('#confirm_dup').attr('disabled', true);
								});
							}
						}
					}, 
					error: function(request, status, error) {
						flag = 0;
						alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
					}
				})
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
			flag=0;
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
		
		.file_input_div {
		    position:relative; 
		    width:80px; 
		    height:40px; 
		    overflow:hidden;
		}
		.file_input_hidden {
		    position:absolute; 
		    right: 0px;
		    top:0px; 
		    opacity:0; 
		    filter: alpha(opacity=0); 
		    -ms-filter: alpha(opacity=0); 
		    cursor:pointer;
		}
	</style>
	<article id="board_area">
		<header>
			<h1></h1>
		</header>

		<?php
			if(form_error('contents')) {
				$error_contents = form_error('contents');
			} else {
				$error_contents = form_error('contents_check');
			}
		?>

		<form class="form-horizontal" enctype="multipart/form-data" method="post" action="" id="write_action">
		<!-- <?php
			//$attributes = array('class'=>'form-horizontal', 'id'=>'write_action');
			//echo form_open('administration/project/write/projects', $attributes);
		?> -->
			<fieldset>
				<legend>프로젝트 수정</legend>
					<?php echo validation_errors();?>

					<table cellspacing="0" cellpadding="0" class="table table-striped">
						<thead></thead>
						<tbody>
						<tr>
							<th>제목</th>
							<td colspan="5">
								<input class="col-md-12" type="text" id="subject" name="subject" value="<?php echo $views->subject;?>" style="padding: 0px;" >
								<div>제목을 입력하세요</div>
							</td>
						</tr>
						<tr>
							<th>국가</th>
							<td>
								<?php
									if($this->uri->segment(4) == 'projects_ko') {
								?>
								
										<input type="radio" name="nation" id="nation" value="1" checked> 한국어
										<!-- <input type="radio" name="nation" id="nation" value="2"> 영어
										<input type="radio" name="nation" id="nation" value="3"> 중국어 -->
										<div style="size: 0.5em;"><span style="size: 1em; font-weight: bold; font-color: green;">한국어</span>관련 프로젝트에 삽입됩니다.</div>
								<?php
									} else if($this->uri->segment(4) == 'projects_en') {
								?>
										<!--<input type="radio" name="nation" id="nation" value="1" disabled> 한국어 -->
										<input type="radio" name="nation" id="nation" value="2" checked disabled> 영어
										<!--<input type="radio" name="nation" id="nation" value="3" disabled> 중국어 -->
										<div style="size: 0.5em;"><span style="size: 1em; font-weight: bold; font-color: green;">영어</span>관련 프로젝트에 삽입됩니다.</div>
								<?php		
									} else {
								?>
										<!--<input type="radio" name="nation" id="nation" value="1" disabled> 한국어
										<input type="radio" name="nation" id="nation" value="2" disabled> 영어 -->
										<input type="radio" name="nation" id="nation" value="3" checked disabled> 중국어
										<div style="size: 0.5em;"><span style="size: 1em; font-weight: bold; font-color: green;">중국어</span>관련 프로젝트에 삽입됩니다.</div>
								<?php		
									}
								?>
								
							</td>

							<th>프로젝트 번호</th>
							<td colspan="3">
								<div id="confirm_dup_div">
									<input type="text" id="projects_num_val" name="projects_num_val" onkeydown="return only_num(event)" value="<?php echo $views->projects_num;?>" disabled>
									<input type="hidden" id="projects_num" name="projects_num" onkeydown="return only_num(event)" value="<?php echo $views->projects_num;?>">
								</div>
								<div> 
									<button type="button" id="confirm_dup" name="confirm_dup" disabled>중복확인</button>
									<sub id="confirm_dup_sub" name="confirm_dup_sub" style="color: red; font-weight: bold; font-size: 0.8em;"></sub>
									<div>프로젝트 번호를 입력해주세요. 국가별 같은 프로젝트는 <span style="color: red; font-weight: bold; font-size: 1.5em;">반드시 같은 번호</span>를 입력하셔야 합니다. </div>
								</div>
							</td>
						</tr>

						<tr>
							<th>프로젝트 요약</th>
							<td colspan="5">
								<input class="col-md-12" type="text" id="summary" name="summary" value="<?php echo $views->summary; ?>" style="padding: 0px;">
								<div>프로젝트를 한 줄로 요약해주세요</div>
							</td>
						</tr>
						<tr>
							<th>목표 금액</th>
							<td>
								<input type="text" id="target_amount" name="target_amount" onkeydown="return only_num(event)" value="<?php echo $views->target_amount; ?>" placeholder=", 없이 입력">
								<div>목표 금액을 입력해주세요</div>
							</td>
						
							<th>런칭 날짜</th>
							<td>
								<input type="date" id="launch_date" name="launch_date" value="<?php echo substr($views->launch_date, 0, 10); ?>">
								<div>런칭 날짜를 선택해주세요</div>
							</td>
						
							<th>종료 날짜</th>
							<td>
								<input type="date" id="launch_date" name="due_date" value="<?php echo substr($views->due_date, 0, 10); ?>">
								<div>종료 날짜를 선택해주세요</div>
							</td>
						</tr>
						
						<tr>
							<th>Youtube 영상 ID</th>
							<td colspan="5">
								<input type="text" id="youtube_url" name="youtube_url" value="<?php echo $views->youtube_url; ?>">
								<div>유튜브 영상 ID를 입력해주세요</div>
							</td>	
						</tr>

						<tr>
							<th>Youtube 대표 사진 <div id="state1"></div></th>
							<td colspan="1">

								<div style="margin-bottom: 1.5em;">현재 Youtube 대표 사진</div>
								<div id="holder1" style="max-height: 250px; margin-bottom: 10px;">
									<img style="height: 250px; margin-bottom: 10px;" src="<?php echo $views->youtube_img; ?>">
								</div>
								<div class="file_input_div">
									<button class="btn btn-primary">변경</button>
									<input class="file_input_hidden" type="file" name="youtube_img" id="youtube_img">
									<input type="hidden" name="youtube_img_val" id="youtube_img_val" value="<?php echo $views->youtube_img; ?>">
									<input type="hidden" name="youtube_val" id="youtube_val" value="1">
								</div>
							</td>

							<th>project 대표 사진 <div id="state2"></div></th>
							<td colspan="1">

								<div style="margin-bottom: 1.5em;">현재 Youtube 대표 사진</div>
								<div id="holder2" style="max-height: 250px; margin-bottom: 10px;">
									<img style="height: 250px; margin-bottom: 10px;" src="<?php echo $views->project_img; ?>">
								</div>
								<div class="file_input_div">
									<button class="btn btn-primary">변경</button>
									<input class="file_input_hidden" type="file" name="project_img" id="project_img">
									<input type="hidden" name="project_img_val" id="youtube_img_val" value="<?php echo $views->project_img; ?>">
									<input type="hidden" name="project_val" id="project_val" value="1">
								</div>
							</td>
						</tr>		
						<tr>
							<th>내용</th>	
							<td colspan="5">
								<?php
									if($error_contents==FALSE ) {
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
							<td colspan="6">
								<textarea class="col-md-12" id="contents" name="contents" style="padding: 0px;"><?php echo $views->contents; ?></textarea>
							</td>
						</tr>
						</tbody>
						<tfoot></tfoot>
					</table><hr>

					<?php
						if($this->uri->segment(4) == "projects_ko") {
							$segment = "lists_ko";
						} else if($this->uri->segment(4) == "projects_en") {
							$segment = "lists_en";
						} else if($this->uri->segment(4) == "projects_ch") {
							$segment = "lists_ch";
						}
					?>
					
					<div class="form-actions" align="right">
						<button type="submit" class="btn btn-primary" id="write_btn">수정</button>
						<a href="/index.php/administration/project/view/<?php echo $this->uri->segment(4);?>/projects_id/<?php echo $this->uri->segment(6); ?>/page/<?php echo $this->uri->segment(8); ?>" class="btn btn-warning">취소</a>				
					</div>
			</fieldset>
		</form>
	</article>
	<script src="/static/lib/ckeditor/ckeditor.js"></script>
	<script>
		CKEDITOR.replace('contents', {
			'filebrowserUploadUrl':'/index.php/administration/project/upload_receive/' // 파일 전송
		});
	</script>
	<script type="text/javascript">	
		/*
		* @todo: 기회가 되면 배열로 바꿀 것 
		*/
		var upload1 = document.getElementById('youtube_img'), holder1 = document.getElementById('holder1'), state1 = document.getElementById('state1');

		var upload2 = document.getElementById('project_img'), holder2 = document.getElementById('holder2'), state2 = document.getElementById('state2');

		if (typeof window.FileReader === 'undefined') {
		  state1.className = 'fail';
		  state2.className = 'fail';
		} else {
		  state1.className = 'success';
		  state1.innerHTML = 'File API & FileReader available';
		  state2.className = 'success';
		  state2.innerHTML = 'File API & FileReader available';
		}
		 
		upload1.onchange = function (e) {
		  e.preventDefault();

		  var file = upload1.files[0],
		      reader = new FileReader();
		  reader.onload = function (event) {
		    var img = new Image();
		    img.src = event.target.result;
		    
		    if (img.height > 250) { 
		      	img.height = 250;
		    }
		    holder1.innerHTML = '';
		    holder1.appendChild(img);
		  };
		  reader.readAsDataURL(file);

		  return false;
		};

		upload2.onchange = function (e) {
		  e.preventDefault();

		  var file = upload2.files[0],
		      reader = new FileReader();
		  reader.onload = function (event) {
		    var img = new Image();
		    img.src = event.target.result;
		    
		    if (img.height > 250) {
		      img.height = 250;
		    }
		    holder2.innerHTML = '';
		    holder2.appendChild(img);
		  };
		  reader.readAsDataURL(file);

		  return false;
		};
	</script>