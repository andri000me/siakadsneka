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

$route['default_controller'] = "page";
$route['404_override'] = 'errors/page_missing';

$route['article/(:num)/(:any)'] = 'article/index/$1/$2';



//$route['c0sm1de-admin00/article/approve/(:num)/(:any)'] = 'c0sm1de-admin00/article/index/approve/$1/$2';

$route['category/(:any)'] = 'category/index/$1';

$route['berita/(:num)'] = 'berita/index/$1';
$route['events/(:num)'] = 'events/index/$1';

$route['sukses/(:any)'] = 'sukses/index/$1';
$route['peserta/pencarian/(:num)'] = 'peserta/pencarian/index/$1';



$route['article'] = '';
$route['category'] = '';

//pagination

$route['member/dashboard/(:num)'] = 'member/dashboard/index/$1';
$route['peserta/(:num)'] = 'peserta/index/$1';




/* End of file routes.php */
/* Location: ./application/config/routes.php */