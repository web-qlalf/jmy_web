<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class find extends MY_Controller {

   function __construct()
   {
       parent::__construct();

   }

   function password(){
     $this->_head();

     $this->_breadcrumb(array('page_name' => 'forgot_password'));

     $this->load->view('forgot_password');

     $this->_footer();
   }
   function changePassword(){
     $this->_head();

     $this->_breadcrumb(array('page_name' => 'new_password'));

     $this->load->view('new_password');

     $this->_footer();
   }
}
