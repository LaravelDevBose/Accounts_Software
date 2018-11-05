<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] 	= 'Adminlogin';
$route['404_override'] 			= 'Adminlogin/error';
$route['translate_uri_dashes'] 	= FALSE;






/*===========Admin Login=============*/
$route['admin/login'] 		= 	"Adminlogin";
$route['admin_login'] 		= 	"Adminlogin/admin_login_data_check";

/*===========  Dash board Route List ==============*/

$route['order/dashboard'] 		= 'Admindashboard/sale_dashboard';
$route['purchase/dashboard'] 	= 'Admindashboard/purchase_dashboard';
$route['account/dashboard'] 	= 'Admindashboard/accounts_dashboard';
$route['hr_payroll/dashboard'] 	= 'Admindashboard/hr_payroll_dashboard';
$route['report/dashboard'] 	= 'Admindashboard/reports_dashboard';
$route['administration/dashboard'] 	= 'Admindashboard/administration_dashboard';

// =====================Admin Panel================
// =====================Admin Panel================

/****************************************************************************************************/
/************************************* Sales Module Route List **************************************/

/*========Customer Route List=========*/
$route['customers'] 				= 	"Customer/index";
$route['customer/insert'] 			= 	"Customer/insert_customer";
$route['customer/store'] 			= 	"Customer/store_customer_info";
$route['customer/edit/(:any)']		=	'Customer/edit_customer_info/$1';
$route['customer/update/(:any)']	=	'Customer/update_customer_info/$1';
$route['customer/delete/(:any)']	=	'Customer/delete_customer_info/$1';

$route['customer/order/insert'] 	=	'Customer/customer_order_insert_page';
$route['customer/order/store'] 		=	'Customer/customer_order_store';

/*========Order CRUD Route list=========*/
$route['order/list'] 			= 	"Order/index";
$route['order/pending/list'] 	= 	"Order/order_pending_list";
$route['order/onprocess/list'] 	= 	"Order/order_onprocess_list";

$route['order/insert'] 			= 	"Order/insert_order_info";
$route['order/store'] 			= 	"Order/store_order_info";
$route['order/edit/(:any)']		=	'Order/edit_order_info/$1';
$route['order/view/(:any)']		=	'Order/view_order_info/$1';
$route['order/update/(:any)']	=	'Order/update_order_info/$1';
$route['order/delete/(:any)']	=	'Order/delete_order_info/$1';
$route['order/delivery/show/(:any)']	=	'Order/show_order_deliery_info/$1';
$route['order/deliver/(:any)']	=	'Order/order_delivery/$1';
$route['find/customer/(:any)']	=	'Customer/find_customer_info/$1';




/****************************************************************************************************/
/************************************* Purchase Module Route List ***********************************/

/*========Supplier Route List=========*/
$route['supplier/insert'] 			= 	"Supplier/insert_supplier";
$route['supplier/store'] 			= 	"Supplier/store_supplier_info";
$route['supplier/edit/(:any)']		=	'Supplier/edit_supplier_info/$1';
$route['supplier/update/(:any)']	=	'Supplier/update_supplier_info/$1';
$route['supplier/delete/(:any)']	=	'Supplier/delete_supplier_info/$1';
$route['find/supplier/(:any)']		=	'Supplier/find_supplier_info/$1';


/*========purchase CRUD Route list=========*/
$route['purchase/list'] 			= 	"Purchase/index";
$route['purchase/insert'] 			= 	"Purchase/insert_purchase_info";
$route['purchase/insert/(:any)'] 	= 	"Purchase/insert_purchase_info/$1";
$route['purchase/store'] 			= 	"Purchase/store_purchase_info";
$route['purchase/edit/(:any)']		=	'Purchase/edit_purchase_info/$1';
$route['purchase/view/(:any)']		=	'Purchase/view_purchase_info/$1';
$route['purchase/update/(:any)']	=	'Purchase/update_purchase_info/$1';
$route['purchase/delete/(:any)']	=	'Purchase/delete_purchase_info/$1';
$route['find/car_info/(:any)']		= 	'Purchase/find_car_info/$1';

/*======= Car Location Traking =======*/
$route['transport/status'] 			= 'Transport/transport_car_status_view';
$route['trans/status/chnage/(:any)']= 'Transport/transport_car_status_change_page/$1';
$route['trans/status/update']		= 'Transport/transport_car_status_update';

$route['transport/head']			= 'Transport/transport_head_view';
$route['trans/head/store'] 			= 'Transport/transport_head_store';
$route['trans/head/edit/(:any)'] 	= 'Transport/transport_head_edit/$1';
$route['trans/head/update/(:any)'] 	= 'Transport/transport_head_update/$1';
$route['trans/head/delete/(:any)'] 	= 'Transport/transport_head_delete/$1';


/****************************************************************************************************/
/************************************* Accounts Module Route List ***********************************/

