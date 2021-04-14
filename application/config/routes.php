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
$route['admin'] = "Admin/Adminhome";
$route['admin/login'] = "Admin/Adminlogin";
$route['admin/loginprocess'] = "Admin/Adminlogin/user_login_process";
$route['admin/logout'] = "Admin/Adminlogin/logout";
$route['admin/content/home'] = "Admin/Admincontent";
$route['admin/content/upload'] = "Admin/Admincontent/add_slider";
$route['admin/content/update_status'] = "Admin/Admincontent/update_status";
$route['admin/content/update_delete_status'] = "Admin/Admincontent/update_delete_status";
$route['admin/content/edit_slider_view'] = "Admin/Admincontent/edit_slider_view";
$route['admin/content/slideredit'] = "Admin/Admincontent/slideredit";

$route['admin/content/homecontent'] = "Admin/Admincontent/gethomecontent";
$route['admin/content/homecontentadd/(:any)'] = "Admin/Admincontent/sethomecontentadd/$1";
//$route['admin/content/homecontentedit'] = "Admin/Admincontent/sethomecontentedit";
$route['admin/content/othercontent'] = "Admin/Admincontent/getothercontent";
$route['admin/content/othercontentadd'] = "Admin/Admincontent/setothercontentadd";
$route['admin/content/othercontentpageadd'] = "Admin/Admincontent/setothercontentaddpage";

//for other pages edit
$route['admin/content/edit_page_view'] = "Admin/Admincontent/edit_page_view";
$route['admin/content/contentpageedit'] = "Admin/Admincontent/contentpageedit";
$route['admin/content/update_page_status'] = "Admin/Admincontent/update_page_status";
$route['admin/content/update_delete_page_status'] = "Admin/Admincontent/update_delete_page_status";

//other second amenities
$route['admin/content/othercontentsecond'] = "Admin/Admincontent/getothercontentsecond";
$route['admin/content/othercontentsecond/(:any)'] = "Admin/Admincontent/setothercontentsecondadd/$1";

//menu
$route['admin/content/menu'] = "Admin/Admincontent/setmenuadd";
$route['admin/content/update_menu_status'] = "Admin/Admincontent/update_menu_status";
$route['admin/content/update_delete_menu_status'] = "Admin/Admincontent/update_delete_menu_status";

$route['admin/content/edit_menu_view'] = "Admin/Admincontent/edit_menu_view";
$route['admin/content/contentmenuedit'] = "Admin/Admincontent/contentmenuedit";

//contact
//$route['admin/content/homecontent'] = "Admin/Admincontent/gethomecontent";
$route['admin/content/contactaddedit'] = "Admin/Admincontent/setcontactaddedit";


//footer menu
$route['admin/content/fmenu'] = "Admin/Admincontent/fsetmenuadd";
$route['admin/content/update_fmenu_status'] = "Admin/Admincontent/fupdate_menu_status";
$route['admin/content/update_delete_fmenu_status'] = "Admin/Admincontent/fupdate_delete_menu_status";
$route['admin/content/edit_fmenu_view'] = "Admin/Admincontent/fedit_menu_view";
$route['admin/content/contentfmenuedit'] = "Admin/Admincontent/fcontentmenuedit";

//social
$route['admin/content/socialaddedit'] = "Admin/Admincontent/setsocialaddedit";

//about
$route['admin/content/aboutcontent'] = "Admin/Admincontent/getaboutcontent";
$route['admin/content/aboutcontentadd/(:any)'] = "Admin/Admincontent/setaboutcontentadd/$1";

//news
$route['admin/content/newscontent'] = "Admin/Admincontent/getnewscontent";
$route['admin/content/newscontentadd/(:any)'] = "Admin/Admincontent/setnewscontentadd/$1";

//find doc
$route['admin/content/finddoccontent'] = "Admin/Admincontent/getfinddoccontent";
$route['admin/content/finddoccontentadd/(:any)'] = "Admin/Admincontent/setfinddoccontentadd/$1";

//Main page route
$route['default_controller'] = "homemaincontent";
$route['home'] = "homemaincontent";
$route['about'] = "aboutmaincontent";
$route['news'] = "newsmaincontent";

$route['others/(:num)'] = "othermaincontent/index/$1";
$route['contact'] = "contactmaincontent";


//main details
$route['home/details/first'] = "homemaincontent/firstsectiondetails";
$route['home/details/sixth/(:num)'] = "homemaincontent/sixthsectiondetails/$1";
$route['home/details/seventh/(:num)'] = "homemaincontent/seventhsectiondetails/$1";
$route['home/details/ninth/(:num)'] = "homemaincontent/ninthsectiondetails/$1";

$route['about/details/first'] = "aboutmaincontent/firstsectiondetails";
$route['about/details/second'] = "aboutmaincontent/secondsectiondetails";

$route['news/details/first'] = "newsmaincontent/firstsectiondetails";
$route['news/details/second'] = "newsmaincontent/secondsectiondetails";

$route['contact/details/first'] = "contactmaincontent/firstsectiondetails";

//pages
$route['admin/content/page'] = "Admin/Admincontent/setpageadd";
/*$route['admin/content/update_page_status'] = "Admin/Admincontent/update_page_status";
$route['admin/content/update_delete_page_status'] = "Admin/Admincontent/update_delete_page_status";*/

$route['admin/content/edit_page_view'] = "Admin/Admincontent/edit_page_view";
$route['admin/content/contentpageedit'] = "Admin/Admincontent/contentpageedit";

//make appointment
$route['appointmentadd'] = "appointmentmaincontent";

//make appointment send email
$route['appointmentreply'] = "appointmentmaincontent/appointmentmaincontentreply";


//Admin appointment list
$route['admin/content/appointment'] = "Admin/Admincontent/getappointment";

//Admin appointment detail list
$route['admin/content/appointment/(:num)'] = "Admin/Admincontent/getdetailappointment/$1";

//Admin notify
$route['admin/content/notificationread/(:num)'] = "Admin/Admincontent/notificationread/$1";


/*$route['admin/content/finddoccontentadd/(:any)'] = "Admin/Admincontent/setfinddoccontentadd/$1";*/


/*$route['default_controller'] = 'welcome';*/
//$route['default_controller'] = 'welcome';
/*$route['admin'] = 'adminhome';*/
/*$route['admin'] = "catalog/product_lookup";*/
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
