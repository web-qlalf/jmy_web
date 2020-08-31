<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Thumbnail extends MY_Controller {

  function __construct(){
       parent::__construct();
   }

  function upload(){
    $allowedExt = array("jpg", "JPG", "jpeg", "JPEG", "png", "PNG", "gif", "GIF");

    switch ($_POST['mode']) {
      case 'temporary_image_upload':
         $product_no = $_POST['product_no'];
         $img_no = $_POST['img_no'];
         $uploadsDir = '/static/product/'.$product_no;
         $upload_name = 'procut_thumnail_'.$img_no;

         $mkdir2 =$_SERVER['DOCUMENT_ROOT'].$uploadsDir.'/';

         if(!is_Dir($mkdir2)){
           mkdir($mkdir2,0777, true);
           //mkdir( dir, chmod,  recursive ) - Makes directory
           //dir = 디렉토리 경로 chmod = 디렉토리 권한 recursive = 하위 폴더 생성을 허락할 것인지 여부
         }

         $file_name = $_FILES['tmpFile']['name'];
         // echo "넘어온값";
         // var_dump($file_name);
         $file_info = $_FILES['tmpFile']['tmp_name'];
         //var_dump($file_info);

         $image_size = getimagesize($file_info);
         $image_volume = filesize($file_info)/1024;
         $image_volume = floor($image_volume);
         // 파일의 확장자를 분리
         $ext = explode('.',$file_name);
         $ext = strtolower(array_pop($ext));

         $file_ext = explode('.',$file_name);
         $file_ext = array_pop($file_ext);
         //str_replace('해당문자','바꿀문자',변수);
         $fileNameWithoutExt = str_replace('.'.$file_ext, '', $file_name);
         // var_dump($fileNameWithoutExt);
         // var_dump($file_ext);

           if($image_size[0] < 600 || $image_size[1] <600){
             $result['message'] = '가로 600px, 세로 600px 이상의 이미지를 등록해 주세요.';
           }else if($image_size[0] > 1280 || $image_size[1] > 1280){
             $result['message'] = '가로 1280px, 세로 1280px 이하의 이미지를 등록해 주세요.';
           }else if(!in_array($ext, $allowedExt)){
              $result['message'] = "허용되지 않는 확장자입니다.";
              // 업로드 가능한 확장자 인지 확인한다.
           }else{

                 // 업로드할 파일의 경로
                 // $tmpFile = $_SERVER['DOCUMENT_ROOT'].$uploadsDir."/".$file_name;

                 $save_path = $_SERVER['DOCUMENT_ROOT'].$uploadsDir."/";
                 $save_path_2 = $uploadsDir."/";
                 $UpFile = $_FILES['tmpFile']['tmp_name'];
                 $saveInfo = $save_path.$upload_name.'.'.$ext;

                 // var_dump($saveInfo);
                 // echo "전";
                 // var_dump($file_name);
                 // if(isset($tmpFile)){
                 //   // $result['message'] = "중복된 파일이 있습니다.";
                 //   $file_rename = $this->get_rename($file_name, $save_path);
                 //   $file_name_2 = $file_rename;
                 // }else{
                 //   $file_name_2 = $file_name;
                 // }
                 // echo "후";
                 // var_dump($file_name_2);

                 if(move_uploaded_file($file_info, $saveInfo)) {
                     $result['img_src'] = $save_path_2.$upload_name.'.'.$ext;
                     $result['img'] = $save_path_2;
                     $result['file_name'] = $fileNameWithoutExt;
                     $result['file_name_after'] = $upload_name;
                     $result['file_size'][0] = $image_size[0];
                     $result['file_size'][1] = $image_size[1];
                     $result['file_volume'] = $image_volume;
                     $result['file_exe'] = $ext;
                     $result['ret'] = "succ";
                     $result['product_no'] = $product_no;
                     $result['img_no'] = $img_no;



                 } else {
                     $result['message'] = "업로드시 문제가 발생하였습니다.\n다시 시도하여 주시기 바랍니다.";
                 }


           }
       echo json_encode($result);
        break;
    }
  }

  function update(){
    $allowedExt = array("jpg", "JPG", "jpeg", "JPEG", "png", "PNG", "gif", "GIF");

    switch ($_POST['mode']) {
      case 'temporary_image_upload':
         $product_no = $_POST['product_no'];
         $img_exe_bf = $_POST['img_exe_bf'];
         $img_no = $_POST['img_no'];
         $img_code_no = $_POST['img_code_no'];
         $uploadsDir = '/static/product/'.$product_no;
         $upload_name = 'procut_thumnail_'.$img_no;

         $mkdir2 =$_SERVER['DOCUMENT_ROOT'].$uploadsDir.'/';

         if(!is_Dir($mkdir2)){
           mkdir($mkdir2,0777, true);
           //mkdir( dir, chmod,  recursive ) - Makes directory
           //dir = 디렉토리 경로 chmod = 디렉토리 권한 recursive = 하위 폴더 생성을 허락할 것인지 여부
         }

         $file_name = $_FILES['tmpFile']['name'];
         // echo "넘어온값";
         // var_dump($file_name);
         $file_info = $_FILES['tmpFile']['tmp_name'];
         //var_dump($file_info);

         $image_size = getimagesize($file_info);
         $image_volume = filesize($file_info)/1024;
         $image_volume = floor($image_volume);
         // 파일의 확장자를 분리
         $ext = explode('.',$file_name);
         $ext = strtolower(array_pop($ext));

         $file_ext = explode('.',$file_name);
         $file_ext = array_pop($file_ext);
         //str_replace('해당문자','바꿀문자',변수);
         $fileNameWithoutExt = str_replace('.'.$file_ext, '', $file_name);
         // var_dump($fileNameWithoutExt);
         // var_dump($file_ext);

           if($image_size[0] < 600 || $image_size[1] <600){
             $result['message'] = '가로 600px, 세로 600px 이상의 이미지를 등록해 주세요.';
           }else if($image_size[0] > 1280 || $image_size[1] > 1280){
             $result['message'] = '가로 1280px, 세로 1280px 이하의 이미지를 등록해 주세요.';
           }else if(!in_array($ext, $allowedExt)){
              $result['message'] = "허용되지 않는 확장자입니다.";
              // 업로드 가능한 확장자 인지 확인한다.
           }else{

                 // 업로드할 파일의 경로
                 // $tmpFile = $_SERVER['DOCUMENT_ROOT'].$uploadsDir."/".$file_name;

                 $save_path = $_SERVER['DOCUMENT_ROOT'].$uploadsDir."/";
                 $save_path_2 = $uploadsDir."/";
                 $UpFile = $_FILES['tmpFile']['tmp_name'];
                 $saveInfo = $save_path.$upload_name.'.'.$ext;
                 $beforeInfo = $save_path.$upload_name.'.'.$img_exe_bf;
                 // var_dump('지울URL');
                 // var_dump($beforeInfo);
                 unlink($beforeInfo);
                 // var_dump($saveInfo);
                 // echo "전";
                 // var_dump($file_name);
                 // if(isset($tmpFile)){
                 //   // $result['message'] = "중복된 파일이 있습니다.";
                 //   $file_rename = $this->get_rename($file_name, $save_path);
                 //   $file_name_2 = $file_rename;
                 // }else{
                 //   $file_name_2 = $file_name;
                 // }
                 // echo "후";
                 // var_dump($file_name_2);

                 if(move_uploaded_file($file_info, $saveInfo)) {
                     $result['img_src'] = $save_path_2.$upload_name.'.'.$ext;
                     $result['img'] = $save_path_2;
                     $result['file_name'] = $fileNameWithoutExt;
                     $result['file_name_after'] = $upload_name;
                     $result['file_size'][0] = $image_size[0];
                     $result['file_size'][1] = $image_size[1];
                     $result['file_volume'] = $image_volume;
                     $result['file_exe'] = $ext;
                     $result['ret'] = "succ";
                     $result['product_no'] = $product_no;
                     $result['img_no'] = $img_code_no;

                     /*product_thumnail 테이블 UPDATE*/
                     $this->load->model('admin/product/product_thumnail_model');
                     $product_thum_info = $this->product_thumnail_model->update($result);
                     /*product_thumnail 테이블 UPDATE*/

                 } else {
                     $result['message'] = "업로드시 문제가 발생하였습니다.\n다시 시도하여 주시기 바랍니다.";
                 }


           }
       echo json_encode($result);
        break;
    }
  }

  /* function temporary_file_upload(){
  //    $allowedExt = array("jpg", "JPG", "jpeg", "JPEG", "png", "PNG", "gif", "GIF");
  //
  //    switch ($_POST['mode']) {
  //      case 'temporary_image_upload':
  //
  //         $uploadsDir = '/static/temp';
  //
  //         $file_name = $_FILES['tmpFile']['name'];
  //         // echo "넘어온값";
  //         // var_dump($file_name);
  //         $file_info = $_FILES['tmpFile']['tmp_name'];
  //         //var_dump($file_info);
  //
  //         $image_size = getimagesize($file_info);
  //         $image_volume = filesize($file_info)/1024;
  //         $image_volume = floor($image_volume);
  //
  //           if($image_size[0] < 600 || $image_size[1] <600){
  //             $result['message'] = '가로 600px, 세로 600px 이상의 이미지를 등록해 주세요.';
  //           }else if($image_size[0] > 1280 || $image_size[1] > 1280){
  //             $result['message'] = '가로 1280px, 세로 1280px 이하의 이미지를 등록해 주세요.';
  //           }else{
  //             // 파일의 확장자를 분리
  //             $ext = explode('.',$file_name);
  //             $ext = strtolower(array_pop($ext));
  //               // 업로드 가능한 확장자 인지 확인한다.
  //               if(!in_array($ext, $allowedExt)) {
  //                 $result['message'] = "허용되지 않는 확장자입니다.";
  //               } else{
  //                 // 업로드할 파일의 경로
  //                 $tmpFile = $_SERVER['DOCUMENT_ROOT'].$uploadsDir."/".$file_name;
  //
  //                 $save_path = $_SERVER['DOCUMENT_ROOT'].$uploadsDir."/";
  //                 $save_path_2 = $uploadsDir."/";
  //                 $UpFile = $_FILES['tmpFile']['tmp_name'];
  //
  //                 // echo "전";
  //                 // var_dump($file_name);
  //                 if(isset($tmpFile)){
  //                   // $result['message'] = "중복된 파일이 있습니다.";
  //                   $file_rename = $this->get_rename($file_name, $save_path);
  //                   $file_name_2 = $file_rename;
  //                 }else{
  //                   $file_name_2 = $file_name;
  //                 }
  //                 // echo "후";
  //                 // var_dump($file_name_2);
  //
  //                 if(move_uploaded_file($file_info, $save_path.$file_name_2)) {
  //                     $result['img'] = $save_path_2.$file_name;
  //                     $result['file_name'] = basename($save_path.$file_name_2);
  //                     $result['file_size'][0] = $image_size[0];
  //                     $result['file_size'][1] = $image_size[1];
  //                     $result['file_volume'] = $image_volume;
  //                     $result['ret'] = "succ";
  //                 } else {
  //                     $result['message'] = "업로드시 문제가 발생하였습니다.\n다시 시도하여 주시기 바랍니다.";
  //                 }
  //
  //               }
  //           }
  //       echo json_encode($result);
  //        break;
  //
  //      default:
  //        // code...
  //        break;
  //    }
  //  } */

  function get_rename($UpFile, $save_path){
      $ext = explode('.',$UpFile);
      $ext = strtolower(array_pop($ext));
      // $FileExt = substr(strrchr($UpFile, "."), 1); // 확장자 추출
      $FileName = substr($UpFile, 0, strlen($UpFile) - strlen($ext) - 1); // 화일명 추출

      $ret = $FileName.'.'.$ext;
      $FileCnt = 0;
        while(file_exists($save_path.$ret)) // 화일명이 중복되지 않을때 까지 반복
        {
          $FileCnt++;
          $ret = $FileName."(".$FileCnt.").".$ext; // 화일명뒤에 (_1 ~ n)의 값을 붙여서....
        }

      return $ret; // 중복되지 않는 화일명 리턴
   }

  function temporary_file_delete(){

      switch ($_POST['mode']) {
        case 'temporary_image_delete':

          //이미지 Path + 파일명 + 확장명
          $file_img = $_SERVER['DOCUMENT_ROOT'].$_POST['img_src'];

          // 이미지 파일명 + 확장명
          $file_name = $_POST['img_name'];

          if(isset($file_img)){
            if(unlink($file_img)){
              // $result['message'] = '파일 삭제 성공했습니다.';
              $result['ret'] = 'succ';
            }else{
              $result['message'] = '파일 삭제 실패했습니다.';
            }
          }else{
            $result['message'] = '파일이 존재하지 않습니다.';
          }

          echo json_encode($result);
          break;

        default:
          break;
      }
    }

  function file_update(){
    $allowedExt = array("jpg", "JPG", "jpeg", "JPEG", "png", "PNG", "gif", "GIF");

    switch ($_POST['mode']) {
      case 'temporary_image_upload':

         $uploadsDir = '/static/product/'.$_POST['product_no'];
         // var_dump($uploadsDir);
         $default_dir = $_POST['img_src_data'];
         //"/static/product/5/procut_thumnail_0.jpg"
         $substr_dir2 = substr( $default_dir, 1 );
         //"static/product/5/procut_thumnail_0.jpg"
         $default_file = basename($default_dir);
         // procut_thumnail_0.jpg

         $file_ext = strtolower(substr(strrchr($default_file, "."), 1));
         $fileNameWithoutExt = substr($default_file, 0, strrpos($default_file, "."));
         // var_dump($fileNameWithoutExt);

         $file_name = $_FILES['tmpFile']['name'];
         // var_dump($file_name);
         $file_info = $_FILES['tmpFile']['tmp_name'];
         //임시폴더에 저장된 이름
         // var_dump($file_info);

         $image_size = getimagesize($file_info);
         $image_volume = filesize($file_info)/1024;
         $image_volume = floor($image_volume);

           if($image_size[0] < 600 || $image_size[1] <600){
             $result['message'] = '가로 600px, 세로 600px 이상의 이미지를 등록해 주세요.';
           }else if($image_size[0] > 1280 || $image_size[1] > 1280){
             $result['message'] = '가로 1280px, 세로 1280px 이하의 이미지를 등록해 주세요.';
           }else{
             // 파일의 확장자를 분리
             $ext = explode('.',$file_name);
             $ext = strtolower(array_pop($ext));

             $ext2 = explode('.',$default_file);
             $ext2 = strtolower(array_pop($ext2));

               // 업로드 가능한 확장자 인지 확인한다.
               if(!in_array($ext, $allowedExt)) {
                 $result['message'] = "허용되지 않는 확장자입니다.";
               } else{
                 // 업로드할 파일의 경로
                 $tmpFile = $_SERVER['DOCUMENT_ROOT'].$uploadsDir."/".$fileNameWithoutExt.'.'.$ext;

                 $save_path = $_SERVER['DOCUMENT_ROOT'].$uploadsDir."/";
                 $save_path_2 = $uploadsDir."/";
                 $UpFile = $_FILES['tmpFile']['tmp_name'];

                 // echo "전";
                 // var_dump($file_name);
                 if(isset($tmpFile)){
                   // $result['message'] = "중복된 파일이 있습니다.";
                   // $file_rename = $this->get_rename($file_name, $save_path);
                   unlink($tmpFile);
                   $file_name_2 = $file_name;
                 }
                 // echo "후";
                 // var_dump($file_name_2);

                 if(move_uploaded_file($file_info, $tmpFile)) {
                     $result['img'] = $save_path_2.$fileNameWithoutExt.'.'.$ext;
                     $result['file_name'] = basename($fileNameWithoutExt.'.'.$ext);
                     $result['file_size'][0] = $image_size[0];
                     $result['file_size'][1] = $image_size[1];
                     $result['file_volume'] = $image_volume;
                     $result['ret'] = "succ";
                 } else {
                     $result['message'] = "업로드시 문제가 발생하였습니다.\n다시 시도하여 주시기 바랍니다.";
                 }

               }
           }
       echo json_encode($result);
        break;
    }
  }
}
