<?php
/*데이터 테이블 이름마다 모델을 생성해주는 것이 깔끔하다*/
class order_detail_model extends CI_Model{
    function __construct(){
      parent::__construct();
    }

    function gets($order_no)
    {
      return $this->db->query("SELECT * FROM `order_detail` WHERE `order_no`='$order_no';")->result_array();
    }

    function add($option){
      $qty = $option['qty'];
      $order_no = $option['order_no'];
      $product_detail_no = $option['product_detail_no'];
      $delivery_method = $option['delivery_method'];

       $this->db->query("INSERT INTO `order_detail` (`qty`,`delivery_method`,`order_no`,  `product_detail_no`) VALUES ('$qty', '$delivery_method','$order_no', '$product_detail_no');");

       return $this->db->affected_rows();

    }

}
 ?>
