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
    return view('home');
});

Auth::routes();

Route::get("/logout", function () {
    Auth::logout();
    return redirect("/");
});

Route::get("/email/confim/{token}", "Auth\RegisterController@verifyEmail")->name("registerEmailConfirmation");

Route::get('/mailable', function () {
    $user = new App\User;
    $user->email = "email@example.com";
    $user->email_code = str_random(75);

    return new App\Mail\RegisterConfirmation($user);
});
