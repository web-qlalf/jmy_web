<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

   function __construct()
   {
       parent::__construct();

   }

   public function logout()
   {
      $this->session->sess_destroy();
      $this->load->helper('url');
      redirect('/');
   }

   public function login()
   {
     // var_dump($_POST);
     $this->load->model('user/user_model');

     $user_password = password_hash(htmlspecialchars($this->input->post('user_password')), PASSWORD_BCRYPT);
     $user_email =  htmlspecialchars($this->input->post('user_email'));

     $return = $this->user_model->searchEmail($user_email);

     // echo "<pre>";
     // var_dump($return);
     // var_dump($return[0]['email']);
     // echo "<pre>";
     if($return[0]['email'] == $user_email && password_verify(htmlspecialchars($this->input->post('user_password')),$return[0]['pw'])){
        // echo "일치";
         $memdata = array(
           'user_no' => $return[0]['no'],
           'user_email' => $return[0]['email'],
           'user_name' => $return[0]['name'],
           'user_status' => $return[0]['status'],
           'logged_in' => TRUE
         );
         $this->session->set_userdata($memdata);
         $this->session->set_flashdata('message', $memdata['user_name'].'님 어서오세요~');
         $this->load->helper('url');
         redirect('/');
     }else{
       // echo "불일치";
         $this->session->set_flashdata('message', '로그인 실패.');
         $this->load->helper('url');
         redirect('/login');
     }

   }


}
