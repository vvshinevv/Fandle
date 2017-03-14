<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_m extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	/**
	* user 전체 목록 가져오기
	*
	* @param string $table : 테이블 이름
	* @param string $type : return type을 결정 - $type == count ? project 개수 : project 객체 반환
	* @param string $offset : limit $offset, $limit
	* @param string $limit : limit $offset, $limit
	* @param string $search_word : 검색 문자열
	*
	* @return int or object 
	*/
	function get_users($table='user', $type='', $offset='', $limit='', $search_word='') {
		$sword = '';

		if($search_word != '') {
			//검색어가 있는 경우 username, nickname, email에서 검색
			$sword = ' WHERE username like "%'.$search_word.'%" or nickname like "%'.$search_word.'%" or email "%'.$search_word.'%" ';
		}

		$limit_query = '';

		if($limit != '' OR $offset != '') {
			//페이징이 있을 경우
			$limit_query = ' LIMIT '.$offset.', '.$limit;
		}

		$sql = "SELECT * FROM ".$table.$sword." ORDER BY user_id DESC".$limit_query;
		$query = $this->db->query($sql);

		if($type == 'count') {
			//사용자 총 수를 반환
			$result = $query->num_rows();
		} else {
			$result = $query->result();
		}

		return $result;
	}

	/**
	* user 상세 보기
	*
	* @param string $table : 테이블 이름
	* @param string $id : user 번호
	*
	* @return object
	*/
	function get_user_detail($table, $id) {
		$sql = "SELECT * FROM ".$table." WHERE user_id = '".$id."' ";
		$query = $this->db->query($sql);

		$result = $query->row();
		return $result;
	}



	/**
	* user 배송 정보 보기
	*
	* @param string $table : 테이블 이름
	* @param string $id : user 번호
	*
	* @return object
	*/
	function get_delivery_by_user($table, $id) {
		$sql = "SELECT * FROM ".$table." WHERE user_id = '".$id."' ";
		$query = $this->db->query($sql);

		$result = $query->row();
		return $result;
	}

	/**
	* user 펀딩 정보 보기
	*
	* @param string $table : 테이블 이름
	* @param string $id : user 번호
	*
	* @return object
	*/
	function get_funding_user_by_user($table, $id) {
		$sql = "SELECT * FROM ".$table." WHERE user_id = '".$id."' ";
		$query = $this->db->query($sql);

		$result = $query->row();
		return $result;
	}
}