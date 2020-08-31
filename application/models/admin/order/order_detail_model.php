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
    function update($option)
    {
      $order_no = $option['order_no'];
      $reciever_name = $option['reciever_name'];
      $reciever_tel1 = $option['reciever_tel1'];
      $reciever_tel2 = $option['reciever_tel2'];
      $reciever_zipcode = $option['reciever_zipcode'];
      $reciever_address1 = $option['reciever_address1'];
      $reciever_address2 = $option['reciever_address2'];
      $reciever_address3 = $option['reciever_address3'];
      $delivery_msg = $option['delivery_msg'];
      $status = $option['order_status'];

      $this->db->query("UPDATE `order`
        SET `reciever_name` = '$reciever_name', `reciever_tel1` = '$reciever_tel1', `reciever_tel2` = '$reciever_tel2', `reciever_zipcode` = '$reciever_zipcode', `reciever_address1` = '$reciever_address1', `reciever_address2` = '$reciever_address2', `reciever_address3` = '$reciever_address3', `delivery_msg` = '$delivery_msg', `status` = '$status'
         WHERE (`no` = '$order_no');");
      return $this->db->affected_rows();

    }


}
 ?>
