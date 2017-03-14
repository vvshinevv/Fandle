 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Email extends CI_Email {
//	public function to($to) {
//		// 이메일 주소를 변경할 로직
//		$this->ci = &get_instance(); // controller context를 받아온다
//		$_to = $this->ci->config->item('dev_receive_email');
//
//		$to = !$_to ? $to : $_to;
//
//		return parent::to($to);
//	}
}