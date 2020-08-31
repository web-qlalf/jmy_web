<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends MY_Controller {

   function __construct()
   {
       parent::__construct();

   }

  public function list(){
    $this->_require_admin_login_User();
    $this->load->model('/admin/member/member_model');
    $user_list = $this->member_model->gets();
    $data = $user_list;
    $num = count($data);
    $defaultPage = 1;
    // var_dump($option);
     $this->_admin_head();
     $this->load->view('/admin/admin_top');
     $this->load->view('/admin/admin_side');
     $this->load->view('/admin/member_list',  array('allData' => $num,'defaultPage' => $defaultPage));
     $this->load->view('/admin/admin_bottom');
     $this->_admin_footer();
   }

   public function info_List()
   {
     $limit = $_POST['limit'];
     $offset = ($_POST['page'] - 1) * $limit;
     // var_dump($_POST['page']);
     $pagingData = array('limit' => $limit, 'offset' => $offset);

     $this->load->model('/admin/member/member_model');
     $result = $this->member_model->getsRegdate($pagingData);

     echo json_encode($result);
    }

    public function detail($user_no)
    {
      $this->load->model('/admin/member/member_model');
      $user_info = $this->member_model->getOne($user_no);

      $this->_admin_head();
      $this->load->view('/admin/admin_top');
      $this->load->view('/admin/admin_side');
      $this->load->view('/admin/member_detail', array('user_info' =>  $user_info));
      $this->load->view('/admin/admin_bottom');
      $this->_admin_footer();
    }

    public function update()
    {
      $this->load->model('admin/member/member_model');
      $update = $this->member_model->updateAll(array(
        'user_no' => htmlspecialchars($this->input->post('user_no')),
        'user_name' => htmlspecialchars($this->input->post('user_name')),
        'user_email' => htmlspecialchars($this->input->post('user_email')),
        'user_tel1' => htmlspecialchars($this->input->post('user_tel1')),
        'user_tel2' => htmlspecialchars($this->input->post('user_tel2')),
        'zipcode' => htmlspecialchars($this->input->post('zipcode')),
        'address1' => htmlspecialchars($this->input->post('address1')),
        'address2' => htmlspecialchars($this->input->post('address2')),
        'address3' => htmlspecialchars($this->input->post('address3')),
        'status' => htmlspecialchars($this->input->post('user_status_select'))
      ));

      if($update !== 0)
      {
        $this->session->set_flashdata('message','정보수정 성공');
        $this->load->helper('url');
        redirect('/admin/member/list');
      }
      else
      {
        $this->session->set_flashdata('message','정보수정 실패');
        $this->load->helper('url');
        redirect('/admin/member/list');
      }
    }


}
