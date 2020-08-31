<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delivery extends MY_Controller {

   function __construct()
   {
       parent::__construct();

   }
   public function list(){
     $this->_require_admin_login_User();
    $this->load->model('admin/delivery/delivery_info_model');
    $result = $this->delivery_info_model->gets();
    $data = $result;
    $num = count($data);
    $defaultPage = 1;

    $this->_admin_head();

     $this->load->view('/admin/admin_top');
     $this->load->view('/admin/admin_side');
     $this->load->view('/admin/delivery/list', array('allData' => $num,'defaultPage' => $defaultPage));
     $this->load->view('/admin/admin_bottom');

    $this->_admin_footer();
   }

   public function delivery_info_List(){

      $limit = $_POST['limit'];
      $offset = ($_POST['page'] - 1) * $limit;
      // var_dump($_POST['page']);
      $pagingData = array('limit' => $limit, 'offset' => $offset);

      $this->load->model('admin/delivery/delivery_info_model');
      $result = $this->delivery_info_model->delivery_info_gets($pagingData);

      echo json_encode($result);

   }

   public function add(){
    $this->_admin_head();

     $this->load->view('/admin/admin_top');
     $this->load->view('/admin/admin_side');
     $this->load->view('/admin/delivery/add');
     $this->load->view('/admin/admin_bottom');

    $this->_admin_footer();
   }

   public function update($delivery_no){

     $this->load->model('admin/delivery/delivery_info_model');
     $result = $this->delivery_info_model->update_info_gets($delivery_no);

     $this->_admin_head();

     $this->load->view('/admin/admin_top');
     $this->load->view('/admin/admin_side');
     $this->load->view('/admin/delivery/update', array('update_info' => $result));
     $this->load->view('/admin/admin_bottom');

    $this->_admin_footer();
   }

   public function addInfo(){
     // var_dump($_POST);
     if(isset($_POST['shipping_name'])){
         $this->load->model('admin/delivery/delivery_info_model');
         $delivery_info = $this->delivery_info_model->add(array(
           'shipping_name'=> htmlspecialchars($this->input->post('shipping_name')),
           'zipcode'=> htmlspecialchars($this->input->post('zipcode')),
           'address1'=> htmlspecialchars($this->input->post('adress1')),
           'address2'=> htmlspecialchars($this->input->post('adress2')),
           'address3'=> htmlspecialchars($this->input->post('adress3')),
           'delivery_company'=> htmlspecialchars($this->input->post('delivery_company')),
           'delivery_fee1'=> htmlspecialchars($this->input->post('delivery_fee1')),
           'delivery_fee2'=> htmlspecialchars($this->input->post('delivery_fee2')),
           'memo'=> htmlspecialchars($this->input->post('memo'))
         ));
         //등록된 배송지의 고유번호를 리턴 받음
         $this->load->helper('url');
         $returnURL = '/admin_delivery/list';
         redirect($returnURL);
     }else{
       $this->session->set_flashdata('message','주소 추가 실패.');
       $this->load->helper('url');
       redirect("/admin_delivery/new_delivery");
     }
   }

   public function updateInfo($delivery_no){
     // var_dump($_POST);
     if(isset($_POST['shipping_name'])){
         $this->load->model('admin/delivery/delivery_info_model');
         $delivery_info = $this->delivery_info_model->update(array(
           'no'=> htmlspecialchars($delivery_no),
           'shipping_name'=> htmlspecialchars($this->input->post('shipping_name')),
           'zipcode'=> htmlspecialchars($this->input->post('zipcode')),
           'address1'=> htmlspecialchars($this->input->post('adress1')),
           'address2'=> htmlspecialchars($this->input->post('adress2')),
           'address3'=> htmlspecialchars($this->input->post('adress3')),
           'delivery_company'=> htmlspecialchars($this->input->post('delivery_company')),
           'delivery_fee1'=> htmlspecialchars($this->input->post('delivery_fee1')),
           'delivery_fee2'=> htmlspecialchars($this->input->post('delivery_fee2')),
           'memo'=> htmlspecialchars($this->input->post('memo'))
         ));
         // var_dump($delivery_info);
         // var_dump($delivery_no);
         //등록된 배송지의 고유번호를 리턴 받음
         if($delivery_info[0]["no"] == $delivery_no){
           $this->load->helper('url');
           $returnURL = '/admin/delivery/list';
           redirect($returnURL);
         }else{
           $this->session->set_flashdata('message','배송지 수정 실패.');
           $this->load->helper('url');
           redirect("/admin.delivery/update/".$delivery_no);
         }


     }else{
       $this->session->set_flashdata('message','배송지 수정 실패.');
       $this->load->helper('url');
       redirect("/admin.delivery/update/".$delivery_no);
     }
   }

   public function deleteInfo($delivery_no){
     if(isset($delivery_no)){
       $this->load->model('admin/delivery/delivery_info_model');
       $delivery_delete = $this->delivery_info_model->delete($delivery_no);
         if($delivery_delete ==  true){
           $this->session->set_flashdata('message','삭제 성공.');
           $this->load->helper('url');
           redirect("/admin_delivery/list");
         }else{
           $this->session->set_flashdata('message','알 수 없는 오류');
           $this->load->helper('url');
           redirect("/admin_delivery/list");
         }

     }else{
       $this->session->set_flashdata('message','알 수 없는 오류');
       $this->load->helper('url');
       redirect("/admin/delivery/list");
     }

   }

 //-------------------------상품등록시----------------------------------
 public function infoView(){
   if(isset($_POST['delivery_num'])){
     $delivery_num = htmlspecialchars($this->input->post('delivery_num'));
     $this->load->model('admin/delivery/delivery_info_model');
     $infoview = $this->delivery_info_model->info_gets(array('delivery_num'=>htmlspecialchars($delivery_num)));
     echo json_encode($infoview);
   }else{
     echo "잘못된 접근입니다.";
   }
 }
 public function deliveryView(){
   $this->load->model('admin/delivery/delivery_info_model');
   $allview = $this->delivery_info_model->gets();
   echo json_encode($allview);
 }

}
