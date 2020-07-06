<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

// Route::resource('/home', 'HomeController');
Route::get('home', 'HomeController@index');
Route::get('home/lang/{one?}/{two?}/{three?}/{four?}/{five?}', 'HomeController@getLang');
Route::get('service', 'HomeController@index');
Route::get('about-us', 'HomeController@index');
Route::get('contact-us', 'HomeController@index');
Route::get('faq', 'HomeController@index');
Route::get('portpolio', 'HomeController@index');

// Route::resource('/user', 'UserController');
Route::get('/user/login', 'UserController@getlogin')->name('login');
Route::post('/user/signin', 'UserController@postSignin');
Route::post('/user/request/{one?}/{two?}/{three?}/{four?}/{five?}', 'UserController@postRequest');
Route::get('/user/profile', 'UserController@getProfile');
Route::get('/user/logout', 'UserController@getLogout');
Route::post('/user/saveprofile', 'UserController@postSaveprofile');
Route::post('/user/savepassword', 'UserController@postSavepassword');

Route::group(['middleware' => 'auth'], function () {

    Route::get('core/elfinder', 'Core\ElfinderController@getIndex');
    Route::post('core/elfinder', 'Core\ElfinderController@getIndex');

    // Route::controller('/dashboard', 'DashboardController');
    Route::get('/', 'DashboardController@getIndex');
    Route::get('/dashboard', 'DashboardController@getIndex');

    // Route::controllers([
    //     'core/logs' => 'Core\LogsController',
    //     'core/pages' => 'Core\PagesController',
    // ]);

    //'core/users'        => 'Core\UsersController',
    Route::get('/core/users', 'Core\UsersController@getIndex');
    Route::post('/core/users/filter', 'Core\UsersController@postFilter');
    Route::get('/core/users/update', 'Core\UsersController@getUpdate');
    Route::post('/core/users/delete', 'Core\UsersController@postDelete');
    Route::post('/core/users/save', 'Core\UsersController@postSave');
    Route::get('/core/users/show/{id}', 'Core\UsersController@getShow');
    Route::get('/core/users/update/{id}', 'Core\UsersController@getUpdate');

    //'core/groups'         => 'Core\GroupsController',
    Route::get('/core/groups', 'Core\GroupsController@getIndex');
    Route::post('/core/groups/filter', 'Core\GroupsController@postFilter');
    Route::get('/core/groups/update', 'Core\GroupsController@getUpdate');
    Route::get('/core/groups/download', 'Core\GroupsController@getDownload');
    Route::post('/core/groups/delete', 'Core\GroupsController@postDelete');
    Route::get('/core/groups/show/{id}', 'Core\GroupsController@getShow');
    Route::get('/core/groups/update/{id}', 'Core\GroupsController@getUpdate');
    Route::post('/core/groups/save', 'Core\GroupsController@postSave');

    //'core/template'     => 'Core\TemplateController',
    Route::get('/core/template', 'Core\TemplateController@getIndex');

});

