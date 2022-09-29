<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'name' => 'admin.'],function(){

    Route::middleware(['auth', 'is_admin','user_access:admin'])->group(function () {
        Route::get('user', 'UserController@index')->name('admin.user.index');
        Route::get('user/search', 'UserController@search')->name('admin.user.search');
        Route::get('user/create', 'UserController@create')->name('admin.user.create');
        Route::post('user/create', 'UserController@store')->name('admin.user.store');
        Route::get('user/{id}/invoice/', 'UserController@invoice')->name('admin.user.invoice');
        Route::get('user/{id}/card/', 'UserController@card')->name('admin.user.card');
        Route::get('user/{id}/edit', 'UserController@edit')->name('admin.user.edit');
        Route::put('user/{id}', 'UserController@update')->name('admin.user.update');
        Route::delete('user/{id}', 'UserController@destroy')->name('admin.user.destroy');

        Route::get('invoice/search/{id}', 'InvoiceController@search')->name('admin.invoice.search');
        Route::get('invoice/create/{id}', 'InvoiceController@create')->name('admin.invoice.create');
        Route::post('invoice/create', 'InvoiceController@store')->name('admin.invoice.store');
        Route::get('invoice/{id}', 'InvoiceController@show')->name('admin.invoice.show');
        Route::get('invoice/{id}/edit', 'InvoiceController@edit')->name('admin.invoice.edit');
        Route::put('invoice/{id}', 'InvoiceController@update')->name('admin.invoice.update');
        Route::delete('invoice/{id}', 'InvoiceController@destroy')->name('admin.invoice.destroy');

        Route::get('card/search/{id}', 'CardController@search')->name('admin.card.search');
        Route::get('card/create/{id}', 'CardController@create')->name('admin.card.create');
        Route::post('card/create', 'CardController@store')->name('admin.card.store');
        Route::get('card/{id}', 'CardController@show')->name('admin.card.show');
        Route::get('card/{id}/edit', 'CardController@edit')->name('admin.card.edit');
        Route::put('card/{id}', 'CardController@update')->name('admin.card.update');
        Route::delete('card/{id}', 'CardController@destroy')->name('admin.card.destroy');

    });

    // Route::get('login', 'AdminController@showLoginForm')->name('admin.login');

    // Authentication Routes...
    // Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    // Route::post('login', 'Auth\LoginController@login');
    // Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');

    // // Registration Routes...
    // Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('admin.register');
    // Route::post('register', 'Auth\RegisterController@register');

    // // Password Reset Routes...
    // Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
    // Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    // Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
    // Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    // Route::middleware('auth.check')->group(function () {
        Route::get('login', 'Auth\LoginController@login')->name('admin.login');
        Route::post('send-otp', 'Auth\LoginController@sendOtp')->name('admin.send.otp'); 
        Route::post('post-login', 'Auth\LoginController@postLogin')->name('admin.login.post'); 
        Route::post('checkuser', 'Auth\LoginController@checkuser')->name('admin.login.checkuser');
        Route::get('verifyotp', 'Auth\LoginController@verifyotp')->name('admin.login.verifyotp');
        Route::get('register', 'Auth\RegisterController@register')->name('admin.register');
        Route::post('post-register', 'Auth\RegisterController@postRegister')->name('admin.register.post');
        Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');

        Route::get('test', function(){
            $user = User::where('phone', '923472705477')->first();
             dd(\Hash::check('1234567890', $user->password));
        });
    // });
});
// Auth::routes();
// Route::post('/admin/change-password', 'Auth\ChangePasswordController@updatePassword')->name('change.password');


// Frontend routes
Route::group(['prefix' => 'user', 'namespace' => 'User'], function(){
    Route::middleware(['auth', 'user_access:user'])->group(function(){
        Route::get('dashboard', 'UserController@dashboard')->name('user.dashboard');    
        Route::post('create-invoice', 'UserController@createInvoice')->name('user.invoice.create');

    });

    // login routes
    Route::post('checkuser', 'Auth\LoginController@checkuser')->name('login.checkuser');
    Route::get('verifyotp', 'Auth\LoginController@verifyotp')->name('login.verifyotp');
    Route::post('post-login', 'Auth\LoginController@postLogin')->name('login.post'); 
    Route::post('post-register', 'Auth\RegisterController@postRegister')->name('register.post');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
});

// Route::middleware('auth.check')->group(function () {
    Route::get('register', 'Auth\RegisterController@register')->name('register');
    Route::get('login', 'User\Auth\LoginController@login')->name('login');
    Route::get('/', 'PageController@index')->name('index');
// });