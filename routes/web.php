<?php

use App\Http\Controllers\web\v1\admin\AuthController;
use App\Http\Controllers\web\v1\admin\DashboardController;
use App\Http\Controllers\web\v1\admin\ProfileController;
use App\Http\Controllers\web\v1\admin\SettingController;
use App\Http\Controllers\web\v1\CkeditorController;
use App\Http\Controllers\web\v1\ForgotPasswordController;
use App\Http\Controllers\web\v1\ResetPasswordController;
use Dedoc\Scramble\Scramble;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//v1 api
Scramble::registerUiRoute(path: 'docs/api/v1', api: 'v1');
Scramble::registerJsonSpecificationRoute(path: 'docs/api/v1.json', api: 'v1');

//admin Login Route
Route::get('/', [AuthController::class, 'Index'])->name('login');
Route::post('/admin_login', [AuthController::class, 'AdminLogin'])->name('admin_login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


//Reset Password
Route::get('/reset_password', [ResetPasswordController::class, 'Index'])->name('reset.password');
Route::post('/change_password_post', [ResetPasswordController::class, 'ResetPassword'])->name('change.password.post');

//forgot Password
//forgot password
Route::get('/forgot_password', [ForgotPasswordController::class, 'Index'])->name('forgot.password');
Route::post('/forgot_password_post', [ForgotPasswordController::class, 'submitForgotPasswordForm'])->name('forgot.password.post');
Route::get('/reset_password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.form');
Route::post('/reset_password_post', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::post('ckeditor/image_upload', [CkeditorController::class, 'upload'])->name('upload');


Route::group(['prefix' => 'admin', 'namespace' => 'admin', 'middleware' => ['auth', 'admin']], function () {

    //Reset Password
    Route::get('/reset_password', [ResetPasswordController::class, 'Index'])->name('reset.password');
    Route::post('/change_password_post', [ResetPasswordController::class, 'ResetPassword'])->name('change.password.post');


    Route::get('/', [DashboardController::class, 'Dashboard'])->name('admin_dashboard');
    //profile
    Route::get('/profile', [ProfileController::class, 'Profile'])->name('admin.profile');
    Route::post('/profile_post', [ProfileController::class, 'ProfilePost'])->name('admin.profile.post');




    Route::get('/settings', [SettingController::class, 'Index'])->name('admin_settings');
    Route::post('/settings', [SettingController::class, 'store'])->name('admin_settings_store');
});


