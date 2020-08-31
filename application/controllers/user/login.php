<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

   function __construct()
   {
       parent::__construct();

   }
	public function index()
	{
    if(!$this->session->userdata('logged_in')){
      $this->_head();

      $this->load->view('login/login');

      $this->_footer();
    }else{
      $this->session->set_flashdata('message','이미 로그인한 상태입니다.');
      $this->load->helper('url');
      redirect('/');
    }
	}

}