Route::group(['middleware' => 'auth', 'middleware' => 'sximoauth'], function () {

    //'sximo/config'         => 'Sximo\ConfigController',
    Route::get('/sximo/config', 'Sximo\ConfigController@getIndex');
    Route::post('/sximo/config/save', 'Sximo\ConfigController@postSave');
    Route::get('/sximo/config/clearlog', 'Sximo\ConfigController@getClearlog');
    Route::get('/sximo/config/log', 'Sximo\ConfigController@getLog');

    //'sximo/module'         => 'Sximo\ModuleController',
    Route::get('/sximo/module', 'Sximo\ModuleController@getIndex');
    Route::get('/sximo/module/create', 'Sximo\ModuleController@getCreate');
    Route::get('/sximo/module/destroy/{id}', 'Sximo\ModuleController@getDestroy');
    Route::post('/sximo/module/create', 'Sximo\ModuleController@postCreate');
    Route::post('/sximo/module/create', 'Sximo\ModuleController@postCreate');
    Route::get('/sximo/module/config/{id}', 'Sximo\ModuleController@getConfig');
    Route::post('/sximo/module/saveconfig/{id}', 'Sximo\ModuleController@postSaveconfig');
    Route::post('/sximo/module/install', 'Sximo\ModuleController@postInstall');
    Route::post('/sximo/module/package', 'Sximo\ModuleController@postPackage');
    Route::post('/sximo/module/dopackage', 'Sximo\ModuleController@postDopackage');
    Route::get('/sximo/module/permission/{id}', 'Sximo\ModuleController@getPermission');
    Route::post('/sximo/module/savepermission/{id}', 'Sximo\ModuleController@postSavepermission');
    Route::get('/sximo/module/rebuild/{id}', 'Sximo\ModuleController@getRebuild');
    Route::get('/sximo/module/sql/{id}', 'Sximo\ModuleController@getSql');
    Route::post('/sximo/module/savesql/{id}', 'Sximo\ModuleController@postSavesql');
    Route::get('/sximo/module/table/{id}', 'Sximo\ModuleController@getTable');
    Route::post('/sximo/module/savetable/{id}', 'Sximo\ModuleController@postSavetable');
    Route::get('/sximo/module/conn/{id}', 'Sximo\ModuleController@getConn');
    Route::post('/sximo/module/conn/{id}', 'Sximo\ModuleController@postConn');
    Route::post('/sximo/module/combotable', 'Sximo\ModuleController@postCombotable');
    Route::post('/sximo/module/combotablefield', 'Sximo\ModuleController@postcombotablefield');
    Route::get('/sximo/module/form/{id}', 'Sximo\ModuleController@getForm');
    Route::post('/sximo/module/saveform/{id}', 'Sximo\ModuleController@postSaveform');
    Route::get('/sximo/module/editform/{id}', 'Sximo\ModuleController@getEditform');
    Route::get('/sximo/module/formdesign/{id}', 'Sximo\ModuleController@getFormdesign');
    Route::post('/sximo/module/formdesign/{id}', 'Sximo\ModuleController@postFormdesign');
    Route::get('/sximo/module/sub/{id}', 'Sximo\ModuleController@getSub');
    Route::get('/sximo/module/savesub/{id}', 'Sximo\ModuleController@postSavesub');
    Route::get('/sximo/module/build/{id}', 'Sximo\ModuleController@getBuild');
    Route::post('/sximo/module/dobuild/{id}', 'Sximo\ModuleController@postDobuild');

    //'sximo/tables'        => 'Sximo\TablesController'
    Route::get('/sximo/tables', 'Sximo\TablesController@getIndex');
    Route::get('/sximo/tables/tableconfig/{table}', 'Sximo\TablesController@getTableconfig');
    Route::get('/sximo/tables/sximo/tables/mysqleditor', 'Sximo\TablesController@getMysqleditor');
    Route::get('sximo/tables/tableconfig', 'Sximo\TablesController@getTableconfig');
    Route::get('sximo/tables/tablefieldedit/{any}', 'Sximo\TablesController@getTablefieldedit');
    Route::get('sximo/tables/tablefieldremove/{id?}/{id2?}', 'Sximo\TablesController@getTablefieldremove');
    Route::post('sximo/tables/tableremove', 'Sximo\TablesController@postTableremove');
    Route::post('sximo/tables/tableinfo/{any}', 'Sximo\TablesController@postTableinfo');
    Route::get('sximo/tables/mysqleditor', 'Sximo\TablesController@postMysqleditor');
    Route::post('sximo/tables/tablefieldsave/{any?}', 'Sximo\TablesController@postTablefieldsave');
    Route::post('sximo/tables/tables', 'Sximo\TablesController@postTables');

    //'sximo/menu'        => 'Sximo\MenuController',
    Route::get('/sximo/menu', 'Sximo\MenuController@getIndex');
    Route::get('/sximo/menu/index/{id}', 'Sximo\MenuController@getIndex');
    Route::post('/sximo/menu/saveorder', 'Sximo\MenuController@postSaveorder');
    Route::post('/sximo/menu/save', 'Sximo\MenuController@postSave');
    Route::get('/sximo/menu/destroy/{id}', 'Sximo\MenuController@getDestroy');

});

Route::group(['middleware' => 'auth'], function () {
    // apiAuth

    //Route::post('api/password/email', 'Api\Auth\PasswordController@postEmail');

    Route::get('api/news', 'Api\NewsController@getNews');
    //Route::post('api/news', 'Api\NewsController@postNews');

    Route::get('api/check', 'Api\ActivitiesController@getCheck');
    //Route::post('api/check', 'Api\ActivitiesController@postCheck');

    Route::get('api/exception', 'Api\ActivitiesController@getException');
    //Route::post('api/exception', 'Api\ActivitiesController@postException');

    Route::get('api/attendance', 'Api\ActivitiesController@getAttendance');
    //  Route::post('api/attendance', 'Api\ActivitiesController@postAttendance');

    Route::get('api/salary', 'Api\ActivitiesController@getSalary');
    //Route::post('api/salary', 'Api\ActivitiesController@postSalary');

});

