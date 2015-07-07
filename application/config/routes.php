<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "main";
$route['404_override'] = '';
$route['register'] = 'main/register';
$route['login'] = 'main/login';
$route['dashboard'] = 'main/dashboard/1';
$route['dashboard/admin'] = 'main/dashboard/9';
$route['add/user'] = '/main/add_user_page';
$route['profile'] = '/main/profile';
$route['edit/user/(:any)'] = '/main/edit/$1';
$route['messageBoard'] = '/main/messageBoard';
$route['edit_profile'] = '/main/edit_profile';
$route['search_results'] = '/main/search_results';
//end of routes.php