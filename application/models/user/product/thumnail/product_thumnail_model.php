<?php
/*데이터 테이블 이름마다 모델을 생성해주는 것이 깔끔하다*/
class product_thumnail_model extends CI_Model{
    function __construct(){
      parent::__construct();
    }

    function gets($product_no){

       return $this->db->query("SELECT * FROM `product_thumnail` WHERE `product_no` = '$product_no';")->result_array();

    }
    function getOne($product_no){

       return $this->db->query("SELECT * FROM `product_thumnail` WHERE `product_no` = '$product_no' limit 1;")->result_array();

    }


}
 ?>
