<?php
/*데이터 테이블 이름마다 모델을 생성해주는 것이 깔끔하다*/
class inoutput_info_model extends CI_Model{
    function __construct(){
      parent::__construct();
    }

    function add($option){
      // var_dump('================================배송지정보=================================================');
      $output_info = $option["output_info"];
      $input_info = $option["input_info"];
      $this->db->query("INSERT INTO `inoutput_info` (`output_no`, `input_no`) VALUES ('$output_info', '$input_info');");

      $inoutput_info = $this->db->query("SELECT `no` from `inoutput_info` ORDER BY `no` desc limit 1")->row();

      return $inoutput_info;
    }
    function update_info_gets($inoutput_no){

      return $this->db->query("SELECT * FROM `inoutput_info` WHERE `no` = $inoutput_no")->row_array();
    }

    function update($option){
      // var_dump('================================배송지정보=================================================');
      $output_info = $option["output_info"];
      $input_info = $option["input_info"];
      $inoutput_info_no = $option["inoutput_info_no"];

      $this->db->query(" UPDATE `inoutput_info` SET `output_no` = '$output_info', `input_no` = '$input_info' WHERE (`no` = '$inoutput_info_no');");
      return $this->db->affected_rows();

    }

    function gets($inoutput_info_no){

       return $this->db->query("SELECT * FROM `inoutput_info` WHERE `no` = $inoutput_info_no;")->result_array();

    }
}
 ?>
