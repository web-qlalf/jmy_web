<?php
/*데이터 테이블 이름마다 모델을 생성해주는 것이 깔끔하다*/
class product_detail_model extends CI_Model{
    function __construct(){
      parent::__construct();
    }

    function gets($product_no){

       return $this->db->query("SELECT * FROM `product_detail` where `product_no` = '$product_no';")->result_array();

    }
    function getCode($detail_no){

       return $this->db->query("SELECT `option_code_no` FROM `product_detail` where `no` = '$detail_no';")->result_array();
    }
    function getProduct($detail_no){

       return $this->db->query("SELECT `product_no` FROM `product_detail` where `no` = '$detail_no';")->result_array();
    }

}
 ?>
