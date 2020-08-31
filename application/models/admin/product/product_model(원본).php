<?php
/*데이터 테이블 이름마다 모델을 생성해주는 것이 깔끔하다*/
class admin_product_model extends CI_Model{
    function __construct(){
      parent::__construct();
    }

    function gets(){
      return $this->db->query("SELECT * FROM product")->result();
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
      $this->load->model('admin_inoutput_info_model');
      $inoutput_info = $this->admin_inoutput_info_model->add(array('output_info' => $output_info, 'input_info'=>$input_info));
      $inoutput_info_no = $inoutput_info->no;
      /*inoutput_info 테이블 INSERT*/

      /*product 테이블 INSERT*/
        $this->db->query("INSERT INTO product(`name`, `code`, `title`, `content`, `price`, `discount_price`, `product_main_category_id`, `product_middle_category_id`, `product_sub_category_id`, `admin_no`, `inoutput_info_no`, `regdate`, `update`)
        values('$product_name', '$product_code', '$product_title','$product_content', '$product_price', '$product_discount_rate_2', '$main_category', '$middle_category', '$sub_category', '$admin_no','$inoutput_info_no', NOW(),NOW());");
       /*product 테이블 INSERT*/


       //등록된 상품의 번호 조회
       //상품번호 저장 후 배열에 저장
       //상품번호 저장 후 옵션.옵션디테일, 옵션코드,이미지에 저장

       // product 테이블에 추가된 최근 row 불러오기
      $productInfo = $this->db->query("SELECT `no` from `product` ORDER BY `regdate` desc limit 1")->row();
      // product 테이블에 추가된 최근 row에서 product_no 변수 지정;
      $prodNum = $productInfo;
      // var_dump($prodNum);
      $option['product_no']= $prodNum->no;
      // var_dump($option);

      /*product_thumnail 테이블 INSERT*/
      $this->load->model('admin_product_thumnail_model');
      $product_thum_info = $this->admin_product_thumnail_model->add($option);
      /*product_thumnail 테이블 INSERT*/

      /*option 테이블 INSERT -> detial 테이블까지 */
      $this->load->model('admin_option_model');
      $onption_info = $this->admin_option_model->add($option);
      /*option 테이블 INSERT -> detial 테이블까지 */

      /*option code 테이블 INSERT*/
      $this->load->model('admin_option_code_model');
      $onption_info = $this->admin_option_code_model->add($option);
      /*option code 테이블 INSERT*/

      // if(isset($option['productDetailList'][0]['stock_use1'])){ // 단품
      //   echo "모델 단품!!!!!!!!!!!!!!";
      // }else if(isset($option['optionList'][0]['name'])){ //옵션
      //
      //   echo "모델 옵션!!!!!!!!!!!!!!";
      // }else{
      //
      // }
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
      $admin_no = $option['admin_no'];
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

      /*product 테이블 INSERT*/
      $this->db->query("INSERT INTO product(`name`, `code`, `title`, `content`, `price`, `discount_price`, `product_main_category_id`, `product_middle_category_id`, `product_sub_category_id`, `admin_no`, `inoutput_info_no`, `regdate`, `update`)
      values('$product_name', '$product_code', '$product_title','$product_content', '$product_price', '$product_discount_rate_2', '$main_category', '$middle_category', '$sub_category', '$admin_no','$inoutput_info_no', NOW(),NOW());");
      /*product 테이블 INSERT*/
      
      /*inoutput_info 테이블 INSERT*/
      $this->load->model('admin_inoutput_info_model');
      $inoutput_info = $this->admin_inoutput_info_model->update(array('output_info' => $output_info, 'input_info'=>$input_info));
      $inoutput_info_no = $inoutput_info->no;
      /*inoutput_info 테이블 INSERT*/



       //등록된 상품의 번호 조회
       //상품번호 저장 후 배열에 저장
       //상품번호 저장 후 옵션.옵션디테일, 옵션코드,이미지에 저장

       // product 테이블에 추가된 최근 row 불러오기
      $productInfo = $this->db->query("SELECT `no` from `product` ORDER BY `regdate` desc limit 1")->row();
      // product 테이블에 추가된 최근 row에서 product_no 변수 지정;
      $prodNum = $productInfo;
      // var_dump($prodNum);
      $option['product_no']= $prodNum->no;
      // var_dump($option);

      /*product_thumnail 테이블 INSERT*/
      $this->load->model('admin_product_thumnail_model');
      $product_thum_info = $this->admin_product_thumnail_model->add($option);
      /*product_thumnail 테이블 INSERT*/

      /*option 테이블 INSERT -> detial 테이블까지 */
      $this->load->model('admin_option_model');
      $onption_info = $this->admin_option_model->add($option);
      /*option 테이블 INSERT -> detial 테이블까지 */

      /*option code 테이블 INSERT*/
      $this->load->model('admin_option_code_model');
      $onption_info = $this->admin_option_code_model->add($option);
      /*option code 테이블 INSERT*/

      // if(isset($option['productDetailList'][0]['stock_use1'])){ // 단품
      //   echo "모델 단품!!!!!!!!!!!!!!";
      // }else if(isset($option['optionList'][0]['name'])){ //옵션
      //
      //   echo "모델 옵션!!!!!!!!!!!!!!";
      // }else{
      //
      // }
      $this->db->trans_complete();

      if(isset($option['product_no'])){
        $retVal = true;
      }else{
        $retVal = false;
      }

      return $retVal;
    }
}
 ?>
