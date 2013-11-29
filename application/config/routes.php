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
$route['message/view']                = 'controller_message/view';
$route['message/result']                = 'controller_message/up';
$route['adventure/questions/(:any)'] = 'controller_quiz/questions_/$1';
$route['auth']                       = 'controller_auth';
$route['auth/connect/(:any)']        = 'controller_connect/$1/$2';
$route['auth/(:any)']                = 'controller_auth/$1';
//$route['quiz/questions/(:any)']      = 'controller_quiz/questions/$1';
$route['gcm/(:any)']                 = 'controller_gcm/send_gcm_notify/$1';
$route['blog/(:any)']                = 'controller_blog/view/$1';

$route['a/adventure/(:any)']         = 'controller_quiz/$1/$2';
$route['a/auth/(:any)']              = 'controller_auth/$1';
$route['a/blog/(:any)']              = 'controller_a/blog/$1';
$route['a/(\w+)']                    = 'controller_a/$1';
$route['(:any)']                     = 'controller_pages/view/$1';
$route['default_controller']         = 'controller_pages/view';
$route['404_override']               = '';

/*
$route['a/(\w+)'] = 'a/$1';
$route['admin'] = 'admin';
$route['auth'] = 'auth';
//$route['(:any)'] = 'pages/view/$1';
*/

/* End of file routes.php */
/* Location: ./application/config/routes.php */