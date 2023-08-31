<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "home";
//$route['admin/(:any)'] = "admin/admin/$1";
//$route['start_course/(:any)'] = 'start_course_ctrl/index/$1';
//$route['start_course/(:any)/chapter/(:any)'] = 'start_course_ctrl/lesson/$1/$2';
//$route['start_course/(:any)'] = 'start_course_ctrl/lesson/$1/';


//$route['start_course/get_lurny'] = 'start_course_ctrl/get_lurny';
//$route['start_course/(:any)'] = 'start_course_ctrl/index/$1';
$route['404_override'] = '';
$route['blog/category/(:any)'] = 'blog/index/$1/';
$route['blog/(:any)'] = 'blog/detail/$1/';
$route['experiential-stays'] = 'experiential_stays/index';
$route['experiential-stay/(:any)'] = 'experiential_stays/detail_page/$1';
$route['activity/(:any)'] = 'activities/detail_page/$1';
$route['experiential-stays/(:any)/(:any)'] = 'experiential_stays/detail_desti/$1/$2';
$route['activities/(:any)/(:any)'] = 'activities/detail_desti/$1/$2';
//$route['experiential-stays/(:any)'] = 'experiential_stays/detail_page/$1';
$route['experiential-stays/(:any)'] = 'experiential_stays/detail/$1/';
$route['activities/(:any)'] = 'activities/detail/$1';


//$route['experiential-stays/(:any)'] = 'experiential_stays/detail_page/$1';


//$route['experiential-stays/(:any)'] = 'experiential_stays/detail/$1/';

$route['start_course/completed'] = 'start_course_ctrl/completed';
$route['start_course/(:any)/chapter/(:any)'] = 'start_course_ctrl/lesson/$1/$2';
$route['start_course/(:any)'] = 'start_course_ctrl/lesson/$1/';


/* End of file routes.php */
/* Location: ./application/config/routes.php */