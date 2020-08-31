<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends MY_Controller {

   function __construct()
   {
       parent::__construct();

   }

   public function index($option)
   {
     // $this->_require_login_User();
     // echo "상품 표지어와요.";
     // echo "페이지 상품번호는".$option."입니다.";
     $this->load->model('/user/product/product_model');
     $this->load->model('/user/product/product_detail_model');
     $this->load->model('/user/product/option/option_code_model');
     $this->load->model('/user/product/option/option_detail_model');
     $this->load->model('/user/product/option/option_model');
     $this->load->model('/user/product/delivery/inoutput_info_model');
     $this->load->model('/user/product/delivery/delivery_info_model');
     $this->load->model('/user/product/category/product_category_model');
     $this->load->model('/user/product/thumnail/product_thumnail_model');
     $this->load->model('/user/product/wishlist/wishlist_model');
     $product_no = $option;
     $product_info = $this->product_model->gets($product_no);
     $thumnais_info = $this->product_thumnail_model->gets($product_no);
     $option_name_info = $this->option_model->gets($product_no);
     if(isset($_SESSION['user_no']))
     {
       $user_no = $_SESSION['user_no'];
       $wishlist_info = $this->wishlist_model->getList(array(
         'user_no' => $user_no,
         'product_no' => $product_no
       ));
     }

     for ($i=0; $i < count($option_name_info) ; $i++) {
       $option_no = $option_name_info[$i]['no'];
       $option_detail_info[$i] = $this->option_detail_model->gets($option_no);
     }


     $detail_info = $this->product_detail_model->gets($product_no);
     for ($i=0; $i < count($detail_info); $i++) {
       $option_code_info[$i] = $this->option_code_model->gets($detail_info[$i]['option_code_no']);
     }

     $inoutput_info = $this->inoutput_info_model->gets($product_info[0]['inoutput_info_no']);
     $input_info = $this->delivery_info_model->inputGets($inoutput_info[0]['input_no']);
     $output_info = $this->delivery_info_model->outputGets($inoutput_info[0]['output_no']);


     $category_no[0] = $product_info[0]['product_main_category_id'];
     if(isset($product_info[0]['product_middle_category_id'])){
       $category_no[1] = $product_info[0]['product_middle_category_id'];
     }
     if(isset($product_info[0]['product_sub_category_id'])){
       $category_no[2] = $product_info[0]['product_sub_category_id'];
     }

     for ($i=0; $i < count($category_no); $i++) {
       $category_info[$i] = $this->product_category_model->gets($category_no[$i]);
     }

    $this->_head();
    $this->_breadcrumb(array(
      'page_name' => 'product',
      'page_num'=> $category_info
      //상품번호 또는 카테고리
        ));
    if(isset($_SESSION['user_no']))
    {
    $this->load->view('product/detail', array(
           'product_info' => $product_info,
           'detail_info' => $detail_info,
           'option_code_info' => $option_code_info,
           'option_name_info' => $option_name_info,
           'option_detail_info' => $option_detail_info,
           'input_info' => $input_info,
           'output_info' => $output_info,
           'thumnais_info' => $thumnais_info,
           'category_info' => $category_info,
           'wishlist_info' => $wishlist_info
       ));
     }
    $this->load->view('product/detail', array(
           'product_info' => $product_info,
           'detail_info' => $detail_info,
           'option_code_info' => $option_code_info,
           'option_name_info' => $option_name_info,
           'option_detail_info' => $option_detail_info,
           'input_info' => $input_info,
           'output_info' => $output_info,
           'thumnais_info' => $thumnais_info,
           'category_info' => $category_info
       ));
         $this->_footer();
   }

   public function category($category_no)
   {
     // $this->_require_login_User();
     // echo "상품 카테고리";
     // echo "상품 카테고리번호는".$category_no."입니다.";
     $this->load->model('/user/product/category/product_category_model');
     $this->load->model('/user/product/product_model');
     $this->load->model('/user/product/thumnail/product_thumnail_model');
     $this->load->model('/user/product/wishlist/wishlist_model');
     $category_info = $this->product_category_model->gets($category_no);
     $category_class = $category_info[0]['classification'];
     if(isset($_SESSION['user_no']))
     {
       $user_no = $_SESSION['user_no'];
     }

     switch ($category_class) {
       case '대분류':
         $product_info = $this->product_model->getMain($category_no);
         break;
       case '중분류':
         $product_info = $this->product_model->getMiddle($category_no);
         break;
       case '소분류':
         $product_info = $this->product_model->getSub($category_no);
         break;
     }
     $num = count($product_info);
     $defaultPage = 1;
     // var_dump($product_info);
    for ($i=0; $i < $num ; $i++) {
      $product_no = $product_info[$i]['no'];
      $thumnail_info[$i] = $this->product_thumnail_model->getOne($product_no);
      if(isset($_SESSION['user_no']))
      {
      $wishlist_info[$i] = $this->wishlist_model->getList(array(
        'user_no' => $user_no,
        'product_no' => $product_no
      ));
    }
    }
          $this->_head();
          $this->_breadcrumb(array(
            'page_name' => 'category',
            'page_num'=> $category_info
            //상품번호 또는 카테고리
              ));
      if(isset($_SESSION['user_no']))
        {
          $this->load->view('/product/list',
          array(
            'all_product' => $product_info,
            'category_info' => $category_info,
            'thumnail_info' => $thumnail_info,
            'wishlist_info' => $wishlist_info,
            'allData' => $num,
            'defaultPage' => $defaultPage
          ));
        }else{
          $this->load->view('/product/list',
          array(
            'all_product' => $product_info,
            'category_info' => $category_info,
            'thumnail_info' => $thumnail_info,
            'allData' => $num,
            'defaultPage' => $defaultPage
          ));
        }

          $this->_footer();
   }

   public function category_List(){

      $limit = $_POST['limit'];
      $offset = ($_POST['page'] - 1) * $limit;
      // var_dump($_POST['page']);
      $pagingData = array('limit' => $limit, 'offset' => $offset);

      $this->load->model('admin/product/product_model');
      $result = $this->product_model->product_info_gets($pagingData);
      // var_dump($result[0]['no']);
      $cnt = count($result);
      for ($i=0; $i < $cnt; $i++) {
        $product_no = $result[$i]['no'];
        $this->load->model('admin/product/product_thumnail_model');
        $img_info = $this->product_thumnail_model->get_one($product_no);
        $result_img = $img_info;
        $result[$i]['img']= $result_img;
      }

      echo json_encode($result);

   }


}
