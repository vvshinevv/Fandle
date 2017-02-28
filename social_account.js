var fbResponse;
window.fbAsyncInit = function() {
		FB.init({
			appId      : '190622721088710',
			cookie     : true,  // 쿠키가 세션을 참조할 수 있도록 허용
			status	   : true,
			xfbml      : true,  // 소셜 플러그인이 있으면 처리
			version    : 'v2.5' // 버전 2.1 사용
		});
		
		FB.getLoginStatus(function(response) {
			fbResponse = response;
		}, {scope: 'public_profile,email,publish_actions,user_friends'});
};
	
// SDK를 비동기적으로 호출
(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_US/sdk.js";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
	
var googleUser = {};
var google_init;
var facebook_init = false;

$(document).ready(function(){

	google_init = function () {
		gapi.load('auth2', function() {
			// Retrieve the singleton for the GoogleAuth library and set up the
			// client.
			auth2 = gapi.auth2.init({
				client_id : '359446206708-aqpu2jnhhmev2gjh41q9blhtk89u5267.apps.googleusercontent.com',
				cookiepolicy : 'single_host_origin',
			});
		});
	}();

	Kakao.init('f586822258d3fb5639d800f34a618ca7');
	
	$("#facebookLoginBtn").click(function(event) {
		var _type = $('>a', this).attr('href');
		if (_type === 'javascript:;') {
			event.preventDefault();
			facebook_init = true;
		}
		checkFacebookStatus(facebookCallback, undefined, "facebook");
	});
	
	$("#facebookJoinBtn").click(function(){
		checkFacebookStatus(facebookCallback, undefined, "facebook"); 
	});

	$("#kakaoLoginBtn").click(function(event) {
		var _type = $('>a', this).attr('href');
		if (_type === 'javascript:;') {
			event.preventDefault();
			location.href="/web/waccount/login/kakao";
		}
		else {
			checkKakaoStatus(kakaoCallback, undefined, "kakao");
		}
	});
	
	$("#kakaoJoinBtn").click(function(){
		checkKakaoStatus(kakaoCallback, undefined, "kakao"); 
	});
	
	$("#googleLoginBtn").click(function(event) {
		var _type = $('>a', this).attr('href');
		if (_type === 'javascript:;') {
			event.preventDefault();
		}
		checkGoogleStatus(googleCallback, undefined, "google"); 
	});
	
	$("#googleJoinBtn").click(function(){
		checkGoogleStatus(googleCallback, undefined, "google"); 
	});	
});

/* 
 * ########################################################################################
 * 공통
 * ########################################################################################
 * */

//ajax 요청(facebook에서 발급받은 user id로 db 조회하여 facebook으로 회원가입 한 적 있는지)
function ajaxCheckSocialExist(response, successCallback, encKey, loginIdType){

	var params;
	
	if(loginIdType==='facebook'){
	
		params = {
				"providerUserId" : response.authResponse.userID,
				"loginIdType" : loginIdType,
				"encKey" : encKey
			};
	} else {
		params = {
				"providerUserId" : response.providerUserId,
				"loginIdType" : loginIdType,
				"encKey" : encKey
			};
	}
	
	$.ajax({
		type: "POST",
		url: "/web/waccount/ajaxSocialUserExistForSocialId",
		data: params
	}).done(function(result){
		var jsonObj = $.parseJSON(result);
		if (jsonObj.success == 'true'){

			successCallback(jsonObj, response);
		} else {
		    alert("요청에 실패했습니다."
		      		 + " code : " + response.code);
		}
	});
}

//소셜계정 연동 요청 공통 함수
function ajaxLinkSnsAccount(data, loginIdType, toDo, callback){
	
	var params = {
			"providerUserId" : data.providerUserId,
			"loginIdType" : loginIdType,
			"toDo" : toDo
		};
		
	ajaxRequest(params, "/web/waccount/update/ajaxLinkOrUnlinkSnsInfo", callback, true);
}

// 소셜계정 연동 해제 요청 공통 함수
function ajaxUnlinkSnsAccount(loginIdType, toDo, callback){
	var params = {
			"loginIdType" : loginIdType,
			"toDo" : toDo
		};
		
	ajaxRequest(params, "/web/waccount/update/ajaxLinkOrUnlinkSnsInfo", callback, true);
}

/* 
 * ########################################################################################
 * Facebook
 * ########################################################################################
 * */

//페이스북 회원가입, 로그인 콜백(일반)
function checkFacebookStatus(successCallback, encKey, loginIdType) {
	//console.log('fbResponse.status: ['+fbResponse.status+']');
	if (undefined != fbResponse && fbResponse.status === 'connected') {
		ajaxCheckSocialExist(fbResponse, successCallback, encKey, loginIdType);
	}
	else {
		if (facebook_init === false) {
			FB.login(function(response) {
				if (response.status === 'connected') {
			    	ajaxCheckSocialExist(response, successCallback, encKey, loginIdType);    
				}
				else if (response.status === 'not_authorized') {
					alert("not_authorized");
				}
				else {
					alert("페이스북 로그인을 취소하셨거나 실패하였습니다");
				}
			},  {scope: 'public_profile,email,publish_actions,user_friends'});
		}
		else {
			location.href="/web/waccount/login/facebook";
//			var _uri = "http://dev.wadiz.kr/web/ftlogin/auth/facebookCallback";
//			window.location = encodeURI("https://www.facebook.com/dialog/oauth?client_id=190622721088710&redirect_uri=" + _uri + "&scope=email,publish_actions,user_friends");
		}
	}	
}

//페이스북 연동 콜백
function checkFacebookStatusForLink(toDoFunction, loginIdType, toDo, callback) {
	//FB.getLoginStatus(function(response) {
		
		if (fbResponse.status === 'connected') {
			
			var user = {
					"providerUserId" : fbResponse.authResponse.userID
			}
			
			toDoFunction(user, loginIdType, toDo, callback);
		        

		} else {
			
			FB.login(function(response){
			
				if (response.status === 'connected') {

					var user = {
							"providerUserId" : response.authResponse.userID
					}
						
				    toDoFunction(user, loginIdType, toDo, callback);
				        

				} else if (response.status === 'not_authorized') {
					alert("not_authorized");
				} else {
					alert("페이스북 로그인을 취소하셨거나 실패하였습니다");
				}
			},  {scope: 'public_profile,email,publish_actions,user_friends'});
	    }
	//}, {scope: 'public_profile,email,publish_actions,user_friends'});
}

// 페이스북으로 연동
function linkFacebookAccount(){
	checkFacebookStatusForLink(ajaxLinkSnsAccount, "facebook", "link", FacebookLinkSuccessCallback);
}

//페이스북으로 연동 해제, 페이스북 로긴 확인 불필요
function unlinkFacebookAccount(){
	ajaxUnlinkSnsAccount("facebook", "unlink", FacebookUnlinkSuccessCallback);
}

// 페이지에서 로그인 시 success callback
function facebookCallback(result, response){
	var isExist = result.exist;
	if("SUSS000" == result.code){

		location.href = $('#returnForm').val();
		//$("#returnForm").submit();
	}else if("SUSBA09" == result.code){
		alert("인증정보를 갱신합니다. 다시 시도해주세요", function(){
			location.reload();
        });
	}else if("SUSBA10" == result.code){
		
		FB.api('/me', {fields: 'name, email, picture'}, function(resp) {
			if (facebook_init === false) {
				var postObj = new Object();
	
				postObj.type = 'facebook';
				postObj.loginIdType = 'facebook';
				postObj.providerId = resp.id;
				
				if(resp.name){
					postObj.nickName = resp.name;
				}
				if(resp.email){
					postObj.userName = resp.email;
				}
				if(resp.picture.data.url){
					postObj.pictureURL = 'https://graph.facebook.com/' + resp.id + '/picture?type=large';
				}
				
				submitPost('/web/waccount/wAccountRegistType', postObj, false);
			}
			else {			
				var url = "/web/waccount/wAccountRegistType?type=facebook"
					+ "&code=" + resp.code
					+ "&providerId=" + resp.id + "&nickName=" + resp.name+"&loginIdType=facebook";
				
				var email = resp.email;
				var pictureURL = resp.picture.data.url;
				
				if(typeof email != undefined){
					url = url +"&userName="+email;
				};
				
				if(typeof pictureURL != undefined){
					url = url + "&pictureURL=https://graph.facebook.com/" + resp.id + "/picture?type=large";
				};			
				window.location =url;
			}
		});		
	}
}

//페이스북 연동 성공 시
function FacebookLinkSuccessCallback(result){
	if("true" == result.success){
		alert("페이스북 계정이 연동되었습니다.");
		$(".facebook").removeClass("unlinked");
		$(".facebook").html("<a onclick='unlinkFacebookAccount()'><em></em>");
			

	}else{
		alert("오류가 발생했습니다.", function(){
			location.reload();
		});
	}
}
//페이스북 연동 해제 성공 시
function FacebookUnlinkSuccessCallback(result){
	if("true" == result.success){
		alert("페이스북 계정 연동이 해제되었습니다.");
		$(".facebook").addClass("unlinked");
		$(".facebook").html("<a onclick='linkFacebookAccount()'><em></em>");

	}else{
		alert("오류가 발생했습니다.", function(){
			location.reload();
		});
	}
}

function postMyFeedFT(fundingVO, resultFunc){
	// 피드 게시
	FB.ui({      
		method: 'feed',      
		name : fundingVO.corpName,
		link : fundingVO.linked,      
		title : fundingVO.corpName+'의 프로젝트를 지지합니다.',
		caption: 'Wadiz',
		description: fundingVO.title,
		display:"popup",
		},function(response){
			if( response && response.post_id ){
				FB.api('/me', function(res) {

					var providerUserId;
					if(fundingVO.providerUserId == 'facebook'){
						providerUserId = res.id;
					}else{
						providerUserId = fundingVO.providerUserId;
					}
					var signatureVO = {
						"campaignId" : fundingVO.campaignId,
						"provider" : fundingVO.provider,
						"providerUserId" : providerUserId,
						"objId" : response.post_id
					}
					ajaxRequest(signatureVO, "/web/wcampaign/investSignature/ajaxRegisterInvestSignature", resultFunc, true);
				});
			} else{
				resultFunc(false);
				// 올리는 거 실패     
			}    
		});
}


/* 
 * ########################################################################################
 * KAKAO
 * ########################################################################################
 * */

/* 
 * 카카오톡 연동 시 카카오 로긴 확인
 * callback - 성공적으로 로그인 & 유저계정이 가져왔을 경우 callback
 */
function checkKakaoStatus(successCallback, encKey, loginIdType) {
	// 카카오톡 로그인
	Kakao.Auth.login({
		success: function(authObj) {

			// 성공 시 유저정보 요청
			Kakao.API.request({url: '/v1/user/me', 
				success: function(response) {
					var user;
					
					if(typeof response.properties !='undefined'&& typeof response.properties.nickname != 'undefined'){
						user = {
								"userName" : undefined,
								"providerUserId" : response.id,
								"nickName" : response.properties.nickname
						}
					}else{
						user = {
								"userName" : undefined,
								"providerUserId" : response.id,
						}
					}
					
					if(typeof response.properties !='undefined'&& typeof response.properties.thumbnail_image != 'undefined'){
						user.pictureURL = response.properties.thumbnail_image;
					}else{
						console.log();
					}
					
					ajaxCheckSocialExist(user, successCallback, "aaa", loginIdType);
				}, fail: function(err) {
					alert(err);
				}
			});
		},
		fail: function(err) {
			alert(err);
		}
	});
}

/* 
 * 카카오톡 연동 시 카카오 로긴 확인
 * callback - 성공적으로 로그인 & 유저계정이 가져왔을 경우 callback
 */
function checkKakaoStatusForLink(toDoFunction, loginIdType, toDo, callback){
	// 카카오톡 로그인
	Kakao.Auth.login({
		success: function(authObj) {
			

			// 성공 시 유저정보 요청
			Kakao.API.request({
				url: '/v1/user/me',
				success: function(response) {
					
					var user;
					
					if(typeof response.properties !='undefined'&& typeof response.properties.nickname != 'undefined'){
						user = {
								"userName" : undefined,
								"providerUserId" : response.id,
								"nickName" : response.properties.nickname
						}
					}else{
						user = {
								"userName" : undefined,
								"providerUserId" : response.id,
						}
					}
					
					if(typeof response.properties !='undefined'&& typeof response.properties.thumbnail_image != 'undefined'){
						user.pictureURL = response.properties.thumbnail_image;
					}else{
						console.log();
					}
					
					toDoFunction(user, loginIdType, toDo, callback);

				},
				fail: function(err) {
					alert(err);
				}
			});
		},
		fail: function(err) {
//			alert(err);
			self.close();
		}
	});
}

//카카오 계정 연동
function linkKakaoAccount(){
	//kakaoStatusCheck(ajaxLinkKakoAccount, "link");
	checkKakaoStatusForLink(ajaxLinkSnsAccount, "kakao", "link", kakaoLinkSuccessCallback);
}
// 카카오 계정 연동 해제
function unlinkKakaoAccount(){
	ajaxUnlinkSnsAccount("kakao", "unlink", kakaoUnlinkSuccessCallback);
}

//카카오 계정 연동 성공 시
function kakaoLinkSuccessCallback(result){
	if("true" == result.success){
		alert("카카오 계정이 연동되었습니다.");
		$(".kakao").removeClass("unlinked");
		$(".kakao").html("<a onclick='unlinkKakaoAccount()'><em></em>");
			

	}else{
		alert("오류가 발생했습니다.", function(){
			location.reload();
		});
	}
}
//카카오 계정 연동 해제 성공 시
function kakaoUnlinkSuccessCallback(result){
	if("true" == result.success){
		alert("카카오 계정 연동이 해제되었습니다.");
		$(".kakao").addClass("unlinked");
		$(".kakao").html("<a onclick='linkKakaoAccount()'><em></em>");

	}else{
		alert("오류가 발생했습니다.", function(){
			location.reload();
		});
	}
}

// 카카오아이디로 로그인, 회원가입 시 callback 함수
function kakaoCallback(result, profile){
	console.log('result.code: '+result.code);
	var isExist = result.exist;
	if("SUSS000" == result.code){
		location.href = $('#returnForm').val();
		//$("#returnForm").submit();
	}else if("SUSBA09" == result.code){
		alert("인증정보를 갱신합니다. 다시 시도해주세요", function(){
			location.reload();
        });
	}else if("SUSBA10" == result.code){
		
		var postObj = new Object();

		postObj.type = 'kakao';
		postObj.loginIdType = 'kakao';
		postObj.providerId = profile.providerUserId;
		
		if(profile.nickName){
			postObj.nickName = profile.nickName;
		}

		if(profile.pictureURL){
			postObj.pictureURL = profile.pictureURL;
		}
		
		submitPost('/web/waccount/wAccountRegistType', postObj, false);

//		var url = "/web/waccount/wAccountRegistType?type=kakao"
//			+ "&code=" + result.code
//			+ "&providerId=" + profile.providerUserId + "&nickName=" + profile.nickName+"&loginIdType=kakao";
//		
//		if(typeof profile.pictureURL != undefined){
//			url = url + "&pictureURL=" + profile.pictureURL;
//		};
//		
//		window.location =url;

	}
}

/*
 * ########################################################################################
 * Google
 * ########################################################################################
 */

//연동 위한 구글 로그인 확인 후 콜백 함수 실행
function checkGoogleStatusForLink(toDoFunction, loginIdType, toDo, callback) {

	auth2.signIn().then(function(){

		var profile = auth2.currentUser.get().getBasicProfile(); 
		
		var user = {
				"providerUserId" : profile.getId()
		}
		
		toDoFunction(user, loginIdType, toDo, callback);
	});
}
//구글 계정 연동
function linkGoogleAccount(){
	checkGoogleStatusForLink(ajaxLinkSnsAccount, "google", "link", googleLinkSuccessCallback);
}
//구글 계정 연동 해제 요청
function unlinkGoogleAccount(){
	ajaxUnlinkSnsAccount("google", "unlink", googleUnlinkSuccessCallback);
}

//회원가입, 로그인 위해 구글 로그인이 되있는지 확인
function checkGoogleStatus(successCallback, encKey, loginIdType) {

	auth2.signIn().then(function(){
		var profile = auth2.currentUser.get().getBasicProfile(); 
		
		var user = {
				"userName" : profile.getEmail(),
				"providerUserId" : profile.getId(),
				"nickName" : profile.getName()
		}
		
		var picURL = profile.getImageUrl();
		
		if(typeof picURL != 'undefined'){
			user.pictureURL = picURL;
		}

		ajaxCheckSocialExist(user, successCallback, encKey, loginIdType);		
	});
}
	
//서버 리턴 정보에 따른 회원가입 콜백
function googleCallback(result, profile){

	if("SUSS000" == result.code){
		
		location.href = $('#returnForm').val();
		//$("#returnForm").submit();
	}else if("SUSBA10" == result.code){
		
		var postObj = new Object();

		postObj.type = 'google';
		postObj.loginIdType = 'google';
		postObj.providerId = profile.providerUserId;
		
		if(profile.nickName){
			postObj.nickName = profile.nickName;
		}
		
		if(profile.userName){
			postObj.userName = profile.userName;
		}

		if(profile.pictureURL){
			postObj.pictureURL = profile.pictureURL;
		}
		
		submitPost('/web/waccount/wAccountRegistType', postObj, false);

		/*var url = "/web/waccount/wAccountRegistType?type=google"
			+ "&code=" + result.code
			+ "&userName=" + profile.userName
			+ "&providerId=" + profile.providerUserId + "&nickName=" + profile.nickName+"&loginIdType=google";
		
		if(typeof profile.pictureURL != 'undefined'){

			url=url+"&pictureURL=" + profile.pictureURL;
		}

		window.location=url;*/
	}
}

//구글 연동 성공 시
function googleLinkSuccessCallback(result){
	if("true" == result.success){
		alert("구글 계정이 연동되었습니다.");
		$(".google").removeClass("unlinked");
		$(".google").html("<a onclick='unlinkGoogleAccount()'><em></em>");
			
	}else{
		alert("오류가 발생했습니다.", function(){
			location.reload();
		});
	}
}
//구글 연동 해제 성공 시
function googleUnlinkSuccessCallback(result){
	if("true" == result.success){
		alert("구글 계정 연동이 해제되었습니다.");
		$(".google").addClass("unlinked");
		$(".google").html("<a onclick='linkGoogleAccount()'><em></em>");

	}else{
		alert("오류가 발생했습니다.", function(){
			location.reload();
		});
	}
}