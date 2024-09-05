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
|	http://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'admin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['Updates'] = 'updates';
$route['Events'] = 'welcome/event';
$route['Contact'] = 'welcome/contact';
$route['Gallery'] = 'welcome/gallery';
$route['Admission'] = 'welcome/admission';
$route['Admission_form/(:num)'] = 'welcome/admission_form/$1';
$route['Enrollment'] = 'welcome/enrollment';
$route['Thank-You/(:any)'] = 'welcome/thank_you/$1';
$route['HallTicket/(:any)'] = 'admin/hall_ticket/$1';

$route['enrollment-list/list_enrollment'] = 'Enrollment/list_enrollment';
$route['(:any)/(:num)'] = 'welcome/products/$1/$2';
$route['product/(:any)/(:num)'] = 'welcome/product_details/$1/$2';
//$route['updates/(:any)/(:num)'] = 'welcome/update_details/$1/$2';
$route['update/(:any)/(:num)'] = 'welcome/update_details/$1/$2';
$route['Pages/(:any)/(:num)'] = 'welcome/more/$1/$2';
$route['Programs/(:any)/(:num)'] = 'welcome/program/$1/$2';
$route['About/(:any)/(:num)'] = 'welcome/about/$1/$2';
$route['Results'] = 'results/result_report';
$route['Results/(:any)'] = 'results/get_results/$1';
// $route['Results'] = 'results/result';
$route['Batch-Results'] = 'welcome/results_pdf';
$route['HINTS-SOLUTIONS'] = 'welcome/HINTS_SOLUTIONS';
$route['PRACTICE-TEST'] = 'welcome/PRACTICE_TEST';
$route['STUDY-PACKAGE'] = 'welcome/STUDY_PACKAGE';
$route['stusents/HallTicket/(:any)'] = 'admin/hall_ticket/$1';
$route['Registration-Fee-Payment'] = 'Fee_payment/registration_fee';
$route['Pay-Fees'] = 'Enrollment_fee_payment';
$route['Sample-Paper-For-Admission-Test'] = 'welcome/Sample_Paper_For_Admission_Test';

$route['change-password'] = 'admin/change_pass';
$route['profile'] = 'admin/profile';

$route['list-discount'] = 'admin/add_discount';
$route['todays-admissions'] = 'admin/todays_admissions';
$route['fee-collection-report'] = 'admin/fee_collection_report';
$route['due-amount-report'] = 'admin/due_amount_report';


// $route['stusents/HallTicket/(:any)'] = 'admin/hall_ticket/$1';


