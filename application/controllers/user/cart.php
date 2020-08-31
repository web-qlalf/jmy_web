<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends MY_Controller {

   function __construct()
   {
       parent::__construct();

   }


  public function index($cart_no)
  {
    echo "장바구니 번호: ".$cart_no;
  }

  public function addCart(){
    $this->_require_login_User();
    // var_dump($_POST);
    $user_no = $_POST['user_no'];
    $product_no = $_POST['product_no'];

    $qty = $_POST['qty'];
    $product_detail_no = $_POST['product_detail_no'];

    $this->load->model('user/cart/mall_cart_model');

    for ($i=0; $i < count($qty) ; $i++) {
      $return_detail = $this->mall_cart_model->searchDetail(array('product_detail_no' =>$product_detail_no[$i]));

      // var_dump($return_detail[0]['product_detail_no']);
      if(!isset($return_detail[0]['product_detail_no'])){
          $return[$i] = $this->mall_cart_model->add(array(
            'user_no'=>$user_no,
            'product_no'=>$product_no,
            'qty'=>$qty[$i],
            'product_detail_no'=>$product_detail_no[$i]
          ));

          // $return = 1;
      }else{
        $return = null;
      }
    }

    if($return == 0 || $return == null){
      $result = 1;
    }else{
      $result = 0;
    }
    echo json_decode($result);
  }

}
