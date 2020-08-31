<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class order extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
   function __construct()
   {
       parent::__construct();

   }
	public function index()
	{
        $this->_require_login_User();
        // var_dump($_POST);
        $user_no = $this->session->userdata('user_no');

        if(isset($_POST['cart_no']))
        {
          $cart_no = $_POST['cart_no'];
          $cart_no = explode(',',$cart_no);
          $this->load->model('user/cart/mall_cart_model');
          $this->load->model('user/product/product_model');
          $this->load->model('user/product/product_detail_model');
          $this->load->model('user/product/option/option_code_model');
          $this->load->model('user/product/thumnail/product_thumnail_model');
          $this->load->model('user/product/delivery/delivery_info_model');
          $this->load->model('user/product/delivery/inoutput_info_model');
          $this->load->model('user/user_model');

          for ($i=0; $i < count($cart_no) ; $i++) {
            $cart_info[$i] = $this->mall_cart_model->searchNo($cart_no[$i]);
            // var_dump($cart_info[$i][0]);

            $product_info[$i] = $this->product_model->gets($cart_info[$i][0]['product_no']);

            $inoutput_info_model[$i] = $this->inoutput_info_model->gets($product_info[$i][0]['inoutput_info_no']);
            $input_info[$i] = $this->delivery_info_model->inputGets($inoutput_info_model[$i][0]['input_no']);
            $output_info[$i] = $this->delivery_info_model->outputGets($inoutput_info_model[$i][0]['output_no']);

            $thumnail_info[$i] = $this->product_thumnail_model->gets($cart_info[$i][0]['product_no']);
            $option_code[$i] = $this->product_detail_model->getCode($cart_info[$i][0]['product_detail_no']);
            // var_dump($option_code[$i][0]['option_code_no']);
            // var_dump($option_code[$i][0]);
            $option_code_info[$i] = $this->option_code_model->gets($option_code[$i][0]['option_code_no']);
            $user_info[$i] = $this->user_model->searchNo($cart_info[$i][0]['user_no']);
          }

          // echo "<pre>";
          // echo "product_info <br />";
          // var_dump($product_info);
          // echo "option_code <br />";
          // var_dump($option_code);
          // echo "option_code_info <br />";
          // var_dump($option_code_info);
          // echo "user_info <br />";
          // var_dump($user_info);
          // echo "</pre>";

          $product_qty = $_POST['product_qty'];
          $product_qty = explode(',',$product_qty);
          $delivery_method = $_POST['delivery'];
          $delivery_method = explode(',',$delivery_method);

          // var_dump($delivery_method);

          $all_product_price = $_POST['all_product_price'];
          $all_delivery_price = $_POST['all_delivery_price'];
          $all_total_price = $_POST['all_total_price'];

          $this->_head();
          $this->_breadcrumb(array('page_name' => 'order_payment','page_num'=>0 ));
          $this->load->view('/order/order_page',array(
            'product_info'=>$product_info,
            'input_info'=>$input_info,
            'output_info'=>$output_info,
            'thumnail_info'=>$thumnail_info,
            'option_code'=>$option_code,
            'option_code_info'=>$option_code_info,
            'product_qty'=>$product_qty,
            'cart_info'=>$cart_info,
            'user_info'=>$user_info,
            'all_product_price'=>$all_product_price,
            'all_delivery_price'=>$all_delivery_price,
            'all_total_price'=>$all_total_price,
            'delivery_method'=>$delivery_method
          ));

          $this->_footer();
        }
        else
        {
          // var_dump($_POST);
          $total_price = $_POST['total_price'];
          $delivery_method = $_POST['delivery_method'];

          $product_qty = $_POST['product_qty'];
          $product_qty = explode(',',$product_qty);

          $detail_no = $_POST['detail_no'];
          $detail_no = explode(',',$detail_no);

          // echo "<pre>";
          // var_dump($_POST);
          // echo "</pre>";

          $this->load->model('user/product/product_model');
          $this->load->model('user/product/product_detail_model');
          $this->load->model('user/product/option/option_code_model');
          $this->load->model('user/product/thumnail/product_thumnail_model');
          $this->load->model('user/product/delivery/delivery_info_model');
          $this->load->model('user/product/delivery/inoutput_info_model');
          $this->load->model('user/user_model');

          for ($i=0; $i < count($detail_no); $i++) {
            $product_no = $this->product_detail_model->getProduct($detail_no[$i]);
            $product_info = $this->product_model->gets($product_no[0]['product_no']);
            $code_no[$i] = $this->product_detail_model->getCode($detail_no[$i]);
            $option_code_info[$i] = $this->option_code_model->gets($code_no[$i][0]['option_code_no']);
          }


          $thumnail_info = $this->product_thumnail_model->gets($product_no[0]['product_no']);
          $inoutput_no = $this->product_model->getInout($product_no[0]['product_no']);
          $delivery_no = $this->inoutput_info_model->gets($inoutput_no[0]['inoutput_info_no']);
          $output_info = $this->delivery_info_model->outputGets($delivery_no[0]['output_no']);
          $user_info = $this->user_model->searchNo($user_no);

          // echo "<pre>";
          // var_dump($user_info);
          // echo "</pre>";

          $this->_head();
          $this->_breadcrumb(array('page_name' => 'order_payment','page_num'=>0 ));
          $this->load->view('/order/order_page',array(
            'total_price'=>$total_price,
            'product_qty'=>$product_qty,
            'detail_no'=>$detail_no,
            'product_info'=>$product_info,
            'thumnail_info'=>$thumnail_info,
            'option_code_info'=>$option_code_info,
            'output_info'=>$output_info,
            'delivery_method'=>$delivery_method,
            'user_info'=>$user_info,
            'all_total_price'=>$total_price

          ));

          $this->_footer();
        }

	}

  public function payment()
  {
    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";

    $user_info = json_decode($_POST['user_info'],true);
    // var_dump($user_info);
    $user_no = $user_info[0][0]['no'];
    // var_dump($user_no);
    $order_tel1 = $_POST['order_tel1'];
    $order_tel2 = $_POST['order_tel2'];

    // $this->db->trans_start();
      $this->load->model('user/user_model');
      $user = $this->user_model->searchNo($user_no);
      // var_dump($user);
      // var_dump($user[0]['tel1']);
      $user_name = $user[0]['name'];
      $user_zipcode = $user[0]['zipcode'];
      $user_address1 = $user[0]['address1'];
      $user_address2 = $user[0]['address2'];
      $user_address3 = $user[0]['address3'];
      $user_tel1 = $user[0]['tel1'];
      $user_tel2 = $user[0]['tel2'];

      $cart_info = json_decode($_POST['cart_info'],true);
      // var_dump($cart_info);
      $product_qty = $_POST['product_qty_arr'];
      $reciever_name = $_POST['reciever_name'];
      $reciever_tel1 = $_POST['reciever_tel1'];
      $reciever_tel2 = $_POST['reciever_tel2'];
      $reciever_zipcode = $_POST['reciever_zipcode'];
      $reciever_adress1 = $_POST['reciever_adress1'];
      $reciever_adress2 = $_POST['reciever_adress2'];
      $reciever_adress3 = $_POST['reciever_adress3'];
      $status = $_POST['status'];
      $paymethod = $_POST['paymethod'];
      $deliveryMsg = $_POST['deliveryMsg'];
      $delivery_method = $_POST['delivery_method_arr'];
      $payment = $_POST['all_total_price'];
      // var_dump($user_info[$i][0]['no']);

      // echo "시작 전";
      if($user[0]['tel1'] == null || $user[0]['tel1'] == '')
      {
          $result = $this->user_model->updateTel1(array(
            'user_no' =>$user_no,
            'tel1' =>$order_tel1
        ));
        if($result == 1){
          echo "성공";
        }else{
          echo "실패";
        }
      }

      $this->load->model('user/order/order_model');
      $order_no = $this->order_model->add(array(
        'order_name' => $user_name,
        'order_zipcode' => $user_zipcode,
        'order_address1' => $user_address1,
        'order_address2' => $user_address2,
        'order_address3' => $user_address3,
        'order_tel1' => $user_tel1,
        'order_tel2' => $user_tel2,
        'reciever_name' => $reciever_name,
        'reciever_zipcode' => $reciever_zipcode,
        'reciever_address1' => $reciever_adress1,
        'reciever_address2' => $reciever_adress2,
        'reciever_address3' => $reciever_adress3,
        'reciever_tel1' => $reciever_tel1,
        'reciever_tel2' => $reciever_tel2,
        'payment' => $payment,
        'paymethod' => $paymethod,
        'status' => $status,
        'msg' => $deliveryMsg,
        'user_no' => $user_no
      ));
      for ($i=0; $i < count($cart_info) ; $i++)
      {
      $this->load->model('user/order/order_detail_model');
      $order_detail_no = $this->order_detail_model->add(array(
          'qty' => $product_qty[$i] ,
          'delivery_method' => $delivery_method[$i] ,
          'order_no' => $order_no,
          'product_detail_no' => $cart_info[$i][0]['product_detail_no']
        ));
        if($order_detail_no !== null || $order_detail_no !== '')
        {
          $this->load->model('user/cart/mall_cart_model');
          $cart_delete[$i] = $this->mall_cart_model->delete($cart_info[$i][0]['no']);
        }
      }

    $this->db->trans_complete();

    if (in_array(0, $cart_delete))
    {
      $result = 0;
    }
    else
    {
      $result = 1;
      $this->session->set_flashdata('message','결제완료.');
      echo json_encode($result);
    }
  }

  public function fastPayment()
  {
    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";

    $user_info = json_decode($_POST['user_info'],true);
    $detail_no = json_decode($_POST['detail_no'],true);
    // var_dump($user_info);
    var_dump($detail_no);
    $user_no = $user_info[0]['no'];
    // var_dump($user_no);
    $order_tel1 = $_POST['order_tel1'];
    $order_tel2 = $_POST['order_tel2'];

    // $this->db->trans_start();
      $this->load->model('user/user_model');
      $user = $this->user_model->searchNo($user_no);
      // var_dump($user);
      // var_dump($user[0]['tel1']);
      $user_name = $user[0]['name'];
      $user_zipcode = $user[0]['zipcode'];
      $user_address1 = $user[0]['address1'];
      $user_address2 = $user[0]['address2'];
      $user_address3 = $user[0]['address3'];
      $user_tel1 = $user[0]['tel1'];
      $user_tel2 = $user[0]['tel2'];

      $product_qty = $_POST['product_qty_arr'];
      $reciever_name = $_POST['reciever_name'];
      $reciever_tel1 = $_POST['reciever_tel1'];
      $reciever_tel2 = $_POST['reciever_tel2'];
      $reciever_zipcode = $_POST['reciever_zipcode'];
      $reciever_adress1 = $_POST['reciever_adress1'];
      $reciever_adress2 = $_POST['reciever_adress2'];
      $reciever_adress3 = $_POST['reciever_adress3'];
      $status = $_POST['status'];
      $paymethod = $_POST['paymethod'];
      $deliveryMsg = $_POST['deliveryMsg'];
      $delivery_method = $_POST['delivery_method_arr'];
      $payment = $_POST['all_total_price'];
      // var_dump($user_info[$i][0]['no']);

      // echo "시작 전";
      if($user[0]['tel1'] == null || $user[0]['tel1'] == '')
      {
          $result = $this->user_model->updateTel1(array(
            'user_no' =>$user_no,
            'tel1' =>$order_tel1
        ));
        if($result == 1){
          echo "성공";
        }else{
          echo "실패";
        }
      }

      $this->load->model('user/order/order_model');
      $order_no = $this->order_model->add(array(
        'order_name' => $user_name,
        'order_zipcode' => $user_zipcode,
        'order_address1' => $user_address1,
        'order_address2' => $user_address2,
        'order_address3' => $user_address3,
        'order_tel1' => $user_tel1,
        'order_tel2' => $user_tel2,
        'reciever_name' => $reciever_name,
        'reciever_zipcode' => $reciever_zipcode,
        'reciever_address1' => $reciever_adress1,
        'reciever_address2' => $reciever_adress2,
        'reciever_address3' => $reciever_adress3,
        'reciever_tel1' => $reciever_tel1,
        'reciever_tel2' => $reciever_tel2,
        'payment' => $payment,
        'paymethod' => $paymethod,
        'status' => $status,
        'msg' => $deliveryMsg,
        'user_no' => $user_no
      ));
      for ($i=0; $i < count($detail_no) ; $i++)
      {
      $this->load->model('user/order/order_detail_model');
      $order_detail_no = $this->order_detail_model->add(array(
          'qty' => $product_qty[$i] ,
          'delivery_method' => $delivery_method[$i] ,
          'order_no' => $order_no,
          'product_detail_no' => $detail_no[$i]
        ));
      }

    $this->db->trans_complete();

    if (in_array(0, $order_detail_no))
    {
      $result = 0;
    }
    else
    {
      $result = 1;
      $this->session->set_flashdata('message','결제완료.');
      echo json_encode($result);
    }
  }


  public function detail($order_no){
    $this->_require_login_User();
    $session_user = $this->session->userdata('user_no');
    $this->load->model('user/product/product_model');
    $this->load->model('user/product/product_detail_model');
    $this->load->model('user/order/order_model');
    $this->load->model('user/order/order_detail_model');
    $this->load->model('user/product/option/option_code_model');
    $this->load->model('user/product/thumnail/product_thumnail_model');
    $this->load->model('user/product/delivery/inoutput_info_model');
    $this->load->model('user/product/delivery/delivery_info_model');

    $order_info = $this->order_model->getByNumber($order_no);

    if($order_info[0]['user_no'] !== $session_user)
    {
      $this->session->set_flashdata('message','잘못된 접근입니다.');
      $this->load->helper('url');
      redirect('/');
    }
    else
    {
      $order_detail_info = $this->order_detail_model->gets($order_no);

      /* option_code_no && product_no */
      for ($i=0; $i < count($order_detail_info) ; $i++) {
        $code_no[$i] = $this->product_detail_model->getCode($order_detail_info[$i]['product_detail_no']);
        $product_no[$i] = $this->product_detail_model->getProduct($order_detail_info[$i]['product_detail_no']);
      }
      /* option_code_no && product_no */

      /* product_info && thumnail_info && inoutput_info_no */
      for ($i=0; $i < count($product_no) ; $i++) {
        $product_info[$i] =  $this->product_model->gets($product_no[$i][0]['product_no']);
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
        $option_code_info[$i] =  $this->option_code_model->gets($code_no[$i][0]['option_code_no']);
      }
      /* option_code_info  */

      // echo "<pre>";
      // var_dump($output_info);
      // echo "</pre>";

      $this->_head();
      $this->_breadcrumb(array('page_name' => 'order_detail','page_num'=>0 ));
      $this->load->view('mypage/mypage_top');
      $this->load->view('mypage/mypage_side', array('page_num' => 3));
      $this->load->view('/order/order_detail', array(
        'order_info' => $order_info,
        'order_detail_info' => $order_detail_info,
        'product_info' => $product_info,
        'thumnail_info' => $thumnail_info,
        'output_info' => $output_info,
        'option_code_info' => $option_code_info
      ));

      $this->load->view('mypage/mypage_bottom');
      $this->_footer();
    }


  }
}
