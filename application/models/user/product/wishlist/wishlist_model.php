<?php
/*데이터 테이블 이름마다 모델을 생성해주는 것이 깔끔하다*/
class wishlist_model extends CI_Model{
    function __construct(){
      parent::__construct();
    }

    function getList($option){
      $product_no = $option['product_no'];
      $user_no = $option['user_no'];
       return $this->db->query("SELECT * FROM `wishlist` WHERE (`member_no` = '$user_no') AND (`product_no` = '$product_no');")->result_array();
    }
    function getUser($user_no){
       return $this->db->query("SELECT * FROM `wishlist` WHERE (`member_no` = '$user_no');")->result_array();
    }

    function add($option){
      $product_no = $option['product_no'];
      $user_no = $option['user_no'];
       $this->db->query("INSERT INTO `wishlist` (`member_no`, `product_no`) VALUES ('$user_no', '$product_no');");
       return $this->db->insert_id();
    }
    function delete($option){
      $product_no = $option['product_no'];
      $user_no = $option['user_no'];
       $this->db->query("DELETE FROM `wishlist` WHERE (`member_no` = '$user_no') AND (`product_no` = '$product_no');");
       return $this->db->affected_rows();
    }

}
 ?>
