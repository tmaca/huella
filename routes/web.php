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

Route::get('/', function () {
    return view('landing');
})->name("landing");

Route::get('users/home', function () {
    return view('users/home');
});

Auth::routes();

Route::get("/logout", "Auth\LoginController@logout");

Route::get("/email/confim/{token}", "Auth\RegisterController@verifyEmail")->name("registerEmailConfirmation");

Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('admin.home');
    Route::get('/login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AuthAdmin\LoginController@login')->name('admin.login.submit');
    Route::post('/logout', 'AuthAdmin\LoginController@logout')->name('admin.logout');
    Route::get('/password/reset', 'AuthAdmin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/email', 'AuthAdmin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset/{token}', 'AuthAdmin\ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('/password/reset', 'AuthAdmin\ResetPasswordController@reset');

    // user management
    Route::post("user/edit", "AdminController@editUser")->name("admin.user.edit");
    Route::prefix("user/{id}")->group(function() {
        Route::post("delete", "AdminController@deleteUser")->name("admin.user.delete");
    });
});

Route::get("terms-of-service", function () {
    return "Terminos del servicio";
})->name("termsOfService");

Route::post('datoscontacto', 'HomeController@datoscontacto')->name('contact');