Route::get('api/all', 'Api\ActivitiesController@getAll');
Route::get('api/password/email', 'Api\Auth\PasswordController@getEmail');
Route::post('api/password/email', 'Api\Auth\PasswordController@postEmail');
Route::post('api/check', 'Api\ActivitiesController@postCheck');
Route::post('api/exception', 'Api\ActivitiesController@postException');
Route::post('api/attendance', 'Api\ActivitiesController@postAttendance');
Route::post('api/salary', 'Api\ActivitiesController@postSalary');
Route::post('api/news', 'Api\NewsController@postNews');
Route::post('api/password/email', 'Api\Auth\PasswordController@postEmail');
Route::get('api/password/email', 'Api\Auth\PasswordController@getEmail');
Route::get('api/auth/login', 'Api\Auth\AuthController@getLogin');
Route::get('api/auth/logout', 'Api\Auth\AuthController@getLogout');
Route::post('api/auth/login', 'Api\Auth\AuthController@postLogin');
Route::get('api/inquiries', 'Api\InquiriesController@getInquiriesList');
Route::post('api/inquiriesList', 'Api\InquiriesController@postInquiriesList');
Route::get('api/inquiry', 'Api\InquiriesController@getInquiryView');
Route::post('api/inquiryView', 'Api\InquiriesController@postInquiryView');
Route::get('api/replay', 'Api\InquiriesController@getInquiryReply');
Route::post('api/replay', 'Api\InquiriesController@postInquiryReply');
Route::get('api/inquiryCreate', 'Api\InquiriesController@getInquiryCreate');
Route::post('api/inquiryCreate', 'Api\InquiriesController@postInquiryCreate');
Route::post('api/departments', 'Api\InquiriesController@postDepartments');
Route::post('api/employees', 'Api\InquiriesController@postEmployees');
Route::get('api/employees', 'Api\InquiriesController@getEmployees');
Route::get('api/checkApp', 'Api\DemoController@getAppStatus');
Route::post('api/checkApp', 'Api\DemoController@postAppStatus');
Route::get('api/last-activity', 'Api\ActivitiesController@getLastActivity');
Route::post('api/last-activity', 'Api\ActivitiesController@postLastActivity');
Route::get('api/username', 'Api\ProfileController@getUsername');
Route::post('api/username', 'Api\ProfileController@postUsername');
Route::get('api/avatar', 'Api\ProfileController@getAvatar');
Route::post('api/avatar', 'Api\ProfileController@postAvatar2');
Route::get('api/chat-login', 'Api\ActivitiesController@getChatLogin');
Route::post('api/chat-login', 'Api\ActivitiesController@postChatLogin');

//
Route::post('notifyclient', 'SubscribersController@notifyclient');
Route::post('notifyclient.php', 'SubscribersController@notifyclient');

Route::get('checksub', 'SubscribersController@checksub');
Route::get('checkphone', 'SubscribersController@checkphone');
Route::get('getPhone', 'SubscribersController@getPhone');

Route::get('addUpdateSubscriber', 'SubscribersController@addUpdateSubscriber');
Route::get('checkVcode', 'SubscribersController@checkVcode');
Route::get('setActiveWebLogin', 'SubscribersController@setActiveWebLogin');
Route::get('webAppLogin', 'SubscribersController@webAppLogin');
Route::get('setActiveWebLogout', 'SubscribersController@setActiveWebLogout');

// route by f
Route::get('phone/fromFile', 'PhonesController@fromFileForm');
Route::get('phone/newSubscriberDownload', 'PhonesController@newSubscriberDownload');
Route::post('phone/saveFromFile', 'PhonesController@saveFromFile');
Route::get('phone/newSubscriberDownload', 'PhonesController@newSubscriberDownload');

Route::post('api/checkExists', 'SubscribersController@checkExists');

Route::get('randomActiveSubscriber', 'SubscribersController@randomActiveSubscriber');
Route::get('downloadSubscribersCategory/{id}', 'PhonescategoriesController@downloadSub');

Route::get('updateSubscribers', 'SubscribersController@updateSubscribers');
//life time
Route::get('subscribe_liftime', 'SubscribersLifeTimeController@index');
Route::get('subscribe_liftime/search', 'SubscribersLifeTimeController@search');


//my vacations
Route::get('myvacations', 'MyvacationsController@getIndex');
Route::get('myvacations/update', 'MyvacationsController@getUpdate');
Route::get('myvacations/update/{id}', 'MyvacationsController@getUpdate');
Route::get('myvacations/show/{id}', 'MyvacationsController@getShow');
Route::post('myvacations/save', 'MyvacationsController@postSave');
Route::post('myvacations/delete', 'MyvacationsController@postDelete');
Route::post('myvacations/multisearch', 'MyvacationsController@postMultisearch');
Route::post('myvacations/filter', 'MyvacationsController@postFilter');
Route::get('myvacations/download', 'MyvacationsController@getDownload');
Route::post('myvacations/comboselect', 'MyvacationsController@postComboselect');
Route::post('myvacations/comboselectuser', 'MyvacationsController@postComboselectuser');
Route::get('myvacations/combotable', 'MyvacationsController@getCombotable');
Route::get('myvacations/combotablefield', 'MyvacationsController@getCombotablefield');

//my mypermissions
Route::get('mypermissions', 'MypermissionsController@getIndex');
Route::get('mypermissions/update', 'MypermissionsController@getUpdate');
Route::get('mypermissions/update/{id}', 'MypermissionsController@getUpdate');
Route::get('mypermissions/show/{id}', 'MypermissionsController@getShow');
Route::post('mypermissions/save', 'MypermissionsController@postSave');
Route::post('mypermissions/delete', 'MypermissionsController@postDelete');
Route::post('mypermissions/multisearch', 'MypermissionsController@postMultisearch');
Route::post('mypermissions/filter', 'MypermissionsController@postFilter');
Route::get('mypermissions/download', 'MypermissionsController@getDownload');
Route::post('mypermissions/comboselect', 'MypermissionsController@postComboselect');
Route::post('mypermissions/comboselectuser', 'MypermissionsController@postComboselectuser');
Route::get('mypermissions/combotable', 'MypermissionsController@getCombotable');
Route::get('mypermissions/combotablefield', 'MypermissionsController@getCombotablefield');


