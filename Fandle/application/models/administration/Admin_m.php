<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 관리자 인증 모델
*/

class Admin_m extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	/**
	* 관리자 로그인
	*
	* @param array $arrays : 관리자 아이디, 관리자 비밀번호
	*
	* @return object or boolean : 객체 or 탐색 성공 여부
	*/
	function admin_login($arrays) {
		$sql = "SELECT * FROM administor WHERE administor_id = '".$arrays['administor_id']."' AND password = '".$arrays['password']."' ";
		$query = $this->db->query($sql);

		if($query->num_rows() > 0) {
			return $query->row();
		}
		else {
			return FALSE;
		}
	}

	/**
	* 관리자 정보 가져오기
	*
	* @param int $id : 관리자 번호
	*
	* @return object or boolean : 객체 or 탐색 성공 여부
	*/
	function get_adminById($id) {
		$sql = "SELECT * FROM administor WHERE id = '".$id."' ";
		$query = $this->db->query($sql);

		if($query->num_rows() > 0) {
			return $query->row();
		}
		else {
			return FALSE;
		}
	}
}