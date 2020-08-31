<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View2 extends MY_Controller {

   function __construct()
   {
       parent::__construct();

   }

   public function index()
   {
     echo "상품 표지어와요.";
   }
   public function get($page_num)
   {
     echo "상품 표지어와요.";
     echo "상품번호는".$page_num."입니다.";
   }


}
