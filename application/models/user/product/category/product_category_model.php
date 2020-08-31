<?php
/*데이터 테이블 이름마다 모델을 생성해주는 것이 깔끔하다*/
class product_category_model extends CI_Model{
    function __construct(){
      parent::__construct();
    }

    function gets($product_no){

       return $this->db->query("SELECT * FROM `product_category` where `id` = '$product_no';")->result_array();

    }
    function getName($product_no){

       return $this->db->query("SELECT `name` FROM `product_category` where `id` = '$product_no';")->result_array();

    }
    function getParent($parent_no){

       return $this->db->query("SELECT * FROM `product_category` where `parent_id` = '$parent_no';")->result_array();

    }

}
 ?>
