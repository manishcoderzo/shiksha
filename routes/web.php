<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SuperAdmin\Auth\AuthController;
use App\Http\Controllers\SuperAdmin\DashboardController;
use App\Http\Controllers\SuperAdmin\SchoolController;
use App\Http\Controllers\BlockController;
use App\Http\Controllers\SuperAdmin\HeadmasterController;
use App\Http\Controllers\SuperAdmin\StaffController;
use App\Http\Controllers\SuperAdmin\AdminController;
use App\Http\Controllers\SuperAdmin\AttendanceController;
use App\Http\Controllers\SuperAdmin\LeaveController;
use App\Http\Controllers\Web\WebController;
use App\Http\Controllers\Web\Auth\LoginController;

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

// Route::get('/', function () {
//     return view('layout.app');
// });

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('submit', [AuthController::class, 'submit'])->name('submit');


Route::group(['prefix' => 'forms'], function () {
    Route::get('/form-elements', [Controller::class, 'formElements'])->name('form-elements');
    Route::get('/input-groups', [Controller::class, 'inputGroups'])->name('input-groups');
    Route::get('/forms-layouts', [Controller::class, 'formsLayouts'])->name('forms-layouts');
});
Route::group(['middleware' => 'login'], function () {
    Route::get('logout', [AuthController::class,'logout'])->name('logout');

    Route::get('profile/edit', [AuthController::class,'profileEdit'])->name('profileEdit');
    Route::post('profile/update', [AuthController::class,'profileUpdate'])->name('profileUpdate');
    Route::post('profile/changePassword', [AuthController::class,'changePassword'])->name('changePassword');

    //block create
    Route::post('districtGet', [BlockController::class, 'districtGet'])->name('districtGet');
    Route::post('blockGet', [BlockController::class, 'blockGet'])->name('blockGet');
    Route::post('schoolGet', [BlockController::class, 'schoolGet'])->name('schoolGet');

    Route::get('block/list', [BlockController::class, 'blockList'])->name('blockList');
    Route::get('block/create', [BlockController::class, 'blockCreate'])->name('blockCreate');
    
    Route::post('blockSubmit', [BlockController::class, 'blockSubmit'])->name('blockSubmit');
    Route::get('blockEdit/{id}', [BlockController::class, 'blockEdit'])->name('blockEdit');
    Route::post('blockUpdate/{id}', [BlockController::class, 'blockUpdate'])->name('blockUpdate');

    Route::group(['prefix' => 'superadmin', 'as' => 'superadmin.'], function () {
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        //school route
        Route::get('school/create', [SchoolController::class, 'schoolCreate'])->name('schoolCreate');
        Route::post('school/Submit', [SchoolController::class, 'schoolSubmit'])->name('schoolSubmit');
        Route::get('school/List', [SchoolController::class, 'schoolList'])->name('schoolList');
        Route::get('school/Edit/{id}', [SchoolController::class, 'schoolEdit'])->name('schoolEdit');
        Route::post('schoolUpdate/{id}', [SchoolController::class, 'schoolUpdate'])->name('schoolUpdate');
        Route::get('schooldelete/{id}', [SchoolController::class,'schooldelete'])->name('schooldelete');

        //headmaster route
        Route::post('schoolGet', [HeadmasterController::class, 'schoolGet'])->name('schoolGet');
        Route::post('disGet', [HeadmasterController::class, 'disGet'])->name('disGet');
        Route::post('bloGet', [HeadmasterController::class, 'bloGet'])->name('bloGet');
        Route::post('headmasterGet', [HeadmasterController::class, 'headmasterGet'])->name('headmasterGet');
        Route::post('staffGet', [AttendanceController::class, 'staffGet'])->name('staffGet');    
        
        Route::get('headmaster/create', [HeadmasterController::class, 'headmasterCreate'])->name('headmasterCreate');
        Route::post('headmaster/Submit', [HeadmasterController::class, 'headmasterSubmit'])->name('headmasterSubmit');
        Route::get('headmaster/List', [HeadmasterController::class, 'headmasterList'])->name('headmasterList');
        Route::get('headmaster/Edit/{id}', [HeadmasterController::class, 'headmasterEdit'])->name('headmasterEdit');
        Route::post('headmasterUpdate/{id}', [HeadmasterController::class, 'headmasterUpdate'])->name('headmasterUpdate');
        Route::get('headmasterdelete/{id}', [HeadmasterController::class,'headmasterdelete'])->name('headmasterdelete');

        //staff type route
        Route::get('staffType/create', [StaffController::class, 'staffTypeCreate'])->name('staffTypeCreate');
        Route::post('staffType/Submit', [StaffController::class, 'staffTypeSubmit'])->name('staffTypeSubmit');
        Route::get('staffType/List', [StaffController::class, 'staffTypeList'])->name('staffTypeList');
        Route::get('staffType/Edit/{id}', [StaffController::class, 'staffTypeEdit'])->name('staffTypeEdit');
        Route::post('staffTypeUpdate/{id}', [StaffController::class, 'staffTypeUpdate'])->name('staffTypeUpdate');

        //staff route
        Route::get('staff/create', [StaffController::class, 'staffCreate'])->name('staffCreate');
        Route::post('staff/Submit', [StaffController::class, 'staffSubmit'])->name('staffSubmit');
        Route::get('staff/List', [StaffController::class, 'staffList'])->name('staffList');
        Route::get('staff/Edit/{id}', [StaffController::class, 'staffEdit'])->name('staffEdit');
        Route::post('staffUpdate/{id}', [StaffController::class, 'staffUpdate'])->name('staffUpdate');
        Route::get('staffdelete/{id}', [StaffController::class,'staffdelete'])->name('staffdelete');
        Route::get('staff/view/{id}', [StaffController::class, 'staffView'])->name('staffView');
        Route::get('staffexport', [StaffController::class, 'staffexport'])->name('staffexport');

        //create admin
        Route::get('admin/create', [AdminController::class, 'adminCreate'])->name('adminCreate');
        Route::post('admin/Submit', [AdminController::class, 'adminSubmit'])->name('adminSubmit');
        Route::get('admin/List', [AdminController::class, 'adminList'])->name('adminList');
        Route::get('admin/Edit/{id}', [AdminController::class, 'adminEdit'])->name('adminEdit');
        Route::post('adminUpdate/{id}', [AdminController::class, 'adminUpdate'])->name('adminUpdate');
        Route::get('admindelete/{id}', [AdminController::class,'admindelete'])->name('admindelete');

        //attendance 
        Route::get('attendance/List', [AttendanceController::class, 'attendanceList'])->name('attendanceList');

        //attendance Manage
        Route::get('attendance/Manage/List/{id}', [AttendanceController::class, 'attendanceManageList'])->name('attendanceManageList');

         //Leave manage 
        Route::get('Leave/List', [LeaveController::class, 'leaveList'])->name('leaveList');
        Route::post('leaveStatusSubmit', [LeaveController::class, 'leaveStatusSubmit'])->name('leaveStatusSubmit');

    });
    
});
Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
    Route::view('/offline', 'user.offline');
    Route::get('login', [LoginController::class, 'userLogin'])->name('userLogin');
    Route::post('submit', [LoginController::class, 'usersubmit'])->name('usersubmit');
    Route::group(['middleware' => 'headmasters'], function () {
        Route::get('headmasterProfile', [WebController::class, 'headmasterProfile'])->name('headmasterProfile');
        Route::post('headmasterProfileSubmit', [WebController::class, 'headmasterProfileSubmit'])->name('headmasterProfileSubmit');

        Route::get('headmasterlogout', [LoginController::class,'headmasterlogout'])->name('headmasterlogout');
        Route::get('otp/varification', [WebController::class, 'otpVarification'])->name('otpVarification');
        Route::get('dashboard', [WebController::class, 'dashboard'])->name('dashboard');
        Route::get('home', [WebController::class, 'home'])->name('home');
        Route::get('account', [WebController::class, 'account'])->name('account');
        
        Route::get('attendance', [WebController::class, 'attendance'])->name('attendance');
        Route::post('attendance/Submit', [WebController::class, 'attendanceSubmit'])->name('attendanceSubmit');
        Route::get('attendanceImage/{id}', [WebController::class, 'attendanceImage'])->name('attendanceImage');
        Route::post('attendanceImage/Submit', [WebController::class, 'attendanceImageSubmit'])->name('attendanceImageSubmit');

        Route::get('teacherDetails/{id}', [WebController::class, 'teacherDetails'])->name('teacherDetails');
        Route::get('attendanceReport', [WebController::class, 'attendanceReport'])->name('attendanceReport');
        Route::get('attendanceReportDetails/{id}', [WebController::class, 'attendanceReportDetails'])->name('attendanceReportDetails');
        Route::get('reportPresent/{id}', [WebController::class, 'reportPresent'])->name('reportPresent');
        Route::get('reportAbsent/{id}', [WebController::class, 'reportAbsent'])->name('reportAbsent');
        Route::get('reportCl/{id}', [WebController::class, 'reportCl'])->name('reportCl');
        Route::get('reportSl/{id}', [WebController::class, 'reportSl'])->name('reportSl');
        Route::get('reportEl/{id}', [WebController::class, 'reportEl'])->name('reportEl');
    });
});
