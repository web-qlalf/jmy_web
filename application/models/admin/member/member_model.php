<?php
/*데이터 테이블 이름마다 모델을 생성해주는 것이 깔끔하다*/
class member_model extends CI_Model{
    function __construct(){
      parent::__construct();
    }

    function gets(){
      return $this->db->query("SELECT * FROM `user`")->result_array();
    }
    function getOne($user_no){
      return $this->db->query("SELECT `no`, `name`, date_format(regdate, '%Y-%m-%d') as regdate, `email`,`tel1`,`tel2`,`zipcode`,`address1` ,`address2`,`address3`, `status` FROM `user` WHERE `no` = '$user_no'")->result_array();
    }
    function getsRegdate(){
      return $this->db->query("SELECT `no`, `name`, date_format(regdate, '%Y-%m-%d') as regdate, `email`,`tel1`,`tel2`,`zipcode`,`address1` ,`address2`,`address3`, `status` FROM `user`")->result_array();
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
      $status = $option['status'];
      $this->db->query("UPDATE `user` SET `tel1` = '$user_tel1', `tel2` = '$user_tel2', `zipcode` = '$zipcode',`address1` = '$address1',`address2` = '$address2',`address3` = '$address3' ,`status` = '$status' WHERE (`no` = '$user_no')");
      return $this->db->affected_rows();
    }
}
 ?>
