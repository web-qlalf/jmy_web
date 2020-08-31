<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Join extends MY_Controller {

   function __construct()
   {
       parent::__construct();

   }
	public function index()
	{
    $this->_head();

    $this->_breadcrumb(array('page_name' => 'join_page'));

    $this->load->view('/member/join');

    $this->_footer();
	}
	public function auth()
	{
    // var_dump($_POST);
    $this->load->model('user/user_model');
    $user_password = password_hash(htmlspecialchars($this->input->post('user_password')), PASSWORD_BCRYPT);

    $userInfo = array(
      'user_email'=>    htmlspecialchars($this->input->post('user_email')),
      'user_password'=>$user_password,
      'user_name'=>    htmlspecialchars($this->input->post('user_name'))
    );

    $return = $this->user_model->add($userInfo);


    if($return){
      $this->session->set_flashdata('message', '회원가입 성공.');
      $this->load->helper('url');
      redirect('/');
    }else{
      $this->session->set_flashdata('message', '회원가입 실패.');
      $this->load->helper('url');
      redirect('/user/join');
    }
	}
	public function search()
	{
    // var_dump($_GET);
    //web_qlalf@naver.com
    if(isset($_GET)){
      $userEmail = htmlspecialchars($this->input->get('userEmail'));
      $this->load->model('user/user_model');
      $return = $this->user_model->searchEmail($userEmail);

      // var_dump($userEmail);
      // var_dump($return);
      if($return == null || $return == '' || $return == 0 || count($return) == 0){
        $result = 0;
      }else{
        $result = 1;
      }
    }else{
      $result = 2;
    }
    echo json_decode($result);
	}

}
