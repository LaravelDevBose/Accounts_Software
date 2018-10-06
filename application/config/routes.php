<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] 	= 'Adminlogin';
$route['404_override'] 			= 'Adminlogin/error';
$route['translate_uri_dashes'] 	= FALSE;






/*===========Admin Login=============*/
$route['admin/login'] 		= 	"Adminlogin";
$route['admin_login'] 		= 	"Adminlogin/admin_login_data_check";


// =====================Admin Panel================
// =====================Admin Panel================


/*========Customer Route List=========*/
$route['customers'] 		= 	"Customer/index";
$route['customer/insert'] 		= 	"Customer/insert_customer";
$route['customer/store'] 		= 	"Customer/store_customer_info";
$route['customer/edit/(:any)']	=	'Customer/edit_customer_info/$1';
$route['customer/update/(:any)']	=	'Customer/update_customer_info/$1';
$route['customer/delete/(:any)']	=	'Customer/delete_customer_info/$1';

/*========Order CRUD Route list=========*/
$route['order/list'] 		= 	"Order/index";
$route['order/insert'] 		= 	"Order/insert_order_info";
$route['order/store'] 		= 	"Order/store_order_info";
$route['order/edit/(:any)']	=	'Order/edit_order_info/$1';
$route['order/update/(:any)']	=	'Order/update_order_info/$1';
$route['order/delete/(:any)']	=	'Order/delete_order_info/$1';
$route['find/customer/(:any)']	=	'Customer/find_customer_info/$1';

/*========L/C CRUD Route list=========*/
$route['lc/insert'] 		= 	"LC_controller";
$route['lc/store'] 		= 	"LC_controller/store_lc_info";
$route['lc/edit/(:any)']	=	'LC_controller/edit_lc_info/$1';
$route['lc/update/(:any)']	=	'LC_controller/update_lc_info/$1';
$route['lc/delete/(:any)']	=	'LC_controller/delete_lc_info/$1';


/*========== Report Route List ==========*/
$route['report/lc']		= 'Report/view_lc_report'; 
$route['report/customer']		= 'Report/view_customer_report'; 


/*========Create Admin=========*/
$route['createAdmin'] 			=	"Admincreate/addAdminPage";
$route['saveAdmin'] 			=	"Admincreate/add_admin_data_check";
$route['listAdmin'] 			=	"Admincreate/listOfAdmin";
$route['editAdmin/(:any)'] 		=	"Admincreate/edit_admin/$1";
$route['AdminUpdate/(:any)'] 	=	"Admincreate/edit_admin_data_check/$1";
$route['deleteAdmin/(:any)'] 	=	"Admincreate/admin_delete/$1";

$route['change_pass_page/(:any)'] 		= 	"Admincreate/change_pass_page/$1";


$route['access_page/(:any)'] 		= 	"Access/show_access_page/$1";
$route['DefineAccess'] 				= 	"Access/DefineAccessPortion";


