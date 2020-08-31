<?php
/*데이터 테이블 이름마다 모델을 생성해주는 것이 깔끔하다*/
class product_detail_model extends CI_Model{
    function __construct(){
      parent::__construct();
    }

    function update_info_gets($product_no){
      return $this->db->query("SELECT * FROM `product_detail` WHERE product_no = $product_no;")->result_array();
    }

    function add($option){
      $option_code_no = $option['option_code_no'];
      $product_no = $option['product_no'];
      $stock = $option['stock'];

      $this->db->query("INSERT INTO `product_detail` (`product_no`, `option_code_no`, `stock`)
      VALUES ('$product_no', '$option_code_no', '$stock');
      ");

    }

    function stock_search($option_no){
      return $this->db->query("SELECT `stock` FROM `product_detail` WHERE `option_code_no` = '$option_no' ;")->row_array();
    }

    function update($option){
      $option_stock = $option['option_stock'];
      $option_no = $option['option_no'];
      $this->db->query("UPDATE `product_detail` SET `stock` = '$option_stock' WHERE (`option_code_no` = '$option_no');");
      return $this->db->affected_rows();
    }

    function delete($option){
      $option_no = $option['option_no'];
      $product_no = $option['product_no'];
      $this->db->query("DELETE FROM `product_detail` WHERE (`product_no` = '$product_no') and (`option_code_no` = '$option_no');");
      return $this->db->affected_rows();
      // DELETE FROM `test_mall`.`product_detail` WHERE (`no` = '10');
    }

    function delete_update($product_no){

      $this->db->query("DELETE FROM `product_detail` WHERE (`product_no` = '$product_no');");
      return $this->db->affected_rows();
      // DELETE FROM `test_mall`.`product_detail` WHERE (`no` = '10');
    }
    function delete2($option){
      $option_no = $option['option_no'];
      $product_no = $option['product_no'];
      $option_stock = $option['option_stock'];

      $this->db->query("DELETE FROM `product_detail` WHERE (`product_no` = '$product_no') and (`option_code_no` = '$option_no');");

      return $this->db->affected_rows();
    }

    function add_update($option){
      $product_no = $option['product_no'];
      $option_no = $option['option_no'];
      $option_stock = $option['option_stock'];

      $this->db->query("INSERT INTO `test_mall`.`product_detail` (`product_no`, `option_code_no`, `stock`) VALUES ('$product_no', '$option_no', '$option_stock');");
      return $this->db->insert_id();
    }

    function getCode($detail_no){

       return $this->db->query("SELECT `option_code_no` FROM `product_detail` where `no` = '$detail_no';")->result_array();
    }
    function getProduct($detail_no){

       return $this->db->query("SELECT `product_no` FROM `product_detail` where `no` = '$detail_no';")->result_array();
    }



}
 ?>
