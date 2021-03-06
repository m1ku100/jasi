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

//Route::get('/', function () {
//    return view('landing');
//});

Route::get('/', 'PublicController@index')->name('landing');


Auth::routes();

Route::group(['prefix' => '/'], function () {

    Route::get('about', 'PublicController@about')->name('about');
    Route::get('blog', 'PublicController@blog')->name('blog.general');
    Route::get('contact', 'PublicController@contact')->name('contact');
    Route::get('portal', 'PublicController@portal')->name('portal');
    Route::get('order', 'PublicController@order')->name('order');
    Route::get('profile', 'PublicController@profile')->name('profile');
    Route::post('save', 'PublicController@feedback')->name('send.feedback');
    Route::post('order/save', 'PublicController@ordersave')->name('order.save');
    Route::post('profile/save', 'PublicController@saveprofile')->name('save.profile');
    Route::post('profile/pass', 'PublicController@savepass')->name('save.pass');


});

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin'], function () {

    Route::get('/dashboard', 'ManagerController@index')->name('dashboard');

    Route::get('/user', 'ManagerController@user')->name('user');

    Route::post('/user/add', 'ManagerController@adduser')->name('add.user');

    Route::post('/user', 'ManagerController@updateuser')->name('save.user');

    Route::get('/blog', 'ManagerController@blog')->name('blog');

    Route::get('/blog/form', 'ManagerController@blogform')->name('blog.form');

    Route::post('/blog/form/save', 'ManagerController@save')->name('save');

    Route::post('/blog/delete', 'ManagerController@delete')->name('delete');

    Route::post('/blog/update', 'ManagerController@updateblog')->name('update.blog');

    Route::post('/hide', 'ManagerController@hide')->name('hide');

    Route::get('/driver', 'ManagerController@driver')->name('driver');

    Route::post('/driver/add', 'ManagerController@adddriver')->name('add.driver');

    Route::get('/order', 'ManagerController@order')->name('admin.order');

    Route::post('/order/hide', 'ManagerController@active')->name('active.order');

});