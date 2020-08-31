<?php
/*데이터 테이블 이름마다 모델을 생성해주는 것이 깔끔하다*/
class user_model extends CI_Model{
    function __construct(){
      parent::__construct();
    }

    function searchEmail($userEmail){

       return $this->db->query("SELECT * FROM `user` where email = '$userEmail';")->result_array();

    }
    function searchNo($user_no){

       return $this->db->query("SELECT * FROM `user` where `no` = '$user_no';")->result_array();

    }
    function searchTel1($user_no){

       return $this->db->query("SELECT `tel1` FROM `user` where `no` = '$user_no';")->result_array();

    }

    function updateTel1($option){
      $user_no = $option['user_no'];
      $tel1 = $option['tel1'];
      $this->db->query("UPDATE `user` SET `tel1` = '$tel1' WHERE (`no` = '$user_no');");
      return $this->db->affected_rows();
    }
    function updateAll($option){
      $user_no = $option['user_no'];
      $user_name = $option['user_name'];
      $user_email = $option['user_email'];
      $user_tel1 = $option['user_tel1'];
      $user_tel2 = $option['user_tel2'];
      $zipcode = $option['zipcode'];
      $address1 = $option['address1'];
      $address2 = $option['address2'];
      $address3 = $option['address3'];
      $this->db->query("UPDATE `user` SET `tel1` = '$user_tel1', `tel2` = '$user_tel2', `zipcode` = '$zipcode',`address1` = '$address1',`address2` = '$address2',`address3` = '$address3' WHERE (`no` = '$user_no') And (`name` = '$user_name') AND (`email` = '$user_email');");
      return $this->db->affected_rows();
    }

    function add($option){
      $user_email = $option['user_email'];
      $user_password = $option['user_password'];
      $user_name = $option['user_name'];
       $this->db->query("INSERT INTO `test_mall`.`user` (`email`, `name`, `pw`, `regdate`, `update`, `status`) VALUES ('$user_email', '$user_name','$user_password', NOW(), NOW(), '0');");

       return $this->db->insert_id();

    }

}
 ?>
