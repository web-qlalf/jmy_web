<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller {

  function __construct()
  {
      parent::__construct();

  }

  public function view(){
     if(isset($_POST['category'])){
       $catnum = htmlspecialchars($this->input->post('category'));
       // var_dump($catnum);
         $this->load->model('admin/category/category_model');
         $category = $this->category_model->gets_category(array('product_category_parent_id'=>htmlspecialchars($catnum)));
         echo json_encode($category);
     }else{
       echo "입력된 데이터가 없습니다.";
     }
    // echo json_encode($catnum);
   }

  public function add(){
     $classification = htmlspecialchars($this->input->post('product_category_classification'));
     $new_category = htmlspecialchars($this->input->post('product_category_name'));
     $parent_id = htmlspecialchars($this->input->post('product_category_parent_id'));

     if(isset($_POST['product_category_name'])){
         $this->load->model('admin_category_model');
         $category = $this->admin_category_model->add_category(array(
           'product_category_classification'=>htmlspecialchars($classification),
           'product_category_name'=>htmlspecialchars($new_category),
           'product_category_parent_id'=>htmlspecialchars($parent_id)
         ));
         echo json_encode($category);
     }else{
       echo "카테고리 추가 실패.";
     }
    // echo json_encode($catnum);
   }

  public function category_update_view(){
    $category = json_decode($_POST['category'], true);
    $cat_count = count($category);

      $a = $cat_count-1;
      while ($a <= 3-$cat_count) {
        $j = $a+1;
        $category[$j] = $category[$a];
        $a++;
      }
        // echo "<pre>";
        // var_dump($parent_info);
        // echo "<pre>";
          switch ($cat_count) {
            case 1:
              for ($k=0; $k <3 ; $k++) {
                $cat_num = $category[$k];
              $this->load->model('admin/category/category_model');
                $parent_info = $this->category_model->gets_update_parent(array('category_id'=>htmlspecialchars($cat_num)));
                if($k == 1){
                  $category_info[$k] = $this->category_model->gets_update_category(array('parent_id'=>htmlspecialchars($category[$k])));
                }else if($k == 2){
                  $category_info[$k] = $this->category_model->gets_update_category(array('parent_id'=>htmlspecialchars($category[$k])));
                }else{
                  $category_info[$k] = $this->category_model->gets_update_category(array('parent_id'=>htmlspecialchars($parent_info['parent_id'])));
                }
              }
              break;
            case 2:
              for ($k=0; $k <3 ; $k++) {
                $cat_num = $category[$k];
              $this->load->model('admin/category/category_model');
                $parent_info = $this->category_model->gets_update_parent(array('category_id'=>htmlspecialchars($cat_num)));
                if($k == 2){
                  $category_info[$k] = $this->category_model->gets_update_category(array('parent_id'=>htmlspecialchars($category[$k])));
                }else{
                  $category_info[$k] = $this->category_model->gets_update_category(array('parent_id'=>htmlspecialchars($parent_info['parent_id'])));
                }
              }
              break;
            case 3:
              for ($k=0; $k <3 ; $k++) {
                $cat_num = $category[$k];
                $this->load->model('admin/category/category_model');
                $parent_info = $this->category_model->gets_update_parent(array('category_id'=>htmlspecialchars($cat_num)));

                $category_info[$k] = $this->category_model->gets_update_category(array('parent_id'=>htmlspecialchars($parent_info['parent_id'])));
              }
              break;
      }

    echo json_encode($category_info);
  }

}
