<?php
/*데이터 테이블 이름마다 모델을 생성해주는 것이 깔끔하다*/
class category_model extends CI_Model{
    function __construct(){
      parent::__construct();
    }

    function gets_category($catnum){
      $parent_id=$catnum['product_category_parent_id'];
      // var_dump($parent_id);
       return $this->db->query("SELECT * FROM product_category WHERE parent_id = $parent_id;")->result();

    }
    function gets_update_parent($catnum){
      $category_id=$catnum['category_id'];
      // var_dump($parent_id);
       return $this->db->query("SELECT parent_id FROM product_category WHERE id = $category_id;")->row_array();
    }

    function gets_update_category($catnum){
      $category_id=$catnum['parent_id'];
      // var_dump($parent_id);
       return $this->db->query("SELECT * FROM product_category WHERE parent_id = $category_id;")->result_array();
    }

    function update_info_gets($catnum){
      // var_dump($catnum);
      $val = array_filter($catnum);
      // var_dump($val);
      $cnt = count($val);
      // var_dump($catnum[0]);
      for ($i=0; $i < $cnt; $i++) {
        $category_no=$catnum[$i];
        $update_info[$i] = $this->db->query("SELECT * FROM product_category WHERE id = $category_no;")->row_array();
      }

      // var_dump($update_info);
      return $update_info;
    }

    function add_category($new){
      $classification =$new['product_category_classification'];
      $new_category = $new['product_category_name'];
      $parent_id = $new['product_category_parent_id'];

      $this->db->query("INSERT INTO product_category(classification, name, parent_id)values('$classification', '$new_category', $parent_id);");

      $new_category_name = $this->db->query("SELECT `name` from `product_category` ORDER BY `id` desc limit 1")->row();


      return $new_category_name;
    }

}
 ?>
