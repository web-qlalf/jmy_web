<?php
/*데이터 테이블 이름마다 모델을 생성해주는 것이 깔끔하다*/
class product_model extends CI_Model{
    function __construct(){
      parent::__construct();
    }

    function gets($product_no){

       return $this->db->query("SELECT * FROM `product` where `no` = '$product_no';")->result_array();

    }
    function getName($product_no){

       return $this->db->query("SELECT `name` FROM `product` where `no` = '$product_no';")->result_array();

    }
    function getInout($product_no){

       return $this->db->query("SELECT `inoutput_info_no` FROM `product` where `no` = '$product_no';")->result_array();

    }
    function getAll(){

       return $this->db->query("SELECT * FROM `product` limit 16;")->result_array();

    }
    function getMain($category_no){

       return $this->db->query("SELECT * FROM `product` WHERE `product_main_category_id` = $category_no limit 8;")->result_array();

    }
    function getMiddle($category_no){

       return $this->db->query("SELECT * FROM `product` WHERE `product_middle_category_id` = $category_no limit 8;")->result_array();

    }
    function getSub($category_no){

       return $this->db->query("SELECT * FROM `product` WHERE `product_sub_category_id` = $category_no limit 8;")->result_array();

    }

}
 ?>
