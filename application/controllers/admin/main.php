<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller {

   function __construct()
   {
       parent::__construct();

   }

  public function index(){

    $this->_require_admin_login_User();
    // 총 상품 수
    // 전체 후기/상품문의
    // 오늘 주문 수
    // 오늘 주문금액

    /* 주문리스트 && 총 주문수 */
    $this->load->model('/admin/order/order_model');
    $order_list = $this->order_model->gets();
    $data = $order_list;
    $order_count = count($data);
    $defaultPage = 1;
    /* 주문리스트 && 총 주문수 */

    /* 총 주문금액 */
    for ($i=0; $i < $order_count; $i++) {
      $order_cost[$i] = $order_list[$i]['payment'];
    }
    $order_sum_cost = array_sum($order_cost);
    /* 총 주문 금액 */

    /* 총 상품수 */
    $this->load->model('/admin/product/product_model');
    $product_list = $this->product_model->gets();
    $product_count = count($product_list);
    /* 총 상품수 */

    /* 오늘 주문 수 */
    // SELECT * FROM `order` WHERE DATE_FORMAT(regdate, "%Y-%m-%d") = CURDATE();
    $today_order_list = $this->order_model->getToday();
    if(isset($today_order_list)){
      $today_order_count = count($today_order_list);
      /* 오늘 주문금액 */
      for ($i=0; $i < $today_order_count; $i++) {
        $today_order_cost[$i] = $today_order_list[$i]['payment'];
      }
      if(isset($today_order_cost)){
      $today_order_sum_cost = array_sum($today_order_cost);
    }
      /* 오늘 주문 금액 */
      $num = '아직';
    }
    /* 오늘 주문 수 */

    $this->_admin_head();
    $this->load->view('/admin/admin_top');
    $this->load->view('/admin/admin_side');
    if(isset($today_order_sum_cost))
    {
    $this->load->view('/admin/main',  array(
        'allData' => $order_count,
      'defaultPage' => $defaultPage,
      'allOrderCount' => $order_count,
      'allOrderCost' => $order_sum_cost,
      'todayOrderCount' => $today_order_count,
      'todayOrderCost' => $today_order_sum_cost,
      'allProductCount' => $product_count,
      'allreviewCount' => $num,
      'allQnACount' => $num
    ));
  }
  else
  {
    $this->load->view('/admin/main',  array(
        'allData' => $order_count,
      'defaultPage' => $defaultPage,
      'allOrderCount' => $order_count,
      'allOrderCost' => $order_sum_cost,
      'todayOrderCount' => 0,
      'todayOrderCost' => 0,
      'allProductCount' => $product_count,
      'allreviewCount' => $num,
      'allQnACount' => $num
    ));
  }
    $this->load->view('/admin/admin_bottom');
    $this->_admin_footer();


   }

   public function dext(){
     //
     $result = $this->db->query("SELECT question2 FROM admin_user where no = '1'")->result();
     var_dump($result);
     // var_dump(dechex(bindec($result)));
   }


}
