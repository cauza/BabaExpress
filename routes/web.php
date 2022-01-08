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

Route::get('/', 'FrontpageController@index')->name('frontpage');


Auth::routes();
Route::group(['prefix' => 'administrator', 'middleware' => 'auth'], function () {
    Route::get('/home', 'Admin\HomeController@index')->name('home');
    Route::resource('category', 'Admin\CategoryController')->except(['create', 'show']);
});

Route::group(['prefix' => 'mitra', 'namespace' => 'Mitra'], function () {
    Route::get('login', 'LoginController@loginForm')->name('customer.login');
    Route::get('register', 'LoginController@registerForm')->name('customer.register');
    Route::post('register', 'LoginController@register')->name('customer.create');
    Route::get('register-success', 'LoginController@registersuccess')->name('customer.registersuccess');
    Route::post('login', 'LoginController@login')->name('customer.post_login');
    Route::get('verify/{token}', 'LoginController@verifyCustomerRegistration')->name('customer.verify');
    Route::group(['middleware' => 'customer'], function () {
        Route::get('dashboard', 'OrderController@index')->name('customer.dashboard');
        Route::get('logout', 'LoginController@logout')->name('customer.logout');
        Route::get('create', 'OrderController@create')->name('createorder');
        Route::get('history', 'OrderController@history')->name('history');
        Route::get('resi/{resi}', 'OrderController@cekresi')->name('cekresi');
        Route::post('orderstore', 'OrderController@store')->name('order.store');
    });
});

Route::group(['prefix' => 'driver', 'namespace' => 'Driver'], function () {
    Route::get('login', 'LoginController@loginForm')->name('driver.login');
    Route::get('register', 'LoginController@registerForm')->name('driver.register');
    Route::post('register', 'LoginController@register')->name('driver.create');
    Route::get('register-success', 'LoginController@registersuccess')->name('driver.registersuccess');
    Route::post('login', 'LoginController@login')->name('driver.post_login');
    Route::get('verify/{token}', 'LoginController@verifyDriverRegistration')->name('driver.verify');
    Route::group(['middleware' => 'driver'], function () {
        Route::get('dashboard', 'LoginController@dashboard')->name('driver.dashboard');
        Route::get('order', 'DriverController@order')->name('driver.order');
        Route::get('pickup', 'DriverController@pickup')->name('driver.pickup');
        Route::post('pickup', 'DriverController@pickupStore')->name('driver.pickupStore');
        Route::get('send', 'DriverController@send')->name('driver.send');
        Route::get('scan', 'DriverController@scan')->name('driver.scan');
        Route::get('detail/{id}', 'DriverController@detailOrder')->name('order.detail');
        Route::get('logout', 'LoginController@logout')->name('driver.logout');
    });
});