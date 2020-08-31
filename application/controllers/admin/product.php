<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class product extends MY_Controller {

  function __construct()
  {
      parent::__construct();

  }


  public function list()
  {
    $this->_require_admin_login_User();
    $this->load->model('admin/product/product_model');
    $result = $this->product_model->gets();
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

  public function info_List(){

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
       $img_info = $this->product_thumnail_model->getOne($product_no);
       $result_img = $img_info;
       $result[$i]['img']= $result_img;

       $this->load->model('/user/product/category/product_category_model');
       $product_main_category_id = $result[$i]['product_main_category_id'];
       $result[$i]['product_main']  = $this->product_category_model->gets($product_main_category_id);
       if(isset($result[$i]['product_middle_category_id']))
       {
         $product_middle_category_id = $result[$i]['product_middle_category_id'];
         $result[$i]['product_middle'] = $this->product_category_model->gets($product_middle_category_id);
       }
       if(isset($result[$i]['product_sub_category_id']))
       {
         $product_sub_category_id = $result[$i]['product_sub_category_id'];
         $result[$i]['product_sub'] = $this->product_category_model->gets($product_sub_category_id);
       }
     }

     echo json_encode($result);

  }

  public function add(){
    $this->load->model('admin/product/product_model');
    $result = $this->product_model->gets();
    if(count($result) == 0){
      $product_no = 1;
    }else{
      $product_no = count($result)+1;
    }


     $this->_admin_head();
     $this->load->view('/admin/admin_top');
     $this->load->view('/admin/admin_side');
     $this->load->view('/admin/product/add', array('product_no' => $product_no));
     $this->load->view('/admin/admin_bottom');
     $this->_admin_footer();
   }

  public function update($product_no){
    $this->load->model('admin/product/product_model');
    $result = $this->product_model->update_info_gets($product_no);

    // var_dump($result);
    $inoutput_no = $result[0]['inoutput_info_no'];
    $this->load->model('admin/delivery/inoutput_info_model');
    $inoutput_info = $this->inoutput_info_model->update_info_gets($inoutput_no);

    $this->load->model('admin/product/product_thumnail_model');
    $img_info = $this->product_thumnail_model->update_info_gets($product_no);

    $this->load->model('admin/option/option_model');
    $option_info = $this->option_model->update_info_gets($product_no);
    // var_dump($option_info);

    $this->load->model('admin/product/product_detail_model');
    $product_detail_info = $this->product_detail_model->update_info_gets($product_no);

    // var_dump($product_detail_info);

    $option_code_count = count($product_detail_info);

    for ($i=0; $i < $option_code_count ; $i++) {
      $array_opt[$i] = $product_detail_info[$i]['option_code_no'];
    }
      $this->load->model('admin/option/option_code_model');
      $option_code_info = $this->option_code_model->update_info_gets($array_opt);

    // echo '<pre>';
    // var_dump($option_code_info);
    // echo '<pre>';

    for ($i=0; $i < count($option_info); $i++) {
      $this->load->model('admin/option/option_detail_model');
      $onption_detail_info[$i] = $this->option_detail_model->update_info_gets($option_info[$i]['no']);
    }


    $category = array($result[0]['product_main_category_id'], $result[0]['product_middle_category_id'], $result[0]['product_sub_category_id']
     );
    $this->load->model('admin/category/category_model');
    $cat_info = $this->category_model->update_info_gets($category);

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
       'inout' => $inoutput_info,
       'product_detail' => $product_detail_info
     ));
     $this->load->view('/admin/admin_bottom');
     $this->_admin_footer();
   }


  public function addInfo(){
    // $this->load->model('admin_product_model');
    // echo "<pre>";
    // var_dump($_POST);
    // echo "<pre>";

    $this->load->model('admin/product/product_model');
    $admin_no = htmlspecialchars($this->input->post('admin_no'));
    $product_no = htmlspecialchars($this->input->post('product_no'));
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
    $img_exe = $this->input->post('img_exe');
    $img_name = $this->input->post('img_name');

    if(isset($_POST)){
      $addproduct = $this->product_model->add(array(
        'product_no'=>htmlspecialchars($product_no),
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
        'img_exe'=>$img_exe,
        'img_name'=>$img_name,
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
      redirect('/admin/product/list');

}

  public function addInfo2(){
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

  public function updateInfo($product_no){
    // echo "<pre>";
    // var_dump($_POST);
    // echo "<pre>";
    $inoutput_info_no = htmlspecialchars($this->input->post('inoutput_info_no'));
    $input_info = htmlspecialchars($this->input->post('input_info'));
    $output_info = htmlspecialchars($this->input->post('output_info'));

    // $admin_no = htmlspecialchars($this->input->post('admin_no'));

    $product_no = htmlspecialchars($this->input->post('product_no'));
    $main_category_id = htmlspecialchars($this->input->post('main_category_value'));
    $middle_category_id = htmlspecialchars($this->input->post('middle_category_value'));
    $sub_category_id = htmlspecialchars($this->input->post('sub_category_value'));
    $product_name = htmlspecialchars($this->input->post('product_name'));
    $product_code = htmlspecialchars($this->input->post('product_code'));
    $product_content = htmlspecialchars($this->input->post('product_content'));
    $product_title = htmlspecialchars($this->input->post('product_advertise'));
    $product_price = htmlspecialchars($this->input->post('product_price'));
    $product_discount_rate_2 = htmlspecialchars($this->input->post('product_discount_rate_2'));

    $this->load->model('admin/product/product_model');

    if(isset($_POST)){
      $updateProduct = $this->product_model->update(array(
        'product_no'=>htmlspecialchars($product_no),
        'product_name'=>htmlspecialchars($product_name),
        'product_code'=>htmlspecialchars($product_code),
        'product_content'=>htmlspecialchars($product_content),
        'product_title'=>htmlspecialchars($product_title),
        'product_price'=>htmlspecialchars($product_price),
        'product_discount_rate_2'=>htmlspecialchars($product_discount_rate_2),
        'main_category_id'=>htmlspecialchars($main_category_id),
        'middle_category_id'=>htmlspecialchars($middle_category_id),
        'sub_category_id'=>htmlspecialchars($sub_category_id),
        'inoutput_info_no'=>htmlspecialchars($inoutput_info_no),
        'input_info'=>htmlspecialchars($input_info),
        'output_info'=>htmlspecialchars($output_info)
      ));
      if($updateProduct){
        $this->session->set_flashdata('message', '상품 등록 완료.');
      }else{
        $this->session->set_flashdata('message', '상품 등록 실패.');
      }
    }else{
      $this->session->set_flashdata('message', '상품 등록 실패.');
    }

    $this->load->helper('url');
    redirect('/admin/product/list');
  }


}
