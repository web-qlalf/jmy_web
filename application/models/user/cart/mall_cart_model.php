<?php
/*데이터 테이블 이름마다 모델을 생성해주는 것이 깔끔하다*/
class mall_cart_model extends CI_Model{
    function __construct(){
      parent::__construct();
    }

    function add($option){

      $qty = $option['qty'];
      $product_no = $option['product_no'];

      $user_no = $option['user_no'];
      $product_detail_no = $option['product_detail_no'];

       $this->db->query("INSERT INTO `mall_cart` (`qty`, `regdate`, `user_no`, `product_detail_no`,`product_no`) VALUES ('$qty', Now(), '$user_no', '$product_detail_no', '$product_no');");

       return $this->db->insert_id();

    }

    function searchDetail($option){
      $product_detail_no = $option['product_detail_no'];
       return $this->db->query("SELECT `product_detail_no` FROM `mall_cart` where `product_detail_no` = '$product_detail_no';")->result_array();

    }
    function searchUser($user_no){
       return $this->db->query("SELECT * FROM `mall_cart` where `user_no` = '$user_no';")->result_array();

    }
    function searchNo($cart_no){
       return $this->db->query("SELECT * FROM `mall_cart` where `no` = '$cart_no';")->result_array();

    }
    function delete($cart_no){
       $this->db->query("DELETE FROM `test_mall`.`mall_cart` WHERE (`no` = '$cart_no');");
       return $this->db->affected_rows();

    }

}
 ?>
