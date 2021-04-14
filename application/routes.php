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
$route['admin/loginprocess'] = "admin/adminlogin/user_login_process";
$route['admin/logout'] = "admin/adminlogin/logout";
$route['admin/content/home'] = "admin/admincontent";
$route['admin/content/upload'] = "admin/admincontent/add_slider";
$route['admin/content/update_status'] = "admin/admincontent/update_status";
$route['admin/content/update_delete_status'] = "admin/admincontent/update_delete_status";
$route['admin/content/edit_slider_view'] = "admin/admincontent/edit_slider_view";
$route['admin/content/slideredit'] = "admin/admincontent/slideredit";

$route['admin/content/homecontent'] = "admin/admincontent/gethomecontent";
$route['admin/content/homecontentadd/(:any)'] = "admin/admincontent/sethomecontentadd/$1";
//$route['admin/content/homecontentedit'] = "admin/admincontent/sethomecontentedit";
$route['admin/content/othercontent'] = "admin/admincontent/getothercontent";
$route['admin/content/othercontentadd'] = "admin/admincontent/setothercontentadd";
$route['admin/content/othercontentpageadd'] = "admin/admincontent/setothercontentaddpage";

//for other pages edit
$route['admin/content/edit_page_view'] = "admin/admincontent/edit_page_view";
$route['admin/content/contentpageedit'] = "admin/admincontent/contentpageedit";
$route['admin/content/update_page_status'] = "admin/admincontent/update_page_status";
$route['admin/content/update_delete_page_status'] = "admin/admincontent/update_delete_page_status";

//other second amenities
$route['admin/content/othercontentsecond'] = "admin/admincontent/getothercontentsecond";
$route['admin/content/othercontentsecond/(:any)'] = "admin/admincontent/setothercontentsecondadd/$1";

//menu
$route['admin/content/menu'] = "admin/admincontent/setmenuadd";
$route['admin/content/update_menu_status'] = "admin/admincontent/update_menu_status";
$route['admin/content/update_delete_menu_status'] = "admin/admincontent/update_delete_menu_status";

$route['admin/content/edit_menu_view'] = "admin/admincontent/edit_menu_view";
$route['admin/content/contentmenuedit'] = "admin/admincontent/contentmenuedit";

//contact
//$route['admin/content/homecontent'] = "admin/admincontent/gethomecontent";
$route['admin/content/contactaddedit'] = "admin/admincontent/setcontactaddedit";


//footer menu
$route['admin/content/fmenu'] = "admin/admincontent/fsetmenuadd";
$route['admin/content/update_fmenu_status'] = "admin/admincontent/fupdate_menu_status";
$route['admin/content/update_delete_fmenu_status'] = "admin/admincontent/fupdate_delete_menu_status";
$route['admin/content/edit_fmenu_view'] = "admin/admincontent/fedit_menu_view";
$route['admin/content/contentfmenuedit'] = "admin/admincontent/fcontentmenuedit";

//social
$route['admin/content/socialaddedit'] = "admin/admincontent/setsocialaddedit";

//about
$route['admin/content/aboutcontent'] = "admin/admincontent/getaboutcontent";
$route['admin/content/aboutcontentadd/(:any)'] = "admin/admincontent/setaboutcontentadd/$1";

//news
$route['admin/content/newscontent'] = "admin/admincontent/getnewscontent";
$route['admin/content/newscontentadd/(:any)'] = "admin/admincontent/setnewscontentadd/$1";

//find doc
$route['admin/content/finddoccontent'] = "admin/admincontent/getfinddoccontent";
$route['admin/content/finddoccontentadd/(:any)'] = "admin/admincontent/setfinddoccontentadd/$1";

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
$route['admin/content/page'] = "admin/admincontent/setpageadd";
/*$route['admin/content/update_page_status'] = "admin/admincontent/update_page_status";
$route['admin/content/update_delete_page_status'] = "admin/admincontent/update_delete_page_status";*/

$route['admin/content/edit_page_view'] = "admin/admincontent/edit_page_view";
$route['admin/content/contentpageedit'] = "admin/admincontent/contentpageedit";

//make appointment
$route['appointmentadd'] = "appointmentmaincontent";

//make appointment send email
$route['appointmentreply'] = "appointmentmaincontent/appointmentmaincontentreply";


//admin appointment list
$route['admin/content/appointment'] = "admin/admincontent/getappointment";

//admin appointment detail list
$route['admin/content/appointment/(:num)'] = "admin/admincontent/getdetailappointment/$1";

//admin notify
$route['admin/content/notificationread/(:num)'] = "admin/admincontent/notificationread/$1";


/*$route['admin/content/finddoccontentadd/(:any)'] = "admin/admincontent/setfinddoccontentadd/$1";*/


/*$route['default_controller'] = 'welcome';*/
//$route['default_controller'] = 'welcome';
/*$route['admin'] = 'adminhome';*/
/*$route['admin'] = "catalog/product_lookup";*/
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
