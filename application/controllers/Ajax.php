<?php
defined("BASEPATH") OR exit("No direct script access allowed");

/**
* Ajax 처리 컨트롤러
*/
class Ajax extends MY_Controller {
	
	function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
    * project 중복 확인 과정
    *
    * 9000 : 로그인 필요
    * 1000 : 글 내용이 없는 경우
    * 1001 : 중복되는 number가 있는 경우
    * 2000 : 등록 실패 시
    */
    public function project_confirm_dup() {
    	if($this->session->userdata("admin_login") == TRUE) {
    		$this->load->model("administration/project_m");

    		$table = $this->input->post("table", TRUE);
    		$projects_num = $this->input->post("projects_num", TRUE);

    		if($projects_num != "") {
    			
    			$result = $this->project_m->confirm_project_num($table, $projects_num);
    			

    			if($result) {
    				//중복되는 경우
    				echo "1001";
    			} else {
    				//중복되지 않는 경우
?>
                    <script>
                        reward_num = 1;
                    </script>
					<input type="text" id="projects_num" name="projects_num" onkeydown="return only_num(event)" value="<?php echo $projects_num; ?>">
<?php
    				
    			}
    		} else {
    			//글 내용이 없는 경우
    			echo "1000";
    		}

    	} else {
    		//로그인 필요
    		echo "9000";
    	}
    }

    /**
    * reward 중복 확인 과정
    *
    * 9000 : 로그인 필요
    * 1000 : 글 내용이 없는 경우
    * 1001 : 중복되는 number가 있는 경우
    * 2000 : 등록 실패 시
    */
    public function reward_confirm_dup() {
        if($this->session->userdata("admin_login") == TRUE) {
            $this->load->model("administration/project_m");

            $table = $this->input->post("table", TRUE);
            $projects_id = $this->input->post("projects_id", TRUE);
            $reward_num = $this->input->post("reward_num", TRUE);

            if($reward_num != "") {
                $result = $this->project_m->confirm_reward_num($table, $reward_num, $projects_id);

                if($result) {
                    echo "1001";
                } else {
?>
                    <script>
                        flag_reward = 1;
                    </script>
                    <input type="text" id="reward_num" name="reward_num" onkeydown="return only_num(event)" value="<?php echo $reward_num; ?>">
<?php
                }
            } else {
                // 글 내용이 없는 경우
                echo "1000";
            }
        } else {
            //로그인 필요 에러
            echo "9000";
        }
    }

    /**
    * project 댓글 달기
    *
    * 9000 : 로그인 필요
    * 1000 : 글 내용이 없는 경우
    * 2000 : 등록 실패 시
    */
    public function project_comment_add() {
        if($this->session->userdata('is_login') == TRUE) {
            $this->load->model('administration/project_m');

            $table = $this->input->post("table", TRUE);
            $projects_num = $this->input->post("projects_num", TRUE);
            $comment_contents = $this->input->post("comment_contents", TRUE);

            if($comment_contents != '') {
                $write_data = array(
                    'table'=>$table,
                    'projects_num'=>$projects_num,
                    'nickname'=>$this->session->userdata('nickname'),
                    'email'=>$this->session->userdata('email'),
                    'username'=>$this->session->userdata('username'),
                    'contents'=>$comment_contents
                    );

                $result = $this->project_m->insert_comment($write_data);

                if($result) {
                    // 글 작성 성공 시 댓글 목록 만들어 화면에 출력
                    $sql = "SELECT * FROM ".$table." WHERE projects_num = '".$projects_num."' ORDER BY projects_comment_id DESC";
                    $query = $this->db->query($sql);

                    foreach ($query->result() as $key => $lt) {
?>
                        <div class="comment clearfix" id="row_num_<?php echo $lt->projects_comment_id; ?>">
                            <header>
                                <div class="comment-meta pull-right"><button id="comment_delete" vals="<?php echo $lt->projects_comment_id; ?>" style="border: 0; outline: 0; background-color: #ffffff;  background-color: rgba( 255, 255, 255, 0 );">삭제<i class="icon-trash"></i></button></div>
                                <div class="comment-meta"><?php echo $lt->nickname; ?> | <?php echo $lt->reg_date; ?></div>
                            </header>
                            <div class="comment-content">
                                <div class="comment-body clearfix">
                                    <p><?php echo $lt->contents; ?> </p>
                                </div>
                            </div>
                        </div>
<?php                        
                    }
                } else {
                    //글 실패 시
                    echo "2000";
                }
            } else {
                //글 내용이 없는 경우
                echo "1000";
            }

        } else {
            //로그인 필요 에러
            echo "9000";
        }
    }

