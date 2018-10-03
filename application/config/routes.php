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


/*========Create Customer=========*/
$route['CustomerEntry'] 		= 	"Customer";
$route['insertCustomer'] 		= 	"Customer/insert_customer_info";



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