//my permissions
Route::get('permissions', 'PermissionsController@getIndex');
Route::get('permissions/update', 'PermissionsController@getUpdate');
Route::get('permissions/update/{id}', 'PermissionsController@getUpdate');
Route::get('permissions/show/{id}', 'PermissionsController@getShow');
Route::post('permissions/save', 'PermissionsController@postSave');
Route::post('permissions/delete', 'PermissionsController@postDelete');
Route::post('permissions/multisearch', 'PermissionsController@postMultisearch');
Route::post('permissions/filter', 'PermissionsController@postFilter');
Route::get('permissions/download', 'PermissionsController@getDownload');
Route::post('permissions/comboselect', 'PermissionsController@postComboselect');
Route::post('permissions/comboselectuser', 'PermissionsController@postComboselectuser');
Route::get('permissions/combotable', 'PermissionsController@getCombotable');
Route::get('permissions/combotablefield', 'PermissionsController@getCombotablefield');

//employeespermissions
Route::get('employeespermissions', 'EmployeespermissionsController@getIndex');
Route::get('employeespermissions/update', 'EmployeespermissionsController@getUpdate');
Route::get('employeespermissions/update/{id}', 'EmployeespermissionsController@getUpdate');
Route::get('employeespermissions/show/{id}', 'EmployeespermissionsController@getShow');
Route::post('employeespermissions/save', 'EmployeespermissionsController@postSave');
Route::post('employeespermissions/delete', 'EmployeespermissionsController@postDelete');
Route::post('employeespermissions/multisearch', 'EmployeespermissionsController@postMultisearch');
Route::post('employeespermissions/filter', 'EmployeespermissionsController@postFilter');
Route::get('employeespermissions/download', 'EmployeespermissionsController@getDownload');
Route::post('employeespermissions/comboselect', 'EmployeespermissionsController@postComboselect');
Route::post('employeespermissions/comboselectuser', 'EmployeespermissionsController@postComboselectuser');
Route::get('employeespermissions/combotable', 'EmployeespermissionsController@getCombotable');
Route::get('employeespermissions/combotablefield', 'EmployeespermissionsController@getCombotablefield');


//vacations
Route::get('vacations', 'VacationsController@getIndex');
Route::get('vacations/update', 'VacationsController@getUpdate');
Route::get('vacations/update/{id}', 'VacationsController@getUpdate');
Route::get('vacations/show/{id}', 'VacationsController@getShow');
Route::post('vacations/save', 'VacationsController@postSave');
Route::post('vacations/delete', 'VacationsController@postDelete');
Route::post('vacations/multisearch', 'VacationsController@postMultisearch');
Route::post('vacations/filter', 'VacationsController@postFilter');
Route::get('vacations/download', 'VacationsController@getDownload');
Route::post('vacations/comboselect', 'VacationsController@postComboselect');
Route::post('vacations/comboselectuser', 'VacationsController@postComboselectuser');
Route::get('vacations/combotable', 'VacationsController@getCombotable');
Route::get('vacations/combotablefield', 'VacationsController@getCombotablefield');



//vacationtypes
Route::get('vacationtypes', 'VacationsController@getIndex');
Route::get('vacationtypes/update', 'VacationsController@getUpdate');
Route::get('vacationtypes/update/{id}', 'VacationsController@getUpdate');
Route::get('vacationtypes/show/{id}', 'VacationsController@getShow');
Route::post('vacationtypes/save', 'VacationsController@postSave');
Route::post('vacationtypes/delete', 'VacationsController@postDelete');
Route::post('vacationtypes/multisearch', 'VacationsController@postMultisearch');
Route::post('vacationtypes/filter', 'VacationsController@postFilter');
Route::get('vacationtypes/download', 'VacationsController@getDownload');
Route::post('vacationtypes/comboselect', 'VacationsController@postComboselect');
Route::post('vacationtypes/comboselectuser', 'VacationsController@postComboselectuser');
Route::get('vacationtypes/combotable', 'VacationsController@getCombotable');
Route::get('vacationtypes/combotablefield', 'VacationsController@getCombotablefield');


//employeesvacations
Route::get('employeesvacations', 'VacationsController@getIndex');
Route::get('employeesvacations/update', 'VacationsController@getUpdate');
Route::get('employeesvacations/update/{id}', 'VacationsController@getUpdate');
Route::get('employeesvacations/show/{id}', 'VacationsController@getShow');
Route::post('employeesvacations/save', 'VacationsController@postSave');
Route::post('employeesvacations/delete', 'VacationsController@postDelete');
Route::post('employeesvacations/multisearch', 'VacationsController@postMultisearch');
Route::post('employeesvacations/filter', 'VacationsController@postFilter');
Route::get('employeesvacations/download', 'VacationsController@getDownload');
Route::post('employeesvacations/comboselect', 'VacationsController@postComboselect');
Route::post('employeesvacations/comboselectuser', 'VacationsController@postComboselectuser');
Route::get('employeesvacations/combotable', 'VacationsController@getCombotable');
Route::get('employeesvacations/combotablefield', 'VacationsController@getCombotablefield');

