<?php
/*데이터 테이블 이름마다 모델을 생성해주는 것이 깔끔하다*/
class admin_model extends CI_Model{
    function __construct(){
      parent::__construct();
    }

    function gets(){
      return $this->db->query("SELECT * FROM `admin_user`")->result();
    }
    function getsRegdate(){
      return $this->db->query("SELECT `no`, `id`, date_format(regdate, '%Y-%m-%d') as regdate, `name`,`email`,`tel`,`position`,`question1` ,`answers1`, `question2` ,`answers2`, `question3` ,`answers3`, date_format(`update`, '%Y-%m-%d') as `update` FROM `admin_user`")->result_array();
    }

    function getOne($user_no){
      return $this->db->query("SELECT `no`, `id`, date_format(regdate, '%Y-%m-%d') as regdate, `name`,`email`,`tel`,`position`,`question1` ,`answers1`, `question2` ,`answers2`, `question3` ,`answers3`, date_format(`update`, '%Y-%m-%d') as `update` FROM `admin_user` WHERE `no` = '$user_no'")->result_array();
    }

    function getsId($userId){
      $userId=$userId['userId'];
      return $this->db->query("SELECT * FROM `admin_user` where id = '".$userId."'")->result();
    }

    function add($option){
      $user_id  = $option['user_id'];
      $user_name  = $option['user_name'];
      $user_password  = $option['user_password'];
      $user_mail  = $option['user_mail'];
      $user_tel  = $option['user_tel'];
      $position  = $option['position'];
      $admin_question_01  = $option['admin_question_01'];
      $admin_answer_01  = $option['admin_answer_01'];
      $admin_question_02  = $option['admin_question_02'];
      $admin_answer_02  = $option['admin_answer_02'];
      $admin_question_03  = $option['admin_question_03'];
      $admin_answer_03  = $option['admin_answer_03'];

      $this->db->query("INSERT INTO `admin_user`
        (`id`, `name`, `pw`, `email`, `tel`, `position`, `question1`, `answers1`,  `question2`, `answers2`,  `question3`, `answers3`,`regdate`,`update`)
        values('$user_id','$user_name','$user_password','$user_mail','$user_tel','$position','$admin_question_01','$admin_answer_01','$admin_question_02','$admin_answer_02','$admin_question_03','$admin_answer_03',now(),now());");

      $str = $this->db->query("SELECT `id` from `admin_user` ORDER BY `no` desc limit 1")->result_array();
      return  $str;
    }

    function getByAdminId($option){
      // var_dump($option);
      $result = $this->db->select('*')->get_where('admin_user', array('id'=>$option['user_id']))->row();
      // var_dump($result);

        return $result;
    }

    function updateAll($option){
      $user_no = $option['user_no'];
      $user_id = $option['user_id'];
      $user_name = $option['user_name'];
      $user_email = $option['user_email'];
      $user_tel = $option['user_tel'];
      $answer1 = $option['answer1'];
      $answer2 = $option['answer2'];
      $answer3 = $option['answer3'];
      $position = $option['position'];
      $this->db->query("UPDATE `admin_user` SET `name` = '$user_name', `tel` = '$user_tel', `email` = '$user_email',`position` = '$position',`answers1` = '$answer1',`answers2` = '$answer2' ,`answers3` = '$answer3' WHERE (`no` = '$user_no') AND (`id` = '$user_id')");
      return $this->db->affected_rows();
    }
}
 ?>
