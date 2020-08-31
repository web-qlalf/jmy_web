<?php
/*데이터 테이블 이름마다 모델을 생성해주는 것이 깔끔하다*/
class delivery_info_model extends CI_Model{
    function __construct(){
      parent::__construct();
    }

    function inputGets($input_no){

       return $this->db->query("SELECT * FROM `delivery_info` WHERE `no` = '$input_no';")->result_array();

    }
    function outputGets($output_no){

       return $this->db->query("SELECT * FROM `delivery_info` WHERE `no` = '$output_no';")->result_array();

    }


}
 ?>
