/* Theme Name: The Project - Responsive Website Template
 * Author:Choi hong hee
 * Author e-mail:vvshinevv@gmail.com
 * Created: Sep 2016
 * File Description: custom scripts
 * Recent modify : 2016-10-09!!!!
 */



(function($) {
	var swiper = new Swiper('.swiper-container', {
		pagination: '.swiper-pagination',
		nextButton: '.swiper-button-next',
		prevButton: '.swiper-button-prev',
		loop: true,
		initialSlid: 3,
		slidesPerView: 4,

		centeredSlides: true,
		passiveListeners: true,
		paginationClickable: true,
		spaceBetween: 30,
		breakpoints: {
			// when window width is <= 480px
			480: {
				slidesPerView: 1
			},
			767: {
				slidesPerView: 1,
				spaceBetween: 20
			},
			991: {
				slidesPerView: 3,
				spaceBetween: 20
			},
			1199: {
				slidesPerView: 4,
				spaceBetween: 20
			}
		}
	});

	// uri segment 자바스크립트에서도 사용
	// 사용 방법 : uri.segment(5);
	//-----------------------------------------------
	var uri = {
		segment_array: function() {
			var path = location.pathname;
			path = path.substr(1);

			if (path.slice(-1) == '/') {
				path = path.substr(0 , path.length-1);
			}

			var seg_arr = path.split('/');

			if (seg_arr[0] == 'index.php') {
				seg_arr.shift();
			}
			return seg_arr;
		},
		segment: function(n , v) {
			var seg_array = this.segment_array();
			var seg_n = seg_array[n-1];

			if (typeof seg_n == 'undefined') {
				if (typeof v != 'undefined') {
					return v;
				} else {
					return false;
				}
			} else {
				return seg_n;
			}
		}
	};


	// Contact forms validation
	//-----------------------------------------------
	// 회원가입 validation
	// =======================================
	var successMessageReg; var failMessageReg;
	var confirmMessage, requiredEmail, emailValid, emailExist, requiredPassword, minlengthPassword, equalToPassword, requiredUsername, minlengthUsername, requiredNickname, minlengthNickname;
	if(uri.segment(3) == 'projects_ko' || uri.segment(3) == 'ko' || uri.segment(3) == '') {
		successMessageReg = '가입에 성공하였습니다. 로그인 해주세요.'; failMessageReg = '죄송합니다. 가입에 실패했습니다. 다시 시도해주세요.';
		requiredEmail = '이메일을 입력하세요.'; emailValid = '이메일 형식형식에 맞지 않습니다.'; emailExist = '이미 가입된 이메일입니다.';
		requiredPassword = '비밀번호를 입력해주세요.'; minlengthPassword = '비밀번호는 3글자 이상입니다.';
		equalToPassword = '비밀번호가 일치하지 않습니다.';
		requiredUsername = '이름을 입력하세요.'; minlengthUsername = '이름은 두 글자 이상 입력하세요.';
		requiredNickname = '닉네임을 입력하세요.'; minlengthNickname = '닉네임은 두 글자 이상이여야 합니다.';
		confirmMessage = '회원가입 하시겠습니까?'; agreement = '약관에 동의해주세요.';
	} else if(uri.segment(3) == 'projects_en' || uri.segment(3) == 'en') {
		successMessageReg = 'Thank you for register. Please Login.'; failMessageReg = 'Sorry. Fail to register. Please try again';
		requiredEmail = 'Please enter a email'; emailValid = 'Please enter a valid email address e.g. name@domain.com'; emailExist = 'Email is already registered';
		requiredPassword = 'Please enter a password'; minlengthPassword = 'Your password must be longer than 3';
		equalToPassword = 'Not equal password';
		requiredUsername = 'Please specify your name'; minlengthUsername = 'Your name must be longer than 2 characters';
		requiredNickname = 'Please enter a nickname'; minlengthNickname = 'Your nickname must be longer than 2 characters';
		confirmMessage = 'Do you really want to register?'; agreement = 'Please accept the Terms and Conditions';
	} else {
		successMessageReg = '注册成功，请登陆.'; failMessageReg = '对不起，注册未成功，请再试一下.';
		requiredEmail = '请输入邮箱.'; emailValid = '您输入的邮箱格式不对.';
		requiredPassword = '请输入密码.'; minlengthPassword = '3个字符.';
		equalToPassword = '密码不正确.';
		requiredUsername = '请输入名字.'; minlengthUsername = '至少要输入2个字以上.';
		requiredNickname = '请输入昵称.'; minlengthNickname = '至少要输入2个字以上.';
		confirmMessage = '想要注册?'; agreement = '请同意服务条款';
	}

	$("#sign_action").validate({
		submitHandler: function(form) {

			var f = confirm(confirmMessage);
			if(f) {
				// 데이터 베이스에 저장 ajax 사용
				$.ajax({
					type: "POST",
					url: "/index.php/ajax/ajaxCheckValidation",
					data: {
						"email": $("#sign_action #email").val(),
						"username": $("#sign_action #username").val(),
						"password": $("#sign_action #password").val(),
						"nickname": $("#sign_action #nickname").val()
					},
					dataType: "json",
					success: function(data) {
						if(data.sent == "yes") {
							alert(successMessageReg);
							location.href="/index.php";
						} else if(data.sent == "exist") {
							alert(emailExist);
						} else {
							alert(failMessageReg);
							location.href="/index.php/auth/register" + uri.segment(3);
						}
					}
				});
			} else {
				return false;
			}
		},
		errorPlacement: function(error, element) {  
		    error.appendTo(element.parent());  
		},
		onkeyup: false,
		onclick: false,
		rules: {
			email: {
				required: true,
				email: true
			},
			password: {
				required: true,
				minlength: 3
			},
			re_password: {
				required: true,
				minlength: 3,
				equalTo: "#password"
			},
			username: {	
				required: true,
				minlength: 2
			},
			nickname: {
				required: true,
				minlength: 2
			},
			'agreement': {
				required: true
			}
		},
		messages: {
			email: {
				required: requiredEmail,
				email: emailValid
			},
			password: {
				required: requiredPassword,
				minlength: minlengthPassword
			},
			re_password: {
				required: requiredPassword,
				minlength: minlengthPassword,
				equalTo: equalToPassword
			},
			username: {
				required: requiredUsername,
				minlength: minlengthUsername
			},
			
			nickname: {
				required: requiredNickname,
				minlength: minlengthNickname
			},
			'agreement': {
				required: agreement
			}
		},
		errorElement: "span",
		highlight: function (element) {
			$(element).parent().removeClass("has-success").addClass("has-error");
			$(element).siblings("label").addClass("hide");
		},
		success: function (element) {
			$(element).parent().removeClass("has-error").addClass("has-success");
			$(element).siblings("label").removeClass("hide");
		}
	});



	// 현재 비밀번호 체크
	// =======================================
	var requiredPassword; var minlenghPassword;
	var successMessageCheckPass; var failMessageCheckPass;
	if(uri.segment(3) == 'projects_ko' || uri.segment(3) == 'ko' || uri.segment(3) == '') {
		successMessageCheckPass = '인증 되었습니다.'; failMessageCheckPass = '인증에 실패했습니다.';
		requiredPassword = '비밀번호를 입력하세요.'; minlength = '최소 3글자 이상 입력해주세요.';
	} else if(uri.segment(3) == 'projects_en' || uri.segment(3) == 'en') {
		successMessageCheckPass = 'Thank you. You are authenticated!'; failMessageCheckPass = 'You fail to authentication!';
		requiredPassword = 'Please enter a password'; minlengthPassword = 'Your password must be longer than 3';
	} else {
		successMessageCheckPass = '认证成功!'; failMessageCheckPass = '认证失败!';
		requiredPassword = '请输入密码.'; minlengthPassword = '至少要输入3个字以上.';
	}

	$("#checkPassword_action").validate({
		submitHandler: function(form) {
			// 데이터 베이스에 저장 ajax 사용
			$.ajax({
				type: "POST",
				url: "/index.php/ajax/ajaxCheckPassword/" + uri.segment(3),
				data: {
					"csrf_test_name": getCookie("csrf_cookie_name"),
					"password": $("#checkPassword_action #re_password").val(),
					"email": $("#checkPassword_action #email").val(),
					"table": "user"
				},
				dataType: "json",
				success: function(data) {
					if(data.sent == "yes") {
						alert(successMessageCheckPass);
						location.href="/index.php/path/changeUserPassword/" + uri.segment(3);
					} else {
						alert(failMessageCheckPass);
						location.href="/index.php/path/checkPassword/" + uri.segment(3);
					}
				}
			});
		},
		errorPlacement: function(error, element) {
			error.appendTo(element.parent());
		},
		onkeyup: false,
		onclick: false,
		rules: {
			re_password: {
				required: true,
				minlength: 3
			},
			email: {
				required : true
			}
		},
		messages: {
			re_password: {
				required: requiredPassword,
				minlength: minlengthPassword
			},
			email: {
				required: "Please enter a email"
			}
		}
	});

	// 비밀번호 변경
	// =======================================
	var requiredPassword, minlenghPassword, equalToPassword, requiredEmail, emailValid;
	var successMessageChangePass; var failMessageChangePass;
	if(uri.segment(3) == 'projects_ko' || uri.segment(3) == 'ko' || uri.segment(3) == '') {
		successMessageChangePass = '변경되었습니다.'; failMessageChangePass = '변경에 실패하였습니다.';
		requiredPassword = '비밀번호를 입력하세요.'; minlength = '최소 3글자 이상 입력해주세요.'; equalToPassword = '비밀번호가 같지 않습니다.';
		requiredEmail = '이메일을 입력하세요.'; emailValid = '이메일 형식형식에 맞지 않습니다.';
	} else if(uri.segment(3) == 'projects_en' || uri.segment(3) == 'en') {
		successMessageChangePass = 'Success to change!.'; failMessageChangePass = 'Sorry, Fail to change';
		requiredPassword = 'Please enter a password!'; minlength = 'Your password must be longer than 3.'; equalToPassword = 'Not equal password.';
		requiredEmail = 'Please enter a email!'; emailValid = 'Please enter a valid email address e.g. name@domain.com!';
	} else {
		successMessageChangePass = '更改成功!'; failMessageChangePass = '更改失败.';
		requiredPassword = '请输入密码!'; minlength = '至少要输入3个字以上.'; equalToPassword = '密码不正确.';
		requiredEmail = '请输入邮箱!'; emailValid = '您输入的邮箱格式不对!';
	}

	$("#resetPassword_action").validate({
		submitHandler: function(form) {
			// 데이터 베이스에 저장 ajax 사용
			$.ajax({
				type: "POST",
				url: "/index.php/ajax/ajaxResetPassword",
				data: {
					"csrf_test_name": getCookie("csrf_cookie_name"),
					"password": $("#resetPassword_action #re_password").val(),
					"email": $("#resetPassword_action #email").val(),
					"table": "user"
				},
				dataType: "json",
				success: function(data) {
					if(data.sent == "yes") {
						alert(successMessageChangePass);
						location.href="/index.php";

					} else {
						alert(failMessageChangePass);
						location.href="/index.php/path/resetPassword/" + uri.segment(3);
					}
				}
			});
		},
		errorPlacement: function(error, element) {  
		    error.appendTo(element.parent());  
		},
		onkeyup: false,
		onclick: false,
		rules: {
			password: {
				required: true,
				minlength: 3
			},
			re_password: {
				required: true,
				minlength: 3,
				equalTo: "#password"
			},
			email: {
				required : true,
				email: true
			}			
		},
		messages: {
			password: {
				required: requiredPassword,
				minlength: minlenghPassword
			},
			re_password: {
				required: requiredPassword,
				minlength: minlenghPassword,
				equalTo: equalToPassword
			},
			email: {
				required: requiredEmail,
				email: emailValid
			}
		}
	});

	// 기본 회원 프로필정보 바꾸기 validation
	// ==================================
	var successMessageChangePro; var failMessageChangePro;
	var requiredUsername, minlengthUsername, requiredNickname, minlengthNickname;
	if(uri.segment(3) == 'projects_ko' || uri.segment(3) == 'ko' || uri.segment(3) == '') {
		successMessageChangePro = '변경에 성공하였습니다.'; failMessageChangePro = '죄송합니다. 변경에 실패하였습니다. 다시 입력해주세요.';
		requiredUsername = '이름을 입력하세요.'; minlengthUsername = '이름은 두 글자 이상 입력하세요.';
		requiredNickname = '닉네임을 입력하세요.'; minlengthNickname = '닉네임은 두 글자 이상이여야 합니다.';
	} else if(uri.segment(3) == 'projects_en' || uri.segment(3) == 'en') {
		successMessageChangePro = 'Success to change your profile!'; failMessageChangePro = 'Sorry. Fail to update. Please try again';
		requiredUsername = 'Please specify your name'; minlengthUsername = 'Your name must be longer than 2 characters';
		requiredNickname = 'Please enter a nickname'; minlengthNickname = 'Your nickname must be longer than 2 characters';
	} else {
		successMessageChangePro = '更改成功!'; failMessageChangePro = '更改失败';
		requiredUsername = '请输入名字'; minlengthUsername = '至少要输入2个字以上';
		requiredNickname = '请输入昵称'; minlengthNickname = '至少要输入2个字以上';
	}

	$("#changeProfile_action").validate({
		submitHandler: function (form) {
			//회원 정보 데이터베이스 변경 ajax 사용
			$.ajax({
				type: "POST",
				url: "/index.php/ajax/changeUserProfile",
				data: {
					"csrf_test_name": getCookie("csrf_cookie_name"),
					"email": $("#email").val(),
					"nickname": $("#nickname").val(),
					"username": $("#username").val()
				},
				dataType: "json",
				success: function(data) {
					if(data.sent == "yes") {
						alert(successMessageChangePro);
						location.href="/index.php";

					} else {
						alert(failMessageChangePro);
						location.href="/index.php/path/changeUserProfile" + uri.segment(3);
					}
				}
			});
		},
		errorPlacement: function(error, element) {
			error.appendTo(element.parent());
		},
		onkeyup: false,
		onclick: false,
		rules: {
			username: {
				required: true,
				minlength: 2
			},
			nickname: {
				required: true,
				minlength: 2
			},
		},
		messages: {
			username: {
				required: requiredUsername,
				minlength: minlengthUsername
			},
			nickname: {
				required: requiredNickname,
				minlength: minlengthNickname
			}
		}
	});

	// 비밀번호 찾기 validation
	// =================================
	var failMessage1, requiredEmail, emailValid;
	if(uri.segment(3) == 'projects_ko' || uri.segment(3) == 'ko' || uri.segment(3) == '') {
		failMessage1 = '등록되지 않은 계정입니다.';
	} else if(uri.segment(3) == 'projects_en' || uri.segment(3) == 'en') {
		failMessage1 = 'Your email is not registered';
	} else {
		failMessage1 = '没有该帐号';
	}

	$("#findPassword_action").validate({
		submitHandler: function(form) {
			// 데이터 베이스에 저장 ajax 사용
			$.ajax({
				type: "POST",
				url: "/index.php/ajax/ajaxCheckEmailValidation",
				data: {
					"csrf_test_name": getCookie("csrf_cookie_name"),
					"email": $("#email").val(),
					"table": "user"
				},
				dataType: "html",
				complete: function(xhr, textStatus) {
					if(textStatus == 'success') {
						if(xhr.responseText == 1000) {
							alert(failMessage1);
						} else {
							// 이메일이 있는 경우
							$("#resultSuccess").html(xhr.responseText);
						}
					}
				}
			});
		},
		errorPlacement: function(error, element) {  
		    error.appendTo(element.parent());  
		},
		onkeyup: false,
		onclick: false,
		rules: {
			email: {
				required: true,
				email: true
			}
		},
		messages: {
			email: {
				required: requiredEmail,
				email: emailValid
			}	
		}
	});

	// iamport 데모 자바스크립트
	//----------------------------------------------- 
    //document.frm_payment.vbank_due.value = moment().add(2, 'day').format('YYYYMMDD');
	var successMessage, failMessage, buyer_name, buyer_tel, buyer_email, buyer_postcode, buyer_addr, buyer_city, buyer_state, buyer_nation;

	if(uri.segment(3) == 'projects_ko' || uri.segment(3) == 'ko' || uri.segment(3) == '') {
		successMessage = '후원에 성공하였습니다.'; failMessage = '후원에 실패했습니다.';
		buyer_name = '이름을 입력하세요.'; buyer_tel ='전화번호를 입력하세요.'; buyer_email = '이메일을 입력하세요.';
		buyer_postcode ='우편 번호를 입력하세요.'; buyer_addr ='주소를 입력하세요.';
		buyer_city = '도시를 입력하세요.'; buyer_state = '주를 입력하세요.'; buyer_nation ='국가를 입력하세요.';
	} else if(uri.segment(3) == 'projects_en' || uri.segment(3) == 'en') {
		successMessage = 'Success to donation.'; failMessage = 'Fail to donation';
		buyer_name = 'Please enter your name'; buyer_tel ='Please enter your phone number'; buyer_email = 'Please enter your email';
		buyer_postcode ='Please enter your postcode'; buyer_addr ='Please enter your address';
		buyer_city = 'Please enter your city'; buyer_state = 'Please enter your state'; buyer_nation = 'Please select your nation';
	} else {
		successMessage = '后援成功.'; failMessage = '后援失败';
		buyer_name = '请输入名字'; buyer_tel ='请输入电话号码'; buyer_email = '请输入邮箱';
		buyer_postcode ='请输入邮政编码'; buyer_addr ='请输入地址';
		buyer_city = '请输入城市'; buyer_state = '请输入区'; buyer_nation = '请输入国家';
	}

    $('#requester').click(function() {
		if($("#buyer_name").val() == '') {
			alert(buyer_name);
			$("#buyer_name").focus();
			return false;
		} else if($("#buyer_tel").val() == '') {
			alert(buyer_tel);
			$("#buyer_tel").focus();
			return false;
		} else if($("#buyer_email").val() == '') {
			alert(buyer_email);
			$("#buyer_email").focus();
			return false;
		} else if($("#buyer_postcode").val() == '') {
			alert(buyer_postcode);
			$("#buyer_postcode").focus();
			return false;
		} else if($("#buyer_addr").val() == '') {
			alert(buyer_addr);
			$("#buyer_addr").focus();
			return false;
		} else if($("#buyer_city").val() == '') {
			alert(buyer_city);
			$("#buyer_city").focus();
			return false;
		} else if($("#buyer_state").val() == '') {
			alert(buyer_state);
			$("#buyer_state").focus();
			return false;
		} else if($("#buyer_nation").val() == 0) {
			alert(buyer_nation);
			$("#buyer_nation").focus();
			return false;
		} else {
			document.frm_payment.merchant_uid.value = 'merchant_' + new Date().getTime();
    		var frm = document.frm_payment;
    		var IMP = window.IMP;
       		var escrow = false;
        	var in_app = false;

	        switch (document.frm_payment.pg_provider.value) {
	            case 'html5_inicis':
	                IMP.init('imp57757789');
	                break;
				case 'paypal':
					IMP.init('imp57757789');
					break;
	            default:
	                IMP.init('iamport');
	                break;
	        }

	        var buyer_addr_detail = frm.buyer_addr_detail.value;
	        var note = frm.note.value;
			var reward_amount = frm.reward_amount.value;
			var shipping_amount = frm.shipping_amount.value;
			var buyer_nation = frm.buyer_nation.value;
			var buyer_city = frm.buyer_city.value;
			var buyer_state = frm.buyer_state.value;
			var shipping_method = frm.shipping_method.value;
			var reward_num = frm.reward_num.value;
			var m_url = 'http://www.kwavedonate.com/index.php/path/insert_payment_m?'
				+'projects_num='+uri.segment(5)
				+'&reward_num='+reward_num
				+'&pg_provider='+frm.pg_provider.value
				+'&pay_method='+frm.pay_method.value
				+'&escrow='+escrow
				+'&merchant_uid='+frm.merchant_uid.value
				+'&name='+frm.name.value
				+'&amount='+frm.amount.value
				+'&reward_amount='+reward_amount
				+'&shipping_amount='+shipping_amount
				+'&buyer_email='+frm.buyer_email.value
				+'&buyer_name='+frm.buyer_name.value
				+'&buyer_tel='+frm.buyer_tel.value
				+'&buyer_addr='+frm.buyer_addr.value
				+'&buyer_postcode='+frm.buyer_postcode.value
				+'&buyer_nation='+buyer_nation
				+'&buyer_city='+buyer_city
				+'&buyer_state='+buyer_state
				+'&shipping_method='+shipping_method
				+'&note='+note;

	        var param = {
	        	pg_provider: frm.pg_provider.value,
	            pay_method: frm.pay_method.value,
	            escrow: escrow,
	            merchant_uid: frm.merchant_uid.value,
	            name:frm.name.value, 
	            amount:frm.amount.value, 
	            buyer_email:frm.buyer_email.value, 
	            buyer_name:frm.buyer_name.value, 
	            buyer_tel:frm.buyer_tel.value, 
	            buyer_addr:frm.buyer_addr.value,
	            buyer_postcode:frm.buyer_postcode.value,
				m_redirect_url: m_url
	        };

	        if ( in_app ) param.app_scheme = 'iamporttest';

	        IMP.request_pay(
	        	param,
				function(rsp) {
	            if ( rsp.success ) {
					$.post("/index.php/path/insert_payment", {
						"projects_num": uri.segment(5),
						"reward_num": reward_num,
						"pg_provider": param.pg_provider,
						"pay_method": param.pay_method,
						"escrow": param.escrow,
						"merchant_uid": param.merchant_uid,
						"name": param.name,
						"amount": param.amount,
						"reward_amount": reward_amount,
						"shipping_amount": shipping_amount,
						"buyer_email": param.buyer_email,
						"buyer_name": param.buyer_name,
						"buyer_tel": param.buyer_tel,
						"buyer_addr": param.buyer_addr,
						"buyer_addr_detail": buyer_addr_detail,
						"buyer_postcode": param.buyer_postcode,
						"buyer_nation": buyer_nation,
						"buyer_city": buyer_city,
						"buyer_state": buyer_state,
						"shipping_method": shipping_method,
						"note": note
					}, function(data, status) {
						var msg = ("Data: " + data + "\nStatus: " + status);
					});

	                var msg = successMessage + '<br>';
	                msg += 'imp_uid : ' + rsp.imp_uid + '<br>';
	                msg += 'merchant_uid : ' + rsp.merchant_uid + '<br>';
	                msg += 'paid_amount : ' + rsp.paid_amount + '<br>';

					alert(msg);
					location.href='/index.php/path/completePaymentPage?'
						+'merchant_id='+rsp.merchant_uid
						+'&amount='+param.amount
						+'&reward_amount='+reward_amount
						+'&projects_num='+uri.segment(5)
						+'&reward_num='+reward_num;
	            } else {
					var msg = failMessage + '<br>';
					msg += 'error Message : ' + rsp.error_msg + '<br>';
					alert(msg);
				}
	        });
    	}
    });


	var haveToLogin, inputComment, reCommnet, successDelete, onlyYours, tryAgain;

	if(uri.segment(3) == 'projects_ko' || uri.segment(3) == 'ko' || uri.segment(3) == '') {
		haveToLogin = '로그인하여야 합니다.';
		inputComment = '댓글 내용을 입력하세요.';
		reCommnet = '다시 입력하세요.';
		successDelete = '삭제되었습니다.';
		onlyYours = '본인의 댓글만 삭제할 수 있습니다.';
		tryAgain = '다시 시도해주세요.';
	} else if(uri.segment(3) == 'projects_en' || uri.segment(3) == 'en') {
		haveToLogin = 'You have to login';
		inputComment = 'Please input your comment';
		reCommnet = 'Please try again';
		successDelete = 'Success to delete';
		onlyYours = 'That comment is not yours';
		tryAgain = 'Please try again';
	} else {
		haveToLogin = '需要登陆';
		inputComment = '请输入内容';
		reCommnet = '重新输入';
		successDelete = '删除成功';
		onlyYours = '只能删除自己的评论';
		tryAgain = '请重新试试';
	}

	$("#comment_add").click(function() {
		$.ajax({
			url: "/index.php/ajax/project_comment_add",
			type: "POST",
			data: {
				"comment_contents": encodeURIComponent($("#comment_contents").val()),
				"csrf_test_name": getCookie("csrf_cookie_name"),
				"table": "projects_comment",
				"projects_num": uri.segment(5)
			},
			dataType: "html",
			complete: function(xhr, textStatus) {
				if(textStatus == 'success') {
					if(xhr.responseText == 1000) {
						alert(inputComment);
					} else if(xhr.responseText == 2000) {
						alert(reCommnet);
					} else if(xhr.responseText == 9000) {
						alert(haveToLogin);
					} else {
						$("#comments").html(xhr.responseText);	
						$("#comment_contents").val('');
					}
				}
			}
		});
	});

	$("#comment_delete").click(function() {
		$.ajax({
			url: "/index.php/ajax/project_comment_delete",
			type: "POST",
			data: {
				"csrf_cookie_name": getCookie('csrf_cookie_name'),
				"table": "projects_comment",
				"projects_comment_id": $(this).attr("vals")
			},
			dataType: "text",
			complete: function(xhr, textStatus) {
				if(textStatus == 'success') {
					if(xhr.responseText == 9000) {
						alert(haveToLogin);
					} else if(xhr.responseText == 8000) {
						alert(onlyYours);
					} else if(xhr.responseText == 2000) {
						alert(tryAgain);
					} else {
						$('#row_num_'+xhr.responseText).remove();
						alert(successDelete);
					}
				} 
			},  
			error: function(request, status, error) {
                        alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
                    }
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
})(this.jQuery); 