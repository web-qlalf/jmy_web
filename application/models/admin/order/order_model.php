<?php
/*데이터 테이블 이름마다 모델을 생성해주는 것이 깔끔하다*/
class order_model extends CI_Model{
    function __construct(){
      parent::__construct();
    }

    function gets(){
      return $this->db->query("SELECT * FROM `order`")->result_array();
    }

    function info_gets($pagingData){
      $offset = $pagingData['offset'];
      $limit = $pagingData['limit'];

      return $this->db->query("SELECT * FROM `order` ORDER BY regdate DESC LIMIT $offset, $limit;")->result_array();
    }

    function getOne($order_no){
      return $this->db->query("SELECT * FROM `order` WHERE `no` = '$order_no';")->result_array();
    }

    function getToday(){
      return $this->db->query("SELECT * FROM `order` WHERE DATE_FORMAT(regdate, '%Y-%m-%d') = CURDATE();")->result_array();
    }


}
 ?>