    /**
    * project 댓글 삭제
    *
    * 9000 : 로그인 필요
    * 8000 : 본인이 아닌 경우
    * 2000 : 삭제 실패 시
    */
    public function project_comment_delete() {

        if($this->session->userdata('is_login') == TRUE) {
            $this->load->model('administration/project_m');

            $table = $this->input->post('table', TRUE);
            $projects_comment_id = $this->input->post('projects_comment_id', TRUE);

            //글 작성자가 본인인지 검증
            $writer_id = $this->project_m->writer_check($table, $projects_comment_id);

            $this->load->helper('alert');
            //alert("또잉".$this->session->userdata('email'));
            if($writer_id->email != $this->session->userdata('email')) {
                //본인이 작성한 글이 아닌 경우
                echo "8000";
            } else {
                //본인이 작성한 경우
                $result = $this->project_m->delete_comment($table, $projects_comment_id);

                if($result) {
                    //삭제 성공한 경우
                    echo $projects_comment_id;
                } else {
                    //삭제 실패한 경우
                    echo "2000";
                }
            }
        } else {
            //로그인 필요 에러
            echo "9000";
        }
    }
    
    /**
    * 회원 가입 검증 Ajax
    */
    public function ajaxCheckValidation() {
        if($_POST) {
            $this->load->model('User_model');
            $email = $this->input->post('email', TRUE);

            if($this->User_model->gets($email) == 0) {
                if(!function_exists('password_hash')) {
                    $this->load->helper('password');
                }

                //var_dump($this->input->post('password', true));
                $hash = password_hash($this->input->post('password', true), PASSWORD_BCRYPT);

                $new_id = array(
                    'email'=>$email,
                    'password'=>$hash,
                    'username'=>$this->input->post('username', TRUE),
                    'nickname'=>$this->input->post('nickname', TRUE)
                );
                $result = $this->User_model->add($new_id);

                if($result) {
                    $sentResult = array('sent'=>'yes');
                } else {
                    $sentResult = array('sent'=>'no');
                }
                echo json_encode($sentResult);
            } else {
                $sentResult = array('sent'=>'exist');
                echo json_encode($sentResult);
            }


        } else {
            $sentResult = array('sent'=>'no');
            echo json_encode($sentResult);
        }
    }

    /**
     * 비밀번호 변경시 현재 비밀번호 확인
     */
    function ajaxCheckPassword() {
        if(($this->input->post('email', TRUE) != NULL) && ($this->input->post('password', TRUE) != NULL) ) {
            $this->load->model('User_model');
            $email = $this->input->post('email', TRUE);
            $password = $this->input->post('password', TRUE);

            $user = $this->User_model->getByEmail(array('email'=>$email));

            if($user) {
                //echo "2";
                if(($email == $user->email) && password_verify($password, $user->password)) {
                    //echo "3";
                    $sentResult = array('sent'=>'yes');
                    $this->session->set_flashdata('checkPassword', TRUE);
                    echo json_encode($sentResult);
                } else {
                    //echo "4";
                    $sentResult = array('sent'=>'no');
                    $this->session->set_flashdata('checkPassword', FALSE);
                    echo json_encode($sentResult);
                }
            } else {
                //echo "5";
                $sentResult = array('sent'=>'no');
                $this->session->set_flashdata('checkPassword', FALSE);
                echo json_encode($sentResult);
            }

        } else {
            //echo "6";
            $sentResult = array('sent'=>'no');
            $this->session->set_flashdata('checkPassword', FALSE);
            echo json_encode($sentResult);
        }
    }

    public function changeUserProfile() {

        if($_POST) {
            $this->load->model('User_model');

            $username = $this->input->post('username', TRUE);
            $nickname = $this->input->post('nickname', TRUE);
            $email = $this->input->post('email', TRUE);

            $changeArray = array(
                'table'=>'user',
                'username'=>$username,
                'nickname'=>$nickname,
                'email'=>$email
            );

            $result = $this->User_model->changeUserProfile($changeArray);

            if($result) {
                $updateData = array(
                    'email'=>$email,
                    'nickname'=>$nickname,
                    'username'=>$username
                );
                $this->session->set_userdata($updateData);
                $sentResult = array('sent'=>'yes');
            } else {
                $sentResult = array('sent'=>'no');
            }
            echo json_encode($sentResult);
        } else {
            $sentResult = array('sent'=>'no');
            echo json_encode($sentResult);
        }

    }

