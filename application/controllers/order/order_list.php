<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class order_list extends MY_Controller {

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
	public function paging()
	{
    $limit = $_POST['limit'];
    $offset = ($_POST['page'] - 1) * $limit;
    // var_dump($_POST['page']);
    $pagingData = array('limit' => $limit, 'offset' => $offset);

    $this->load->model('user/product/product_model');
    $this->load->model('user/product/product_detail_model');
    $this->load->model('user/order/order_model');
    $this->load->model('user/order/order_detail_model');
    $this->load->model('user/product/option/option_code_model');
    $this->load->model('user/product/thumnail/product_thumnail_model');

    $user_no = $this->session->userdata('user_no');
    $order_info = $this->order_model->getList($pagingData);

    /* 주문상세*/
    for ($i=0; $i < count($order_info); $i++) {
      $order_no = $order_info[$i]['no'];
      $order_detail_info[$i] = $this->order_detail_model->gets($order_no);
    }
    /* 주문상세*/

    /* 상품번호 && 옵션코드번호 */
    for ($i=0; $i < count($order_detail_info); $i++) {
      for ($k=0; $k < count($order_detail_info[$i]) ; $k++) {
        $product_detail_no[$i] = $order_detail_info[$i][$k]['product_detail_no'];
        $option_code_no = $this->product_detail_model->getCode($product_detail_no[$i]);
        $option_code_info[$i][$k] = $this->option_code_model->gets($option_code_no[0]['option_code_no']);
        $product_no[$i][$k] = $this->product_detail_model->getProduct($product_detail_no[$i]);
      }
    }
    /* 상품번호 && 옵션코드번호 */

    /* 상품 이름 && 이미지*/
    for ($i=0; $i < count($product_no); $i++)
    {
      for ($k=0; $k < count($product_no[$i]); $k++)
      {
        $product_number = $product_no[$i][$k][0]['product_no'];
        $product_info[$i][$k] = $this->product_model->gets($product_number);
        $thumnail_info[$i][$k] = $this->product_thumnail_model->getOne($product_number);
      }
    }
    // var_dump($thumnail_info);
    $result['order_detail_info']= $order_detail_info;
    $result['order_info']= $order_info;
    $result['thumnail_info']= $thumnail_info;
    $result['product_info']= $product_info;
    $result['option_code_info']= $option_code_info;

    echo json_encode($result);
	}
}
