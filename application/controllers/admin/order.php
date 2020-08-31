<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends MY_Controller {

  function __construct()
  {
      parent::__construct();

  }


  public function list()
  {
    $this->_require_admin_login_User();
     $this->_admin_head();

     $this->load->model('/admin/order/order_model');
     $order_list = $this->order_model->gets();
     $data = $order_list;
     $num = count($data);
     $defaultPage = 1;

     $this->load->view('/admin/admin_top');
     $this->load->view('/admin/admin_side');
     $this->load->view('/admin/order/order_list', array('allData' => $num,'defaultPage' => $defaultPage));
     $this->load->view('/admin/admin_bottom');

     $this->_admin_footer();
   }

  public function info_List()
  {
    $limit = $_POST['limit'];
    $offset = ($_POST['page'] - 1) * $limit;
    // var_dump($_POST['page']);
    $pagingData = array('limit' => $limit, 'offset' => $offset);

    $this->load->model('/admin/order/order_model');
    $result = $this->order_model->info_gets($pagingData);

    echo json_encode($result);
   }

  public function detail($order_no)
  {
    $this->load->model('/admin/order/order_model');
    $order_info = $this->order_model->getOne($order_no);
    // var_dump($order_info);

    $this->load->model('admin/product/product_model');
    $this->load->model('admin/product/product_detail_model');
    $this->load->model('admin/order/order_model');
    $this->load->model('admin/order/order_detail_model');
    $this->load->model('admin/option/option_code_model');
    $this->load->model('admin/product/product_thumnail_model');
    $this->load->model('admin/delivery/inoutput_info_model');
    $this->load->model('admin/delivery/delivery_info_model');

    $order_detail_info = $this->order_detail_model->gets($order_no);

    /* option_code_no && product_no */
    for ($i=0; $i < count($order_detail_info) ; $i++) {
      $code_no[$i] = $this->product_detail_model->getCode($order_detail_info[$i]['product_detail_no']);
      $product_no[$i] = $this->product_detail_model->getProduct($order_detail_info[$i]['product_detail_no']);
    }
    /* option_code_no && product_no */

    /* product_info && thumnail_info && inoutput_info_no */
    for ($i=0; $i < count($product_no) ; $i++) {
      $product_info[$i] =  $this->product_model->getProd($product_no[$i][0]['product_no']);
      $inoutput_no[$i] =  $this->product_model->getInout($product_no[$i][0]['product_no']);
      $thumnail_info[$i] =  $this->product_thumnail_model->getOne($product_no[$i][0]['product_no']);
    }
    /* product_info && thumnail_info && inoutput_info_no*/

    for ($i=0; $i < count($inoutput_no); $i++) {
      $inout_info[$i] =  $this->inoutput_info_model->gets($inoutput_no[$i][0]['inoutput_info_no']);
      $output_info[$i] =  $this->delivery_info_model->outputGets($inout_info[$i][0]['output_no']);
      $input_info[$i] =  $this->delivery_info_model->inputGets($inout_info[$i][0]['input_no']);
    }

    /* option_code_info  */
    for ($i=0; $i < count($code_no) ; $i++) {
      $option_code_info[$i] =  $this->option_code_model->search($code_no[$i][0]['option_code_no']);
    }
    /* option_code_info  */


    $this->_admin_head();

    $this->load->view('/admin/admin_top');
    $this->load->view('/admin/admin_side');
    $this->load->view('/admin/order/order_detail', array(
      'order_info' => $order_info,
      'order_detail_info' => $order_detail_info,
      'product_info' => $product_info,
      'thumnail_info' => $thumnail_info,
      'output_info' => $output_info,
      'option_code_info' => $option_code_info
    ));
    $this->load->view('/admin/admin_bottom');

    $this->_admin_footer();
  }

  public function update()
  {
    // var_dump($_POST);
      $order_no = htmlspecialchars($this->input->post('order_no'));
      $reciever_name = htmlspecialchars($this->input->post('reciever_name'));
      $reciever_tel1 = htmlspecialchars($this->input->post('reciever_tel1'));
      $reciever_tel2 = htmlspecialchars($this->input->post('reciever_tel2'));
      $reciever_zipcode = htmlspecialchars($this->input->post('reciever_zipcode'),ENT_QUOTES, 'ISO-8859-1', false);
      $reciever_address1 = htmlspecialchars($this->input->post('reciever_address1'), ENT_QUOTES, 'ISO-8859-1', false);
      $reciever_address2 = htmlspecialchars($this->input->post('reciever_address2'), ENT_QUOTES, 'ISO-8859-1', false);
      $reciever_address3 = htmlspecialchars($this->input->post('reciever_address3'), ENT_QUOTES, 'ISO-8859-1', false);
      $delivery_msg = htmlspecialchars($this->input->post('delivery_msg'), ENT_QUOTES, 'ISO-8859-1', false);
      $order_status = htmlspecialchars($this->input->post('order_status_select'));

      $option =  array(
        'order_no' => $order_no,
        'reciever_name' => $reciever_name,
        'reciever_tel1' => $reciever_tel1,
        'reciever_tel2' => $reciever_tel2,
        'reciever_zipcode' => $reciever_zipcode,
        'reciever_address1' => $reciever_address1,
        'reciever_address2' => $reciever_address2,
        'reciever_address3' => $reciever_address3,
        'delivery_msg' => $delivery_msg,
        'order_status' => $order_status
      );
      $this->load->model('admin/order/order_detail_model');
      $result = $this->order_detail_model->update($option);

      if($result !== 0)
      {
        $this->session->set_flashdata('message','주문 정보 수정 성공');
        $this->load->helper('url');
        redirect('/admin/order/list');
      }
      else
      {
        $this->session->set_flashdata('message','주문 정보 수정 실패');
        $this->load->helper('url');
        redirect('/admin/order/list');
      }

  }

}
