<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends MY_Controller {

	function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('administration/project_m');
        $this->load->helper(array('url', 'date', 'form'));

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

	/**
	* 진행 상태 및 기간 계산
	*
	* @todo
	* 날짜 list에서 뿌려줄 때 갱신 되도록 손봐야 됨
	* 현재는 리스트 목록을 선택해야지 진행 상태가 갱신이 됨
	*
	*/
	function day_update() {

		$data['views'] = $this->project_m->get_project_detail($this->uri->segment(4), $this->uri->segment(6));
		
		$today = date("Y-m-d 00:00:00"); // 오늘 날짜
		$launch_date = $data['views']->launch_date;	// 시작 날짜
		$due_date = $data['views']->due_date; // 만료 날짜

		$period = intval((strtotime($due_date)-strtotime($today))/86400); // 남은 기간
		//$flag = intval((strtotime($today)-strtotime($launch_date))/86400); // 런칭 전 or 종료 or 시작
		
		if((strtotime($launch_date)<=strtotime($today))&&(strtotime($today)<=strtotime($due_date))) {
			//진행중
			$state = '1';
		} else if(strtotime($launch_date)>strtotime($today)) {
			//진행전
			$state = '2';
		} else {
			//종료
			$state = '0'; $period = '0';
		}
		

		$this->project_m->update_state_period($this->uri->segment(4), $state, $period, $this->uri->segment(6));
	}

	/**
	* write 할 때 진행 전, 진행 중, 종료 state 구분 
	*/
	function state_update($launch_date, $due_date) {
		$today = date("Y-m-d 00:00:00"); // 오늘 날짜
		if((strtotime($launch_date)<=strtotime($today))&&(strtotime($today)<=strtotime($due_date))) {
			//진행중
			return '1';
		} else if(strtotime($launch_date)>strtotime($today)) {
			//진행전
			return '2';
		} else {
			//종료
			return '0';
		}
	}

	/**
	* main page 불러오기
	*/
	public function main() {
		$this->output->enable_profiler(TRUE);
		$this->load->view('administration/main_v');
	}

	/**
	* 한국어 프로젝트 불러오기
	*/
	public function lists_ko() {
		$this->output->enable_profiler(TRUE);

		$search_word = $page_url = '';
		$uri_segment = 6;

		$uri_array = $this->segment_explode($this->uri->uri_string());

		if( in_array('q', $uri_array)) {
			$search_word = urldecode($this->url_explode($uri_array, 'q'));

			$page_url = '/q/'.$search_word;
			$uri_segment = 8;
		}
		//페이지네이션 라이브러리 로딩 추가
		$this->load->library('pagination');

		//페이지네이션 설정
		$config['base_url'] = '/index.php/administration/project/lists/projects_ko'.$page_url.'/page/';
		$config['total_rows'] = $this->project_m->get_projects($this->uri->segment(4), 'count', '', '', $search_word);
		$config['per_page'] = 5; 
		$config['uri_segment'] = $uri_segment;

		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();

		$page = $this->uri->segment($uri_segment, 1); // segment가 없으면 1로 초기화

		if( $page > 1) {
			$start = (($page/$config['per_page'])) * $config['per_page'];
		}
		else {
			$start = ($page-1) * $config['per_page'];
		}
		$limit = $config['per_page'];

		$data['projects_list_ko'] = $this->project_m->get_projects_ko($this->uri->segment(4), '', $start, $limit, $search_word);	
		$this->load->view('administration/list_ko_v', $data);
	}

	/**
	* 영어 프로젝트 불러오기
	*/
	public function lists_en() {
		$this->output->enable_profiler(TRUE);

		$search_word = $page_url = '';
		$uri_segment = 6;

		$uri_array = $this->segment_explode($this->uri->uri_string());

		if( in_array('q', $uri_array)) {
			$search_word = urldecode($this->url_explode($uri_array, 'q'));

			$page_url = '/q/'.$search_word;
			$uri_segment = 8;
		}
		//페이지네이션 라이브러리 로딩 추가
		$this->load->library('pagination');

		//페이지네이션 설정
		$config['base_url'] = '/index.php/administration/project/lists/projects_en'.$page_url.'/page/';
		$config['total_rows'] = $this->project_m->get_projects($this->uri->segment(4), 'count', '', '', $search_word);
		$config['per_page'] = 5; 
		$config['uri_segment'] = $uri_segment;

		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();

		$page = $this->uri->segment($uri_segment, 1); // segment가 없으면 1로 초기화

		if( $page > 1) {
			$start = (($page/$config['per_page'])) * $config['per_page'];
		}
		else {
			$start = ($page-1) * $config['per_page'];
		}
		$limit = $config['per_page'];

		$data['projects_list_en'] = $this->project_m->get_projects_en($this->uri->segment(4), '', $start, $limit, $search_word);	
		$this->load->view('administration/list_en_v', $data);
	}

	/**
	* 중국어 프로젝트 불러오기
	*/
	public function lists_ch() {
		$this->output->enable_profiler(TRUE);

		$search_word = $page_url = '';
		$uri_segment = 6;

		$uri_array = $this->segment_explode($this->uri->uri_string());

		if( in_array('q', $uri_array)) {
			$search_word = urldecode($this->url_explode($uri_array, 'q'));

			$page_url = '/q/'.$search_word;
			$uri_segment = 8;
		}
		//페이지네이션 라이브러리 로딩 추가
		$this->load->library('pagination');

		//페이지네이션 설정
		$config['base_url'] = '/index.php/administration/project/lists/projects_ch'.$page_url.'/page/';
		$config['total_rows'] = $this->project_m->get_projects($this->uri->segment(4), 'count', '', '', $search_word);
		$config['per_page'] = 5; 
		$config['uri_segment'] = $uri_segment;

		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();

		$page = $this->uri->segment($uri_segment, 1); // segment가 없으면 1로 초기화

		if( $page > 1) {
			$start = (($page/$config['per_page'])) * $config['per_page'];
		}
		else {
			$start = ($page-1) * $config['per_page'];
		}
		$limit = $config['per_page'];

		$data['projects_list_ch'] = $this->project_m->get_projects_ch($this->uri->segment(4), '', $start, $limit, $search_word);	
		$this->load->view('administration/list_ch_v', $data);
	}

	/**
	* project 상세 보기
	*/
	function view() {
		$this->output->enable_profiler(TRUE);
		$this->load->helper('alert');

		$this->day_update();

		if($this->uri->segment(4) == "projects_ko") {
			$reward = "reward_ko"; $progress_project = "progress_project_ko";
		} else if($this->uri->segment(4) == "projects_en") {
			$reward = "reward_en"; $progress_project = "progress_project_en";
		} else if($this->uri->segment(4) == "projects_ch") {
			$reward = "reward_ch"; $progress_project = "progress_project_ch";
		}

		$data['projects_views'] = $this->project_m->get_project_detail($this->uri->segment(4), $this->uri->segment(6));
		$data['reward_views'] = $this->project_m->get_rewards($reward, $this->uri->segment(6));
		$data['progress_views'] = $this->project_m->get_progress_project($progress_project, $this->uri->segment(6));
        $data['fundingUser_views'] = $this->project_m->getFundingUser('delivery', $data['projects_views']->projects_num);

		//var_dump($data['reward_views']);
		if(($data['projects_views'] != NULL) || ($data['reward_views'] != NULL) || ($data['progress_views'] != NULL) || ($data['fundingUser_views'] != NULL)) {
			$this->load->view('administration/view_v', $data);
		} else {
			alert('정보를 불러오는데 실패하였습니다.', '/index.php/administration/project/lists/'.$this->uri->segment(4));
		}
	}

	/**
	* project 쓰기
	*/
	function write() {
        $url = "http://52.78.64.172";

		$this->load->library('form_validation');

		$this->form_validation->set_rules('subject', '제목', 'required');
		$this->form_validation->set_rules('contents', '내용', 'required');
		$this->form_validation->set_rules('projects_num', '프로젝트 번호', 'required');
		$this->form_validation->set_rules('summary', '프로젝트 한 줄 요약', 'required');
		$this->form_validation->set_rules('target_amount', '목표 금액', 'required');
		$this->form_validation->set_rules('launch_date', '런칭 날짜', 'required');
		$this->form_validation->set_rules('due_date', '종료 날짜', 'required');
		$this->form_validation->set_rules('youtube_url', '유튜브 주소', 'required');

		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';

		if(($this->form_validation->run() == TRUE)) {
			//글쓰기 POST전송 시

			//경고창 헬퍼 로딩
			$this->load->helper('alert');

			$config['upload_path'] = './static/img';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['remove_spaces'] = TRUE;
			$config['max_size'] = '0';
			$config['max_width']  = '0';
			$config['max_height']  = '0';
			
			$this->load->library('upload', $config);

			//youtube 사진 업로드
			if(!$this->upload->do_upload("youtube_img")) {
				echo $this->upload->display_errors();
			} else {
				$data1 = array("youtube_img"=>$this->upload->data());
				var_dump($data1);
			}

			//project 사진 업로드
			if(!$this->upload->do_upload("project_img")) {
				echo $this->upload->display_errors();
			} else {
				$data2 = array("project_img"=>$this->upload->data());
				var_dump($data2);
			}

			//주소 중에서 page세그먼트가 있는지 검사하기 위해 주소를 배열로 변화
			$uri_array = $this->segment_explode($this->uri->uri_string());

			if(in_array('page', $uri_array)) {
				$pages = urldecode($this->url_explode($uri_array, 'page'));
			} else {
				$pages = 1;
			}

			$state = $this->state_update($this->input->post('launch_date', TRUE), $this->input->post('due_date', TRUE));
			$today = date("Y-m-d 00:00:00");
			$due_date = $this->input->post('due_date', TRUE);

			$write_data = array(
					'table'=>$this->uri->segment(4),
					'subject'=>$this->input->post('subject', TRUE),
					'nation'=>$this->input->post('nation', TRUE),
					'projects_num'=>$this->input->post('projects_num', TRUE),
					'summary'=>$this->input->post('summary', TRUE),
					'target_amount'=>$this->input->post('target_amount', TRUE),
					'launch_date'=>$this->input->post('launch_date', TRUE)." 00:00:00",
					'due_date'=>$this->input->post('due_date', TRUE)." 00:00:00",
					'youtube_url'=>$this->input->post('youtube_url', TRUE),
					'period'=>intval((strtotime($due_date)-strtotime($today))/86400),
					'contents'=>$this->input->post('contents', TRUE),
					'youtube_img'=>$url."/static/img/".$data1['youtube_img']['file_name'],
					'project_img'=>$url."/static/img/".$data2['project_img']['file_name'],
					'state'=>$state
					);

			$result = $this->project_m->insert_project($write_data);

			// 스무스한 흐름을 위해!
			if($this->uri->segment(4)=="projects_ko") { 
				$segment = "lists_ko"; 
			} else if($this->uri->segment(4)=="projects_en") { 
				$segment = "lists_en"; 
			} else { 
				$segment = "lists_ch"; 
			}

			if($result) {
				alert('입력되었습니다.', '/index.php/administration/project/'.$segment.'/'.$this->uri->segment(4).'/page/'.$pages);
				exit;
			} else {
				alert('다시 입력해주세요.', '/index.php/administration/project/'.$segment.'/'.$this->uri->segment(4).'/page/'.$pages);
				exit;
			}
		} else {
			$this->load->view('administration/write_v');
		}
	}

	/**
	* project 수정
	*/
	function modify() {

		$this->load->library('form_validation');

        $url = "http://52.78.64.172";
		$data['views'] = $this->project_m->get_project_detail($this->uri->segment(4), $this->uri->segment(6));

		$this->form_validation->set_rules('subject', '제목', 'required');
		$this->form_validation->set_rules('contents', '내용', 'required');
		$this->form_validation->set_rules('projects_num', '프로젝트 번호', 'required');
		$this->form_validation->set_rules('summary', '프로젝트 한 줄 요약', 'required');
		$this->form_validation->set_rules('target_amount', '목표 금액', 'required');
		$this->form_validation->set_rules('launch_date', '런칭 날짜', 'required');
		$this->form_validation->set_rules('due_date', '종료 날짜', 'required');
		$this->form_validation->set_rules('youtube_url', '유튜브 주소', 'required');

		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';

		if($this->form_validation->run() == TRUE) {
			// 글 수정 POST 전송시
			$this->load->helper('alert');

			//사진 url config setting
			$config['upload_path'] = './static/img';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['remove_spaces'] = TRUE;
			$config['max_size'] = '0';
			$config['max_width']  = '0';
			$config['max_height']  = '0';

			$this->load->library('upload', $config);

			//주소 중에서 page세그먼트가 있는지 검사하기 위해 주소를 배열로 변화
			$uri_array = $this->segment_explode($this->uri->uri_string());

			if(in_array('page', $uri_array)) {
				$pages = urldecode($this->url_explode($uri_array, 'page'));
			} else {
				$pages = 1;
			}

			$state = $this->state_update($this->input->post('launch_date', TRUE), $this->input->post('due_date', TRUE));
			$today = date("Y-m-d 00:00:00");
			$due_date = $this->input->post('due_date', TRUE);

			echo "youtube_val: <br>";
			var_dump($this->input->post('youtube_val', TRUE));
			echo "<br>";
			echo "project_val: <br>";
			var_dump($this->input->post('project_val', TRUE));


			/**
			* @todo: 개선해야될 점
			* 수정을 하였을 때 파일 변한게 없다면 원래 url을 저장하고 변한게 있다면
			* 변한 이미지의 url을 setting할 필요가 있음
			* 방법을 잘 몰라서 하드코딩으로 진행 함
			* youtube_val, project_val의 값이 0이면 변경하지 않았다는 것
			*
			* 추가적으로 변경 된 사진 파일을 지우는 작업도 추가해야 됨 
			*/
			if(($this->input->post('youtube_val', TRUE)=="0")&&($this->input->post('project_val', TRUE)=="0")) {
				//youtube_val, project_val 둘다 변경이 되지 않는 경우
				$youtube_img = $this->input->post('youtube_img_val');
				$project_img = $this->input->post('project_img_val');

			} else if(($this->input->post('youtube_val', TRUE)!="0")&&($this->input->post('project_val', TRUE)=="0")) {
				//youtube_val만 변경 && project_val은 변경 안되는 경우
				
				if(!$this->upload->do_upload("youtube_img")) {
					alert_only('youtube 대표 이미지 변경에 실패했습니다.'.$this->upload->display_errors());
					exit;
				} else {
					$data_you = array("youtube_img"=>$this->upload->data());
				}

				$youtube_img = $url."/static/img/".$data_you['youtube_img']['file_name'];

				$project_img = $this->input->post('project_img_val');

			} else if(($this->input->post('youtube_val', TRUE)=="0")&&($this->input->post('project_val', TRUE)!="0")) {
				//youtube_val 변경 안됨 && project_val 변경
				$youtube_img = $this->input->post('youtube_img_val');

				if(!$this->upload->do_upload("project_img")) {
					alert_only('project 대표 이미지 변경에 실패했습니다.'.$this->upload->display_errors());
					exit;
				} else {
					$data_pro = array("project_img"=>$this->upload->data());
				}
				$project_img = $url."/static/img/".$data_pro['project_img']['file_name'];

			} else if(($this->input->post('youtube_val', TRUE)!="0")&&($this->input->post('project_val', TRUE))!="0") {
				//youtube_val && project_val 두 개가 변경된 경우

				//youtube_img url 변경
				if(!$this->upload->do_upload("youtube_img")) {
					alert_only('youtube 대표 이미지 변경에 실패했습니다.');
					//echo '<script>alert("gkgks");</script>';
					echo $this->upload->display_errors();
					exit;
				} else {
					$data_you = array("youtube_img"=>$this->upload->data());
				}
				$youtube_img = $url."/static/img/".$data_you['youtube_img']['file_name'];

				//project_img url 변경
				if(!$this->upload->do_upload("project_img")) {
					alert_only('project 대표 이미지 변경에 실패했습니다.'.$this->upload->display_errors());
					exit;
				} else {
					$data_pro = array("project_img"=>$this->upload->data());
				}
				$project_img = $url."/static/img/".$data_pro['project_img']['file_name'];
			}

			$write_data = array(
				'table'=>$this->uri->segment(4), 
				'projects_id'=>$this->uri->segment(6),
				'subject'=>$this->input->post('subject', TRUE),
				'nation'=>$this->input->post('nation', TRUE),
				'projects_num'=>$this->input->post('projects_num', TRUE),
				'summary'=>$this->input->post('summary', TRUE),
				'target_amount'=>$this->input->post('target_amount', TRUE),
				'launch_date'=>$this->input->post('launch_date', TRUE)." 00:00:00",
				'due_date'=>$this->input->post('due_date', TRUE)." 00:00:00",
				'youtube_url'=>$this->input->post('youtube_url', TRUE),
				'period'=>intval((strtotime($due_date)-strtotime($today))/86400),
				'contents'=>$this->input->post('contents', TRUE),
				'youtube_img'=>$youtube_img,
				'project_img'=>$project_img,
				'state'=>$state
				);

			$result = $this->project_m->modify_project($write_data);

			// var_dump($write_data);
			// echo "<br>";
			// var_dump($result);

			if($result) {
				alert('수정되었습니다.', '/index.php/administration/project/view/'.$this->uri->segment(4).'/page/'.$pages);
				exit;
			} else {
				alert('다시 수정해주세요.', '/index.php/administration/project/view/'.$this->uri->segment(4).'/page/'.$pages);
				exit;
			}


		} else {
			$this->load->view('administration/modify_v', $data);
		}
	}

	/**
	* project 삭제
	*/
	function delete() {
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';

		$this->load->helper('alert');

		$return = $this->project_m->delete_project($this->uri->segment(4), $this->uri->segment(6));

		if($return) {
			alert('삭제되었습니다.', '/index.php/administration/project/lists_ko/'.$this->uri->segment(4).'/page/'.$this->uri->segment(8));
			exit;
		} else {
			alert('삭제를 실패 하였습니다.', '/index.php/administration/project/lists/'.$this->uri->segment(4).'/page/'.$this->uri->segment(8));
			exit;
		}
	}

	/**
	* reward 쓰기
	*/
	function reward_write() {
		$this->load->library('form_validation');

		$this->form_validation->set_rules('reward_amount', '리워드 금액', 'required');
		$this->form_validation->set_rules('reward_num', '리워드 번호', 'required');
		$this->form_validation->set_rules('reward_subject', '리워드 제목', 'required');
		$this->form_validation->set_rules('count', '수량', 'required');
		$this->form_validation->set_rules('reward_contents', '리워드 내용', 'required');

		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';

		if($this->form_validation->run() == TRUE) {
			//글쓰기 POST전송 시

			//경고창 헬퍼 로딩
			$this->load->helper('alert');

			//주소 중에서 page세그먼트가 있는지 검사하기 위해 주소를 배열로 변화
			$uri_array = $this->segment_explode($this->uri->uri_string());

			if(in_array('page', $uri_array)) {
				$pages = urldecode($this->url_explode($uri_array, 'page'));
			} else {
				$pages = 1;
			}

			if($this->uri->segment(4) == "reward_ko") {
				$table = "projects_ko";
			} else if($this->uri->segment(4) == "reward_en") {
				$table = "projects_en";
			} else {
				$table = "projects_ch";
			}

			$data['projects_views'] = $this->project_m->get_num_by_pi($table, $this->uri->segment(6));

			var_dump($data);
			echo $data['projects_views']->projects_num;

			$write_data = array(
					'table'=>$this->uri->segment(4),
					'projects_id'=>$this->uri->segment(6),
					'projects_num'=>$data['projects_views']->projects_num,
					'reward_num'=>$this->input->post('reward_num', TRUE),
					'reward_amount'=>$this->input->post('reward_amount', TRUE),
					'reward_subject'=>$this->input->post('reward_subject', TRUE),
					'count'=>$this->input->post('count', TRUE),
					'reward_contents'=>$this->input->post('reward_contents', TRUE)
				);

			$result = $this->project_m->insert_reward($write_data);

			

			if($result) {
				alert('입력되었습니다.', '/index.php/administration/project/view/'.$table.'/projects_id/'.$this->uri->segment(6).'/page/'.$pages);
				exit;
			} else {
				alert('다시 입력해주세요.', '/index.php/administration/project/view/'.$table.'/projects_id/'.$this->uri->segment(6).'/page/'.$pages);
				exit;
			}

		} else {
			$this->load->view('administration/reward_write_v');
		}
	}

	/**
	* reward 수정
	*/
	function reward_modify() {
		$this->load->library('form_validation');

		$this->form_validation->set_rules('reward_amount', '리워드 금액', 'required');
		$this->form_validation->set_rules('reward_subject', '리워드 제목', 'required');
		$this->form_validation->set_rules('reward_num', '리워드 번호', 'required');
		$this->form_validation->set_rules('count', '수량', 'required');
		$this->form_validation->set_rules('state', '참여 여부', 'required');
		$this->form_validation->set_rules('reward_contents', '리워드 내용', 'required');

		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';

		if($this->form_validation->run() == TRUE) {
			//글쓰기 POST전송 시

			//경고창 헬퍼 로딩
			$this->load->helper('alert');

			//주소 중에서 page세그먼트가 있는지 검사하기 위해 주소를 배열로 변화
			$uri_array = $this->segment_explode($this->uri->uri_string());

			if(in_array('page', $uri_array)) {
				$pages = urldecode($this->url_explode($uri_array, 'page'));
			} else {
				$pages = 1;
			}

			if($this->uri->segment(4) == "reward_ko") {
				$table = "projects_ko";
			} else if($this->uri->segment(4) == "reward_en") {
				$table = "projects_en";
			} else {
				$table = "projects_ch";
			}

			$data['projects_views'] = $this->project_m->get_num_by_pi($table, $this->uri->segment(6));

			$write_data = array(
					'table'=>$this->uri->segment(4),
					'reward_id'=>$this->uri->segment(8),
					'projects_id'=>$this->uri->segment(6),
					'projects_num'=>$data['projects_views']->projects_num,
					'reward_num'=>$this->input->post('reward_num', TRUE),
					'reward_amount'=>$this->input->post('reward_amount', TRUE),
					'reward_subject'=>$this->input->post('reward_subject', TRUE),
					'count'=>$this->input->post('count', TRUE),
					'state'=>$this->input->post('state', TRUE),
					'reward_contents'=>$this->input->post('reward_contents', TRUE)
				);

			//var_dump($write_data);
			$result = $this->project_m->modify_reward($write_data);

			

			if($result) {
				alert('수정되었습니다.', '/index.php/administration/project/view/'.$table.'/projects_id/'.$this->uri->segment(6).'/page/'.$pages);
				exit;
			} else {
				alert('수정에 실패했습니다.', '/index.php/administration/project/view/'.$table.'/projects_id/'.$this->uri->segment(6).'/page/'.$pages);
				exit;
			}

		} else {

			$data['reward_views'] = $this->project_m->get_rewards_by_reward_id($this->uri->segment(4), $this->uri->segment(8));
			//var_dump($data['reward_views']);
			
			$this->load->view('administration/reward_modify_v', $data);
		}
	}

	/**
	* reward 삭제
	*/
	function reward_delete() {
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';

		$this->load->helper('alert');

		if($this->uri->segment(4) == "reward_ko") {
			$table = "projects_ko";
		} else if($this->uri->segment(4) == "reward_en") {
			$table = "projects_en";
		} else {
			$table = "projects_ch";
		}

		$return = $this->project_m->delete_reward($this->uri->segment(4), $this->uri->segment(8));

		if($return) {
			alert('삭제되었습니다.', '/index.php/administration/project/view/'.$table.'/projects_id/'.$this->uri->segment(6).'/page/'.$this->uri->segment(8));
			exit;
		} else {
			alert('삭제를 실패 하였습니다.', '/index.php/administration/project/view/'.$table.'/projects_id'.$this->uri->segment(6).'/page/'.$this->uri->segment(8));
			exit;
		}
	}

	/**
	* progress project 쓰기
	*/
	function progress_project_write() {
		
		$this->load->library('form_validation');

		$this->form_validation->set_rules('progress_subject', '진행 프로젝트 제목', 'required');
		$this->form_validation->set_rules('progress_contents', '진행 프로젝트 내용', 'required');
		//$this->form_validation->set_rules('progress_youtube_url', '진행 프로젝트 영상 URL', 'required');

		
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';	

		if($this->form_validation->run() == TRUE) {
			//경고창 헬퍼 로딩
			$this->load->helper('alert');

			//주소 중에서 page세그먼트가 있는지 검사하기 위해 주소를 배열로 변화
			$uri_array = $this->segment_explode($this->uri->uri_string());

			if(in_array('page', $uri_array)) {
				$pages = urldecode($this->url_explode($uri_array, 'page'));
			} else {
				$pages = 1;
			}

			if($this->uri->segment(4) == "progress_project_ko") {
				$table = "projects_ko";
			} else if($this->uri->segment(4) == "progress_project_en") {
				$table = "projects_en";
			} else {
				$table = "projects_ch";
			}

			$data['progress_project_views'] = $this->project_m->get_num_by_pi($table, $this->uri->segment(6));

			$write_data = array (
					'table'=>$this->uri->segment(4),
					'projects_id'=>$this->uri->segment(6),
					'projects_num'=>$data['progress_project_views']->projects_num,
					'progress_subject'=>$this->input->post('progress_subject', TRUE),
					'progress_contents'=>$this->input->post('progress_contents', TRUE),
					'progress_youtube_url'=>$this->input->post('progress_youtube_url', TRUE)		
				);

			//var_dump($write_data);
			$result = $this->project_m->insert_progress_project($write_data);

			

			if($result) {
				alert('입력되었습니다.', '/index.php/administration/project/view/'.$table.'/projects_id/'.$this->uri->segment(6).'/page/'.$pages);
				exit;
			} else {
				alert('다시 입력해주세요.', '/index.php/administration/project/view/'.$table.'/projects_id/'.$this->uri->segment(6).'/page/'.$pages);
				exit;
			}
		
		} else {
			$this->load->view('administration/progress_project_write_v');
		}
	}

	/**
	* progress_project 수정
	*/
	function progress_project_modify() {
		$this->load->library('form_validation');

		$this->form_validation->set_rules('progress_subject', '진행 프로젝트 제목', 'required');
		$this->form_validation->set_rules('progress_contents', '진행 프로젝트 내용', 'required');
		//$this->form_validation->set_rules('progress_youtube_url', '진행 프로젝트 영상 URL', 'required');

		
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';	

		if($this->form_validation->run() == TRUE) {
			//경고창 헬퍼 로딩
			$this->load->helper('alert');

			//주소 중에서 page세그먼트가 있는지 검사하기 위해 주소를 배열로 변화
			$uri_array = $this->segment_explode($this->uri->uri_string());

			if(in_array('page', $uri_array)) {
				$pages = urldecode($this->url_explode($uri_array, 'page'));
			} else {
				$pages = 1;
			}
            if($this->uri->segment(4) == "progress_project_ko") {
                $table = "projects_ko";
            } else if($this->uri->segment(4) == "progress_project_en") {
                $table = "projects_en";
            } else {
                $table = "projects_ch";
            }

            $data['progress_project_views'] = $this->project_m->get_num_by_pi($table, $this->uri->segment(6));


            $write_data = array (
					'table'=>$this->uri->segment(4),
					'projects_id'=>$this->uri->segment(6),
                    'projects_num'=>$data['progress_project_views']->projects_num,
                    'progress_project_id'=>$this->uri->segment(8),
					'progress_subject'=>$this->input->post('progress_subject', TRUE),
					'progress_contents'=>$this->input->post('progress_contents', TRUE),
					'progress_youtube_url'=>$this->input->post('progress_youtube_url', TRUE)		
				);

			//var_dump($write_data);
			$result = $this->project_m->modify_progress_project($write_data);

			if($this->uri->segment(4) == "progress_project_ko") {
				$table = "projects_ko";
			} else if($this->uri->segment(4) == "progress_project_en") {
				$table = "projects_en";
			} else {
				$table = "projects_ch";
			}

			if($result) {
				alert('수정되었습니다.', '/index.php/administration/project/view/'.$table.'/projects_id/'.$this->uri->segment(6).'/page/'.$pages);
				exit;
			} else {
				alert('다시 입력해주세요.', '/index.php/administration/project/view/'.$table.'/projects_id/'.$this->uri->segment(6).'/page/'.$pages);
				exit;
			}
		
		} else {
			$data['progress_views'] = $this->project_m->get_progress_project_by_progress_project_id($this->uri->segment(4), $this->uri->segment(8));
			$this->load->view('administration/progress_project_modify_v', $data);
		}
	}
	
	/**
	* progress_project 삭제
	*/
	function progress_project_delete() {
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';

		$this->load->helper('alert');

		$return = $this->project_m->delete_progress_project($this->uri->segment(4), $this->uri->segment(8));

		if($this->uri->segment(4) == "progress_project_ko") {
			$table = "projects_ko";
		} else if($this->uri->segment(4) == "progress_project_en") {
			$table = "projects_en";
		} else {
			$table = "projects_ch";
		}

		if($return) {
			alert('삭제되었습니다.', '/index.php/administration/project/view/'.$table.'/projects_id/'.$this->uri->segment(6).'/page/'.$this->uri->segment(8));
			exit;
		} else {
			alert('삭제를 실패 하였습니다.', '/index.php/administration/project/view/'.$table.'/projects_id'.$this->uri->segment(6).'/page/'.$this->uri->segment(8));
			exit;
		}
	}

    /**
     * fundingUser 상세보기
     */
    function fundingUserDetail() {

        echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';

        $this->load->helper('alert');

        $data['fundingUser_views'] = $this->project_m->getFundingUserDetail('delivery', $this->uri->segment(6));
        $data['reward_views'] = $this->project_m->getRewardByPNRN('reward_ko', $data['fundingUser_views']->projects_num, $data['fundingUser_views']->reward_num);
        $data['projects_views'] = $this->project_m->get_projects_ko_by_user('projects_ko', $data['fundingUser_views']->projects_num);
        $data['checkPayment_views'] = $this->project_m->checkPayment($data['fundingUser_views']->merchant_uid);

        if($data != NULL){
           $this->load->view('administration/fundingUserDetail_v', $data);

        } else {
            alert('정보를 읽는데 실패했습니다.', '/index.php/administration/project/view/'.$this->uri->segment(4).'/projects_id/'.$this->input->get('projects_id', TRUE).'/page/'.$this->input->get('page', TRUE));
        }

    }

	/**
	 * 이미지 업로드 function
	 */
	function upload_receive() {
		$config['upload_path'] = './static/img';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '0';
		$config['max_width']  = '0';
		$config['max_height']  = '0';
		
		$this->load->library('upload', $config);
	
		if (!$this->upload->do_upload('upload')) {
			echo "<script>alert('업로드에 실패했습니다.". $this->upload->display_errors('','')."')</script>";

		} else 	{
			$CKEditorFuncNum = $this->input->get('CKEditorFuncNum');

			$data = $this->upload->data();
			$filename = $data['file_name'];

			$url = '/static/img/'.$filename;

			echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction('".$CKEditorFuncNum."', '".$url."', '전송에 성공 했습니다.')</script>";
		}
	}

    function upload_form() {
        $config['upload_path'] = './static/img';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '0';
        $config['max_width']  = '0';
        $config['max_height']  = '0';

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload("youtube_img")) {
            echo $this->upload->display_errors();
        } else {
            $data = array("upload_data"=>$this->upload->data());
            echo "성공";
            var_dump($data);
        }
    }
}