//Collection Entry Route List
$route['collections'] 				= 'Collection/collection_entry_page';
$route['collection/store'] 			= 'Collection/collection_entry_store';
$route['collection/edit/(:any)'] 	= 'Collection/collection_entry_edit/$1';
$route['collection/update/(:any)'] 	= 'Collection/collection_entry_update/$1';
$route['collection/delete/(:any)'] 	= 'Collection/delete_collection_data/$1';
$route['find/chassis_no/(:any)']	= 'Collection/find_order_info/$1';
$route['find/lc/due_amount/(:any)'] = 'Collection/find_lc_due_amount/$1';

//payment Route List
$route['payment'] 					= 'Payment/payment_entry_page';
$route['payment/store'] 			= 'Payment/payment_entry_store';
$route['payment/edit/(:any)'] 		= 'Payment/payment_entry_edit/$1';
$route['payment/update/(:any)'] 	= 'Payment/payment_entry_update/$1';
$route['payment/delete/(:any)'] 	= 'Payment/delete_payment_data/$1';
$route['find/chassis_no/(:any)']	= 'Payment/find_order_info/$1';
$route['find/payment/lc/(:any)'] 	= 'Payment/find_payment_lc/$1';

//Office Payment Route List
$route['office_payment']			= 'Payment/office_payment_entry_page';
$route['office_payment/store']		= 'Payment/office_payment_store';
$route['office_payment/edit/(:any)']		= 'Payment/office_payment_edit/$1';
$route['office_payment/update/(:any)']		= 'Payment/office_payment_update/$1';
$route['office_payment/delete/(:any)']		= 'Payment/office_payment_delete/$1';

//Other Income Entry Route List
$route['account/other_income']		='Account/other_income_page';
$route['other_income/store']		= 'Account/other_income_store';
$route['other_income/edit/(:any)'] 	= 'Account/other_income_edit/$1';
$route['other_income/update/(:any)']= 'Account/other_income_update/$1';
$route['other_income/delete/(:any)']= 'Account/delete_other_income/$1';



$route['check/pending/list'] 	=	'Check/check_pendaing_date_list';
$route['check/reminder/list'] 	=	'Check/check_reminder_date_list';
$route['check/paid/list'] 		=	'Check/check_paid_date_list';
$route['check/entry'] 			=	'Check/check_entry_page';
$route['check/store'] 			=	'Check/check_date_store';
$route['check/view/(:any)'] 	=	'Check/check_view_page/$1';
$route['check/edit/(:any)'] 	=	'Check/check_edit_page/$1';
$route['check/update/(:any)'] 	=	'Check/check_update_info/$1';
$route['check/delete/(:any)'] 	=	'Check/check_delete_info/$1';


/****************************************************************************************************/
/************************************* HR & Payroll Module Route List *******************************/

/*========== Employee Route List ========*/
$route['employees']				='Employee/index';
$route['employee/insert']		='Employee/insert_employee_info';
$route['employee/store']		='Employee/store_employee_info';
$route['employee/view/(:any)']	='Employee/view_employee_info/$1';
$route['employee/edit/(:any)']	='Employee/edit_employee_info/$1';
$route['employee/update/(:any)']='Employee/update_employee_info/$1';
$route['employee/delete/(:any)']='Employee/delete_employee_info/$1';


$route['employee/month']		='Employee/month_insert_Page';
$route['month/store']			='Employee/store_sallary_month';
$route['month/edit/(:any)']		='Employee/edit_sallary_month/$1';
$route['month/update/(:any)']	='Employee/update_sallary_month/$1';
$route['month/delete/(:any)']	='Employee/delete_sallary_month/$1';

$route['employee/salary']		= 'Salary/salary_payment_page';
$route['salary/store']			= 'Salary/salary_payment_store';
$route['store/paid_salary/check'] = 'Salary/check_payable_amount';
$route['get/salary_range/(:any)'] = 'Employee/get_employee_salary/$1';
$route['salary/edit/(:any)']	= 'Salary/salary_payment_edit/$1';
$route['salary/update/(:any)']	= 'Salary/salary_payment_update/$1';
$route['salary/delete/(:any)']	= 'Salary/salary_payment_delete/$1';


/****************************************************************************************************/
/************************************* Report Module Route List *******************************/


/*========== Report Route List ==========*/
$route['report/car/stock']					= 'Report/view_car_stock_report';

$route['report/full_report'] 				= 'Report/car_full_report';
$route['find/full_report/(:any)'] 			= 'Report/find_full_deatils_report/$1';

$route['report/car_wise/collection'] 		= 'Report/car_wise_collection_view';
$route['find/collection/order_wise/(:any)'] = 'Report/find_collection_order_wise/$1';

$route['report/due']						= 'Report/view_full_due_report';


$route['report/customer_order']				= 'Report/view_customer_order_report';
$route['find/customer_order/(:any)']		= 'Report/customer_wise_order_report/$1';

