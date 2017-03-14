<?php
class User_model extends CI_Model {

   function __construct() {
      parent::__construct();
   }

   function get_user_num($user_id) {
      return $this->db->get_where('user', array('id'=>$user_id))->num_rows();
   }

   public function add($option) {
      $this->db->set('email', $option['email']);
      $this->db->set('password', $option['password']);
      $this->db->set('username', $option['username']);
      $this->db->set('nickname', $option['nickname']);
      $this->db->set('reg_date', 'NOW()', false);
      $this->db->insert('user');

      $result = $this->db->insert_id();

      return $result;
   }

   public function gets($data){
      $result = $this->db->query("SELECT * FROM user WHERE email='".$data."'");
      return $result->num_rows();
   }

   public function getByEmail($option) {
      $result = $this->db->get_where('user', array('email'=>$option['email']))->row();
      return $result;
   }

   public function add_facebook($nickName, $email, $name){
      $this->db->insert('user',array(
         'nickname'=>$nickName,
         'email'=>$email,
         'username'=>$name
      ));
   }

   public function resetPassword($option) {
      $resetData = array(
            'password'=>$option['password']
         );

      $where = array(
         'email'=>$option['email']
         );

      $result = $this->db->update($option['table'], $resetData, $where);

      return $result;   
   }

   public function changeUserProfile($option) {
       $updateData = array(
           'username'=>$option['username'],
           'nickname'=>$option['nickname']
       );

       $where = array(
           'email'=>$option['email']
       );

       $result = $this->db->update($option['table'], $updateData, $where);

       return $result;
   }
}
?>