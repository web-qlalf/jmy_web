<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Option extends MY_Controller {

   function __construct()
   {
       parent::__construct();

   }

  public function delete(){
    // var_dump($_POST);
    $option_no = $_POST['option_no'];
    $product_no = $_POST['product_no'];

    //product_detail은 상품번호와 옵션코드번호를 지움
    $this->load->model('admin/product/product_detail_model');
    $this->product_detail_model->delete(array(
      'option_no' => $option_no,
      'product_no'=>$product_no
    ));

    //option_code는 옵션코드번호만으로 삭제
    $this->load->model('admin/option/option_code_model');
    $this->option_code_model->delete($option_no);
    $result = $this->option_code_model->search($option_no);
    // var_dump($result);

    if(count($result) == 0){
      $retval['ret'] = 'succ';
    }else{
      $retval['ret'] = 'fail';
    }

    echo json_encode($retval);
   }
  public function delete2(){
    // var_dump($_POST);
    $option_no = $_POST['option_no'];
    $product_no = $_POST['product_no'];

    $this->load->model('admin/option/option_code_model');
    $price = $this->option_code_model->price_search($option_no);
    if(count($price['price']) == 0){
      $result = 3;
    }else{
    //option_code는 옵션코드번호만으로 삭제
    $result = $this->option_code_model->delete($option_no);
    }

    echo json_encode($result);
   }

  public function delete_update(){
    // var_dump($_POST);
    $product_no = $_POST['product_no'];
    $option_code_no = $_POST['option_code_no'];

    $this->load->model('admin/option/option_model');
    $this->load->model('admin/option/option_detail_model');

    $this->load->model('admin/product/product_detail_model');
    $this->load->model('admin/option/option_code_model');

    //option에서 option_no 구함
    $option_model = $this->option_model->update_info_gets($product_no);
    if(count($option_model) == 0){
        $result = 3;
      }else{

        for ($i=0; $i < count($option_model) ; $i++) {
          $option_no = $option_model[$i]['no'];
          // echo "option_no :".$option_no;

          // option detail은 option no로 삭제
          $this->option_detail_model->delete($option_no);
          //option은 option no로 삭제
          $this->option_model->delete($option_no);
        }


          if(is_array($option_code_no)){
            // echo "오호라 배열이로구나";
            // var_dump($option_code_no);
            if(count($option_code_no) > 1){
              for ($i=0; $i < count($option_code_no); $i++) {
                $option_code_no2 = $option_code_no[$i];

                //product_detail은 option_no && product_no로 삭제
                $product_detail = $this->product_detail_model->delete(array(
                  'option_no' => $option_code_no2,
                  'product_no' => $product_no
                ));

                //option_code는 option_no로 삭제
                $option_code = $this->option_code_model->delete($option_code_no2);

              }
            }
          }else{
            // echo "오호라 단품이로구나";
            // echo '$option_code_no: '.$option_code_no ;
            // echo '$product_no: '.$product_no;
            $product_detail = $this->product_detail_model->delete(array(
              'option_no' => $option_code_no,
              'product_no' => $product_no
            ));

            //option_code는 option_no로 삭제
            $option_code = $this->option_code_model->delete($option_code_no);
          }



        if(is_array($option_code)){
            if(count($option_code) == 0){
              $result = 3;
            }else{
              $result = $option_code;
            }
        }else{
            if(empty($option_code)){
              $result = 3;
            }else{
              $result = $option_code;
            }
        }


    }

    echo json_encode($result);
   }

  public function add(){
     // var_dump($_POST);
     //INSERT INTO `test_mall`.`option_code` (`name`, `price`) VALUES ('단품', '0');
     $option_addPrice = $_POST['option_addPrice'];
     $single_name = $_POST['single_name'];
     $product_no = $_POST['product_no'];
     $option_stock = $_POST['option_stock'];

     $this->load->model('admin/option/option_code_model');
     $this->load->model('admin/product/product_detail_model');


        $result= $this->option_code_model->add_update(array(
          'option_addPrice'=>$option_addPrice,
          'single_name'=>$single_name
        ));

        $detail = $this->product_detail_model->add_update(array(
          'product_no'=>$product_no,
          'option_no'=>$result,
          'option_stock'=>$option_stock
        ));

        if($detail == null || $detail == ''){
          echo json_encode('');
        }else{
          echo json_encode($result);
        }

  }

  public function update(){
     // var_dump($_POST);

     $option_addPrice = $_POST['option_addPrice'];
     $option_no = $_POST['option_no'];

     $this->load->model('admin/option/option_code_model');

      $price = $this->option_code_model->price_search($option_no);
      var_dump($price);
      if($price['price'] == $option_addPrice){
        $result = 3;
      }else{
        $result= $this->option_code_model->update(array(
          'option_addPrice'=>$option_addPrice,
          'option_no'=>$option_no
        ));
      }
       echo json_encode($result);
  }
  public function single_update(){
     // var_dump($_POST);

     $product_no = $_POST['product_no'];
     $option_no = $_POST['option_no'];
     $option_stock = $_POST['option_stock'];
     // var_dump($product_no);
     // var_dump($option_no);
     // var_dump($option_stock);


     $this->load->model('admin/product/product_detail_model');

     $product_detail= $this->product_detail_model->update(array(
       'product_no'=>$product_no,
       'option_stock'=>$option_stock,
       'option_no'=>$option_no
     ));

     if($product_detail == null || $product_detail ='' || $product_detail = 0){
       $redsult = 3;
     }else{
       $redsult = $product_detail;
     }
    //UPDATE `test_mall`.`product_detail` SET `stock` = '$option_stock' WHERE (`product_no` = '$product_no') and (`option_code_no` = `$option_no`);


       echo json_encode($result);
  }

  public function single_add_update(){
     // var_dump($_POST);

     $option_addPrice = $_POST['option_addPrice'];
     $product_no = $_POST['product_no'];
     $single_name = $_POST['single_name'];
     $single_stock = $_POST['single_stock'];

     $this->load->model('admin/option/option_code_model');
     $this->load->model('admin/product/product_detail_model');

     $option_code_no= $this->option_code_model->add_update(array(
       'option_addPrice'=>$option_addPrice,
       'single_name'=>$single_name
     ));
     $product_detail_result= $this->product_detail_model->add_update(array(
       'product_no'=>$product_no,
       'option_no'=>$option_code_no,
       'option_stock'=>$single_stock
     ));

     if($product_detail_result == 0 || $product_detail_result == null){
       $result = 3;
     }else{
       $result = $product_detail_result;
     }
       echo json_encode($result);
  }

  public function totalUpdate(){
    $product_no = htmlspecialchars($this->input->post('product_no'));
    $opt_name = $_POST['opt_name'];
    $opt_dtname = $_POST['opt_dtname'];
    $optioncode = $_POST['optioncode'];
    $add_price = $_POST['add_price'];
    $stock_num = $_POST['stock_num'];

    // var_dump($optioncode);
    //[0]은 블루, [1]은 블랙

     $this->load->model('admin/option/option_model');
     $this->load->model('admin/option/option_code_model');
     $this->load->model('admin/product/product_detail_model');

     // echo 'count($opt_name): '.count($opt_name);
     // var_dump($opt_name);
    for ($i=0; $i < count($opt_name) ; $i++) {
      $optionName = htmlspecialchars($opt_name[$i]);
      $optionDetailName = htmlspecialchars($opt_dtname[$i]);

      $result= $this->option_model->add_update(array(
        'product_no'=>$product_no,
        'name'=>$optionName,
        'detail_name'=>$optionDetailName
      ));
    }
    //
    for ($k=0; $k < count($optioncode) ; $k++) {
        // echo '$add_price[$k :'.$add_price[$k];
        // echo '$optioncode[$k :'.$optioncode[$k];
        // echo '$stock_num[$k :'.$stock_num[$k];

        $result= $this->option_code_model->add_update(array(
          'option_addPrice'=>$add_price[$k],
          'single_name'=>$optioncode[$k]
        ));

        $result2= $this->product_detail_model->add_update(array(
          'product_no'=>$product_no,
          'option_no'=>$result,
          'option_stock'=>$stock_num[$k]
        ));
    }

    if($result2 == null || $result2 == ''){
      $result3 = '0';
    }else{
      $result3 = '1';
    }

    echo json_encode($result3);

  }

  public function add_update(){
    $product_no = htmlspecialchars($this->input->post('product_no'));
    $opt_name = htmlspecialchars($this->input->post('opt_name'));
    $opt_dtname = htmlspecialchars($this->input->post('opt_dtname'));


      $result= $this->option_model->add_update(array(
        'product_no'=>$product_no,
        'name'=>$optionName,
        'detail_name'=>$optionDetailName
      ));


    if(count($result) == 0){
      $i = 0;
    }else{
      $i = $result;
    }
    echo json_encode($i);

  }

}
