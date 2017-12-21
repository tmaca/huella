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

Route::get('/home', 'HomeController@index')->name('home');

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

    // messages management
    Route::get('/mails', 'AdminController@showMessages')->name("admin.mails.show");
    Route::prefix("mail/{id}")->group(function() {
        Route::post("delete", "AdminController@deleteMail")->name("admin.mail.delete");
        Route::post("reply", "AdminController@replyMail")->name("admin.mail.reply");
    });
});

Route::get("terms-of-service", function () {
    return view("tos");
})->name("termsOfService");

Route::post('datoscontacto', 'HomeController@datoscontacto')->name('contact');

// user routes
Route::get('building', 'HomeController@building')->name('building');

Route::post('addBuilding', 'HomeController@saveBuilding')->name('addBuilding');
