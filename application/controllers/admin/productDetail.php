<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class productDetail extends MY_Controller {

  function __construct()
  {
      parent::__construct();

  }

  public function update(){
    // var_dump($_POST);

    $option_stock = $_POST['option_stock'];
    $option_no = $_POST['option_no'];

    $this->load->model('admin/product/product_detail_model');

    $stock = $this->product_detail_model->stock_search($option_no);

    if($stock['stock'] == $option_stock){
      $result = 3;
    }else{
      $result= $this->product_detail_model->update(array(
        'option_stock'=>$option_stock,
        'option_no'=>$option_no
      ));
    }
      echo json_encode($result);
  }

  public function delete2(){
    // var_dump($_POST);
    $option_no = $_POST['option_no'];
    $product_no = $_POST['product_no'];
    $option_stock = $_POST['option_stock'];

    //option_code는 옵션코드번호만으로 삭제
    $this->load->model('admin/product/product_detail_model');
    $stock = $this->product_detail_model->stock_search($option_no);

    if(count($stock['stock'] )== 0){
      $result = 3;
    }else{
      $result = $this->product_detail_model->delete2(array(
        'option_stock'=>$option_stock,
        'option_no'=>$option_no,
        'product_no'=>$product_no
      ));
    }

    echo json_encode($result);
   }

   public function add(){
      // var_dump($_POST);
      //INSERT INTO `test_mall`.`option_code` (`name`, `price`) VALUES ('단품', '0');
      $product_no = $_POST['product_no'];
      $option_no = $_POST['option_no'];
      $option_stock = $_POST['option_stock'];

      $this->load->model('admin/product/product_detail_model');

         $result= $this->product_detail_model->add_update(array(
           'product_no'=>$product_no,
           'option_no'=>$option_no,
           'option_stock'=>$option_stock
         ));

       echo json_encode($result);
   }



}
