<?php
/*데이터 테이블 이름마다 모델을 생성해주는 것이 깔끔하다*/
class delivery_info_model extends CI_Model{
    function __construct(){
      parent::__construct();
    }

    function gets(){
      return $this->db->query("SELECT * FROM delivery_info")->result();
    }
    function info_gets($delivery_no){
      $delivery_no = $delivery_no['delivery_num'];
      return $this->db->query("SELECT * FROM delivery_info WHERE no = $delivery_no")->result();
    }

    function inputGets($input_no){

       return $this->db->query("SELECT * FROM `delivery_info` WHERE `no` = '$input_no';")->result_array();

    }
    function outputGets($output_no){

       return $this->db->query("SELECT * FROM `delivery_info` WHERE `no` = '$output_no';")->result_array();

    }


    function update_info_gets($delivery_no){
      return $this->db->query("SELECT * FROM delivery_info WHERE no = $delivery_no;")->result_array();
    }

    function delivery_info_gets($pagingData){
      $offset = $pagingData['offset'];
      $limit = $pagingData['limit'];

      return $this->db->query("SELECT * FROM delivery_info ORDER BY  regdate DESC LIMIT $offset, $limit;")->result();

    }

    function add($new){
      $shipping_name =$new['shipping_name'];
      $zipcode =$new['zipcode'];
      $address1 =$new['address1'];
      $address2 =$new['address2'];
      $address3 =$new['address3'];
      $delivery_company =$new['delivery_company'];
      $delivery_fee1 =$new['delivery_fee1'];
      $delivery_fee2 =$new['delivery_fee2'];
      $memo =$new['memo'];

      $this->db->query("INSERT INTO delivery_info(name, zipcode, address1, address2, address3,delivery_company, delivery_fee1, delivery_fee2, memo, regdate, update_date )values('$shipping_name', '$zipcode', '$address1', '$address2', '$address3', '$delivery_company', $delivery_fee1, $delivery_fee2, '$memo',now(),now());");

      $new_delivery_name = $this->db->query("SELECT `no` from `delivery_info` ORDER BY `regdate` desc limit 1")->row();


      return $new_delivery_name;
    }

    function update($new){
      $delivery_no =$new['no'];
      $shipping_name =$new['shipping_name'];
      $zipcode =$new['zipcode'];
      $address1 =$new['address1'];
      $address2 =$new['address2'];
      $address3 =$new['address3'];
      $delivery_company =$new['delivery_company'];
      $delivery_fee1 =$new['delivery_fee1'];
      $delivery_fee2 =$new['delivery_fee2'];
      $memo =$new['memo'];

      $this->db->query("UPDATE delivery_info
        SET
        name ='$shipping_name',
        zipcode='$zipcode',
        address1='$address1',
        address2='$address2',
        address3='$address3',
        delivery_company ='$delivery_company',
        delivery_fee1='$delivery_fee1',
        delivery_fee2='$delivery_fee2',
        memo='$memo',
        update_date =now()
        WHERE (`no` = $delivery_no);");

      $new_delivery_no = $this->db->query("SELECT `no` from `delivery_info` ORDER BY `update_date` desc limit 1")->result_array();


      return $new_delivery_no;
    }

    function delete($new){
      $delivery_no =$new['no'];
      $search = $this->db->query("SELECT * FROM delivery_info WHERE no = $delivery_no;")->result();

      if($search == null || $search == false){
        $retVal =false;
      }else{
        $this->db->query("DELETE FROM `delivery_info` WHERE (`no` = $delivery_no);");
        $result =  $this->db->query("SELECT * from `delivery_info` WHERE (`no` = $delivery_no);")->result_array();
          if($result == null || $result == false){
            $retVal = true;
          }else{
            $retVal = false;
          }
      }




      return $retVal;
    }

}
 ?>
