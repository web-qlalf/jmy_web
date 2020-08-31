<?php
/*데이터 테이블 이름마다 모델을 생성해주는 것이 깔끔하다*/
class order_model extends CI_Model{
    function __construct(){
      parent::__construct();
    }

    function gets($user_no)
    {
      return $this->db->query("SELECT * FROM `order` WHERE `user_no`='$user_no';")->result_array();
    }
    function getByNumber($order_no)
    {
      return $this->db->query("SELECT * FROM `order` WHERE `no`='$order_no';")->result_array();
    }

    function getList($pagingData){
      $offset = $pagingData['offset'];
      $limit = $pagingData['limit'];

      return $this->db->query("SELECT * FROM `order` ORDER BY  `no`  DESC LIMIT $offset, $limit;")->result_array();

    }
    function add($option)
    {
      $order_name = $option['order_name'];
      $order_zipcode = $option['order_zipcode'];
      $order_address1 = $option['order_address1'];
      $order_address2 = $option['order_address2'];
      $order_address3 = $option['order_address3'];
      $order_tel1 = $option['order_tel1'];
      $order_tel2 = $option['order_tel2'];
      $reciever_name = $option['reciever_name'];
      $reciever_zipcode = $option['reciever_zipcode'];
      $reciever_address1 = $option['reciever_address1'];
      $reciever_address2 = $option['reciever_address2'];
      $reciever_address3 = $option['reciever_address3'];
      $reciever_tel1 = $option['reciever_tel1'];
      $reciever_tel2 = $option['reciever_tel2'];
      $delivery_msg = $option['msg'];
      $payment = $option['payment'];
      $paymethod = $option['paymethod'];
      $status = $option['status'];
      $user_no = $option['user_no'];

       $this->db->query("INSERT INTO `order` (`order_name`, `order_zipcode`, `order_address1`,`order_address2`, `order_address3`, `order_tel1`, `order_tel2`, `reciever_name`, `reciever_zipcode`, `reciever_address1`, `reciever_address2`, `reciever_address3`, `reciever_tel1`, `reciever_tel2`,`delivery_msg`, `payment`, `paymethod`, `status`, `user_no`, `regdate`,`update`) VALUES ('$order_name', '$order_zipcode', '$order_address1', '$order_address2', '$order_address3', '$order_tel1', '$order_tel2', '$reciever_name', '$reciever_zipcode', '$reciever_address1', '$reciever_address2', '$reciever_address3', '$reciever_tel1', '$reciever_tel2', '$delivery_msg', '$payment', '$paymethod', '$status', '$user_no',now(), now());");

       return $this->db->insert_id();

    }

}
 ?>
