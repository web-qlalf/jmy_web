<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_product extends MY_Controller {

  function __construct()
  {
      parent::__construct();

  }


  public function list(){
    $this->_require_admin_login_User();
    $this->load->model('admin_product_model');
    $result = $this->admin_product_model->gets();
    $data = $result;
    $num = count($data);
    $defaultPage = 1;

      $this->_admin_head();
      $this->load->view('/admin/admin_top');
      $this->load->view('/admin/admin_side');
      $this->load->view('/admin/product/list', array('allData' => $num,'defaultPage' => $defaultPage));
      $this->load->view('/admin/admin_bottom');
      $this->_admin_footer();
  }

  public function product_info_List(){

     $limit = $_POST['limit'];
     $offset = ($_POST['page'] - 1) * $limit;
     // var_dump($_POST['page']);
     $pagingData = array('limit' => $limit, 'offset' => $offset);

     $this->load->model('admin_product_model');
     $result = $this->admin_product_model->product_info_gets($pagingData);
     // var_dump($result[0]['no']);
     $cnt = count($result);
     for ($i=0; $i < $cnt; $i++) {
       $product_no = $result[$i]['no'];
       $this->load->model('admin_product_thumnail_model');
       $img_info = $this->admin_product_thumnail_model->get_one($product_no);
       $result_img = $img_info;
       $result[$i]['img']= $result_img;
     }

     echo json_encode($result);

  }

  public function new_product(){
     $this->_admin_head();
     $this->load->view('/admin/admin_top');
     $this->load->view('/admin/admin_side');
     $this->load->view('/admin/product/add');
     $this->load->view('/admin/admin_bottom');
     $this->_admin_footer();
   }

  public function update_product($product_no){
    $this->load->model('admin_product_model');
    $result = $this->admin_product_model->update_info_gets($product_no);

    // var_dump($result);
    $inoutput_no = $result[0]['inoutput_info_no'];
    $this->load->model('admin_inoutput_info_model');
    $inoutput_info = $this->admin_inoutput_info_model->update_info_gets($inoutput_no);

    $this->load->model('admin_product_thumnail_model');
    $img_info = $this->admin_product_thumnail_model->update_info_gets($product_no);

    $this->load->model('admin_option_model');
    $option_info = $this->admin_option_model->update_info_gets($product_no);
    // var_dump($option_info);

    $this->load->model('admin_product_detail_model');
    $product_detail_info = $this->admin_product_detail_model->update_info_gets($product_no);

    $this->load->model('admin_option_code_model');
    $option_code_info = $this->admin_option_code_model->update_info_gets($product_detail_info);

    for ($i=0; $i < count($option_info); $i++) {
      $this->load->model('admin_option_detail_model');
      $onption_detail_info[$i] = $this->admin_option_detail_model->update_info_gets($option_info[$i]['no']);
    }


    $category = array($result[0]['product_main_category_id'], $result[0]['product_middle_category_id'], $result[0]['product_sub_category_id']
     );
    $this->load->model('admin_category_model');
    $cat_info = $this->admin_category_model->update_info_gets($category);



    // var_dump($category);
    // echo "<pre>";
    // var_dump(count($option_code_info));
    // var_dump($option_code_info[0]);
    // echo "<pre>";
    // var_dump($cat_info);
     //
     $this->_admin_head();
     $this->load->view('/admin/admin_top');
     $this->load->view('/admin/admin_side');
     $this->load->view('/admin/product/update', array(
       'update_info' => $result,
       'img_info' => $img_info,
       'option_info' => $option_info,
       'onption_detail' => $onption_detail_info,
       'option_code' => $option_code_info,
       'category' => $cat_info,
       'inout' => $inoutput_info
     ));
     $this->load->view('/admin/admin_bottom');
     $this->_admin_footer();
   }


  public function add(){
    $this->load->model('admin_product_model');
    $admin_no = htmlspecialchars($this->input->post('admin_no'));
    $main_category_value = htmlspecialchars($this->input->post('main_category_value'));
    $middle_category_value = htmlspecialchars($this->input->post('middle_category_value'));
    $sub_category_value = htmlspecialchars($this->input->post('sub_category_value'));
    $product_name = htmlspecialchars($this->input->post('product_name'));
    $product_code = htmlspecialchars($this->input->post('product_code'));
    $product_title = htmlspecialchars($this->input->post('product_advertise'));
    $product_price = htmlspecialchars($this->input->post('product_price'));
    $product_discount_price = htmlspecialchars($this->input->post('product_discount_price'));
    $product_discount_rate_1 = htmlspecialchars($this->input->post('product_discount_rate_1'));
    $product_discount_rate_2 = htmlspecialchars($this->input->post('product_discount_rate_2'));
    $output_info = htmlspecialchars($this->input->post('output_info'));
    $input_info = htmlspecialchars($this->input->post('input_info'));
    $product_content = htmlspecialchars($this->input->post('product_content'));
    $optionList = $this->input->post('optionList');
    $productDetailList = $this->input->post('productDetailList');
    $img_file = $this->input->post('img_file');
    $img_src_data = $this->input->post('img_src_data');
    // echo "<pre>";
    // var_dump($_POST);
    // echo "<pre>";

    if(isset($_POST)){
      $addproduct = $this->admin_product_model->add(array(
        'admin_no'=>htmlspecialchars($admin_no),
        'main_category_value'=>htmlspecialchars($main_category_value),
        'middle_category_value'=>htmlspecialchars($middle_category_value),
        'sub_category_value'=>htmlspecialchars($sub_category_value),
        'product_name'=>htmlspecialchars($product_name),
        'product_code'=>htmlspecialchars($product_code),
        'product_title'=>htmlspecialchars($product_title),
        'product_price'=>htmlspecialchars($product_price),
        'product_discount_price'=>htmlspecialchars($product_discount_price),
        'product_discount_rate_1'=>htmlspecialchars($product_discount_rate_1),
        'product_discount_rate_2'=>htmlspecialchars($product_discount_rate_2),
        'output_info'=>htmlspecialchars($output_info),
        'input_info'=>htmlspecialchars($input_info),
        'product_content'=>htmlspecialchars($product_content),
        'img_file'=>$img_file,
        'img_src_data'=>$img_src_data,
        'optionList'=>$optionList,
        'productDetailList'=>$productDetailList
      ));
      if($addproduct){
        $this->session->set_flashdata('message', '상품 등록 완료.');
      }else{
        $this->session->set_flashdata('message', '상품 등록 실패.');
      }
    }else{
      $this->session->set_flashdata('message', '상품 등록 실패.');
    }

    $this->load->helper('url');
    redirect('/admin_product/list');
  }

  public function update($product_no){
    // echo "<pre>";
    // var_dump($_POST);
    // echo "<pre>";
    $this->load->model('admin_product_model');
    $admin_no = htmlspecialchars($this->input->post('admin_no'));
    $main_category_value = htmlspecialchars($this->input->post('main_category_value'));
    $middle_category_value = htmlspecialchars($this->input->post('middle_category_value'));
    $sub_category_value = htmlspecialchars($this->input->post('sub_category_value'));
    $product_name = htmlspecialchars($this->input->post('product_name'));
    $product_code = htmlspecialchars($this->input->post('product_code'));
    $product_title = htmlspecialchars($this->input->post('product_advertise'));
    $product_price = htmlspecialchars($this->input->post('product_price'));
    $product_discount_price = htmlspecialchars($this->input->post('product_discount_price'));
    $product_discount_rate_1 = htmlspecialchars($this->input->post('product_discount_rate_1'));
    $product_discount_rate_2 = htmlspecialchars($this->input->post('product_discount_rate_2'));
    $output_info = htmlspecialchars($this->input->post('output_info'));
    $input_info = htmlspecialchars($this->input->post('input_info'));
    $product_content = htmlspecialchars($this->input->post('product_content'));
    $optionList = $this->input->post('optionList');
    $productDetailList = $this->input->post('productDetailList');
    $img_file = $this->input->post('img_file');
    $img_src_data = $this->input->post('img_src_data');

    if(isset($_POST)){
      $addproduct = $this->admin_product_model->update(array(
        'admin_no'=>htmlspecialchars($admin_no),
        'main_category_value'=>htmlspecialchars($main_category_value),
        'middle_category_value'=>htmlspecialchars($middle_category_value),
        'sub_category_value'=>htmlspecialchars($sub_category_value),
        'product_name'=>htmlspecialchars($product_name),
        'product_code'=>htmlspecialchars($product_code),
        'product_title'=>htmlspecialchars($product_title),
        'product_price'=>htmlspecialchars($product_price),
        'product_discount_price'=>htmlspecialchars($product_discount_price),
        'product_discount_rate_1'=>htmlspecialchars($product_discount_rate_1),
        'product_discount_rate_2'=>htmlspecialchars($product_discount_rate_2),
        'output_info'=>htmlspecialchars($output_info),
        'input_info'=>htmlspecialchars($input_info),
        'product_content'=>htmlspecialchars($product_content),
        'img_file'=>$img_file,
        'img_src_data'=>$img_src_data,
        'optionList'=>$optionList,
        'productDetailList'=>$productDetailList
      ));
      if($addproduct){
        $this->session->set_flashdata('message', '상품 등록 완료.');
      }else{
        $this->session->set_flashdata('message', '상품 등록 실패.');
      }
    }else{
      $this->session->set_flashdata('message', '상품 등록 실패.');
    }
    //
    // $this->load->helper('url');
    // redirect('/admin/product/list');
  }


  public function delivery_jnfo_view()
  {
    if(isset($_POST['delivery_num'])){
      $delivery_num = htmlspecialchars($this->input->post('delivery_num'));
      $this->load->model('admin_delivery_info_model');
      $infoview = $this->admin_delivery_info_model->info_gets(array('delivery_num'=>htmlspecialchars($delivery_num)));
      echo json_encode($infoview);
    }else{
      echo "잘못된 접근입니다.";
    }
  }
  public function delivery_view()
  {
    $this->load->model('admin_delivery_info_model');
    $allview = $this->admin_delivery_info_model->gets();
    echo json_encode($allview);
  }

  public function category_view()
  {
     if(isset($_POST['category'])){
       $catnum = htmlspecialchars($this->input->post('category'));
       // var_dump($catnum);
         $this->load->model('admin_category_model');
         $category = $this->admin_category_model->gets_category(array('product_category_parent_id'=>htmlspecialchars($catnum)));
         echo json_encode($category);
     }else{
       echo "입력된 데이터가 없습니다.";
     }
    // echo json_encode($catnum);
   }
  public function category_add()
  {
     $classification = htmlspecialchars($this->input->post('product_category_classification'));
     $new_category = htmlspecialchars($this->input->post('product_category_name'));
     $parent_id = htmlspecialchars($this->input->post('product_category_parent_id'));

     if(isset($_POST['product_category_name'])){
         $this->load->model('admin_category_model');
         $category = $this->admin_category_model->add_category(array(
           'product_category_classification'=>htmlspecialchars($classification),
           'product_category_name'=>htmlspecialchars($new_category),
           'product_category_parent_id'=>htmlspecialchars($parent_id)
         ));
         echo json_encode($category);
     }else{
       echo "카테고리 추가 실패.";
     }
    // echo json_encode($catnum);
   }
   public function category_update_view(){
    $category = json_decode($_POST['category'], true);
    $cat_count = count($category);

      $a = $cat_count-1;
      while ($a <= 3-$cat_count) {
        $j = $a+1;
        $category[$j] = $category[$a];
        $a++;
      }
        // echo "<pre>";
        // var_dump($parent_info);
        // echo "<pre>";
          switch ($cat_count) {
            case 1:
              for ($k=0; $k <3 ; $k++) {
                $cat_num = $category[$k];
                $this->load->model('admin_category_model');
                $parent_info = $this->admin_category_model->gets_update_parent(array('category_id'=>htmlspecialchars($cat_num)));
                if($k == 1){
                  $category_info[$k] = $this->admin_category_model->gets_update_category(array('parent_id'=>htmlspecialchars($category[$k])));
                }else if($k == 2){
                  $category_info[$k] = $this->admin_category_model->gets_update_category(array('parent_id'=>htmlspecialchars($category[$k])));
                }else{
                  $category_info[$k] = $this->admin_category_model->gets_update_category(array('parent_id'=>htmlspecialchars($parent_info['parent_id'])));
                }
              }
              break;
            case 2:
              for ($k=0; $k <3 ; $k++) {
                $cat_num = $category[$k];
                $this->load->model('admin_category_model');
                $parent_info = $this->admin_category_model->gets_update_parent(array('category_id'=>htmlspecialchars($cat_num)));
                if($k == 2){
                  $category_info[$k] = $this->admin_category_model->gets_update_category(array('parent_id'=>htmlspecialchars($category[$k])));
                }else{
                  $category_info[$k] = $this->admin_category_model->gets_update_category(array('parent_id'=>htmlspecialchars($parent_info['parent_id'])));
                }
              }
              break;
            case 3:
              for ($k=0; $k <3 ; $k++) {
                $cat_num = $category[$k];
                $this->load->model('admin_category_model');
                $parent_info = $this->admin_category_model->gets_update_parent(array('category_id'=>htmlspecialchars($cat_num)));

                $category_info[$k] = $this->admin_category_model->gets_update_category(array('parent_id'=>htmlspecialchars($parent_info['parent_id'])));
              }
              break;
      }

    echo json_encode($category_info);
  }

}