    /**
    * 비밀번호 변경
    */
    public function ajaxResetPassword() {
        if($_POST) {
            $this->load->model('User_model');

            if(!function_exists('password_hash')) {
                $this->load->helper('password');
             }

            $hash = password_hash($this->input->post('password', TRUE), PASSWORD_BCRYPT);

            $table = $this->input->post('table', TRUE);
            $email = $this->input->post('email', TRUE);            
            
            $resetData = array(
                    'table'=>$table,
                    'password'=>$hash,
                    'email'=>$email
                );
            
            $result = $this->User_model->resetPassword($resetData);
            //echo $email;
            if($result) {
                //변경 완료
                $sentResult = array('sent'=>'yes');
            } else {
                //변경 실패
                $sentResult = array('sent'=>'no');
            }
            echo json_encode($sentResult);
        } else {
            $sentResult = array('sent'=>'no');
            echo json_encode($sentResult);
        }
    }

    /**
    * social Ajax 이메일 체크
    */
    public function ajaxSocialUserExistForSocialId() {
        
        if($_POST) {
            $this->load->model('User_model');
            $email = $this->input->post('email', TRUE);

            $user = $this->User_model->getByEmail(array('email'=>$email));

            //echo $user;
            
            if($user) {
                $sentResult = array('sent'=>'no');
            } else {
                $sentResult = array('sent'=>'yes');
            }

            echo json_encode($sentResult);
        } else {
            $sentResult = array('sent'=>'yes');
            echo json_encode($sentResult);            
        }
    }


    /**
    * email 중복 체크
    */
    public function ajaxCheckEmailValidation() {
        if($_POST) {
            $email = $this->input->post('email', TRUE);

            $this->load->model('User_model');
            if($email != '') {
                $result = $this->User_model->getByEmail(array('email'=>$email));

                if($result) {
                    $this->load->library('email');

                    $config = array();
                    $config['protocol'] = 'sendmail';
                    $config['mailpath'] = '/usr/sbin/sendmail';
                    $config['charset'] = 'utf8';
                    $config['wordwrap'] = TRUE;
                    $config['mailtype'] = 'html';

                    $this->email->initialize($config);
                    $this->email->clear();
                    $this->email->from('vvshinevv@gmail.com', 'KWAVE D');
                    $this->email->to($email);

                    $this->email->subject('비밀번호 변경 링크');
                    $this->email->message('
                        <div style="border-width:6px; border-style:double; border-color:orange; width:60%; margin:0 auto; padding:10px; text-align:center">
                            <div style="color: black; text-align: center; font-size: 15px;">
                                안녕하십니까?<br/>
                                KWAVE D를 이용해 주셔서 감사합니다.<br/>
                                고객님의 개인 정보 보호를 위해 비밀번호 번호를 재설정 합니다.<br/>
                                아래 링크를 눌러서 다시 설정해주시기 바랍니다. <br/>
                                <div style="margin-top: 20px;"></div>
                                <a href="http://www.kwavedonate.com/index.php/path/resetPassword?email='.$email.'">접속 링크</a>
                            </div>
                            <div style="margin-top: 20px;"></div>
                            <label></label>
                            <div style="color: black; text-align: center; font-size: 15px;">
                                고객님의 개인정보를 소중히 여기는 <strong>KWAVE D</strong>가 되겠습니다.<br/>
                                <strong>KWAVE D</strong> 드림
                            </div>
                        </div>
                    ');

                    if($this->email->send()) {
?>
                        <div id="resultSuccess" style="margin-left: 0px; color: blue; font-weight: bold;">
                        <br> 입력하신 이메일로 <br>비밀번호를 다시 등록할 수 있는 <br> 링크를 발송했으니 이메일을 확인해주세요.
                        </div>
<?php
                    } else {
?>
                        <div id="resultSuccess" style="margin-left: 0px; color: red; font-weight: bold;">
                        <?php 
                            if($this->email->print_debugger()) {
                        ?>
                                <br> 이메일 전송에 실패했습니다. 잠시 후 다시 이용해주세요.
                        <?php
                            }
                        ?>
                        </div>
<?php
                    }
                    //echo $this->email->print_debugger();
                } else {
                    //이메일이 없는 경우
                    echo '1000';
                }
            } else {
                //이메일 입력이 되지 않은 경우
                echo '1001';
            }
        } else {
            echo '1002';
        }
    }


}