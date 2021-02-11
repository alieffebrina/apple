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
$route['default_controller'] = 'C_Login';
$route['login'] = 'C_Login';
$route['dashboard'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['brand'] = 'C_Brand';
$route['brand-edit/(:any)'] = 'C_Brand/edit/$1';

$route['kategori'] = 'C_Kategori';
$route['kategori-edit/(:any)'] = 'C_Kategori/edit/$1';

$route['varian'] = 'C_Varian';
$route['varian-edit/(:any)'] = 'C_Varian/edit/$1';

$route['barang'] = 'C_Barang';
$route['imei/(:any)'] = 'C_Barang/imei/$1';
$route['barang-edit/(:any)'] = 'C_Barang/edit/$1';
$route['barang-detail/(:any)'] = 'C_Barang/detail/$1';

$route['marketplace'] = 'C_Marketplace';
$route['marketplace-edit/(:any)'] = 'C_Marketplace/edit/$1';

$route['ekspedisi'] = 'C_Ekspedisi';
$route['ekspedisi-edit/(:any)'] = 'C_Ekspedisi/edit/$1';

$route['transaksi'] = 'C_Penjualan';
$route['transaksi-add/(:any)'] = 'C_Penjualan/add/$1';
$route['transaksi-detail/(:any)'] = 'C_Penjualan/view/$1';

$route['level'] = 'C_Level';
$route['level-edit/(:any)'] = 'C_Level/edit/$1';
$route['level-akses/(:any)'] = 'C_Level/akses/$1';

$route['user'] = 'C_User';
$route['user-edit/(:any)'] = 'C_User/edit/$1';

$route['akses'] = 'C_Setting';
$route['akses-edit/(:any)'] = 'C_Setting/edit/$1';

$route['setting'] = 'C_Setting';