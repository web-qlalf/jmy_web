<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class index extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
   function __construct()
   {
       parent::__construct();

   }
	public function index()
	{
        $this->load->model('/user/product/product_model');
        $this->load->model('/user/product/thumnail/product_thumnail_model');
        $this->load->model('/user/product/category/product_category_model');
        $this->load->model('/user/product/wishlist/wishlist_model');
        if(isset($_SESSION['user_no'])){
          $user_no = $_SESSION['user_no'];
        }
        $all_product = $this->product_model->getAll();
        for ($i=0; $i < count($all_product) ; $i++) {
          $product_no = $all_product[$i]['no'];
          $thumnail_info[$i] = $this->product_thumnail_model->gets($product_no);
          $main_category = $all_product[$i]['product_main_category_id'];
          $main_category_info[$i] = $this->product_category_model->getName($main_category);
          $middle_category = $all_product[$i]['product_middle_category_id'];
          $middle_category_info[$i] = $this->product_category_model->getName($middle_category);
          $sub_category = $all_product[$i]['product_sub_category_id'];
          $sub_category_info[$i] = $this->product_category_model->getName($sub_category);
          if(isset($_SESSION['user_no'])){
          $wishlist_info[$i] = $this->wishlist_model->getList(array(
            'user_no' => $user_no,
            'product_no' => $product_no
          ));}
          // var_dump($product_no);

        }
        // var_dump($wishlist_info);
        $this->_head();

        if(isset($_SESSION['user_no'])){
        $this->load->view('main',
        array(
          'all_product' => $all_product,
          'main_category_info' => $main_category_info,
          'middle_category_info' => $middle_category_info,
          'sub_category_info' => $sub_category_info,
          'thumnail_info' => $thumnail_info,
          'wishlist_info' => $wishlist_info
        ));
      }else{

      $this->load->view('main',
      array(
        'all_product' => $all_product,
        'main_category_info' => $main_category_info,
        'middle_category_info' => $middle_category_info,
        'sub_category_info' => $sub_category_info,
        'thumnail_info' => $thumnail_info
      ));
    }

        $this->_footer();
	}
}
