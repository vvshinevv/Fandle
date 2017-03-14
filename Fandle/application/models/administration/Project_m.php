<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* project 모델
*/
class Project_m extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	/**
	* projects 전체 목록 가져오기
	*
	* @param string $table : 테이블 이름
	* @param string $type : return type을 결정
	*	- type : count일 때 개수 반환
	*	- type : users && 'else' 일 때 객체 반환 
	* @param string $offset : limit $offset, $limit
	* @param string $limit : limit $offset, $limit
	* @param string $search_word : 검색 문자열
	*
	* @return int or object  
	*/
	function get_projects($table='', $type='', $offset='', $limit='', $search_word='') {
		$sword = '';

		if($search_word != '') {
			//검색어가 있는 경우 처리
			$sword = ' WHERE subject like "%'.$search_word.'%" or contents like "%'.$search_word.'%" ';
		}

		$limit_query ='';

		if($limit != '' OR $offset != '') {
			//페이징이 있을 경우
			$limit_query = ' LIMIT '.$offset.', '.$limit;
		}

		if($type == 'users') {
			$ordered = 'projects_num';
		} else {
			$ordered = 'projects_id';
		}

		$sql = "SELECT * FROM ".$table.$sword." ORDER BY ".$ordered." DESC".$limit_query; // 정렬 순서는 가장 최신순
		$query = $this->db->query($sql);

		if($type == 'count') {
			//게시물의 개수를 반환
			$result = $query->num_rows();
		} else {
			$result = $query->result();
		}

		return $result;
	}

	/**
	* 가장 최근에 삽입된 프로젝트 가지고 오기
	* 등록 날짜로 순서를 정하고 SELECT
	* @param string $table
	*
	* @return object
	*/
	function get_main_project($table='') {
		$sql = "SELECT * FROM ".$table." ORDER BY reg_date DESC limit 1";
		$query = $this->db->query($sql);

		$result = $query->result();

		return $result;
	}

	/**
	* projects_num 으로 프로젝트 가지고 오기
	*
	* @param string $table
	* @param int $num
	*
	* @return object
	*/
	function get_project_by_pn($table='', $num='') {
		$sql = "SELECT * FROM ".$table." WHERE projects_num='".$num."' ";
		$query = $this->db->query($sql);

		$result = $query->result();

		return $result;
	}

	/**
	* projects 한국어 목록 가져오기
	*
	* @param string $table : 테이블 이름
	* @param string $type : return type을 결정 - $type == count ? project 개수 : project 객체 반환
	* @param string $offset : limit $offset, $limit
	* @param string $limit : limit $offset, $limit
	* @param string $search_word : 검색 문자열
	*
	* @return int or object  
	*/
	function get_projects_ko($table='projects', $type='', $offset='', $limit='', $search_word='') {
		$sword = '';

		if($search_word != '') {
			//검색어가 있는 경우 처리
			$sword = ' subject like "%'.$search_word.'%" or contents like "%'.$search_word.'%" ';
		}

		$limit_query ='';

		if($limit != '' OR $offset != '') {
			//페이징이 있을 경우
			$limit_query = ' LIMIT '.$offset.', '.$limit;
		}

		$sql = "SELECT * FROM projects_ko ".$sword." ORDER BY projects_id DESC".$limit_query; // 정렬 순서는 가장 최신순
		$query = $this->db->query($sql);

		if($type == 'count') {
			//게시물의 개수를 반환
			$result = $query->num_rows();
		} else {
			$result = $query->result();
		}

		return $result;
	}

	/**
	* projects 영어 목록 가져오기
	*
	* @param string $table : 테이블 이름
	* @param string $type : return type을 결정 - $type == count ? project 개수 : project 객체 반환
	* @param string $offset : limit $offset, $limit
	* @param string $limit : limit $offset, $limit
	* @param string $search_word : 검색 문자열
	*
	* @return int or object  
	*/
	function get_projects_en($table='projects', $type='', $offset='', $limit='', $search_word='') {
		$sword = '';

		if($search_word != '') {
			//검색어가 있는 경우 처리
			$sword = ' subject like "%'.$search_word.'%" or contents like "%'.$search_word.'%" ';
		}

		$limit_query ='';

		if($limit != '' OR $offset != '') {
			//페이징이 있을 경우
			$limit_query = ' LIMIT '.$offset.', '.$limit;
		}

		$sql = "SELECT * FROM projects_en ".$sword." ORDER BY projects_id DESC".$limit_query; // 정렬 순서는 가장 최신순
		$query = $this->db->query($sql);

		if($type == 'count') {
			//게시물의 개수를 반환
			$result = $query->num_rows();
		} else {
			$result = $query->result();
		}

		return $result;
	}

	/**
	* projects 중국어 목록 가져오기
	*
	* @param string $table : 테이블 이름
	* @param string $type : return type을 결정 - $type == count ? project 개수 : project 객체 반환
	* @param string $offset : limit $offset, $limit
	* @param string $limit : limit $offset, $limit
	* @param string $search_word : 검색 문자열
	*
	* @return int or object  
	*/
	function get_projects_ch($table='projects', $type='', $offset='', $limit='', $search_word='') {
		$sword = '';

		if($search_word != '') {
			//검색어가 있는 경우 처리
			$sword = ' subject like "%'.$search_word.'%" or contents like "%'.$search_word.'%" ';
		}

		$limit_query ='';

		if($limit != '' OR $offset != '') {
			//페이징이 있을 경우
			$limit_query = ' LIMIT '.$offset.', '.$limit;
		}

		$sql = "SELECT * FROM projects_ch ".$sword." ORDER BY projects_id DESC".$limit_query; // 정렬 순서는 가장 최신순
		$query = $this->db->query($sql);

		if($type == 'count') {
			//게시물의 개수를 반환
			$result = $query->num_rows();
		} else {
			$result = $query->result();
		}

		return $result;
	}


	/**
	* projects 상세 보기
	*
	* @param string $table : 테이블 이름
	* @param string $id : project 번호
	*
	* @return object
	*/
	function get_project_detail($table, $id) {
		$sql = "SELECT * FROM ".$table." WHERE projects_id = '".$id."' ";
		$query = $this->db->query($sql);

		$result = $query->row();
		return $result;
	}

	/**
	* projects 입력
	*
	* @param array $arrays : subject, summary, target_amount, launch_date, due_date, youtube_url, period, contents
	*
	* @return boolean 입력 성공 여부
	*/
	function insert_project($arrays) {
		$insert_array = array(
				'nation'=>$arrays['nation'],
				'projects_num'=>$arrays['projects_num'],
				'administor_id'=>'advisor', # @todo : 세션에 있는 관리자 명으로 바꿀 것
				'subject'=>$arrays['subject'],
				'summary'=>$arrays['summary'],
				'contents'=>$arrays['contents'],
				'target_amount'=>$arrays['target_amount'],
				'launch_date'=>$arrays['launch_date'],
				'due_date'=>$arrays['due_date'],
				'reg_date'=>date("Y-m-d H:i:s"),
				'period'=>$arrays['period'],
				'youtube_url'=>$arrays['youtube_url'],
				'youtube_img'=>$arrays['youtube_img'],
				'project_img'=>$arrays['project_img'],
				'state'=>$arrays['state']
			);

		$result = $this->db->insert($arrays['table'], $insert_array);

		return $result;
	}


	/**
	* project 수정
	*
	* @param array $arrays : subject, nation, projects_num, summary, target_amount, launch_date, due_date, youtube_url, period, contents, youtube_img, state
	*
	* @return boolean 수정 성공 여부
	*
	*/
	function modify_project($arrays) {
		$modify_array = array(
				'nation'=>$arrays['nation'],
				'projects_num'=>$arrays['projects_num'],
				'subject'=>$arrays['subject'],
				'summary'=>$arrays['summary'],
				'contents'=>$arrays['contents'],
				'target_amount'=>$arrays['target_amount'],
				'launch_date'=>$arrays['launch_date'],
				'due_date'=>$arrays['due_date'],
				'period'=>$arrays['period'],
				'youtube_url'=>$arrays['youtube_url'],
				'youtube_img'=>$arrays['youtube_img'],
				'project_img'=>$arrays['project_img'],
				'state'=>$arrays['state']
			);

		$where = array(
			'projects_id'=>$arrays['projects_id']
			);

		$result = $this->db->update($arrays['table'], $modify_array, $where);

		return $result;
	}

	/**
	* project 삭제
	* 
	* @param string $table 테이블 명
	* @param string $no project 번호
	* 
	* @return boolean 삭제 성공 여부
	*/
	function delete_project($table, $no) {
		$delete_array = array(
			'projects_id'=>$no
			);

		$result = $this->db->delete($table, $delete_array);

		return $result;
	}

	/**
	* reward 가져오기 by projects_id
	*
	* @param string $table : 테이블 이름
	* @param string $id : project 번호
	*
	* @return object
	*/
	function get_rewards($table, $id) {
		$sql = "SELECT * FROM ".$table." WHERE projects_id = '".$id."' ";
		$query = $this->db->query($sql);

		$result = $query->result();
		return $result;
	}

	/**
	* reward 가져오기 by projects_num
	*
	* @param string $table : 테이블 이름
	* @param string $id : project 번호
	*
	* @return object
	*/
	function get_rewards_by_pn($table, $id) {
		$sql = "SELECT * FROM ".$table." WHERE projects_num = '".$id."' ";
		$query = $this->db->query($sql);

		$result = $query->result();
		return $result;
	}

    /**
     * reward 가져오기 by projects_num & reward_num
     */
    function getRewardByPNRN($table, $pn, $rn) {
        $sql = "SELECT * FROM ".$table." WHERE projects_num = '".$pn."' AND reward_num = '".$rn."' ";
        $query = $this->db->query($sql);

        $result = $query->result();
        return $result;
    }

	/**
	* 선택한 reward 가져오기 by reward_id
	*
	* @param string $table : 테이블 이름
	* @param string $id : reward_id
	*
	* @return object
	*/
	function get_rewards_by_ri($table, $id) {
		$sql = "SELECT * FROM ".$table." WHERE reward_id = '".$id."' ";
		$query = $this->db->query($sql);

		$result = $query->result();
		return $result;
	}

	/**
	* update by projects_num
	*
	* @param string $table : 테이블 이름
	* @param string $id : project 번호
	*
	* @return object
	*/
	function get_update_by_pn($table, $id) {
		$sql = "SELECT * FROM ".$table." WHERE projects_num = '".$id."' ORDER BY progress_project_id DESC";
		$query = $this->db->query($sql);

		$result = $query->result();
		return $result;
	}

	/**
	* comment 가져오기 by projects_num
	*
	* @param string $table : 테이블 이름
	* @param string $id : project 번호
	*
	* @return object
	*/
	function get_comment_by_pn($table='projects_comment', $id) {
		$sql = "SELECT * FROM ".$table." WHERE projects_num = '".$id."' ORDER BY projects_comment_id DESC";
		$query = $this->db->query($sql);

		$result = $query->result();
		return $result;
	}

	/**
	* projects_num 가져오기 by projects_id
	*
	* @param string $table : 테이블 이름
	* @param string $id : project 번호
	*
	* @return object
	*
	* 지금 projects_num 하고 project_id 때문에
	* 겁나 꼬이고 있는 상태
	* 나중에 기회가 된다면 구조를 싹다 고쳐야되는
	* 그런 상황이... 나올수가 있음
	* 인생이여...
	*
	*/
	function get_num_by_pi($table, $id) {
		$sql = "SELECT projects_num FROM ".$table." WHERE projects_id = '".$id."' ";
		$query = $this->db->query($sql);

		$result = $query->row();
		return $result;
	}

	/**
	* reward 가져오기 by reward_id
	*
	* @param string $table : 테이블 이름
	* @param string $id : reward_id
	*
	* @return object
	*/
	function get_rewards_by_reward_id($table, $id) {
		$sql = "SELECT * FROM ".$table." WHERE reward_id = '".$id."' ";
		$query = $this->db->query($sql);

		$result = $query->row();
		return $result; 
	}

	/**
	* 고객이 주문한 리워드 정보 가지고 오기
	*
	* @param string $projects_num
	* @param string $reward_num
	*
	* @return object
	*/
	function get_reward_by_user($projects_num, $reward_num) {
		$sql0 = "SELECT projects_id FROM projects_ko WHERE projects_num=".$projects_num;
		$sql1 = "SELECT * FROM reward_ko WHERE reward_num=".$reward_num." AND projects_id=(".$sql0.")";

		$query = $this->db->query($sql1);

		$result = $query->row();
		return $result;
	}

	/**
	* 고객이 주문한 프로젝트 정보 가지고 오기
	*
	* @param string $table
	* @param string $projects_num
	*
	* @return object
	*/
	function get_projects_ko_by_user($table, $projects_num) {
		$sql = "SELECT * FROM ".$table." WHERE projects_num='".$projects_num."' ";
		$query = $this->db->query($sql);

		$result = $query->row();
		return $result;
	}

	/**
	* reward 입력
	*
	* @param $array : table, projects_id, reward_amount, reward_subject, count, reward_contents
	*
	* @return boolean 입력 성공 여부
	*/
	function insert_reward($arrays) {
		$insert_array = array (
			'projects_id'=>$arrays['projects_id'],
			'projects_num'=>$arrays['projects_num'],
			'reward_num'=>$arrays['reward_num'],
			'reward_amount'=>$arrays['reward_amount'],
			'reward_subject'=>$arrays['reward_subject'],
			'count'=>$arrays['count'],
			'reward_contents'=>$arrays['reward_contents']
			);

		$result = $this->db->insert($arrays['table'], $insert_array);

		return $result;
	}


	/**
	* reward 수정
	*
	* @param array $arrays : table, projects_id, reward_amount, reward_subject, count, state, reward_contents
	*
	* @return boolean 수정 성공 여부
	*/
	function modify_reward($arrays) {
		$modify_array = array(
			'projects_id'=>$arrays['projects_id'],
			'projects_num'=>$arrays['projects_num'],
			'reward_num'=>$arrays['reward_num'],
			'reward_amount'=>$arrays['reward_amount'],
			'reward_subject'=>$arrays['reward_subject'],
			'count'=>$arrays['count'],
			'state'=>$arrays['state'],
			'reward_contents'=>$arrays['reward_contents']
			);

		$where = array(
			'reward_id'=>$arrays['reward_id']
			);

		$result = $this->db->update($arrays['table'], $modify_array, $where);
		
		return $result;
	}


	/**
	* reward 삭제
	*
	* @param string $table 테이블 명
	* @param string $no reward 번호
	*
	* @return boolean 삭제 성공 여부
	*/
	function delete_reward($table, $no) {
		$delete_array = array(
			'reward_id'=>$no);

		$result = $this->db->delete($table, $delete_array);

		return $result;
	}

	/**
	* 프로젝트 기간 업데이트
	*
	* @param string $table : 테이블 이름
	* @param int $state : 런칭 전 or 종료 or 진행 중
	* @param int $period : 남은 기간
	* @param int $id : project 아이디
	*
	* @return boolean
	*/
	function update_state_period($table, $state, $period, $id) {
		$sql = "UPDATE ".$table." SET state=".$state.", period=".$period." WHERE projects_id=".$id." ";
		
		if($this->db->query($sql)) {
			return true;
		} else {
			return false;
		}
	}

	/**
	* progress_project 가져오기 by projects_id
	*
	* @param string $table : 테이블 이름
	* @param string $id : project 번호
	*
	* @return object
	*/
	function get_progress_project($table='progress_project', $id) {
		$sql = "SELECT * FROM ".$table." WHERE projects_id = '".$id."' ";
		$query = $this->db->query($sql);

		$result = $query->result();
		return $result;
	}

	/**
	* progress_project 가져오기 by progress_project_id
	*
	* @param string $table : 테이블 이름
	* @param string $id : progress_project_id 
	*
	* @return object
	*/
	function get_progress_project_by_progress_project_id($table, $id) {
		$sql = "SELECT * FROM ".$table." WHERE progress_project_id = '".$id."' ";
		$query = $this->db->query($sql);

		$result = $query->row();
		return $result;
	}

    /**
     * delivery에서 프로젝트 참여 인원 불러오기
     */
    function getFundingUser($table='delivery', $projects_num) {
        $sql = "SELECT delivery_id, buyer_name, buyer_email,  buyer_tel, amount FROM ".$table." WHERE projects_num = '".$projects_num."' ";
        $query = $this->db->query($sql);

        $result = $query->result();
        return $result;
    }

    /**
     * funding user 상세보기 by buyer_email
     *
     * @param string $table
     * @param $email
     * @return mixed
     */
    function getFundingUserByEmail($table1 ="delivery", $table2, $email) {
        $sql = "
          SELECT delivery.merchant_uid, delivery.reward_amount, delivery.buyer_state, delivery.deliery_state, ".$table2.".project_img, ".$table2.".subject
          FROM ".$table1."
          JOIN ".$table2."
          WHERE buyer_email = '".$email."' AND delivery.projects_num=".$table2.".projects_num";

        $query = $this->db->query($sql);

        $result = $query->result();
        return $result;
    }

    /**
     * funding user 상세보기 by delivery ID
     *
     * @param string $table
     * @param $delivery_id
     * @return mixed
     */
    function getFundingUserDetail($table="delivery", $delivery_id) {
        $sql = "SELECT * FROM ".$table." WHERE delivery_id = '".$delivery_id."' ";
        $query = $this->db->query($sql);

        $result = $query->row();
        return $result;
    }



	/**
	* progress_project 입력
	* @param $array : table, projects_id, progress_subject, progress_contents, progress_youtube_url
	*
	* @return boolean 입력 성공 여부
	*/
	function insert_progress_project($arrays) {
		$insert_array = array (
			'projects_id'=>$arrays['projects_id'],
			'projects_num'=>$arrays['projects_num'],
			'progress_subject'=>$arrays['progress_subject'],
			'progress_contents'=>$arrays['progress_contents'],
			'progress_youtube_url'=>$arrays['progress_youtube_url']
			);
		//var_dump($insert_array);
		$result = $this->db->insert($arrays['table'], $insert_array);

		return $result;
	}

	/**
	* progress_project 수정
	* @param $array : table, projects_id, progress_subject, progress_contents, progress_youtube_url
	*
	* @return boolean 수정 성공 여부
	*/
	function modify_progress_project($arrays) {
		$modify_array = array(
			'projects_id'=>$arrays['projects_id'],
			'projects_num'=>$arrays['projects_num'],
			'progress_subject'=>$arrays['progress_subject'],
			'progress_contents'=>$arrays['progress_contents'],
			'progress_youtube_url'=>$arrays['progress_youtube_url']
			);

		$where = array (
			'progress_project_id'=>$arrays['progress_project_id']
			);

		$result = $this->db->update($arrays['table'], $modify_array, $where);

		return $result;
	}

	/**
	* progress_project 삭제 
	*
	* @param string $table 테이블 명
	* @param string $no reward 번호
	*
	* @return boolean 삭제 성공 여부
	*/
	function delete_progress_project($table, $no) {
		$delete_array = array(
			'progress_project_id'=>$no);

		$result = $this->db->delete($table, $delete_array);

		return $result;
	}


	/**
	* projects_num이 있는지 없는지를 확인
	*
	* @param string $table 테이블 명
	* @param string $no project_num
	*
	* @return object
	*/
	function confirm_project_num($table, $no) {
		$sql = "SELECT * FROM ".$table." WHERE projects_num='".$no."' ";
		$query = $this->db->query($sql);
		$result = $query->result();

		return $result;
	}

	/**
	* reward_num이 있는지 없는지를 확인
	*
	* @param string $table 테이블 명
	* @param string $reward_num reward 번호
	* @param string $projects_id projects 번호
	*
	* @return object
	*/
	function confirm_reward_num($table, $reward_num, $projects_id) {
		$sql = "SELECT * FROM ".$table." WHERE reward_num='".$reward_num."' AND projects_id='".$projects_id."' ";
		$query = $this->db->query($sql);
		$result = $query->result();

		return $result;
	}

	/**
	* 댓글 입력
	*
	* @param array $arrays table, projects_num, nickname, email, username, contents
	*
	* @return int
	*/
	function insert_comment($arrays) {
		$insert_array = array(
				'projects_num'=>$arrays['projects_num'],
				'nickname'=>$arrays['nickname'],
				'email'=>$arrays['email'],
				'username'=>$arrays['username'],
				'contents'=>$arrays['contents'],
				'reg_date'=>date("Y-m-d H:i:s")
			);

		$this->db->insert($arrays['table'], $insert_array);

		return $this->db->insert_id();
	}

	/**
	* 댓글 삭제
	*
	* @param string $table 테이블 명
	* @param string $id projects_comment_id
	*
	* @return boolean 삭제 성공 여부 
	*/
	function delete_comment($table, $id) {
		$delete_array = array(
			'projects_comment_id'=>$id);

		$result = $this->db->delete($table, $delete_array);

		return $result;
	}

	/**
	* 작성자 아이디 반환
	*
	* @param string $table 테이블 명
	* @param string $id projects_comment_id
	*
	* @return string 작성자 이메일 
	*/
	function writer_check($table, $id) {
		$sql = "SELECT email FROM ".$table." WHERE projects_comment_id = '".$id."' ";
		$query = $this->db->query($sql);

		return $query->row();
	}

    /**
     * 결제 내역 조회
     *
     * @param $merchant_uid
     * @return IamportResult|null
     */
	function checkPayment($merchant_uid) {
        if($merchant_uid != null) {
            $this->load->helper('iamport');
            $iamport = new Iamport('5660065249144037', 'iM67Jr5CWWTR6JG43GKuS7vOflI2WcXeY4mHvsksodkuW0z0Gkvys0nIm5KiiHxhMTYiljKKx5ft5OuM');

            $result = $iamport->findByMerchantUID($merchant_uid);

            if($result->success) {
                return $result;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    /**
     * 결제 내역 취소
     *
     * @param string $table
     * @param string $merchant_uid
     * @return boolean
     */
    function cancelDelivery($table, $merchant_uid) {

        $delete_array = array(
            'merchant_uid'=>$merchant_uid);

        $result = $this->db->delete($table, $delete_array);

        return $result;
    }

    /**
     * 결제가 되면 관련 프로젝트(한국)에 관해서 후원자 수 & 리워드 개수 & 총액의 증가해야 됨
     *
     * @param $table
     * @param $reward_amount
     * @param $projects_num
     * @param $reward_num
     *
     * @return bool
     */
    function increaseBackerRewardAmount_ko($table, $reward_amount, $projects_num, $reward_num) {
        $sql = "
                UPDATE ".$table." as pk
                    JOIN reward_ko as rk ON pk.projects_num = ".$projects_num."
                SET
                    pk.gather_amount = pk.gather_amount + ".$reward_amount."
                    , pk.funding_user_count = pk.funding_user_count + 1
                    , rk.count = rk.count - 1
                WHERE
                    rk.reward_num = ".$reward_num." and rk.projects_num = ".$projects_num."
            ";
        //echo $sql;
        $query = $this->db->query($sql);
        if($query) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 결제가 되면 관련 프로젝트(영어)에 관해서 후원자 수 & 리워드 개수 & 총액의 증가해야 됨
     *
     * @param $table
     * @param $reward_amount
     * @param $projects_num
     * @param $reward_num
     *
     * @return bool
     */
    function increaseBackerRewardAmount_en($table, $reward_amount, $projects_num, $reward_num) {
        $sql = "
                UPDATE ".$table." as pe
                    JOIN reward_en as re ON pe.projects_num = ".$projects_num."
                SET
                    pe.gather_amount = pe.gather_amount + ".$reward_amount."
                    , pe.funding_user_count = pe.funding_user_count + 1
                    , re.count = re.count - 1
                WHERE
                    re.reward_num = ".$reward_num." and re.projects_num = ".$projects_num."
            ";

        $query = $this->db->query($sql);
        if($query) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 결제가 되면 관련 프로젝트(중국)에 관해서 후원자 수 & 리워드 개수 & 총액의 증가해야 됨
     *
     * @param $table
     * @param $reward_amount
     * @param $projects_num
     * @param $reward_num
     *
     * @return bool
     */
    function increaseBackerRewardAmount_ch($table, $reward_amount, $projects_num, $reward_num) {
        $sql = "
                UPDATE ".$table." as pc
                    JOIN reward_ch as rc ON pc.projects_num = ".$projects_num."
                SET
                    pc.gather_amount = pc.gather_amount + ".$reward_amount."
                    , pc.funding_user_count = pc.funding_user_count + 1
                    , rc.count = rc.count - 1
                WHERE
                    rc.reward_num = ".$reward_num." and rc.projects_num = ".$projects_num."
            ";

        $query = $this->db->query($sql);
        if($query) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * projects_num과 reward_num의 값을 merchant_id에 의해 값 빼오기
     *
     * @param string $table delivery 테이블
     * @param string $merchant_uid 구매자 고유 아이디
     *
     * @return object
     */
    function projectsNumRewardNumByMerchantID($table, $merchant_uid) {
        $sql = "SELECT projects_num, reward_num, reward_amount FROM ".$table." WHERE merchant_uid = '".$merchant_uid."' ";
        $query = $this->db->query($sql);
        $result = $query->row();

        return $result;
    }

    /**
     * 후원 취소 성공 시 모인 금액 및 참여 사용자 수 감소
     *
     * @param int $projects_num
     * @param int $reward_amount
     * @return bool
     */
    function decreaseGatherAmountFundingUserCount($projects_num, $reward_amount) {
        $sql = "
            UPDATE
              projects_ko pk
            JOIN projects_en pe ON pk.projects_num = pe.projects_num
            JOIN projects_ch pc ON pk.projects_num = pc.projects_num
            SET
              pk.gather_amount = pk.gather_amount - ".$reward_amount.", pk.funding_user_count = pk.funding_user_count - 1, 
              pe.gather_amount = pe.gather_amount - ".$reward_amount.", pe.funding_user_count = pe.funding_user_count - 1,
              pc.gather_amount = pc.gather_amount - ".$reward_amount.", pc.funding_user_count = pc.funding_user_count - 1
            WHERE
              pk.projects_num = ".$projects_num."
        ";

        if($this->db->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 후원 취소 시 리워드 개수 증가
     *
     * @param int $projects_num
     * @param int $reward_num
     * @return bool
     */
    function decreaseRewardCount($projects_num, $reward_num) {

        $sql = "
            UPDATE 
              reward_ko rk
            JOIN reward_en re ON rk.reward_num = re.reward_num AND rk.projects_num = re.projects_num
            JOIN reward_ch rc ON rk.reward_num = rc.reward_num AND rk.projects_num = rc.projects_num
            SET
              rk.count = rk.count + 1, 
              re.count = re.count + 1, 
              rc.count = rc.count + 1
            WHERE
              rk.projects_num = ".$projects_num." AND rk.reward_num = ".$reward_num."
        ";

        if($this->db->query($sql)) {
            return true;
        } else {
            return false;
        }
    }
}

/*End of file projects_m.php */
/*Location : ./application/models/administration/project_m.php*/