<?php

use App\Http\Controllers\admin\AdminProfileController;
use App\Http\Controllers\admin\EventManageController;
use App\Http\Controllers\admin\UserManageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\CheckRole;
use App\Models\Account;
use App\Http\Controllers\admin\TestController;
use App\Http\Controllers\user\UserProfileController;
use Illuminate\Contracts\Auth\UserProvider;
use App\Http\Controllers\DashboardController;

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
// Route::resource('accounts', AccountController::class);

Route::group(['prefix' => 'login', 'as' => 'login.'], function () {
    Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/', [LoginController::class, 'login'])->name('loginHandler');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
});

Route::group(['prefix' => 'register', 'as' => 'register.'], function () {
    Route::get('/', [RegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('/', [RegisterController::class, 'register'])->name('registerHandler');
});


// Route::get('/admin', function () {
//     return view('admin.layouts.dashboard');
// })->name('admin.dashboard')->middleware('role');

// Route::get('/user', function() {
//     return view('user.layouts.dashboard');
// })->name('user.dashboard')->middleware('role');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard')->middleware('auth');

Route::group(['prefix' => 'admin/admin_profile'], function(){
    Route::get('/', [AdminProfileController::class, 'show'])->middleware('auth')->name('admin_profile');
    Route::put('/{UserID}', [AdminProfileController::class, 'update'])->middleware('auth')->name('adminProfileHandler');
    Route::post('/{UserID}', [AdminProfileController::class, 'changePassword'])->middleware('auth')->name('adminChangePassword');
});

Route::group(['prefix' => 'user/user_profile'], function() {
    Route::get('/', [UserProfileController::class, 'show'])->middleware('auth')->name('userProfile');
    Route::put('/{UserID}', [UserProfileController::class, 'update'])->middleware('auth')->name('userProfileHandler');
    Route::post('/{UserID}', [UserProfileController::class, 'changePassword'])->middleware('auth')->name('userChangePassword');
    Route::delete('/{UserID}', [UserProfileController::class, 'delete'])->middleware('auth')->name('userDelete');
});

Route::group(['prefix' => 'admin/user_manage'], function(){
    Route::get('/', [UserManageController::class, 'getAllUser'])->name('user_manage');
    Route::delete('/{UserID}', [UserManageController::class, 'delete'])->name('delete_user');
    Route::get('/find_user', [UserManageController::class, 'findUsers'])->name('find_users');
});

Route::group(['prefix' => 'admin/event_manage'], function(){
    Route::get('/', [EventManageController::class, 'getAllEvent'])->name('event_manage');
    Route::get('/create_event', [EventManageController::class, 'add'])->name('add_event');
    Route::post('/create_event', [EventManageController::class, 'create'])->name('addEventHandler');
    Route::get('/{EventID}', [EventManageController::class, 'show'])->name('eventDetails');
    Route::get('/edit_event/{EventID}', [EventManageController::class, 'edit'])->name('edit_event');
    Route::put('/{EventID}', [EventManageController::class, 'update'])->name('updateEventHandler');
    Route::delete('/{EventID}', [EventManageController::class, 'delete'])->name('deleteEventHandler');
    Route::get('/find_event', [EventManageController::class, 'find'])->name('find_events');
    Route::get('/event_approval', [EventManageController::class, 'getAllEventApproval'])->name('event_approval');
    Route::post('/approval/{EventID}', [EventManageController::class, 'approvalHandler'])->name('eventApprovalHandler');
});

Route::get('/', [DashboardController::class, 'getAllEvent'])->name('user.dashboard');

Route::get('/create_event', function () {
    return view('user.create_event');
})->name('create_event')->middleware('auth');
?>

