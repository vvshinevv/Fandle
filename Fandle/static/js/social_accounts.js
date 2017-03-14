// 페이스북 로그인
//-----------------------------------------------
window.fbAsyncInit = function() {
	FB.init({
		appId      : '{105057516623849}',
		cookie     : true,  // enable cookies to allow the server to access 
		status     : true,
		xfbml      : true,  // parse social plugins on this page
		version    : 'v2.7' // use graph api version 2.5
	});
};

// SDK를 비동기적으로 호출
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/ko_KR/sdk.js#xfbml=1&version=v2.7&appId=105057516623849";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

$(document).ready(function(){
	
	$("#facebookLoginBtn").click(function(event) {

		FB.getLoginStatus(function(response) {

			FB.login(function(response) {
				//console.log(response);
				if (response.status === 'connected') {
					// 페이스북과 Fandle에 로그인이 된 경우
					FB.api('/me', {fields: 'name, email, picture'}, function(response) {
						// 페이스북엔 로그인이 되었지만 Fandle엔 로그인이 되지 않은 경우
						// 데이터베이스에서 ajax로 메일이 있는지 없는지를 체크함
						ajaxCheckSocialExist(response.email, response.name);
						console.log('Good to see you, ' + response.name + ', email : ' + response.email + '.');
					});
				} else if (response.status === 'not_authorized') {
					alert("not_authorized");
				} else {
					// 페이스북에 로그인이 안 된 경우
					alert("페이스북 로그인을 취소하셨거나 실패하였습니다");
				}
			}, {scope: 'public_profile,email'});
		});
	});
});

function ajaxCheckSocialExist($email, $name) {
	$.ajax({
		type: "POST",
		url: "/index.php/ajax/ajaxSocialUserExistForSocialId",
		data: {
			"email": $email
		},
		dataType: "json",
		success: function(data) {
			if(data.sent == "yes") {
				//alert("가입되었습니다. 로그인해주세요");
				location.href="/index.php/auth/socialRegister?email="+$email+"&username="+$name;
			} else {
				alert($email + "은(는) 이미 가입되어있는 이메일입니다.");
			}
		}
	});
}