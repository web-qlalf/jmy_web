<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Favorite extends MY_Controller {

   function __construct()
   {
       parent::__construct();

   }
	public function index($option)
	{
    echo "찜~~".$option;
	}
	public function index2($option)
	{
    echo "찜~~";
	}

}
