<?php
/*데이터 테이블 이름마다 모델을 생성해주는 것이 깔끔하다*/
class product_model extends CI_Model{
    function __construct(){
      parent::__construct();
    }

    function gets(){
      return $this->db->query("SELECT * FROM product")->result_array();
    }

    function getInout($product_no){

       return $this->db->query("SELECT `inoutput_info_no` FROM `product` where `no` = '$product_no';")->result_array();

    }
    function getProd($product_no){

       return $this->db->query("SELECT * FROM `product` where `no` = '$product_no';")->result_array();

    }

    function product_info_gets($pagingData){
      $offset = $pagingData['offset'];
      $limit = $pagingData['limit'];

      return $this->db->query("SELECT * FROM product ORDER BY regdate DESC LIMIT $offset, $limit;")->result_array();

    }

    function update_info_gets($product_no){
      return $this->db->query("SELECT * FROM `product` WHERE `no` = $product_no;")->result_array();
    }



    function add($option){
      // var_dump('================================model=================================================');
      // var_dump($option);
      $admin_no = $option['admin_no'];
      $product_no = $option['product_no'];
      $main_category = $option['main_category_value'];
      $middle_category = $option['middle_category_value'];
      $sub_category = $option['sub_category_value'];
      $product_name = $option['product_name'];
      $product_code = $option['product_code'];
      $product_content = $option['product_content'];
      $product_title = $option['product_title'];
      $product_price = $option['product_price'];
      $product_discount_price = $option['product_discount_price'];
      $product_discount_rate_1 = $option['product_discount_rate_1'];
      $product_discount_rate_2 = $option['product_discount_rate_2'];
      $output_info = $option['output_info'];
      $input_info = $option['input_info'];
      $optionList = $option['optionList'];
      $productDetailList = $option['productDetailList'];

      $this->db->trans_start();

      /*inoutput_info 테이블 INSERT*/
      $this->load->model('admin/delivery/inoutput_info_model');
      $inoutput_info = $this->inoutput_info_model->add(array('output_info' => $output_info, 'input_info'=>$input_info));
      $inoutput_info_no = $inoutput_info->no;
      /*inoutput_info 테이블 INSERT*/

      /*product 테이블 INSERT*/
        $this->db->query("INSERT INTO product(`no`,`name`, `code`, `title`, `content`, `price`, `discount_price`, `product_main_category_id`, `product_middle_category_id`, `product_sub_category_id`,  `inoutput_info_no`, `regdate`, `update`)
        values('$product_no', '$product_name', '$product_code', '$product_title','$product_content', '$product_price', '$product_discount_rate_2', '$main_category', '$middle_category', '$sub_category', '$inoutput_info_no', NOW(),NOW());");
       /*product 테이블 INSERT*/

      /*option 테이블 INSERT -> detial 테이블까지 */
      $this->load->model('admin/option/option_model');
      $onption_info = $this->option_model->add($option);
      /*option 테이블 INSERT -> detial 테이블까지 */

      /*product_thumnail 테이블 INSERT*/
      $this->load->model('admin/product/product_thumnail_model');
      $product_thum_info = $this->product_thumnail_model->add($option);
      /*product_thumnail 테이블 INSERT*/

      /*option code 테이블 INSERT*/
      $this->load->model('admin/option/option_code_model');
      $opt_code_info = $this->option_code_model->add($option);
      /*option code 테이블 INSERT*/

      $this->db->trans_complete();

      if(isset($option['product_no'])){
        $retVal = true;
      }else{
        $retVal = false;
      }

      return $retVal;
    }

    function update($option){
      // var_dump('================================model=================================================');
      // var_dump($option);

      $product_no = $option['product_no'];
      $product_name = $option['product_name'];
      $product_code = $option['product_code'];
      $product_content = $option['product_content'];
      $product_title = $option['product_title'];
      $product_price = $option['product_price'];
      $product_discount = $option['product_discount_rate_2'];
      $main_category_id = $option['main_category_id'];
      $middle_category_id = $option['middle_category_id'];
      $sub_category_id = $option['sub_category_id'];

      $inoutput_info_no = $option['inoutput_info_no'];
      $input_info = $option['input_info'];
      $output_info = $option['output_info'];


      $this->db->trans_start();

      /*product 테이블 UPDATE*/
      $this->db->query("UPDATE `product`
        SET `name` = '$product_name',
        `code` = '$product_code',
        `title` = '$product_title',
        `content` = '$product_content',
        `price` = '$product_price',
        `discount_price` = '$product_discount',
        `update` = NOW(),
        `product_main_category_id` = '$main_category_id',
        `product_middle_category_id` = '$middle_category_id',
        `product_sub_category_id` = '$sub_category_id'
        WHERE (`no` = '$product_no');");
        $product = $this->db->affected_rows();
      /*product 테이블 UPDATE*/

      /*inoutput_info 테이블 UPDATE*/
      $this->load->model('admin/delivery/inoutput_info_model');
      // UPDATE `test_mall`.`inoutput_info` SET `output_no` = '11', `input_no` = '11' WHERE (`no` = '2') and (`output_no` = '1') and (`input_no` = '1');

      $inoutput_info = $this->inoutput_info_model->update(array(
        'output_info' => $output_info,
        'input_info'=>$input_info,
        'inoutput_info_no'=>$inoutput_info_no
      ));
      /*inoutput_info 테이블 UPDATE*/

      $this->db->trans_complete();

      if($inoutput_info == 0 || $inoutput_info == null || $inoutput_info == ''){
        $retVal = false;
      }else{
        $retVal = true;
      }

      return $retVal;
    }
}
 ?>
