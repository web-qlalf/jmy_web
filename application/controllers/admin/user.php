<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

   function __construct()
   {
       parent::__construct();

   }

  public function list(){
    $this->_require_admin_login_User();
    if(!$this->session->userdata('admin') == 1){
      $this->session->set_flashdata('message','권한이 없습니다.');
      $this->load->helper('url');
      redirect('/admin');
    }
    $this->load->model('/admin/admin_model');
    $user_list = $this->admin_model->gets();
    $data = $user_list;
    $num = count($data);
    $defaultPage = 1;
     $this->_admin_head();
     $this->load->view('/admin/admin_top');
     $this->load->view('/admin/admin_side');
     $this->load->view('/admin/admin_list' ,  array('allData' => $num,'defaultPage' => $defaultPage));
     $this->load->view('/admin/admin_bottom');
     $this->_admin_footer();
  }

  public function info_List()
  {
    $limit = $_POST['limit'];
    $offset = ($_POST['page'] - 1) * $limit;
    // var_dump($_POST['page']);
    $pagingData = array('limit' => $limit, 'offset' => $offset);

    $this->load->model('/admin/admin_model');
    $result = $this->admin_model->getsRegdate($pagingData);

    echo json_encode($result);
   }

  public function detail($user_no){
    if(!$this->session->userdata('admin') == 1){
      $this->session->set_flashdata('message','권한이 없습니다.');
      $this->load->helper('url');
      redirect('/admin');
    }
    $this->load->model('/admin/admin_model');
    $user_info = $this->admin_model->getOne($user_no);

     $this->_admin_head();
     $this->load->view('/admin/admin_top');
     $this->load->view('/admin/admin_side');
     $this->load->view('/admin/admin_detail_update',array('user_info' =>  $user_info));
     $this->load->view('/admin/admin_bottom');
     $this->_admin_footer();
  }
  public function update(){
    var_dump($_POST);
    $this->load->model('/admin/admin_model');
    $userId = htmlspecialchars($this->input->post('user_id'));
    $admin = $this->admin_model->getByAdminId(array('user_id'=>$userId));
    var_dump($admin->pw);
    if(password_verify($this->input->post('admin_password'), $admin->pw))
    {
      $update = $this->admin_model->updateAll(array(
        'user_no' => htmlspecialchars($admin->no),
        'user_id' => $userId,
        'user_name' => htmlspecialchars($this->input->post('user_name')),
        'user_email' => htmlspecialchars($this->input->post('user_email')),
        'user_tel' => htmlspecialchars($this->input->post('user_tel')),
        'answer1' => htmlspecialchars($this->input->post('admin_answer_01')),
        'answer2' => htmlspecialchars($this->input->post('admin_answer_02')),
        'answer3' => htmlspecialchars($this->input->post('admin_answer_03')),
        'position' => htmlspecialchars($this->input->post('position_val'))
      ));

      if($update !== 0)
      {
        $this->session->set_flashdata('message','수정');
        $this->load->helper('url');
        redirect("/admin/user/list");
      }
      else
      {
        $this->session->set_flashdata('message','실패');
        $this->load->helper('url');
        redirect("/admin/user/list");
      }
    }
    else
    {
      $this->session->set_flashdata('message','권한이 없습니다.');
      $this->load->helper('url');
      redirect("/admin/user/list");
    }
     // $this->_admin_head();
     // $this->load->view('/admin/admin_top');
     // $this->load->view('/admin/admin_side');
     // $this->load->view('/admin/admin_detail_update',array('user_info' =>  $user_info));
     // $this->load->view('/admin/admin_bottom');
     // $this->_admin_footer();
  }


  public function new_user(){
       $this->_admin_head();
       $this->load->view('/admin/admin_top');
       $this->load->view('/admin/admin_side');
       $this->load->view('/admin/new_admin');
       $this->load->view('/admin/admin_bottom');
       $this->_admin_footer();
  }

  public function add(){
    $user_password = password_hash(htmlspecialchars($this->input->post('user_password')), PASSWORD_BCRYPT);

    if(isset($_POST['user_id'])){
      $this->load->model('/admin/user/admin_model');
      $admin_register = array(
        'user_id'=>    htmlspecialchars($this->input->post('user_id')),
        'user_name'=>    htmlspecialchars($this->input->post('user_name')),
        'user_password'=>$user_password,
        'user_mail'=>    htmlspecialchars($this->input->post('user_mail')),
        'user_tel'=>    htmlspecialchars($this->input->post('user_tel')),
        'position'=>    htmlspecialchars($this->input->post('position')),
        'admin_question_01'=>    htmlspecialchars($this->input->post('admin_question_01')),
        'admin_answer_01'=>    htmlspecialchars($this->input->post('admin_answer_01')),
        'admin_question_02'=>htmlspecialchars($this->input->post('admin_question_02')),
        'admin_answer_02'=> htmlspecialchars($this->input->post('admin_answer_02')),
        'admin_question_03'=>htmlspecialchars($this->input->post('admin_question_03')),
        'admin_answer_03'=>htmlspecialchars($this->input->post('admin_answer_03'))
      );
      $return = $this->admin_model->add($admin_register);
      $user = $return['id'];
      $this->session->set_flashdata('message', 'admin '.$user.' 등록 완료.');

    }else{
      $this->session->set_flashdata('message', 'admin 등록 실패.');
      //플래시데이터에 입력하고 유저리스트로 이동하기.
    }

    $this->load->helper('url');
    redirect('/admin_user/list');

  }

  public function searchId(){
    $userId = htmlspecialchars($this->input->get('userId'));
    if(isset($_GET)){
      $this->load->model('admin_model');
      $return = $this->admin_model->getsId(array('userId'=>htmlspecialchars($userId)));
      // var_dump($return);
      if($return){
        $idresult = 0;
      }else{
        $idresult = 1;
      }
    }else{
      $idresult = 2;
    }
    echo $idresult;
  }



}
