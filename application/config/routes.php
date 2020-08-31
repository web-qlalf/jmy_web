<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
// $route['default_controller'] = 'welcome';
$route['default_controller'] = 'index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['product/(:any)'] = 'product/page/index/$1';
$route['category/(:any)'] = 'product/page/category/$1';
$route['product/view/(:any)'] = 'product/page/view/$1';
// $route['product/(:num)/(:num)'] = 'product/page/category/$1/';
$route['cart/(:any)'] = 'user/cart/index/$1';
$route['user/([a-z]+)/(\d+)'] = 'user/$1/$2';

$route['mypage/update'] = 'user/mypage/mypage_update';
$route['mypage'] = 'user/mypage/get/0';
$route['wishlist'] = 'user/mypage/get/1';
$route['cart'] = 'user/mypage/get/2';
$route['orderList'] = 'user/mypage/get/3';
$route['order'] = 'order/order/index';
$route['order/(:any)'] = 'order/order/$1';
$route['order/detail/(:any)'] = 'order/order/detail/$1';

// $route['favorite/([a-z]+)'] = 'user/mypage/get/$1';
$route['join'] = 'user/join';
$route['login'] = 'user/login/index';
$route['logout'] = 'user/auth/logout';


$route['admin'] = 'admin/main/index';
$route['admin/login'] = 'admin/auth/login';
$route['admin/logout'] = 'admin/auth/logout';
$route['admin/auth/(:any)'] = 'admin/auth/$1';
$route['admin/order/detail/(:any)'] = 'admin/order/detail/$1';

// $route['products/([a-z]+)/(\d+)'] = '$1/id_$2';
//products/shirts/123 같은 경로가 “shirts” 컨트롤러의 “id_123” 함수로 매핑
