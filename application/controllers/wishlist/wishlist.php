<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class wishlist extends MY_Controller {

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
	public function add()
	{
      // var_dump($_POST);
      if(!isset($_SESSION['user_no'])){
        $this->_require_login_User();
      }else{
        $product_no = $_POST['product_no'];
        $user_no = $_POST['user_no'];
        $this->load->model('/user/product/wishlist/wishlist_model');
        $wishlist = $this->wishlist_model->add(array(
          'product_no' => $product_no,
          'user_no' => $user_no
        ));

        if(!isset($wishlist))
        {
          $result = 0;
        }
        else
        {
          $result = 1;
        }

        echo json_decode($result);
      }

	}
	public function delete()
	{
      // var_dump($_POST);
      $product_no = $_POST['product_no'];
      $user_no = $_POST['user_no'];
      $this->load->model('/user/product/wishlist/wishlist_model');
      $wishlist = $this->wishlist_model->delete(array(
        'product_no' => $product_no,
        'user_no' => $user_no
      ));
      // var_dump($wishlist);
      if($wishlist == 0)
      {
        $result = 0;
      }
      else
      {
        $result = 1;
      }

      echo json_decode($result);

	}
}
