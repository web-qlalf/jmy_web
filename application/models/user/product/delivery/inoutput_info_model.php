<?php
/*데이터 테이블 이름마다 모델을 생성해주는 것이 깔끔하다*/
class inoutput_info_model extends CI_Model{
    function __construct(){
      parent::__construct();
    }

    function gets($inoutput_info_no){

       return $this->db->query("SELECT * FROM `inoutput_info` WHERE `no` = $inoutput_info_no;")->result_array();

    }


}
 ?>
