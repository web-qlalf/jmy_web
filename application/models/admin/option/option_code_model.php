<?php
/*데이터 테이블 이름마다 모델을 생성해주는 것이 깔끔하다*/
class option_code_model extends CI_Model{
    function __construct(){
      parent::__construct();
    }

    function update_info_gets($array_opt){
      $cnt = count($array_opt);

      for ($i=0; $i < $cnt; $i++) {
        $code_no = $array_opt[$i];
        $result[$i] = $this->db->query("SELECT * FROM `option_code` WHERE no = $code_no")->row_array();
      }
      return $result;
      // echo '<pre>';
      // var_dump($result);
      // echo '<pre>';

    }

    function add($option){
      $productDetailList = $option['productDetailList'];
      $product_no = $option['product_no'];

      if(isset($option['productDetailList'][0]['stock_use1'])){
        $single_name = $option['optionList'][0];
        $single_stock = $option['productDetailList'][0];

        $stock = $option['productDetailList'][0]['stock_use1'];

        echo '단품입니다<admin_option_code_model>';
        $this->db->query("INSERT INTO `option_code` (`name`, `price`) VALUES ('단품', '0');");

        $option_code_no = $this->db->query("SELECT no FROM `option_code` order by  no  DESC limit 1;")->row_array();

        $this->load->model('admin/product/product_detail_model');
        $onption_detail = $this->product_detail_model->add(array(
          'option_code_no'=> $option_code_no['no'],
          'product_no'=> $product_no,
          'stock' => $stock
        ));

      }else{
        echo '옵션입니다<admin_option_code_model>';
        $cnt = count($productDetailList);
        for ($i=0; $i <$cnt ; $i++) {
          echo $i.'번째 옵션코드 등록<br />';

          $option_code = $productDetailList[$i]['option_code'];
          $add_price = $productDetailList[$i]['add_price'];
          $stock = $productDetailList[$i]['stock_num2'];

          $this->db->query("INSERT INTO `option_code` (`name`, `price`) VALUES ('$option_code', '$add_price');");

          $option_code_no = $this->db->query("SELECT no FROM `option_code` order by  no  DESC limit 1;")->row_array();

          $this->load->model('admin/product/product_detail_model');
          $onption_detail = $this->product_detail_model->add(array(
            'option_code_no'=> $option_code_no['no'],
            'product_no'=> $product_no,
            'stock' => $stock
          ));


      }

    }
    }
    function price_search($option_no){
      return $this->db->query("SELECT `price` FROM `option_code` WHERE no = '$option_no' ")->row_array();
    }
    function update($option){
      $option_addPrice = $option['option_addPrice'];
      $option_no = $option['option_no'];
      // UPDATE `test_mall`.`option_code` SET `name` = '블루/M1/별', `price` = '01' WHERE (`no` = '3');
      $this->db->query("UPDATE `option_code` SET `price` = '$option_addPrice' WHERE (`no` = '$option_no');");
      return $this->db->affected_rows();
    }
    function delete($option_no){
      $this->db->query("DELETE FROM `option_code` WHERE (`no` = '$option_no');");
      return $this->db->affected_rows();
      //DELETE FROM `test_mall`.`option_code` WHERE (`no` = '1');
    }
    function delete2($option_no){
      $this->db->query("DELETE FROM `option_code` WHERE (`no` = '$option_no');");
      return $this->db->affected_rows();
    }
    function add_update($option){
      $option_addPrice = $option['option_addPrice'];
      $single_name = $option['single_name'];

       $this->db->query("INSERT INTO `test_mall`.`option_code` (`name`, `price`) VALUES ('$single_name', '$option_addPrice');");
      return $this->db->insert_id();
    }

    function search($option_no){
      return $this->db->query("SELECT * FROM `option_code`WHERE `no` = $option_no")->result_array();
      // $result = $this->db->last_query();
      // return $result;
    }

  }

 ?>
