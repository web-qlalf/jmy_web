<?php
/*데이터 테이블 이름마다 모델을 생성해주는 것이 깔끔하다*/
class product_thumnail_model extends CI_Model{
    function __construct(){
      parent::__construct();
    }

    function getOne($product_no){
      return $this->db->query("SELECT * FROM product_thumnail WHERE product_no = $product_no ORDER BY no ASC LIMIT 1;")->result_array();

    }
    function update_info_gets($product_no){
      return $this->db->query("SELECT * FROM product_thumnail WHERE product_no = $product_no;")->result_array();

    }

    function add3333($option){
      $img_src = $option['img'];
      $file_name = $option['file_name_after'];
      $img_exe =$option['file_exe'];
      $product_no =$option['product_no'];
      $this->db->query("INSERT INTO `product_thumnail` (`filename`, `fileURL`,  `fileExe`,`product_no`) VALUES ('$file_name', '$img_src','$img_exe', '$product_no');");
    }
    function update($option){
      $img_src = $option['img'];
      $file_name = $option['file_name_after'];
      $img_exe =$option['file_exe'];
      $product_no =$option['product_no'];
      $img_no =$option['img_no'];

      // echo $img_no;
      $this->db->query("UPDATE `product_thumnail` SET `fileExe` = '$img_exe' WHERE (`no` = $img_no)");
      // $val =$this->db->last_query();
      // var_dump($val);
    }

    function add($option){
      $product_no = $option['product_no'];
      $img_file = $option['img_file'];
      $img_src_data =$option['img_src_data'];
      $img_exe =$option['img_exe'];
      $img_name =$option['img_name'];

      $cnt1 = count($img_file);
      $cnt2 = count($img_src_data);

      if($cnt1 == $cnt2){
        for ($i=0; $i < $cnt1 ; $i++) {

          $this->db->query("INSERT INTO `product_thumnail` (`filename`, `fileURL`,  `fileExe`,`product_no`) VALUES ('$img_name[$i]', '$img_src_data[$i]','$img_exe[$i]', '$product_no');");
        }
        $retVal = true;
      }else{
        $retVal = false;
      }
      //INSERT INTO `test_mall`.`product_thumnail` (`filename`, `fileURL`, `fileExe`, `product_no`) VALUES ('f', 'd', 'd', 'f');
      return $retVal;
    }

    function add2($option){
      if(isset($option['img_src_data'])){
        $product_no = $option['product_no'];
        $img_file = $option['img_file'];
        $img_src_data =$option['img_src_data'];

        $img_file = array_filter($img_file);
        $img_src_data = array_filter($img_src_data);

        var_dump('=======================img========================');
        var_dump($img_file);
        var_dump($img_src_data);

        $cnt1 = count($img_file);
        $cnt2 = count($img_src_data);


        if($cnt1 == $cnt2){
          for ($i=0; $i < $cnt1 ; $i++) {
            $beforefile_url = $img_src_data[$i];
            $beforeFile_name = $img_file[$i];
            $afterfile_url = $_SERVER['DOCUMENT_ROOT'].'/static/product/'.$product_no."/";
            $afterFile_name = 'procut_thumnail_'.$i;
            //확장자
            $ext = explode('.',$beforeFile_name);
            $ext = strtolower(array_pop($ext));

            if(!is_Dir($afterfile_url)){
              mkdir($afterfile_url,0777, true);
              // @chmod($uploadsDir,0777);
              //mkdir( dir, chmod,  recursive ) - Makes directory
              //dir = 디렉토리 경로 chmod = 디렉토리 권한 recursive = 하위 폴더 생성을 허락할 것인지 여부
            }

            rename($_SERVER['DOCUMENT_ROOT'].$beforefile_url,$afterfile_url.$afterFile_name.'.'.$ext);

            $total_url = $afterfile_url;
            $save_path = '/static/product/'.$product_no."/";
            $total_file_name = $afterFile_name.'.'.$ext;
            $this->db->query("INSERT INTO `product_thumnail` (`filename`, `fileURL`, `product_no`) VALUES ('$total_file_name', '$save_path', '$product_no');");
          }
          $retVal = true;
        }else{
          $retVal = false;
        }
      }else{
        $retVal = false;
      }

      return $retVal;
    }


}
 ?>