//occationscategories
Route::get('occationscategories', 'OccasionsController@getIndex');
Route::get('occasions/update', 'OccasionsController@getUpdate');
Route::get('occasions/update/{id}', 'OccasionsController@getUpdate');
Route::get('occasions/show/{id}', 'OccasionsController@getShow');
Route::post('occasions/save', 'OccasionsController@postSave');
Route::post('occasions/delete', 'OccasionsController@postDelete');
Route::post('occasions/multisearch', 'OccasionsController@postMultisearch');
Route::post('occasions/filter', 'OccasionsController@postFilter');
Route::get('occasions/download', 'OccasionsController@getDownload');
Route::post('occasions/comboselect', 'OccasionsController@postComboselect');
Route::post('occasions/comboselectuser', 'OccasionsController@postComboselectuser');
Route::get('occasions/combotable', 'OccasionsController@getCombotable');
Route::get('occasions/combotablefield', 'OccasionsController@getCombotablefield');



//overtimes
Route::get('overtimes', 'OvertimesController@getIndex');
Route::get('overtimes/update', 'OvertimesController@getUpdate');
Route::get('overtimes/update/{id}', 'OvertimesController@getUpdate');
Route::get('overtimes/show/{id}', 'OvertimesController@getShow');
Route::post('overtimes/save', 'OvertimesController@postSave');
Route::post('overtimes/delete', 'OvertimesController@postDelete');
Route::post('overtimes/multisearch', 'OvertimesController@postMultisearch');
Route::post('overtimes/filter', 'OvertimesController@postFilter');
Route::get('overtimes/download', 'OvertimesController@getDownload');
Route::post('overtimes/comboselect', 'OvertimesController@postComboselect');
Route::post('overtimes/comboselectuser', 'OvertimesController@postComboselectuser');
Route::get('overtimes/combotable', 'OvertimesController@getCombotable');
Route::get('overtimes/combotablefield', 'OvertimesController@getCombotablefield');



//myovertime
Route::get('myovertime', 'MyovertimeController@getIndex');
Route::get('myovertime/update', 'MyovertimeController@getUpdate');
Route::get('myovertime/update/{id}', 'MyovertimeController@getUpdate');
Route::get('myovertime/show/{id}', 'MyovertimeController@getShow');
Route::post('myovertime/save', 'MyovertimeController@postSave');
Route::post('myovertime/delete', 'MyovertimeController@postDelete');
Route::post('myovertime/multisearch', 'MyovertimeController@postMultisearch');
Route::post('myovertime/filter', 'MyovertimeController@postFilter');
Route::get('myovertime/download', 'MyovertimeController@getDownload');
Route::post('myovertime/comboselect', 'MyovertimeController@postComboselect');
Route::post('myovertime/comboselectuser', 'MyovertimeController@postComboselectuser');
Route::get('myovertime/combotable', 'MyovertimeController@getCombotable');
Route::get('myovertime/combotablefield', 'MyovertimeController@getCombotablefield');


//employeesovertime
Route::get('employeesovertime', 'EmployeesovertimeController@getIndex');
Route::get('employeesovertime/update', 'EmployeesovertimeController@getUpdate');
Route::get('employeesovertime/update/{id}', 'EmployeesovertimeController@getUpdate');
Route::get('employeesovertime/show/{id}', 'EmployeesovertimeController@getShow');
Route::post('employeesovertime/save', 'EmployeesovertimeController@postSave');
Route::post('employeesovertime/delete', 'EmployeesovertimeController@postDelete');
Route::post('employeesovertime/multisearch', 'EmployeesovertimeController@postMultisearch');
Route::post('employeesovertime/filter', 'EmployeesovertimeController@postFilter');
Route::get('employeesovertime/download', 'EmployeesovertimeController@getDownload');
Route::post('employeesovertime/comboselect', 'EmployeesovertimeController@postComboselect');
Route::post('employeesovertime/comboselectuser', 'EmployeesovertimeController@postComboselectuser');
Route::get('employeesovertime/combotable', 'EmployeesovertimeController@getCombotable');
Route::get('employeesovertime/combotablefield', 'EmployeesovertimeController@getCombotablefield');


//meetings
Route::get('meetings', 'MeetingsController@getIndex');
Route::get('meetings/update', 'MeetingsController@getUpdate');
Route::get('meetings/update/{id}', 'MeetingsController@getUpdate');
Route::get('meetings/show/{id}', 'MeetingsController@getShow');
Route::post('meetings/save', 'MeetingsController@postSave');
Route::post('meetings/delete', 'MeetingsController@postDelete');
Route::post('meetings/multisearch', 'MeetingsController@postMultisearch');
Route::post('meetings/filter', 'MeetingsController@postFilter');
Route::get('meetings/download', 'MeetingsController@getDownload');
Route::post('meetings/comboselect', 'MeetingsController@postComboselect');
Route::post('meetings/comboselectuser', 'MeetingsController@postComboselectuser');
Route::get('meetings/combotable', 'MeetingsController@getCombotable');
Route::get('meetings/combotablefield', 'MeetingsController@getCombotablefield');


