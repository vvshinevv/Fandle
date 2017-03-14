<?php
class MY_Controller extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	function _head() {
		$this->load->view('app/header_v');
	}

	function _footer() {
		$this->load->view('app/footer_v');
	}

	/**
	* url 중 키값을 구분하여 값을 가져오도록
	* @param Array $url : segment_explode 한 url 값
	* @param String $key : 가져오려는 값의 key
	* @return String $url[$k] : 리턴값
	*/
	function url_explode($url, $key) {
		$cnt = count($url);
		for($i=0; $i<$cnt; $i++) {
			if($url[$i] == $key) {
				$k = $i+1;
				if($k == $cnt) {
					return 1;
				}
				return $url[$k];
			}	
		}
	}

	/**
	* url 중 키값을 구분하여 값을 가져오도록
	* @param Array $url : segment_explode 한 url 값
	* @param String $key : 가져오려는 값의 key
	* @return String $url[$k] : 리턴값
	*/
	function url_explode_2($url, $key) {
		$cnt = count($url);
		for($i=0; $i<$cnt; $i++) {
			if($url[$i] == $key) {
				$k = $i+2;
				if($k == $cnt) {
					return 1;
				}
				return $url[$k];
			}	
		}
	}

	/**
	* HTTP의 URL을 "/"를 Delimiter로 사용하여 배열로 바꿔 리턴한다.
	*
	* @param string 대상이 되는 문자열
	* @return string[]
	*/
	function segment_explode($seg) {
		$len = strlen($seg);
		if(substr($seg, 0, 1) == '/') {
			//앞 uri가 '/'라면 제거
			$seg = substr($seg, 1, $len);
		}
		
		$len = strlen($seg);
		
		if(substr($seg, -1) == '/') {
			//끝 uri가 '/'라면 제거
			$seg = substr($seg, 0, $len-1);
		}
		$seg_exp = explode("/", $seg);
		return $seg_exp;
	}
}