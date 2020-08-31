<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mypage extends MY_Controller {

   function __construct()
   {
       parent::__construct();

   }


  public function index()
  {
    $mypage_num = 0;
    //로그인 확인 기능 들어감
    $this->load->helper('url');
    redirect('/user/mypage/get/'.$mypage_num);
  }

  public function get($page_num)
  {
    //로그인 확인 기능 들어감
    $this->_require_login_User();
    $this->_head();
    $this->_breadcrumb(array('page_name' => 'mypage','page_num'=>$page_num ));
    // $this->load->view('옆에 메뉴 탑 따로 들어가야 함');
    $this->load->view('mypage/mypage_top');
    $this->load->view('mypage/mypage_side', array('page_num' => $page_num));
    switch ($page_num) {
      case 0:
            //회원정보
            $user_no = $this->session->userdata('user_no');
            $this->load->model('user/user_model');
            $user_info = $this->user_model->searchNo($user_no);

            $this->load->view('mypage/mypage',array('user_info'=>$user_info));
        break;

      case 1:
            //관심상품 리스트
            $user_no = $this->session->userdata('user_no');
            $this->load->model('/user/product/wishlist/wishlist_model');
            $this->load->model('user/product/product_model');
            $this->load->model('user/product/thumnail/product_thumnail_model');
            $this->load->model('/user/product/category/product_category_model');
            $wishlist_info = $this->wishlist_model->getUser($user_no);
            $wishlist_count = count($wishlist_info);
            for ($i=0; $i < $wishlist_count; $i++) {
              $product_no = $wishlist_info[$i]['product_no'];
              $product_info[$i] = $this->product_model->gets($product_no);
              $product_thumnail_info[$i] = $this->product_thumnail_model->getOne($product_no);
            }

            for ($i=0; $i < count($product_info) ; $i++) {
              $category_no[$i] = $product_info[$i][0]['product_main_category_id'];
                if(isset($product_info[$i][0]['product_middle_category_id'])){
                  $category_no[$i] = $product_info[$i][0]['product_middle_category_id'];
                }
                if(isset($product_info[0]['product_sub_category_id'])){
                  $category_no[$i] = $product_info[$i][0]['product_sub_category_id'];
                }
            }
            for ($i=0; $i < count($category_no); $i++) {
              $category_info[$i] = $this->product_category_model->gets($category_no[$i]);
            }

            $this->load->view('wishlist', array(
              'wishlist_info' => $wishlist_info,
              'product_info' => $product_info,
              'category_info' => $category_info,
              'product_thumnail_info' => $product_thumnail_info
            ));
        break;

      case 2:
            //장바구니 리스트
            $this->load->model('user/cart/mall_cart_model');
            $this->load->model('user/product/product_model');
            $this->load->model('user/product/product_detail_model');
            $this->load->model('user/product/option/option_code_model');
            $this->load->model('user/product/thumnail/product_thumnail_model');
            $this->load->model('user/product/delivery/delivery_info_model');
            $this->load->model('user/product/delivery/inoutput_info_model');
            $user_no = $this->session->userdata('user_no');
            $cart_info = $this->mall_cart_model->searchUser($user_no);
            // echo "<pre>";
            // var_dump($cart_info);
            // echo "</pre>";

            for ($i=0; $i < count($cart_info) ; $i++) {
              $product_info[$i] = $this->product_model->gets($cart_info[$i]['product_no']);
              // var_dump($product_info);
              $product_thumnail_info[$i] = $this->product_thumnail_model->gets($cart_info[$i]['product_no']);

              $delivery_no = $this->inoutput_info_model->gets($product_info[$i][0]['inoutput_info_no']);
              // var_dump($delivery_no);
              $output_no[$i] = $this->delivery_info_model->outputGets($delivery_no[0]['output_no']);
              $input_no[$i] = $this->delivery_info_model->inputGets($delivery_no[0]['input_no']);

              $option_code_no = $this->product_detail_model->getCode($cart_info[$i]['product_detail_no']);
              // var_dump($option_code_no);
              $option_code_info[$i] = $this->option_code_model->gets($option_code_no[0]['option_code_no']);

            }
            if(isset($product_info)){
              $this->load->view('cart_basket',array(
                'cart_info' => $cart_info,
                'product_info' => $product_info,
                'thumnail_info' => $product_thumnail_info,
                'option_code_info' => $option_code_info,
                'input_no' => $input_no,
                'output_no' => $output_no,
              ));
            }else{
              $this->load->view('cart_basket');
            }
        break;
      case 3:
            // 주문리스트
            $this->load->model('user/product/product_model');
            $this->load->model('user/product/product_detail_model');
            $this->load->model('user/order/order_model');
            $this->load->model('user/order/order_detail_model');
            $this->load->model('user/product/option/option_code_model');
            $this->load->model('user/product/thumnail/product_thumnail_model');
            $user_no = $this->session->userdata('user_no');
            $order_info = $this->order_model->gets($user_no);
            $allData = count($order_info);
            $defaultPage = 1;
            /* 주문상세*/
            for ($i=0; $i < count($order_info); $i++) {
              $order_no = $order_info[$i]['no'];
              $order_detail_info[$i] = $this->order_detail_model->gets($order_no);
            }
            /* 주문상세*/

            /* 상품번호 && 옵션코드번호 */
            for ($i=0; $i < count($order_detail_info); $i++) {
              for ($k=0; $k < count($order_detail_info[$i]) ; $k++) {
                $product_detail_no = $order_detail_info[$i][$k]['product_detail_no'];
                $option_code_no = $this->product_detail_model->getCode($product_detail_no);
                $option_code_info[$i][$k] = $this->option_code_model->gets($option_code_no[0]['option_code_no']);
                $product_no[$i][$k] = $this->product_detail_model->getProduct($product_detail_no);
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
            // echo "<pre>";
            // var_dump($thumnail_info);
            // echo "</pre>";
            /* 상품 이름 && 이미지*/

            // var_dump($option_code_no);

            // $this->load->view('/order/order_list', array(
            //   'allData'=>$allData,
            //   'defaultPage'=>$defaultPage,
            //   'order_detail_info'=>$order_detail_info,
            //   'order_info'=>$order_info,
            //   'thumnail_info'=>$thumnail_info,
            //   'product_info'=>$product_info,
            //   'option_code_info'=>$option_code_info
            // ));
            $this->load->view('/order/order_list', array(
              'allData'=>$allData,
              'defaultPage'=>$defaultPage
            ));
        break;

      default:
        // code...
        break;
    }
    $this->load->view('mypage/mypage_bottom');
    $this->_footer();
  }

  public function mypage_update(){
    // var_dump($_POST);
    $session_user_no = $this->session->userdata('user_no');
    $user_no = htmlspecialchars($this->input->post('user_no'));
    if($session_user_no == $user_no)
    {
      $this->load->model('user/user_model');
      $update = $this->user_model->updateAll(array(
        'user_no' => $user_no,
        'user_name' => htmlspecialchars($this->input->post('user_name')),
        'user_email' => htmlspecialchars($this->input->post('user_email')),
        'user_tel1' => htmlspecialchars($this->input->post('user_tel1')),
        'user_tel2' => htmlspecialchars($this->input->post('user_tel2')),
        'zipcode' => htmlspecialchars($this->input->post('zipcode')),
        'address1' => htmlspecialchars($this->input->post('address1')),
        'address2' => htmlspecialchars($this->input->post('address2')),
        'address3' => htmlspecialchars($this->input->post('address3'))
      ));

      if($update !== 0)
      {
        $this->session->set_flashdata('message','정보수정 성공');
        $this->load->helper('url');
        redirect('/mypage');
      }
      else
      {
        $this->session->set_flashdata('message','정보수정 실패');
        $this->load->helper('url');
        redirect('/mypage');
      }
    }
    else
    {
      $this->session->set_flashdata('message','잘못된 접근입니다.');
      $this->load->helper('url');
      redirect('/');
    }
  }
  public function test2(){
    $this->_head();

    $this->load->view('test');

    $this->_footer();
  }
}