$route['report/delivery_order']				= 'Report/delivery_order_view';
$route['find/delivery_order']				= 'Report/date_wise_delivery_order';

$route['report/lc/order']					= 'Report/view_lc_wise_order_report';
$route['find/order/(:any)']					= 'Report/find_order_by_lc/$1'; 

$route['report/collection']					= 'Report/view_collection_report';
$route['find/collection/by_date'] 			= 'Report/find_date_wise_collection';

$route['report/customer_wise/collection'] 	= 'Report/customer_wise_collection';
$route['find/collection/customer/(:any)'] 	= 'Report/find_collection_by_cus/$1';


$route['report/date_wise_payment'] 			= 'Report/payment_report_page';
$route['find/date_wise_payment/report'] 	= 'Report/find_date_to_date_payment';

$route['report/supplier_payment'] 			= 'Report/supplier_payment_report_page';
$route['find/supplier_payment/report/(:any)']= 'Report/find_supplier_payment/$1';


$route['report/office_payment'] 			= 'Report/office_payment_report_page';
$route['find/office_payment/report'] 		= 'Report/find_office_payment';

$route['report/salary/date_to_date'] 		= 'Report/salary_date_to_date_report';
$route['find/salary/date_to_date'] 			= 'Report/find_salary_date_to_date';

$route['report/salary/empl'] 				= 'Report/employee_wise_salary';
$route['find/salary/employee/(:any)'] 		= 'Report/find_employee_wise_salary/$1';

$route['report/lc']							= 'Report/view_lc_report'; 
$route['report/customer']					= 'Report/view_customer_report'; 


/****************************************************************************************************/
/*********************************** Administration Module Route List *******************************/


/*========L/C CRUD Route list=========*/
$route['lc/list'] 			= 	"LC_controller/lc_list_view";
$route['lc/insert'] 		= 	"LC_controller/lc_insert_page";
$route['lc/store'] 			= 	"LC_controller/store_lc_info";
$route['lc/edit/(:any)']	=	'LC_controller/edit_lc_info/$1';
$route['lc/update/(:any)']	=	'LC_controller/update_lc_info/$1';
$route['lc/delete/(:any)']	=	'LC_controller/delete_lc_info/$1';

$route['find/chassis_no/(:any)'] = 'LC_controller/find_chassis_no/$1';
$route['find/purchase_info/(:any)'] = 'LC_controller/find_purchase_info/$1';
$route['store/lc/car_info'] = 'LC_controller/store_car_info_in_cart';
$route['cart/destroy']		= 'LC_controller/destroy_cart';
$route['lc/details/delete/(:any)'] = 'LC_controller/delete_lc_details/$1';

/*========Income Expense Head CRUD Route list=========*/
$route['ie_head/insert'] 		= 	"IE_head";
$route['ie_head/store'] 		= 	"IE_head/store_ie_head_info";
$route['ie_head/edit/(:any)']	=	'IE_head/edit_ie_head_info/$1';
$route['ie_head/update/(:any)']	=	'IE_head/update_ie_head_info/$1';
$route['ie_head/delete/(:any)']	=	'IE_head/delete_ie_head_info/$1';

/*========== Agent Route List ============*/
$route['agent/insert'] 			= 	"Agent/agent_page_view";
$route['agent/store'] 			= 	"Agent/store_agent_info";
$route['agent/edit/(:any)']		=	'Agent/edit_agent_info/$1';
$route['agent/update/(:any)']	=	'Agent/update_agent_info/$1';
$route['agent/delete/(:any)']	=	'Agent/delete_agent_info/$1';

$route['company/insert'] 		= 	"Company/company_page_view";
$route['company/store'] 		= 	"Company/store_company_info";
$route['company/edit/(:any)']	=	'Company/edit_company_info/$1';
$route['company/update/(:any)']	=	'Company/update_company_info/$1';
$route['company/delete/(:any)']	=	'Company/delete_company_info/$1';

/*======== Setting Route List ===========*/
$route['setting/insert']		= 'Setting/view_setting_page';
$route['company_info/store']	= 'Setting/store_or_update_conpany_info';

/*========Create Admin=========*/
$route['createAdmin'] 			=	"Admincreate/addAdminPage";
$route['saveAdmin'] 			=	"Admincreate/add_admin_data_check";
$route['listAdmin'] 			=	"Admincreate/listOfAdmin";
$route['editAdmin/(:any)'] 		=	"Admincreate/edit_admin/$1";
$route['AdminUpdate/(:any)'] 	=	"Admincreate/edit_admin_data_check/$1";
$route['deleteAdmin/(:any)'] 	=	"Admincreate/admin_delete/$1";

$route['change_pass_page/(:any)'] 	= 	"Admincreate/change_pass_page/$1";
$route['access_page/(:any)'] 		= 	"AdminAccess/show_access_page/$1";
$route['define_access'] 			= 	"AdminAccess/define_access";


