<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

   function __construct()
   {
       parent::__construct();


   }

  public function login(){
    if($this->session->userdata('logged_in')&&$this->session->userdata('admin')){
      $this->session->set_flashdata('message','이미 로그인했습니다.');
      $this->load->helper('url');
      redirect('/admin');
    }
     $this->load->view('/admin/login_top');
     $this->load->view('/admin/login');
     $this->load->view('/admin/login_bottom');
   }
  public function logout(){
    $this->session->sess_destroy();
    $this->load->helper('url');
      redirect('/admin/login');
   }


  public function login2222222(){
     if($this->session->userdata('logged_in') == true){
       $this->session->set_flashdata('message','이미 로그인한 상태입니다.');
       $this->load->helper('url');
       redirect('/mainseller');
     }
     $this->_headSeller();
     $this->load->library('session');
     // var_dump($this->session->all_userdata());
     $this->load->helper('url');
     $this->load->view('/sellerpage/loginSeller', array('returnURL' => $this->input->get('returnURL')));

     $this->_footerSeller();
   }


  public function authentication(){
    // var_dump($_POST);
    if(isset($_POST['user_id'])){
      $this->load->model('admin/admin_model');
      $admin = $this->admin_model->getByAdminId(array('user_id'=>htmlspecialchars($this->input->post('user_id'))));

      if($this->input->post('user_id') == $admin->id &&
       password_verify($this->input->post('user_pw'), $admin->pw)){
         $user_id = $admin->id;
         $user_name = $admin->name;

         $memdata = array(
                    'user_no' => $admin->no,
                    'user_id' => $admin->id,
                    'user_name' => $admin->name,
                    'position' => $admin->position,
                    'logged_in' => TRUE,
                    'admin' => TRUE
                   );

        $this->load->helper('url');
        $returnURL = $this->input->get('returnURL');
        if($returnURL == false){
            $returnURL = '/admin/main';
        }

        $this->session->set_userdata($memdata);
        $this->session->set_flashdata('message', '어서오세요.'.$memdata['user_id'].'('.$memdata['user_name'].') 님.');
        redirect($returnURL);
        // echo "<pre>";
        // var_dump($this->session->flashdata('message'));
        // echo "<pre>";
        // var_dump($this->session->get_userdata($memdata));
        // echo phpinfo();
        // echo CI_VERSION;

      }else{
        $this->session->set_flashdata('message','로그인에 실패했습니다.');
        $this->load->helper('url');
        redirect("/admin/auth/login");
      }

    }
  }

}
