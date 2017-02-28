<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Path extends MY_Controller {

	function __construct() {
        parent::__construct();
        $this->load->database(); //DB Load
        $this->load->model('administration/project_m');
        $this->load->helper(array('url', 'date', 'form', 'alert', 'sweetalert'));

        if($this->uri->segment(3) == 'projects_ko' || $this->uri->segment(3) == 'ko' || $this->uri->segment(3) == '') {
            $this->lang->load('translate', 'korean');
        } else if($this->uri->segment(3) == 'projects_en' || $this->uri->segment(3) == 'en') {
            $this->lang->load('translate', 'english');
        } else {
            $this->lang->load('translate', 'china');
        }
    }

    /**
    * main
    */
	public function index() {
		$this->_head();
		if($this->uri->segment(3) == 'ko' || $this->uri->segment(3) == '') {
			$data['projects_views'] = $this->project_m->get_projects('projects_ko', 'users', 1, 8, '');
			$data['main_project_views'] = $this->project_m->get_main_project('projects_ko');
            $this->load->view('app/main_v', $data);
		} else if($this->uri->segment(3) == 'en') {
			$data['projects_views'] = $this->project_m->get_projects('projects_en', 'users', 1, 8, '');
			$data['main_project_views'] = $this->project_m->get_main_project('projects_en');
			$this->load->view('app/main_v', $data);
		} else {
			$data['projects_views'] = $this->project_m->get_projects('projects_ch', 'users', 1, 8, '');
			$data['main_project_views'] = $this->project_m->get_main_project('projects_ch');
			$this->load->view('app/main_v', $data);
		}
		$this->_footer();
	}

	/**
	* 폐지될 메인 페이지
	*/
	public function main() {
		$this->load->view('head');
		$this->load->view('main');
		$this->load->view('footer');
	}

	/**
	* 관리자 페이지 이동 전 인증
	*/
	function admin() {
		$this->load->helper('alert');
		$this->load->helper('url');
		$this->load->library('form_validation');	

		$this->form_validation->set_rules('administor_id', '관리자 아이디', 'trim|required');
		$this->form_validation->set_rules('password', '비밀번호', 'trim|required');

		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';

		if($this->form_validation->run() == TRUE) {
			$this->load->model('administration/admin_m');

			$admin_login = array( 
					'administor_id'=>$this->input->post('administor_id', TRUE),
					'password'=>$this->input->post('password', TRUE),
				);

			$result = $this->admin_m->admin_login($admin_login);

			if($result) {
				$newdata = array(
						'administor_id'=>$result->administor_id,
						'administor_name'=>$result->administor_name,
						'admin_login'=>TRUE
					);

				$this->session->set_userdata($newdata);
				alert('인증 되었습니다.', '/index.php/administration/project/main');
				exit;
			} else {
				alert('인증 실패하였습니다.',  '/index.php/path/admin');
				exit;
			}
		} else {
			//단독
			$this->load->view('administration/admin_v');
		}
	}

    /**
     * 비밀번호 리셋
     */
	function resetPassword() {
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		$email = $this->input->get('email', TRUE);
		if($email != '') {
			if($_POST) {
				$email = $this->input->post('email', TRUE);
				$password = $this->input->post('password', TRUE);
				$table = $this->input->post('table', TRUE);
			} else {	
				$this->load->view('app/resetPassword_v');
			}
		} else {
			alert($this->lang->line('wrongAccess'), '/index.php/auth/findPassword');
		}
	}

	/**
	* 관리자 로그아웃
	*/
	function admin_logout() {
		$this->session->sess_destroy();
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
		alert('로그아웃 되었습니다.', '/index.php/path/admin');
		exit;
	}

	/**
	* project controller
	* Fandle 프로젝트 모음집
	*/
	function project() {
		$this->_head();

		/**
		* @todo : 추후에 페이지 네이션을 해야됨(팀원 간 개수를 정해서 작업 들어갈 것)
		*/
		if($this->uri->segment(3) == 'ko' || $this->uri->segment(3) == '') {
			$data['projects_views'] = $this->project_m->get_projects('projects_ko', 'users', '', '', '');
			$data['main_project_views'] = $this->project_m->get_main_project('projects_ko');
			$this->load->view('app/project_v', $data);
		} else if($this->uri->segment(3) == 'en') {
			$data['projects_views'] = $this->project_m->get_projects('projects_en', 'users', '', '', '');
			$data['main_project_views'] = $this->project_m->get_main_project('projects_en');
			$this->load->view('app/project_v', $data);
		} else {
			$data['projects_views'] = $this->project_m->get_projects('projects_ch', 'users', '', '', '');
			$data['main_project_views'] = $this->project_m->get_main_project('projects_ch');
			$this->load->view('app/project_v', $data);
		}

		$this->_footer();
	}

	/** 
	* about_us controller
	* Fandle 에 대한 소개 페이지
	*/
	function about_us() {
		$this->_head();
		$this->load->view('app/about_us_v');
		$this->_footer();
	}

    /**
     * accessTerm controller
     * 이용약관에 대한 페이지
     */
    function accessTerm() {
        $this->_head();
        $this->load->view('app/accessTerm_v');
        $this->_footer();
    }

    /**
     * partnership controller
     * 사업제휴에 대한 페이지
     */
    function partnership() {
        $this->_head();
        $this->load->view('app/partnership_v');
        $this->_footer();
    }

    /**
     * privacyPolicy controller
     * 개인보호에 대한 페이지
     */
    function privacyPolicy() {
        $this->_head();
        $this->load->view('app/privacyPolicy_v');
        $this->_footer();
    }


	/**
	* project_detail controller
	* 프로젝트 선택 시 들어가는 페이지
	*/
	function project_detail() {
		$this->_head();

		if($this->uri->segment(3) == 'projects_ko') {
			$r_table = "reward_ko"; $p_table = "progress_project_ko";
		} else if($this->uri->segment(3) == 'projects_en') {
			$r_table = "reward_en"; $p_table = "progress_project_en";
		} else {
			$r_table = "reward_ch"; $p_table = "progress_project_ch";
		}

		$data['project_views'] = $this->project_m->get_project_by_pn($this->uri->segment(3), $this->uri->segment(5));
		$data['reward_views'] = $this->project_m->get_rewards_by_pn($r_table, $this->uri->segment(5));
		$data['progress_update_views'] = $this->project_m->get_update_by_pn($p_table, $this->uri->segment(5));
		$data['project_comment_views'] = $this->project_m->get_comment_by_pn('projects_comment', $this->uri->segment(5));

		$this->load->view('app/project_detail_v', $data);
		
		$this->_footer();
	}

    /**
     * User Profile 정보 보기
     */
    function userProfile() {
        $this->_head();
        $this->load->view('app/userProfile_v');
        $this->_footer();
    }

    /**
     * User Profile 변경 하기
     */
    function changeUserProfile() {
        // 검열하는 것 넣어야됨
        // flash data
        $this->_head();
        $this->load->view('app/changeUserProfile_v');
        $this->_footer();
    }

    /**
     * User Password 변경 하기
     */
    function changeUserPassword() {
        $this->_head();
        //echo "0";
//        if($this->session->flashdata('checkPassword')) {
            //echo "1";
            $this->session->set_flashdata('checkPassword', FALSE);
            $this->load->view('app/changeUserPassword_v');
//        } else {
            //echo "2";
//            alert('잘못된 경로입니다.','/index.php/path/checkPassword');
//        }
        $this->_footer();
    }

    /**
     * User Password 체크
     */
    function checkPassword() {
        $this->_head();
        $this->load->view('app/checkPassword_v');
        $this->_footer();
    }

	/**
	* fandle now 선택 시 요청 controller
	*/
	function pledge() {

		if($this->session->userdata('is_login')) {
			$this->_head();

            if($this->uri->segment(3) == 'projects_ko') {
                $r_table = "reward_ko"; $p_table = "progress_project_ko";
            } else if($this->uri->segment(3) == 'projects_en') {
                $r_table = "reward_en"; $p_table = "progress_project_en";
            } else {
                $r_table = "reward_ch"; $p_table = "progress_project_ch";
            }

			$data['project_views'] = $this->project_m->get_project_by_pn($this->uri->segment(3), $this->uri->segment(5));
			$data['reward_views'] = $this->project_m->get_rewards_by_pn($r_table, $this->uri->segment(5));

			$this->load->view('app/pledge_v', $data);
			$this->_footer();
		} else {
			alert($this->lang->line('haveToLogin'), '/index.php/auth/login/'.$this->uri->segment(3).'/projects_num/'.$this->uri->segment(5).'/path_uri/path/pledge');
			exit;
		}
	}

	/**
	* 리워드 결제 controller
	*/
	function payment() {

		if($this->session->userdata('is_login')) {

			$this->_head();
			
			if($this->uri->segment(3) == 'projects_ko') {
				$r_table = "reward_ko"; $p_table = "progress_project_ko";
			} else if($this->uri->segment(3) == 'projects_en') {
				$r_table = "reward_en"; $p_table = "progress_project_en";
			} else {
				$r_table = "reward_ch"; $p_table = "progress_project_ch";
			}

			$data['project_views'] = $this->project_m->get_project_by_pn($this->uri->segment(3), $this->uri->segment(5));
			$data['reward_views'] = $this->project_m->get_rewards_by_ri($r_table, $this->uri->segment(7));

            if($this->uri->segment(3) == 'projects_ko') {
                $this->load->view('app/payment_v', $data);
            } else {
                $this->load->view('app/paymentGlobal_v', $data);
            }
            $this->_footer();

		} else {
			alert($this->lang->line('haveToLogin'), '/index.php/auth/login/'.$this->uri->segment(3).'/projects_num/'.$this->uri->segment(5).'/path_uri/path/pledge');
			exit;
		}
	}

    function insert_payment_m() {
        $isSuccess = $this->input->get("imp_success", TRUE);
        echo $isSuccess;
        if($_GET && ($isSuccess=="true")) {
            $this->load->model("Payment_m");
            $reward_amount = $this->input->get("reward_amount", TRUE);
            $projects_num = $this->input->get("projects_num", TRUE);
            $reward_num = $this->input->get("reward_num", TRUE);
            $merchant_uid = $this->input->get("merchant_uid", TRUE);
            $amount = $this->input->get("amount", TRUE);

            $newData = array(
                "projects_num"=>$this->input->get("projects_num", TRUE),
                "reward_num"=>$this->input->get("reward_num", TRUE),
                "pg_provider"=>$this->input->get("pg_provider", TRUE),
                "pay_method"=>$this->input->get("pay_method", TRUE),
                "escrow"=>$this->input->get("escrow", TRUE),
                "merchant_uid"=>$this->input->get("merchant_uid", TRUE),
                "name"=>$this->input->get("name", TRUE),
                "amount"=>$this->input->get("amount", TRUE),
                "reward_amount"=>$this->input->get("reward_amount", TRUE),
                "shipping_amount"=>$this->input->get("shipping_amount", TRUE),
                "buyer_email"=>$this->input->get("buyer_email", TRUE),
                "buyer_name"=>$this->input->get("buyer_name", TRUE),
                "buyer_tel"=>$this->input->get("buyer_tel", TRUE),
                "buyer_addr"=>$this->input->get("buyer_addr", TRUE),
                "buyer_addr_detail"=>$this->input->get("buyer_addr_detail", TRUE),
                "buyer_postcode"=>$this->input->get("buyer_postcode", TRUE),
                "buyer_nation"=>$this->input->get("buyer_nation", TRUE),
                "buyer_city"=>$this->input->get("buyer_city", TRUE),
                "buyer_state"=>$this->input->get("buyer_state", TRUE),
                "shipping_method"=>$this->input->get("shipping_method", TRUE),
                "note"=>$this->input->get("note", TRUE)
            );

            //var_dump($newData);
            // baker 증가, reward 수량 감소
            // 통신이 너무 많아졌음 ㅜㅜ
            $this->project_m->increaseBackerRewardAmount_ko('projects_ko', $reward_amount, $projects_num, $reward_num);
            $this->project_m->increaseBackerRewardAmount_en('projects_en', $reward_amount, $projects_num, $reward_num);
            $this->project_m->increaseBackerRewardAmount_ch('projects_ch', $reward_amount, $projects_num, $reward_num);

            $result = $this->Payment_m->insert_delivery('delivery', $newData);

            if($result) {
                echo '데이터베이스 저장 성공';

                redirect('/path/completePaymentPage?'.
                    'merchant_id='.$merchant_uid.
                    '&amount='.$amount.
                    '&reward_amount='.$reward_amount.
                    '&projects_num='.$projects_num.
                    '&reward_num='.$reward_num);

            } else {

            }
        } else {
            echo 'get 전송 값 없음';
            redirect('/path/completePaymentPage?'.
                'merchant_id='.null.
                '&amount='.null.
                '&reward_amount='.null.
                '&projects_num='.null.
                '&reward_num='.null);

            return false;
        }
    }
	/**
	* 결제 완료 시 데이터 베이스에 저장 controller
	*/
	function insert_payment() {

		if($_POST) {

		    $this->load->model("Payment_m");
            $reward_amount = $this->input->post("reward_amount", TRUE);
            $projects_num = $this->input->post("projects_num", TRUE);
            $reward_num = $this->input->post("reward_num", TRUE);

		    $newData = array(
		        "projects_num"=>$this->input->post("projects_num", TRUE),
                "reward_num"=>$this->input->post("reward_num", TRUE),
                "pg_provider"=>$this->input->post("pg_provider", TRUE),
                "pay_method"=>$this->input->post("pay_method", TRUE),
                "escrow"=>$this->input->post("escrow", TRUE),
                "merchant_uid"=>$this->input->post("merchant_uid", TRUE),
                "name"=>$this->input->post("name", TRUE),
                "amount"=>$this->input->post("amount", TRUE),
                "reward_amount"=>$this->input->post("reward_amount", TRUE),
                "shipping_amount"=>$this->input->post("shipping_amount", TRUE),
                "buyer_email"=>$this->input->post("buyer_email", TRUE),
                "buyer_name"=>$this->input->post("buyer_name", TRUE),
                "buyer_tel"=>$this->input->post("buyer_tel", TRUE),
                "buyer_addr"=>$this->input->post("buyer_addr", TRUE),
                "buyer_addr_detail"=>$this->input->post("buyer_addr_detail", TRUE),
                "buyer_postcode"=>$this->input->post("buyer_postcode", TRUE),
                "buyer_nation"=>$this->input->post("buyer_nation", TRUE),
                "buyer_city"=>$this->input->post("buyer_city", TRUE),
                "buyer_state"=>$this->input->post("buyer_state", TRUE),
                "shipping_method"=>$this->input->post("shipping_method", TRUE),
                "note"=>$this->input->post("note", TRUE)
            );

            //var_dump($newData);
            // baker 증가, reward 수량 감소
            // 통신이 너무 많아졌음 ㅜㅜ
            $this->project_m->increaseBackerRewardAmount_ko('projects_ko', $reward_amount, $projects_num, $reward_num);
            $this->project_m->increaseBackerRewardAmount_en('projects_en', $reward_amount, $projects_num, $reward_num);
            $this->project_m->increaseBackerRewardAmount_ch('projects_ch', $reward_amount, $projects_num, $reward_num);

            $result = $this->Payment_m->insert_delivery('delivery', $newData);

            if($result) {
                echo '데이터베이스 저장 성공';
                return true;
            } else {
                echo '데이터베이스 저장 실패';
                return false;
            }
        } else {
            echo 'post 전송 값 없음';
            return false;
        }
	}


    /**
     * 결제 완료 시 고객에게 알리는 페이지
     */
	function completePaymentPage()  {
        $this->_head();

        if (
            ($this->input->get('merchant_id', TRUE) != null) &&
            ($this->input->get('amount', TRUE) != null) &&
            ($this->input->get('reward_amount', TRUE) != null) &&
            ($this->input->get('projects_num', TRUE) != null) &&
            ($this->input->get('reward_num', TRUE) != null)
        ) {

            $this->load->helper('iamport');

            $merchant_id = $this->input->get('merchant_id', TRUE);
            $amount = $this->input->get('amount', TRUE);

            $iamport = new Iamport('5660065249144037', 'iM67Jr5CWWTR6JG43GKuS7vOflI2WcXeY4mHvsksodkuW0z0Gkvys0nIm5KiiHxhMTYiljKKx5ft5OuM');

            $result = $iamport->findByMerchantUID($merchant_id);

            if ($result->success) {

                $payment_data = $result->data;
                $amount_should_be_paid = $amount;

                if ($payment_data->status == 'paid' && $payment_data->amount == $amount_should_be_paid) {
                    //TODO : 결제성공 처리

                    $data['payment_views'] = array(
                        'merchant_uid'=>$payment_data->merchant_uid,
                        'status'=>$payment_data->status,
                        'amount'=>$payment_data->amount,
                        'pay_method'=>$payment_data->pay_method,
                        'receipt_url'=>$payment_data->receipt_url
                    );
                } else {
                    $data['payment_views'] = null;
                }
            } else {
                alert($this->lang->line('haveProblemInPayment'), '/index.php');
                $data['payment_views'] = null;
                exit;

            }
            $this->load->view('app/completePayment_v', $data);

        } else {
            //echo "get으로 받은 것 없음";
            $data['payment_views'] = array(
                'merchant_uid'=>NULL,
                'status'=>NULL,
                'amount'=>NULL,
                'pay_method'=>NULL,
                'receipt_url'=>NULL
            );
            $this->load->view('app/completePayment_v', $data);
        }
        $this->_footer();
    }



    /**
     * 결제 취소
     */
    function cancelPayment() {

        $projects_id = $this->input->get("projects_id", TRUE);
        $page = $this->input->get("page", TRUE);
        $merchant_uid =  $this->input->get('merchant_uid', TRUE);

        if($this->input->get('merchant_uid', TRUE)) {

            $this->load->helper('iamport');
            $iamport = new Iamport('5660065249144037', 'iM67Jr5CWWTR6JG43GKuS7vOflI2WcXeY4mHvsksodkuW0z0Gkvys0nIm5KiiHxhMTYiljKKx5ft5OuM');
            $result = $iamport->cancel(array(
                'imp_uid'		=> null,
                'merchant_uid'	=> $merchant_uid,
                'amount' 		=> 0, //전액 취소
                'reason'		=> '취소테스트',
                'refund_holder' => null,
                'refund_bank'	=> null,
                'refund_account'=> null
            ));

            if($result->success) {
                //먼저 projects_num, reward_num 변수를 빼와야 됨
                $data = $this->project_m->projectsNumRewardNumByMerchantID('delivery', $merchant_uid);

                //데이터 베이스 삭제
                $result = $this->project_m->cancelDelivery('delivery', $this->input->get('merchant_uid', TRUE));
                if($result) {

                    //decreaseProjects && functionReward($data->projects_num, $data->reward_num)
                    $result1 = $this->project_m->decreaseGatherAmountFundingUserCount($data->projects_num, $data->reward_amount);
                    $result2 = $this->project_m->decreaseRewardCount($data->projects_num, $data->reward_num);

                    if($result1 && $result2) {
                        alert("후원 취소에 성공했습니다.".$data->projects_num."|".$data->reward_num , "/index.php/administration/project/view/".$this->uri->segment(3)."/projects_id/".$projects_id."/page/".$page."");
                        exit;
                    } else {
                        alert("후원 금액 취소 및 수량 감소에 실패했습니다. 관리자에게 문의하세요","/index.php/administration/project/view/".$this->uri->segment(3)."/projects_id/".$projects_id."/page/".$page."");
                        exit;
                    }


                } else {
                    alert("후원 취소는 성공했지만, 서버 데이터 베이스 삭제에는 실패했습니다. 개발자에게 문의하세요.", "/index.php/administration/project/view/".$this->uri->segment(3)."/projects_id/".$projects_id."/page/".$page."");
                    exit;
                }
            } else {
                alert("후원 취소를 실패하였습니다. 다시 시도해주세요.", "/index.php/administration/project/view/".$this->uri->segment(3)."/projects_id/".$projects_id."/page/".$page."");
                exit;
            }
        } else {
            alert("merchant_uid가 없음", "/index.php/administration/project/view/".$this->uri->segment(3)."/projects_id/".$projects_id."/page/".$page."");
            exit;
        }
    }


    /**
     * App에서 후원 정보 보기
     */
    function fundingUserDetail() {

        echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
        if($this->uri->segment(3) == 'ko' || $this->uri->segment(3) == '') {
            $project = 'projects_ko';
        } else if($this->uri->segment(3) == 'en') {
            $project = 'projects_en';
        } else {
            $project = 'projects_ch';
        }

        $this->load->helper('alert');

        $this->_head();

        $data['fundingUser_views'] = $this->project_m->getFundingUserByEmail('delivery', $project,$this->session->userdata('email'));
//        var_dump($data['fundingUser_views']);

        if( $data['fundingUser_views'] != null ) {
//            $data['reward_views'] = $this->project_m->getRewardByPNRN('reward_ko', $data['fundingUser_views']->projects_num, $data['fundingUser_views']->reward_num);
//            $data['projects_views'] = $this->project_m->get_projects_ko_by_user('projects_ko', $data['fundingUser_views']->projects_num);
//            $data['checkPayment_views'] = $this->project_m->checkPayment($data['fundingUser_views']->merchant_uid);

            $this->load->view('app/fundingUserDetail_v', $data);
        } else {
            $this->load->view('app/fundingUserDetail_v', $data);
        }
        $this->_footer();
    }
}
