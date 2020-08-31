<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller {

   function __construct()
   {
       parent::__construct();

   }

   public function _product_css(){
     $this->load->view('/product/product_css');
   }

   function _product_js(){
     $this->load->view('/product/product_js');
   }

   public function product_detail($category){
          $this->_require_login_User();
          $this->_head();
          $this->_product_css();

          if(isset($category)){
            //카테고리 구하는 sql
            // 카테고리 결과
            // if(카테고리 번호 == $category){
            //   $catergory_info = 카테고리결과;
            // }else{
            //   $catergory_info = 0;
            // }

            if($category == 0){
              $list_info = 'category';
              $catergory_info = 0;
            }else{
            $list_info = 'category';
            $catergory_info = 0;
          }
        }
          $this->_breadcrumb(array('page_name' => $list_info,'page_num' => $catergory_info));
          $this->load->view('product_detail');

          $this->_product_js();
          $this->_footer();
   }

  public function product_list($category){
    $this->_head();
    $this->_product_css();

    if(isset($category)){
      //카테고리 구하는 sql
      // 카테고리 결과
      // if(카테고리 번호 == $category){
      //   $catergory_info = 카테고리결과;
      // }else{
      //   $catergory_info = 0;
      // }

      if($category == 0){
        $list_info = 'category';
        $catergory_info = 0;
      }else{
      $list_info = 'category';
      $catergory_info = 0;
    }
  }

    $this->_breadcrumb(array('page_name' => $list_info,'page_num' => $catergory_info));

    $this->load->view('product_top');
    // $this->load->view('product_side');
    $this->load->view('product_list');
    $this->load->view('product_bottom');

    $this->_product_js();
    $this->_footer();
  }

  public function order_page(){
    $this->_head();

    $this->_breadcrumb(array('page_name' => 'oderpage'));
    $this->load->view('order_page');
    $this->_footer();
  }


}
