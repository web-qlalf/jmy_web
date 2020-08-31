<?php
/*데이터 테이블 이름마다 모델을 생성해주는 것이 깔끔하다*/
class option_detail_model extends CI_Model{
    function __construct(){
      parent::__construct();
    }

    function update_info_gets($option_no){
      return $this->db->query("SELECT * FROM `option_detail` WHERE option_no = $option_no ;")->row_array();
    }

    function add($option){

        $option_no = $option['option_no'];
        $optlist = $option['optlist'];
        var_dump($optlist);
        var_dump($option_no);
        $this->db->query("INSERT INTO `option_detail` (`name`, `option_no`) VALUES ('$optlist', '$option_no');");


      /* $String = $optlist;
      //문자열 자르기 : 배열로 저장된다.
      $optlist =explode(',' , $String);
      //배열 크기 가져오기
      $cnt = count($optlist);

      for($i = 0 ; $i < $cnt ; $i++){
      	echo($optlist[$i] . "<br/>");
      }*/

    }
    function add_update($option){
      $optionDetailName = $option['optionDetailName'];
      $option_no = $option['option_no'];

        $this->db->query("INSERT INTO `option_detail` (`name`, `option_no`) VALUES ('$optionDetailName', '$option_no');");
        return $this->db->insert_id();
    }

    function delete($option_no){
      //DELETE FROM `test_mall`.`option_detail` WHERE (`no` = '9');
      $this->db->query("DELETE FROM `option_detail` WHERE (`option_no` = '$option_no');");
      return $this->db->affected_rows();
    }

}
 ?>
