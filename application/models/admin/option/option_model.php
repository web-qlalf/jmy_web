<?php
/*데이터 테이블 이름마다 모델을 생성해주는 것이 깔끔하다*/
class option_model extends CI_Model{
    function __construct(){
      parent::__construct();
    }

    function update_info_gets($product_no){
      return $this->db->query("SELECT * FROM `option` WHERE product_no = $product_no;")->result_array();
    }

    function add($option){
      $product_no = $option['product_no'];
      if(isset($option['optionList'][0]['name'])){
        $opt = $option['optionList'][0]['name'];
        //[0]=> "색상" [1]=>  "사이즈" [2]=>"용도"
        $optlist =$option['optionList'][0]['optionDetailList'];
        //[0]=> "레드,블루" [1]=> "95,100" [2]=>  "보관,착용"
        $cnt = count($opt);
        for ($i=0; $i < $cnt; $i++) {
          // var_dump($opname);
          $option_name[$i] = $opt[$i];
          // var_dump($option_name[$i]);
          $this->db->query("INSERT INTO `option` (`name`, `regdate`, `product_no`) VALUES ('$option_name[$i]', NOW(), '$product_no');");

          $option_no = $this->db->query("SELECT `no` FROM `option` ORDER BY no DESC limit 1;")->row();

          $option_no = $option_no->no;

          /*option detail 테이블 INSERT*/
          $this->load->model('admin/option/option_detail_model');
          $onption_detail = $this->option_detail_model->add(array(
            'option_no'=> $option_no,
            'optlist'=> $optlist[$i]
          ));
          /*option detail 테이블 INSERT*/
        }
      }else{
        // echo "단품!!!!!!!!!!!!!<br />";
        // var_dump($option['productDetailList'][0]);
        //["stock_use1"]=> "900"
        // var_dump($option['optionList'][0]);
        //["optionDetailList"]=> "단품"
        $single_name = $option['optionList'][0]["optionDetailList"];
        $single_stock = $option['productDetailList'][0]["stock_use1"];

        $this->db->query("INSERT INTO `option` (`name`, `regdate`, `product_no`) VALUES ('$single_name', NOW(), '$product_no');");

        $option_no = $this->db->query("SELECT `no` FROM `option` ORDER BY no DESC limit 1;")->row();
        $option_no = $option_no->no;
        /*option detail 테이블 INSERT*/
        $this->load->model('admin/option/option_detail_model');
        $onption_detail = $this->option_detail_model->add(array(
          'option_no'=> $option_no,
          'optlist'=> $single_name
        ));
        /*option detail 테이블 INSERT*/

      }




      // if($option['optionList'][0]['name']){
      //   $opname =$option['optionList'][0]['name'];
      // }else{
      //   $opname = $optlist;
      // }


      // var_dump($option['optionList']);
      // var_dump($option['optionList'][0]['optionDetailList']);






    }

    function add_update($option){
      $product_no = $option['product_no'];
      $optionName = $option['name'];
      $optionDetailName = $option['detail_name'];

      $this->db->query("INSERT INTO `option` (`name`, `regdate`, `product_no`) VALUES ('$optionName', NOW(), '$product_no');");
      $result = $this->db->insert_id();

      /*option detail 테이블 INSERT*/
      $this->load->model('admin/option/option_detail_model');
      $onption_detail = $this->option_detail_model->add_update(array(
        'optionDetailName'=> $optionDetailName,
        'option_no'=> $result
      ));
      /*option detail 테이블 INSERT*/

    }

    function delete($option_no){
      $this->db->query("DELETE FROM `option` WHERE (`no` = '$option_no');");
      return $this->db->affected_rows();
      // DELETE FROM `test_mall`.`product_detail` WHERE (`no` = '10');
    }
}
 ?>
