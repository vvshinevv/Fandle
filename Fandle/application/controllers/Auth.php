<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

   function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->helper(array('url', 'alert', 'sweetalert'));
        if($this->uri->segment(3) == 'projects_ko' || $this->uri->segment(3) == 'ko' || $this->uri->segment(3) == '') {
            $this->lang->load('translate', 'korean');
        } else if($this->uri->segment(3) == 'projects_en' || $this->uri->segment(3) == 'en') {
            $this->lang->load('translate', 'english');
        } else {
            $this->lang->load('translate', 'china');
        }
   }

   public function _remap($method) {
      $this->load->view('app/header_v');
      if(method_exists($this, $method)) {
         $this->{"{$method}"}();
      }
      $this->load->view('app/footer_v');
   }

    /**
    * 회원 로그인
    */
    function login() {

        echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';

        if($this->session->userdata('is_login') == TRUE) {
            alert('Wrong access', '/index.php');
            exit;
        }

        if($_POST) {
            $uri_array = $this->segment_explode($this->uri->uri_string());

            $uri_path = $cont = $cont_func = $fail_login_uri = '';
            if( in_array('path_uri', $uri_array)) {
                $cont = urldecode($this->url_explode($uri_array, 'path_uri'));
                $cont_func = urldecode($this->url_explode_2($uri_array, 'path_uri'));
                $uri_path = "/".$cont."/".$cont_func."/".$this->uri->segment(3)."/".$this->uri->segment(4)."/".$this->uri->segment(5);
                $fail_login_uri = "/".$this->uri->segment(3)."/projects_num/".$this->uri->segment(5)."/path_uri/".$this->uri->segment(7)."/".$this->uri->segment(8);
            }

            $email = $this->input->post('email', TRUE);
            $password = $this->input->post('password', TRUE);

            $user = $this->User_model->getByEmail(array('email'=>$email));
            //var_dump($user);

            if($user) {
                if(($email == $user->email) && password_verify($password, $user->password)) {

                    $newdata = array(
                        'email'=>$user->email,
                        'username'=>$user->username,
                        'nickname'=>$user->nickname,
                        'is_login'=>TRUE
                    );

                    $this->session->set_userdata($newdata);
                    alert($this->lang->line('successLogIn'), "/index.php".$uri_path);
                    exit;
                } else {
                    alert($this->lang->line('failToLogIn'), "/index.php/auth/login".$fail_login_uri);
                exit;
                }
            } else {
                alert($this->lang->line('noUserData'), "/index.php/auth/login".$fail_login_uri);
            }
        } else {
            $this->load->view('app/login_v');
//            redirect("/");
        }
    }
   
   /**
   * 회원 로그 아웃
   */
   function logout() {
      $this->session->sess_destroy();

      alert($this->lang->line('successLogOut'), '/index.php');
   }

   /**
   * 비밀번호 찾기
   */
   function findPassword() {

      echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';

      if($_POST) {
         
         $email = $this->input->post('email', TRUE);
         $data['email_views'] = $this->User_model->getEmail('user', $email);

         if($data['email_views'] != NULL) {
            return TRUE;
         } else {
            //존재하지 않는 이메일 
            //Ajax로 존재하지 않는 이메일 임을 알려야함
            return FALSE;
         }

      } else {
         $this->load->view('app/findPassword_v');
      }
   }

   /**
   * 회원 가입
   */
   function register() {

      echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';

      if($_POST) {

         if(!function_exists('password_hash')) {
            $this->load->helper('password');
         }

         $hash = password_hash($this->input->post('password'), PASSWORD_BCRYPT);

         $new_id = array(
            'email'=>$this->input->post('email'),
            'password'=>$hash,
            'username'=>$this->input->post('username'),
            'nickname'=>$this->input->post('nickname')
            );

         $result = $this->User_model->add($new_id);

         if($result) {
            swal($this->lang->line('successSignIn'), "/index.php");
         } else {
            swal($this->lang->line('failToSignIn'), "/index.php/auth/register");
         }
      } else {
         $this->load->view('app/register_v');
      }
   }
    
   function socialRegister() {
      echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
      if($_GET) {
         $email = $this->input->get('email');
         $username = $this->input->get('username');

         $data['social_register'] = array('email'=>$email, 'username'=>$username);
         $this->load->view('app/social_register_v', $data);
      } else {
         alert($this->lang->line('wrongAccess'), "/index.php/auth/login");
      }
   }

   function language() {
      if($this->uri->segment(3) == "ko") {
         $this->load->view('main');
      } else if($this->uri->segment(3) == "en") {
         $this->load->view('main');
      } else {
         $this->load->view('main');
      }
   }
}