<?php

use App\Http\Controllers\admin\AdminProfileController;
use App\Http\Controllers\admin\EventApprovalController;
use App\Http\Controllers\admin\EventManageController;
use App\Http\Controllers\admin\UserManageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;;
use App\Http\Controllers\user\UserProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;

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

Route::group(['prefix' => 'login', 'as' => 'login.'], function () {
    Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/', [LoginController::class, 'login'])->name('loginHandler');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
    Route::get('/forgot_password', [LoginController::class, 'showForgotPasswordForm'])->name('forgot_password');
//     // Route::post('/forgot_password', [LoginController::class, 'sendResetLink'])->name('sendResetLink');
//     // Route::get('/reset_password/{token}', [LoginController::class, 'showResetPasswordForm'])->name('reset_password');
//     // Route::post('/reset_password', [LoginController::class, 'resetPassword'])->name('resetPassword'); 
});

Route::group(['prefix' => 'register', 'as' => 'register.'], function () {
    Route::get('/', [RegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('/', [RegisterController::class, 'register'])->name('registerHandler');
});


Route::get('/admin', function () {
    return view('index');
})->name('admin.dashboard')->middleware(('auth'));

// // Route::get('/user', function() {
// //     return view('user.layouts.dashboard');
// // })->name('user.dashboard')->middleware('role');

// Route::get('/admin', function () {
//     return view('admin.dashboard');
// })->name('admin.dashboard')->middleware('auth');

Route::group(['prefix' => 'contacts-profile', 'middleware' => 'auth'], function(){
    Route::get('/', [AdminProfileController::class, 'show'])->name('contacts-profile');
    Route::post('/update/{UserID}', [AdminProfileController::class, 'update'])->name('updateProfile');
    Route::post('/change-password/{UserID}', [AdminProfileController::class, 'changePassword'])->name('adminChangePassword');
});

// Route::group(['prefix' => 'user/user_profile'], function() {
//     Route::get('/', [UserProfileController::class, 'show'])->middleware('auth')->name('userProfile');
//     Route::put('/{UserID}', [UserProfileController::class, 'update'])->middleware('auth')->name('userProfileHandler');
//     Route::post('/{UserID}', [UserProfileController::class, 'changePassword'])->middleware('auth')->name('userChangePassword');
//     Route::delete('/{UserID}', [UserProfileController::class, 'delete'])->middleware('auth')->name('userDelete');
// });

Route::group(['prefix' => 'contacts-list'], function(){
    Route::get('/', [UserManageController::class, 'getAllUser'])->name('contacts-list');
    Route::delete('/{UserID}', [UserManageController::class, 'delete'])->name('delete_user');
    Route::get('/user', [UserManageController::class, 'findUsers'])->name('find_users');
    Route::put('/update/{UserID}', [UserManageController::class, 'update'])->name('update_user');
    Route::post('/create', [UserManageController::class, 'create'])->name('create_user');
});

Route::group(['prefix' => 'event-list'], function(){
    Route::get('/', [EventManageController::class, 'getAllEvent'])->name('event-list');
    Route::post('/create_event', [EventManageController::class, 'create'])->name('addEventHandler');
    Route::put('/{EventID}', [EventManageController::class, 'update'])->name('updateEventHandler');
    Route::delete('/{EventID}', [EventManageController::class, 'delete'])->name('deleteEventHandler');
    Route::get('/find_event', [EventManageController::class, 'find'])->name('find_events');
    Route::get('/filter', [EventManageController::class, 'filterEvents'])->name('filterEvents');
});

Route::group(['prefix' => 'event-apply'], function() {
    Route::get('/', [EventApprovalController::class, 'show'])->name('event-apply');
    Route::post('/event_approval/{EventID}', [EventApprovalController::class, 'eventApprovalHandler'])->name('eventApprovalHandler');
});

Route::group(['prefix', 'event-details'], function() {
    Route::get('/{EventID}', [EventManageController::class, 'show'])->name('event-details');
});

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

//Language Translation
Route::get('admin/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
});

Route::get('/', function () {
    return view('user.index');
})->name('user.index');

Route::get('/user/event_search', function() {
    return view('user.event');
})->name('EventSearch');

Route::group(['prefix' => 'user/user-profile', 'middleware' => 'auth'], function(){
    Route::get('/', [UserProfileController::class, 'show'])->name('user-profile');
    Route::put('/update/{UserID}', [UserProfileController::class, 'update'])->name('updateProfile');
    Route::post('/change-password/{UserID}', [AdminProfileController::class, 'changePassword'])->name('adminChangePassword');
});
?>


