<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user_auth;
use Illuminate\Support\facades\DB;

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

Route::get('/', function () {
    return view('welcome');
});

Route::POST('/Signup', 'App\Http\Controllers\RegistrationandSubmit@store');
Route::get('/login', 'App\Http\Controllers\RegistrationandSubmit@login');
Route::POST('/LoginSubmit', 'App\Http\Controllers\RegistrationandSubmit@LoginSubmit');

// this middleware is for user 
Route::group(['middleware' => ['user_auth']], function () {
    Route::get('user/dashboard', function () {
        return view('user/dashboard');
    });

    Route::get('/user/logout', [user_auth::class, 'userlogout']);
    Route::POST('/user/name_update', 'App\Http\Controllers\user_auth@name_update');
    Route::view('/user/SubmitRequest', 'user.SubmitRequest');
    Route::get('/user/RequestSucess/', 'App\Http\Controllers\User@RequestSucess');
    Route::get('/user/print/', 'App\Http\Controllers\User@print');
    Route::POST('/user/submit_Request_info', 'App\Http\Controllers\User@submitRequest');
    Route::get('/user/CheckStatus', function () {
        return view('user/CheckStatus');
    });
    Route::view('/user/ChangePassword', 'user.ChangePassword');
    Route::POST('/user/search', 'App\Http\Controllers\user@search');
    Route::POST('/user/ChangePasswordSubmit', 'App\Http\Controllers\user_auth@ChangePassword');
});
// user middleware ends here

// this middleware is for admin
Route::group(['middleware' => ['admin_auth']], function () {

    Route::get('/Admin/Dashboard', 'App\Http\Controllers\Admin_dashboard@show_data');
    Route::get('/Admin/Request', 'App\Http\Controllers\Admin@Request_display');
    Route::POST('/Admin/Request_view/{id}', 'App\Http\Controllers\Admin@Request_show');
    Route::POST('/Admin/Assign_Work', 'App\Http\Controllers\Admin@Assign_work');
    Route::POST('/Admin/PrintandDumb/{id}', 'App\Http\Controllers\Admin@PrintandDumb');

    Route::get('Admin/Print_page', function () { /* this is  for calling the print_page  */
        return view('Admin/Print_page');
    });

    // the mentioned down will be the code of admins work order part
    Route::get('Admin/WorkOrder', function () {
        $result = DB::table('assign_work')->orderByDesc('req_id')->get();
        return view('Admin/WorkOrder', ['result' => $result]);
    });
    Route::POST('/Admin/Print_work/{id}', 'App\Http\Controllers\Admin_workOrder@Print_work');
    Route::get('Admin/Work_status/{id}', 'App\Http\Controllers\Admin_workOrder@work_status');
    Route::post('Admin/work_update/{id}', 'App\Http\Controllers\Admin_workOrder@work_update');
    // end of admins work order par

    // the mentioned sown will be the code of admin requester part
    Route::get('Admin/Requester', function () {
        $result =  DB::table('registration')->where('role', 2)->get();
        return view('Admin/Requester', ['result' => $result]);
    });
    Route::POST('Admin/Requester_action/{id}', 'App\Http\Controllers\Admin_requester@requester_action');
    Route::POST('Admin/Requester_update/', 'App\Http\Controllers\Admin_requester@update');
    Route::view('Admin/Add_Requester/', 'Admin.requester_subFile.Add_Requester');
    Route::POST('Admin/Insert_requester/', 'App\Http\Controllers\Admin_requester@insert');
    // end of admin requester

    // the mentioned down will be the code of admin technician part
    Route::get('Admin/Technician', function () {
        $result =  DB::table('technician')->get();
        return view('Admin/Technician', ['result' => $result]);
    });
    Route::POST('Admin/Technician_action/{id}', 'App\Http\Controllers\Admin_technician@technician_action');
    Route::POST('Admin/Technician_update/', 'App\Http\Controllers\Admin_technician@update');
    Route::view('Admin/Add_Technician/', 'Admin.technician_Subfile.Add_technician');
    Route::POST('Admin/Insert_technician/', 'App\Http\Controllers\Admin_technician@insert');
    // end of admin technician part 

    // the mentioned down will be the code of admin assets part
    Route::get('Admin/Assets', function () {
        $result =  DB::table('assets')->get();
        return view('Admin/Assets', ['result' => $result]);
    });
    Route::view('Admin/Add_Assets/', 'Admin.Assets_subfile.Add_assets');
    Route::POST('Admin/Insert_assets/', 'App\Http\Controllers\Admin_assets@insert');
    Route::POST('Admin/Assets_action/{id}', 'App\Http\Controllers\Admin_assets@assets_action');
    Route::POST('Admin/Assets_update/', 'App\Http\Controllers\Admin_assets@update');
    Route::POST('Admin/SellProduct/', 'App\Http\Controllers\Admin_assets@sell_product');
    Route::POST('Admin/Confirm_sell_product/', 'App\Http\Controllers\Admin_assets@confirm_sell_product');
    // end of admin assets part

    // the  mentioned down will be the code of admin sell product report part
    Route::view('Admin/SellReport', 'Admin.SellReport');
    Route::POST('Admin/Sell_Report_Search/', 'App\Http\Controllers\Admin_Sell_product_and_work_report@sell_product_search');
    Route::view('Admin/WorkReport', 'Admin.WorkReport');
    Route::POST('Admin/Work_report_search/', 'App\Http\Controllers\Admin_Sell_product_and_work_report@work_report_search');
    // end of admin sell product part

    // the menioned down is the code of admin's change password
    Route::view('Admin/ChangePassword', 'Admin.ChangePassword');
    Route::POST('Admin/ChangePasswordSubmit','App\Http\Controllers\Admin@Change_password');
    // end of admin change  password

    Route::get('/Admin/logout', 'App\Http\Controllers\Admin@Logout');
});

// admin middleware ends here
