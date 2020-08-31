<?php
/*데이터 테이블 이름마다 모델을 생성해주는 것이 깔끔하다*/
class option_code_model extends CI_Model{
    function __construct(){
      parent::__construct();
    }

    function gets($option_code_no){

       return $this->db->query("SELECT * FROM `option_code` WHERE `no` = '$option_code_no';")->result_array();

    }


}
 ?>