//mymeetings
Route::get('mymeetings', 'MymeetingsController@getIndex');
Route::get('mymeetings/update', 'MymeetingsController@getUpdate');
Route::get('mymeetings/update/{id}', 'MymeetingsController@getUpdate');
Route::get('mymeetings/show/{id}', 'MymeetingsController@getShow');
Route::post('mymeetings/save', 'MymeetingsController@postSave');
Route::post('mymeetings/delete', 'MymeetingsController@postDelete');
Route::post('mymeetings/multisearch', 'MymeetingsController@postMultisearch');
Route::post('mymeetings/filter', 'MymeetingsController@postFilter');
Route::get('mymeetings/download', 'MymeetingsController@getDownload');
Route::post('mymeetings/comboselect', 'MymeetingsController@postComboselect');
Route::post('mymeetings/comboselectuser', 'MymeetingsController@postComboselectuser');
Route::get('mymeetings/combotable', 'MymeetingsController@getCombotable');
Route::get('mymeetings/combotablefield', 'MymeetingsController@getCombotablefield');



//employeesmeetings
Route::get('employeesmeetings', 'EmployeesmeetingsController@getIndex');
Route::get('employeesmeetings/update', 'EmployeesmeetingsController@getUpdate');
Route::get('employeesmeetings/update/{id}', 'EmployeesmeetingsController@getUpdate');
Route::get('employeesmeetings/show/{id}', 'EmployeesmeetingsController@getShow');
Route::post('employeesmeetings/save', 'EmployeesmeetingsController@postSave');
Route::post('employeesmeetings/delete', 'EmployeesmeetingsController@postDelete');
Route::post('employeesmeetings/multisearch', 'EmployeesmeetingsController@postMultisearch');
Route::post('employeesmeetings/filter', 'EmployeesmeetingsController@postFilter');
Route::get('employeesmeetings/download', 'EmployeesmeetingsController@getDownload');
Route::post('employeesmeetings/comboselect', 'EmployeesmeetingsController@postComboselect');
Route::post('employeesmeetings/comboselectuser', 'EmployeesmeetingsController@postComboselectuser');
Route::get('employeesmeetings/combotable', 'EmployeesmeetingsController@getCombotable');
Route::get('employeesmeetings/combotablefield', 'EmployeesmeetingsController@getCombotablefield');


//notifications
Route::get('notifications', 'NotificationsController@getIndex');
Route::get('notifications/update', 'NotificationsController@getUpdate');
Route::get('notifications/update/{id}', 'NotificationsController@getUpdate');
Route::get('notifications/show/{id}', 'NotificationsController@getShow');
Route::post('notifications/save', 'NotificationsController@postSave');
Route::post('notifications/delete', 'NotificationsController@postDelete');
Route::post('notifications/multisearch', 'NotificationsController@postMultisearch');
Route::post('notifications/filter', 'NotificationsController@postFilter');
Route::get('notifications/download', 'NotificationsController@getDownload');
Route::post('notifications/comboselect', 'NotificationsController@postComboselect');
Route::post('notifications/comboselectuser', 'NotificationsController@postComboselectuser');
Route::get('notifications/combotable', 'NotificationsController@getCombotable');
Route::get('notifications/combotablefield', 'NotificationsController@getCombotablefield');



//operator
Route::get('operator', 'OperatorController@getIndex');
Route::get('operator/update', 'OperatorController@getUpdate');
Route::get('operator/update/{id}', 'OperatorController@getUpdate');
Route::get('operator/show/{id}', 'OperatorController@getShow');
Route::post('operator/save', 'OperatorController@postSave');
Route::post('operator/delete', 'OperatorController@postDelete');
Route::post('operator/multisearch', 'OperatorController@postMultisearch');
Route::post('operator/filter', 'OperatorController@postFilter');
Route::get('operator/download', 'OperatorController@getDownload');
Route::post('operator/comboselect', 'OperatorController@postComboselect');
Route::post('operator/comboselectuser', 'OperatorController@postComboselectuser');
Route::get('operator/combotable', 'OperatorController@getCombotable');
Route::get('operator/combotablefield', 'OperatorController@getCombotablefield');


//visadays
Route::get('visadays', 'VisadaysController@getIndex');
Route::get('visadays/update', 'VisadaysController@getUpdate');
Route::get('visadays/update/{id}', 'VisadaysController@getUpdate');
Route::get('visadays/show/{id}', 'VisadaysController@getShow');
Route::post('visadays/save', 'VisadaysController@postSave');
Route::post('visadays/delete', 'VisadaysController@postDelete');
Route::post('visadays/multisearch', 'VisadaysController@postMultisearch');
Route::post('visadays/filter', 'VisadaysController@postFilter');
Route::get('visadays/download', 'VisadaysController@getDownload');
Route::post('visadays/comboselect', 'VisadaysController@postComboselect');
Route::post('visadays/comboselectuser', 'VisadaysController@postComboselectuser');
Route::get('visadays/combotable', 'VisadaysController@getCombotable');
Route::get('visadays/combotablefield', 'VisadaysController@getCombotablefield');


