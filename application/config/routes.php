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

//$route['(:any)/admin'] = "admin/login"; this works too, but is sloppy

$route['default_controller'] = "home";

$route['en/admin'] = "admin/login";
$route['fr/admin'] = "admin/login";
$route['es/admin'] = "admin/login";
$route['de/admin'] = "admin/login";

$route['en/profile'] = "profile/login";
$route['fr/profile'] = "profile/login";
$route['es/profile'] = "profile/login";
$route['de/profile'] = "profile/login";

$route['404_override'] = '';

/* 
| --------------------------------------------------------------------------
| Regarding Pages Module
| -------------------------------------------------------------------------- 
| Please consult the pages module readme.txt before tampering with any of
| these settings.
| If you're running the pages module, you need to place a route for each 
| other controller/module you have running.
| 
| $route['controller'] = "controller";
|
*/

// $route['(:any)'] = "pages/$1";

/* 
| --------------------------------------------------------------------------
| Regarding Languages
| -------------------------------------------------------------------------- 
| This makes sure that the default controller is loaded even when a language 
| call is in the url route example: 
| http://domain.tld/en/controller => http://domain.tld/controller
| 
| if the pages module is in use with the pages automatically directed toward 
| their page entry values, then the language setting must use the cookie
| based control set in config.php. Otherwise the pages will break.
|
*/

$route['(\w{2})/(.*)'] = '$2';
$route['(\w{2})'] = $route['default_controller'];

/* End of file routes.php */
/* Location: ./application/config/routes.php */