<?php

use App\Http\Controllers\admin\AdminProfileController;
use App\Http\Controllers\admin\EventApprovalController;
use App\Http\Controllers\admin\EventManageController;
use App\Http\Controllers\admin\UserManageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\user\UserProfileController;
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
    Route::get('/forgot_password', [LoginController::class, 'showForgotPasswordForm'])->name('forgot_password');
    // Route::post('/forgot_password', [LoginController::class, 'sendResetLink'])->name('sendResetLink');
    // Route::get('/reset_password/{token}', [LoginController::class, 'showResetPasswordForm'])->name('reset_password');
    // Route::post('/reset_password', [LoginController::class, 'resetPassword'])->name('resetPassword');
    
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
});

Route::get('/', [DashboardController::class, 'getAllEvent'])->name('user.dashboard');

Route::get('/create_event', function () {
    return view('user.create_event');
})->name('create_event')->middleware('auth');

Route::get('/event_approval', [EventApprovalController::class, 'show'])->name('event_approval');
Route::post('/event_approval/{EventID}', [EventApprovalController::class, 'eventApprovalHandler'])->name('eventApprovalHandler');

Route::get('/auth-two-step-verification', function () {
    return view('auth.auth-two-step-verification');
})->name('auth_two_step_verification');

Route::get('/blog_details', function () {
    return view('admin.blog-details');
})->name('blog_details');

Route::get('blog_grid', function () {
    return view('admin.blog-grid');
})->name('blog_grid');

Route::get('blog_list', function () {
    return view('admin.blog-lists');
})->name('blog_list');

Route::get('/calendar', function () {
    return view('admin.calendar');
})->name('calendar');

Route::get('/candidate-list', function () {
    return view('admin.candidate-list');
})->name('candidate_list'); //ds profile

Route::get('/candidate-overview', function () {
    return view('admin.candidate-overview');
})->name('candidate_overview'); //profile

Route::get('/charts-apex', function () {
    return view('admin.charts-apex');
})->name('charts_apex');

Route::get('/chat', function () {
    return view('admin.chat');
})->name('chat');

Route::get('/contacts-grid', function () {
    return view('admin.contacts-grid');
})->name('contacts_grid');

Route::get('/contacts-list', function () {
    return view('admin.contacts-list');
})->name('contacts_list');

Route::get('/dashboard-saas', function () {
    return view('admin.dashboard-saas');
})->name('dashboard_saas');

Route::get('/dashboard-blog', function () {
    return view('admin.dashboard-blog');
})->name('dashboard_blog');

Route::get('/dashboard-job', function () {
    return view('admin.dashboard-job');
})->name('dashboard_job');

Route::get('/layouts-light-sidebar', function () {
    return view('admin.layouts-light-sidebar');
})->name('layouts_light_sidebar');

Route::get('/apps-filemanager', function () {
    return view('admin.apps-filemanager');
})->name('apps_filemanager');

Route::get('/layouts-compact-sidebar', function () {
    return view('admin.layouts-compact-sidebar');
})->name('layouts_compact_sidebar');

Route::get('/layouts-icon-sidebar', function () {
    return view('admin.layouts-icon-sidebar');
})->name('layouts_icon_sidebar');

Route::get('/layouts-horizontal', function () {
    return view('admin.layouts-horizontal');
})->name('layouts_horizontal');

Route::get('/ecommerce-products', function () {
    return view('admin.ecommerce-products');
})->name('ecommerce_products');

Route::get('/ecommerce-product-detail', function () {
    return view('admin.ecommerce-product-detail');
})->name('ecommerce_product_detail');

Route::get('/ecommerce-cart', function () {
    return view('admin.ecommerce-cart');
})->name('ecommerce_cart');

Route::get('/ecommerce-checkout', function () {
    return view('admin.ecommerce-checkout');
})->name('ecommerce_checkout');

Route::get('/ecommerce-add-product', function () {
    return view('admin.ecommerce-add-product');
})->name('ecommerce_add_product');

Route::get('/dashboard-crypto', function () {
    return view('admin.dashboard-crypto');
})->name('dashboard_crypto');

Route::get('/email-inbox', function () {
    return view('admin.email-inbox');
})->name('email_inbox');

Route::get('/tasks-create', function () {
    return view('admin.tasks-create');
})->name('tasks_create');

Route::get('/projects-create', function () {
    return view('admin.projects-create');
})->name('projects_create');
?>