//perdiempositions
Route::get('perdiempositions', 'PerdiempositionsController@getIndex');
Route::get('perdiempositions/update', 'PerdiempositionsController@getUpdate');
Route::get('perdiempositions/update/{id}', 'PerdiempositionsController@getUpdate');
Route::get('perdiempositions/show/{id}', 'PerdiempositionsController@getShow');
Route::post('perdiempositions/save', 'PerdiempositionsController@postSave');
Route::post('perdiempositions/delete', 'PerdiempositionsController@postDelete');
Route::post('perdiempositions/multisearch', 'PerdiempositionsController@postMultisearch');
Route::post('perdiempositions/filter', 'PerdiempositionsController@postFilter');
Route::get('perdiempositions/download', 'PerdiempositionsController@getDownload');
Route::post('perdiempositions/comboselect', 'PerdiempositionsController@postComboselect');
Route::post('perdiempositions/comboselectuser', 'PerdiempositionsController@postComboselectuser');
Route::get('perdiempositions/combotable', 'PerdiempositionsController@getCombotable');
Route::get('perdiempositions/combotablefield', 'PerdiempositionsController@getCombotablefield');


//countryperdiem
Route::get('countryperdiem', 'CountryperdiemController@getIndex');
Route::get('countryperdiem/update', 'CountryperdiemController@getUpdate');
Route::get('countryperdiem/update/{id}', 'CountryperdiemController@getUpdate');
Route::get('countryperdiem/show/{id}', 'CountryperdiemController@getShow');
Route::post('countryperdiem/save', 'CountryperdiemController@postSave');
Route::post('countryperdiem/delete', 'CountryperdiemController@postDelete');
Route::post('countryperdiem/multisearch', 'CountryperdiemController@postMultisearch');
Route::post('countryperdiem/filter', 'CountryperdiemController@postFilter');
Route::get('countryperdiem/download', 'CountryperdiemController@getDownload');
Route::post('countryperdiem/comboselect', 'CountryperdiemController@postComboselect');
Route::post('countryperdiem/comboselectuser', 'CountryperdiemController@postComboselectuser');
Route::get('countryperdiem/combotable', 'CountryperdiemController@getCombotable');
Route::get('countryperdiem/combotablefield', 'CountryperdiemController@getCombotablefield');


//travelling
Route::get('travelling', 'TravellingController@getIndex');
Route::get('travelling/update', 'TravellingController@getUpdate');
Route::get('travelling/update/{id}', 'TravellingController@getUpdate');
Route::get('travelling/show/{id}', 'TravellingController@getShow');
Route::post('travelling/save', 'TravellingController@postSave');
Route::post('travelling/delete', 'TravellingController@postDelete');
Route::post('travelling/multisearch', 'TravellingController@postMultisearch');
Route::post('travelling/filter', 'TravellingController@postFilter');
Route::get('travelling/download', 'TravellingController@getDownload');
Route::post('travelling/comboselect', 'TravellingController@postComboselect');
Route::post('travelling/comboselectuser', 'TravellingController@postComboselectuser');
Route::get('travelling/combotable', 'TravellingController@getCombotable');
Route::get('travelling/combotablefield', 'TravellingController@getCombotablefield');


//mytravelling
Route::get('mytravelling', 'MytravellingController@getIndex');
Route::get('mytravelling/update', 'MytravellingController@getUpdate');
Route::get('mytravelling/update/{id}', 'MytravellingController@getUpdate');
Route::get('mytravelling/show/{id}', 'MytravellingController@getShow');
Route::post('mytravelling/save', 'MytravellingController@postSave');
Route::post('mytravelling/delete', 'MytravellingController@postDelete');
Route::post('mytravelling/multisearch', 'MytravellingController@postMultisearch');
Route::post('mytravelling/filter', 'MytravellingController@postFilter');
Route::get('mytravelling/download', 'MytravellingController@getDownload');
Route::post('mytravelling/comboselect', 'MytravellingController@postComboselect');
Route::post('mytravelling/comboselectuser', 'MytravellingController@postComboselectuser');
Route::get('mytravelling/combotable', 'MytravellingController@getCombotable');
Route::get('mytravelling/combotablefield', 'MytravellingController@getCombotablefield');


//employeestravelling
Route::get('employeestravelling', 'EmployeestravellingController@getIndex');
Route::get('employeestravelling/update', 'EmployeestravellingController@getUpdate');
Route::get('employeestravelling/update/{id}', 'EmployeestravellingController@getUpdate');
Route::get('employeestravelling/show/{id}', 'EmployeestravellingController@getShow');
Route::post('employeestravelling/save', 'EmployeestravellingController@postSave');
Route::post('employeestravelling/delete', 'EmployeestravellingController@postDelete');
Route::post('employeestravelling/multisearch', 'EmployeestravellingController@postMultisearch');
Route::post('employeestravelling/filter', 'EmployeestravellingController@postFilter');
Route::get('employeestravelling/download', 'EmployeestravellingController@getDownload');
Route::post('employeestravelling/comboselect', 'EmployeestravellingController@postComboselect');
Route::post('employeestravelling/comboselectuser', 'EmployeestravellingController@postComboselectuser');
Route::get('employeestravelling/combotable', 'EmployeestravellingController@getCombotable');
Route::get('employeestravelling/combotablefield', 'EmployeestravellingController@getCombotablefield');


