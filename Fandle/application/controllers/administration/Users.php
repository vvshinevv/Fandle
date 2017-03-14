<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {
	
	function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('administration/users_m');
        $this->load->model('administration/project_m');
        $this->load->helper('form');
        $this->load->helper(array('url', 'date'));
    }

    public function index() {
    	$this->lists();
    }

    public function _remap($method) {
		$this->load->view('administration/header_v');

		if(method_exists($this, $method)) {
			$this->{"{$method}"}();
		}

		$this->load->view('administration/footer_v');
	}

	public function lists_user() {
		$this->output->enable_profiler(TRUE);

		$search_word = $page_url = '';
		$uri_segment = 6;

		$uri_array = $this->segment_explode($this->uri->uri_string());

		if( in_array('q', $uri_array)) {
			$search_word = urldecode($this->url_explode($uri_array, 'q'));

			$page_url = '/q/'.$search_word;
			$uri_segment = 8;
		}

		$this->load->library('pagination');

		//페이지네이션 설정
		$config['base_url'] = '/index.php/administration/users/lists_user/user'.$page_url.'/page/';
		$config['total_rows'] = $this->users_m->get_users($this->uri->segment(4), 'count', '', '', $search_word);
		$config['per_page'] = 5; 
		$config['uri_segment'] = $uri_segment;

		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		
		$page = $this->uri->segment($uri_segment, 1); 
		
		if( $page > 1) {
			$start = (($page/$config['per_page'])) * $config['per_page'];
		}
		else {
			$start = ($page-1) * $config['per_page'];
		}
		$limit = $config['per_page'];

		$data['user_lists'] = $this->users_m->get_users($this->uri->segment(4), '', $start, $limit, $search_word);
		$this->load->view('administration/list_user_v', $data);
	}

	/**
	* 회원 세부 사항
	*/
	public function user_detail() {
		$this->output->enable_profiler(TRUE);

		$data['funding_user_views'] = $this->users_m->get_funding_user_by_user('delivery', $this->uri->segment(6));

		if($data['funding_user_views'] != NULL ) {
			$data['reward_views'] = $this->project_m->get_reward_by_user($data['funding_user_views']->projects_num, $data['funding_user_views']->reward_num); // 리워드 정보 가져오기
			$data['projects_views'] = $this->project_m->get_projects_ko_by_user('projects_ko', $data['funding_user_views']->projects_num); // 프로젝트 정보 가져오기
			$data['delivery_views'] = $this->users_m->get_delivery_by_user('delivery', $this->uri->segment(6)); // 배송 정보 가져오기
		}
		
		$data['user_views'] = $this->users_m->get_user_detail($this->uri->segment(4), $this->uri->segment(6));
		

		if($data['user_views'] != NULL) {
			$this->load->view('administration/view_user_v', $data);
		} else {
			alert('정보를 불러오는데 실패하였습니다.', '/index.php/administration/users/lists_user/'.$this->uri->segment(4));
		}
	}

	/**
	* 휴면 고객 리스트
	*/
	public function lists_dormancy() {
		$this->load->view('administration/list_dormancy_v');
	}

	/**
	* 탈퇴 회원 리스트
	*/
	public function lists_withdrawal() {
		$this->load->view('administration/list_withdrawal_v');
	}
}