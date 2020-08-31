<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller {
    function __construct()
    {
        parent::__construct();
            // session_start();
        // if(!isset($_SESSION)){
        //     session_start();
        //     echo "스타뚜";
        // }else{
        //     echo "놉";
        // }
        // @Header('P3P: CP="NOI CURa ADMa DEVa TAIa OUR DELa BUS IND PHY ONL UNI COM NAV INT DEM PRE"');
        // $this->load->view('/config/head_config');
    }

    public function _head()
    {
      $this->load->model('/user/product/category/product_category_model');
      $main_parent_no = 0;
      $main_parent_info = $this->product_category_model->getParent($main_parent_no);
      for ($i=0; $i < count($main_parent_info); $i++) {
        $middle_parent_no = $main_parent_info[$i]['id'];
        $middle_parent_info[$i] = $this->product_category_model->getParent($middle_parent_no);
      }
      for ($i=0; $i < count($middle_parent_info) ; $i++) {
        // echo count($middle_parent_info).'<br />';
        for ($k=0; $k < count($middle_parent_info[$i]); $k++) {
          // echo 'middle_parent_info'.count($middle_parent_info[$i]).'<br />';
          $sub_parent_no[$i][$k] = $middle_parent_info[$i][$k]['id'];
        }
      }
      for ($i=0; $i < count($sub_parent_no); $i++) {
        for ($k=0; $k < count($sub_parent_no[$i]) ; $k++) {

          $sub_parent_info[$i][$k] = $this->product_category_model->getParent($sub_parent_no[$i][$k]);
        }
      }
      // echo "<pre>";
      // var_dump($sub_parent_info);
      // echo "</pre>";
      $this->load->view('head', array(
        'main_parent_info' => $main_parent_info,
        'middle_parent_info' => $middle_parent_info,
        'sub_parent_info' => $sub_parent_info
      ));
    }

    function _footer()
    {
      $this->load->view('footer');
    }

    public function _admin_head()
    {
      // session_start();
      $this->load->view('/admin/head');
    }

    function _admin_footer()
    {
      $this->load->view('/admin/footer');
    }

    function _breadcrumb($option)
    {

      $this->load->view('breadcrumb', array('page_info' => $option));
    }

    function _require_login($return_url)
    {

      if(!$this->session->userdata('logged_in')){
          $this->session->set_flashdata('message','로그인이 필요한 기능입니다.');
          $this->load->helper('url');
          if($return_url == true){
            redirect('/authseller/login?returnURL='.rawurlencode($return_url));
          }else{
            redirect('/authseller/login');
          }
        }
    }

    function _require_login_2()
    {
      if(!$this->session->userdata('logged_in')){
        $this->session->set_flashdata('message','로그인이 필요한 기능입니다.');
        $this->load->helper('url');
        redirect('/authseller/login');
      }
    }

    function _require_login_User()
    {
      if(!$this->session->userdata('logged_in')){
        $this->session->set_flashdata('message','로그인이 필요한 기능입니다.');
        $this->load->helper('url');
        redirect('/login');
      }
    }

    function _require_admin_login_User()
    {
      if(!$this->session->userdata('logged_in')&&!$this->session->userdata('admin')){
        $this->session->set_flashdata('message','로그인이 필요한 기능입니다.');
        $this->load->helper('url');
        redirect('/admin/login');
      }
    }

}