//mycommitments
Route::get('mycommitments', 'EmployeestravellingController@getIndex');
Route::get('mycommitments/update', 'EmployeestravellingController@getUpdate');
Route::get('mycommitments/update/{id}', 'EmployeestravellingController@getUpdate');
Route::get('mycommitments/show/{id}', 'EmployeestravellingController@getShow');
Route::post('mycommitments/save', 'EmployeestravellingController@postSave');
Route::post('mycommitments/delete', 'EmployeestravellingController@postDelete');
Route::post('mycommitments/multisearch', 'EmployeestravellingController@postMultisearch');
Route::post('mycommitments/filter', 'EmployeestravellingController@postFilter');
Route::get('mycommitments/download', 'EmployeestravellingController@getDownload');
Route::post('mycommitments/comboselect', 'EmployeestravellingController@postComboselect');
Route::post('mycommitments/comboselectuser', 'EmployeestravellingController@postComboselectuser');
Route::get('mycommitments/combotable', 'EmployeestravellingController@getCombotable');
Route::get('mycommitments/combotablefield', 'EmployeestravellingController@getCombotablefield');


//employeestasks
Route::get('employeestasks', 'EmployeestasksController@getIndex');
Route::get('employeestasks/update', 'EmployeestasksController@getUpdate');
Route::get('employeestasks/update/{id}', 'EmployeestasksController@getUpdate');
Route::get('employeestasks/show/{id}', 'EmployeestasksController@getShow');
Route::post('employeestasks/save', 'EmployeestasksController@postSave');
Route::post('employeestasks/delete', 'EmployeestasksController@postDelete');
Route::post('employeestasks/multisearch', 'EmployeestasksController@postMultisearch');
Route::post('employeestasks/filter', 'EmployeestasksController@postFilter');
Route::get('employeestasks/download', 'EmployeestasksController@getDownload');
Route::post('employeestasks/comboselect', 'EmployeestasksController@postComboselect');
Route::post('commitments/comboselect', 'EmployeestasksController@postComboselect');
Route::post('employeestasks/comboselectuser', 'EmployeestasksController@postComboselectuser');
Route::get('employeestasks/combotable', 'EmployeestasksController@getCombotable');
Route::get('employeestasks/combotablefield', 'EmployeestasksController@getCombotablefield');


//mytasks
Route::get('mytasks', 'MytasksController@getIndex');
Route::get('mytasks/update', 'MytasksController@getUpdate');
Route::get('mytasks/update/{id}', 'MytasksController@getUpdate');
Route::get('mytasks/show/{id}', 'MytasksController@getShow');
Route::post('mytasks/save', 'MytasksController@postSave');
Route::post('mytasks/delete', 'MytasksController@postDelete');
Route::post('mytasks/multisearch', 'MytasksController@postMultisearch');
Route::post('mytasks/filter', 'MytasksController@postFilter');
Route::get('mytasks/download', 'MytasksController@getDownload');
Route::post('mytasks/comboselect', 'MytasksController@postComboselect');
Route::post('mytasks/comboselectuser', 'MytasksController@postComboselectuser');
Route::get('mytasks/combotable', 'MytasksController@getCombotable');
Route::get('mytasks/combotablefield', 'MytasksController@getCombotablefield');


//strategies
Route::get('strategies', 'StrategiesController@getIndex');
Route::get('strategies/update', 'StrategiesController@getUpdate');
Route::get('strategies/update/{id}', 'StrategiesController@getUpdate');
Route::get('strategies/show/{id}', 'StrategiesController@getShow');
Route::post('strategies/save', 'StrategiesController@postSave');
Route::post('strategies/delete', 'StrategiesController@postDelete');
Route::post('strategies/multisearch', 'StrategiesController@postMultisearch');
Route::post('strategies/filter', 'StrategiesController@postFilter');
Route::get('strategies/download', 'StrategiesController@getDownload');
Route::post('strategies/comboselect', 'StrategiesController@postComboselect');
Route::post('strategies/comboselectuser', 'StrategiesController@postComboselectuser');
Route::get('strategies/combotable', 'StrategiesController@getCombotable');
Route::get('strategies/combotablefield', 'StrategiesController@getCombotablefield');



Route::get('hr', function () {
    return redirect('dashboard');
});

define('MANAGER_DEPARTMENT_ID', 21);
define('ADMIN_USER_ID', 109); // Mayar
define('CFO_USER_ID', 59); // Tamer
define('CFO_BACKUP_ID', 64); // Rana
define('CEO_USER_ID', 2); // Haitham
define('CEO_USER_ID2', 65); // Reem
define('HR_USER_ID', 24); // Sara

define('DEV_SMS_SEND_MESSAGE', 'http://sms.ivashosting.com/hr_notify');
define('DEV_SMS_HR_PUNCH', 'http://sms.ivashosting.com/hr_punch');
// define('DEV_SMS_HR_PUNCH','http://localhost/sms_backend/hr_punch');

define('ContractMonthCheck', 4);

require base_path('setting.php');
